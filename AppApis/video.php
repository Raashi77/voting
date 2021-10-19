<?php

    require_once '../lib/core.php';

    if(isset($_POST['fetchSingleVideo']))
    {
        $videoId = $conn->real_escape_string($_POST['videoId']);
        $sql = "SELECT * from videos where id = '$videoId'";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                $response['video'] = $result->fetch_assoc();
                $sql = "SELECT c.*,u.name as userName,u.email FROM comment c, users u where vid_id = '$videoId' and c.user = u.id";
                if($res = $conn->query($sql))
                {
                    if($res->num_rows > 0)
                    {
                        while($row = $res->fetch_assoc())
                        {
                            $comments[] = $row;
                        }
                        $response['comments'] = $comments;
                    }
                    else
                    {
                        $response['comments'] = "notFound";
                    }
                }
                else
                {
                    $response['comments'] = "error";
                    $response['error'] = $conn->error;
                    $response['query2'] = $sql;
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

?>