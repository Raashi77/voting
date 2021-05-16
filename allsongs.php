<?php
require_once "header.php";
require_once "navbar.php";

$sql="select * from  songs  ";
    if($result=$conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row=$result->fetch_assoc())
            {
                $contest_songs[] = $row;
            }
        }
    }
    // print_r($contest_songs);
?>
<style>
    .vidcs
    {
        width: min(400, 100%) !important;
    }
</style>
<div class="content-wrapper" style="margin-left:20px;">

    <!-- Main content -->
      <br>
    <section class="content">
        <?php
            if(isset($resSubject))
            {
        ?>
                <div class="alert alert-success"><strong>Success!</strong> your request successfully updated.</div> 
        <?php
            }
            else if(isset($errorSubject))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorSubject?></div> 
        <?php
                
            }
        ?>
        <div class="row" style="margin-top:50px">
            <div class="col-sm-12 col-md-12 mb-50">
                            
            </div>
        </div>
        <center>
            <h2>
            All Songs
            </h2>
        </center>
            <div class="container">
                <div class="row" style="margin-bottom:20px">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="dashboard-wraper" style="border-radius:50px;padding-bottom: 0.5px;padding-left: 15px;padding-top: 11px;padding-right: 15px;">
                            <div class="input-group mb-3">
                                <input type="text" id="searchText" style="border:0;border-top-left-radius: 30px;padding:25px;border-bottom-left-radius: 30px;" class="form-control" placeholder="Search a song" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" onclick="searchSong()" type="button" style="border-top-right-radius: 30px;border-bottom-right-radius: 30px;">Search</button>
                                </div>
                                
                            </div>
                            <!-- <button class="btn btn-outline-secondary" style="border:0" type="button">Clear seaches</button> -->
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;align-items:center;justify-content:center">
                    <button class="btn btn-secondary" id="clear" onclick="clearsearch()" type="button" style="display:none;background-color:white;color:black;border-radius:30px;"><i class="bi bi-trash"></i>Clear Search</button>
                </div>
                <div class="row" id="searchmaterial">
                    
                </div>
                <div class="row" id="aforapple">
                
                        <?php 
                            if (isset($contest_songs)) 
                            {   
                                // print_r($contest_songs);
                                $i = 1;
                                foreach ($contest_songs as $detail) 
                                {   
                                    $downloadhref = '';
                                    $pay="";
                                    $disp="";
                                    $songadd = $detail['song'];
                                    $price = $detail['price'];
                                    $id = $detail['id'];
                                    if(isset($_SESSION['signed_in']))
                                    {
                                        $sql = "SELECT * from payment where song_id='$id' and user='$USER_ID'";
                                        if($result=$conn->query($sql))
                                        {
                                            if($result->num_rows > 0)
                                            {
                                                $row = $result->fetch_assoc();
                                                if($row['status'] == "successful")
                                                {
                                                    $downloadhref = "<a href='./admin$songadd' download='true' class='btn btn-danger ' ><i class='fa fa-download'></i>&nbsp; Download</a>";
                                                    $pay = "";
                                                    $disp = "none";
                                                }
                                                else
                                                {
                                                    $downloadhref = "";
                                                    $pay = "pay('$id','$USER_ID','$EMAIL','$price','paypal-button-container$i')";
                                                }
                                            }
                                            else
                                            {
                                                $downloadhref = "";
                                                $pay = "pay('$id','$USER_ID','$EMAIL','$price','paypal-button-container$i')";
                                            }                                            
                                        }
                                        else
                                        {
                                            $error = $conn->error;
                                        }
                                    }
                                    else
                                    {
                                        $downloadhref="<a href='registration'>Login to buy and download the song!</a>";
                                    }
                        ?>             
                                    <div class="col-lg-4" style="margin-bottom:20px">
                                        <div class="card" >
                                            <div class="card-body">
                                                <h5 class="card-title"><?=$detail['name'];?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><audio style="width:100%" controls="controls" controlsList="nodownload" src="./admin/<?=$detail['song']?>"></audio></h6>
                                                <center>
                                                <?php
                                                    if(isset($_SESSION['signed_in']))
                                                    {
                                                        ?>
                                                            <div id="paypal-button-container<?=$i?>" class="payButton"></div>
                                                            <button onclick="<?=$pay?>" style="display:<?=$disp?>" id="paydollor<?=$id?>" class='btn btn-primary pay'>Pay $ <?=$price?></button>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                                    
                                                    <a href="#" class="card-link"><?=$downloadhref?></a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    
                                 
                            <?php
                                $i++;             
                                }
                            } 
                         ?>
                       
                </div>
            <!-- /.box-footer-->
        </div> 
    
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
    
  <?php
    require_once 'js-links.php';
  ?>
  <script src="https://www.paypal.com/sdk/js?client-id=AVD9ZGSM4bsCuPWbHu_WWeZjwY5KeN-XZSvD8hBW1w4aFcyQE7mcpQnFRk_dJ8TW20LnKgOnG1c5kBgc&locale=en_US&currency=USD&debug=true"></script>
  <script>
    
    function pay(songId,user,email,price,cont)
    {


        // $(".pay").show();
        // $("#paydollar"+songId).hide();
        var amount;
        var id;
        $.ajax({
            url: "payment.php",
            type: "POST",
            data: {
                payment: true,
                songId: songId,
                user: user,
                email:email,
                price:price,
            },
            success: function(data) 
            {
                console.log(data);
                var obj = JSON.parse(data);
                // console.log(obj.msg);
                if(obj.msg.trim()=="ok")
                {
                    amount=obj.amount;
                    id=obj.id;
                    paypalbutton(price,cont,amount,id)
                }
                else
                {
                    alert("Some error Occured!")
                }
               
                
            }
        });
    }

    function paypalbutton(price,container,amount,id)
    {
        $(".payButton").each(function(){$(this).empty()});
        paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: amount
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            console.log(details.id);
            console.log(details.payer.email_address);
            console.log(details.payer.payer_id);
            $.ajax({
                url: "payment.php",
                type: "POST",
                data: {
                    update: true,
                    id: id,
                    gateway: details.id,
                    email : details.payer.email_address,
                    payer_id : details.payer.payer_id,
                },
                success: function(data) 
                {
                    if(data.trim()=="ok")
                    {
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        window.location.href="allsongs.php";
                    }
                    
                }
            });
          });
        }
      }).render('#'+container); // Display payment options on your web page
    }

    function clearsearch()
    {
    
        $("#clear").hide();
        $("#searchText").val('');
        $("#searchmaterial").html('');
        $("#aforapple").show();
    }

    var user = '<?=$USER_ID?>';
    var email = '<?=$EMAIL?>';
    function searchSong()
    {
        var search = $("#searchText").val();
        if(search == '')
        {
            alert("First Type Song Name you want to search")
        }
        else
        {
            // console.log(searching);
            $.ajax(
                    {
                        url:"search_ajax.php",
                        type:"post",
                        data:{ fetch_search:true,
                                search:search,
                                user:user,
                                email:email,
                            },
                        dataType: "html" ,    
                        success : function(data)
                        {
                            var sea = JSON.parse(data);
                            if(sea.msg.trim()=="ok")
                            {   
                                $("#clear").show();
                                $("#searchmaterial").html('');
                                $("#searchmaterial").show();
                                $("#aforapple").hide();
                                $("#searchmaterial").append(sea.html);
                               

                            }
                            if(sea.msg.trim()=="no_data")
                            {
                                $("#clear").show();
                                $("#searchmaterial").show();
                                $("#aforapple").hide();
                                $("#searchmaterial").html('');
                                $("#searchmaterial").append(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                Nothing found according to your search!!
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>`);
                            }
                            
                        },
                        error:
                        function(err){}
                    })
        }
    }
  </script>
