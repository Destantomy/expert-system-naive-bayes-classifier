<?= $this->extend('logs/template.php'); ?>
<?= $this->section('content_logs'); ?>
<style>
    .form-container {
        position: relative;
        top: 10vh;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
    }

    .color-gray {
        color: gray;
    }

    @media (max-width:576px) {
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            height: max-content;
            position: absolute;
            inset: 0;
            margin: 5rem auto;
        }
    }

    @media (min-width:576px) and (max-width:1300px) {
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: max-content;
            height: max-content;
            position: absolute;
            inset: 0;
            margin: 5rem auto;
        }
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <form action="/Logs/register_admin" method="POST" class="form-container">
                <h4>Signup</h4>
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="This isn't an email" value="<?= old('username'); ?>" autofocus>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="level">
                    <label for="exampleInputEmail1" class="form-label">Register as</label>
                    <select class="form-select" aria-label="Default select example" name="level">
                        <option selected>Admin</option>
                    </select>
                </div>
                <div class="genders">
                    <label for="genders" class="form-label">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="inlineRadio1" value="Male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="inlineRadio2" value="Female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('gender'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ages</label>
                    <input type="number" class="form-control <?= ($validation->hasError('ages')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="ages" placeholder="The number of your ages" value="<?= old('ages'); ?>">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('ages'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password" placeholder="Password min-5 length characters" value="<?= old('password'); ?>">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button><a href="toLogin" class="btn btn-warning ms-1">Back</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>