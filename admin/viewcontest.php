<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';

if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    $sql="select * from contest where id='$token'";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
            $contest=$row;
        }
    }
    if(isset($_POST['remove']))
    {
        $id=$_POST['remove'];
        $sql = "delete from contest_users where id=$id";
        
        if($conn->query($sql))
        {
           $resMember=true;
        }
        else
        {
            $errorMember=$conn->error;
        }
    }  
    if(isset($_POST['delete_song']))
    {
        $id=$_POST['delete_song'];
        $sql = "delete from contest_songs where id=$id";
        
        if($conn->query($sql))
        {
           $resMember=true;
        }
        else
        {
            $errorMember=$conn->error;
        }
    }  
    if(isset($_POST['delete_voter']))
    {
        $id=$_POST['delete_voter'];
        $sql = "delete from voters where id=$id";
        if($conn->query($sql))
        {
            $sql = "update contest_users cu, voters v set cu.votes=CAST(cu.votes as UNSIGNED)-1 where v.cu_id=cu.id";
            if($conn->query($sql))
            {
                $resMember=true;
            }
            else
            {
                $errorMember=$conn->error;
            }
        }
        else
        {
            $errorMember=$conn->error;
        }
    }  

    if(isset($_POST['block_user']))
    {
        $id=$_POST['block_user'];
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

    if(isset($_POST['unblock_user']))
    {
        $id=$_POST['unblock_user'];
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
    if(isset($_POST['save']))
    {
        $id=$_POST['win'];
        $sql="delete from winner where c_id='$token'";
        if($conn->query($sql))
        {
            $sql = "insert into winner(c_id, u_id, status) values('$token', '$id', 1)";
            if($conn->query($sql))
            {
                $resMember=true;   
            }
            else
            {
                $errorMember=$conn->error;
            }   
        }
        else
        {
            $errorMember=$conn->error;
        }
    }    

    $sql="select u.email, u.name, u.ip_address, cu.votes, cu.id, cu.status from contest_users cu, users u where cu.c_id='$token' and cu.u_id=u.id";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $users[] = $row;
            }
        }
    }

    $sql="select * from winner where c_id='$token'";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
                $swinner = $row;
        }
    }

    $sql="select v.*, u.name as contestant from voters v, contest_users cu, users u where v.c_id='$token' and v.cu_id=cu.id and cu.u_id=u.id";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $voters[] = $row;
            }
        }
    }
    $sql="select * from contest_songs where c_id='$token'";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $songs[] = $row;
            }
        }
    }

    $sql="SELECT u.name, u.email, u.ip_address, cu.votes FROM contest_users cu, users u WHERE cu.c_id='$token' and cu.u_id=u.id and cu.votes=(SELECT MAX(votes) FROM contest_users where c_id='$token')";
    if($result=$conn->query($sql))
    {
          
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $winner[] = $row;
            }
        }   
    }
                   

}
         
?>
<div class="content-wrapper">
<section class="content-header">
        <h1>
            Contest Details
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <!-- <button title="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></button>  -->
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
    </section>

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
       
        
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <tbody>
                    <?php
                        if (isset($contest)) 
                        {
                    ?>
                    
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Name</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="name<?=$i?>"><?=$contest['name'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white; " >Description</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="description"><?=$contest['description'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Start Date</th>
                                <th style="  text-align: center; background-color: #808080; color: white; " id="start_date"><?=$contest['start_date'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Start Time</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="start_time"><?=$contest['start_time'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >End Date</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="end_date"><?=$contest['end_date'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >End Time</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="end_time"><?=$contest['end_time'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Prize</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="prize"><?=$contest['prize'];?></th>  
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
        <br>
        <h2>Participants</h2>
        <br>
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>IP Address</th>
                             <th>Votes</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($users)) 
                            {
                                $i = 1;
                                foreach ($users as $detail) 
                                {     
                     ?> 
                                     <tr> 
                                         <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td> 
                                         <td style="  text-align: center; " id="email<?=$i?>"><?=$detail['email'];?></td>
                                         <td style="  text-align: center; " id="ip_address<?=$i?>"><?=$detail['ip_address'];?></td>
                                         <td style="  text-align: center; " id="votes<?=$i?>"><?=$detail['votes'];?></td>
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
                                            <button  class="btn btn-warning" type="submit" name="block_user" value="<?=$detail['id']?>">
                                                <i class="fa fa-ban"></i> Block
                                            </button>
                                        <?php
                                            }
                                            else if($detail['status']==2) 
                                            {       
                                        ?>
                                            <button  class="btn btn-dark" type="submit" name="unblock_user" value="<?=$detail['id']?>">
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
        <br>
        <h2>Voters</h2>
        <br>
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Contestant</th>
                             <th>IP Address</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
 
                    
                     <?php 
                            if (isset($voters)) 
                            {
                                $i = 1;
                                foreach ($voters as $detail) 
                                {     
                     ?> 
                                     <tr> 
                                         <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td> 
                                         <td style="  text-align: center; " id="email<?=$i?>"><?=$detail['email'];?></td>
                                         <td style="  text-align: center; " id="contestant<?=$i?>"><?=$detail['contestant'];?></td>
                                         <td style="  text-align: center; " id="ip_address<?=$i?>"><?=$detail['ip_address'];?></td>
                                         <td>
                                        <form method="post">
                                            <button  class="btn btn-danger" type="submit" name="delete_voter" value="<?=$detail['id']?>">
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
        
        <br>
        <h2>Songs</h2>
      
        <a href="contestsongadd?token=<?=$token?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <br>
        
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Song</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
 
                    
                     <?php 
                            if (isset($songs)) 
                            {
                                $i = 1;
                                foreach ($songs as $detail) 
                                {     
                     ?> 
                                     <tr> 
                                         <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td> 
                                         <td><td><audio controls="controls" src="<?=$detail['song']?>"></audio></td></td>
                                        <form method="post">
                                            <button  class="btn btn-danger" type="submit" name="delete_song" value="<?=$detail['id']?>">
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

        <br>
        <h2>Top Participant(s)</h2>
        <br>
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             <th>S.No.</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>IP Address</th>
                             <th>Votes</th>
                        </tr>
                    </thead>
                    <tbody> 
 
                    
                     <?php 
                            if (isset($winner)) 
                            {
                                $i = 1;
                                foreach ($winner as $detail) 
                                {     
                     ?> 
                                    <tr> 
                                        <td style="  text-align: center; " id="serialNo<?=$i?>"><?=$i?></td> 
                                        <td style="  text-align: center; " id="name<?=$i?>"><?=$detail['name'];?></td> 
                                        <td style="  text-align: center; " id="email<?=$i?>"><?=$detail['email'];?></td>
                                        <td style="  text-align: center; " id="ip_address<?=$i?>"><?=$detail['ip_address'];?></td>
                                        <td style="  text-align: center; " id="votes<?=$i?>"><?=$detail['votes'];?></td>
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
        <br>
        <h2>Select Winner</h2>
        <br>
    
            <div class="row">
                <div class="col-md-5"> 
                    <div class="form-group">
                    <form method="post">
                        <select name="win" id="win" class="form-control">
                        <?php
                            if(isset($users))
                            {
                                foreach($users as $data)
                                {         
                                    $selected="";
                                    if($data['u_id']==$swinner['u_id'])
                                    {
                                        $selected="selected";   
                                    }
                        ?>
                                    <option value="<?=$data['u_id']?>" <?=$selected?>><?=$data['name']?> - <?=$data['votes']?> votes</option>
                        <?php
                                    
                                }
                            }
                        ?>  
                        </select>
                        <button name="save" class="btn btn-primary" style="margin-top: 10px;">Save</button>
                    </form> 
                    </div> 
                </div>
            </div> 
    </section>
</div>


<div class="control-sidebar-bg"></div>
    
  <?php
    require_once 'js-links.php';
  ?>