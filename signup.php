<?php
    include 'config/database.php';

    $firstname = $_SESSION['signup-data']['firstname'] ?? null;
    $lastname = $_SESSION['signup-data']['lastname'] ?? null;
    $username = $_SESSION['signup-data']['username'] ?? null;
    $email = $_SESSION['signup-data']['email'] ?? null;
    $createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
    $confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
    unset($_SESSION['signup-data']);
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
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])) : ?>
        <div class="alert__message__error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?=ROOT_URL?>signup-logic.php" method = "post" enctype="multipart/form-data">
            <input type="text" name = "firstname" value = "<?= $firstname ?>" placeholder="First Name">
            <input type="text" name = "lastname" value = "<?= $lastname ?>" placeholder="Last Name">
            <input type="text" name = "username" value = "<?= $username ?>" placeholder="Username">
            <input type="email" name = "email" value = "<?= $email ?>" placeholder="Email">
            <input type="password" name = "createpassword" value = "<?= $createpassword ?>" placeholder="Create Password">
            <input type="password" name = "confirmpassword" value = "<?= $confirmpassword ?>" placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar"></label>
                <input type="file" name = "avatar" id="avatar">
            </div>
            <button type = "submit" name = "submit" class = "btn signup_btn">Sign Up</button>
            <br>
            <small>Already have an account? <a href="<?= ROOT_URL ?>signin.php">Sign In</a></small>
        </form>
    </div>
</section>

<?php
    include 'partials/footer.php'
?>