<?php

    require_once './lib/core.php';

    if(isset($_POST['fetch_search']) && isset($_POST['search']))
    {
        $res=[];
        $search = $_POST['search'];
        $user = $_POST['user'];
        $EMAIL = $_POST['email'];
        $sql = "SELECT * from songs where (name LIKE '%$search%')";
        if($result = $conn->query($sql))
        {
            if($result->num_rows)
            {
                $inhtml = "";
                $i=1;
                // echo $result->num_rows();
                // $res['row']= mysqli_num_rows($result);
                while($row = $result->fetch_assoc())
                {
                    $id= $row['id'];
                    $songName = $row['name'];
                    $pay = "";
                    $downloadhref = "";
                    $price = $row['price'];
                    $disp = "";
                    $song = $row['song'];
                    $buttons = "";
                    $songadd = $row['song'];
                    // print_r($row);
                    if(isset($_SESSION['signed_in']))
                    {
                        $sql = "SELECT * from payment where song_id='$id' and user='$user'";
                        if($data=$conn->query($sql))
                        {
                            if($data->num_rows > 0)
                            {
                                $row2 = $data->fetch_assoc();
                                if($row2['status'] == "successful")
                                {
                                    $downloadhref = "<a href='./admin$songadd' download='true' class='btn btn-danger ' ><i class='fa fa-download'></i>&nbsp; Download</a>";
                                    $pay = "";
                                    $disp = "none";
                                }
                                else 
                                {
                                    $downloadhref = "";
                                    $pay = "pay(`$id`,`$user`,`$EMAIL`,`$price`,`paypal-button-container$i`)";
                                }
                            }
                            else
                            {
                                $downloadhref = "";
                                $pay = "pay(`$id`,`$user`,`$EMAIL`,`$price`,`paypal-button-container$i`)";
                            }                                            
                        }
                        else
                        {
                            $error = $conn->error;
                        }
                        $buttons = "<div id='paypal-button-container$i' class='payButton'></div>
                        <button onclick='$pay' style='display:$disp' id='paydollor$id' class='btn btn-primary pay'>Pay $ $price</button>";
                    }
                    else
                    {
                        $downloadhref="<a href='registration'>Login to buy and download the song!</a>";
                    }
                    $inhtml .="<div class='col-lg-4' style='margin-bottom:20px'>
                    <div class='card' >
                        <div class='card-body'>
                            <h5 class='card-title'>$songName</h5>
                            <h6 class='card-subtitle mb-2 text-muted'><audio style='width:100%' controls='controls' controlsList='nodownload' src='./admin/$song'></audio></h6>
                            <center>
                            
                                $buttons
                                <a href='#' class='card-link'>$downloadhref</a>
                            </center>
                        </div>
                    </div>
                </div>
                                    ";
                }
                  $i++;
                  $res['msg']="ok";
                  $res['dat']=$search;
                  $res['html']=  $inhtml;
                //   echo $inhtml;
                echo json_encode($res);
                 
                   
            }
            else
            {
                $res['msg']="no_data"; 
                $res['dat']=$sql;
                echo json_encode($res);
            }
                    
                    
        }
        else
        {
            $res['msg']="error";
            $res['error']=$conn->error; 
            echo json_encode($res);
        }
        // echo json_encode($res);

    }

    

?>