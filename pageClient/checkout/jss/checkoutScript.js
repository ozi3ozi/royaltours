window.addEventListener("load", function(){
    paypal.Buttons({
        style:{
            layout: "horizontal"
        },
        createOrder: function(data, actions) {
            let idClient = localStorage.getItem('idClt');
                    return fetch("checkout/paypal-request.php", {
                        method: "POST",
                        headers: {
                            "content-type": "application/json"
                        },
                        body: JSON.stringify({
                            action: "create-order",
                            nomTableALister: 'panier',
                            idClt: idClient,
                        })
                    }).then(function(res) {
                        return res.json();
                    }).then(function(data) {
                        console.log(JSON);
                        return data.id;
                    });
                },
                fail : function (err){
        },
        onApprove: function(data, actions){
            //=== Call your server to save the transaction
            let idClient = localStorage.getItem('idClt');
            return fetch("checkout/paypal-request.php", {
                method: "POST",
                headers: {
                    "content-type": "application/json"
                },
                body: JSON.stringify({
                    action: "save-order",
                    id:data.orderID,
                })
            }).then(function(res) {
                return res.json();
            }).then(function(data){
                //=== Redirect to thank you/success page after saving transaction
                if(data.success){
                    window.location.assign("checkout/payment-success.php");
                }
            });
        }
    }).render("#paypal-button-container");
});