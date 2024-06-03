<?php
    include './partials/header.php';
    $query = "SELECT * from categories";
    $result = mysqli_query($connection,$query);
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <aside>
            <ul>
                <li>
                    <a href="<?= ROOT_URL ?>admin/add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT_URL ?>admin/dashboard.php">
                        <i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="<?= ROOT_URL ?>admin/add-user.php">
                        <i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT_URL ?>admin/manage-user.php">
                        <i class="uil uil-users-alt"></i>
                        <h5>Manage User</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT_URL ?>admin/add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT_URL ?>admin/manage-category.php" class="active">
                        <i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Categories</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while($ctg = mysqli_fetch_assoc($result)) :?>
                    <tr>
                        <td><?= $ctg['title'] ?> </td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?=$ctg['id']?>" class = "btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?=$ctg['id']?>" class = "btn sm danger">Delete</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php
    include 'partials/footer.php'
?>