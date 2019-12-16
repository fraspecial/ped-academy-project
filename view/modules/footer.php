<footer id="footer"> Powered by Francesco Speciale - PED Academy</footer>

<div class="modal fade <?php if ($GLOBALS['err']) echo "failed"; ?>" id="login" tabindex="-1" role="dialog" data-show="true" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="loginTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if ($GLOBALS['err']) { ?>
                <div class="alert alert-danger text-center"><?php echo "Login failed! Invalid email or password!"; ?></div>
            <?php } ?>

            <form id="login-form" action="core/login-handler.php" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-row">
                        <label for="e-mail">E-mail:</label>
                        <input class="form-control" type="email" name="email" required>
                        <div class="invalid-feedback">Please choose an email.</div>
                    </div>

                    <div class="form-row">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" required>
                        <div class="invalid-feedback">Please choose a password.</div>
                    </div>
                </div>

                <input type="hidden" name="form" value="login">

                <div class="modal-footer border-top-0 justify-content-center">
                    <input class="login btn btn-success" id="submit" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade <?php if ($GLOBALS['err']) echo "failed"; ?>" id="signup" tabindex="-1" role="dialog" data-show="true" aria-labelledby="signupTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="signupTitle">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if ($GLOBALS['err']) { ?>
                <div class="alert alert-danger text-center"><?php echo "Signup failed! Invalid email or password!"; ?></div>
            <?php } ?>

            <form id="signup-form" action="core/signup-handler.php" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name">Nome:</label>
                            <input class="form-control" type="text" name="name" required>
                            <div class="invalid-feedback">Please choose a name.</div>
                        </div>

                        <div class="col-6">
                            <label for="surname">Cognome:</label>
                            <input class="form-control" type="text" name="surname" required>
                            <div class="invalid-feedback">Please choose a surname.</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" required>
                            <div class="invalid-feedback">Please choose an email.</div>
                        </div>

                        <div class="col-6">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" required placeholder="8+ chars with digits and capitals" pattern="(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}">
                            <div class="invalid-feedback">Please choose a valid password.</div>
                        </div>

                        <input type="hidden" name="form" value="signup">

                    </div>
                </div>

                <div class='modal-footer border-top-0 justify-content-center'>
                    <input class="btn btn-primary" type="submit" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/login-modal.js"></script>

</body>

</html>