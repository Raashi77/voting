<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';


$sql = "SELECT p.*,u.name from payment p,users u where p.status='successful' and p.user=u.id  order by p.id desc ";
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

<style>
    .box-body {
        overflow: auto !important;
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
                    
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <br>
    <section class="content">
        <?php
        if (isset($resMember)) {
        ?>
            <div class="alert alert-success"><strong>Success! </strong> your request successfully updated. </div>
        <?php
        } else if (isset($errorMember)) {
        ?>
            <div class="alert alert-danger"><strong>Error! </strong><?= $errorMember ?></div>
        <?php

        }
        ?>

        <div class="box">
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                            <th >#</th>
                            <th>Transaction ID</th>
                            <th>Song</th>
                            <th>Buyer</th>
                            <th >Amount</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        if (isset($transaction)) {
                            $i = 1;
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
                                $date = date("m/d/Y", $time_stamp);
                    ?>
                                                
                                <tr>
                                <td><?=$i?></td>
                                <td><?=$data['gateway_ref']?></td>
                                <td><?=$name['name']?></td>
                                <td>
                                    <?=$data['name']?>
                                </td>
                                <td>$ <?=$data['price']?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="setEditValues('<?= $name['name'] ?>','<?= $data['email'] ?>','<?= $data['gateway_ref'] ?>','<?=$date?>','<?= $data['payer_id'] ?>','<?= $data['name']?>','<?=$data['price']?>')" type="button" data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-eye"></i> View
                                    </button>
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
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Transaction Details</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Song Name</label><br>
                                <input type="text" id="sname" name="ename" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Price</label><br>
                                <input type="text" id="price" name="eprice" class="form-control" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Buyer</label><br>
                                <input type="text" id="buyer" name="ename" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Transaction Id</label><br>
                                <input type="text" id="transaction" name="eprice" class="form-control" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Date</label><br>
                                <input type="text" id="date" name="ename" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Payer Id</label><br>
                                <input type="text" id="payerid" name="ename" class="form-control" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Email</label><br>
                                <input type="text" id="email" name="eprice" class="form-control" disabled>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
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
<!-- setEditValues('<?= $name['name'] ?>','<?= $data['email'] ?>','<?= $data['gateway_ref'] ?>','$date','<?= $data['paayer_id'] ?>','<?= $data['name']?>','<?=$data['price']?>') -->

<script type="text/javascript">
    function setEditValues(song,email,transaction,date,payerid,buyer,price) {
        $("#sname").val(song);
        $("#price").val("$"+price);
        $("#transaction").val(transaction);
        $("#date").val(date);
        $("#email").val(email);
        $("#buyer").val(buyer);
        $("#payerid").val(payerid);
    }


    function getFileData(myFile, id) {
        var file = myFile.files[0];
        var filename = file.name;
        $("#" + id).html(filename);
    }


    function uploadSong(mode) {
        var formData = new FormData();
        if (mode == "add") {
            formData.append("name", $("#name").val())
            formData.append("add", true)
            formData.append("price",$("#price").val())
            formData.append("projectFile[]", $("#projectfile").prop('files')[0]);
        } else if (mode == "edit") {
            formData.append("name", $("#ename").val())
            formData.append("eid", $("#eid").val())
            formData.append("price",$("#eprice").val())
            formData.append("edit", true)
            formData.append("projectFile[]", $("#eprojectfile").prop('files')[0]);
        }

        $.ajax({
            url: "upload_song_ajax.php",
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        console.log(percentComplete)
                        if (mode == "add") {
                            $("#progressBarSong").css("width", percentComplete + "%");
                        } else if (mode == "edit") {
                            $("#eprogressBarSong").css("width", percentComplete + "%");
                        }
                    }
                }, false);
                return xhr;
            },
            beforeSend: function() {
                if (mode == "add") {
                    $("#progressDivSong").show();
                } else if (mode == "edit") {
                    $("#eprogressDivSong").show();
                }

            },
            success: function(data) {
                console.log(data);
                var obj = JSON.parse(data);
                if (obj.msg = "all_true") {
                    window.location.reload();

                } else {
                    if (mode == "add") {
                        $("#progresslabel").html("Error While Uploading Song");
                    } else if (mode == "edit") {
                        $("#eprogresslabel").html("Error While Uploading Song");
                    }
                }

            },
            error: function(e) {

            }

        })

    }
</script>