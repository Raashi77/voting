<?php
    require_once 'lib/core.php'; 
   
    if(isset($_POST['deleteVideo']))
    {
        $imageId = $conn->real_escape_string($_POST['id']); 
        $imagePath = '/user/uploads/'.end(explode('/',$conn->real_escape_string($_POST['video'])));
        $sql="delete from videos where id = $imageId";
            if($conn->query($sql))
            {
                unlink($imagePath);
                echo "ok";
            } 
            else
            {
                echo $conn->error;
            }
    }
?>