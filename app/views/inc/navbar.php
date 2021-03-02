<nav class="navbar navbar-expand-sm navbar-light bg-secondary">
    <div class="myContainer mx-auto">
        <div class="d-flex justify-content-between">
            <a class="navbar-brand " href="<?php echo URLROOT; ?>"><b><?php echo SITENAME; ?></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link " aria-current="page" href="<?php echo URLROOT; ?>"><b>Titulinis</b></a>
                    <a class="nav-link" href="<?php echo URLROOT; ?>/posts"><b>Atsiliepimai</b></a>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a class="nav-link " aria-current="page" href="<?php echo URLROOT; ?>/users/logout"><b>Logout</b></a>
                    <?php else : ?>
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register"><b>Registruotis</b></a>
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login"><b>Prisijungti</b></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</nav>