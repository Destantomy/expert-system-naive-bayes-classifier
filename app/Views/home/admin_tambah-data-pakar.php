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

    .tambah-pakar {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: left;
        position: absolute;
        width: 33rem;
        margin: 1.5rem 0 0 45vh;
        padding: 1.5rem;
    }

    .data-pakar {
        border: 1px solid #d5d8dc;
        border-radius: 5px;
        float: right;
        position: absolute;
        width: 39rem;
        margin: 1.5rem 0 0 123vh;
        padding: 1.5rem;
    }

    .btn-back {
        background-color: #398DC3;
        color: white;
        float: right;
    }

    .btn-back:hover {
        color: lightblue;
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

        .tambah-pakar {
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

        .tambah-pakar.active {
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
<!-- konten -->
<div class="tambah-pakar">
    <form action="/Admin_dataKepakaran/simpanDataPakar/<?= $data_penyakit['id']; ?>" method="POST">
        <?= csrf_field(); ?>
        <input type="text" name="id" value="<?= $data_penyakit['id']; ?>" hidden>
        <div class="title">
            <label for="exampleInputEmail1" class="form-label">
                <h4>Buat Data Kepakaran</h4>
            </label>
        </div>
        <div class="headline">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Penyakit</label>
                <input name="kode_penyakit" type="text" readonly value="<?= $data_penyakit['kode_penyakit']; ?>" class="form-control <?= ($validation->hasError('kode_penyakit')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="The correct pakar's code is start using KP letter. Example : KP01 and next..">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('kode_penyakit'); ?>
                </div>
            </div>
        </div>
        <div class="konten">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Penyakit</label>
                <input name="pakar_penyakit" type="text" readonly value="<?= $data_penyakit['penyakit']; ?>" class="form-control <?= ($validation->hasError('penyakit')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="The correct pakar's code is start using KP letter. Example : KP01 and next..">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('penyakit'); ?>
                </div>
            </div>
        </div>
        <div class="konten">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Penanganan</label>
                <input name="pakar_penanganan" type="text" readonly value="<?= $data_penyakit['penanganan']; ?>" class="form-control <?= ($validation->hasError('penyakit')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="The correct pakar's code is start using KP letter. Example : KP01 and next..">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('penyakit'); ?>
                </div>
            </div>
        </div>
        <div class="konten">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gejala</label>
                <select name="pakar_gejala" class="form-select <?= ($validation->hasError('pakar_gejala')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <?php foreach ($pakar_gejala as $pg) : ?>
                        <option style="font-size: 12px;"><?= $pg['kode_gejala']; ?> | <?= $pg['gejala']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('pakar_gejala'); ?>
                </div>
            </div>
        </div>
        <div class="konten">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Probabilitas</label>
                <input name="pakar_probabilitas" type="number" min="0" max="1" step="any" placeholder="Insert probability" class="form-control <?= ($validation->hasError('pakar_probabilitas')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('pakar_probabilitas'); ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a href="/Admin_dataKepakaran/dataKepakaran/" class="btn btn-back"><i class="fa-solid fa-arrow-rotate-left"></i> Back</a>
    </form>
</div>
<div class="data-pakar">
    <div class="title">
        <label for="exampleInputEmail1" class="form-label">
            <h6>Data Kepakaran</h6>
        </label>
        <div class="form-cari">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input name="keyword" style="font-size: 12px;" type="text" class="form-control" placeholder="Cari berdasarkan kode atau nama penyakit" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button name="submit" style="font-size: 12px;" class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-hover">
        <?php if (session()->getFlashdata('register_messages')) : ?>
            <div style="font-size:12px" class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('register_messages'); ?>
            </div>
        <?php endif; ?>
        <thead>
            <tr>
                <th style="font-size: 12px;" scope="col">No.</th>
                <th style="font-size: 12px;" scope="col">Kode Penyakit</th>
                <th style="font-size: 12px;" scope="col">Penyakit</th>
                <th style="font-size: 12px;" scope="col">Gejala</th>
                <th style="font-size: 12px;" scope="col">Penanganan</th>
                <th style="font-size: 12px;" scope="col">Probabilitas</th>
                <th style="font-size: 12px;" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + (5 * ($currentPages - 1)); ?>
            <?php foreach ($data_kepakaran as $dkp) : ?>
                <tr>
                    <th style="font-size: 12px; text-align:center;" scope="row"><?= $no++; ?></th>
                    <td style="font-size: 12px; text-align:center;"><?= $dkp['kode_penyakit']; ?></td>
                    <td style="font-size: 12px; text-align:justify;"><?= $dkp['penyakit']; ?></td>
                    <td style="font-size: 12px; text-align:justify;"><?= $dkp['gejala']; ?></td>
                    <td style="font-size: 12px; text-align:justify;">Selengkapnya</td>
                    <td style="font-size: 12px; text-align:center;"><?= $dkp['probabilitas']; ?></td>
                    <td style="font-size: 12px; text-align:justify;"><a href="/Admin_dataKepakaran/hapusDataPakar/<?= $dkp['id']; ?>" style="align-items: center;" class="btn btn-danger" onclick="return confirm('Hapus data gejala? Anda akan di-redirect ke halaman data pakar.');"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('data_kepakaran', 'data_pengguna_pager'); ?>
</div>
<!-- end-konten -->
<script>
    const button1 = document.querySelector(".btn-toggle");
    const button2 = document.querySelector(".close-btn");
    const sidebar = document.querySelector(".sidebar");
    const konten = document.querySelector(".tambah-gejala");
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