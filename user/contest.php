<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    
    $date=date('Y-m-d');
    $time = date('H:i');
    if(isset($_GET['token'])&&!empty($_GET['token']))
    { 
        $token = $_GET['token'];
        switch ($token) 
        {
            case "1": 
                $sql="SELECT * from contest where (end_date < '$date') or (end_date = '$date' and end_time < '$time')";
                $title="Completed Contest";
                break;
            case "2": 
                $sql="SELECT c.* from contest c, contest_users cu where cu.c_id=c.id and cu.u_id='$USER_ID' group by c.id";
                $title="Enrolled Contest";
                break;
            default:
                $title="INVALID REQUEST";
                break;
        }
        
        $result =  $conn->query($sql);
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $contest[] = $row;
            }
        }

    }
    else
    {
        $title="INVALID REQUEST";
    }

?>

<style>
    .box-body{
	overflow: auto!important;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: 900;">
            <?=$title?>
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
      
            <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <?php 
                            if (isset($contest)) 
                            {
                                $i = 1;
                                foreach ($contest as $detail) 
                                {     
                     ?> 
                      <tbody> 
 
                    
                     
                                    
                                    <tr style="margin-top:10px">  
                                        <th style="  text-align: center; background-color: black; color: white;" colspan="2" id="sno<?=$i?>"><?=$i?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Name</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="name<?=$i?>"><?=$detail['name'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white; " >Description</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="description"><?=$detail['description'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Start Date</th>
                                        <th style="  text-align: center; background-color: #808080; color: white; " id="start_date"><?=$detail['start_date'];?> - <?=$detail['start_time'];?></th>  
                                    </tr>
                                    <tr> 
                                        <!-- <th style="  text-align: center; background-color: #212529; color: white;" >Start Time</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="start_time"></th>   -->
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >End Date</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="end_date"><?=$detail['end_date'];?> - <?=$detail['end_time'];?></th>  
                                    </tr>
                                    <tr> 
                                        <!-- <th style="  text-align: center; background-color: #212529; color: white;" >End Time</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="end_time"></th>   -->
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Prize</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="prize"><?=$detail['prize'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Action</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;"><a href="video?token=<?=$detail['id']?>" class="btn btn-warning"><i class="fa fa-video-camera">Video</i></a></th>  
                                    </tr>
                                    </tbody> 
                            <?php
                                $i++;
                                               
                            } 
                             
                            }
                         ?>
          
                        
                    </table>
                       
                        </div>
            <!-- /.box-footer-->
                        </div>    
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

          

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->       
<div class="control-sidebar-bg"></div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Song</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
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
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" name="add_songs" class="btn btn-primary" style="margin-top:10" value="">Add</button>
              

                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>  
  

<?php
    require_once 'js-links.php';
?>



