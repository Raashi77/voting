<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $sql = "delete from songs where id=$id";
        if ($conn->query($sql)) {

            $resMember = true;
        } else {
            $errorMember = $conn->error;
        }
    }

    if (isset($_POST['block'])) {
        $id = $_POST['block'];
        $sql = "update songs set status=2 where id=$id";
        if ($conn->query($sql)) {
            $resMember = true;
        } else {
            $errorMember = $conn->error;
        }
    }

    if (isset($_POST['unblock'])) {
        $id = $_POST['unblock'];
        $sql = "update songs set status=1 where id=$id";
        if ($conn->query($sql)) {
            $resMember = true;
        } else {
            $errorMember = $conn->error;
        }
    }

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $sql = "insert into songs(name, status) values('$name', '1')";
        if ($conn->query($sql)) {
            $insert_id = $conn->insert_id;
            if (upload_audio($_FILES, $conn, "songs", "id", "song", $insert_id, "projectFile", "/uploads")) {
                $resMember = "all_true";
            } else {
                $resMember = "files_left";
            }
        } else {
            $errorMember = $conn->error;
        }
    }

    if (isset($_POST['edit'])) {
        $name = $_POST['ename'];
        $id = $_POST['eid'];
        $sql = "update  songs set  name='$name' where id='$id'";
        if ($conn->query($sql)) {
            if (upload_audio($_FILES, $conn, "songs", "id", "song", $id, "projectFile", "/uploads")) {
                $resMember = "all_true";
            } else {
                $resMember = "files_left";
            }
        } else {
            $errorMember = $conn->error;
        }
    }
}

$sql = "SELECT * from songs";
if ($result =  $conn->query($sql)) {
    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }
    }
} else {
    $title = "INVALID REQUEST";
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
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Song</th>
                            <th>Price</th>
                            <th>Downloads</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        if (isset($songs)) {
                            $i = 1;
                            foreach ($songs as $detail) {
                        ?>
                                <tr>
                                    <td style="  text-align: center; " id="serialNo<?= $i ?>"><?= $i ?></td>
                                    <td style="  text-align: center; " id="name<?= $i ?>"><?= $detail['name']; ?></td>
                                    <td><audio controls="controls" src="./<?= $detail['song']?>"></audio></td>
                                    <td>$ <?=$detail['price']?></td>
                                    <td><?=$detail['downloads']?></td>
                                    <td>
                                        <form method="post">
                                            <button class="btn btn-danger" onclick="return confirm('Do You Really Want To Delete This?')" type="submit" name="delete" value="<?= $detail['id'] ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
                                            <button class="btn btn-success" onclick="setEditValues(<?= $detail['id'] ?>,<?= $i ?>,'<?=$detail['price']?>')" type="button" data-toggle="modal" data-target="#modal-edit">
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
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Price</label><br>
                                <input type="text" id="price" name="price" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Audio File</label><br>
                                <button type="button" class="btn btn-success" onclick="$('#projectfile').click()"><i class="fa fa-plus"></i></button>
                                <p id="fileName" style="width:90%"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" id="filesDiv">

                            <input type="file" id='projectfile' name="projectFile[]" class="form-control" style="visibility:hidden" onchange="getFileData(this,'fileName');" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="progressDivSong" style="display:none">
                            <label id="progresslabel">Uploading Song Please Wait ...</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" id="progressBarSong" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="add" class="btn btn-primary" onclick="uploadSong('add')" style="margin-top:10" value="">Add</button>


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
                                <input type="text" id="ename" name="ename" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Price</label><br>
                                <input type="text" id="eprice" name="eprice" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Audio File</label><br>
                                <button type="button" class="btn btn-success" onclick="$('#eprojectfile').click()"><i class="fa fa-plus"></i></button>
                                <p id="efileName" style="width:90%"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" id="filesDiv">
                            <input type="hidden" id="eid" name="eid" />
                            <input type="file" id='eprojectfile' name="projectFile[]" class="form-control" style="visibility:hidden" onchange="getFileData(this,'efileName');" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="eprogressDivSong" style="display:none">
                            <label id="eprogresslabel">Uploading Song Please Wait ...</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" id="eprogressBarSong" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="add" class="btn btn-primary" onclick="uploadSong('edit')" style="margin-top:10" value="">Add</button>
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
    function setEditValues(id, counter,price) {
        $("#ename").val($("#name" + counter).html());
        $("#eid").val(id);
        $("#eprice").val(price);
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