<?php
    include './partials/header.php';

    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    
    $query = "DELETE from categories where id = $id";
    $result = mysqli_query($connection,$query);

    header('location: ' . ROOT_URL . "admin/manage-category.php");
    die();