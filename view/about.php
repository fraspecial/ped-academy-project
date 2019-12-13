<?php
require 'core/bootstrap.php';
include_once 'modules/header.php';
?>
<div class="container">
    <h1>Chi sono</h1>

    <section>
        <div class="row">
            <div class="col-4">
                <picture class="img-fluid">
                    <source class="img-fluid" media="(max-width: 800px)" srcset="assets\propic-small.jpg">
                    <source class="img-fluid" media="(min-width: 800px)" srcset="assets\propic.jpg">
                    <img class="img-fluid" src="assets\propic-fallback.jpg" alt="propic-fallback">
                </picture>
            </div>
            <div class="col-8">
                <article>
                    <h3>Francesco Speciale</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore
                        et
                        dolore
                        magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid
                        ex ea
                        commodi
                        consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla
                        pariatur.
                        Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit
                        anim
                        id est
                        laborum.</p>
                </article>
            </div>
        </div>
    </section>

    <section>
        <h3>Lingue</h3>

        <table class="table table-bordered table-striped table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th>Lingua</th>
                    <th>Scritto</th>
                    <th>Parlato</th>
                    <th>Ascolto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Italiano</td>
                    <td>C2</td>
                    <td>C1</td>
                    <td>C1</td>
                </tr>
                <tr>
                    <td>Inglese</td>
                    <td>C1</td>
                    <td>B2</td>
                    <td>B2</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="mb-5">
        <h3>Portfolio</h3>
        <div class="row carousel-row justify-content-center">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img class="d-block w-100" src="assets\IMG_3258.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Berliner Dom</h5>
                                <p>Edit ispirato ai lavori di Escher di uno scatto sotto la cupola del Parlamento tedesco.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets\IMG_20190831_132814_513.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Bagnanti a Bue Marino, Favignana</h5>
                                <p>Un ricordo della scorsa estate con alcuni dei miei più cari amici.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets\IMG_20191012_162745_790.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>La luce al buio</h5>
                                <p>Un ricordo della mia trasferta a Torino per il Club to Club 2018</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets\IMG_20190913_205129_469.jpg" alt="Fourth slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Francesca e il mare</h5>
                                <p>La mia migliore amica alla Scala dei Turchi, vicino Agrigento.</p>
                            </div>
                        </div>

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