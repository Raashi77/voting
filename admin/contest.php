<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['delete']))
        {
            $id=$_POST['delete'];
            $sql = "delete from contest where id=$id";
            
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
    
    if(isset($_GET['token'])&&!empty($_GET['token']))
    {
        $date=date('Y-m-d');
        $token = $_GET['token'];
        switch ($token) {
            case '1':
                $sql="SELECT * from contest";
                $title ="All Contest";
                break;
            case  "2":
                $sql="SELECT * from contest where (start_date = '$date' and start_time <= '$time') or (start_date < '$date' and end_date > '$date') or (end_date = '$date' and end_time >= $time')";
                $title ="Ongoing Contests";
                break; 
            case "3": 
                $sql="SELECT * from contest where (start_date = '$date' and start_time > '$time') or (start_date > '$date')";
                $title="Upcoming Contest";
                break;
            case "4": 
                $sql="SELECT * from contest where (end_date < '$date') or (end_date = '$date' and end_time < '$time')";
                $title="Completed Contest";
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
                <a href="contestaddedit" class="btn btn-primary"><i class="fa fa-plus"></i></a>
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
                                            <a href="viewcontest?token=<?=$detail['id']?>" class="btn btn-primary"> <i class="fa fa-eye">View</i> </a>
                                            <a href="contestaddedit?token=<?=$detail['id']?>" class="btn btn-success" value="<?=$detail['id']?>"> <i class="fa fa-edit">Edit</i> </a>
                                            <button  class="btn btn-danger" type="submit" name="delete" value="<?=$detail['id']?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
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



