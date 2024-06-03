<?php
    include 'partials/header.php';
    $id = $_GET['id'];
    $query = "select * from posts where id = $id";
    $result = mysqli_query($connection,$query);
    $post = mysqli_fetch_assoc($result);
    $i = $post['author_id'];

            $author_query = "SELECT * FROM users WHERE id = $i";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
?>

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2><?= $post['title'] ?></h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="./images/<?= $author['avatar'] ?>" alt="">
                </div>
                <div class="post__author-info">
                    <h5>Created By: <?= $author['username'] ?></h5>
                </div>
            </div>
            <div class="single__post__thumbnail">
                <img class="framed" src="./images/<?= $post['thumbnail']?>" alt="">
            </div>
            <div class="single__post__body">
                <?php $expr = explode("\n",$post['body']); ?>
                <?php foreach ($expr as $exp) : ?>
    <p>
        <?= $exp ?>
    </p>
<?php endforeach ?>
            </div>
        </div>
    </section>

    
    <?php
    include 'partials/footer.php';
?>