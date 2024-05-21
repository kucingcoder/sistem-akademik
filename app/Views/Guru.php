<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Guru<?= $this->endSection() ?>
<?= $this->section('Menu') ?>guru<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Guru</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Guru</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card revenue-card" id="data">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Filter">
                        <a class="icon" role="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" role="button" onclick="FilterGuru('Semua')">Semua</a></li>
                            <li><a class="dropdown-item" role="button" onclick="FilterGuru('Produktif')">Produktif</a></li>
                            <li><a class="dropdown-item" role="button" onclick="FilterGuru('Adaptif')">Adaptif</a></li>
                            <li><a class="dropdown-item" role="button" onclick="FilterGuru('Normatif')">Normatif</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title badge border-success border-1 text-success" id="TotalGuru">Total <?php echo count($GuruSemua); ?> Guru <span>| Aktif</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah seorang guru">
                                <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#verticalycentered4">
                                    <i class="bi bi-person-plus-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="tabel-guru">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $index = 1; ?>

                                <?php foreach ($GuruSemua as $Guru) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $index; ?></th>
                                        <td><?php echo $Guru->nama; ?></td>
                                        <td><?php echo $Guru->kategori; ?></td>
                                        <td><?php echo $Guru->gender; ?></td>
                                        <td>
                                            <a class="btn btn-primary rounded-pill btn-sm" href="profil-guru?nip=<?php echo $Guru->nip; ?>">
                                                <i class="bi bi-info-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="AkanBerhenti('<?php echo $Guru->nama; ?>','<?php echo $Guru->nip; ?>')">
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

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($JadwalHariIni)) : ?>
                        <h5 class="card-title">KBM Hari Ini <span>| <?= count($JadwalHariIni); ?> Kelas</span></h5>

                        <div class="activity">
                            <?php foreach ($JadwalHariIni as $jadwal) : ?>
                                <div class="activity-item d-flex">
                                    <div class="activite-label"><?= substr($jadwal->mulai, 0, 5); ?></div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        <a href="<?= "/pelaksanaan-kbm/" . $jadwal->kode_mapel .  "/" . substr($jadwal->mulai, 0, 5) . "/" . substr($jadwal->selesai, 0, 5) ?>" class="fw-bold text-dark"><?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $jadwal->teks); ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <h5 class="card-title">KBM Hari Ini <span>| Kosong</span></h5>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Filter">
                    <a class="icon" data-bs-toggle="dropdown" role="button"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" onclick="Kegiatan('Ganjil')" role="button">Ganjil</a></li>
                        <li><a class="dropdown-item" onclick="Kegiatan('Genap')" role="button">Genap</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Kalender Akademik <span id="Semester">| <?php echo $Kaldik["Semester"]; ?></span></h5>

                    <?php
                    if ($Kaldik["Semester"] == "Ganjil") {
                        $DaftarKegiatan = $Kaldik["Ganjil"];
                    } else {
                        $DaftarKegiatan = $Kaldik["Genap"];
                    }
                    ?>

                    <div class="activity" id="DaftarKegiatan">
                        <?php foreach ($DaftarKegiatan as $ItemKegiatan) : ?>
                            <div class="activity-item d-flex" style="height: 95px;">
                                <div class="activite-label text-center"><?php echo implode("<br>-<br>", explode("-", $ItemKegiatan->waktu)); ?></div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content"><?php echo $ItemKegiatan->kegiatan; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menonaktifkan Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="AkanBerhenti('Anu','')"></button>
            </div>
            <div class="modal-body" id="AkanBerhenti">
                Apakah yakin Guru dengan nama Anu yang akan dinonaktifkan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="AkanBerhenti('Anu','')">BATAL</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="InfoCalonBerhenti()">IYA</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered1" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Konfirmasi Menonaktifkan Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="NIP" disabled id="STOP-Nip">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Brandon Jacob" disabled id="STOP-Nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Laki-laki" disabled id="STOP-Gender">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Tempat Lahir" disabled id="STOP-TempatLahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Alamat" disabled id="STOP-Alamat">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-4 pt-0">Alasan Dinonaktifkan</legend>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios1" value="D" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Dibebastugaskan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios2" value="U">
                                    <label class="form-check-label" for="gridRadios2">
                                        Mengundurkan Diri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios3" value="N">
                                    <label class="form-check-label" for="gridRadios3">
                                        Pensiun
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios4" value="T">
                                    <label class="form-check-label" for="gridRadios4">
                                        Meninggal Dunia
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="NIK" disabled id="STOP-Nik">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Adaptif" disabled id="STOP-Kategori">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Agama" disabled id="STOP-Agama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Tanggal Lahir" disabled id="STOP-TanggalLahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Kompetensi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Kompetensi" disabled id="STOP-Kompetensi">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputNumber" class="col-md-4">Unggah Dokumen</label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" id="formFile-nonaktif">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="AkanBerhenti('Anu','')">BATAL</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered3" onclick="FixBerhenti()">NONAKTIFKAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered3" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form onsubmit="Nonaktif(event)">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Menonaktifkan Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="AkanBerhenti('Anu','')"></button>
                </div>
                <div id="FixBerhenti" class="modal-body">
                    Dengan Menekan Tombol NONAKTIF, maka Guru dengan nama Anu akan dinonaktifkan secara Permanen, dan tidak dapat Dikembalikan Statusnya Seperti Sedia Kala
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="AkanBerhenti('Anu','')">BATAL</button>
                    <button type="submit" class="btn btn-danger">NONAKTIF</a></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered4" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Guru Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="NIP" id="TambahNIP">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="NIK" id="TambahNIK">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="TambahNama">
                    </div>
                    <div class="col-md-4">
                        <select id="TambahGender" class="form-select">
                            <option selected disabled>Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="TambahAgama" class="form-select">
                            <option selected disabled>Agama</option>
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Katholik</option>
                            <option value="4">Hindu</option>
                            <option value="5">Budha</option>
                            <option value="6">Konghuchu</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="TambahStatusPerkawinan" class="form-select">
                            <option selected disabled>Status Perkawinan</option>
                            <option value="K">Kawin</option>
                            <option value="B">Belum Kawin</option>
                            <option value="D">Duda</option>
                            <option value="J">Janda</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" style="height: 100px" placeholder="Alamat" id="TambahAlamat"></textarea>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Tempat Lahir" id="TambahTempatLahir">
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" placeholder="Tanggal Lahir" id="TambahTanggalLahir">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="No Telp." id="TambahNoTelp">
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="form-control" placeholder="Email" id="TambahEmail">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Kompetensi" id="TambahKompetensi">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Lulusan Tahun" id="TambahLulusTahun">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Asal Perguruan Tinggi" id="TambahAsalPerguruanTinggi">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Jabatan" id="TambahJabatan">
                    </div>
                    <div class="col-md-4">
                        <label for="inputNumber" class="col-md-6">Unggah Foto</label>
                        <div class="col-md-12">
                            <input class="form-control" type="file" id="TambahFoto">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered5">TAMBAHKAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered5" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menambahkan Guru Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah yakin Data Guru Baru sudah Benar dan akan ditambahkan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered4">BATAL</button>
                <button type="button" class="btn btn-primary" onclick="TambahGuru()">IYA</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    $("#tabel-guru").DataTable();

    function Kegiatan(semester) {
        if (semester == "Ganjil") {
            document.getElementById("Semester").innerHTML = "Ganjil";
            <?php
            $DaftarKegiatan = $Kaldik["Ganjil"];
            $Kegiatan = "";
            foreach ($DaftarKegiatan as $ItemKegiatan) :
                $Kegiatan .= "
                        <div class='activity-item d-flex' style='height: 95px;'>
                            <div class='activite-label text-center'>" . implode("<br>-<br>", explode("-", $ItemKegiatan->waktu)) . "</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class='activity-content'>$ItemKegiatan->kegiatan</div>
                        </div>
                    ";
            endforeach;
            ?>

            document.getElementById("DaftarKegiatan").innerHTML = `<?php echo $Kegiatan; ?>`
        } else {
            document.getElementById("Semester").innerHTML = "Genap";
            <?php
            $DaftarKegiatan = $Kaldik["Genap"];
            $Kegiatan = "";
            foreach ($DaftarKegiatan as $ItemKegiatan) :
                $Kegiatan .= "
                        <div class='activity-item d-flex' style='height: 95px;'>
                            <div class='activite-label text-center'>" . implode("<br>-<br>", explode("-", $ItemKegiatan->waktu)) . "</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class='activity-content'>$ItemKegiatan->kegiatan</div>
                        </div>
                    ";
            endforeach;
            ?>

            document.getElementById("DaftarKegiatan").innerHTML = `<?php echo $Kegiatan; ?>`
        }
    }

    function FilterGuru(jenis) {
        document.getElementById("data").innerHTML = "";

        var DaftarGuru = "";
        var TotalGuru = "";
        var Tabel = "";
        var Konten = "";

        var spanElement = document.createElement("span");
        spanElement.textContent = "| Aktif";

        if (jenis == "Semua") {
            DaftarGuru = <?php echo json_encode($GuruSemua); ?>;
            TotalGuru = "<?php echo count($GuruSemua); ?>";
        } else if (jenis == "Produktif") {
            DaftarGuru = <?php echo json_encode($GuruProduktif); ?>;
            TotalGuru = "<?php echo count($GuruProduktif); ?>";
        } else if (jenis == "Adaptif") {
            DaftarGuru = <?php echo json_encode($GuruAdaptif); ?>;
            TotalGuru = "<?php echo count($GuruAdaptif); ?>";
        } else {
            DaftarGuru = <?php echo json_encode($GuruNormatif); ?>;
            TotalGuru = "<?php echo count($GuruNormatif); ?>";
        }

        var index = 1;
        DaftarGuru.forEach(function(guru) {
            Tabel += `
                            <tr>
                                <th scope="row">${index}</th>
                                <td>${guru.nama}</td>
                                <td>${guru.kategori}</td>
                                <td>${guru.gender}</td>
                                <td>
                                    <a class="btn btn-primary rounded-pill btn-sm" href="profil-guru?nip=${guru.nip}">
                                        <i class="bi bi-info-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="AkanBerhenti('${guru.nama}','${guru.nip}')">
                                        <i class="bi bi-eraser"></i>
                                    </button>
                                </td>
                            </tr>

            `
            index++;
        });

        Konten = `
                <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Filter">
                    <a class="icon" role="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        <li><a class="dropdown-item" role="button" onclick="FilterGuru('Semua')">Semua</a></li>
                        <li><a class="dropdown-item" role="button" onclick="FilterGuru('Produktif')">Produktif</a></li>
                        <li><a class="dropdown-item" role="button" onclick="FilterGuru('Adaptif')">Adaptif</a></li>
                        <li><a class="dropdown-item" role="button" onclick="FilterGuru('Normatif')">Normatif</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title badge border-success border-1 text-success" id="TotalGuru">Total ${TotalGuru} Guru <span>| Aktif</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah seorang guru">
                            <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#verticalycentered4">
                                <i class="bi bi-person-plus-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped w-100" id="tabel-guru">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            ${Tabel}
                        </tbody>
                    </table>
                </div>
        `

        document.getElementById("data").innerHTML = Konten;
        $("#tabel-guru").DataTable();
    }

    function TambahGuru() {
        var Nip = document.getElementById("TambahNIP").value;
        var Nik = document.getElementById("TambahNIK").value;
        var Nama = document.getElementById("TambahNama").value;
        var Gender = document.getElementById("TambahGender").value;
        var Agama = document.getElementById("TambahAgama").value;
        var StatusPerkawinan = document.getElementById("TambahStatusPerkawinan").value;
        var TempatLahir = document.getElementById("TambahTempatLahir").value;
        var TanggalLahir = document.getElementById("TambahTanggalLahir").value;
        var NoTelp = document.getElementById("TambahNoTelp").value;
        var Email = document.getElementById("TambahEmail").value;
        var Alamat = document.getElementById("TambahAlamat").value;
        var Kompetensi = document.getElementById("TambahKompetensi").value;
        var LulusanTahun = document.getElementById("TambahLulusTahun").value;
        var AsalPerguruanTinggi = document.getElementById("TambahAsalPerguruanTinggi").value;
        var Jabatan = document.getElementById("TambahJabatan").value;
        var Foto = document.getElementById("TambahFoto").files[0];

        var formData = new FormData();
        formData.append("Nip", Nip);
        formData.append("Nik", Nik);
        formData.append("Nama", Nama);
        formData.append("Gender", Gender);
        formData.append("Agama", Agama);
        formData.append("StatusPerkawinan", StatusPerkawinan);
        formData.append("TempatLahir", TempatLahir);
        formData.append("TanggalLahir", TanggalLahir);
        formData.append("NoTelp", NoTelp);
        formData.append("Email", Email);
        formData.append("Alamat", Alamat);
        formData.append("Kompetensi", Kompetensi);
        formData.append("LulusanTahun", LulusanTahun);
        formData.append("AsalPerguruanTinggi", AsalPerguruanTinggi);
        formData.append("Jabatan", Jabatan);
        formData.append("Foto", Foto);

        fetch("/guru/tambah", {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal menambah guru');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    if (data.status == 200) {} else {}
                }
            })
            .catch(error => {});

        var modal = document.getElementById("verticalycentered5");
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    }

    var NipCalonBerhenti = "";
    var NamaCalonBerhenti = "";

    function AkanBerhenti(nama, nis) {
        document.getElementById("AkanBerhenti").innerHTML = "Apakah yakin Guru dengan nama " + nama + " yang akan dinonaktifkan?";
        NipCalonBerhenti = nis;
        NamaCalonBerhenti = nama;
    }

    function InfoCalonBerhenti() {
        document.getElementById("STOP-Nip").removeAttribute("disabled");
        document.getElementById("STOP-Nik").removeAttribute("disabled");
        document.getElementById("STOP-Nama").removeAttribute("disabled");
        document.getElementById("STOP-Kategori").removeAttribute("disabled");
        document.getElementById("STOP-Gender").removeAttribute("disabled");
        document.getElementById("STOP-TempatLahir").removeAttribute("disabled");
        document.getElementById("STOP-TanggalLahir").removeAttribute("disabled");
        document.getElementById("STOP-Alamat").removeAttribute("disabled");
        document.getElementById("STOP-Kompetensi").removeAttribute("disabled");

        var nip = NipCalonBerhenti;

        fetch("/guru/berhenti?nip=" + nip)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengambil info calon DO');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("STOP-Nip").value = data.nip;
                    document.getElementById("STOP-Nik").value = data.nik;
                    document.getElementById("STOP-Nama").value = data.nama;
                    document.getElementById("STOP-Kategori").value = data.kategori;
                    document.getElementById("STOP-Gender").value = data.gender;
                    document.getElementById("STOP-TempatLahir").value = data.tempat_lahir;

                    document.getElementById("STOP-TanggalLahir").value = new Date(data.tanggal_lahir).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    document.getElementById("STOP-Alamat").value = data.alamat;
                    document.getElementById("STOP-Kompetensi").value = data.kompetensi;
                }
            })
            .catch(error => {});

        document.getElementById("STOP-Nip").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Nik").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Nama").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Kategori").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Gender").setAttribute("disabled", "disabled");
        document.getElementById("STOP-TempatLahir").setAttribute("disabled", "disabled");
        document.getElementById("STOP-TanggalLahir").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Alamat").setAttribute("disabled", "disabled");
        document.getElementById("STOP-Kompetensi").setAttribute("disabled", "disabled");
    }

    var NipBerhenti = "";
    var NamaBerhenti = "";

    function FixBerhenti() {
        NipBerhenti = NipCalonBerhenti;
        NamaBerhenti = NamaCalonBerhenti;
        document.getElementById("FixBerhenti").innerHTML = "Dengan Menekan Tombol NONAKTIF, maka Guru dengan " + NamaBerhenti + " Anu akan dinonaktifkan secara Permanen, dan tidak dapat Dikembalikan Statusnya Seperti Sedia Kala";
    }

    function Nonaktif() {
        event.preventDefault();

        var alasan = document.getElementsByName("Alasan");
        var status = "";

        for (var i = 0; i < alasan.length; i++) {
            if (alasan[i].checked) {
                status = alasan[i].value;
                break;
            }
        }

        var Dokumen = document.getElementById("formFile-nonaktif").files[0];

        var formData = new FormData();
        formData.append("NIP", NipBerhenti);
        formData.append("Status", status);
        formData.append("Dokumen", Dokumen)

        fetch("/guru/berhenti", {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
<?= $this->endSection() ?>