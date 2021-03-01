<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Prisijungti</h2>
            <p>Užpildykite laukelius</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                    <label for="Email">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Password">Password: <sup>*</sup></label>
                    <input type="text" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block mt-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>