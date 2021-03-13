<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';

$id=$_SESSION['id'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['delete'])) 
    {
        $id = $conn->real_escape_string($_POST['delete']); 
        $select = "select * from blogs where id=$id";
        $result = $conn->query($select);
        $var = "";
        if ($result->num_rows > 0) 
        {
            if ($row = $result->fetch_assoc()) 
            {
                $var = $row['image'];
            }
        }
        $filename = "uploads/" . $var;
        unlink($filename);                
        $sql = "delete from blogs where id=" . $id;
    
        if ($conn->query($sql)) 
        {
            $success = true;
        } 
        else 
        {
            $error = true;
        }
    }

    if(isset($_POST['verify']))
    {
        $id=$conn->real_escape_string($_POST['verify']);
        
        $sql="update blogs set status='1' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
    }


    if(isset($_POST['enable']))
    {
        $id=$conn->real_escape_string($_POST['enable']);
        
        $sql="update blogs set status='1' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
    }

    if(isset($_POST['reject']))
    {
        $reasons=$conn->real_escape_string($_POST['reasons']);
        $id=$conn->real_escape_string($_POST['eid']);
        $sql="update blogs set status='3' , reason='$reasons' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
    }

    if(isset($_POST['block']))
    {
        $reasons=$conn->real_escape_string($_POST['reasons']);
        $id=$conn->real_escape_string($_POST['eid']);
        $sql="update blogs set status='2', reason='$reasons' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
        
    }
    

    if(isset($_POST['approve']))
    {
        $id=$conn->real_escape_string($_POST['approve']);
        // $reason=$conn->real_escape_string($_POST['reason']);
        $sql="update blogs set status='1' , reason='' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
    }

    if(isset($_POST['archive']))
    {
        $id=$conn->real_escape_string($_POST['archive']);
        // $reason=$conn->real_escape_string($_POST['reason']);
        $sql="update blogs set status='4' where id=$id";
        if($conn->query($sql))
        {
            $resPost=true;   
        }
        else
        {
            $errorPost=$conn->error;
        }
    }

}

if(isset($_GET['token']) && !empty($_GET['token'])){ 
    $a = $_GET['token'];    
    if($a == 1){
        $sql = "select b.*,bc.category from blogs as b, blog_categories as bc where bc.id=b.category and b.status='0'";
        $displayTitle='Pending Blogs';
    }
    if($a == 2){
        $sql = "select b.*,bc.category from blogs as b, blog_categories as bc where bc.id=b.category and b.status='1'";
        $displayTitle='Verified Blogs';
    }
    if($a == 3){
        $sql = "select b.*,bc.category from blogs as b, blog_categories as bc where bc.id=b.category and b.status='2'";
        $displayTitle='Blocked Blogs';
    }
    if($a == 4){
        $sql = "select b.*,bc.category from blogs as b, blog_categories as bc where bc.id=b.category and b.status='3'";
        $displayTitle='Rejected Blogs';
    }
    elseif($a ==5){
        $sql = "select b.*,bc.category from blogs as b, blog_categories as bc where bc.id=b.category and b.status='4'";
        $displayTitle='Archive Blogs';
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            $details[] = $row;
        }
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$displayTitle?>
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <a href="createEditBlog" title="" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
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
            if(isset($success))
            {
        ?>
        <div class="alert alert-success"><strong>Success! </strong> your request successfully updated.</div>
        <?php
            }
            else if(isset($error))
            {
        ?>
        <div class="alert alert-danger"><strong>Error! </strong>Due to some reason.</div>
        <?php
            }
        ?>

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Category</th>
                            <?php
                            if(isset($a) && ($a==4 || $a==3)){ 
                            ?>
                            <th>Reason</th>
                            <?php
                            }
                            ?>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        if (isset($details)) 
                        {
                            $i = 1;
                            foreach ($details as $detail) 
                            {
                     ?>
                        <tr>
                            <?php 
                            ?>
                            <td><?=$i;?></td>
                            <td><img src="<?=$detail['image']; ?>" width="150" height="100" /></td>
                            <td id="name<?= $i ?>"><?=$detail['name']; ?></td>
                            <td id="title<?= $i; ?>"><?=$detail['title']; ?></td>
                            <td id="tags<?= $i; ?>"><?=$detail['tags']; ?></td>
                            <td id="cat<?= $i; ?>"><?=$detail['category']; ?></td>
                            <?php
                            if(isset($a) && ($a==4 || $a==3)){ 
                            ?>
                            <td style="  text-align: center; " id="reason<?=$i?>"><?=$detail['reason'];?></td>
                            <?php
                            }
                            ?>

                            <td>
                                <form method="post">
                                    <?php if(isset($_GET['token']) && !empty($_GET['token'])){ 
                                    $a = $_GET['token'];
                                    if($a == 1)
                                    {?>

                                    
                                    <a type="button" href="createEditBlog?token=<?= $detail['id'] ?>"
                                        class="btn btn-success"><i class="fa fa-edit"></i>Edit
                                    </a>
                                    
                                    <button name="delete" class="btn btn-danger"
                                        onclick="return confirm('Do You Really Want To Delete This?')"
                                        value="<?= $detail['id'] ?>"><i class="fa fa-trash"></i>Delete
                                    </button>

                                    <?php
                                    }
                                    if($a == 2)
                                    {?>
                                    <a type="button" href="createEditBlog?token=<?= $detail['id'] ?>"
                                        class="btn btn-success"><i class="fa fa-edit"></i>Edit
                                    </a>
                                    <button class="btn btn-primary" type="submit" name="archive"
                                        value="<?=$detail['id']?>">
                                        <i class="fa fa-archive"></i> Archive
                                    </button>
                                    <!-- <button class="btn btn-dark" type="submit" name="block" value="<?=$detail['id']?>">
                                        <i class="fa fa-check-circle"></i> Block
                                    </button> -->
                                   
                                    <button name="delete" class="btn btn-danger"
                                        onclick="return confirm('Do You Really Want To Delete This?')"
                                        value="<?= $detail['id'] ?>"><i class="fa fa-trash"></i>Delete
                                    </button>
                                    <?php
                                    }
                                    if($a == 3)
                                    {?>
                                    <button class="btn btn-primary" type="submit" name="approve"
                                        value="<?=$detail['id']?>">
                                        <i class="fa fa-check-circle"></i> Enable
                                    </button>
                                    <a type="button" href="createEditBlog?token=<?= $detail['id'] ?>"
                                        class="btn btn-success"><i class="fa fa-edit"></i>Edit
                                    </a>
                                    <button name="delete" class="btn btn-danger"
                                        onclick="return confirm('Do You Really Want To Delete This?')"
                                        value="<?= $detail['id'] ?>"><i class="fa fa-trash"></i>Delete
                                    </button>
                                    <?php
                                    }
                                    if($a == 4)
                                    {?>
                                    <button class="btn btn-success" type="submit" name="approve"
                                        value="<?=$detail['id']?>">
                                        <i class="fa fa-check-circle"></i> Approve
                                    </button>
                                    <a type="button" href="createEditBlog?token=<?= $detail['id'] ?>"
                                        class="btn btn-primary"><i class="fa fa-edit"></i>Edit
                                    </a>
                                    <button name="delete" class="btn btn-danger"
                                        onclick="return confirm('Do You Really Want To Delete This?')"
                                        value="<?= $detail['id'] ?>"><i class="fa fa-trash"></i>Delete
                                    </button>
                                    <?php
                                    }
                                    if($a == 5)
                                    {?>
                                    <button class="btn btn-primary" type="submit" name="enable"
                                        value="<?=$detail['id']?>">
                                        <i class="fa fa-check-circle"></i> Restore
                                    </button>
                                    <a type="button" href="createEditBlog?token=<?= $detail['id'] ?>"
                                        class="btn btn-success"><i class="fa fa-edit"></i>Edit
                                    </a>
                                    <button name="delete" class="btn btn-danger"
                                        onclick="return confirm('Do You Really Want To Delete This?')"
                                        value="<?= $detail['id'] ?>"><i class="fa fa-trash"></i>Delete
                                    </button>
                                    <?php
                                    }
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

<div class="modal fade" id="modal-reject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Reason Of Rejection</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea placeholder="Rejection reason" id="reasons" name="reasons" rows="5"
                                cols="60"></textarea>
                        </div>
                        <input type="hidden" id="eid" name="eid" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="reject" class="btn btn-primary" value="">Reject</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<div class="modal fade" id="modal-block">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Reason Of Block</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea placeholder="Block reason" id="reasons" name="reasons" rows="5" cols="60">
                                </textarea>
                        </div>
                        <input type="hidden" id="id" name="eid" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="block" class="btn btn-primary" value="">Block</button>
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

<script>
function setEditValues(id) {
    $("#eid").val(id);
    $("#id").val(id);
}
</script>