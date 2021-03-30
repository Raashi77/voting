<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';

if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
     
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

    $sql="select * from voters where cu_id=$token";
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
    
    $sql="select v.* from videos v, contest_users cu where cu.id=$token and cu.u_id=v.u_id";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $videos[] = $row;
            }
        }
    }      

    $sql="select u.name, u.email, u.ip_address, cu.votes, cu.id from contest_users cu, users u where cu.id='$token' and cu.u_id=u.id";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
                $contest_user = $row;
        }
    }

}
         
?>
<div class="content-wrapper">
<section class="content-header">
        <h1>
            User Details
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
                        if (isset($contest_user)) 
                        {
                    ?>
                    
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Name</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="name<?=$i?>"><?=$contest_user['name'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white; " >Votes</th>
                                <th style="  text-align: center; background-color: #808080; color: white;" id="votes"><?=$contest_user['votes'];?></th>  
                            </tr>
                            <tr> 
                                <th style="  text-align: center; background-color: #212529; color: white;" >Email</th>
                                <th style="  text-align: center; background-color: #808080; color: white; " id="email"><?=$contest_user['email'];?></th>  
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
       
        <br>
        <h2>Videos</h2>
        <br>
        <div class="box-body">
        <?php
            if(isset($videos))
            {
                foreach($videos as $data)
                {
        ?>
                    <iframe width="560" height="315" src="../<?=$data['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <button type="button"  onclick="return confirm('Do You Really Want To Delete This?')" class="btn btn-danger deleteBtn" onclick="deleteFile(<?=$data['id']?>,'data<?=$counter?>', '<?=$data['video']?>')"><i class="fa fa-trash"></i></button>
        <?php
                }
            }
        ?>
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
                             <th>Email</th>
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
                                         <td style="  text-align: center; " id="email<?=$i?>"><?=$detail['email'];?></td>
                                         <td style="  text-align: center; " id="ip_address<?=$i?>"><?=$detail['ip_address'];?></td>
                                         <td>
                                        <form method="post">
                                            <button  class="btn btn-danger"  onclick="return confirm('Do You Really Want To Delete This?')" type="submit" name="delete_voter" value="<?=$detail['id']?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
                                        <?php
                                            if($detail['status']==1) 
                                            {       
                                        ?>
                                            <button  class="btn btn-warning" type="submit" name="block_voter" value="<?=$detail['id']?>">
                                                <i class="fa fa-ban"></i> Block
                                            </button>
                                        <?php
                                            }
                                            else if($detail['status']==2) 
                                            {       
                                        ?>
                                            <button  class="btn btn-dark" type="submit" name="unblock_voter" value="<?=$detail['id']?>">
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
        
        
        
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
    
  <?php
    require_once 'js-links.php';
  ?>

  <script>
    function deleteFile(id,divId, video)
    {
        $.ajax({
        url:"deleteuservideo.php",
        type:"POST", 
        data:{
            id:id,
            deleteVideo:video,
            video:video
        },
            success:function(data)
            {
            
                if(data.trim()=="ok")
                {
                    $("#"+divId).remove();  
                    videoCounter--;
                    disableVideoDelete(videoCounter);
                }else
                {
                    console.log(data);
                }
            },
            error:function()
            {

            }
        
        })
    }
  </script>