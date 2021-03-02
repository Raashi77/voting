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
                $sql="SELECT c.* from contest c where (c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')";
                $title="Ongoing Contest";
                break;
            case "2": 
                $sql="SELECT c.* from contest c where ((c.start_date = '$date' and c.start_time > '$time') or (c.start_date > '$date')) group by c.id";
                $title="Upcoming Contest";
                break;
            case "3": 
                $sql="SELECT c.* from contest c, contest_users cu where c.end_date < '$date' and cu.c_id=c.id and cu.u_id='$USER_ID' group by c.id";
                $title="Completed Contest";
                break;
            case "4": 
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

    $sql="SELECT c.* from contest c, contest_users cu where (cu.c_id=c.id and cu.u_id='$USER_ID') or (c.end_date < '$date' and cu.c_id=c.id and cu.u_id='$USER_ID') group by c.id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $e_contest[] = $row;
        }
    }
    $sql="SELECT c.id from contest c, contest_users cu where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and cu.c_id=c.id and cu.u_id='$USER_ID' group by c.id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $on_contest[] = $row;
        }
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
            <?php print_r($on_contest); ?>
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
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Start Date</th>
                             <th>Start Time</th>
                             <th>End Date</th>
                            <th>End Time</th>
                            <th>Prize</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($contest)) 
                            {
                                $i = 1;
                                foreach ($contest as $detail) 
                                {     
                     ?> 
                                     <tr> 
                                         <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td> 
                                         <td style="  text-align: center; " id="start_date<?=$i?>"><?=$detail['start_date'];?></td>
                                         <td style="  text-align: center; " id="start_time<?=$i?>"><?=$detail['start_time'];?></td>
                                         <td style="  text-align: center; " id="end_date<?=$i?>"><?=$detail['end_date'];?></td>
                                         <td style="  text-align: center; " id="end_time<?=$i?>"><?=$detail['end_time'];?></td>
                                         <td style="  text-align: center; " id="prize<?=$i?>"><?=$detail['prize'];?></td>
                                         <td>
                                        <a href="songs?token=<?=$detail['id']?>" class="btn btn-primary"> <i class="fa fa-music ">Songs</i> </a>
                                        <form method="post">
                                        <?php
                                            if(isset($e_contest))
                                            {
                                                foreach($e_contest as $data)
                                                {
                                                    $selected=" ";
                                                    if($detail['id']==$data['id'])
                                                    {
                                                        $selected="selected";
                                                    }
                                        ?>
                                                    <a href="video?token=<?=$detail['id']?>" class="btn btn-warning"><i class="fa fa-video-camera">Video</i></a>
                                                    <a href="#" class="btn btn-success"><i class="fa fa-check">Enrolled</i></a>

                                        <?php
                                                }
                                            }
                                            if(isset($on_contest))
                                            {
                                                foreach($on_contest as $data)
                                                {
                                                    $selected=" ";
                                                    if($detail['id']!=$data['id'])
                                                    {
                                                        $selected="selected";
                                                    }
                                        ?>
                                                    <a href="video?token=<?=$detail['id']?>" class="btn btn-success"><i class="fa fa-check">Enroll</i></a>

                                        <?php
                                                }
                                            }
                                        ?>
                                        </form>
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



