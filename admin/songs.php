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
                
                $resMember=true;
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
        
        if(isset($_POST['add']))
        {
            $name=$_POST['name'];
            $sql="insert into songs(name, status) values('$name', '1')";
            if($conn->query($sql))
            {
                $insert_id = $conn->insert_id;
                if(upload_audio($_FILES,$conn,"songs","id","song",$insert_id,"projectFile",$website_link."/admin/uploads"))
                {
                    $resMember = "all_true";
                }else
                {
                    $resMember = "files_left";
                }
                 
            }
            else
            {
                $errorMember=$conn->error;
            }
        }
        
        if(isset($_POST['edit']))
        {
            $name=$_POST['ename'];
            $id = $_POST['eid'];
            $sql="update  songs set  name='$name' where id='$id'";
            if($conn->query($sql))
            { 
                if(upload_audio($_FILES,$conn,"songs","id","song",$id,"projectFile",$website_link."/admin/uploads"))
                {
                    $resMember = "all_true";
                }else
                {
                    $resMember = "files_left";
                }
                 
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
                    <button data-toggle="modal" data-target="#modal-default" class="btn btn-primary"><i class="fa fa-plus"></i></button>
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
                                            <button  class="btn btn-success" onclick="setEditValues(<?=$detail['id']?>,<?=$i?>)" type="button" data-toggle="modal" data-target="#modal-edit" >
                                                <i class="fa fa-edit"></i> Edit
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
                                <label>Name</label><br>   
                                <input type="text"  id="name" name="name" class="form-control" required>  
                            </div> 
                        </div>

                    </div> 
                    <div class="row" style="margin-bottom:20px">    
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label>Audio File</label><br>  
                                <button type="button" class="btn btn-success" onclick="$('#projectfile').click()"><i class="fa fa-plus"></i></button>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" id="filesDiv"> 
                                 
                        <input   type="file" id='projectfile' name="projectFile[]" class="form-control" style="visibility:hidden"/>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                <button type="submit" name="add" class="btn btn-primary" style="margin-top:10" value="">Add</button>
              

                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>  
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Edit Song</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Name</label><br>   
                                <input type="text"  id="ename" name="ename" class="form-control" required>  
                            </div> 
                        </div>

                    </div> 
                    <div class="row" style="margin-bottom:20px">    
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label>Audio File</label><br>  
                                <button type="button" class="btn btn-success" onclick="$('#projectfile').click()"><i class="fa fa-plus"></i></button>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" id="filesDiv"> 
                        <input type="hidden" id="eid" name="eid"/>
                        <input   type="file" id='projectfile' name="projectFile[]" class="form-control" style="visibility:hidden"/>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-primary" style="margin-top:10" value="">Add</button>
              

                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>  
  
<div class="control-sidebar-bg"></div>

  

<?php
    require_once 'js-links.php';
?>

<script type="text/javascript">
    function setEditValues(id,counter)
    {
        $("#ename").val($("#name"+counter).html());
        $("#eid").val(id);
    }
</script>
