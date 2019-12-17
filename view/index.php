<?php
include_once 'modules/header.php';
?>
<div class="container">
    <?php
    if (isset($_GET['tag']))
        print_r("<h1> Post filtrati da tag #{$_GET['tag']}</h1>");
    else
        print_r("<h1>Ultimi post</h1>");

    if (!empty($array)) {
        foreach ($array as $post) {
            print_r("
                <article>
                <h3>{$post->getTitle()}</h3>
                <p>{$post->getContent()}</p>
                <footer>Tags: ");
            foreach ($post->getTags() as $tag)
                print_r("<a href='index.php?tag=$tag'>$tag </a>");
            print_r("</footer>");
            print_r("</article>");
        }
    } else
        print_r("<h4>Ancora nessun post!</h4>");
    ?>
</div>
<?php include_once 'modules/footer.php'; ?>