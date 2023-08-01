<?= $this->extend('home/template.php'); ?>
<?= $this->section('content_home'); ?>
<!-- styling -->
<style>
    .top-bar {
        width: auto;
    }

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

    .konten-beranda {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 40rem;
        margin: 1.5rem 0 0 80vh;
        padding: 1.5rem;
    }

    .welcome {
        color: darkslategray;
    }

    .welcome img {
        width: 20rem;
        margin-left: 8rem;
    }

    .welcome h1 {
        float: left;
    }

    .welcome .brand {
        float: right;
        padding: 0 1rem 0 0;
    }

    .welcome .brand h2 {
        color: white;
        padding: 8px;
        width: auto;
        height: auto;
        background-color: #398DC3;
        border-radius: 5px;
    }

    .tip {
        padding-top: 3rem;
        float: left;
    }

    @media(max-width : 576px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
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

        .konten-beranda {
            position: absolute;
            inset: 0;
            margin: 10rem auto;
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            width: min-content;
            height: max-content;
            padding: 1.5rem;
            font-size: 12px;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten-beranda.active {
            left: -300%;
        }

        .welcome img {
            width: 15rem;
            margin: 1rem;
        }

        .welcome h1 {
            margin: 0 auto;
            float: left;
            font-size: 20px;
        }

        .welcome .brand {
            float: left;
            padding-top: 10px;
        }

        .welcome .brand h2 {
            font-size: 20px;
        }

        .tip {
            padding-top: 1rem;
            float: left;
        }
    }

    @media(min-width : 576px) and (max-width:992px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
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

        .konten-beranda {
            position: absolute;
            inset: 0;
            margin: 10rem auto;
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            width: min-content;
            height: max-content;
            padding: 1.5rem;
            font-size: 12px;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten-beranda.active {
            left: -300%;
        }

        .welcome img {
            width: 15rem;
            margin: 1rem;
        }

        .welcome h1 {
            margin: 0 auto;
            float: left;
            font-size: 20px;
        }

        .welcome .brand {
            float: left;
            padding-top: 10px;
        }

        .welcome .brand h2 {
            font-size: 20px;
        }

        .tip {
            padding-top: 1rem;
            float: left;
        }
    }

    @media (min-width: 992px) and (max-width: 1300px) {
        .top-bar {
            width: auto;
        }

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

        .konten-beranda {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            width: 40rem;
            margin: 5vh 48vh;
            padding: 1.5rem;
            position: absolute;
        }

        .welcome {
            color: darkslategray;
        }

        .welcome img {
            width: 20rem;
            margin-left: 8rem;
        }

        .welcome h1 {
            float: left;
        }

        .welcome .brand {
            float: right;
            padding: 0 1rem 0 0;
        }

        .welcome .brand h2 {
            color: white;
            padding: 8px;
            width: auto;
            height: auto;
            background-color: #398DC3;
            border-radius: 5px;
        }

        .tip {
            padding-top: 3rem;
            float: left;
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
<!-- konten-beranda -->
<div class="konten-beranda">
    <div class="welcome">
        <h1>Selamat Datang di</h1>
        <div class="brand">
            <h2>Dental Care&trade;</h2>
            <p>entrust your teeth health with us</p>
        </div>
        <img src="/images/dental-01.png" alt="logo.png">
    </div>
    <div class="tip">
        <!-- modal-trigger -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#berandaUserModal">
            <i class="fa-solid fa-lightbulb"></i> Quick tips
        </button>
        <!-- modal -->
        <div class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" id="berandaUserModal" aria-labelledby="berandaUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="berandaUserModal"><i class="fa-regular fa-lightbulb"></i> Quick Tips</h5>
                    </div>
                    <div class="modal-body">
                        <div class="konten-1">
                            <h6 style="background-color: #0B5ED7; width:fit-content; padding:4px; border-radius:2px; color:white;">Tentang</h6>
                            <p>Aplikasi ini dibuat untuk membantu anda dalam mendeteksi dini masalah yang terjadi pada gigi.</p>
                        </div>
                        <div class="konten-2">
                            <h6 style="background-color: #7d3c98 ; width:fit-content; padding:4px; border-radius:2px; color:white;">Hint Menu</h6> Berikut adalah berbagai menu yang dapat anda gunakan pada aplikasi ini :
                            <p>
                            <div class="A" style="background-color: #FFC107; width:fit-content; padding:4px; border-radius:2px; color:white;">Beranda</div> Anda berada di menu ini sekarang!
                            </p>
                            <p>
                            <div class="B" style="background-color: red; width:fit-content; padding:4px; border-radius:2px; color:white;">Pemeriksaan Gigi</div>Di menu ini, anda dapat melakukan pemeriksaan gigi dengan memasukkan gejala yang tengah dirasakan.
                            </p>
                            <p>
                            <div class="C" style="background-color: #0DCAF0; width:fit-content; padding:4px; border-radius:2px; color:white;">Seputar Gigi</div>Di menu ini, anda dapat membaca berbagai artikel tentang gigi.</p>
                            <p>
                            <div class="D" style="background-color: #198754; width:fit-content; padding:4px; border-radius:2px; color:white;">Akun Saya</div>Di menu ini, anda dapat melakukan konfigurasi akun.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-modal -->
    </div>
</div>
<!-- end-konten-beranda -->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const konten = document.querySelector(".konten-beranda");
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