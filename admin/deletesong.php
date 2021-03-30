<?php
    require_once '../lib/core.php'; 
   
    if(isset($_POST['deleteSong']))
    {
        $id=$_POST['id']; 
        $sql="delete from contest_songs where id = '$id'";
        if($conn->query($sql))
        {
            echo "ok";
        } 
        else
        {
            echo $conn->error;
        }
    }
?>