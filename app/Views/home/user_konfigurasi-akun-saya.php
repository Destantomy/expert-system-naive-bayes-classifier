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

    .konten {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 38rem;
        margin: 1.5rem 0 0 80vh;
        padding: 1.5rem;
    }

    .header-konten {
        padding-bottom: 10px;
    }

    .text-blue {
        float: right;
        padding-right: 21rem;
    }

    .text-blue h5 {
        background-color: #398DC3;
        border-radius: 3px;
        padding: 5px;
        color: white;
    }

    .kartu {
        border: 1px solid orange;
        border-radius: 5px;
        width: 35rem;
        font-size: 12px;
    }

    .header-kartu {
        text-align: center;
        padding-top: 10px;
    }

    .header-kartu h2 {
        padding-top: 10px;
    }

    .body-kartu {
        padding: 0 37px 37px 37px;
    }

    .back {
        float: right;
    }

    @media(max-width : 576px) {

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

        .konten {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            inset: 0;
            width: fit-content;
            height: fit-content;
            margin: 10rem auto;
            padding: 1.5rem;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten.active {
            left: -300%;
        }

        .header-konten h4 {
            font-size: 20px;
        }

        .text-blue {
            float: right;
            padding-right: 11.5rem;
        }

        .text-blue h5 {
            font-size: 17px;
        }

        .kartu {
            border: 1px solid orange;
            border-radius: 5px;
            width: fit-content;
        }

        .warning {
            font-size: 10px;
        }

        .danger {
            font-size: 10px;
        }

        .back {
            margin-left: 3px;
            font-size: 10px;
        }

        .body-kartu {
            padding: 0 20px 20px 20px;
        }
    }

    @media (min-width:576px) and (max-width : 768px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
            position: absolute;
            background-color: #398DC3;
            float: left;
            width: 290px;
            height: 110%;
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

        .konten {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            inset: 0;
            width: fit-content;
            height: fit-content;
            margin: 10rem auto;
            padding: 1.5rem;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten.active {
            left: -300%;
        }

        .header-konten h4 {
            font-size: 20px;
        }

        .text-blue {
            float: right;
            padding-right: 11.5rem;
        }

        .text-blue h5 {
            font-size: 17px;
        }

        .kartu {
            border: 1px solid orange;
            border-radius: 5px;
            width: fit-content;
        }

        .warning {
            font-size: 10px;
        }

        .danger {
            font-size: 10px;
        }

        .back {
            margin-left: 3px;
            font-size: 10px;
        }

        .body-kartu {
            padding: 0 20px 20px 20px;
        }
    }

    @media (min-width:768px) and (max-width:992px) {
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
            height: 115%;
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

        .konten {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            width: fit-content;
            margin: 1.5rem 0 0 40%;
            padding: 1.5rem;
        }

        .header-konten {
            padding-bottom: 10px;
        }

        .text-blue {
            float: right;
            padding-right: 21rem;
        }

        .text-blue h5 {
            background-color: #398DC3;
            border-radius: 3px;
            padding: 5px;
            color: white;
        }

        .kartu {
            border: 1px solid orange;
            border-radius: 5px;
            width: fit-content;
            font-size: 12px;
        }

        .header-kartu {
            text-align: center;
            padding-top: 10px;
        }

        .header-kartu h2 {
            padding-top: 10px;
        }

        .body-kartu {
            padding: 0 37px 37px 37px;
        }

        .back {
            float: right;
            margin-left: 3px;
        }
    }

    @media (min-width:992px) and (max-width:1300px) {
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
            height: 115%;
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

        .konten {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            width: fit-content;
            margin: 1.5rem 0 0 40%;
            padding: 1.5rem;
        }

        .header-konten {
            padding-bottom: 10px;
        }

        .text-blue {
            float: right;
            padding-right: 21rem;
        }

        .text-blue h5 {
            background-color: #398DC3;
            border-radius: 3px;
            padding: 5px;
            color: white;
        }

        .kartu {
            border: 1px solid orange;
            border-radius: 5px;
            width: fit-content;
            font-size: 12px;
        }

        .header-kartu {
            text-align: center;
            padding-top: 10px;
        }

        .header-kartu h2 {
            padding-top: 10px;
        }

        .body-kartu {
            padding: 0 37px 37px 37px;
        }

        .back {
            float: right;
            margin-left: 3px;
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
                <a href="/User_menu/beranda">Beranda</a>
            </li>
            <li>
                <a href="/User_menu/pemeriksaan">Pemeriksaan Gigi</a>
            </li>
            <li>
                <a href="/User_menu/seputarGigi">Seputar Gigi</a>
            </li>
            <li>
                <a href="/User_menu/akunSaya">Akun Saya</a>
            </li>
        </ul>
    </div>
    <div class="copyrights">
        <small>copyrights &copy Destanto M. Y. 2022</small>
    </div>
</div>
<!--endsidebar-->
<!-- konten -->
<div class="konten">
    <div class="header-konten">
        <h4><i class="fa-solid fa-user-gear"></i> Konfigurasi Akun
        </h4>
    </div>
    <div class="kartu">
        <div class="header-kartu">
            <h4><i class="fa-solid fa-address-card"></i> Detail Akun</h4>
            <hr>
        </div>
        <div class="body-kartu">
            <form action="/User_menu/updateAkunSaya/<?= $data_akun['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">#ID</label>
                    <input type="text" name="id" readonly value="<?= $data_akun['id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" value="<?= $data_akun['username']; ?>" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="status">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example">
                        <?php if (session()->get('status') == 'User') : ?>
                            <option selected><?= $data_akun['status']; ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="gender">
                    <label for="exampleInputEmail1" class="form-label">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if ($data_akun['gender'] == 'Male') : ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if ($data_akun['gender'] == 'Female') : ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ages</label>
                    <input type="number" name="ages" value="<?= $data_akun['ages']; ?>" class="form-control <?= ($validation->hasError('ages')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('ages'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" name="password" value="<?= $data_akun['password']; ?>" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning warning" onclick="return confirm('Update data akun? Anda akan di-redirect ke login.');">Update</button>
                <a href="/hapusAkun/<?= $data_akun['id']; ?>" class="btn btn-danger danger" onclick="return confirm('Hapus akun? Anda akan di-redirect ke login.');">Delete My Account</a>
                <a href="/User_menu/akunSaya" class="btn btn-primary back"><i class="fa-solid fa-arrow-rotate-left"></i> Back</a>
            </form>
        </div>
    </div>
</div>
<!-- end-konten -->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const konten = document.querySelector(".konten");
    button1.onclick = () => {
        sidebar.classList.add("active");
        konten.classList.add("active");
    }
    button2.onclick = () => {
        sidebar.classList.remove("active");
        konten.classList.remove("active");
    }
</script>
<?= $this->endSection(); ?>