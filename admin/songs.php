<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['delete']))
        {
            $id=$_POST['delete'];
            $sql = "delete from songs where id=$id"; 
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
            $sql = "update songs set status=2 where id=$id";
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
            $sql = "update songs set status=1 where id=$id";
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
    
    $sql="SELECT * from songs";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $songs[] = $row;
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
            Songs
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <a href="songadd" class="btn btn-primary"><i class="fa fa-plus"></i></a>
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
                                         <td><audio controls="controls" src="<?=$detail['song']?>"></audio></td>
                                         <td>
                                        <form method="post">
                                            <button  class="btn btn-danger" type="submit" name="delete" value="<?=$detail['id']?>">
                                                <i class="fa fa-trash-o"></i> Delete
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


