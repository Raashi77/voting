<?php

require_once '../lib/core.php';

if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $resMember =[];
    $price = $_POST['price'];
    $sql="insert into songs(name, status,price) values('$name','1','$price')";
    if($conn->query($sql))
    {
        $insert_id = $conn->insert_id;
        if(upload_audio($_FILES,$conn,"songs","id","song",$insert_id,"projectFile","/uploads"))
        {
            $resMember['msg'] = "all_true";
        }else
        {
            $resMember['msg'] = "files_left";
        }
            
    }
    else
    {
        $resMember['msg'] = $conn->error;
    }

    echo json_encode($resMember);
}



if(isset($_POST['edit']))
{
    
    $name=$_POST['name'];
    $id = $_POST['eid'];
    $price = $_POST['price'];
    $sql="update  songs set  name='$name',price='$price' where id='$id'";
    if($conn->query($sql))
    { 
        if(upload_audio($_FILES,$conn,"songs","id","song",$id,"projectFile","/uploads"))
        {
            $resMember['msg'] = "all_true";
        }else
        {
            $resMember['msg'] = "files_left";
        }
            
            
    }
    else
    {
        $resMember['msg'] = $conn->error;
    }

    echo json_encode($resMember);
}
    
    
?>