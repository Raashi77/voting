<?php

    require_once '../lib/core.php';

    if(isset($_POST['getProfileDetails']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT * FROM users where id='$userId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                $response['data'] = $result->fetch_assoc();
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

    if(isset($_POST['userAllVideos']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT * FROM videos where u_id='$userId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                $response['data'] = $data;
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

    if(isset($_POST['purchasedSongs']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT s.name,s.song,p.email FROM songs s,payment p where p.user='$userId' and s.id = p.song_id";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                $response['data'] = $data;
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
    if(isset($_POST['userContests']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT * FROM videos where u_id='$userId' order by time_stamp limit 5";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                $response['data'] = $data;
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
    if(isset($_POST['latestVideos']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT c.* FROM contest c,contest_users cu where cu.u_id='$userId' and c.id = cu.c_id";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                $response['data'] = $data;
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

?>