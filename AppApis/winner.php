<?php

    require_once '../lib/core.php';

    if(isset($_POST['fetchWinner']))
    {
        $response = [];
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql = "SELECT u.*,c.*,u.name as userName FROM winner w ,users u,contest c where w.u_id = u.id and w.c_id = '$contestId' and c.id = '$contestId'";
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

    if(isset($_POST['fetchAllWinners']))
    {
        $response = [];
        $sql = "SELECT u.*,u.id as userId,u.name as userName,c.*,c.id as contestId FROM winner w ,users u,contest c where w.u_id = u.id and w.c_id = c.id";
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