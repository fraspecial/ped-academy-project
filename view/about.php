<?php
include_once 'modules/header.php';
?>
<div class="container">
    <h1>About</h1>

    <section>
        <div class="row">
            <div class="col-4">
                <picture class="img-fluid">
                    <source class="img-fluid" srcset=<?= $user->getPropic() ?>>
                    <img class="img-fluid" src="assets/propic-fallback.png" alt="propic-fallback">
                </picture>
            </div>
            <div class="col-8">
                <article>
                    <h3><?= $user->getName() . ' ' . $user->getSurname(); ?></h3>
                    <?php
                    if ($user->getBio() == null) { ?>
                        <a data-toggle="modal" href="#bio">Aggiungi la tua bio</a>
                    <?php } else { ?>
                        <p><?= $user->getBio() ?></p>
                        <a data-toggle="modal" href="#bio">Modifica</a>
                    <?php } ?>
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section>
        <h3>Lingue</h3>

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
                        <td scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                            </svg>
                        </td>
                        <td><?= $language->getName() ?></td>
                        <td><?= $language->getListening() ?></td>
                        <td><?= $language->getReading() ?></td>
                        <td><?= $language->getWriting() ?></td>
                        <td><?= $language->getSpeaking() ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="mb-5">
        <h3>Portfolio</h3>
        <div class="row carousel-row justify-content-center">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        if ($user->getPortfolio() != null) {
                            $i = 0;
                            while ($i < $user->getPortfolio()->getLength()) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to=<?= strval($i) ?> class=<?php if ($i == 0) echo "active"; ?>></li>
                        <?php $i++;
                            }
                        } ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php if ($user->getPortfolio() != null)
                            foreach ($user->getPortfolio()->getPictures() as $picture) { ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src=<?= $picture->getPath() ?>>
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="carousel-row row">
                                        <div class="col-9">
                                            <h5><?= $picture->getTitle() ?></h5>
                                        </div>
                                        <div class="col-3">
                                            <form action="" method="post">
                                                <label for="add-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                            </label>
                                            <input type="file" style="display:none" name="add-picture" id="add-picture" multiple accept='image/*'>    
                                            </form>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p><?= $picture->getCaption() ?></p>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'modules/footer.php'; ?>