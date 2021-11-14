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


    if(isset($_POST['uploadVideo']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $sql="insert into videos(c_id, u_id, status) values('$token', '$USER_ID', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if( $response['filename'] = upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"projectFile","/admin/uploads"))
            {
                $response['msg'] = "all_true";
            }else
            {
                $response['msg'] = "files_left";
            }
            $sql="select * from contest_users cu where cu.c_id='$token' and cu.u_id='$USER_ID'";
            if($result=$conn->query($sql))
            {
                if($result->num_rows)
                {
                    $row=$result->fetch_assoc();
                    $check = $row;
                }
            }
            if(!isset($check))
            { 
                $sql = "insert into contest_users(c_id, u_id, status) values('$token', '$USER_ID', 1)";
                if($conn->query($sql))
                {
                    $resMember=true;   
                }
                else
                {
                    $errorMember=$conn->error;
                }
            }
        }
        else
        {
            $errorSubject=$conn->error;
        } 

        echo json_encode($response);
    }
?>