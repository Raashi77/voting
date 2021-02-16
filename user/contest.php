<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    
    if(isset($_GET['token'])&&!empty($_GET['token']))
    {
        $date=date('Y-m-d');
        $time = date('H:i');
        $token = $_GET['token'];
        switch ($token) 
        {
            case  "1":
                $sql="SELECT * from contest where (start_date = '$date' and start_time <= '$time') or (start_date < '$date' and end_date > '$date') or (end_date = '$date' and end_time >= '$time')";
                $title ="Ongoing Contests";
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

    $sql="SELECT c.* from contest c, contest_users cu where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and cu.c_id=c.id and cu.u_id='$USER_ID' group by c.id";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $on_contest[] = $row;
            }
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
                             <th>Description</th>
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
                                         <td style="  text-align: center; " id="description<?=$i?>"><?=$detail['description'];?></td>
                                         <td style="  text-align: center; " id="start_date<?=$i?>"><?=$detail['start_date'];?></td>
                                         <td style="  text-align: center; " id="start_time<?=$i?>"><?=$detail['start_time'];?></td>
                                         <td style="  text-align: center; " id="end_date<?=$i?>"><?=$detail['end_date'];?></td>
                                         <td style="  text-align: center; " id="end_time<?=$i?>"><?=$detail['end_time'];?></td>
                                         <td style="  text-align: center; " id="prize<?=$i?>"><?=$detail['prize'];?></td>
                                         <td>
                                        <form method="post">
                                            <?php
                                            if(isset($on_contest))
                                            {
                                                foreach($on_contest as $data)
                                                {
                                                    if($data[id]==$detail['id'])
                                                    {
                                                        ?>
                                                        <a href="#" class="btn btn-success"> <i class="fa fa-check ">Enrolled</i> </a>
                                                        <a href="video?token=<?=$detail['id']?>" class="btn btn-primary"> <i class="fa fa-check ">Video</i> </a>
                                                        <?php
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="video?token=<?=$detail['id']?>" class="btn btn-success"> <i class="fa fa-check ">Enroll</i> </a>
                                                <?php
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

  

<?php
    require_once 'js-links.php';
?>



