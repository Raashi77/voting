<?php
    require_once './lib/core.php';

    

    function genRandStr(  $length = 8,   $prefix = '',   $suffix = '') 
    {

        for($i = 0; $i < $length; $i++)

        {

            $prefix .= random_int(0,1) ? chr(random_int(65, 90)) : random_int(0, 9);

        }

        return $prefix . $suffix;

    }
    if(isset($_POST['payment']))
    {
        $songId = $_POST['songId'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $price = $_POST['price'];
        $response=[];
        $sql = "INSERT into payment(song_id,price,user,email) values ('$songId','$price','$user','$email')";
        if($conn->query($sql))
        {
            $insId = $conn->insert_id;
            $trans_id = genRandStr(6,$insId,"");
            $sql = "UPDATE payment set payment_ref = '$trans_id' where id = '$insId'";
            if($conn->query($sql))
            {
                $sql = "SELECT * from songs where id='$songId'";
                if($result=$conn->query($sql))
                {
                    if($result->num_rows)
                    {
                        $detail = $result->fetch_assoc();
                    }
                }
                // Song being purchased.
                $itemName = $detail['name'];
                $itemAmount = $detail['price'].".00";

                // Grab the post data so that we can set up the query string for PayPal.
                // Ideally we'd use a whitelist here to check nothing is being injected into
                // our post data.
                $data = [];
                foreach ($_POST as $key => $value) {
                    $data[$key] = stripslashes($value);
                }

                // Set the PayPal account.
                $data['business'] = $paypalConfig['email'];

                // Set the PayPal return addresses.
                $data['return'] = stripslashes($paypalConfig['return_url']);
                $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
                $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

                // Set the details about the product being purchased, including the amount
                // and currency so that these aren't overridden by the form data.
                $data['item_name'] = $itemName;
                $data['amount'] = $itemAmount;
                $data['currency_code'] = 'USD';

                // Add any custom fields for the query string.
                //$data['custom'] = USERID;

                // Build the query string from the data.
                $queryString = http_build_query($data);
                $response['msg']="ok";
                $response['payment_url']=$paypalUrl."?".$queryString;
                echo json_encode($response);

            }
        }
    }
?>