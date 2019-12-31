<?php
include_once 'modules/header.php';
?>
<div class="container">
    <div class="row  justify-content-center">
        <form id="signup-form" action="" method="post" class="needs-validation" novalidate>
            <h5>Registrati</h5>
            <fieldset class="form-group">
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
            </fieldset>

            <fieldset class="form-group">
                <div class="form-row">
                    <div class="col-6">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" required>
                        <div class="invalid-feedback">Please choose an email.</div>
                    </div>
                    <div class="col-6">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="form group">
                <div class="form-row">
                    <div class="col-6">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" required placeholder="8+ chars with digits and capitals" pattern="(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}">
                        <div class="invalid-feedback">Please choose a valid password.</div>
                    </div>

                    <div class="col-6">
                        <label for="password">Confirm password:</label>
                        <input class="form-control" type="password" name="password_confirm" required pattern="(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}">
                        <div class="invalid-feedback">Password confirmation gone wrong</div>
                    </div>
                </div>
            </fieldset>

            <input type="hidden" name="type" value="signup">
            <input class="btn btn-primary" type="submit" value="Sign Up">
        </form>
    </div>
</div>
<?php include_once 'modules/footer.php'; ?>