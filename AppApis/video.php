<?php

    require_once '../lib/core.php';

    if(isset($_POST['fetchAllVideos']))
    {
        $response = [];
        $filter = $conn->real_escape_string($_POST['filter']);
        $sql = "SELECT v.*,c.name,u.name as username from videos v , contest c ,users u where v.c_id = c.id and v.u_id = u.id ";
        switch ($filter)
        {
            case 'default';
                $sql = $sql." order by v.id desc";
                break;

            case 'latest';
                $sql = $sql." order by v.id desc";
                break;

            case 'random';
                $sql = $sql." order by rand()";
                break;

            case 'oldest':
                $sql = $sql." order by v.id asc";
                break;
        }
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $videos[] = $row;
                }
                $response['videos'] = $videos;
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


    if(isset($_POST['fetchSingleVideo']))
    {
        $videoId = $conn->real_escape_string($_POST['videoId']);
        $sql = "SELECT v.*,c.name,u.name as username from videos v , contest c ,users u where v.c_id = c.id and v.u_id = u.id and v.id = '$videoId'";
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
                        $response['comments'] = false;
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
        $contestId = (int)$conn->real_escape_string($_POST['contestId']);
        $sql="insert into videos(c_id, u_id, status) values('$contestId', '$userId', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if( $response['filename'] = upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"video","/admin/uploads"))         
            {
                $response['msg'] = "success";
            }else
            {
                $response['msg'] = "files_left";
            }
            $sql="select * from contest_users cu where cu.c_id='$contestId' and cu.u_id='$userId'";
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
                $sql = "insert into contest_users(c_id, u_id, status) values('$contestId', '$userId', 1)";
                if($conn->query($sql))
                {
                    $resMember=true;   
                }
                else
                {
                    $response['error2'] = $errorMember=$conn->error;
                }
            }
        }
        else
        {
            $response['error1'] = $errorSubject=$conn->error;
        } 

        echo json_encode($response);
    }

    if(isset($_POST['addComment']))
    {
        $response = [];
        $userId = $conn->real_escape_string($_POST['userId']);
        $contestId = $conn->real_escape_string($_POST['contestId']);
        $videoId = $conn->real_escape_string($_POST['videoId']);
        $comment = $conn->real_escape_string($_POST['comment']);
        $sql = "insert into comment (vid_id,c_id,comments,user) values('$videoId','$contestId','$comment','$userId')";
        if($conn->query($sql))
        {
            $response['msg'] = "success";
        }
        else
        {
            $response['msg'] = "error";
            $response['error'] = $conn->error;
        }
        echo json_encode($response);
    }
?>