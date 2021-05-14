<?php
require_once "header.php";
require_once "navbar.php";

$sql="select * from  songs  ";
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
        <div class="row" style="margin-top:50px">
            <div class="col-sm-12 col-md-12 mb-50">
                            
            </div>
        </div>
        <center>
            <h2>
            All Songs
            </h2>
        </center>
            <div class="container">
              <div class="row">
                <!-- <table id="example2" class="table table-bordered table-hover" style="color:white">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Song</th>
                             <th>Buy</th>
                             <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>  -->
 
                    
                        <?php 
                            if (isset($contest_songs)) 
                            {   
                                // print_r($contest_songs);
                                $i = 1;
                                foreach ($contest_songs as $detail) 
                                {     
                                    $downloadhref = '';
                                    $songadd = $detail['song'];
                                    $price = $detail['price'];
                                    if(isset($_SESSION['signed_in']))
                                    {
                                        $downloadhref = "<a href='./admin$songadd' download='true' class='btn btn-danger ' ><i class='fa fa-download'></i>&nbsp; Download</a>";
                                        $pay = "<a href='#' class='btn btn-primary'>Pay $ $price</a>";
                                    }
                                    else
                                    {
                                        $downloadhref="<a href='registration'>Login to buy and download the song!</a>";
                                        $pay = "";
                                    }
                        ?>             
                                     <!-- <tr> 
                                         <td style=" text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td ><?=$detail['name'];?><br><br>
                                         </td>
                                         <td>
                                            
                                         </td>
                                         <td>
                                            
                                        </td>
                                    </tr> -->
                                    <div class="col-lg-4" style="margin-bottom:20px">
                                        <div class="card" >
                                            <div class="card-body">
                                                <h5 class="card-title"><?=$detail['name'];?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><audio style="width:100%" controls="controls" controlsList="nodownload" src="./admin/<?=$detail['song']?>"></audio></h6>
                                                <center>
                                                    <a href="#" class="card-link"><?=$pay?></a>
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
          
                    <!-- </tbody>
                </table> -->
                       
            </div>
            <!-- /.box-footer-->
        </div> 
        
        <!-- <form method="post" enctype="multipart/form-data" id="video_form">
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
            
            <button type="submit" name="add" class="btn btn-primary">Add</button> 
        </form> -->
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
    
  <?php
    require_once 'js-links.php';
  ?>
