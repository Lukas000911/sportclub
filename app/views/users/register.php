<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Registracija</h2>
            <p>Užpildykite laukelius pažymėtus žvaigždute *</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Vardas: <sup>*</sup></label>
                    <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstName_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['firstName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['firstName_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Surname">Pavardė: <sup>*</sup></label>
                    <input type="text" name="lastName" class="form-control form-control-lg <?php echo (!empty($data['lastName_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['lastName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['lastName_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Email">Elektroninis paštas: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="Password">Slaptažodis: <sup>*</sup></label>
                    <input type="text" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="phoneNum">Telefono numeris: </label>
                    <input type="text" name="phoneNum" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['phoneNum']; ?>">

                </div>
                <div class="form-group">
                    <label for="homeAddress">Gyvenamasis adresas: </label>
                    <input type="text" name="homeAddress" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['homeAddress']; ?>">

                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block mt-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>