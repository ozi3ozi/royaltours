<?php
include("constants.php");

$order = $products = [];

//=== Static array of products
$products[] = ["product_title" =>  "Javascript Book - PDF", "product_price" => 10.00, "product_tax" => 2.00, "product_quantity"  => 3];
$products[] = ["product_title" =>  "PHP Book - PDF", "product_price" => 15.00, "product_tax" => 3.00, "product_quantity"  => 2];

$items_total = $tax_total = 0.00;

//=== Loop through products and calculate tax total & items total
foreach($products as $product){
    $tax_total += floatval($product["product_tax"] * $product["product_quantity"]);
    $items_total += floatval($product["product_price"] * $product["product_quantity"]);
}

//=== Function to show amount in price format
function to_price($amount = 0.00, $symbol = "$", $currency_code = "USD"){
    $amount = floatval($amount);
    return sprintf("%s%.2f %s", $symbol, $amount, $currency_code);
}

//=== Create a cart session
$_SESSION["cart"]["products"] = $products;
$_SESSION["cart"]["items_total"] = $items_total;
$_SESSION["cart"]["tax_total"] = $tax_total;
$_SESSION["cart"]["cart_total"] = $tax_total + $items_total;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Paypal Checkout with Smart Payment Buttons - Demo</title>
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
        <script
            src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID?>"></script>
        <script type="text/javascript" src="jss/checkoutScript.js"></script>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="main-container">
            <div class="section">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th width="120">Price</th>
                            <th width="120">Tax</th>
                            <th width="100">Quantity</th>
                            <th width="120">Item Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION["cart"]["products"] as $product){
                            $item_total = $product["product_price"] * $product["product_quantity"];
                            $item_tax = $product["product_tax"] * $product["product_quantity"];
                            ?>
                            <tr>
                                <td width="31"><img src="./images/pdf-book.png" /></td>
                                <td>
                                    <?php echo $product["product_title"];?>
                                </td>
                                <td><?php echo to_price($product["product_price"]);?></td>
                                <td><?php echo to_price($product["product_tax"]);?></td>
                                <td><?php echo $product["product_quantity"]?></td>
                                <td><?php echo to_price($item_total + $item_tax);?></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <th colspan="5" class="text-right">
                                Tax Total
                            </th>
                            <th class="text-right">
                                <?php echo to_price($_SESSION["cart"]["tax_total"]);?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">
                                Items Total
                            </th>
                            <th class="text-right">
                                <?php echo to_price($_SESSION["cart"]["items_total"]);?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">
                                Cart Total
                            </th>
                            <th class="text-right">
                                <?php echo to_price($_SESSION["cart"]["cart_total"]);?>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div id="paypal-buttons"></div>

            </div>
        </div>
    </body>
</html>