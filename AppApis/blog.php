<?php

    require_once '../lib/core.php';

    if(isset($_POST['fetchSingleBlog']))
    {
        $response = [];
        $blogId = $conn->real_escape_string($_POST['blogId']);
        $sql = "SELECT * from blogs WHERE id='$blogId'";
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

    if(isset($_POST['fetchBlogCategories']))
    {
        $response = [];
        $sql = "SELECT * FROM blog_categories";
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $category[] = $row;
                }
                $response['msg'] = "success";
                $response['categories'] = $category;
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

    if(isset($_POST['fetchAllBlogs']))
    {
        $response = [];
        $filter = $conn->real_escape_string($_POST['filter']);
        $sql = "SELECT * FROM blogs ";
        switch ($filter)
        {
            case 'default';
                $sql = $sql." order by id desc";
                break;

            case 'latest';
                $sql = $sql." order by id desc";
                break;

            case 'random';
                $sql = $sql." order by rand()";
                break;

            case 'oldest':
                $sql = $sql." order by id asc";
                break;
        }
        if($result = $conn->query($sql))
        {
            if($result->num_rows > 0)
            {
                $response['msg'] = "success";
                while($row = $result->fetch_assoc())
                {
                    $blogs[] = $row;
                }
                $response['blogs'] = $blogs;
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