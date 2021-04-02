<?php



if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $sql="insert into songs(name, status) values('$name', '1')";
    if($conn->query($sql))
    {
        $insert_id = $conn->insert_id;
        if(upload_audio($_FILES,$conn,"songs","id","song",$insert_id,"projectFile","/uploads"))
        {
            $resMember = "all_true";
        }else
        {
            $resMember = "files_left";
        }
            
    }
    else
    {
        $errorMember=$conn->error;
    }
}



if(isset($_POST['edit']))
{
    $name=$_POST['ename'];
    $id = $_POST['eid'];
    $sql="update  songs set  name='$name' where id='$id'";
    if($conn->query($sql))
    { 
        if(upload_audio($_FILES,$conn,"songs","id","song",$id,"projectFile","/uploads"))
        {
            $resMember = "all_true";
        }else
        {
            $resMember = "files_left";
        }
            
    }
    else
    {
        $errorMember=$conn->error;
    }
}
    
    
    ?>