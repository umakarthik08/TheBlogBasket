<?php
    include 'partials/header.php';
    if(isset($_SESSION['add-category-data'])){
        $title = $_SESSION['add-category-data']['title'];
        $description = $_SESSION['add-category-data']['description'];
        unset($_SESSION['add-category-data']);
    }
    else{
        $title = null;
        $description = null;
    }
?>

    <section class = "form__section">
        <div class="container form__section-container snp">
            <h2>Add Category</h2>
            <?php if(isset($_SESSION['add-category'])) : ?>
            <div class="alert__message__error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']); ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method = "POST" enctype="multipart/form-data">
                <input type="text" name = "title" value = "<?= $title?>" placeholder="Title">
                <textarea name="description" id="ta" value = "<?= $description?>" rows="9" cols="35" placeholder="Add Description"></textarea>
                <br>
                <button type = "submit" name = "submit" class = "btn signup_btn">Add Category</button>
            </form>
        </div>
    </section>

<?php
    include 'partials/footer.php'
?>