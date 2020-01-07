<?php
include_once 'modules/header.php';
?>
<div class="container">

    <?php if (isLogged()) {
    ?>
        <div class="mt-3 header row">
            <?php
            if ($post_repository->getLength() > 0) {
            ?>
                <div class="col-3">
                    <h1>Ultimi post</h1>
                </div>
                <div class="search-tag col-3">
                    <form id="form-tag" action="">
                        <label for="tag">Search tag</label>
                        <input type="search" name="tag" class="form-control">
                    </form>
                <?php } else { ?>
                    <h2>Ancora nessun post!</h2>
                <?php } ?>
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
                        <a class='edit' data-toggle="modal" href="#modal">
                            <svg class="edit" data-toggle="modal" data-target="#modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>
                        <a href="delete.php?creation_date=<?= $post->getCreationDate() ?>">
                            <svg class='delete' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                            </svg>
                        </a>
                    </div>
                </div>
                <small><?= $post->getCreationDate() ?></small>
                <p class='post-content'><?= $post->getContent() ?></p>
                <footer>Tags:
                    <?php
                    if ($post->getTagList()) {
                        foreach ($post->getTagList()->getTags() as $tag) {
                    ?>
                            <a class='tag' href=''><?= $tag->getTitle() ?></a>&nbsp;
                    <?php }
                    } ?>
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
                    <input class="form-control" type="text" name="username" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>" required>
                    <div class="invalid-feedback">Please choose a username.</div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" required>
                    <div class="invalid-feedback">Please choose a password.</div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name='remember-me' id="remember-me">
                    <label class="form-check-label" for="remember-me">Ricordami</label>
                </div>

                <input type="hidden" name="type" value="login">
                <input class="login btn btn-success" id="submit" type="submit" value="Login">
            </form>
        </div>
    <?php } ?>

</div>
<?php include_once 'modules/footer.php'; ?>
<script src="assets/index.js"></script>