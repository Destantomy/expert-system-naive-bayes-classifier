<?= $this->extend('logs/template.php'); ?>
<?= $this->section('content_logs'); ?>
<style>
    .form-container {
        position: relative;
        top: 22vh;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        margin: auto;
    }

    .color-gray {
        color: gray;
    }

    @media (max-width: 576px) {
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            height: max-content;
            position: absolute;
            inset: 0;
            margin: 7rem auto;
        }
    }

    @media (min-width: 576px) and (max-width: 1300px) {
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: fit-content;
            height: max-content;
            position: absolute;
            inset: 0;
            margin: 7rem auto;
        }
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <form action="/Logs/login" method="POST" class="form-container">
                <?php if (session()->getFlashdata('register_messages')) : ?>
                    <div class="alert alert-primary" role="alert">
                        <?= session()->getFlashdata('register_messages'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('updated_messages')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('updated_messages'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('login_error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('login_error'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('deleted_messages')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('deleted_messages'); ?>
                    </div>
                <?php endif; ?>
                <?= csrf_field() ?>
                <div class="mb-3">
                    <h4>Login</h4>
                    <div class="color-gray">
                        <h6>Welcome! To continue login to your account first.</h6>
                    </div>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Username" autofocus value="<?= old('username'); ?>">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password" placeholder="Password" value="<?= old('password'); ?>">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button><a href="toSignup" class="btn btn-warning ms-1">Signup</a>
            </form>
        </div>
    </div>
</div>
<!--//auto remove slideup
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
-->
<?= $this->endSection(); ?>