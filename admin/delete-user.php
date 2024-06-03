<?php
    require 'config/database.php';
    
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * from  users where id = $id";
        $result = mysqli_query($connection,$query);
        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1){
            $avatar_name =  $user['avatar'];
            $avatar_path = '../images/' . $avatar_name;
            if($avatar_path){
                unlink($avatar_path);
            }

            $thumbnails_query = "SELECT thumbnail FROM posts where author_id = $id";
            $thumbnails_result = mysqli_query($connection,$thumbnails_query);
            while($thumbnail = mysqli_fetch_assoc($thumbnails_result)){
                $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
                if($thumbnail_path){
                    unlink($thumbnail_path);
                }
            }

            $delete_user_query = "DELETE from users where id = $id";
            $delete_user_result = mysqli_query($connection,$delete_user_query);
            if(mysqli_errno($connection)){
                $_SESSION['delete-user'] = "Couldnt delete user";
            }
            else{
                $_SESSION['delete-user-success'] = "User deleted successfully";
            }
        }
    }
    header('location: '. ROOT_URL . 'admin/manage-user.php');