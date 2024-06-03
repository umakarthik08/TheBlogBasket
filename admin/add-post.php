<?php
    include 'partials/header.php';

    $query = "SELECT * from categories";
    $result = mysqli_query($connection,$query);

    if(isset($_SESSION['add-post-data'])){
        $title = $_SESSION['add-post-data']['title'];
        $category = $_SESSION['add-post-data']['category'];
        $body = $_SESSION['add-post-data']['body'];
        unset($_SESSION['add-post-data']);
    }
    else{
        $title = null;
        $category = null;
        $body = null;
    }
?>

    <section class = "form__section">
        <div class="container form__section-container ap">
            <h2>Add Post</h2>
            <?php if(isset($_SESSION['add-post'])) : ?>
            <div class="alert__message__error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']); ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method = "POST">
                <input type="text" value = "<?= $title ?>" name = "title" placeholder="Title">
                <select name="category" value = "<?= $category ?>" id="tag">
                    <?php while($category = mysqli_fetch_assoc($result)): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea name="body" id="ta" rows="9" cols="35" placeholder="Body"><?= isset($body) ? htmlspecialchars($body) : '' ?></textarea>
                <br>
                <div class="form__control">
                    <label for="thumbnail">Upload Thumbnail</label>
                    <br>
                    <input type="file" name = "thumbnail" id="thumbnail">
                </div>
                <button type = "submit" name = "submit" class = "btn signup_btn">Add Post</button>
            </form>
        </div>
    </section>

<?php
    include 'partials/footer.php'
?>