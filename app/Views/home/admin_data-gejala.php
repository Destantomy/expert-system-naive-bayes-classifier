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

    .data-gejala {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 62rem;
        margin: 1.5rem 0 0 55vh;
        padding: 1.5rem;
    }

    .tabel-gejala {
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

    .form-cari {
        float: right;
        width: 18rem;
        margin: 0 0 0 0;
        font-size: 12px;
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

        .data-gejala {
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

        .data-gejala.active {
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
<div class="data-gejala">
    <div class="tambah-data-gejala" style="float: left;">
        <a href="/Admin_dataGejala/tambahDataGejala" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Data Gejala</a>
    </div>
    <div class="form-cari">
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input name="keyword" style="font-size: 12px;" type="text" class="form-control" placeholder="Cari berdasarkan kode atau nama gejala" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button name="submit" style="font-size: 12px;" class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <div class="tabel-gejala">
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
                    <th scope="col">Kode Gejala</th>
                    <th scope="col">Gejala</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (5 * ($currentPages - 1)); ?>
                <?php foreach ($data_gejala as $dg) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $dg['kode_gejala']; ?></td>
                        <td><?= $dg['gejala']; ?></td>
                        <td>
                            <a href="/Admin_dataGejala/detailDataGejala/<?= $dg['id']; ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('data_gejala', 'data_pengguna_pager'); ?>
    </div>
</div>
<!-- end-content -->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const konten = document.querySelector(".data-gejala");
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