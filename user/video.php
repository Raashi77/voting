<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';



if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    if(isset($_POST['add']))
    {
        $sql="insert into videos(c_id, u_id, status) values('$token', '$USER_ID', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if(upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"projectFile",$website_link."/user/uploads"))
            {
                $resSubject = "all_true";
            }else
            {
                $resSubject = "files_left";
            }
            $sql="select * from contest_users cu where cu.c_id='$token' and cu.u_id='$USER_ID'";
            if($result=$conn->query($sql))
            {
                if($result->num_rows)
                {
                    $row=$result->fetch_assoc();
                        $check = $row;
                }
            }
            if(isset($check))
            {

            }
            else
            {
                $sql = "insert into contest_users(c_id, u_id, status) values('$token', '$USER_ID', 1)";
                if($conn->query($sql))
                {
                    $resMember=true;   
                }
                else
                {
                    $errorMember=$conn->error;
                }
            }
            
        }
        else
        {
            $errorSubject=$conn->error;
        } 
    }
    $sql="select * from videos where c_id=$token and u_id='$USER_ID'";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $videos[] = $row;
            }
        }
    }
    $sql="select count(id) as count from videos where c_id=$token and u_id='$USER_ID'";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
                $v_count = $row['count'];
        }
    }

}

         
?>
<div class="content-wrapper">
<section class="content-header">
        <h1>
            Video
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
    </section>

    <!-- Main content -->
      <br>
    <section class="content">
        <?php
            if(isset($resSubject))
            {
        ?>
                <div class="alert alert-success"><strong>Success!</strong> your request successfully updated.</div> 
        <?php
            }
            else if(isset($errorSubject))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorSubject?></div> 
        <?php
                
            }
        ?>
        
        <div class="box-body">
        <?php
            if(isset($videos))
            {
                $counter=0;
                foreach($videos as $data)
                {

        ?>
                    <div id="data<?=$counter?>">
                    <iframe width="560" height="315" src="<?=$data['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
                    if($v_count>1)
                    {
                    ?>
                        <button type="button" class="btn btn-danger deleteBtn" onclick="deleteFile(<?=$data['id']?>,'data<?=$counter?>', '<?=$data['video']?>')"><i class="fa fa-trash"></i></button>
                    <?php
                    }
                    ?>
                   
                    </div>
        <?php
        $counter++;
                }
            }
        ?>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group">
                        <label>Add Videos</label><br>  
                        <button type="button" class="btn btn-success" onclick="addFilesField()"><i class="fa fa-plus"></i></button>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" id="filesDiv"> 
                            
                        
                </div>
            </div>
            
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </form>
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
    
  <?php
    require_once 'js-links.php';
  ?>

<script>
    var videoCounter = parseInt('<?=$counter?>');
    var counter=1;
    $(function()
    {
        
        disableVideoDelete(videoCounter);
    })
    function addFilesField()
    {
        var inhtml  = `<div class="row" style="margin-top:20px">    
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

    function deleteFile(id,divId, video)
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
                    $("#"+divId).remove();  
                    videoCounter--;
                    disableVideoDelete(videoCounter);
                }else
                {
                    console.log(data);
                }
            },
            error:function()
            {

            }
        
        })
    }

   function  disableVideoDelete(counter)
    {
        if(counter==1)
        {
            $(".deleteBtn").remove()
        }
    }
</script>