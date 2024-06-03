<?php
    include './partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * from users where id = $id";
        $result = mysqli_query($connection,$query);
        $user = mysqli_fetch_assoc($result);
    }
    else{
        header('location: ' . ROOT_URL . 'admin/manage-user.php');
        die();
    }
?>
    
<section class = "form__section">
    <div class="container form__section-container ap">
        <br>
        <h2>Edit User</h2>
    <?php if(isset($_SESSION['edit-user'])) : ?>
        <div class="alert__message__error">
            <p>
               <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
               ?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method = "POST" enctype="multipart/form-data">
            <input type="hidden" name = "id" value = "<?= $user['id'] ?>">
            <input type="text" name = "firstname" value = "<?= $user['firstname'] ?>" placeholder="First Name">
            <input type="text" name = "lastname" value  = "<?= $user['lastname'] ?>" placeholder="Last Name">
            <select name="userrole" id="type">
                <option value="0" 
                <?php if ($user['is_admin'] == 0) echo 'selected'; ?>
                >Author</option>
                <option value="1" 
                <?php if ($user['is_admin'] == 1) echo 'selected'; ?>
                >Admin</option>
            </select>
            <button type = "submit" name = "submit" class = "btn signup_btn">Edit User</button>
        </form>
    </div>
</section>

<?php
    include 'partials/footer.php'
?>