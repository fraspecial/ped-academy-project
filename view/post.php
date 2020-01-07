<?php include_once 'modules/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aggiungi post</h5>
                    <form class='needs-validation' action="" method="post" novalidate>
                        <div>
                            <label for="title">Titolo:</label>
                            <input class="form-control" type="text" name="title" id="title" required>
                            <div class="invalid-feedback">Titolo obbligatorio</div>
                        </div>

                        <div>
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10" required></textarea>
                            <div class="invalid-feedback">Contenuto obbligatorio</div>
                        </div>

                        <div>
                            <label for="tags">Tags:</label>
                            <input class="form-control" type="text" name="tags" id="tags" placeholder="Ogni tag deve essere preceduto da #" pattern="(\s*#[a-zA-Z0-9]+\s*)+">
                            <div class="invalid-feedback">Sono permesse solo parole precedute da #</div>
                        </div>

                        <div class='d-flex justify-content-center'>
                            <input class="btn btn-success" type="submit" value="Aggiungi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'modules/footer.php'; ?>