<?php
    include './partials/header.php';
    if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * from categories where id = $id";
    $result = mysqli_query($connection,$query);
    $res = mysqli_fetch_assoc($result);
    }
    else{
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
    }
?>

    <section class = "form__section">
        <div class="container form__section-container snp">
            <h2>Edit Category</h2>
            <?php if(isset($_SESSION['edit-category'])) : ?>
            <div class="alert__message__error">
                <p>
                <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category']); ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method = "POST" enctype="multipart/form-data">
                <input type="hidden" value = "<?= $id ?>" name = "id">
                <input name = "title" type="text" value = "<?= $res['title'] ?>" placeholder="Title">
                <textarea name="description" id="ta" rows="9" cols="35" placeholder="Description"><?= htmlspecialchars($res['description']) ?></textarea>
                <br>
                <button type = "submit" name = "submit" class = "btn signup_btn">Update Category</button>
            </form>
        </div>
    </section>

    <?php
    include 'partials/footer.php'
?>