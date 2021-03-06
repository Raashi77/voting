<?php
    require_once '../lib/core.php'; 
    if(isset($_FILES['images']) && !empty($_FILES['images']['name']))
    { 
        $image=$_FILES["images"]; 
        $u_id = $_POST['u_id'];
        $category = $_POST['category'];
        $uploaded_file_name = upload_image_cp($image,'uploads/');
        if($uploaded_file_name!='err')
        {
            $absolute_path = $website_link."/admin/uploads/".$uploaded_file_name;
            $sql = "insert into gallery(u_id,image,category) values($u_id,'$absolute_path','$category')";
            if($conn->query($sql))
            {
                echo $absolute_path;
            }
            else
            {
                unlink("uploads/$uploaded_file_name"); 
                echo $conn->error;
            } 
        }
        else
        {
            echo "error";
        }
    } 
    if(isset($_POST['deleteImage']))
    {
        $imageId = $conn->real_escape_string($_POST['imageId']);
        $imagePath ='uploads/'.end(explode('/',$conn->real_escape_string($_POST['imagePath'])));
        $sql="delete from gallery where id = $imageId";
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