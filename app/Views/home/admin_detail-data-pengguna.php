<?= $this->extend('home/template.php'); ?>
<?= $this->section('content_home'); ?>
<!-- styling -->
<style>
    .bg-navbar {
        background-color: #398DC3;
    }

    .bg-admin {
        background-color: seagreen;
        color: white;
    }

    .bg-dotted {
        color: #73c6b6;
    }

    .bg-profile {
        padding: 1px;
        border: 1px solid white;
        border-radius: 5px;
    }

    .sidebar {
        position: absolute;
        background-color: #398DC3;
        float: left;
        width: 290px;
        height: 100%;
        overflow-y: scroll;
    }

    .sidebar-title {
        background-color: #7fb3d5;
        color: white;
        text-align: center;
        height: 90px;
        padding: 11%;
    }

    .sidebar-content {
        color: white;
    }

    .sidebar-content ul li {
        list-style: none;
        border-bottom: 1px solid #7fb3d5;
        width: 80%;
    }

    .sidebar-content ul li a {
        display: inline-block;
        text-decoration: none;
        color: white;
        list-style: none;
        height: 100%;
        line-height: 55px;
        box-sizing: content-box;
        transition: 1s;
    }

    .sidebar-content ul li a:hover {
        margin-left: 35px;
    }

    .copyrights {
        color: white;
        padding-left: 10%;
    }

    .btn-toggle {
        display: none;
    }

    .close-btn {
        display: none;
    }

    .btn-back {
        background-color: #398DC3;
        color: white;
        float: right;
    }

    .btn-back:hover {
        color: lightblue;
    }

    .detail-pengguna {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 50rem;
        margin: 1.5rem 0 0 69vh;
        padding: 1.5rem;
    }

    @media(max-width : 900px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
            position: absolute;
            background-color: #398DC3;
            float: left;
            width: 290px;
            height: 100%;
            overflow-y: scroll;
            left: -300%;
            transition: all 0.7s ease;
        }

        .sidebar.active {
            left: 0%;
        }

        .close-btn {
            border-radius: 2px;
            width: fit-content;
            padding: 0 5px;
            display: block;
            border: 1px solid white;
            color: white;
            float: right;
            margin-top: -50px;
            margin-right: -26px;
            cursor: pointer;
            transition: 0.5s;
        }

        .close-btn:hover {
            color: #398DC3;
            background-color: white;
            border: 1px solid white;
        }

        .btn-toggle {
            display: block;
            background-color: #398DC3;
            border: 1px solid white;
            color: white;
            float: left;
            cursor: pointer;
            padding: 0 5px 2px 5px;
            margin-left: -6vh;
            margin-top: 1vh;
            border-radius: 2px;
            transition: 1s;
        }

        .btn-toggle:hover {
            background-color: white;
            color: #398DC3;
            border-radius: 2px;
        }

        .detail-pengguna {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            width: 20rem;
            margin: 1.5rem 0 0 8vh;
            padding: 1.5rem;
            left: 0%;
            transition: all 0.7s ease;
        }

        .detail-pengguna.active {
            left: -300%;
        }

        .btn-ku {
            font-size: 10px;
            width: fit-content;
        }

        .btn-back {
            font-size: 10px;
            width: fit-content;
        }
    }
</style>
<!-- end styling -->
<!--navbar-->
<div class="top-bar">
    <nav class="navbar navbar-light bg-navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white ms-5">
                <div class="btn-toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h2>Dental Care</h2>
                <h6>entrust your teeth health with us</h6>
            </span>
            <div class="profile float-right">
                <div class="nav-item dropdown me-5 bg-profile">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-circle bg-dotted"></i> Hello, <?= session()->get('username'); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="text-center bg-admin"><?= session()->get('status'); ?></li>
                        <li><a class="dropdown-item text-center" href="/Logs/logon" onclick="return confirm('Logout dari akun?');">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<!--end navbar-->
<!--sidebar-->
<div class="sidebar">
    <div class="sidebar-title">
        <header>Navigations</header>
        <div class="close-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li>
                <a href="/Admin_dataPengguna/beranda">Beranda</a>
            </li>
            <li>
                <a href="/Admin_dataPengguna/dataPengguna">Data Pengguna</a>
            </li>
            <li>
                <a href="/Admin_dataPenyakit/dataPenyakit">Data Penyakit</a>
            </li>
            <li>
                <a href="/Admin_dataGejala/dataGejala">Data Gejala</a>
            </li>
            <li>
                <a href="/Admin_dataKepakaran/dataKepakaran">Data Kepakaran</a>
            </li>
            <li>
                <a href="/Admin_seputarGigi/seputarGigi">Seputar Gigi</a>
            </li>
        </ul>
    </div>
    <div class="copyrights">
        <small>copyrights &copy Destanto M. Y. 2022</small>
    </div>
</div>
<!--endsidebar-->
<!--form detail-->
<div class="detail-pengguna">
    <legend>Detail Data Pengguna</legend>
    <form action="/Admin_dataPengguna/updateDataPengguna/<?= $data_pengguna['id']; ?>" method="POST">
        <?= csrf_field(); ?>
        <input type="text" name="id" value="<?= $data_pengguna['id']; ?>" hidden>
        <div class="username">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input name="username" type="text" autofocus value="<?= $data_pengguna['username']; ?>" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
        </div>
        <div class="status">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select name="level" class="form-select" aria-label="Default select example">
                    <?php if (session()->get('status') == 'Admin') : ?>
                        <option value="Admin" <?php if ($data_pengguna['status'] == 'Admin') : ?> selected <?php endif; ?>>Admin</option>
                        <option value="User" <?php if ($data_pengguna['status'] == 'User') : ?> selected <?php endif; ?>>User</option>
                    <?php endif; ?>
                    <?php if (session()->get('status') == 'User') : ?>
                        <option selected><?= $data_pengguna['status']; ?></option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="gender">
            <label for="exampleInputEmail1" class="form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if ($data_pengguna['gender'] == 'Male') : ?> checked <?php endif; ?>>
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if ($data_pengguna['gender'] == 'Female') : ?> checked <?php endif; ?>>
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
        </div>
        <div class="ages">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ages</label>
                <input name="ages" type="number" value="<?= $data_pengguna['ages']; ?>" class="form-control <?= ($validation->hasError('ages')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('ages'); ?>
                </div>
            </div>
        </div>
        <div class="password">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" value="<?= $data_pengguna['password']; ?>" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning btn-ku" onclick="return confirm('Update data akun?');">Update</button>
        <a href="/akun/<?= $data_pengguna['id']; ?>" class="btn btn-danger btn-ku" onclick="return confirm('Hapus akun?');">Delete Account</a>
        <?php if (session()->get('status') == 'Admin') : ?>
            <a href="/Admin_dataPengguna/dataPengguna" class="btn-back btn">
                <i class="fa-solid fa-arrow-rotate-left"></i> Back
            </a>
        <?php endif ?>
        <?php if (session()->get('status') == 'User') : ?>
            <a href="/Admin_dataPengguna/beranda" class="btn-back btn">
                <i class="fa-solid fa-arrow-rotate-left"></i> Back
            </a>
        <?php endif ?>
    </form>
</div>
<!--end form detail-->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const detail_pengguna = document.querySelector(".detail-pengguna");
    button1.onclick = () => {
        sidebar.classList.add("active");
        detail_pengguna.classList.add("active");

    }
    button2.onclick = () => {
        sidebar.classList.remove("active");
        detail_pengguna.classList.remove("active");
    }
</script>
<?= $this->endSection(); ?>