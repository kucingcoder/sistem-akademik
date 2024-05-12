<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Dashboard<?= $this->endSection() ?>
<?= $this->section('Foto') ?><?= base_url($Foto) ?><?= $this->endSection() ?>
<?= $this->section('Nama1') ?><?= $Nama ?><?= $this->endSection() ?>
<?= $this->section('Nama2') ?><?= $Nama ?><?= $this->endSection() ?>
<?= $this->section('Jenis') ?><?= $Jabatan . "(" . $Jenis . ")" ?><?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

        <div class="col-lg-8">
            <div class="row">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">DATA STATISTIK <span>| SMK Bahari Tegal</span></h5>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter">
                            <a class="icon" data-bs-toggle="dropdown" role="button"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" onclick="StatistikSiswa('I')" role="button">Tingkat I</a></li>
                                <li><a class="dropdown-item" onclick="StatistikSiswa('II')" role="button">Tingkat II</a></li>
                                <li><a class="dropdown-item" onclick="StatistikSiswa('III')" role="button">Tingkat III</a></li>
                                <li><a class="dropdown-item" onclick="StatistikSiswa('Semua Tingkat')" role="button">Semua Tingkat</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="SiswaJudul">Siswa Aktif <span>| Tingkat I</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <a class="nav-link collapsed" href="/siswa">
                                        <i class="bi bi-people"></i>
                                    </a>
                                </div>
                                <div class="ps-3">
                                    <h6 id="SiswaJml"><?php echo $Siswa['I'][0]->jml; ?></h6>
                                    <span class="text-success small pt-1 fw-bold" id="SiswaPersen"><?php echo substr($Siswa['I'][0]->persen, 0, 5) . "%"; ?></span> <span class="text-muted small pt-2 ps-1">dari total <?php echo $Siswa['Semua'][0]->jml; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="filter" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter">
                            <a class="icon" data-bs-toggle="dropdown" role="button"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" onclick="StatistikGuru('Produktif')" role="button">Produktif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikGuru('Adaptif')" role="button">Adaptif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikGuru('Normatif')" role="button">Normatif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikGuru('Semua')" role="button">Semua</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="GuruJudul">Guru Aktif <span>| Normatif</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <a class="nav-link collapsed" href="/guru">
                                        <i class="bi bi-people-fill"></i>
                                    </a>
                                </div>
                                <div class="ps-3">
                                    <h6 id="GuruJml"><?php echo $Guru['Normatif'][0]->jml; ?></h6>
                                    <span class="text-success small pt-1 fw-bold" id="GuruPersen"><?php echo substr($Guru['Normatif'][0]->persen, 0, 5) . "%"; ?></span> <span class="text-muted small pt-2 ps-1">dari total <?php echo $Guru['Semua'][0]->jml; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter">
                            <a class="icon" data-bs-toggle="dropdown" role="button"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" onclick="StatistikKelas('I')" role="button">Tingkat I</a></li>
                                <li><a class="dropdown-item" onclick="StatistikKelas('II')" role="button">Tingkat II</a></li>
                                <li><a class="dropdown-item" onclick="StatistikKelas('III')" role="button">Tingkat III</a></li>
                                <li><a class="dropdown-item" onclick="StatistikKelas('Semua')" role="button">Semua Tingkat</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="KelasJudul">Kelas <span>| Tingkat I</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <a class="nav-link collapsed" href="/kelas">
                                        <i class="bi bi-person-square"></i>
                                    </a>
                                </div>
                                <div class="ps-3">
                                    <h6 id="KelasJml"><?php echo $Kelas['I'][0]->jml; ?></h6>
                                    <span class="text-success small pt-1 fw-bold" id="KelasPersen"><?php echo substr($Kelas['I'][0]->persen, 0, 5) . "%"; ?></span> <span class="text-muted small pt-2 ps-1">dari total <?php echo $Kelas['Semua'][0]->jml; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="filter" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter">
                            <a class="icon" data-bs-toggle="dropdown" role="button"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" onclick="StatistikMapel('Produktif')" role="button">Produktif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikMapel('Adaptif')" role="button">Adaptif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikMapel('Normatif')" role="button">Normatif</a></li>
                                <li><a class="dropdown-item" onclick="StatistikMapel('Semua')" role="button">Semua</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="MapelJudul">Mata Pelajaran <span>| Normatif</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <a class="nav-link collapsed" href="/mata-pelajaran">
                                        <i class="bi bi-journals"></i>
                                    </a>
                                </div>
                                <div class="ps-3">
                                    <h6 id="MapelJml"><?php echo $MataPelajaran['Normatif'][0]->jml; ?></h6>
                                    <span class="text-success small pt-1 fw-bold" id="MapelPersen"><?php echo substr($MataPelajaran['Normatif'][0]->persen, 0, 5) . "%"; ?></span> <span class="text-muted small pt-2 ps-1">dari total <?php echo $MataPelajaran['Semua'][0]->jml; ?></span>
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
                        <h5 class="card-title">KBM Hari Ini <span>| <?php echo count($JadwalHariIni); ?> Kelas</span></h5>

                        <div class="activity">
                            <?php foreach ($JadwalHariIni as $jadwal) : ?>
                                <div class="activity-item d-flex">
                                    <div class="activite-label"><?php echo substr($jadwal->mulai, 0, 5); ?></div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        <a href="<?php echo "/pelaksanaan-kbm/" . strtolower(str_replace(" ", "-", substr(strstr($jadwal->teks, "Kelas"), strlen("Kelas ")))) . "/" . strtolower(str_replace("/", "=", str_replace(" ", "-", strstr($jadwal->teks, " di Kelas", true)))) . "/" . substr($jadwal->mulai, 0, 5); ?>" class="fw-bold text-dark"><?php echo str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $jadwal->teks); ?></a>
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
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
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

    function StatistikSiswa(tingkat) {
        if (tingkat != 'Semua Tingkat') {
            document.getElementById("SiswaJudul").innerHTML = "Siswa Aktif <span>| Tingkat " + tingkat + "</span>";
        } else {
            document.getElementById("SiswaJudul").innerHTML = "Siswa Aktif <span>| Semua Tingkat</span>";
        }

        if (tingkat == 'I') {
            document.getElementById("SiswaJml").innerHTML = <?php echo $Siswa['I'][0]->jml; ?>;
            document.getElementById("SiswaPersen").innerHTML = <?php echo substr($Siswa['I'][0]->persen, 0, 5); ?> + "%";
        } else if (tingkat == 'II') {
            document.getElementById("SiswaJml").innerHTML = <?php echo $Siswa['II'][0]->jml; ?>;
            document.getElementById("SiswaPersen").innerHTML = <?php echo substr($Siswa['II'][0]->persen, 0, 5); ?> + "%";
        } else if (tingkat == 'III') {
            document.getElementById("SiswaJml").innerHTML = <?php echo $Siswa['III'][0]->jml; ?>;
            document.getElementById("SiswaPersen").innerHTML = <?php echo substr($Siswa['III'][0]->persen, 0, 5); ?> + "%";
        } else {
            document.getElementById("SiswaJml").innerHTML = <?php echo $Siswa['Semua'][0]->jml; ?>;
            document.getElementById("SiswaPersen").innerHTML = <?php echo substr($Siswa['Semua'][0]->persen, 0, 5); ?> + "%";
        }
    }

    function StatistikGuru(jenis) {
        if (jenis != 'Semua') {
            document.getElementById("GuruJudul").innerHTML = "Guru Aktif <span>| " + jenis + "</span>";
        } else {
            document.getElementById("GuruJudul").innerHTML = "Guru Aktif <span>| Semua</span>";
        }

        if (jenis == 'Produktif') {
            document.getElementById("GuruJml").innerHTML = <?php echo $Guru['Produktif'][0]->jml; ?>;
            document.getElementById("GuruPersen").innerHTML = <?php echo substr($Guru['Produktif'][0]->persen, 0, 5); ?> + "%";
        } else if (jenis == 'Adaptif') {
            document.getElementById("GuruJml").innerHTML = <?php echo $Guru['Adaptif'][0]->jml; ?>;
            document.getElementById("GuruPersen").innerHTML = <?php echo substr($Guru['Adaptif'][0]->persen, 0, 5); ?> + "%";
        } else if (jenis == 'Normatif') {
            document.getElementById("GuruJml").innerHTML = <?php echo $Guru['Normatif'][0]->jml; ?>;
            document.getElementById("GuruPersen").innerHTML = <?php echo substr($Guru['Normatif'][0]->persen, 0, 5); ?> + "%";
        } else {
            document.getElementById("GuruJml").innerHTML = <?php echo $Guru['Semua'][0]->jml; ?>;
            document.getElementById("GuruPersen").innerHTML = <?php echo substr($Guru['Semua'][0]->persen, 0, 5); ?> + "%";
        }
    }

    function StatistikKelas(tingkat) {
        if (tingkat != 'Semua Tingkat') {
            document.getElementById("KelasJudul").innerHTML = "Kelas <span>| Tingkat " + tingkat + "</span>";
        } else {
            document.getElementById("KelasJudul").innerHTML = "Kelas <span>| Semua Tingkat</span>";
        }

        if (tingkat == 'I') {
            document.getElementById("KelasJml").innerHTML = <?php echo $Kelas['I'][0]->jml; ?>;
            document.getElementById("KelasPersen").innerHTML = <?php echo substr($Kelas['I'][0]->persen, 0, 5); ?> + "%";
        } else if (tingkat == 'II') {
            document.getElementById("KelasJml").innerHTML = <?php echo $Kelas['II'][0]->jml; ?>;
            document.getElementById("KelasPersen").innerHTML = <?php echo substr($Kelas['II'][0]->persen, 0, 5); ?> + "%";
        } else if (tingkat == 'III') {
            document.getElementById("KelasJml").innerHTML = <?php echo $Kelas['III'][0]->jml; ?>;
            document.getElementById("KelasPersen").innerHTML = <?php echo substr($Kelas['III'][0]->persen, 0, 5); ?> + "%";
        } else {
            document.getElementById("KelasJml").innerHTML = <?php echo $Kelas['Semua'][0]->jml; ?>;
            document.getElementById("KelasPersen").innerHTML = <?php echo substr($Kelas['Semua'][0]->persen, 0, 5); ?> + "%";
        }
    }

    function StatistikMapel(jenis) {
        if (jenis != 'Semua') {
            document.getElementById("MapelJudul").innerHTML = "Mata Pelajaran <span>| " + jenis + "</span>";
        } else {
            document.getElementById("MapelJudul").innerHTML = "Mata Pelajaran <span>| Semua</span>";
        }

        if (jenis == 'Produktif') {
            document.getElementById("MapelJml").innerHTML = <?php echo $MataPelajaran['Produktif'][0]->jml; ?>;
            document.getElementById("MapelPersen").innerHTML = <?php echo substr($MataPelajaran['Produktif'][0]->persen, 0, 5); ?> + "%";
        } else if (jenis == 'Adaptif') {
            document.getElementById("MapelJml").innerHTML = <?php echo $MataPelajaran['Adaptif'][0]->jml; ?>;
            document.getElementById("MapelPersen").innerHTML = <?php echo substr($MataPelajaran['Adaptif'][0]->persen, 0, 5); ?> + "%";
        } else if (jenis == 'Normatif') {
            document.getElementById("MapelJml").innerHTML = <?php echo $MataPelajaran['Normatif'][0]->jml; ?>;
            document.getElementById("MapelPersen").innerHTML = <?php echo substr($MataPelajaran['Normatif'][0]->persen, 0, 5); ?> + "%";
        } else {
            document.getElementById("MapelJml").innerHTML = <?php echo $MataPelajaran['Semua'][0]->jml; ?>;
            document.getElementById("MapelPersen").innerHTML = <?php echo substr($MataPelajaran['Semua'][0]->persen, 0, 5); ?> + "%";
        }
    }
</script>
<?= $this->endSection() ?>