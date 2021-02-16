<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['remove']))
        {
            $id=$_POST['remove'];
            $sql = "delete from contest_users where id=$id"; 
            if($conn->query($sql))
            {
                
                $errorMember=$conn->error;
            } 
            else
            {
                $errorMember=$conn->error;
            }  
        }  

        if(isset($_POST['block']))
        {
            $id=$_POST['block'];
            $sql = "update contest_users set status=2 where id=$id";
            if($conn->query($sql))
            {
                $resMember=true;   
            }
            else
            {
                $errorMember=$conn->error;
            }
        }  

        if(isset($_POST['unblock']))
        {
            $id=$_POST['unblock'];
            $sql = "update contest_users set status=1 where id=$id";
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
        $token = $_GET['token'];
        switch ($token) {
            case '1':
                $sql="SELECT u.name,u.email, cu.status, u.ip_address, cu.votes,c.name as cname,cu.id from contest_users cu, contest c,users u where cu.c_id=c.id and u.id=cu.u_id";
                $title ="All";
                break;
            case  "2":
                $sql="SELECT u.name,u.email, cu.status, u.ip_address, cu.votes,c.name as cname,cu.id from contest_users cu, contest c,users u where cu.c_id=c.id and cu.status=2 and u.id=cu.u_id ";
                $title ="Blocked";
                break; 
            case "3": 
                $sql="SELECT u.name,u.email, cu.status, u.ip_address, cu.votes,c.name as cname,cu.id from contest_users cu, contest c,users u where cu.c_id=c.id and cu.status=1 and u.id=cu.u_id";
                $title="Unblocked";
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
                $contest_users[] = $row;
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
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Votes</th>
                             <th>IP Address</th>
                             <th>Contest</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($contest_users)) 
                            {
                                $i = 1;
                                foreach ($contest_users as $detail) 
                                {     
                     ?> 
                                     <tr> 
                                         <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td>
                                         <td style="  text-align: center; " id="email<?=$i?>"><?=$detail['email'];?></td>
                                         <td style="  text-align: center; " id="votes<?=$i?>"><?=$detail['votes'];?></td>
                                         <td style="  text-align: center; " id="ip_address<?=$i?>"><?=$detail['ip_address'];?></td>
                                         <td style="  text-align: center; " id="cname<?=$i?>"><?=$detail['cname'];?></td>
                                         <td>
                                        <form method="post">
                                            <a href="viewcontestusers?token=<?=$detail['id']?>" class="btn btn-primary"> <i class="fa fa-eye">View</i> </a>
                                            <button  class="btn btn-danger" type="submit" name="remove" value="<?=$detail['id']?>">
                                                <i class="fa fa-trash-o"></i> Remove Participant
                                            </button>
                                        <?php
                                            if($detail['status']==1) 
                                            {       
                                        ?>
                                            <button  class="btn btn-warning" type="submit" name="block" value="<?=$detail['id']?>">
                                                <i class="fa fa-ban"></i> Block
                                            </button>
                                        <?php
                                            }
                                            else if($detail['status']==2) 
                                            {       
                                        ?>
                                            <button  class="btn btn-success" type="submit" name="unblock" value="<?=$detail['id']?>">
                                                <i class="fa fa-check"></i> Unblock
                                            </button>
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

<script>
    function setEditValues(id,count)
    {
        $("#eid").val(id); 
        $("#ename").val($("#name"+count).html());
        $("#eemail").val($("#email"+count).html());
        $("#enum").val($("#num"+count).html());
        $("#evideo").val($("#video"+count).html());
    }  
</script>


