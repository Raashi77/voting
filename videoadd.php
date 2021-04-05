<?php
require_once "header.php";
require_once "navbar.php";

if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    if(isset($_POST['add']))
    {
        $sql="insert into videos(c_id, u_id, status) values('$token', '$USER_ID', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if(upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"projectFile","/user/uploads"))
            {
                $resSubject = "all_true";
            }else
            {
                $resSubject = "files_left";
            }
            $sql="select count(id) from contest_users cu where cu.c_id='$token' and cu.u_id='$USER_ID'";
            if($result=$conn->query($sql))
            {
                $row=$result->fetch_assoc();
                    $check = $row;
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
        $sql="select s.* from contest_songs cs, songs s where cs.c_id='$token' and cs.s_id=s.id";
        if($result=$conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row=$result->fetch_assoc())
                {
                    $contest_songs[] = $row;
                }
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

        $sql="select * from videos where c_id=$token and u_id='$USER_ID'";
        if($result=$conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row=$result->fetch_assoc())
                {
                    $v_count[] = $row;
                }    
            }
        }
    
}
  $sql="SELECT c.*, i.header_image from contest c, index_changes i where c.id=i.c_id and c.id='$token'";
if($result =  $conn->query($sql))
{
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
       
            $on_contest = $row;
        
    }
} 
         
?>
<style>
    .vidcs
    {
        width: min(400, 100%) !important;
    }
</style>
<div class="content-wrapper" style="margin-left:20px;">

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
        <div class="row">
        <div class="col-sm-12 col-md-12 mb-50">
						<div class="single-section text-center">
							<div class="section-img">
								<img src="<?=$on_contest['header_image']?>"   alt="single Images" />
							</div>
							<h3 class="headding-title"><?=$on_contest['name']?></h3> 
							<div class="countdown-section">
								<div class="row">
									<div class="offset-md-3 offset-sm-3 col-sm-6">
										<div class="CountDownTimer" data-date="<?php
                                            echo $on_contest['end_date']." ".$on_contest['end_time'].":00"; 
                                        ?>"></div>
									</div>
								</div>
							</div> 
						</div>
					</div>
        </div>
        <h2>
        Songs
        </h2>
         <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Song</th>
                        </tr>
                    </thead>
                    <tbody> 
 
                    
                     <?php 
                            if (isset($contest_songs)) 
                            {
                                $i = 1;
                                foreach ($contest_songs as $detail) 
                                {     
                     ?> 
                                     <tr > 
                                         <td style=" text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td><?=$detail['name'];?><br><audio controls="controls" src="./admin/<?=$detail['song']?>"></audio><br>
                                         <a href="./admin/<?=$detail['song']?>" download="true" class="btn btn-danger " ><i class="fa fa-download"></i>Download</a>
                                         </td>
                                    </tr>
                                 
                            <?php
                                $i++;             
                                }
                            } 
                         ?>
          
                    </tbody>
                </table>
                       
            </div>
            <!-- /.box-footer-->
        </div> 
        <h2>Videos</h2>
        <div class="box-body">
        <div class="row">
        <?php
            if(isset($videos))
            {
                $counter=0;
                foreach($videos as $data)
                {
        ?>
                    <div class="col-md-4">
                    <div id="data<?=$counter?>">
                    <iframe class="vidcs" height="315" src="<?=$data['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
                    if($v_count>1)
                    {
                    ?>
                        <button type="button" class="btn btn-danger deleteBtn" onclick="deleteFile(<?=$data['id']?>,'data<?=$counter?>', '<?=$data['video']?>')"><i class="fa fa-trash"></i></button>
                    <?php
                    }
                    ?>
                   </div>
                    </div>
        <?php
        $counter++;
                }
            }
        ?>
        </div>
        </div>
        <form method="post" enctype="multipart/form-data" id="video_form">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group">
                        
                        <center><button type="button" class="btn btn-danger" onclick="$('#projectfile').click()" id="upldBtn">Upload Video </button></center> 
                        <input type="file" id='projectfile' name="projectFile[]" class="form-control" style="visibility:hidden"/>
                        <input type="hidden" name ="add" value="dsbhvfs"/>
                     </div> 
                </div>
            </div>
            <div class="row"  id="formatError" style="display:none">
                <div class="col-md-12"> 
                    <div class="form-group"> 
                         <div class="alert alert-danger">
                             We suport Mp4 Videos , your video  does not have valid Extension. <button  type="button" onclick="continueUpload()" class="btn btn-primary" >Click Here To convert Video</button>
                         </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-4" id="filesDiv"> 
                            
                        
                </div>
            </div>
            
            <!-- <button type="submit" name="add" class="btn btn-primary">Add</button> -->
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
    var event;

    function continueUpload()
    {
        uploadVideo("redirect",event)
    }
    $(function()
    {
        
        disableVideoDelete(videoCounter);
        $("#projectfile").change(function(e)
        {
            
            uploadVideo("redirdect",e)
            //  if($(this).val().split('.').pop()!='mp4')
            //  {
            //     $("#formatError").show();
            //     event = e;
            //  }else
            //  {
            //     uploadVideo("redirect",e)
            //  }
            // 
        })
    })
    

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

    function uploadVideo(mode,file)
    {
       
            $("#upldBtn").html(`Uploading Video <i class="fa fa-spinner fa-spin"></i>`)
         
        var formData = new FormData();
        formData.append("projectFile[]",file.target.files[0]);
        formData.append("token",'<?=$token?>');
        formData.append("user_id",'<?=$USER_ID?>')
         formData.append("add",'<?=$USER_ID?>')
        $.ajax({
                url:'uploadVideo_ajax.php',
                type:'post', 
                cache: false,
                contentType: false,
                processData: false,
                uploadProgress: function (event, position, total, percentComplete){	
                  console.log(percentComplete);
                },
                data:formData,
                success: function(data)
                {
                    $("#upldBtn").html(`Video Uploaded`)
                        var obj = JSON.parse(data);
                        if(obj.msg.trim()=='all_true')
                        {
                            var filename = obj.filename;
                            if(mode=="redirect")
                            {
                                var href  ='https://video.online-convert.com/convert-to-mp4?external_url='+encodeURIComponent('<?=$website_link?>/uploads/'+filename);
                                console.log(href);
                            }
                            else
                            {
                                    window.location.reload();
                            }
                        }
                },
                error: function(data)
                {

                }
        })
    }
</script>