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
                        $amount=$detail['price'];
                        $response['msg']="ok";
                        $response['amount'] = $amount;
                        $response['id']=$insId;
                        // print_r($response);
                        echo json_encode($response);
                    }
                    else
                    {
                        $response['msg']="error";
                        $response['sql'] = $sql;
                        echo json_encode($response);

                    }
                }
                else
                {
                    $response['msg']=$conn->error;
                    echo json_encode($response);

                }
            }
            else
            {
                $response['msg']=$conn->error;
                echo json_encode($response);

            }
        }
        else
        {
            $response['msg']=$conn->error;
            echo json_encode($response);

        }
    }

    if(isset($_POST['update']))
    {
        $id = $conn->real_escape_string($_POST['id']);
        $gateway = $conn->real_escape_string($_POST['gateway']);
        $email = $conn->real_escape_string($_POST['email']);
        $payer_id = $conn->real_escape_string($_POST['payer_id']);
        $response=[];
        $song = $conn->real_escape_string($_POST['song']);
        $sql = "UPDATE payment set gateway_ref='$gateway' , email='$email' , payer_id='$payer_id' ,status='successful' where id='$id'";
        $up = "UPDATE songs set downloads=downloads+1 where id='$song'";
        if($conn->query($sql) && $conn->query($up))
        {
            echo "ok";
        }
        else
        {
            echo $conn->error;
        }
    }
?>