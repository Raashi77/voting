<?php

    require_once '../lib/core.php';
    
    if(isset($_POST['checkContestant']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql = "SELECT * FROM contest_users where c_id='$contestId' and u_id='$userId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
                $response['msg']="found";
            else
                $response['msg']="notFound";
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
            $response['query'] = $sql;
        }
        echo json_encode($response);
    }   

    if(isset($_POST['fetchWinner']))
    {
        $response = [];
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql = "SELECT u.name,u.profilePic,cu.votes,c.winner from contest c, users u , contest_users cu where c.winner = u.id and c.id='$contestId' and cu.u_id = u.id and cu.c_id = c.id";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg']="success";
                $response['winner'] = $result->fetch_assoc();
                $winner = $response['winner']['winner'];
                $sql3 = "SELECT count(id) as videos from contest_users where u_id='$winner' and c_id = '$contestId'";
                if($data = $conn->query($sql3))
                {
                    if($data->num_rows > 0)
                    {
                        // print_r($data->fetch_assoc());
                        $videos = $data->fetch_assoc();
                        $response['winner']['videos'] = $videos['videos'];
                        // $response['videos'] = $sql3;
                    }
                    else
                    {
                        $response['videos'] = $sql3;
                    }
                }
                else
                {
                    $response['error3'] = $conn->error;
                }
                $sql2 = "SELECT u.name,u.profilePic,cu.votes from contest_users cu , users u where cu.u_id = u.id and cu.c_id = '$contestId'";
                if($res = $conn->query($sql2))
                {
                    if($res->num_rows > 0)
                    {
                        while($row =$res->fetch_assoc())
                        {
                            $response['contestants'][] = $row ;
                        }
                    }
                    else
                    {
                        $response['contestants'] = "notFound";
                    }
                }
            }   
            else
            {
                $response['msg'] = "noWinner";
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

    if(isset($_POST['fetchSingleContest']))
    {
        $response = [];
        $date = date("Y-m-d");
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql = "SELECT c.*,i.header_image from contest c, index_changes i where c.id  = '$contestId' and c.id=i.c_id";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                $response['contest'] = $result->fetch_assoc();
                if($response['contest']['end_date'] < $date)
                {
                    $response['contest']['type'] = 'ended' ;
                }
                else{
                    $response['contest']['type'] = 'notEnded';
                }
                $sql2 = "SELECT cu.description,cu.votes,cu.status,u.name,u.email,u.profilePic,u.id,v.video,v.time_stamp as videoTime from contest_users cu,users u,videos v WHERE cu.c_id = '$contestId' and v.c_id = cu.c_id and cu.u_id = u.id and v.u_id = u.id";
                if($res = $conn->query($sql2))
                {
                    if($res->num_rows > 0)
                    {
                        $i = 0;
                        while($row=$res->fetch_assoc())
                        {
                            $i++;
                            $contestants[] = $row;
                            // $contestants[] = $row['i'] = $i;
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

    if(isset($_POST['fetchOngoingContest']))
    {
        $response = [];
        $date=date('Y-m-d');
        $time = date('H:i');
        $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id ";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $contests[] = $row;
                }
                $response['contests'] = $contests;
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

    if(isset($_POST['fetchAllContest']))
    {
        $response = [];
        $filter = $conn->real_escape_string($_POST['filter']);
        $date=date('Y-m-d');
        $time = date('H:i');
        switch ($filter) {
            case 'ongoing':
                $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id ";
                break;

            case 'upcoming':
                $sql="SELECT c.*, i.header_image from contest c, index_changes i where (c.start_date > '2021-11-23' ) and c.id=i.c_id";
                break;
        }
        // $response['sql'] = $sql;
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $contests[] = $row;
                }
                $response['contests'] = $contests;
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
        $contestantsId = $conn->real_escape_string($_POST['contestantId']);
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
        $sql = "SELECT * FROM voters where (ip_address='$ip_address' or email='$email') and c_id='$contestId'";
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