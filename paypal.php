<?php

    if(isset($_GET['amount'])&&!empty($_GET['amount']))
    {
        $amount = $_GET['amount'];
        $songId = $_GET['songId'];
        $userId = $_GET['userId'];
        $email = $_GET['email'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="overflow-y: hidden">
    <div id="paypal-button-container" class="payButton"></div>
</body>
<?php

    require_once './javascript.php'

?>
<script src="https://www.paypal.com/sdk/js?client-id=AVD9ZGSM4bsCuPWbHu_WWeZjwY5KeN-XZSvD8hBW1w4aFcyQE7mcpQnFRk_dJ8TW20LnKgOnG1c5kBgc&locale=en_US&currency=USD&debug=true"></script>
<script>

    $( document ).ready(function() {
        callAjax();
        window.ReactNativeWebView.postMessage("displaying");
    });
    function callAjax(){
        var amount;
        var id;
        $.ajax({
            url: "payment.php",
            type: "POST",
            data: {
                payment: true,
                songId: '<?=$songId?>',
                user: '<?=$userId?>',
                email:'<?=$email?>',
                price:'<?=$amount?>',
            },
            success: function(data) 
            {
                console.log(data);
                var obj = JSON.parse(data);
                // console.log(obj.msg);
                if(obj.msg.trim()=="ok")
                {
                    amount=obj.amount;
                    id=obj.id;
                    paypalbutton(amount,id,'<?=$songId?>')
                }
                else
                {
                    alert("Some error Occured!")
                }
               
                
            }
        });
    }
    

     function paypalbutton(amount,id,songId)
    {
        $(".payButton").each(function(){$(this).empty()});
        paypal.Buttons({
        createOrder: function(data, actions) {
            window.ReactNativeWebView.postMessage("PaymentInitiated");
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?=$amount?>',
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            console.log(details.id);
            console.log(details.payer.email_address);
            console.log(details.payer.payer_id);
            $.ajax({
                url: "payment.php",
                type: "POST",
                data: {
                    update: true,
                    id: id,
                    gateway: details.id,
                    email : details.payer.email_address,
                    payer_id : details.payer.payer_id,
                    song:songId,
                },
                success: function(data) 
                {
                    if(data.trim()=="ok")
                    {
                        window.ReactNativeWebView.postMessage("PaymentCompleted");
                    }
                }
            });
          });
        },
        // onError: function(err) {
        //   console.log("err",err);
        // }
      }).render('#paypal-button-container'); // Display payment options on your web page
    }
</script>
</html>