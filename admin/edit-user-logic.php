<?php
include 'config/database.php';
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);

    if(!$firstname || !$lastname){
        $_SESSION['edit-user'] = "Invalid input";
        header('location: ' . ROOT_URL . "admin/edit-user.php");
        die();
    }
    else{
        $query = "UPDATE users set firstname = '$firstname', lastname = '$lastname', is_admin = $is_admin where id = $id LIMIT 1";
        $result = mysqli_query($connection,$query);
        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = "Update user failed";
        }
        else{
            $_SESSION['edit-user-success'] = "User updated successfully";
            header('location: ' . ROOT_URL . "admin/manage-user.php");
            die();
        }
    }
}
else{
    header('location: ' . ROOT_URL . "admin/manage-user.php");
    die();
}