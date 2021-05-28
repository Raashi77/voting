<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';

    if(isset($_POST['edit']))
    {   
        $name = $conn->real_escape_string($_POST['name']);
        $title = $conn->real_escape_string($_POST['title']);
        $id =  $conn->real_escape_string($_GET['token']);
        $description= $conn->real_escape_string($_POST["long_description"]);  
        $short_des= $conn->real_escape_string($_POST["short_description"]);  
        $tags = $conn->real_escape_string($_POST['tags']);
        $cat = $conn->real_escape_string($_POST['cat']);  
        $fimage = $conn->real_escape_string($_POST['fimage']);
        $sql="update blogs set name='$name',title='$title',long_description='$description',short_des='$short_des',tags='$tags', category='$cat',image='$fimage' where id=".$id;
        if($conn->query($sql))
        {  
          $resBlog=true;
        }
        else
        {
            $errorBlog=$conn->error;
        }     
    } 
    
    if(isset($_POST['add']))
    {
        
        $name = $conn->real_escape_string($_POST['name']);
        $title = $conn->real_escape_string($_POST['title']);
        $description= $conn->real_escape_string($_POST["long_description"]);  
        $short_des= $conn->real_escape_string($_POST["short_description"]);  
        $tags= $conn->real_escape_string($_POST["tags"]); 
        $cat = $conn->real_escape_string($_POST['cat']); 
        $fimage = $conn->real_escape_string($_POST['fimage']);
        $sql="insert into blogs(name, title, image,long_description,short_des,tags,category,status) values('$name','$title','$fimage','$description','$short_des','$tags','$cat','1')";
        if($conn->query($sql))
        {
            $resBlog=true; 
        }
        else
        {
            $errorBlog=true;
        }
        
    }       
     

   $id="";
   $name="";
   $title="";
   $cat="";
   $long_description="";
   $short_des="";
   $image_src = "";
    if(isset($_GET['token']) && !empty($_GET['token']))
    {
       $id = $conn->real_escape_string($_GET['token']);
       $a = $id;
       $sql = "Select * from blogs where id = $id";
       if($result = $conn->query($sql))
       {
           if($result->num_rows > 0)
           {
               $data = $result->fetch_assoc();
               $name=$data['name'];
               $title=$data['title'];
               $image_src = $data['image'];
               $cat = $data['category'];
               $long_description=$data['long_description'];
               $tags = $data['tags'];
               $short_des = $data['short_des'];
           }
           else
           {
                $request = "Invalid Request";
           }
       }else
       {
           $error = true;
       }
          
    }

    $sql = "select * from blog_categories";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc())
        {
            $blog_cat[] = $row;
        }
    }
    
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h3 class="card-title">Blog
            <?php 
        if(isset($request))
        {
        ?>
            <span style="color:#d32535">(Invalid Request)</span>
            <?php 
        }
        else
        {
        ?>

        </h3>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <button title="" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i
                            class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
    </section>
    <br>
    <section class="content">
        <?php
            if(isset($resBlog))
            {
        ?>
        <div class="alert alert-success"><strong>Success! </strong> your request successfully updated.</div>
        <?php
            }
            else if(isset($errorBlog))
            {
        ?>
        <div class="alert alert-danger"><strong>Error! </strong>Due to some reason.</div>
        <?php
                
            }
        
        ?>
                <div class="box">
                    <div class="box-body">
                        <form method="post" enctype="multipart/form-data" target="_self" id="form">
                            <div class="row">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?=$id;?>" required>
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" value="<?=$name;?>" class="form-control" id="name" name="name"
                                        required rows="3" style="resize:none" />
                                </div>
                                <div class="col-md-12">
                                    <br /><label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?=$title;?>"
                                        required>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <br>
                                    <button class="btn btn-primary" type="button"
                                        onclick="featureImage()">Choose Feature
                                        Image</button>
                                        <input type="file" id="featureImageInsert" name="featureImageInsert" style="display: none"/>

                                        <br>
                                        <a href="#" target="_blank"><img src="<?=$website_details['logo']?>" width="100px" height="100px" id="featureImg" style="display: none"/></a>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <button class="btn btn-primary" type="button"
                                        onclick="InsertImage()">Insert
                                        Image</button>
                                    <input type="file" id="imageInsert" name="imageInsert" style="display: none"/>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <br /><label>Blog Content</label>

                                    <textarea class="form-control" id="long_description" name="long_description"
                                        required rows="3"
                                        style="resize:none"><?=html_entity_decode($long_description)?></textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <br /><label>Short Description</label>

                                    <textarea class="form-control" id="short_description" name="short_description" required><?=$short_des?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>Tags(# Separated):</label>
                                    <textarea name="tags" id="tags" class="form-control"
                                        required><?=html_entity_decode($tags)?></textarea><br />
                                </div>
                                <div class="col-md-12">
                                    <label>Category:</label>
                                    <select name="cat" id="cat" class="form-control" required>
                                        <?php
                                                if(isset($blog_cat))
                                                {
                                                    foreach($blog_cat as $detail)
                                                    {
                                                        $selected='';
                                                        if($cat == $detail['id'])
                                                        {
                                                            $selected="selected";
                                                        }
                                        ?>
                                        <option value="<?=$detail['id']?>" <?=$selected?>><?=$detail['category']?>
                                        </option>
                                        <?php
                                                    }
                                                }
                                        ?>
                                    </select><br />
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <?php
                                            if(isset($_GET['token']))
                                            {
                                        ?>
                                        <button type="submit" id="edit" name="edit" value="<?=$id?>"
                                            class="btn btn-primary pull-right"
                                            onclick="return confirm('Do you want to save the changes? Y/N')">Save
                                            Changes</button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <button type="submit" name="add" value="add" class="btn btn-primary pull-right"
                                            onclick="return confirm('Do you want to save the changes? Y/N')">Add
                                            Blog</button>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_GET['token']))
                        {
                    ?>
                    </div>
                </div>
    <?php
        }
    ?>
    </section>
    <?php
        }
    ?>
</div>



<div class="control-sidebar-bg"></div>

<?php
    require_once 'footer.php';
    require_once 'js-links.php';
?>

<script>
<?php
        if(!empty($cat))
        {
    ?>
$("#cat").val('<?=$cat?>');
<?php
        }
    ?>

$(function()
{
    $("#featureImageInsert").change(function(evt)
    {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById("featureImg").src = fr.result;
                
                $("#featureImg").show()
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        } 
    })
});


function InsertImage()
{
    $("#imageInsert").trigger('click');
}
function featureImage()
{
    $("#featureImageInsert").trigger('click');
}


CKEDITOR.replace('long_description');
CKEDITOR.config.autoParagraph = false;

function editValue(id, value) {
    var name = $("#name" + id).html();
    var title = $("#title" + id).html();
    var tags = $("#tags" + id).html();
    var cat = $("#cat" + id).html();

    var long_description = $("#long_description" + id).val();
    $("#eid").val(value);
    $("#ename").val(name);
    $("#etitle").val(title);
    $("#ecat").val(cat);

    CKEDITOR.instances.long_description.setData(long_description);
}

function setLibFunction(libfunc) {
    window.libFunction = libfunc;
    console.log(1);
}

function submitForm() {
    if (!isFirstImage) {
        if (confirm('Do you want to save the changes? Y/N')) {
            $("#form").submit();
        }
    } else {
        alert("Insert atleast one Image in Blog");
    }
}

function embbedImage(imageUrl) {
    var element = CKEDITOR.dom.element.createFromHtml( `<img src="${imageUrl}" style="margin: 10px auto 20px;display: block;max-height: 400px;width: auto;" />` );
    CKEDITOR.instances.long_description.insertElement( element );
    $("#closemodal").click();
}

function setFeatureImage(imageUrl) {
    $('#fimage').val(imageUrl);
    $("#fimagePreview").attr('src', imageUrl)
    $("#closemodal").click();
}

function toggleReplyView(id) {
    $("[id^=replyDiv]:visible").hide();
    $("#" + id).show();
}
</script>