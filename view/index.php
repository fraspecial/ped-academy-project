<?php
include_once 'modules/header.php';
?>
<div class="container">

    <?php if (isLogged()) {
    ?>
        <div class="header row">
            <div class="col-3">
                <?php
                if (!empty($post_repository))
                    print_r('<h1>Ultimi post</h1>');
                else
                    print_r("<h2>Ancora nessun post!</h2>");
                ?>
            </div>

            <div class="search-tag col-3">
                <form id="form-tag" action="">
                    <label for="tag">Search tag</label>
                    <input type="search" name="tag" class="form-control">
                </form>
            </div>
        </div>
        <?php
        if (!empty($post_repository))
            foreach ($post_repository->getPosts() as $post) {
        ?>
            <article>
                <div class="row">
                    <div class="col-11">
                        <h3><?= $post->getTitle() ?></h3>
                    </div>
                    <div class="col-1">
                        <a href="edit"><img src="assets/edit.svg" alt="edit"></a>
                        <a href="delete"><img src="assets/trash.svg" alt="delete"></a>
                    </div>
                </div>
                <small><?= $post->getCreationDate() ?></small>
                <p class='post-content'><?= $post->getContent() ?></p>
                <footer>Tags:
                    <?php
                    foreach ($post->getTags() as $tag) {
                    ?>
                        <a class='tag' href=''><?= $tag->getTitle() ?></a>&nbsp;
                    <?php } ?>
                </footer>
            </article>
        <?php } ?>

    <?php } else { ?>

        <h1 style="text-align: center">My PED Academy Project</h1>
        <div class="row justify-content-center">
            <form id="login-form" action="" method="post" class="needs-validation" novalidate>
                <h5>Login</h5>
                <?php if ($GLOBALS['err-login']) { ?>
                    <div class="alert alert-danger text-center"><?php echo "Login failed! Invalid email or password!"; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="e-mail">Username:</label>
                    <input class="form-control" type="text" name="username" required>
                    <div class="invalid-feedback">Please choose a username.</div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" required>
                    <div class="invalid-feedback">Please choose a password.</div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ricordami</label>
                </div>

                <input type="hidden" name="type" value="login">
                <input class="login btn btn-success" id="submit" type="submit" value="Login">
            </form>
        </div>
    <?php } ?>

</div>
<?php include_once 'modules/footer.php'; ?>