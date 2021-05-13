<?php

require_once './lib/core.php';


    $sql="SELECT * from theme_color where id=1";
    if($result=$conn->query($sql))
    {
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc(); 
                $theme = $row; 
        }
    }   
    $com_color = $theme['comment_color']; 

    if(isset($_POST['comm']) && isset($_POST['id']))
    {
        $id=$conn->real_escape_string($_POST['id']);
        $comm = $conn->real_escape_string($_POST['comm']);
        $user = $conn->real_escape_string($_POST['user']);
        $sql = "insert into comment(vid_id,comments,user) values('$id','$comm','$user')";
        if($conn->query($sql))
        {
            echo "inserted";
        }
        else
        {
            echo "error";
        }
    }

    if(isset($_POST['fetch_comment']) && isset($_POST['id']))
    {
        $res=[];
        $com='';
        $id = $_POST['id'];
        $sql = "select c.*,up.name from comment c,users up where c.user = up.id and c.vid_id='$id'";
        if(isset($_SESSION['signed_in']))
        {
            $addcomment = "<div class='col-lg-12 col-md-12'>
                                <div class='input-group mb-3'>
                                    <textarea class='form-control'  placeholder='Add a Comment ...' id='yehhaicomment' aria-describedby='basic-addon2' ></textarea>
                                    <div class='input-group-append'>
                                        <button class='btn btn-primary' onclick ='addComment($id)' type='button'>Add</button>
                                    </div>
                                </div>
                            </div>";
        }
        else
        {
            $addcomment = "<div class='alert alert-secondary' style='display:flex;flex:1;justify-content:center;'>
                                    <a href='registration'>Login to reply or add a comment</a>
                            </div>";
        }    
        $com = "<div class='control-sidebar-bg'></div>
                                <div class='d-navigation'>
                                    <ul  style='font-family:'Muli',sans-serif;' id='commenthaiyeh'>
                                        <li>
                                        <h3>Comments</h3>
                                        <div id='commentkijagah'></div>
                                        </li>
                                                <div id='spaceforcomment' class='dashboard'>
                                                    
                                                </div>
                                        <li>
                                        
                                            <div class='row'>
                                                $addcomment
                                            </div>
                                            <!-- <input type='text' class='form-control' name='linkedIn' value='Add a Comment...' required> -->
                                            
                                        </li>
                                        

                                    
                                    </ul>
                                </div>";
            $res['com']=$com;
            if($result = $conn->query($sql))
            {
                if($result->num_rows)
                {
                    $rowcount=mysqli_num_rows($result);
                    
                    $inhtml="";
                    $j = 1;
                    while($rows = $result->fetch_assoc())
                    { 
                        $username=$rows['name'];
                        $comments = $rows['comments'];
                        $comm = $rows['comments'];
                        $com_id=$rows['id'];
                        $comments = strip_tags($comments);
                        $anchor = "";
                        if (strlen($comments) > 55) {
                            // truncate comments
                            $commentsCut = substr($comments, 0, 55);
                            $endPoint = strrpos($commentsCut, ' ');

                            //if the comments doesn't contain any space then it will cut without word basis.
                            $comments = $endPoint? substr($commentsCut, 0, $endPoint) : substr($commentsCut, 0);
                            $anchor = "<a href='javascript:readmore($com_id)'  id='anchor$com_id' data-fullText='$comm' data-mode='more' data-less='$comments'> ...Read More</a>";
                        }

                        $date = strtotime($rows['time_stamp']);
                        $date1=date_create(date("Y-m-d",$date));
                        $date2=date_create(date("Y-m-d"));
                        $abcd=date_diff($date1,$date2);
                        $time=$abcd->format("%a");
                        if($time == 0)
                        {
                            $happy = 'Today';
                        }
                        else if($time < 1 && $time >10)
                        {
                            $happy = date('d M Y ', $date);
                        }else if($time == 1)
                        {
                            $happy = 'Yesterday';
                        
                        }
                        else
                        {
                            $happy = $time.' days ago';
                        }
                        $sql = "select r.*,up.name from reply r,users up where  r.user=up.id and com_id=$com_id";
                        $options = "<p id='noreplies$com_id' style='margin:0px'></p>";
                        if($resu=$conn->query($sql))
                        {
                            if($resu->num_rows)
                            {
                                $rowco=mysqli_num_rows($resu);
                                
                                // echo "";
                                while($row = $resu->fetch_assoc())
                                {
                                    $reply = $row['reply'];
                                    $userkanaam = $row['name'];
                                    $options .= "   <li >
                                                        <p style='margin-bottom:0px'>$reply </p>
                                                        <p style='align-items:flex-end;display:flex;flex:1;justify-content:flex-end;margin-bottom:0px'>
                                                            &emsp;By $userkanaam
                                                        </p>
                                                    </li>
                                                    ";
                                }
                            }
                            else
                            {
                                $options = "<li id='noreplies$com_id'>No Replies Found!</li><li></li>";
                            }
                        }
                        else
                        {
                            echo $conn->error;
                        }
                        $replycomment = "";
                        $replybutton="";
                        if(isset($_SESSION['signed_in']))
                        {
                            $replycomment = "<div class='col-lg-12 col-md-12'>
                                                <div class='input-group mb-3'>
                                                    <textarea class='form-control' placeholder='Add a Comment ...' id='yehhaicomment' aria-describedby='basic-addon2'></textarea>
                                                    <div class='input-group-append'>
                                                        <button class='btn btn-outline-primary' onclick ='addComment($id)' type='button'>Add</button>
                                                    </div>
                                                </div>
                                            </div>";
                            $replybutton="<a href='javascript:void();' onclick='replycomment($com_id)' id='replyoption$com_id' class='reinput' style='align-items:flex-end;display:flex;flex:1;justify-content:flex-start;margin-bottom:0px;margin-right:20px'>Reply</a>";
                        }
                        else
                        {
                            $replycomment = "";
                            $replybutton="";
                        }
                                                                                                                        // #F0F8FF #adebad
                        $inhtml .="<li class='dashboard-wraper' style=' background: linear-gradient(to bottom, $com_color 0%, #ffffff 100%);'>
                                        <span style='margin-bottom:0px' id='readcomment$com_id'>$comments </span>$anchor
                                        <p style='align-items:flex-end;display:flex;flex:1;justify-content:flex-end;margin-bottom:0px'>
                                        $replybutton
                                             &emsp;By $username&emsp;
                                             
                                             $happy &nbsp;<i class='bi bi-clock'></i>
                                        </p>
                                        <div class='row repliessss' style='display:none;' id='replyinput$com_id' >
                                            <div class='col-lg-1 col-md-1'>
                                            </div>
                                            <div class='col-lg-10 col-md-10'>
                                                <div class='input-group mb-3'>
                                                    <textarea  class='form-control' placeholder='Reply To $username ...' id='yehhaireply$com_id' aria-describedby='basic-addon2'></textarea>
                                                    <div class='input-group-append'>
                                                        <button class='btn btn-primary' style='hwight:200%' onclick ='replied($com_id)' type='button'>Reply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='row'>
                                            <div class='col-lg-1 col-md-1'></div>
                                            <div class='col-lg-11 col-md-11'>
                                                <ul style='background: linear-gradient();'>
                                                    <li>
                                                        <h4 style='color:darkblue;font-weight:500;text-decoration:underline'>Replies</h4>
                                                    </li>
                                                    <div id='prependreply$com_id'>
                                                        $options
                                                    </div>
                                                        
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                      
                                    ";     
                        
                    }
                    $res['msg']="ok";
                    $res['noofrows'] = $rowcount;
                    $res['replies'] = $rowco;
                    $res['html']=  $inhtml;
                    
                    echo json_encode($res); 
                }
                else
                {
                    $res['msg']="ok"; 
                    echo json_encode($res);
                }
                
                    
            }
            else
            {
                $res['msg']="error";
                $res['error']=$conn->error; 
                echo json_encode($res);
            }
    }

    if(isset($_POST['reply']) && isset($_POST['c_id']))
    {
        $reply = $conn->real_escape_string($_POST['reply']);
        $c_id = $conn->real_escape_string($_POST['c_id']);
        $user = $conn->real_escape_string($_POST['user']);
        $sql = "insert into reply(com_id,reply,user) values('$c_id','$reply','$user')";
        if($conn->query($sql))
        {
            echo "inserted";
        }
        else
        {
            echo "error";
        }
    }
?>