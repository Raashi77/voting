<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    
    $date=date('Y-m-d');
    $time = date('H:i');
    
    $sql="SELECT c.* from contest c where (c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $contest[] = $row;
        }
    }

    $sql="SELECT cu.c_id as id from contest_users cu, contest c where cu.u_id='$USER_ID' and cu.c_id=c.id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $one_contest[] = $row;
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
            Ongoing Contest
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
 
                                    <tr> 
                                        <th style="  text-align: center; background-color: black; color: white;" >S.No</th>
                                        <th style="  text-align: center; background-color: black; color: white;" id="sno<?=$i?>"><?=$i?></th>  
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
                                        <th style="  text-align: center; background-color: #808080; color: white; " id="start_date"><?=$detail['start_date'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Start Time</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="start_time"><?=$detail['start_time'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >End Date</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="end_date"><?=$detail['end_date'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >End Time</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="end_time"><?=$detail['end_time'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Prize</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;" id="prize"><?=$detail['prize'];?></th>  
                                    </tr>
                                    <tr> 
                                        <th style="  text-align: center; background-color: #212529; color: white;" >Action</th>
                                        <th style="  text-align: center; background-color: #808080; color: white;">
                                    <?php
                                        if(isset($one_contest))
                                        {
                                            foreach($one_contest as $data)
                                            {
                                                if($data['id']==$detail['id'])
                                                {
                                    ?>
                                                    <a href="#" class="btn btn-success"><i class="fa fa-check">Enrolled</i></a>
                                                    <a href="video?token=<?=$detail['id']?>" class="btn btn-warning"><i class="fa fa-video-camera">Video</i></a>
                                    <?php
                                                }
                                                else
                                                {
                                    ?>
                                                    <a href="video?token=<?=$detail['id']?>" class="btn btn-success"><i class="fa fa-check">Enroll</i></a>
                                                  
                                    <?php
                                                }
                                            }
                                        }
                                        else
                                        {
                                    ?>
                                            <a href="video?token=<?=$detail['id']?>" class="btn btn-success"><i class="fa fa-check">Enroll</i></a>
                                    <?php
                                        }
                                    ?>  
                                    </th>  
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
      
<div class="control-sidebar-bg"></div>


<?php
    require_once 'js-links.php';
?>



