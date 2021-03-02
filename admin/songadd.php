<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        if(isset($_POST['add']))
        {
            $name=$_POST['name'];
            $sql="insert into songs(name, status) values('$name', '1')";
            if($conn->query($sql))
            {
                $insert_id = $conn->insert_id;
                if(upload_audio($_FILES,$conn,"songs","id","song",$insert_id,"projectFile",$website_link."/admin/uploads"))
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
    }
   
?>
<style>
    .box-body{
	overflow: auto!important;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Add Songs
        </h1>
    </section>
    <section class="content">
        <?php
            if(isset($resMember))
            {
        ?>
                <div class="alert alert-success"><strong>Success! </strong> your request successfully updated. </div>   
        <?php
            }
            else if(isset($errorMember))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div> 
        <?php
                
            }
        ?>
        
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Name</label><br>   
                                <input type="text"  id="name" name="name" class="form-control" required>  
                            </div> 
                        </div>

                    </div> 
                    <div class="row" style="margin-bottom:20px">    
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label>Audio File</label><br>  
                                <button type="button" class="btn btn-success" onclick="addFilesField()"><i class="fa fa-plus"></i></button>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" id="filesDiv"> 
                                 
                                
                        </div>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary" style="margin-top:10" value="">Add</button>
                </form>
         

    </section>
</div>
<?php
    require_once 'js-links.php';
?>
 