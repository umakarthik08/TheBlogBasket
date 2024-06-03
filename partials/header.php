<?php
    include 'admin/config/database.php';
    if(isset($_SESSION['user_id'])){
        $id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "SELECT avatar FROM users WHERE id = $id";
        $result = mysqli_query($connection,$query);
        $avatar = mysqli_fetch_assoc($result);
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Blog Basket</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400..700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400..700&family=Pacifico&display=swap"
            rel="stylesheet">
        <link rel="shortcut icon" type="x-icon"
            href="https://png.pngtree.com/png-clipart/20210311/original/pngtree-letter-b-logo-png-image_6059110.jpg">
    </head>
    
    <body>
        <!-- navbar section -->
        <nav>
            <div class="container nav__container">
                <a href="<?= ROOT_URL ?>" class="nav__logo"><span class="lg">T</span>he <span class="lg">B</span>log <span
                        class="lg">B</span>asket</a>
                <ul class="nav__items">
                    <li><a href="<?= ROOT_URL ?>index.php">Blog</a></li>
                    <li><a href="<?= ROOT_URL ?>about.php" target = "_blank">About</a></li>
                    <li><a href="#servceid">Contact</a></li>
                    <?php if(isset($_SESSION['user_id'])) : ?>
                        <li class="nav__profile">
                            <div class="avatar">
                                <div>
                                    <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" alt="">
                                </div>
                                <ul>
                                    <li><a href="<?= ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
                                    <li><a href="<?= ROOT_URL ?>logout.php">logout</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php else: ?>
                        <li><a href="signin.php">Signin</a></li>
                    <?php endif ?>
                </ul>
    
                <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
                <button id="close__navbtn"><i class="uil uil-multiply"></i></button>
            </div>
        </nav>