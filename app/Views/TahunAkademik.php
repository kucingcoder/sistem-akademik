<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Tahun Akademik<?= $this->endSection() ?>
<?= $this->section('Menu') ?>tahun-akademik<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Tahun Akademik</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Tahun Akademik</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title badge border-success border-1 text-success">Tahun Akademik <span>| <?php echo $Kaldik["Semester"] . " " . $TahunAjaran; ?></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Tahun Akademik Baru" onclick="TambahTahun()">
                                <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    <i class="bi bi-calendar-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tahun Akademik</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Sampai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($DaftarTahun)) : ?>
                                <?php $index = 1; ?>
                                <?php foreach ($DaftarTahun as $Tahun) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $index; ?></th>
                                        <td><?php echo $Tahun->ta; ?></td>
                                        <td><?php echo (new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE))->format(strtotime($Tahun->mulai)); ?></td>
                                        <td><?php echo (new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE))->format(strtotime($Tahun->sampai)); ?></td>
                                    </tr>
                                    <?php $index++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
                    <a class="icon" role="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                <h5 class="modal-title">Menambahkan Tahun Akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tahun Akademik Baru</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Sampai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="Tahun">2024/2025</td>
                            <td id="Awal">1 Juli 2024</td>
                            <td id="Akhir">30 Juni 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="button" class="btn btn-success">
                    <a href="tahun-akademik?aksi=tambah">TAMBAHKAN</a>
                </button>
            </div>
        </div>
    </div>
</div>
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

    function TambahTahun() {
        document.getElementById("Tahun").innerHTML = "";
        document.getElementById("Awal").innerHTML = "";
        document.getElementById("Akhir").innerHTML = "";

        fetch("/tahun-akademik/?aksi=lihat")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("Tahun").innerHTML = data.tahun;
                    document.getElementById("Awal").innerHTML = new Date(data.mulai).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById("Akhir").innerHTML = new Date(data.sampai).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                }
            })
            .catch(error => {
                document.getElementById("Tahun").innerHTML = "Kesalahan Sistem";
                document.getElementById("Awal").innerHTML = "Kesalahan Sistem";
                document.getElementById("Akhir").innerHTML = "Kesalahan Sistem";
            });
    }
</script>
<?= $this->endSection() ?>