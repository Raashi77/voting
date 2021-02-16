<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';
 
$sql="SELECT count(c.id) as count from contest c where ((c.start_date = '$date' and c.start_time > '$time') or (c.start_date > '$date')) group by c.id";
if($result =  $conn->query($sql))
{
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
            $e_contest = $row['count'];
    }
}

$sql="SELECT count(id) as count from winner where u_id='$USER_ID'";
if($result =  $conn->query($sql))
{
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
            $w_contest = $row['count'];
    }
}

$date=date('Y-m-d');
$time = date('H:i');
$sql="SELECT c.* from contest c, contest_users cu where cu.c_id=c.id and cu.u_id='$USER_ID' group by c.id limit 8";
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
            <div class="col-md-6">
                <a href="contest?token=1" style="background-color: white;">
                    <div class="info-box mb-3 bg-green">
                        <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Upcoming Contests</span>
                            <span class="info-box-number"><?=$e_contest?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#" style="background-color: white;">
                    <div class="info-box mb-3 bg-red">
                        <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>
                        <div class="info-box-content" style="color: white;">
                            <span class="info-box-text">Contest Won</span>
                            <span class="info-box-number"><?=$w_contest?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent" style="background-color: #343a40;">
                        <h3 class="card-title" style="color: white;">Enrolled Contests</h3>
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
                            <a href="contest?token=4" class="btn btn-sm btn-info float-right">View All Contests</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="control-sidebar-bg"></div>
<?php
require_once 'js-links.php';
?>