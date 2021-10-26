<?php

    require_once '../lib/core.php';
    
    if(isset($_POST['fetchSingleContest']))
    {
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql = "SELECT * from contest where id  = '$contestId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                $response['contest'] = $result->fetch_assoc();
                $sql2 = "SELECT cu.description,cu.votes,cu.status,u.name,u.email,u.profilePic,u.id,v.video,v.time_stamp as videoTime from contest_users cu,users u,videos v WHERE cu.c_id = '$contestId' and v.c_id = cu.c_id and cu.u_id = u.id and v.u_id = u.id";
                if($res = $conn->query($sql2))
                {
                    if($res->num_rows > 0)
                    {
                        while($row=$res->fetch_assoc())
                        {
                            $contestants[] = $row;
                        }
                        $response['contestants'] = $contestants;
                    }
                    else
                    {
                        $response['contestants'] = "notFound";
                    }
                }
                else
                {
                    $response['contestants'] = "error";
                    $response['err'] = $conn->error;
                    $response['sql2'] = $sql2;
                }
            }
            else
            {
                $response['msg'] = "notFound";
            }
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

    if(isset($_POST['voteParticipant']))
    {
        $response=[];
        $email = $conn->real_escape_string($_POST['email']);
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $contestantsId = $conn->real_escape_string($_POST['contestantsId']);
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        $sql = "SELECT * FROM voters where ip_address='$ip_address' and c_id='$contestId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = 'alreadyVoted';
            }
            else
            {
                $sql = "INSERT INTO voters(email,c_id,cu_id,ip_address,status) values('$email','$contestId','$contestantsId','$ip_address',1)";
                $sql2 = "UPDATE contest_users SET votes = votes+1 where c_id='$contestId' and u_id='$contestantsId'";
                if($conn->query($sql) && $conn->query($sql2))
                {
                    $response['msg'] = "success";
                }
                else
                {
                    $response['msg'] = "error";
                    $response['error'] = $conn->error;
                    $response['query'] = $sql;
                }
            }
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

    if(isset($_POST['joinContest']))
    {
        $response=[];
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $contestantId = $conn->real_escape_string($_POST['contestantId']);
        $description= $conn->real_escape_string($_POST['description']);
        $sql = "INSERT INTO contest_users(c_id,u_id,description,status) values('$contestId','$contestantId','$description',1)";
        if($conn->query($sql))
        {
            $response['msg'] = "success";
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }

?>