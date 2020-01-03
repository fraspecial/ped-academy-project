<?php include_once 'modules/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aggiungi post</h5>
                    <form action="" method="post">
                        <div>
                            <label for="title">Titolo:</label>
                            <input class="form-control" type="text" name="title" id="title" required>
                        </div>

                        <div>
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10" required></textarea>
                        </div>

                        <div>
                            <label for="tags">Tags:</label>
                            <input class="form-control" type="text" name="tags" id="tags">
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