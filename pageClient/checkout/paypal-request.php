<?php
session_start();
include("constants.php");
include("C:\\xampp\htdocs\\royaltours\\pageAdmin\\database\\modele.inc.php");
//=== Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
require __DIR__ . '/vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class paypalRequest
{
    //=== Setup Paypal Environment.
    public static function environment()
    {
        return new SandboxEnvironment(PAYPAL_CLIENT_ID, PAYPAL_CLIENT_SECRET);
    }

    //=== Setup Paypal Client.
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    //=== Create papal order
    public static function createOrder($debug = false)
    {
        //=== Create New Order Request
        $request = new OrdersCreateRequest();
        $request->prefer("return=representation");

        //=== Create Request Body
        $request->body = self::buildRequestBody();

        //=== Call PayPal to set up a transaction
        $client = self::client();
        $response = $client->execute($request);

        //=== Return a response to the client.
        return $response;
    }

    public static function captureOrder($order_id)
    {

        $request = new OrdersCaptureRequest($order_id);

        //=== Call PayPal to get the transaction details
        $client = self::client();
        return $client->execute($request);

    }

    private static function buildRequestBody()
    {



        /*
         * -------------------------------------------
         * */
        global $tabRes;
        $totalcart = 0;
        $items_total=0;
        $nomTable=$_POST->nomTableALister;
        $idClt=$_POST->idClt;
        $tabRes['action']="afficherCheckout";
        $requeteBD="SELECT * FROM circuit INNER JOIN panier 
				ON circuit.idCircuit = panier.idCircuit 
				WHERE idInscrit = ".$idClt;
        try{
            $unModele=new royaltoursModele($requeteBD,array());
            $stmt=$unModele->executer();
            $tabRes['liste']=array();
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $tabRes['liste'][]=$ligne;
                $ligneTableau = (array)$ligne;
                $totalcart += $ligneTableau['prixCircuit'];
                $items_total +=1;
            }
        }catch(Exception $e){
            debug_to_console($e->getMessage());
        }finally{
            unset($unModele);
        }



        /*
         * ------------------------------------------------------------------------------------------
         * */


            //=== Set currency code used in transaction
            $currency_code = "USD";

            $request_body = $application_context = $purchase_units = $pu_amount = [];

            //=== Prepare context of our request
            $application_context["locale"] = "en-US";
            $application_context["user_action"] = "PAY_NOW";

        $items = [];

        //=== Loop through all products in session and prepare items array for order request
        foreach ($tabRes["liste"] as $product) {
            $productTableau = (array)$product;
            $item["name"] = $productTableau['nomCircuit'];
            $item["quantity"] = 1;
            $item["category"] = "DIGITAL_GOODS";


            //=== Unit amount of product (widthout tax)
            $item["unit_amount"]["currency_code"] = $currency_code;
            $item["unit_amount"]["value"] = number_format($productTableau['prixCircuit'], 2, '.', '');
            $items[] = $item;
        }

        $taxRate = 1;
        $tax = 0;
        $total = $tax + $totalcart;

        $pu_amount["currency_code"] = $currency_code;
        $pu_amount["value"] = floatval($totalcart + $tax );

        //=== Items total break down without tax
        $pu_amount["breakdown"]["item_total"]["currency_code"] = $currency_code;
        $pu_amount["breakdown"]["item_total"]["value"] = number_format($totalcart, 2, '.', '');


        //=== Total tax of all products
        $pu_amount["breakdown"]["tax_total"]["currency_code"] = $currency_code;
        $pu_amount["breakdown"]["tax_total"]["value"] = number_format($tax, 2, '.', '');


        //=== Prepare amount & break down of amount for order.
        // Devrait avoir le montant total avec les taxes de tous les produits


        $purchase_units["amount"] = $pu_amount;
            $purchase_units["items"] = $items;

            //=== Finally create request body array assigning context & purchase units created above
            $request_body["intent"] = "CAPTURE";
            $request_body["application_context"] = $application_context;
            $request_body["purchase_units"][] = $purchase_units;
            return $request_body;


    }
}

if (!count(debug_backtrace())) {
    //=== Capture the input received from fetch() request
    $json_data = file_get_contents("php://input");
    $_POST = json_decode($json_data);
    $post = json_decode($json_data);

    //=== Check if request is to create an order
    if ($_POST->action == "create-order") {
        $order = paypalRequest::createOrder();
        echo json_encode($order->result, JSON_PRETTY_PRINT);
    } //=== Check if request is to save an order
    elseif ($post->action == "save-order") {
        //=== Save order either by retrieving order from paypal OR the order we still have in session
        $order = paypalRequest::captureOrder($post->id);

        /*
        Prepare order query data & save order into database here
        */

        $idTransaction=$_POST->id;
        try{
            $unModele=new royaltoursModele();
            $requete="INSERT INTO `paypal` VALUES (0,?)";
            $unModele=new royaltoursModele($requete,
                array($idTransaction));
            $unModele->executer();

        }catch(Exception $e){
            debug_to_console($e->getMessage());
        }finally{
            unset($unModele);
        }
        //===  unset cart session

        echo json_encode(["success" => 1], JSON_PRETTY_PRINT);
    }
}
?>