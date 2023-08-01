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
        height: 135vh;
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
        width: 50rem;
        margin: 1.5rem 0 0 72vh;
        padding: 1.5rem;
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
            height: 150%;
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
            width: 90%;
            height: max-content;
            margin: 10rem auto;
            padding: 1.5rem;
            position: absolute;
            inset: 0;
            font-size: 12px;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten.active {
            left: -300%;
        }

        .btn {
            font-size: 12px;
        }
    }

    @media (min-width:576px) and (max-width : 992px) {

        .profile {
            float: left;
            margin-left: 50px;
        }

        .sidebar {
            position: absolute;
            background-color: #398DC3;
            float: left;
            width: 290px;
            height: 120%;
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
            width: 90%;
            height: max-content;
            margin: 10rem auto;
            padding: 1.5rem;
            position: absolute;
            inset: 0;
            font-size: 14px;
            left: 0%;
            transition: all 0.7s ease;
        }

        .konten.active {
            left: -300%;
        }

        .btn {
            font-size: 14px;
        }
    }

    @media(min-width:992px) and (max-width:1300px) {
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
            height: 120%;
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
            width: 60%;
            margin: 1.5rem 0 0 40vh;
            padding: 1.5rem;
            font-size: 14px;
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
    <div class="konsultasi">
        <h5 style="text-align:center;"><i class="fa-solid fa-user-doctor"></i> Silahkan masukkan gejala yang tengah anda rasakan.</h5>
        <hr>
        <form action="/User_menu/hasil/" method="POST">
            <?php foreach ($pakar_gejala as $pg) : ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" name="periksa[]" value="<?= $pg['kode_gejala']; ?> | <?= $pg['gejala']; ?>" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"><?= $pg['kode_gejala']; ?> | <?= $pg['gejala']; ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit" style="float: right;" class="btn btn-primary" style="margin-top: 1rem;"><i class="fa-solid fa-arrows-rotate"></i> Diagnosa</button>
        </form>
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