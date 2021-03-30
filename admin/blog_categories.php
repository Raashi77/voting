<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['delete']))
        {
            $id=$conn->real_escape_string($_POST['delete']);
            
            $sql="delete from blog_categories where id=$id";
            if($conn->query($sql))
            {
                $resSubject=true;   
            }
            else
            {
                $errorSubject=$conn->error;
            }
        }
        
        if(isset($_POST['add']))
        {
            $category=$conn->real_escape_string($_POST['catName']);
            $color=$conn->real_escape_string($_POST['catColor']);
            $sql="insert into blog_categories(category, color) values('$category', '$color')";
            if($conn->query($sql))
            {
                    $resSubject = "true";
            }
            else
            {
                $errorSubject=$conn->error;
            }
        }
        
        if(isset($_POST['edit']))
        {
            $category=$conn->real_escape_string($_POST['ecatName']);
            $color=$conn->real_escape_string($_POST['ecatColor']);
            $id=$conn->real_escape_string($_POST['ecatid']);
            
            $sql="update blog_categories set category='$category', color='$color' where id=$id";
            if($conn->query($sql))
            {
                    $resSubject = "true";
            }
            else
            {
                $errorSubject=$conn->error;
            }
        }
    }
        
    $sql="select * from blog_categories";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $blog_categories[] = $row;
        }
    } 
?>

<style>
.box-body {
    overflow: auto !important;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Categories
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <button title="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i
                            class="fa fa-plus"></i></button>
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i
                            class="fa fa-refresh"></i></a>
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
        <div class="alert alert-success"><strong>Success! </strong> your request successfully updated. </div>
        <?php
            }
            else if(isset($errorSubject))
            {
        ?>
        <div class="alert alert-danger"><strong>Error! </strong><?=$error?></div>
        <?php
                
            }
        ?>

        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th style="width:70%"> Facility Name</th>
                            <th style="width:70%"> Color Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        
                            if (isset($blog_categories)) 
                            {
                                $i = 1;
                                foreach ($blog_categories as $detail) 
                                {    
                                
                     ?>

                        <tr>
                            <td><?= $i;?></td>
                            <td style="  text-align: center; " id="category<?=$i?>"><?=$detail['category'];?></td>
                            
                            <td style="  text-align: center; " id="catcolor<?=$i?>"><?=$detail['color'];?></td>
                            <td>

                                <form method="post">
                                    <button name="confirm" type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-edit" onclick="setEditValues(<?=$detail['id'] ?>,<?=$i?>)"
                                        value="<?=$detail['id'] ?>">
                                        <i class="fa fa-edit">Edit</i>
                                    </button>
                                    <button class="btn btn-danger"  onclick="return confirm('Do You Really Want To Delete This?')" type="submit" name="delete"
                                        value="<?=$detail['id']?>">
                                        <i class="fa fa-trash"></i> Delete
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


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name</label><br>
                                <input type="text" id="catName" name="catName" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color</label><br>
                                <input type="color" id="catColor" name="catColor" class="form-control">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary" value="">Add</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facility Name</label><br>
                                <input type="text" id="ecatName" name="ecatName" class="form-control">
                                <input type="hidden" id="ecatid" name="ecatid" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color</label><br>
                                <input type="color" id="ecatColor" name="ecatColor" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary" value="">Edit</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>


<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>



<?php
    require_once 'js-links.php';
?>

<script>
function setEditValues(id, count) {
    $("#ecatid").val(id);
    $("#ecatName").val($("#category" + count).html());
    $("#ecatColor").val($("#catcolor" + count).html());

}
</script>