<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';

$sql="SELECT count(id) as count from users";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $users=$row['count']; 
    }

} 
//fetching blocked comapnies
$sql="SELECT count(id) as count from contest_users";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $c_users=$row['count']; 
    }

} 

$sql="SELECT count(id) as count from contest";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $contest=$row['count']; 
    }
}

$sql="SELECT count(id) as count from voters";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $voters=$row['count']; 
    }
}
$sql="SELECT count(id) as count from from contest where (end_date < '$date') or (end_date = '$date' and end_time < '$time')";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $c_contest=$row['count']; 
    }
}
$sql="SELECT count(id) as count from contest where (start_date = '$date' and start_time > '$time') or (start_date > '$date')";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc(); 
        $u_contest=$row['count']; 
    }
}

$date=date('Y-m-d');
$time = date('H:i');
$sql="SELECT * from contest where (start_date = '$date' and start_time <= '$time') or (start_date < '$date' and end_date > '$date') or (end_date = '$date' and end_time >= '$time')";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $cdetails[]=$row; 
        }
        
    }
}

$sql = "SELECT sum(price) as earning from payment where status = 'successful'";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $earn =$result->fetch_assoc();
    }
}


$sql="select c.name as cname, cu.votes, u.name from contest c, contest_users cu, users u, winner w where w.u_id=u.id and w.u_id=cu.u_id and w.c_id=c.id order by w.id desc limit 5";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $winners[]=$row; 
        }
        
    }
}

if(isset($_POST['change']))
{
    $color=$_POST['color'];
    $sql="UPDATE theme_color set base_color='$color' where id=1";
    if($conn->query($sql))
    {
        $resMember=true;
    }
    else
    {
        $errorMember=$conn->error;
    }
}

$sql="select * from theme_color where id=1";
if($result=$conn->query($sql))
{
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
            $theme=$row; 
    }
}

$sql = "SELECT p.*,u.name from payment p,users u where p.status='successful' and p.user=u.id  order by p.id desc limit 5";
if($result=$conn->query($sql))
{
    // echo "hello";
    if($result->num_rows>0)
    {
        // echo "hellpo";
        while($row=$result->fetch_assoc())
        {
            $transaction[] = $row;
        }
    }
}
else
{
    $error =  $conn->error;
}


?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- overview section -->

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info" style="background-color: #17a2b8">
                <div class="inner">
                    <h3><?=$contest?></h3>

                    <p>Contests</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tasks"></i>
                </div>
                <a href="contest?token=1" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" style="background-color: #ffc107">
                <div class="inner">
                    <h3><?=$users?></h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
                <a href="users?token=1" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger" style="background-color: #dc3545">
                <div class="inner">
                    <h3><?=$c_users?></h3>

                    <p>Contest Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="contestusers?token=1" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6" >
                <!-- small box -->
                <div class="small-box bg-danger" style="background-color: #00C851">
                <div class="inner">
                    <h3 ><?=$earn['earning']?></h3>

                    <p>Total Earning</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
                <a href="#"  class="small-box-footer">View Transactions <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent" style="background-color: #343a40;">
                        <h3 class="card-title" style="color: white;">OnGoing Contests</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0" style="border-spacing: 2px;  font-size: 16px;">
                                <thead style="font-weight: 800; background-color: #6c757d; color: white;">
                                    <tr>
                                        <th style="text-align: center;">S.no.</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Start Date</th>
                                        <th style="text-align: center;">Start Time</th>
                                        <th style="text-align: center;">End Date</th>
                                        <th style="text-align: center;">End Time</th>
                                        <th style="text-align: center;">Prize</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                        if(isset($cdetails))
                                        {
                                            $i=1;
                                            foreach($cdetails as $data)
                                            {
                                    ?>
                                                <tr>
                                                    <td style="padding: 12px; color: #17a2b8;"><?=$i?></td>
                                                    <td style="padding: 12px;"><?=$data['name']?></td>
                                                    <td style="padding: 12px;"><?=$data['start_date']?></td>
                                                    <td style="padding: 12px;"><?=$data['start_time']?></td>
                                                    <td style="padding: 12px;"><?=$data['end_date']?></td>
                                                    <td style="padding: 12px;"><?=$data['end_time']?></td>
                                                    <td style="padding: 12px;"><?=$data['prize']?></td>
                                                </tr>
                                    <?php
                                                $i++;
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="contest?token=1" class="btn btn-sm btn-info float-right">View All Contests</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color: black; color:white;">
                            <h3 class="card-title">Winners</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Contest</th>
                                <th>Winner</th>
                                <th style="width: 40px">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if(isset($winners))
                                    {
                                        $i=1;
                                        foreach($winners as $data)
                                        {
                                ?>
                                                            
                                            <tr>
                                            <td><?=$i?></td>
                                            <td><?=$data['cname']?></td>
                                            <td>
                                                <?=$data['name']?>
                                            </td>
                                            <td><?=$data['votes']?></td>
                                            </tr>
                                <?php
                                        $i++;    
                                        }
                                    }
                                ?>
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                <a href="users?token=1" style="background-color: white;">
                    <div class="info-box mb-3 bg-blue">
                        <span class="info-box-icon"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Upcoming Contests</span>
                            <span class="info-box-number"><?=$u_contest?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
            </div>
            <div class="col-md-5">
                <a href="contestusers?token=1" style="background-color: white;">
                    <div class="info-box mb-3 bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Completed Contests</span>
                            <span class="info-box-number"><?=$c_contest?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                        <div class="card-header" style="background-color:gray; color:white;">
                            <h3 class="card-title">Transactions</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th >#</th>
                                <th>Transaction ID</th>
                                <th>Song</th>
                                <th>User</th>
                                <th >Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if(isset($transaction))
                                    {
                                        $i=1;
                                        foreach($transaction as $data)
                                        {
                                            $song = $data['song_id'];
                                            $sql = "SELECT * from songs where id='$song'";
                                            if($result=$conn->query($sql))
                                            {
                                                if($result->num_rows>0)
                                                {
                                                    $name = $result->fetch_assoc();
                                                }
                                            }
                                ?>
                                                            
                                            <tr>
                                            <td><?=$i?></td>
                                            <td><?=$data['gateway_ref']?></td>
                                            <td><?=$name['name']?></td>
                                            <td>
                                                <?=$data['name']?>
                                            </td>
                                            <td>$ <?=$data['price']?></td>
                                            </tr>
                                <?php
                                        $i++;    
                                        }
                                    }
                                ?>
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>
<button title="" id="modalcolor" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></button>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change Theme Color</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color</label><br>
                                <input type="color" id="color" name="color" value="<?=$theme['color']?>"  class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="change" class="btn btn-primary" value="">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="control-sidebar-bg"></div>
<?php
require_once 'js-links.php';
?>
<script>
    function thememodal()
    {
        $("#modalcolor").trigger("click");
    }
</script>