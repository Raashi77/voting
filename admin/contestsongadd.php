<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    if(isset($_GET['token'])&&!empty($_GET['token']))
    {  
        $token=$_GET['token'];
        if(isset($_POST['add']))
        {
            $songs=$_POST['songs'];
            $sql="insert into contest_songs(c_id, s_id, status) values";
            foreach($songs as $data)
            {
                $sql .= "('$token', '$data',  1),";
            }
                $sql=rtrim($sql, ',');
            if($conn->query($sql))
            {
                $resMember = true;
            }
            else
            {
                $errorMember = $conn->error;
            }
        }  
        
    }
    $sql="select * from songs";
    if($result = $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $allsongs[]=$row;
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
        
            <form method="post">
                <div class="row">
                    <div class="col-md-5"> 
                        <div class="form-group">
                            <label>Songs</label><br>   
                            <select class="form-control selectpicker" name="songs[]" id="songs" multiple data-live-search="true">
                            <?php
                                if(isset($allsongs))
                                { 
                                    foreach($allsongs as $data)
                                    {
                                        
                            ?>
                                        <option value=<?=$data['id']?> ><?=$data['name']?></option>
                                        

                                        
                            <?php
                                    }
                                }
                            ?>
                                
                            </select> 
                        </div> 
                        
                    </div> 
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </div>
            </form>
         

    </section>
</div>

<?php
    require_once 'js-links.php';
?>

