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
        background-color: #398DC3;
        float: left;
        width: 290px;
        height: 60rem;
        overflow-y: scroll;
        display: block;
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

    .dashboard-card {
        position: absolute;
        display: inline-block;
        margin: 3% 3%;
    }

    .data-pengguna {
        float: left;
        width: 18rem;
    }

    .data-penyakit {
        float: left;
        width: 18rem;
    }

    .data-gejala {
        float: left;
        width: 18rem;
    }

    .data-pakar {
        float: left;
        width: 18rem;
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
            height: 115%;
            overflow-y: scroll;
            left: -300%;
            transition: all 0.4s ease;
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

        .dashboard-card {
            position: absolute;
            margin: 3rem 20%;
            display: grid;
            left: 0%;
            transition: all 0.7s ease;
        }

        .dashboard-card.show {
            left: -300%;
        }

        .data-pengguna {
            width: 18rem;
        }

        .data-penyakit {
            width: 18rem;
        }

        .data-gejala {
            width: 18rem;
        }

        .data-pakar {
            width: 18rem;
        }
    }

    @media(min-width : 576px) and (max-width:768px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
            position: absolute;
            background-color: #398DC3;
            float: left;
            width: 290px;
            height: 115%;
            overflow-y: scroll;
            transition: all 0.4s ease;
        }

        .dashboard-card {
            position: absolute;
            margin: 3rem 55%;
            display: grid;
        }

        .data-pengguna {
            width: 18rem;
        }

        .data-penyakit {
            width: 18rem;
        }

        .data-gejala {
            width: 18rem;
        }

        .data-pakar {
            width: 18rem;
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
<!--end sidebar-->
<!--dashboard-->
<div class="dashboard-card">
    <div class="data-pengguna">
        <div class="card text-white mb-3" style="max-width: 15rem; background-color : #398DC3;">
            <div class="card-header">Data Pengguna</div>
            <div class="card-body">
                <h1 class="card-title"><i class="fa-solid fa-users"></i></h1>
                <p class="card-text">Jumlah Pengguna : <?= session()->get('jml_pengguna'); ?></p>
            </div>
        </div>
    </div>
    <div class="data-penyakit">
        <div class="card text-white mb-3" style="max-width: 15rem; background-color : #ec7063;">
            <div class="card-header">Data Penyakit</div>
            <div class="card-body">
                <h1 class="card-title"><i class="fa-solid fa-book-medical"></i></h1>
                <p class="card-text">Jumlah Penyakit : <?= session()->get('jml_penyakit'); ?></p>
            </div>
        </div>
    </div>
    <div class="data-gejala">
        <div class="card text-white mb-3" style="max-width: 15rem; background-color : #f5b041;">
            <div class="card-header">Data Gejala</div>
            <div class="card-body">
                <h1 class="card-title"><i class="fa-solid fa-vial"></i></h1>
                <p class="card-text">Jumlah Gejala : <?= session()->get('jml_gejala'); ?></p>
            </div>
        </div>
    </div>
    <div class="data-pakar">
        <div class="card text-white mb-3" style="max-width: 15rem; background-color : #45b39d;">
            <div class="card-header">Data Kepakaran</div>
            <div class="card-body">
                <h1 class="card-title"><i class="fa-solid fa-stethoscope"></i></h1>
                <p class="card-text">Jumlah Data : <?= session()->get('jml_kepakaran'); ?></p>
            </div>
        </div>
    </div>
</div>
<!--end dashboard-->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const card = document.querySelector(".dashboard-card");
    button1.onclick = () => {
        sidebar.classList.add("active");
        card.classList.add("show");
    }
    button2.onclick = () => {
        sidebar.classList.remove("active");
        card.classList.remove("show");
    }
</script>
<?= $this->endSection(); ?>