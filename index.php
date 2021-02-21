<?php
require_once "lib/core.php";
if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    $sql="select cu.*, v.video, u.name from contest_users cu, videos v, users u where cu.c_id='$token' and v.c_id='$token' and cu.u_id=u.id and v.u_id=u.id";;
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $users[] = $row;
        }
    }

    $sql="select * from index_changes where c_id='$token'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                $changes = $row;
        }
    }
}
?>
<html>
    <head>
        <title>Index</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">   
        <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/foodModel.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div>
            <img id="foodModel_headingImg" src="<?=$changes['header_image']?>" >
            <div id="foodModel_heading_Div">
                <h5 id="foodModel_heading_h5" style="color: <?=$changes['title_color']?>;"> <?=$changes['title']?> </h5> 
                <p id="foodModel_heading_p" style="color: <?=$changes['subtitle_color']?>;"><?=$changes['subtitle']?></p>
                
            </div>
        </div>
        
        <div class="container" style="margin-top:30px">
            
            <h6 id="foodModel_heading2" style="color:<?=$changes['body_title_color']?>"><?=$changes['body_title']?></h6>
            <div class="container" style="margin-bottom:30px;">
                <p id="foodModel_mainPara" style="<?=$changes['body_subtitle_color']?>"><?=$changes['body_subtitle']?></p>
                
            </div>
            <div class="row" id="foodModel_cardMain">
            
            
        <?php
            if(isset($users))
            {
                $i=1;
                foreach($users as $data)
                {
        ?>
                    <div class="col-md-3" id="foodModel_card">
                        <img id="foodModel_img" src="images/icecream1.jpg" style="width:100%">
                        <div class="container">
                        <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>"><?=$data['name']?></b></h6> 
                        <p id="foodModel_cardPara" style="width:20%;"><?=$data['description']?></p> 
                        <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;"><?=$data['votes']?></h6>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                        </div>
                    </div>
        <?php
                $i++;
                }
            }
        ?>
            </div>
            
        </div>
        
    </body>
    
</html>

