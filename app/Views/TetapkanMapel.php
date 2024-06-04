<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Tetapkan Mapel<?= $this->endSection() ?>
<?= $this->section('Menu') ?>mata-pelajaran<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Mata Pelajaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="mata-pelajaran">Mata Pelajaran</a></li>
            <li class="breadcrumb-item active">Tetapkan Mata Pelajaran</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Mata Pelajaran yang Ditetapkan <span>| <?= $Semester ?> <?= $Tahun ?></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Melihat Mata Pelajaran yang Belum Ditetapkan pada Semester saat ini">
                                <button type="button" class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    <i class="bi bi-journal-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verticalycentered1" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detil Mata Pelajaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Mata Pelajaran</label>
                                            <input type="text" class="form-control" id="inputEmail5" placeholder="Memuat Nama" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Kategori</label>
                                            <input type="text" class="form-control" id="inputPassword5" placeholder="Memuat Kategori" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">Deskripsi</label>
                                            <input type="text" class="form-control" id="inputName5" placeholder="Memuat Deskripsi" disabled>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Mata Pelajaran yang Belum Ditetapkan pada Semester Ini</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped w-100" id="tabel-mapel-nonaktif">
                                            <thead>
                                                <tr>
                                                    <th class="text-center col-md-1">#</th>
                                                    <th class="text-center col-md-1">Check</th>
                                                    <th class="text-center col-md-1">Kode</th>
                                                    <th class="text-center col-md-3">Mata Pelajaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $index = 1; ?>
                                                <?php foreach ($DaftarMapelNonAktif as $Mapel) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $index; ?></td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="gridCheck1" onclick="Aktifkan('<?php echo $Mapel->kode; ?>', this)">
                                                                <label class="form-check-label" for="gridCheck1">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><?php echo $Mapel->kode; ?></td>
                                                        <td><?php echo $Mapel->mata_pelajaran; ?></td>
                                                    </tr>
                                                    <?php $index++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-primary"><a onclick="AktifkanMapel()">TETAPKAN</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verticalycentered12" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Membatalkan Penetapan Mata Pelajaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">Apakah yakin Mata Pelajaran Ini akan dibatalkan?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-danger"><a onclick="NonAktifkanMapel()">IYA</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabel-mapel">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center col-md-3">Mata Pelajaran</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1; ?>
                                <?php foreach ($DaftarMapel as $Mapel) : ?>
                                    <tr>
                                        <th class="text-center"><?= $index; ?></th>
                                        <td class="text-center"><?php echo $Mapel->kode; ?></td>
                                        <td><?php echo $Mapel->mata_pelajaran; ?></td>
                                        <td class="text-center"><?php echo $Mapel->kategori; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DetailMapel('<?php echo $Mapel->kode ?>')">
                                                <i class="bi bi-info-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered12" onclick="SetId('<?php echo $Mapel->kode ?>')">
                                                <i class="bi bi-eraser"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $index++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    $("#tabel-mapel").DataTable();
    $("#tabel-mapel-nonaktif").DataTable();

    let id_mapel = [];

    function DetailMapel(id) {
        document.getElementById("inputEmail5").removeAttribute("disabled");
        document.getElementById("inputPassword5").removeAttribute("disabled");
        document.getElementById("inputName5").removeAttribute("disabled");

        fetch("/mata-pelajaran/detail?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("inputEmail5").value = data.nama;
                    document.getElementById("inputPassword5").value = data.kategori;
                    document.getElementById("inputName5").value = data.deskripsi;
                }
            })
            .catch(error => {});

        document.getElementById("inputEmail5").setAttribute("disabled", "disabled");
        document.getElementById("inputPassword5").setAttribute("disabled", "disabled");
        document.getElementById("inputName5").setAttribute("disabled", "disabled");
    }

    let id_terpilih;

    function SetId(id) {
        id_terpilih = id;
    }

    function Aktifkan(id, status) {
        if (status.checked == true) {
            id_mapel.push(id);
        }

        if (status.checked == false) {
            let index = id_mapel.indexOf(id);

            if (index !== -1) {
                id_mapel.splice(index, 1);
            }
        }
    }

    function AktifkanMapel() {
        fetch('/tetapkan-mapel/aktif', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(id_mapel)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }

    function NonAktifkanMapel() {
        fetch('/tetapkan-mapel/nonaktif?id=' + id_terpilih)
            .then(response => {
                if (response.redirected) {
                    window.history.replaceState(null, null, response.url);
                    window.location.href = response.url;
                }
            })
    }
</script>
<?= $this->endSection() ?>