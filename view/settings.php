<?php
include 'modules/header.php';
if (isset($_SESSION['lock']) && !$_SESSION['lock']) { ?>
    <div class="container">
        <div class="row justify-content-center">
            <form id="edit-form" action="" method="post" class="needs-validation" novalidate>
                <h5>Modifica i tuoi dati</h5>
                <?php if ($GLOBALS['err-email']) { ?>
                    <div class="alert alert-danger text-center"><?php echo "Modifica fallita! Email non valida!"; ?></div>
                <?php } ?>
                <?php if ($GLOBALS['err-username']) { ?>
                    <div class="alert alert-danger text-center"><?php echo "Modifica fallita! Username non valido!"; ?></div>
                <?php } ?>
                <fieldset class="form-group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name">Nome:</label>
                            <input class="form-control" type="text" name="name" value=<?= $user->getName(); ?> required>
                            <div class="invalid-feedback">Please choose a name.</div>
                        </div>

                        <div class="col-6">
                            <label for="surname">Cognome:</label>
                            <input class="form-control" type="text" name="surname" value=<?= $user->getSurname(); ?> required>
                            <div class="invalid-feedback">Please choose a surname.</div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" value=<?= $user->getEmail(); ?> required>
                            <div class="invalid-feedback">Please choose an email.</div>
                        </div>
                        <div class="col-6">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" value=<?= $user->getUsername(); ?> required>
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="password">Nuova password:</label>
                            <input class="form-control" type="password" name="password" placeholder="8-50 chars with digits and capitals" pattern="(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}">
                            <div class="invalid-feedback">Please choose a valid password.</div>
                        </div>

                        <div class="col-6">
                            <label for="password">Conferma nuova password:</label>
                            <input class="form-control" type="password" name="password_confirm" pattern="(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}">
                            <div class="invalid-feedback">Password confirmation gone wrong</div>
                        </div>
                    </div>
                </fieldset>

                <input type="hidden" name="type" value="account">

                <div class="d-flex row align-items-center justify-content-center">
                    <div class="d-flex align-items-center col-10 justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Modifica">
                        <a class='delete' href="delete.php?account=<?= $_SESSION['loggedUser'] ?>">Elimina account</a>
                    </div>
                </div>
            </form>
        </div>


    </div>
<?php }
include 'modules/footer.php';
?>
<script src="assets/settings.js"></script>