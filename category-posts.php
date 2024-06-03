<?php
    include 'partials/header.php';
    $id = $_GET['id'];
    $query = "SELECT * from posts where category_id = $id";
    $result = mysqli_query($connection,$query);

    $q = "SELECT * from categories where id = $id";
    $result1 = mysqli_query($connection,$q);
    $res1 = mysqli_fetch_assoc($result1);
?>

    
    <header>
        <div class = "category__title">

            <h2><?= $res1['title'] ?></h2>
        </div>
    </header>

    <?php while($post = mysqli_fetch_assoc($result)) : ?>
        <?php
        $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id = $author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
        ?>
    <section class="featured">
        <div class="container featured__container">
            <div class="thumbnail">
                <img class="framed" src="./images/<?= $post['thumbnail']?>" alt="">
            </div>
            <div class="post__info">
                <a href="" class="category__button"><?=$res1['title']?></a>
                <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" target = "_blank">
                    <?= $post['title'] ?>
                </a></h2>
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

<?php
    include 'partials/footer.php'
?>