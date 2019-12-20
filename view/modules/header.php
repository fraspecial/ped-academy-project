<html lang="it">
<head>
    <base href="http://localhost/mio-progetto/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Blog</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">fraspecial</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <?php //if(isset($_SESSION['loggedUser'])){?>
                <li class="nav-item"><a class="nav-link active" href="index.php" hreflang="it">Blog<span class="sr-only">(current)</span></a></li>
            <?php // } ?>
                <li class="nav-item"><a class="nav-link" href="about.php" hreflang="it">About</a></li>
            </ul>
            <?php if(isset($_SESSION['loggedUser'])){?>
                <a class="btn btn-primary" href="post.php" hreflang="it">Post</a>
                <a class="btn btn-danger" href="logout.php" hreflang="it">Logout</a>
            <?php }
            else { ?>
            <button type="button" class="btn btn-success mr-3" id="login-button">Login</button>
            <button type="button" class="btn btn-primary mr-3" id="signup-button">Sign Up</button>
            <?php } ?>
        </div>
    </nav>
</header>
