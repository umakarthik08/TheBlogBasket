<?php
    include 'config/database.php';

    $username = $_SESSION['signin-data']['username']??null;
    $password = $_SESSION['signin-data']['password']??null;
    unset($_SESSION['signin-data']);
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
        
    
<section class = "form__section">
    <div class="container form__section-container snp">
        <h2>Sign In</h2>
        <?php if(isset($_SESSION['signup-success'])) : ?>
        <div class="alert__message__error">
            <p>
                <?= $_SESSION['signup-success'];
                unset($_SESSION['signup-success']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['signin'])): ?>
        <div class="alert__message__error">
            <p>
                <?= $_SESSION['signin'];
                unset($_SESSION['signin']);
                ?>
            </p>
        </div>
        <?php endif ?>
        
        <form action="<?= ROOT_URL ?>signin-logic.php" method = "POST" enctype="multipart/form-data">
            <input type="text" name = "username" value = "<?= $username ?>" placeholder="Username">
            <input type="password" name = "password" value = "<?= $username ?>" placeholder="Password">
            <button type = "submit" name = "submit" class = "btn signup_btn">Sign In</button>
            <br>
            <small>Dont have an account? <a href="<?= ROOT_URL ?>signup.php">Sign Up</a></small>
        </form>
    </div>
</section>

<?php
 include 'partials/footer.php'
?>