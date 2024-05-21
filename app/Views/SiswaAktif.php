<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Siswa<?= $this->endSection() ?>
<?= $this->section('Menu') ?>siswa<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Siswa Aktif</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Siswa</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card sales-card">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Status Siswa">
                        <a class="icon" role="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Status</h6>
                            </li>
                            <li><a class="dropdown-item" href="siswa">Aktif</a></li>
                            <li><a class="dropdown-item" href="siswa-lulus">Lulus</a></li>
                            <li><a class="dropdown-item" href="siswa-dropout">Drop Out</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title badge border-primary border-1 text-primary">Total <?php echo count($SiswaAktif); ?> Siswa <span>| Aktif</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah siswa satu persatu">
                                <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#verticalycentered1">
                                    <i class="bi bi-person-plus"></i>
                                </a>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah siswa masal">
                                <a class="nav-link collapsed" href="sistem-pendaftaran">
                                    <i class="bi bi-file-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="daftar-siswa">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($SiswaAktif)) : ?>
                                    <?php $index = 1; ?>
                                    <?php foreach ($SiswaAktif as $Anak) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $index; ?></th>
                                            <?php $index++; ?>
                                            <td><?php echo $Anak->nama; ?></td>
                                            <td><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Anak->kelas); ?></td>
                                            <td><?php echo $Anak->gender; ?></td>
                                            <td>
                                                <a class="btn btn-primary rounded-pill btn-sm" href="/profil-siswa?nis=<?php echo $Anak->nis; ?>">
                                                    <i class="bi bi-info-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="AkanDO('<?php echo $Anak->nama; ?>', '<?php echo $Anak->nis; ?>')">
                                                    <i class="bi bi-eraser"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
                <h5 class="modal-title">Konfirmasi Men-dropout-kan Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="AkanDO('Anu', '')"></button>
            </div>
            <div id="AkanDO" class="modal-body">
                Apakah yakin siswa dengan nama Anu yang akan di-dropout-kan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="AkanDO('Anu', '')">BATAL</button>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered3" onclick="InfoCalonDO()">IYA</a></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered1" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Siswa Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNIS" placeholder="NIS">
                            <label for="floatingNIS">NIS</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNISN" placeholder="NISN">
                            <label for="floatingNISN">NISN</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNama" placeholder="Nama Lengkap">
                            <label for="floatingNama">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected>Gender</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <label for="floatingSelect">Gender</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingTmpLhr" placeholder="Tempat Lahir">
                            <label for="floatingT4Lhr">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingTglLhr" placeholder="Tanggal Lahir">
                            <label for="floatingTglLhr">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select id="FloatingAgama" class="form-select" aria-label="State">
                                <option selected disabled>Agama</option>
                                <option value="1">Islam</option>
                                <option value="2">Kristen</option>
                                <option value="3">Katholik</option>
                                <option value="4">Hindu</option>
                                <option value="5">Budha</option>
                                <option value="6">Konghuchu</option>
                            </select>
                            <label for="inputState">Agama</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNotelp" placeholder="No Telp.">
                            <label for="floatingNotelp">No Telp.</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="Email">
                            <label for="floatingEmail">Email</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat" id="floatingTextarea" style="height: 100px;"></textarea>
                            <label for="floatingTextarea">Alamat</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingAsalSKl" placeholder="Asal Sekolah">
                            <label for="floatingAsalSKl">Asal Sekolah</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingUjian" placeholder="Nilai Ujian">
                            <label for="floatingUjian">Nilai Ujian</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingThnLls" placeholder="Tahun Lulus">
                            <label for="floatingThnLls">Tahun Lulus</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingAyah" placeholder="Nama Ayah">
                            <label for="floatingAyah">Nama Ayah</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingTelpAyah" placeholder="No Telp. Ayah">
                            <label for="floatingTelpAyah">No Telp. Ayah</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingKrjAyah" placeholder="Pekerjaan Ayah">
                            <label for="floatingKrjAyah">Pekerjaan Ayah</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingIbu" placeholder="Nama Ibu">
                            <label for="floatingIbu">Nama Ibu</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingTelpIbu" placeholder="No Telp. Ibu">
                            <label for="floatingTelpIbu">No Telp. Ibu</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingKrjIbu" placeholder="Pekerjaan Ibu">
                            <label for="floatingKrjIbu">Pekerjaan Ibu</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select" id="floatingJurusan" aria-label="Jurusan">
                                <option selected disabled>Jurusan</option>
                                <?php if (!empty($DaftarJurusan)) : ?>
                                    <?php foreach ($DaftarJurusan as $Jurusan) : ?>
                                        <option value="<?php echo $Jurusan->id; ?>"><?php echo $Jurusan->nama; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <label for="floatingJurusan">Jurusan</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="inputNumber" class="col-md-6">Unggah Foto</label>
                        <div class="col-md-12">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered2">TAMBAHKAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered2" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menambahkan Siswa Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="KonfirmasiTambahkan" class="modal-body">
                Apakah Yakin Data Siswa Baru dengan Nama Brandon Jacob sudah Benar dan akan Ditambahkan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered1">BATAL</button>
                <button type="submit" class="btn btn-primary"><a href="siswa">IYA</a></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered3" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Men-dropout-kan Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="NIS" id="DO-Nis" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Brandon Jacob" id="DO-Nama" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Laki-laki" id="DO-Gender" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Tempat Lahir" id="DO-TempatLahir" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Alamat" id="DO-Alamat" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Nama Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Nama Ayah" id="DO-NamaAyah" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">No Telp. Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="No Telp. Ayah" id="DO-NoTelpAyah" disabled>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-4 pt-0">Alasan Dropout</legend>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios1" value="D" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Dikeluarkan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios2" value="U">
                                    <label class="form-check-label" for="gridRadios2">
                                        Mengundurkan Diri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Alasan" id="gridRadios3" value="T">
                                    <label class="form-check-label" for="gridRadios3">
                                        Meninggal Dunia
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">NISN</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="NISN" id="DO-Nisn" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="XII Teknika" id="DO-Kelas" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Agama" id="DO-Agama" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Tanggal Lahir" id="DO-TanggalLahir" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Asal Sekolah" id="DO-AsalSekolah" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Nama Ibu" id="DO-NamaIbu" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">No Telp. Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="No Telp. Ibu" id="DO-NoTelpIbu" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputNumber" class="col-md-4">Unggah Dokumen</label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" id="DO-Dokumen">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="AkanDO('Anu', '')">BATAL</button>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered4" onclick="FixDO()">DROPOUT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered4" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form onsubmit="DO(event)">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Men-dropout-kan Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="AkanDO('Anu', '')"></button>
                </div>
                <div id="FixDO" class="modal-body">
                    Dengan Menekan Tombol DROPOUT, maka Siswa dengan Nama Anu akan di-dropout-kan secara Permanen dan Tidak dapat Dikembalikan Statusnya seperti Sedia Kala
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered3" onclick="AkanDO('Anu', '')">BATAL</button>
                    <button type="submit" class="btn btn-danger"><a>DROPOUT</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    $("#daftar-siswa").DataTable();

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

    var NisCalonDO = "";
    var NamaCalonDO = "";

    function AkanDO(nama, nis) {
        document.getElementById("AkanDO").innerHTML = "Apakah yakin siswa dengan nama " + nama + " yang akan di-dropout-kan?";
        NisCalonDO = nis;
        NamaCalonDO = nama;
    }

    function InfoCalonDO() {
        document.getElementById("DO-Nis").removeAttribute("disabled");
        document.getElementById("DO-Nisn").removeAttribute("disabled");
        document.getElementById("DO-Kelas").removeAttribute("disabled");
        document.getElementById("DO-Nama").removeAttribute("disabled");
        document.getElementById("DO-Gender").removeAttribute("disabled");
        document.getElementById("DO-TempatLahir").removeAttribute("disabled");
        document.getElementById("DO-TanggalLahir").removeAttribute("disabled");
        document.getElementById("DO-Alamat").removeAttribute("disabled");
        document.getElementById("DO-NamaAyah").removeAttribute("disabled");
        document.getElementById("DO-NoTelpAyah").removeAttribute("disabled");
        document.getElementById("DO-Agama").removeAttribute("disabled");
        document.getElementById("DO-AsalSekolah").removeAttribute("disabled");
        document.getElementById("DO-NamaIbu").removeAttribute("disabled");
        document.getElementById("DO-NoTelpIbu").removeAttribute("disabled");

        fetch("/siswa/do?nis=" + NisCalonDO)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengambil info calon DO');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("DO-Nis").value = data.nis;
                    document.getElementById("DO-Nisn").value = data.nisn;
                    document.getElementById("DO-AsalSekolah").value = data.asal_sekolah;
                    document.getElementById("DO-Kelas").value = data.kelas;
                    document.getElementById("DO-Nama").value = data.nama;
                    document.getElementById("DO-Gender").value = data.gender;
                    document.getElementById("DO-Agama").value = data.agama;
                    document.getElementById("DO-TempatLahir").value = data.tempat_lahir;

                    document.getElementById("DO-TanggalLahir").value = new Date(data.tanggal_lahir).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    document.getElementById("DO-Alamat").value = data.alamat;
                    document.getElementById("DO-NamaAyah").value = data.nama_ayah;
                    document.getElementById("DO-NoTelpAyah").value = data.no_telp_ayah;
                    document.getElementById("DO-NamaIbu").value = data.nama_ibu;
                    document.getElementById("DO-NoTelpIbu").value = data.no_telp_ibu;
                }
            })
            .catch(error => {});

        document.getElementById("DO-Nis").setAttribute("disabled", "disabled");
        document.getElementById("DO-Nisn").setAttribute("disabled", "disabled");
        document.getElementById("DO-Kelas").setAttribute("disabled", "disabled");
        document.getElementById("DO-Nama").setAttribute("disabled", "disabled");
        document.getElementById("DO-Gender").setAttribute("disabled", "disabled");
        document.getElementById("DO-TempatLahir").setAttribute("disabled", "disabled");
        document.getElementById("DO-TanggalLahir").setAttribute("disabled", "disabled");
        document.getElementById("DO-Alamat").setAttribute("disabled", "disabled");
        document.getElementById("DO-NamaAyah").setAttribute("disabled", "disabled");
        document.getElementById("DO-NoTelpAyah").setAttribute("disabled", "disabled");
        document.getElementById("DO-Agama").setAttribute("disabled", "disabled");
        document.getElementById("DO-AsalSekolah").setAttribute("disabled", "disabled");
        document.getElementById("DO-NamaIbu").setAttribute("disabled", "disabled");
        document.getElementById("DO-NoTelpIbu").setAttribute("disabled", "disabled");
    }

    var NisDO = "";
    var NamaDO = "";

    function FixDO() {
        NisDO = NisCalonDO;
        NamaDO = NamaCalonDO;
        document.getElementById("FixDO").innerHTML = "Dengan Menekan Tombol DROPOUT, maka Siswa dengan Nama " + NamaDO + "  akan di-dropout-kan secara Permanen dan Tidak dapat Dikembalikan Statusnya seperti Sedia Kala";
    }

    function DO(event) {
        event.preventDefault();

        var alasan = document.getElementsByName("Alasan");
        var status = "";

        for (var i = 0; i < alasan.length; i++) {
            if (alasan[i].checked) {
                status = alasan[i].value;
                break;
            }
        }

        var formData = new FormData();
        formData.append("NIS", NisDO);
        formData.append("Status", status);

        fetch("/siswa/do", {
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