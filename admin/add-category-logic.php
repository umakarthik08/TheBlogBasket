<?php
include 'config/database.php';

if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title){
        $_SESSION['add-category'] = "Please add a category";
    }
    else if(!$description)
    {
        $_SESSION['add-category'] = "Please add description";
    }
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . "admin/add-category.php");
        die();
    }
    else{
        $query = "INSERT into categories(title,description) VALUES('$title','$description')";
        $result = mysqli_query($connection,$query);
        if(mysqli_errno($connection)){
            $_SESSION['add-category'] = "Add category failed";
        }
    }
    header('location: ' . ROOT_URL . "admin/manage-category.php");
}