<?php
    require 'partials/header.php';
    $query = "select * from posts";
    $result = mysqli_query($connection,$query);
?>

    <section class = "search__bar">
        <form class="container search__bar-container" action="<?= ROOT_URL ?>search.php" method = "GET">
            <div class = "s_bar">
                <i class = "uil uil-search"></i>
                <input type="search" name = "search" placeholder="Search some interesting blogs">
                <button type = "submit" name = "submit" class = "btn">Go</button>
            </div>
        </form>
    </section>
    <!--Complete nav bar section ---------------------------------------
    --------------------------------------- -->
    <?php while($post = mysqli_fetch_assoc($result)) : ?>
    <section class="featured">
        <?php 
            $category_id = $post['category_id'];
            $category_query = "SELECT title FROM categories WHERE id = $category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);

            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id = $author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
        ?>
        <div class="container featured__container">
            <div class="thumbnail">
                <img class="framed" src="./images/<?= $post['thumbnail']?>" alt="">
            </div>
            <div class="post__info">
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category_id?>" target = "_blank" class="category__button"><?= $category['title'] ?></a>
                <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" target = "_blank"><?= $post['title'] ?></a></h2>
                <p class="post__body">
                    <?php $substring = substr($post['body'], 0, 400); ?>
                    <?php $expr = explode("\n",$substring); ?>
                    <?php foreach ($expr as $exp) : ?>
                            <?= $exp ?>
                            <br>
                    <?php endforeach ?>
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>" alt="">
                    </div>
                    <div class="post__author-info">
                        <div class="a_n">
                            <h5>Created By: <?= $author['username'] ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile ?>

    <!----------------------------------
        Complete featured post
    ------------------------------------>

    <!---------------------------------- 
        Categories
    ----------------------------------->

    <!----------------------------------- 
        Footer Section
     ------------------------------------>
    
<?php
    require 'partials/footer.php'
?>