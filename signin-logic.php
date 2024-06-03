<?php
    require 'admin/config/database.php';

    if(isset($_POST['submit'])){
        $username = filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS);
        $createpassword = filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS);

        if(!$username){
            $_SESSION['signin'] = "Username or Email is mandatory";
        }
        elseif(!$createpassword){
            $_SESSION['signin'] = "Password is required";
        }
        else{
            $user_query = "SELECT * from users where username = '$username' or email = '$username'";
            $user_result = mysqli_query($connection,$user_query);

            if(mysqli_num_rows($user_result) == 1){
                $user_record = mysqli_fetch_assoc($user_result);
                $db_password = $user_record['password'];
                if(password_verify($createpassword,$db_password)){
                    $_SESSION['user_id'] = $user_record['id'];
                    if($user_record['is_admin'] == 1){
                        $_SESSION['user_is_admin'] = true;
                    }

                    header('location: ' . ROOT_URL . 'admin/dashboard.php');
                }
                else{
                    $_SESSION['signin'] = 'Password incorrect';
                }
            }
            else{
                $_SESSION['signin'] = "User not found";
            }
        }
        
        if(isset($_SESSION['signin'])){
            $_SESSION['signin-data'] = $_POST;
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }
    else{
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }
?>