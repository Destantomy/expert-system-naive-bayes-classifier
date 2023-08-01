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

    .data-kepakaran {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 62rem;
        margin: 1.5rem 0 0 55vh;
        padding: 1.5rem;
    }

    .tabel-kepakaran {
        margin: 0.5rem 5px 0 0;
        height: auto;
        width: auto;
    }

    thead {
        background-color: #398DC3;
        text-align: center;
        color: white;
    }

    tbody {
        text-align: center;
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

        .data-kepakaran {
            border: 1px solid #d5d8dc;
            border-radius: 5px;
            float: left;
            position: absolute;
            width: 24rem;
            height: fit-content;
            margin: 1rem 0 0 4vh;
            padding: 1.5rem;
            font-size: 12px;
            left: 0%;
            transition: all 0.7s ease;
        }

        .data-kepakaran.active {
            left: -300%;
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
                        <li><a class="dropdown-item text-center" href="/Logs/logon">Logout</a></li>
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
<!-- content -->
<div class="data-kepakaran">
    <h4>Data Kepakaran</h4>
    <div class="tabel-kepakaran">
        <?php if (session()->getFlashdata('register_messages')) : ?>
            <br><br>
            <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('register_messages'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('updated_messages')) : ?>
            <br><br>
            <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('updated_messages'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('deleted_messages')) : ?>
            <br><br>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('deleted_messages'); ?>
            </div>
        <?php endif; ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Penyakit</th>
                    <th scope="col">Penyakit</th>
                    <th scope="col">Penanganan</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (5 * ($currentPages - 1)); ?>
                <?php foreach ($data_kepakaran as $dkp) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $dkp['kode_penyakit']; ?></td>
                        <td><?= $dkp['penyakit']; ?></td>
                        <td>Selengkapnya..</td>
                        <td> <a href="/Admin_dataKepakaran/tambahDataPakar/<?= $dkp['id']; ?>" style="font-size: 12px;" class="btn btn-warning"><i class="fa-solid fa-plus"></i> Data Pakar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('data_kepakaran', 'data_pengguna_pager'); ?>
    </div>
</div>
<!-- end-content -->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const konten = document.querySelector(".data-penyakit");
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