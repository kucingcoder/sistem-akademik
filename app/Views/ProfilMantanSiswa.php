<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Profil Siswa<?= $this->endSection() ?>
<?= $this->section('Menu') ?>siswa<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Profil <?php echo $Jenis; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="siswa">Siswa</a></li>
            <li class="breadcrumb-item active">Profil <?php echo $Jenis; ?></li>
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
                                    <h5 class="card-title">Nilai Raport <?php echo $Jenis; ?> <span>| <?php echo $Profil["nama"]; ?></span></h5>
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
                                    <input type="text" class="form-control" placeholder="NIS" value="<?php echo $Profil["nis"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="NISN" value="<?php echo $Profil["nisn"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $Profil["nama"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Gender" value="<?php echo $Profil["jenis_kelamin"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" value="<?php echo $Profil["tempat_lahir"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Tanggal Lahir" value="<?php echo (new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE))->format(strtotime($Profil["tanggal_lahir"])); ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="No Telp." value="<?php echo $Profil["no_hp"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $Profil["email"]; ?>" disabled>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" style="height: 100px" placeholder="Alamat" disabled><?php echo $Profil["alamat_domisili"]; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Agama" value="<?php echo $Profil["agama"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Asal Sekolah" value="<?php echo $Profil["sekolah_asal"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nilai Ujian" value="<?php echo $Profil["nilai_smp"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Tahun Lulus" value="<?php echo $Profil["tahun_lulus"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Ayah" value="<?php echo $Profil["nama_ayah"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Ibu" value="<?php echo $Profil["nama_ibu"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="No Telp. Ayah" value="<?php echo $Profil["hp_ayah"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="No Telp. Ibu" value="<?php echo $Profil["hp_ibu"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ayah" value="<?php echo $Profil["kerja_ayah"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ibu" value="<?php echo $Profil["kerja_ibu"]; ?>" disabled>
                                </div>
                            </form>

                            <div class="modal fade" id="prestasi_siswa" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detil Prestasi <?php echo $Jenis; ?></h5>
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
                                            <h5 class="modal-title">Menambahkan Dokumen Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="Nama Dokumen">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="Deskripsi">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputNumber" class="col-md-6">Unggah Dokumen</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-danger"><a href="profil-siswa">TAMBAHKAN</a></button>
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
                                            <button type="submit" class="btn btn-danger"><a href="siswa">IYA</a></button>
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
                                            <button type="submit" class="btn btn-danger"><a href="siswa">IYA</a></button>
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
                        <h5 class="card-title">Prestasi <?php echo $Jenis; ?> <span>| <?php echo count($Prestasi); ?> Prestasi</span></h5>

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
                        <h5 class="card-title">Prestasi <?php echo $Jenis; ?> <span>| Kosong</span></h5>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
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
</script>
<?= $this->endSection() ?>