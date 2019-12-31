<footer id="footer"> Powered by Francesco Speciale - PED Academy</footer>


<div class="modal fade" id="bio" tabindex="-1" role="dialog" data-show="true" aria-labelledby="bioTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="bioTitle">Bio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <textarea name="bio" id="" cols="30" rows="10"><?=$user->getBio()?></textarea>
                <input type="hidden" name="type" value="bio">
            </div>


            <!--<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aggiungi post</h5>
                    <form action="index.php" method="post">
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
</div> -->
            <div class='modal-footer border-top-0 justify-content-center'>
                <input class="btn btn-primary" type="submit" value="Salva">
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/script.js"></script>

</body>

</html>