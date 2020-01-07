<?php
include_once 'modules/header.php';
?>
<link rel="stylesheet" href="assets/about-style.css">

<div class="container">
    <h1>About</h1>

    <section>
        <div class="row">
            <div class="col-4">
                <picture class="img-fluid">
                    <source class=" propic img-fluid" srcset="<?= $user->getPropic() ?>">
                    <img class="propic img-fluid" src="assets/propic-fallback.png" alt="propic-fallback">
                    <div id="overlay"></div>
                </picture>

                <form id='picform' action="" method="post" enctype="multipart/form-data">
                    <?php if ($user->getPropic() != null) { ?>
                        <a href="delete.php?propic=<?= $user->getPropic() ?>">
                            <svg class='delete' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                            </svg>
                        </a>
                    <?php } ?>
                    <label for="propic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                            </path>
                            <circle cx="12" cy="13" r="4">
                            </circle>
                        </svg>
                    </label>
                    <input class="hidden" type="file" name="propic" id="propic" accept="image/*">
                    <input type="hidden" name="type" value="propic">
                </form>
            </div>

            <div class="col-8">
                <article>
                    <h3><?= $user->getName() . ' ' . $user->getSurname(); ?></h3>
                    <?php
                    if ($user->getBio() == null) { ?>
                        <a class="edit bio" data-toggle="modal" href="#modal">Aggiungi la tua bio</a>
                    <?php } else { ?>
                        <p id="temp-bio"><?= $user->getBio() ?></p>
                        <a class="edit bio" data-toggle="modal" href="#modal">Modifica</a>
                    <?php } ?>
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section>
        <div class='row'>
            <h3>Lingue</h3>
            <?php if ($user->getLanguageList()->getLength() > 0) { ?>
                <a href="delete.php?langs=<?= $_SESSION['loggedUser'] ?>">
                    <svg class='delete mt-1 ml-3' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                </a>
            <?php } ?>
        </div>
        <table class="table table-bordered table-striped table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Lingua</th>
                    <th scope="col">Listening</th>
                    <th scope="col">Reading</th>
                    <th scope="col">Writing</th>
                    <th scope="col">Speaking</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($user->getLanguageList()->getLanguages() as $language) { ?>
                    <tr>
                        <td data-lang="<?= $language->getName() ?>" scope="row">
                            <svg class="edit lang" data-toggle="modal" data-target="#modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <a href="delete.php?lang=<?= $language->getName() ?>">
                                <svg class='delete' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                </svg>
                            </a>
                        </td>
                        <td><?= $language->getName() ?></td>
                        <td class="Listening"><?= $language->getListening() ?></td>
                        <td class="Reading"><?= $language->getReading() ?></td>
                        <td class="Writing"><?= $language->getWriting() ?></td>
                        <td class="Speaking"><?= $language->getSpeaking() ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        <a class="add lang" data-toggle="modal" href="#modal">Inserisci una nuova lingua</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="mb-5">

        <div class='row'>
            <h3>Portfolio</h3>
            <?php if ($user->getPortfolio()->getLength() > 0) { ?>
                <a href="delete.php?portfolio=<?= $_SESSION['loggedUser'] ?>">
                    <svg class='delete mt-1 ml-3' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                </a>
            <?php } ?>
        </div>

        <div class="row carousel-row justify-content-center">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <?php
                    if ($user->getPortfolio()->getLength() > 1) {
                    ?>
                        <ol class="carousel-indicators">
                            <?php
                            $i = 0;
                            while ($i < $user->getPortfolio()->getLength()) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= strval($i) ?>" class=<?php if ($i == 0) echo "active"; ?>></li>
                            <?php $i++;
                            } ?>
                        </ol>
                    <?php } ?>
                    <div class="carousel-inner">
                        <?php $i = 0;
                        if ($user->getPortfolio()->getLength() > 0) {
                            foreach ($user->getPortfolio()->getPictures() as $picture) { ?>
                                <div class="carousel-item <?php if ($i == 0) echo "active"; ?>">
                                    <img class="d-block w-100" src="<?= $picture->getPath() ?>">
                                    <div class="carousel-caption">
                                        <div class="carousel-row row">
                                            <div class="col-9">
                                                <h5><?= $picture->getTitle() ?></h5>
                                            </div>
                                            <div class="col-3">
                                                <svg class='add pic' data-toggle="modal" data-target="#modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                                <svg class="edit pic" data-toggle="modal" data-target="#modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>

                                                <a href="delete.php?pic=<?= $picture->getPath() ?>">
                                                    <svg class='delete' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                        <polyline points="3 6 5 6 21 6" />
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <p><?= $picture->getCaption() ?></p>
                                    </div>
                                </div>

                            <?php $i++;
                            }
                        } else { ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src='assets/picture.webp'>
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="carousel-row row">
                                        <div class="col-9">
                                            <h5>Clicca + per aggiungere un'immagine</h5>
                                        </div>
                                        <div class="col-3">
                                            <svg class='add pic' data-toggle="modal" data-target="#modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($user->getPortfolio()->getLength() > 1) { ?>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'modules/footer.php'; ?>
<script src="assets/about.js"></script>