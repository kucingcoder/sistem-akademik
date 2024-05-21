<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Siswa<?= $this->endSection() ?>
<?= $this->section('Menu') ?>siswa<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Siswa Lulus</h1>
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
                <div class="card info-card revenue-card">

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
                        <h5 class="card-title badge border-success border-1 text-success">Total <?php echo count($SiswaLulus); ?> Siswa <span>| Lulus</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Lulusan">
                                <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    <i class="bi bi-person-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="daftar-lulus">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Tahun Lulus</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($SiswaLulus)) : ?>
                                    <?php $index = 1; ?>
                                    <?php foreach ($SiswaLulus as $Anak) : ?>
                                        <tr>
                                            <th class="text-center"><?php echo $index; ?></th>
                                            <?php $index++; ?>
                                            <td><a class="row" href="/profil-lulusan?nis=<?php echo $Anak->nis; ?>"><?php echo $Anak->nama; ?></a></td>
                                            <td><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Anak->kelas); ?></td>
                                            <td class="text-center"><?php echo $Anak->gender; ?></td>
                                            <td class="text-center"><?php echo $Anak->tahun_lulus; ?></td>
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
</section>

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Menambahkan Lulusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped w-100" id="calon-lulus">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Lulus</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($SiswaMauLulus)) : ?>
                                <?php $index = 1; ?>
                                <?php foreach ($SiswaMauLulus as $Anak) : ?>
                                    <tr>
                                        <th class="text-center"><?php echo $index; ?></th>
                                        <td class="text-center">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" checked onclick="Dikecualikan('<?php echo $Anak->nis; ?>', this)">
                                        </td>
                                        <td><?php echo $Anak->nama; ?></td>
                                        <td class="text-center"><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Anak->kelas); ?></td>
                                        <td class="text-center"><?php echo str_replace(["L", "P"], ["Laki-Laki", "Perempuan"], $Anak->gender); ?></td>
                                    </tr>
                                    <?php $index++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered1">LULUSKAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered1" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menambahkan Lulusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Dengan Menekan Tombol LULUSKAN, maka Seluruh Nama-nama Siswa Tersebut Statusnya Menjadi Lulus secara Permanen, dan tidak dapat Dikembalikan Statusnya seperti Sedia Kala
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered">BATAL</button>
                <button type="submit" class="btn btn-success" onclick="Luluskan()">LULUSKAN</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    $("#daftar-lulus").DataTable();
    $("#calon-lulus").DataTable();

    kecuali = [];

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

    function Dikecualikan(nis, status) {
        if (status.checked == false) {
            kecuali.push(nis);
        }

        if (status.checked == true) {
            let index = kecuali.indexOf(nis);

            if (index !== -1) {
                kecuali.splice(index, 1);
            }
        }
    }

    function Luluskan() {
        fetch('/siswa-lulus/luluskan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(kecuali)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }
</script>
<?= $this->endSection() ?>