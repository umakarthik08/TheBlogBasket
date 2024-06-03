<?php
include 'config/database.php';
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if(!$title || !$description){
        $_SESSION['edit-category'] = "Invalid input";
        header('location: ' . ROOT_URL . "admin/edit-category.php?id=$id");
        die();
    }
    else{
        $query = "UPDATE categories set title = '$title', description = '$description' where id = $id LIMIT 1";
        $result = mysqli_query($connection,$query);
        if(mysqli_errno($connection)){
            $_SESSION['edit-category'] = "Update user failed";
            header('location: ' . ROOT_URL . "admin/manage-category.php");
            die();
        }
        else{
            $_SESSION['edit-category-success'] = "User updated successfully";
            header('location: ' . ROOT_URL . "admin/manage-category.php");
            die();
        }
    }
}
else{
    header('location: ' . ROOT_URL . "admin/manage-category.php");
    die();
}