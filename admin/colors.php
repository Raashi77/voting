<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';

    if(isset($_POST['change']))
    {
        $base_color=$_POST['base_color'];
        $head_text_color=$_POST['head_text_color'];
        $other_text_color=$_POST['other_text_color'];
        $top_header_color=$_POST['top_header_color'];
        $title_first_color=$_POST['title_first_color'];
        $title_second_color=$_POST['title_second_color'];
        $bottom_header_color=$_POST['bottom_header_color'];
        $vg_bg_color=$_POST['vg_bg_color'];
        $c_bg_color=$_POST['c_bg_color'];
        $c_button_color=$_POST['c_button_color'];
        $c_button_text_color=$_POST['c_button_text_color'];
        $f_bg_color=$_POST['f_bg_color'];
        $icon_color=$_POST['icon_color'];
        $icon_bg_color=$_POST['icon_bg_color'];
        $icon_border_color=$_POST['icon_border_color'];
        $comment_color=$_POST['comment_color'];

        $sql="update theme_color set icon_border_color='$icon_border_color',comment_color='$comment_color', base_color='$base_color', head_text_color='$head_text_color', top_header_color='$top_header_color', title_first_color='$title_first_color', bottom_header_color='$bottom_header_color', vg_bg_color='$vg_bg_color', c_bg_color='$c_bg_color', c_button_color='$c_button_color', c_button_text_color='$c_button_text_color', f_bg_color='$f_bg_color', icon_color='$icon_color', icon_bg_color='$icon_bg_color', title_second_color='$title_second_color', other_text_color='$other_text_color'";
        if($conn->query($sql))
        {
            $resMember=true;
        }
        else
        {
            $errorMember=$conn->error;
        }
    }

 
    $sql="select * from theme_color where id=1";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        $colors = $row;
    }
    
?>
<style>
    .box-body{
	overflow: auto!important;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Choose Colors
        </h1>
    </section>
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
        
                <form method="post">
                    <div class="row">
                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Loader Color</label><br>   
                                <input type="color"  id="base_color" name="base_color" class="form-control" value="<?=$colors['base_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Title First Color</label><br> 
                                <input type="color"  id="title_first_color" name="title_first_color" class="form-control" value="<?=$colors['title_first_color']?>" required>  
                            </div> 
                        </div>

                    </div> 
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Title Second Color</label><br> 
                                <input type="color"  id="title_second_color" name="title_second_color" class="form-control" value="<?=$colors['title_second_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Top Header Color</label><br> 
                                <input type="color"  id="top_header_color" name="top_header_color" class="form-control" value="<?=$colors['top_header_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Bottom Header Color</label><br> 
                                <input type="color"  id="bottom_header_color" name="bottom_header_color" class="form-control" value="<?=$colors['bottom_header_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Video Gallery Background Color</label><br> 
                                <input type="color"  id="vg_bg_color" name="vg_bg_color" class="form-control" value="<?=$colors['vg_bg_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Contest Background Color</label><br> 
                                <input type="color"  id="c_bg_color" name="c_bg_color" class="form-control" value="<?=$colors['c_bg_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Contest Button Background Color</label><br> 
                                <input type="color"  id="c_button_color" name="c_button_color" class="form-control" value="<?=$colors['c_button_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Contest Button Text Color</label><br> 
                                <input type="color"  id="c_button_text_color" name="c_button_text_color" class="form-control" value="<?=$colors['c_button_text_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Footer Background Color</label><br> 
                                <input type="color"  id="f_bg_color" name="f_bg_color" class="form-control" value="<?=$colors['f_bg_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Body Text Color</label><br> 
                                <input type="color"  id="other_text_color" name="other_text_color" class="form-control" value="<?=$colors['other_text_color']?>" required>  
                            </div> 
                        </div>
                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Header Text Color</label><br> 
                                <input type="color"  id="head_text_color" name="head_text_color" class="form-control" value="<?=$colors['head_text_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Icon Color</label><br> 
                                <input type="color"  id="icon_color" name="icon_color" class="form-control" value="<?=$colors['icon_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Icon Background Color</label><br> 
                                <input type="color"  id="icon_bg_color" name="icon_bg_color" class="form-control" value="<?=$colors['icon_bg_color']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Icon Border Color</label><br> 
                                <input type="color"  id="icon_border_color" name="icon_border_color" class="form-control" value="<?=$colors['icon_border_color']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Comment Box Color</label><br> 
                                <input type="color"  id="comment_color" name="comment_color" class="form-control" value="<?=$colors['comment_color']?>" required>  
                            </div> 
                        </div>                        
                    </div>

                    <button type="submit" name="change" class="btn btn-primary" style="margin-top:10" value="">Save Changes</button>
                       
                </form>
         

    </section>
</div>
<?php
    require_once 'js-links.php';
?>
