<?php

    require_once '../lib/core.php';

    if(isset($_POST['fetchSongs']))
    {
        $response = [];
        $sql = "SELECT * FROM songs order by id DESC";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $banner[] = $row;
                }
                $response['songs'] = $banner;
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

    if(isset($_POST['fetchUserSongsForVideo']))
    {
        $response = [];
        $search = $conn->real_escape_string($_POST['search']);
        $userId = $conn->real_escape_string($_POST['userId']);
        $sql = "SELECT s.id as songId,s.name,s.song,p.email,s.price,s.downloads FROM songs s,payment p where  s.name like '%$search%' and p.user='$userId' and s.id = p.song_id and p.status = 'successful' order by s.id DESC";
        // $sql = "SELECT * FROM songs where name like '%$search%' and order by id DESC";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $banner[] = $row;
                }
                $response['data'] = $banner;
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