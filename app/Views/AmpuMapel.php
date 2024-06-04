<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Ampu Mapel<?= $this->endSection() ?>
<?= $this->section('Menu') ?>mata-pelajaran<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Mata Pelajaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="mata-pelajaran">Mata Pelajaran</a></li>
            <li class="breadcrumb-item active">Mengampu Mata Pelajaran</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total <?= count($DaftarMapel); ?> Mata Pelajaran <span>| <?= $Semester ?> <?= $Tahun ?></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Menetapkan Pengampu Pelajaran pada Semester ini">
                                <button type="button" class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    <i class="bi bi-person-plus-fill"></i>
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
                                            <input type="text" class="form-control" id="inputPassword5" placeholder="Memuat kategori" disabled>
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
                                    <h5 class="modal-title">Menetapkan Pengampu Mata Pelajaran pada Semester Ini</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3">
                                        <div class="col-md-3">
                                            <select class="form-select" multiple aria-label="multiple select example" id="mapel">
                                                <option selected disabled>Pilih Mata Pelajaran</option>
                                                <?php foreach ($MapelTersedia as $Mapel) : ?>
                                                    <option value="<?= $Mapel->id_mapel ?>"><?= $Mapel->mata_pelajaran ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-select" multiple aria-label="multiple select example" id="inisial">
                                                <option selected disabled>Pilih Guru Pengampu</option>
                                                <?php foreach ($DaftarGuru as $Guru) : ?>
                                                    <option value="<?= $Guru->inisial ?>"><?= $Guru->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-select" multiple aria-label="multiple select example" id="id-kelas">
                                                <option selected disabled>Pilih Kelas</option>
                                                <?php foreach ($DaftarKelas as $Kelas) : ?>
                                                    <option value="<?= $Kelas->id_kelas ?>"><?= $Kelas->kelas ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-select" multiple aria-label="multiple select example" id="jam">
                                                <option selected disabled>Pilih Jumlah Jam</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-primary"><a onclick="TambahAmpu()">TETAPKAN</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verticalycentered12" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Membatalkan Pangampu Mata Pelajaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">Apakah yakin Menghapus Pengampu Mata Pelajaran Ini</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-danger"><a onclick="HapuAmpuMapel()">IYA</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="tabel-mapel">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kode Ampu</th>
                                    <th class="text-center col-md-3">Mata Pelajaran</th>
                                    <th class="text-center col-md-1">Guru Pengampu</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Jumlah Jam</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1; ?>
                                <?php foreach ($DaftarMapel as $Mapel) : ?>
                                    <tr>
                                        <th class="text-center"><?= $index; ?></th>
                                        <td class="text-center"><?php echo $Mapel->kode_ampu; ?></td>
                                        <td><?php echo $Mapel->mata_pelajaran; ?></td>
                                        <td><?php echo $Mapel->guru_pengampu; ?></td>
                                        <td class="text-center"><?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Mapel->kelas); ?></td>
                                        <td class="text-center"><?php echo $Mapel->jumlah_jam; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DetailMapel('<?php echo $Mapel->id_mapel ?>')">
                                                <i class="bi bi-info-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered12" onclick="SetId('<?php echo $Mapel->id_ampu ?>')">
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

    function HapuAmpuMapel() {
        fetch('/ampu-mapel/hapus?id=' + id_terpilih)
            .then(response => {
                if (response.redirected) {
                    window.history.replaceState(null, null, response.url);
                    window.location.href = response.url;
                }
            })
    }

    function TambahAmpu() {
        var mapel = document.getElementById("mapel").value;
        var inisial = document.getElementById("inisial").value;
        var kelas = document.getElementById("id-kelas").value;
        var jam = document.getElementById("jam").value;

        fetch('/ampu-mapel/tambah?mapel=' + mapel + '&inisial=' + inisial + '&kelas=' + kelas + '&jam=' + jam)
            .then(response => {
                if (response.redirected) {
                    window.history.replaceState(null, null, response.url);
                    window.location.href = response.url;
                }
            })
    }
</script>
<?= $this->endSection() ?>