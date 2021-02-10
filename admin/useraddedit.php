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
            $num=$_POST['num'];
            $email=$_POST['email'];
            $pss=md5($_POST['pss']);
            $sql="insert into users(name, email, password, mobile, status) values('$name', '$email','$pss', '$num', '1')";
            if($conn->query($sql))
            {
                $resMember = true;
            }
            else
            {
                $errorMember=$conn->error;
            }
        }    
    }
    
    if(isset($_GET['token'])&&!empty($_GET['token']))
    {
        $token=$_GET['token'];
        if(isset($_POST['edit']))
        {  
            
            $name=$_POST['name'];
            $num=$_POST['num'];
            $email=$_POST['email'];
            $sql="update users set name='$name', mobile='$num', email='$email' where id='$token'";
            if($conn->query($sql))
            {
                $resMember = "true";
            }
            else
            {
                $errorMember=$conn->error;
            }
        }
        
        $sql="select * from users where id='$token' ";
        $result =  $conn->query($sql);
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
            $users = $row;
        }

        $sql="select * from videos where cu_id='$token'";
        $result =  $conn->query($sql);
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $videos[] = $row;
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
          User Details
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
                                <label>Name</label><br>   
                                <input type="text"  id="name" name="name" class="form-control" value="<?=$users['name']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Mobile</label><br> 
                                <input type="text"  id="num" name="num" class="form-control" value="<?=$users['mobile']?>" required>  
                            </div> 
                        </div>

                    </div> 
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Email</label><br> 
                                <input type="text"  id="email" name="email" class="form-control" value="<?=$users['email']?>" required>  
                            </div> 
                        </div>
                    </div>
                        <?php
                                if(isset($users))
                                {
                        ?>
                                        <button type="submit" name="edit" class="btn btn-primary" style="margin-top:10" value="">Edit</button>
                            <?php
                                }
                                else
                                {
                            ?>
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-md-5"> 
                                                <div class="form-group">
                                                    <label>Password</label><br> 
                                                    <input type="password"  id="password" name="password" class="form-control"  required>  
                                                 </div> 
                                            </div>
                                        </div>
                                        <button type="submit" name="add" class="btn btn-primary" style="margin-top:10" value="">Add</button>
                        <?php
                                }
                        ?> 
                </form>
         

    </section>
</div>
<?php
    require_once 'js-links.php';
?>

<script>
    var counter=1;
    function addFilesField()
    {
        var inhtml  =  `<div class="row" style="margin-top:20px">    
                            <div class="col-md-10">
                                <input   type="file" id='projectfile${counter}' name="projectFile[]" class="form-control"/>
                            </div> 
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger" onclick="removeField('projectfile${counter}')"><i class="fa fa-trash"></i></button>
                            </div> 
                        </div>`;
        $("#filesDiv").append(inhtml);
        counter++;

    }

    function removeField(id)
    {
            $("#"+id).parent().parent().remove();
            
    }

function deleteFile(id,divId,video)
{
    $.ajax({
        url:"deleteuservideo.php",
        type:"POST",
        data:{
            id:id,
            deleteVideo:video,
            video:video
        },
        success:function(data)
        {
            if(data.trim()=="ok")
            {
                $('#'+divId).remove();
            }
           
        },
        error:function()
        {

        }
    
    })
}
</script>