<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Profil Siswa<?= $this->endSection() ?>
<?= $this->section('Menu') ?>siswa<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Profil Siswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="siswa">Siswa</a></li>
            <li class="breadcrumb-item active">Profil Siswa</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Nilai Raport</button>
                        </li> -->
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <h5 class="card-title">Masih Kosong</h5>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card info-card sales-card">
                                <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Pilih Semester">
                                    <a class="icon" role="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Semester</h6>
                                        </li>
                                        <li><a class="dropdown-item" role="button">Semester 4</a></li>
                                        <li><a class="dropdown-item" role="button">Semester 3</a></li>
                                        <li><a class="dropdown-item" role="button">Semester 2</a></li>
                                        <li><a class="dropdown-item" role="button">Semester 1</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Nilai Raport Siswa <span>| <?php echo $Profil["nama"]; ?></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cetak Raport">
                                            <a class="nav-link collapsed" role="button">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Total Nilai 145</h6>
                                            <span class="text-primary small pt-1 fw-bold">Genap</span>
                                            <span class="text-muted small pt-2 ps-1">2022/2023</span>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Normatif</h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">KKM</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Ketuntasan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Pendidikan Agama</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Bahasa Indonesia</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Bahasa Inggris</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Matematika</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5 class="card-title">Adaptif</h5>

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">KKM</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Ketuntasan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Pendidikan Agama</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Bahasa Indonesia</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Bahasa Inggris</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Matematika</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5 class="card-title">Produktif</h5>

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">KKM</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Ketuntasan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Pendidikan Agama</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Bahasa Indonesia</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Bahasa Inggris</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Matematika</td>
                                                <td>75</td>
                                                <td>80</td>
                                                <td>Tuntas</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5 class="card-title">Kehadiran <span>| 85%</span></h5>

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">keterangan</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Prosentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Sakit</td>
                                                <td>5</td>
                                                <td>5%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Izin</td>
                                                <td>5</td>
                                                <td>5%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Alfa</td>
                                                <td>5</td>
                                                <td>5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h5 class="card-title">Profil Siswa <span>| <?php echo $Profil["nama"]; ?></span></h5>

                            <form class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NIS" value="<?php echo $Profil["nis"]; ?>">
                                        <label for="NIS">NIS</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NISN" value="<?php echo $Profil["nisn"]; ?>">
                                        <label for="NISN">NISN</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NamaLengkap" value="<?php echo $Profil["nama"]; ?>">
                                        <label for="Nama">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="Gender" aria-label="State">
                                            <option selected disabled>Gender</option>
                                            <option value="L" <?php if ($Profil["jenis_kelamin"] == "Laki-laki") echo "selected"; ?>>Laki-Laki</option>
                                            <option value="P" <?php if ($Profil["jenis_kelamin"] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                        </select>
                                        <label for="Gender">Gender</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="TempatLahir" value="<?php echo $Profil["tempat_lahir"]; ?>">
                                        <label for="TempatLahir">Tempat Lahir</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="TanggalLahir" value="<?php echo $Profil["tanggal_lahir"]; ?>">
                                        <label for="TenggalLahir">Tanggal Lahir</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NoTelp" value="<?php echo $Profil["no_hp"]; ?>">
                                        <label for="NoTelp">No Telp.</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="Email" value="<?php echo $Profil["email"]; ?>">
                                        <label for="Email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" value="Alamat" id="Alamat" style="height: 100px;"><?php echo $Profil["alamat_domisili"]; ?></textarea>
                                        <label for="Alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="Agama" class="form-select" aria-label="State">
                                            <option selected disabled>Agama</option>
                                            <option value="1" <?php if ($Profil["agama"] == "Islam") echo "selected"; ?>>Islam</option>
                                            <option value="2" <?php if ($Profil["agama"] == "Kristen") echo "selected"; ?>>Kristen</option>
                                            <option value="3" <?php if ($Profil["agama"] == "Katholik") echo "selected"; ?>>Katholik</option>
                                            <option value="4" <?php if ($Profil["agama"] == "Hindu") echo "selected"; ?>>Hindu</option>
                                            <option value="5" <?php if ($Profil["agama"] == "Budha") echo "selected"; ?>>Budha</option>
                                            <option value="6" <?php if ($Profil["agama"] == "Konghuchu") echo "selected"; ?>>Konghuchu</option>
                                        </select>
                                        <label for="Agama">Agama</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="AsalSekolah" value="<?php echo $Profil["sekolah_asal"]; ?>">
                                        <label for="AsalSekolah">Asal Sekolah</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NilaiUjian" value="<?php echo $Profil["nilai_smp"]; ?>">
                                        <label for="NilaiUjian">Nilai Ujian</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="TahunLulus" value="<?php echo $Profil["tahun_lulus"]; ?>">
                                        <label for="TahunLulus">Tahun Lulus</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NamaAyah" value="<?php echo $Profil["nama_ayah"]; ?>">
                                        <label for="NamaAyah">Nama Ayah</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NamaIbu" value="<?php echo $Profil["nama_ibu"]; ?>">
                                        <label for="NamaIbu">Nama Ibu</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NoTelpAyah" value="<?php echo $Profil["hp_ayah"]; ?>">
                                        <label for="NoTelpAyah">No Telp. Ayah</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="NoTelpIbu" value="<?php echo $Profil["hp_ibu"]; ?>">
                                        <label for="NoTelpIbu">No Telp. Ibu</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="PekerjaanAyah" value="<?php echo $Profil["kerja_ayah"]; ?>">
                                        <label for="PekerjaanAyah">Pekerjaan Ayah</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="PekerjaanIbu" value="<?php echo $Profil["kerja_ibu"]; ?>">
                                        <label for="PekerjaanIbu">Pekerjaan Ibu</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputNumber" class="col-md-6">Unggah Foto</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="file" id="Foto">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Ubah</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                                <div class="d-none" id="InfoUbahProfil">Informasi Hasilnya</div>
                            </form>

                            <div class="modal fade" id="prestasi_siswa" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detil Prestasi Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3">
                                            <div class="modal-body">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Tanggal" id="tanggal" disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Prestasi" id="prestasi" disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Deskripsi" id="deskripsi" disabled>
                                                </div>
                                                <div class="col-md-12">
                                                    <a type="button" class="btn btn-primary w-100" href="path_to_file" id="InfoUnduhDokumen">Unduh</a>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="verticalycentered2" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Menambahkan Prestasi Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3" onsubmit="TambahPrestasi(event)">
                                            <div class="modal-body">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Nama Prestasi" id="NamaPrestasi">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Deskripsi" id="DeskripsiPrestasi">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="inputNumber" class="col-md-6">Unggah Dokumen</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" type="file" id="FilePrestasi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-danger"><a>TAMBAHKAN</a></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="verticalycentered1" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Mengubah Username dan Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah yakin akan Mengubah Username dan Password siswa?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-danger" onclick="UbahUsernamePassword()"><a>IYA</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Mengubah Profil Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah yakin data profil siswa yang diubah sudah benar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-danger" onclick="UbahProfile()"><a>IYA</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ubah Username dan Password <span>| <?php echo $Profil["nama"]; ?></span></h5>

                    <div class="d-none" id="InfoUbahUsernamePassword">Informasi Hasilnya</div>

                    <form class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" id="username">
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" id="password">
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpassword">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1">Ubah</button>
                            <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Kelas <span>| <?php echo $Profil["nama"]; ?></span></h5>

                    <div class="activity">
                        <?php if (!empty($RiwayatKelas)) : ?>
                            <?php foreach ($RiwayatKelas as $Item) : ?>
                                <div class="activity-item d-flex">
                                    <div class="activite-label"><?php echo $Item->tingkat; ?></div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        <?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Item->kelas); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php if (!empty($Prestasi)) : ?>
                        <h5 class="card-title">Prestasi <span>| <?php echo count($Prestasi); ?> Prestasi</span></h5>

                        <div class="activity">
                            <?php foreach ($Prestasi as $Item) : ?>
                                <div class="activity-item d-flex">
                                    <div class="activite-label"><?php echo $Item->tanggal; ?></div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        <a role="button" class="fw-bold text-dark" data-bs-toggle="modal" data-bs-target="#prestasi_siswa" onclick="InfoPrestasi('<?php echo $Item->id_dokumen_siswa; ?>')"><?php echo $Item->nama_dokumen; ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <h5 class="card-title">Prestasi <span>| Kosong</span></h5>
                    <?php endif; ?>

                    <div class="text-center mt-4">
                        <a role="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#verticalycentered2">Tambah Prestasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    function UbahProfile() {
        var Nis = document.getElementById("NIS").value;
        var Nisn = document.getElementById("NISN").value;
        var NamaLengkap = document.getElementById("NamaLengkap").value;
        var Gender = document.getElementById("Gender").value;
        var TempatLahir = document.getElementById("TempatLahir").value;
        var TanggalLahir = document.getElementById("TanggalLahir").value;
        var NoTelp = document.getElementById("NoTelp").value;
        var Email = document.getElementById("Email").value;
        var Alamat = document.getElementById("Alamat").value;
        var Agama = document.getElementById("Agama").value;
        var AsalSekolah = document.getElementById("AsalSekolah").value;
        var NilaiUjian = document.getElementById("NilaiUjian").value;
        var TahunLulus = document.getElementById("TahunLulus").value;
        var NamaAyah = document.getElementById("NamaAyah").value;
        var NamaIbu = document.getElementById("NamaIbu").value;
        var NoTelpAyah = document.getElementById("NoTelpAyah").value;
        var NoTelpIbu = document.getElementById("NoTelpIbu").value;
        var PekerjaanAyah = document.getElementById("PekerjaanAyah").value;
        var PekerjaanIbu = document.getElementById("PekerjaanIbu").value;
        var Foto = document.getElementById("Foto").files[0];

        var formData = new FormData();
        formData.append("NisLama", '<?php echo $Profil["nis"]; ?>');
        formData.append("Nis", Nis);
        formData.append("Nisn", Nisn);
        formData.append("NamaLengkap", NamaLengkap)
        formData.append("Gender", Gender);
        formData.append("TempatLahir", TempatLahir);
        formData.append("TanggalLahir", TanggalLahir);
        formData.append("NoTelp", NoTelp);
        formData.append("Email", Email);
        formData.append("Alamat", Alamat);
        formData.append("Agama", Agama);
        formData.append("AsalSekolah", AsalSekolah);
        formData.append("NilaiUjian", NilaiUjian);
        formData.append("TahunLulus", TahunLulus);
        formData.append("NamaAyah", NamaAyah);
        formData.append("NamaIbu", NamaIbu);
        formData.append("NoTelpAyah", NoTelpAyah);
        formData.append("NoTelpIbu", NoTelpIbu);
        formData.append("KerjaAyah", PekerjaanAyah);
        formData.append("KerjaIbu", PekerjaanIbu);
        formData.append("Foto", Foto);

        fetch("/profil-siswa/ubah-profil", {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengubah profil');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    if (data.status == 200) {
                        document.getElementById("InfoUbahProfil").innerHTML = data.message;
                        document.getElementById("InfoUbahProfil").className = "alert alert-success";
                    } else {
                        document.getElementById("InfoUbahProfil").innerHTML = data.message;
                        document.getElementById("InfoUbahProfil").className = "alert alert-danger";
                    }
                }
            })
            .catch(error => {
                document.getElementById("InfoUbahProfil").innerHTML = "Gagal mengubah profil";
                document.getElementById("InfoUbahProfil").className = "alert alert-danger";
            });

        var modal = document.getElementById("verticalycentered");
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();

        setTimeout(function() {
            document.getElementById("InfoUbahProfil").className = "d-none";
        }, 5000);
    }

    function UbahUsernamePassword() {
        var nis = '<?php echo $Profil["nis"]; ?>';
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var confirmpassword = document.getElementById("confirmpassword").value;

        var data = {
            "nis": nis,
            "username": username,
            "password": password,
            "confirmpassword": confirmpassword
        };

        fetch("/profil-siswa/ubah-username-password", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Gagal mengubah username dan password');
                }
            })
            .then(data => {
                if (data !== null) {
                    if (data.status == 200) {
                        document.getElementById("InfoUbahUsernamePassword").innerHTML = data.message;
                        document.getElementById("InfoUbahUsernamePassword").className = "alert alert-success";
                    } else {
                        document.getElementById("InfoUbahUsernamePassword").innerHTML = data.message;
                        document.getElementById("InfoUbahUsernamePassword").className = "alert alert-danger";
                    }
                }
            })
            .catch(error => {
                document.getElementById("InfoUbahUsernamePassword").innerHTML = "Gagal mengubah username dan password";
                document.getElementById("InfoUbahUsernamePassword").className = "alert alert-danger";
            });

        document.getElementById("username").value = "";
        password = document.getElementById("password").value = "";
        passwordconfirm = document.getElementById("confirmpassword").value = "";

        var modal = document.getElementById("verticalycentered1");
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();

        setTimeout(function() {
            document.getElementById("InfoUbahUsernamePassword").className = "d-none";
        }, 5000);
    }


    function InfoPrestasi(id) {
        document.getElementById("tanggal").removeAttribute("disabled");
        document.getElementById("prestasi").removeAttribute("disabled");
        document.getElementById("deskripsi").removeAttribute("disabled");

        fetch("/profil-siswa/info-prestasi?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("tanggal").value = new Date(data.tanggal).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById("prestasi").value = data.prestasi;
                    document.getElementById("deskripsi").value = data.deskripsi;
                    document.getElementById("InfoUnduhDokumen").href = "/dokumen/" + data.file;
                }
            })
            .catch(error => {});

        document.getElementById("tanggal").setAttribute("disabled", "disabled");
        document.getElementById("prestasi").setAttribute("disabled", "disabled");
        document.getElementById("deskripsi").setAttribute("disabled", "disabled");
    }


    function TambahPrestasi(event) {
        event.preventDefault();

        var Nis = '<?php echo $Profil["nis"]; ?>';
        var Nama = document.getElementById("NamaPrestasi").value;
        var Deskripsi = document.getElementById("DeskripsiPrestasi").value;
        var File = document.getElementById("FilePrestasi").files[0];

        var formData = new FormData();
        formData.append("NIS", Nis);
        formData.append("NamaPrestasi", Nama);
        formData.append("DeskripsiPrestasi", Deskripsi);
        formData.append("FilePrestasi", File);

        fetch("/profil-siswa/tambah-prestasi", {
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