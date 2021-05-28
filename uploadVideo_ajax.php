<?php
require_once 'lib/core.php';

    if(isset($_POST['add']))
    {
        $msg =[]; 
        $token = $_POST['token'];
        $USER_ID = $_POST['user_id'];
        $sql="insert into videos(c_id, u_id, status) values('$token', '$USER_ID', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if( $msg['filename'] = upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"projectFile","/admin/uploads"))
            {
                $msg['msg'] = "all_true";
            }else
            {
                $msg['msg'] = "files_left";
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

        echo json_encode($msg);
    } 


    if(isset($_POST['videoAudioMerge']))
    {
        print_r($_FILES);
        $token = $_POST['token'];
        $USER_ID = $_POST['user_id'];
        $audio = $_POST['audio'];
        $sql="insert into videos(c_id, u_id, status) values('$token', '$USER_ID', 1)";
        if($result=$conn->query($sql))
        {
            $insert_id=$conn->insert_id;
            if($msg['filename'] = upload_videos($_FILES,$conn,"videos","id","video",$insert_id,"video","/user/uploads"))
            {
                mergeVideoAudio($msg['filename'],$audio,$msg['filename']);
            }
            else
            {
                $msg['msg'] = "files_left";
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

        echo json_encode($msg);
    }
?>