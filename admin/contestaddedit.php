<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(isset($_POST['add']))
        {
            $name=$_POST['name'];
            $description=$_POST['description'];
            $start_date=$_POST['start_date'];
            $end_date=$_POST['end_date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $prize=$_POST['prize'];
            $sql="insert into contest(name, description, start_date, start_time, end_date, end_time, prize, status) values('$name', '$description', '$start_date', '$start_time', '$end_date', '$end_time', '$prize', '1')";
            if($conn->query($sql))
            {
                $insert_id = $conn->insert_id;
                $sql="insert into index_changes(c_id, title, subtitle, title_color, subtitle_color, header_image, body_title, body_title_color, body_subtitle, body_subtitle_color, btn_color, votes_color, name_color) values('$insert_id', 'VOTE FOR OUR NEWEST FLAVOUR!', 'Enter for a chance to win a years supply of ice cream !', '#5c0099', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#ff66ff', '#b84dff')";
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
            
            
    }

    if(isset($_GET['token'])&&!empty($_GET['token']))
    {
        $token=$_GET['token'];

        if(isset($_POST['edit']))
        {  
            $name=$_POST['name'];
            $description=$_POST['description'];
            $start_date=$_POST['start_date'];
            $end_date=$_POST['end_date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $prize=$_POST['prize'];
            $sql="update contest set name='$name', description='$description', start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', prize='$prize' where id='$token'";
            if($conn->query($sql))
            {   
                $resMember = "true";
            }
            else
            {
                $errorMember=$conn->error;
            }
        } 

        $sql = "select * from contest where id=$token";
        if($result = $conn->query($sql))
        {
            if($result->num_rows)
            {
                $contest_details  = $result->fetch_assoc();  
            }   
        }
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
          Project Details
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
        
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Name</label><br>   
                                <input type="text"  id="name" name="name" class="form-control" value="<?=$contest_details['name']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Prize</label><br> 
                                <input type="text"  id="prize" name="prize" class="form-control" value="<?=$contest_details['prize']?>" required>  
                            </div> 
                        </div>

                    </div>  
                    <div class="row">
                        <div class="col-md-10"> 
                            <div class="form-group">
                                <label style="margin-left:5px">contest Description</label><br> 
                                <textarea type="text"  id="description" name="description" class="form-control" style="resize: vertical;height:150px" required>  <?=$contest_details['description']?> </textarea> 
                            </div> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Start Date</label><br> 
                                <input type="date"  id="start_date" name="start_date" class="form-control" value="<?=$contest_details['start_date']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Start Time</label><br> 
                                <input type="time"  id="start_time" name="start_time" class="form-control" value="<?=$contest_details['start_time']?>" required>  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>End Date</label><br> 
                                <input type="date"  id="end_date" name="end_date" class="form-control" value="<?=$contest_details['end_date']?>" required>  
                            </div> 
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label>End Time</label><br> 
                                <input type="time"  id="end_time" name="end_time" class="form-control" value="<?=$contest_details['end_time']?>" required>  
                            </div> 
                        </div>
                    </div>
                    
        
        
                        <?php
                                if(isset($contest_details))
                                {
                        ?>
                                        <button type="submit" name="edit" class="btn btn-primary" value="">Edit</button>
                            <?php
                                }
                                else
                                {
                            ?>
                                        
                                        <button type="submit" name="add" class="btn btn-primary" value="">Add</button>
                        <?php
                                }
                        ?>
                
                    
                </form>
         

    </section>
</div>
<div class="control-sidebar-bg"></div>

  

<?php
    require_once 'js-links.php';
?>


