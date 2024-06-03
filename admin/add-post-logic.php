<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    if(!$title || !$category_id || !$body || !$thumbnail['name']){
        $_SESSION['add-post'] = "Invalid input";
    }
    else{
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        $allowed_files = ['png','jpg','jpeg'];
        $extension = explode('.',$thumbnail_name);
        $extension_format = end($extension);
        if(in_array($extension_format,$allowed_files)){
            if($thumbnail['size'] < 2000000){
                move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
            }
            else{
                $_SESSION['add-post'] = "File size must be less than 2mb";
            }
        }
        else{
            $_SESSION['add-post'] = "File must jpg, jpeg or png";
        }
    }

    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . "admin/add-post.php");
        die();
    }
    else{
        $query = "insert into posts(title,body,thumbnail,category_id,author_id) values('$title','$body','$thumbnail_name',$category_id,$author_id)";
        $result = mysqli_query($connection,$query);

        if(!mysqli_errno($connection)){
            header('location: ' . ROOT_URL . "admin/dashboard.php");
            die();
        }
    }
}
header('location: ' . ROOT_URL . "admin/add-post.php");
die();