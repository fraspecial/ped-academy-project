<?php
include_once 'modules/header.php';
?>
<div class="container">
    <?php
    if (!empty($array)) {
        print_r("<h1>Ultimi post</h1>");
        foreach ($array as $post) {
            print_r("
                <article>
                <h3>{$post->getTitle()}</h3>
                <p>{$post->getContent()}</p>
                <footer>Tags: ");
            foreach ($post->getTags() as $tag)
                print_r("<a class='tag' href='index.php?tag=$tag'>$tag </a>");
            print_r("</footer>");
            print_r("</article>");
        }
    } else
        print_r("<h2>Ancora nessun post!</h4>");
    ?>
</div>
<?php include_once 'modules/footer.php'; ?>