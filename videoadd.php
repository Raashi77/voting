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
            $sql="select * from contest_users cu where cu.c_id='$token' and cu.u_id='$USER_ID'";
            if($result=$conn->query($sql))
            {
                if($row->num_rows)
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

        $sql="select s.* from  songs s,payment p where p.song_id=s.id and p.user='$USER_ID'  ";
        if($result=$conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row=$result->fetch_assoc())
                {
                    $mySongs[] = $row;
                    $mySongsId[]=$row['id'];
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
        <center>
        <h2>
        Songs
        </h2>
        </center>
         <div class="box">
              <div class="box-body">
                <!-- <table id="example2" class="table table-bordered table-hover">
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
                </table> -->
            </div>
            <div class="container">
                <div class="row">
                    <?php 
                            if (isset($contest_songs)) 
                            {   
                                // print_r($contest_songs);
                                $i = 1;
                                foreach ($contest_songs as $detail) 
                                {   
                                    $downloadhref = '';
                                    $pay="";
                                    $disp="";
                                    $songadd = $detail['song'];
                                    $price = $detail['price'];
                                    $id = $detail['id'];
                                    if(isset($_SESSION['signed_in']))
                                    {
                                        $sql = "SELECT * from payment where song_id='$id' and user='$USER_ID'";
                                        if($result=$conn->query($sql))
                                        {
                                            if($result->num_rows > 0)
                                            {
                                                $row = $result->fetch_assoc();
                                                if($row['status'] == "successful")
                                                {
                                                    $downloadhref = "<a href='./admin$songadd' download='true' class='btn btn-danger ' ><i class='fa fa-download'></i>&nbsp; Download</a>";
                                                    $pay = "";
                                                    $disp = "none";
                                                }
                                                else
                                                {
                                                    $downloadhref = "";
                                                    $pay = "pay('$id','$USER_ID','$EMAIL','$price','paypal-button-container$i')";
                                                }
                                            }
                                            else
                                            {
                                                $downloadhref = "";
                                                $pay = "pay('$id','$USER_ID','$EMAIL','$price','paypal-button-container$i')";
                                            }                                            
                                        }
                                        else
                                        {
                                            $error = $conn->error;
                                        }
                                    }
                                    else
                                    {
                                        $downloadhref="<a href='registration'>Login to buy and download the song!</a>";
                                    }
                                    if(!in_array($detail['id'],$mySongsId))
                                    {
                        ?>             
                                    <div class="col-lg-4" style="margin-bottom:20px">
                                        <div class="card" >
                                            <div class="card-body">
                                                <h5 class="card-title"><?=$detail['name'];?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><audio style="width:100%" controls="controls" controlsList="nodownload" src="./admin/<?=$detail['song']?>"></audio></h6>
                                                <center>
                                                <?php
                                                    if(isset($_SESSION['signed_in']))
                                                    {
                                                        ?>
                                                            <div id="paypal-button-container<?=$i?>" class="payButton"></div>
                                                            <button onclick="<?=$pay?>" style="display:<?=$disp?>" id="paydollor<?=$id?>" class='btn btn-primary pay'>Pay $ <?=$price?></button>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                                    
                                                    <a href="#" class="card-link"><?=$downloadhref?></a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                
                            <?php
                                    }
                                $i++;             
                                }
                            } 
                        ?>
                        <?php 
                            if (isset($mySongs)) 
                            {   
                                // print_r($contest_songs);
                                $i = 1;
                                foreach ($mySongs as $mysong) 
                                {     
                                    $downloadhref = '';
                                    $songadd = $mysong['song'];
                                    $price = $mysong['price'];
                                    if(isset($_SESSION['signed_in']))
                                    {
                                        $downloadhref = "<a href='./admin$songadd' download='true' class='btn btn-danger ' ><i class='fa fa-download'></i>Download</a>";
                                        $pay = "<a href='#' class='btn btn-primary'>Pay $ $price</a>";
                                    }
                                    else
                                    {
                                        $downloadhref="<a href='registration'>Login to buy and download the song!</a>";
                                        $pay = "";
                                    }
                        ?>             
                                     
                                    <div class="col-lg-4" style="margin-bottom:20px">
                                        <div class="card" >
                                            <div class="card-body">
                                                <h5 class="card-title"><?=$mysong['name'];?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><audio style="width:100%" controls="controls" controlsList="nodownload" src="./admin/<?=$mysong['song']?>"></audio></h6>
                                                <center>
                                                    <a href="#" class="card-link"><?=$downloadhref?></a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    
                                 
                            <?php
                                $i++;             
                                }
                            } 
                         ?>
          
                </div>
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
                    <video  style="background-color:white" height="315" preload="metadata" controls>
                                    <source src="<?=$data['video']?>#t=0.1" > 
                                    Your browser does not support HTML video.
                    </video>
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

<script src="https://www.paypal.com/sdk/js?client-id=AVD9ZGSM4bsCuPWbHu_WWeZjwY5KeN-XZSvD8hBW1w4aFcyQE7mcpQnFRk_dJ8TW20LnKgOnG1c5kBgc&locale=en_US&currency=INR&debug=true"></script>
  <script>
    function pay(songId,user,email,price,cont)
    {


        $(".pay").show();
        $("#paydollar"+songId).hide();
        paypalbutton(price,cont)
        // $.ajax({
        //     url: "payment.php",
        //     type: "POST",
        //     data: {
        //         payment: true,
        //         songId: songId,
        //         user: user,
        //         email:email,
        //         price:price,
        //     },
        //     success: function(response) 
        //     {
        //         var obj = JSON.parse(response);
        //         console.log(obj);
                
        //     }
        // });
    }

    function paypalbutton(amount,container)
    {
        $(".payButton").each(function(){$(this).empty()});
        paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: amount
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }
      }).render('#'+container); // Display payment options on your web page
    }


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