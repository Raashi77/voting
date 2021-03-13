<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    if(isset($_POST["about"]))
    {
        $email=$_POST['email'];
        $phn=$_POST['phn'];
        $ad=$conn->real_escape_string($_POST['address']);
        $web_title=$conn->real_escape_string($_POST['web_title']);
        $loc=$conn->real_escape_string($_POST['location']);
        $msg = $conn->real_escape_string($_POST['message']);
        $about_text=$conn->real_escape_string($_POST['about_text']);
        $about_us=$conn->real_escape_string($_POST['about_us']);
        $facebook=$conn->real_escape_string($_POST['facebook']);
        $twitter=$conn->real_escape_string($_POST['twitter']);
        $insta=$conn->real_escape_string($_POST['instagram']);
        $img=upload_image2($_FILES['images'],$conn,"web_config","logo","1",'images');
        $image=upload_image2($_FILES['img'],$conn,"web_config","image","1",'img');
        $feature_image=upload_image2($_FILES['f_img'],$conn,"web_config","feature_image","1",'f_img');
          $sql="update web_config set email='$email',phn='$phn',address='$ad',location='$loc',message='$msg',about='$about_text',about_us='$about_us', facebook='$facebook',twitter='$twitter',instagram='$insta',web_title='$web_title'";
   
        if($conn->query($sql))
        {
            $resMember=true;   
        }
        else
        {
            $errorMember=$conn->error;
        }
    }
    $sql="select * from web_config where id=1";
    if($res = $conn->query($sql))
    {
        if($res->num_rows)
        {
             $about=$res->fetch_assoc();
        }

    }
    

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>About
        </h1>
    </section><br>
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
            <form method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                                if(isset($about)) 
                                {     
                                    ?>
                        <div class="col-sm-6"><br>
                            <label>Website Title :</label>
                            <input type="text" class="form-control" id="" name="web_title" value="<?=$about['web_title']?>">

                        </div>
                        <div class="col-sm-6"><br>
                            <label>Email :</label>
                            <input type="email" class="form-control" id="" name="email" value="<?=$about['email']?>">

                        </div>
                        <div class="col-sm-6"><br>
                            <label>Contact Number :</label>
                            <input type="text" class="form-control" id="" name="phn" value="<?=$about['phn']?>">

                        </div>
                        <div class="col-sm-6"><br>
                            <label>Address :</label>
                            <input type="text" class="form-control" id="" name="address" value="<?=$about['address']?>">

                        </div>
                        <div class="col-sm-6"><br>
                            <label>Location :</label>
                            <input type="text" class="form-control" id="" name="location"
                                value="<?=$about['location']?>">

                        </div><br>
                        <div class="col-sm-6"><br>
                            <label>Facebook Handle :</label>
                            <input type="text" class="form-control" id="" name="facebook" value="<?=$about['facebook']?>">

                        </div>
                        <div class="col-sm-6"><br>
                            <label>Twitter Handle :</label>
                            <input type="text" class="form-control" id="" name="twitter" value="<?=$about['twitter']?>">

                        </div>
                         <div class="col-sm-6"><br>
                            <label>Instagram Handle :</label>
                            <input type="text" class="form-control" id="" name="instagram" value="<?=$about['instagram']?>">

                        </div>
                        <div class="col-sm-12"><br>
                            <label>Message from Admin :</label><br>
                            <textarea style="width: 100%;height:120px;resize:none"
                                name="message"><?=$about['message']?></textarea>
                        </div>
                        <div class="col-sm-12"><br>
                            <label>About</label><br>
                            <textarea style="width: 100%;height:120px;resize:none"
                                name="about_text"><?=$about['about']?></textarea>
                        </div>
                        <div class="col-sm-12"><br>
                            <label>Add Logo :</label><br>
                            <input type="file" class="btn btn-success" name="images"></input>
                        </div><br><br>

                        <div class="row" style="margin-bottom:20px"><br> 
                            <div class="col-md-4" id="file<?=$counter?>">
                                <div class="col-md-8" style="margin-top:15px">
                                    <a href="<?=$about['logo']?>" target="_blank"><img src="<?=$about['logo']?>"
                                            width="100px" height="100px" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br>
                            <label>Add Image:</label><br>
                            <input type="file" class="btn btn-success" name="img"></input>
                        </div><br><br>

                        <div class="row" style="margin-bottom:20px"><br> 
                            <div class="col-md-4" id="file2<?=$count?>">
                                <div class="col-md-8" style="margin-top:15px">
                                    <a href="<?=$about['image']?>" target="_blank"><img src="<?=$about['image']?>"
                                            width="100px" height="100px" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br>
                            <label>Feature Image:</label><br>
                            <input type="file" class="btn btn-success" name="f_img"></input>
                        </div><br><br>

                        <div class="row" style="margin-bottom:20px"><br> 
                            <div class="col-md-4" id="file3<?=$count?>">
                                <div class="col-md-8" style="margin-top:15px">
                                    <a href="<?=$about['feature_image']?>" target="_blank"><img src="<?=$about['feature_image']?>"
                                            width="100px" height="100px" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br>
                            <center><button type="submit" class="btn btn-lg btn-primary" name="about">DONE</button>
                            </center>
                        </div><br>
                        <?php
                                }
                                ?>
                    </div>
                </div>
            </form>
        </div>
    </div><br><br>
</div><br><br>



<?php
    require_once 'js-links.php';
?>

<script>
setTimeout(function() {
    $(".alert").hide();
}, 3000);
</script>