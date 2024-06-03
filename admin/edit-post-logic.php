<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    if(!$title || !$category_id || !$body || !$thumbnail['name']){
        $_SESSION['edit-post'] = "Invalid input";
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
                $_SESSION['edit-post'] = "File size must be less than 2mb";
            }
        }
        else{
            $_SESSION['edit-post'] = "File must jpg, jpeg or png";
        }
    }

    if(isset($_SESSION['edit-post'])){
        $_SESSION['edit-post-data'] = $_POST;
        header('location: ' . ROOT_URL . "admin/edit-post.php?id=$author_id");
        die();
    }
    else{
        $query = "update posts set title = '$title',body = '$body',thumbnail = '$thumbnail_name', category_id = $category_id where id = $id";
        $result = mysqli_query($connection,$query);
        if(mysqli_errno($connection)){
            header('location: ' . ROOT_URL . "admin/dashboard.php");
            die();
        }
    }
}
header('location: ' . ROOT_URL . "admin/dashboard.php");
die();