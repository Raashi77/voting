<?php

    require_once '../lib/core.php';
    $REQUEST  = json_decode(file_get_contents('php://input'),true); 
    if(isset($_POST['checkEmail']))
    {
        $response = [];
        $email = $conn->real_escape_string($_POST['email']);
        $sql = "SELECT id from users where email='$email'";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "exists";
            }
            else
            {
                $response['msg'] = "success";
            }
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

    if(isset($_POST['signIn']))
    {
        $response = [];
        $fName = $conn->real_escape_string($_POST['fName']);
        $lName = $conn->real_escape_string($_POST['lName']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $password = md5($password);
        $name = $fName." ".$lName;
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        $sql = "INSERT into users(name, email, password,ip_address,status,profilePic,loginType) VALUES ('$name', '$email', '$password','$ip_address',1,'uploads/userAvtar.jpg','default')";
        if($conn->query($sql))
        {
            $ins_id = $conn->insert_id;
            $response['msg'] = "success";
            $data = [];
            $data['id'] = $ins_id;
            $data['mobile'] = null;
            $data['name'] = $name;
            $data['ip_address'] = $ip_address;
            $data['status'] = 1;
            $data['profilePic'] = 'uploads/userAvtar.jpg';
            $response['data'] = $data ;          
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

    if(isset($_POST['Login']))
    {
        $response = [];
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $password = md5($password);
        $sql = "SELECT * from users where email='$email' and password='$password'";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                $response['data'] = $result->fetch_assoc();
            }
            else
            {
                $response['msg'] = "invalid";
            }
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

    // if(isset($_POST['forgotPassword']))
    // {
    //     $email = $conn->real_escape_string($_POST['email']);
    //     $sql = "SELECT id from users where email='$email'";
    //     if($result =  $conn->query($sql))
    //     {
    //         if($result->num_rows > 0)
    //         {
    //             $response['msg'] = "success";
    //         }
    //         else
    //         {
    //             $response['msg'] = "invalid";
    //         }
    //     }
    //     else
    //     {
    //         $response['msg'] = "error";
            
    //         $response['error'] = $conn->error;
    //         $response['query'] = $sql;
    //     }
    //     echo json_encode($response);
    // }

    if(isset($_POST['forgotPassword']))
    {
        $email = $conn->real_escape_string($_POST['email']);
        $altBody = "This is an auto-generated email. Please don't reply to this!";
        $subject = "Forgot Password";
        $isHtml=false;
        $body= `Pancham SHeoran`; 
        $value = sendMail($mail,$altBody,$email,$subject,$isHtml,$body);
        $response['msg'] = $value;
        echo json_encode($response);
    }
    

?>