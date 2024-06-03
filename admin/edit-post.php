<?php
    include './partials/header.php';
    $id = $_GET['id'];
    $query = "select * from posts where id = $id";
    $result = mysqli_query($connection,$query);
    $post = mysqli_fetch_assoc($result);

    if(!isset($_SESSION['edit-post-data'])){
        $_SESSION['edit-post-data']['title'] = $post['title'];
        $_SESSION['edit-post-data']['body'] = $post['body'];
    }
?>

    <section class = "form__section">
        <div class="container form__section-container ap">
            <h2>Edit Post</h2>
            <?php if(isset($_SESSION['edit-post'])) : ?>
            <div class="alert__message__error">
                <p>
                    <?= $_SESSION['edit-post'];
                    unset($_SESSION['edit-post']); ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" method = "POST" enctype="multipart/form-data">
                <input type="hidden" name = "id" value = "<?= $id?>">
                <input type="text" name = "title" value = "<?= $_SESSION['edit-post-data']['title'] ?>" placeholder="Title">
                <select name="category" id="tag">
                    <?php
                        $cid = $post['category_id'];
                        $q = "select * from categories";
                        $r = mysqli_query($connection,$q);
                    ?>
                    <?php while($category = mysqli_fetch_assoc($r)) : ?>
                        <?php if($category['id'] == $post['category_id']) :?>
                        <option value="<?= $category['id'] ?>" selected>
                            <?= $category['title'] ?>
                        </option>
                        <?php else :?>
                        <option value="<?= $category['id'] ?>">
                            <?= $category['title'] ?>
                        </option>
                        <?php endif ?>
                    <?php endwhile ?>
                </select>
                <textarea name="body" id="ta" rows="9" cols="35" placeholder="Body"><?= htmlspecialchars($_SESSION['edit-post-data']['body']) ?></textarea>
                <br>
                <div class="form__control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <br>
                    <input type="file" name = "thumbnail" id="thumbnail">
                </div>
                <button type = "submit" name = "submit" class = "btn signup_btn">Edit Post</button>
                <?php unset($_SESSION['edit-post-data']); ?>
            </form>
        </div>
    </section>

    <?php
    include 'partials/footer.php'
?>