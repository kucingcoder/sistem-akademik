<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Profil Guru<?= $this->endSection() ?>
<?= $this->section('Menu') ?>profil-guru<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Profil Guru</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Profil <?php echo $Nama; ?></li>
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ampu Mapel</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="riwayatampu-tab" data-bs-toggle="tab" data-bs-target="#riwayatampu" type="button" role="tab" aria-controls="riwayatampu" aria-selected="false">Riwayat Mengampu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Riwayat Wali Kelas</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <h5 class="card-title">Riwayat Menjadi Wali Kelas <span>| <?php echo $Nama; ?></span></h5>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tahun Akademik</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jumlah Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($RiwayatWaliKelas)) : ?>
                                        <div class="activity">
                                            <?php $index = 1; ?>
                                            <?php foreach ($RiwayatWaliKelas as $Item) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $index; ?></th>
                                                    <?php $index++; ?>
                                                    <td><?php echo $Item->ta; ?></td>
                                                    <td><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Item->nama_kelas); ?></td>
                                                    <td><?php echo $Item->jumlah; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="riwayatampu" role="tabpanel" aria-labelledby="riwayatampu-tab">
                            <h5 class="card-title">Riwayat Mengampu Mata Pelajaran <span>| <?php echo $Nama; ?></span></h5>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tahun Akademik</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Mata Pelajaran</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jumlah Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($RiwayatMengampu)) : ?>
                                        <div class="activity">
                                            <?php $index = 1; ?>
                                            <?php foreach ($RiwayatMengampu as $Item) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $index; ?></th>
                                                    <td><?php echo $Item->ta; ?></td>
                                                    <td><?php echo $Item->semester; ?></td>
                                                    <td><?php echo $Item->nama_mapel; ?></td>
                                                    <td><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Item->nama_kelas); ?></td>
                                                    <td><?php echo $Item->jumlah_jam; ?></td>
                                                </tr>

                                                <?php $index++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <h5 class="card-title">Mata Pelajaran yang Diampu Semester Ini <span>| <?php echo $Nama; ?></span></h5>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mata Pelajaran</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jumlah Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($MataPelajaran)) : ?>
                                        <div class="activity">
                                            <?php $index = 1; ?>
                                            <?php foreach ($MataPelajaran as $Item) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $index; ?></th>
                                                    <td><a href="kbm"><?php echo $Item->nama_mapel; ?></a></td>
                                                    <td><a class="text-primary" role="button" data-bs-toggle="modal" data-bs-target="#tempat-1" onclick="DeskripsiKelas('<?php echo $Item->kelas_id_kelas; ?>')"><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Item->nama_kelas); ?></a></td>
                                                    <td><?php echo $Item->jumlah_jam; ?></td>
                                                </tr>

                                                <?php $index++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h5 class="card-title">Profil <span>| <?php echo $Nama; ?></span></h5>
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="NIP" value="<?php echo $Profil["nip"]; ?>" id="Nip" disabled="true">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="NIK" value="<?php echo $Profil["nik"]; ?>" id="Nik">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $Profil["nama_lengkap"]; ?>" id="Nama" disabled="true">
                                </div>

                                <div class="col-md-6">
                                    <select id="Gender" class="form-select">
                                        <option selected disabled>Gender</option>
                                        <option value="L" <?php if ($Profil["gender"] == "Laki-laki") echo "selected"; ?>>Laki-Laki</option>
                                        <option value="P" <?php if ($Profil["gender"] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="Agama" class="form-select">
                                        <option selected disabled>Agama</option>
                                        <option value="1" <?php if ($Profil["agama"] == "Islam") echo "selected"; ?>>Islam</option>
                                        <option value="2" <?php if ($Profil["agama"] == "Kristen") echo "selected"; ?>>Kristen</option>
                                        <option value="3" <?php if ($Profil["agama"] == "Katholik") echo "selected"; ?>>Katholik</option>
                                        <option value="4" <?php if ($Profil["agama"] == "Hindu") echo "selected"; ?>>Hindu</option>
                                        <option value="5" <?php if ($Profil["agama"] == "Budha") echo "selected"; ?>>Budha</option>
                                        <option value="6" <?php if ($Profil["agama"] == "Konghuchu") echo "selected"; ?>>Konghuchu</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="StatusPerkawinan" class="form-select">
                                        <option selected disabled>Status Perkawinan</option>
                                        <option value="K" <?php if ($Profil["status_perkawinan"] == "Kawin") echo "selected"; ?>>Kawin</option>
                                        <option value="B" <?php if ($Profil["status_perkawinan"] == "Belum Kawin") echo "selected"; ?>>Belum Kawin</option>
                                        <option value="D" <?php if ($Profil["status_perkawinan"] == "Duda") echo "selected"; ?>>Duda</option>
                                        <option value="J" <?php if ($Profil["status_perkawinan"] == "Janda") echo "selected"; ?>>Janda</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" value="<?php echo $Profil["tempat_lahir"]; ?>" id="TempatLahir">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $Profil["tanggal_lahir"]; ?>" id="TanggalLahir">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="No Telp." value="<?php echo $Profil["no_telp"]; ?>" id="NoTelp">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $Profil["email"]; ?>" id="Email">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" style="height: 100px" placeholder="Alamat" id="Alamat"><?php echo $Profil["alamat"]; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Kompetensi" value="<?php echo $Profil["kompetensi"]; ?>" id="Kompetensi">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Lulusan Tahun" value="<?php echo $Profil["lulusan_tahun"]; ?>" id="LulusanTahun">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Asal Perguruan Tinggi" value="<?php echo $Profil["asal_perguruan_tinggi"]; ?>" id="AsalPerguruanTinggi">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Jabatan" value="<?php echo $Profil["jabatan"]; ?>" id="Jabatan">
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

                            <div class="modal fade" id="dokumen-guru" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detil Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3">
                                            <div class="modal-body">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" id="InfoNamaDokumen" placeholder="Nama Dokumen" disabled="true">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" id="InfoDeskripsiDokumen" placeholder="Deskripsi" disabled="true">
                                                </div>
                                                <div class="col-md-12">
                                                    <a type="button" class="btn btn-primary w-100" href="path_to_file" id="InfoUnduhDokumen">Unduh</a>
                                                </div>
                                            </div>
                                            <div class="modal-footer" mb-3>
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
                                            <h5 class="modal-title">Menambahkan Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3" onsubmit="TambahDokumen(event)">
                                            <div class="modal-body">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" id="NamaDokumen" placeholder="Nama Dokumen">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" id="DeskripsiDokumen" placeholder="Deskripsi">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputNumber" class="col-md-6 mb-1">Unggah Dokumen</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" type="file" id="FileDokumen">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-primary"><a>TAMBAHKAN</a></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Mengubah Profil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah yakin data profil yang anda ubah sudah benar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-primary" onclick="UbahProfile()"><a>IYA</a></button>
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

                <div class="card-body">
                    <h5 class="card-title">Ubah Username dan Password <span>| <?php echo $Nama; ?></span></h5>

                    <div class="d-none" id="InfoUbahUsernamePassword">Informasi Hasilnya</div>

                    <form class="row g-3">
                        <div class="col-md-12">
                            <input type="text" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-md-12">
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <input type="password" id="confirmpassword" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1">Ubah</button>
                            <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        </div>
                    </form>

                    <div class="modal fade" id="tempat-1" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deskripsi Kelas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form class="row g-3">
                                        <div class="col-md-12">
                                            <label for="inputEmail5" class="form-label">Kelas</label>
                                            <input type="text" class="form-control" id="Kelas" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword5" class="form-label">Wali Kelas</label>
                                            <input type="text" class="form-control" id="WaliKelas" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail5" class="form-label">Jumlah Siswa</label>
                                            <input type="text" class="form-control" id="JumlahSiswa" disabled>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                                </div>
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
                                    Apakah yakin akan mengubah Username dan Password?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-primary" onclick="UbahUsernamePassword()"><a>IYA</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="activity">
                        <?php if (!empty($Dokumen)) : ?>
                            <h5 class="card-title">Dokumentasi <span>| <?php echo count($Dokumen); ?> dokumen</span></h5>

                            <div class="activity">
                                <?php foreach ($Dokumen as $Item) : ?>
                                    <div class="activity-item d-flex">
                                        <div class="activite-label"><?php echo $Item->tanggal; ?></div>
                                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                        <div class="activity-content">
                                            <a role="button" data-bs-toggle="modal" data-bs-target="#dokumen-guru" class="fw-bold text-dark" onclick="InfoDokumen(<?php echo $Item->id_dokumen_guru; ?>)"><?php echo $Item->nama_dokumen; ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <h5 class="card-title">Dokumentasi <span>| kosong</span></h5>
                        <?php endif; ?>

                        <div class="text-center mt-4">
                            <a role="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#verticalycentered2">Tambah Dokumen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    <?php if (!empty($Profil["foto"])) : ?>
        const fileInput = document.getElementById("Foto");

        const myFile = new File(['foto tersimpan'], '<?php echo $Profil["foto"]; ?>', {
            type: 'text/plain',
            lastModified: new Date(),
        });

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        fileInput.files = dataTransfer.files;
    <?php endif; ?>

    function UbahProfile() {
        var Nip = document.getElementById("Nip").value;
        var Nik = document.getElementById("Nik").value;
        var Nama = document.getElementById("Nama").value;
        var Gender = document.getElementById("Gender").value;
        var Agama = document.getElementById("Agama").value;
        var StatusPerkawinan = document.getElementById("StatusPerkawinan").value;
        var TempatLahir = document.getElementById("TempatLahir").value;
        var TanggalLahir = document.getElementById("TanggalLahir").value;
        var NoTelp = document.getElementById("NoTelp").value;
        var Email = document.getElementById("Email").value;
        var Alamat = document.getElementById("Alamat").value;
        var Kompetensi = document.getElementById("Kompetensi").value;
        var LulusanTahun = document.getElementById("LulusanTahun").value;
        var AsalPerguruanTinggi = document.getElementById("AsalPerguruanTinggi").value;
        var Jabatan = document.getElementById("Jabatan").value;
        var Foto = document.getElementById("Foto").files[0];

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

        fetch("/profil-guru/ubah-profil", {
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

    function DeskripsiKelas(id_kelas) {
        document.getElementById("Kelas").value = "";
        document.getElementById("WaliKelas").value = "";
        document.getElementById("JumlahSiswa").value = "";

        document.getElementById("Kelas").removeAttribute("disabled");
        document.getElementById("WaliKelas").removeAttribute("disabled");
        document.getElementById("JumlahSiswa").removeAttribute("disabled");

        fetch("/profil-guru/deskripsi-kelas?id=" + id_kelas)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("Kelas").value = data.kelas;
                    document.getElementById("WaliKelas").value = data.wali_kelas;
                    document.getElementById("JumlahSiswa").value = data.jumlah_siswa;
                }
            })
            .catch(error => {
                document.getElementById("Kelas").value = "Kesalahan Sistem";
                document.getElementById("WaliKelas").value = "Kesalahan Sistem";
                document.getElementById("JumlahSiswa").value = "Kesalahan Sistem";
            });

        document.getElementById("Kelas").setAttribute("disabled", "disabled");
        document.getElementById("WaliKelas").setAttribute("disabled", "disabled");
        document.getElementById("JumlahSiswa").setAttribute("disabled", "disabled");
    }

    function UbahUsernamePassword() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var confirmpassword = document.getElementById("confirmpassword").value;

        var data = {
            "username": username,
            "password": password,
            "confirmpassword": confirmpassword
        };

        fetch("/profil-guru/ubah-username-password?nip=<?php echo $Profil["nip"]; ?>", {
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

    function TambahDokumen(event) {
        event.preventDefault();

        var Nama = document.getElementById("NamaDokumen").value;
        var Deskripsi = document.getElementById("DeskripsiDokumen").value;
        var File = document.getElementById("FileDokumen").files[0];

        var formData = new FormData();
        formData.append("NamaDokumen", Nama);
        formData.append("DeskripsiDokumen", Deskripsi);
        formData.append("FileDokumen", File);

        fetch("/profil-guru/tambah-dokumen?nip=<?php echo $Profil["nip"]; ?>", {
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

    function InfoDokumen(id) {
        document.getElementById("InfoNamaDokumen").removeAttribute("disabled");
        document.getElementById("InfoDeskripsiDokumen").removeAttribute("disabled");

        fetch("/profil-guru/info-dokumen?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("InfoNamaDokumen").value = data.nama;
                    document.getElementById("InfoDeskripsiDokumen").value = data.deskripsi;
                    document.getElementById("InfoUnduhDokumen").href = "/dokumen/" + data.file;
                }
            })
            .catch(error => {});

        document.getElementById("InfoNamaDokumen").setAttribute("disabled", "disabled");
        document.getElementById("InfoDeskripsiDokumen").setAttribute("disabled", "disabled");
    }
</script>
<?= $this->endSection() ?>