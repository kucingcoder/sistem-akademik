<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Mata Pelajaran<?= $this->endSection() ?>
<?= $this->section('Menu') ?>mata-pelajaran<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Mata Pelajaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Mata Pelajaran</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card customers-card">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Semester">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Semester</h6>
                            </li>

                            <?php foreach ($DaftarSemester as $Semester) : ?>
                                <li><a type="button" class="dropdown-item" onclick="DaftarMapel('<?php echo $Semester->id_ta; ?>', '<?php echo $Semester->id_semester; ?>', '<?php echo $Semester->semester; ?>', '<?php echo $Semester->ta; ?>')"><?php echo $Semester->smt; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" id="info-daftar-mapel">Total <?php echo count($DaftarMapel); ?> Mata Pelajaran <span>| <?= $Kaldik["Semester"] ?> <?= $TahunAjaran ?></span>
                        </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Menetapkan Mata Pelajaran Tahun Akademik saat ini">
                                <a class="nav-link collapsed" href="tetapkan-mapel">
                                    <i class="bi bi-journal-plus"></i>
                                </a>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="Right" title="Menetapkan Guru Pengampu Mata Pelajaran Tahun Akademik saat ini">
                                <a class="nav-link collapsed" href="ampu-mapel">
                                    <i class="bi bi-person-plus-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="tabel-daftar-mapel">
                        <table class="table table-striped w-100" id="mapel">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Mata Pelajaran</th>
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
                                            <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DetailMapel('<?php echo $Mapel->kode; ?>')">
                                                <i class="bi bi-info-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="DaftarPengampu('<?php echo $Mapel->kode; ?>')">
                                                <i class="bi bi-people-fill"></i>
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
                    <h5 class="card-title">Kalender Akademik <span id="Semester">| <?= $Kaldik["Semester"]; ?></span></h5>
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
                                <div class="activite-label text-center"><?= implode("<br>-<br>", explode("-", $ItemKegiatan->waktu)); ?></div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content"><?= $ItemKegiatan->kegiatan; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <label for="inputEmail5" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputEmail5" placeholder="Memuat Nama Mapel" disabled>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guru Pengampu Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol class="list-group list-group-numbered" id="daftar-pengampu">
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    $("#mapel").DataTable();

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

            document.getElementById("DaftarKegiatan").innerHTML = `<?= $Kegiatan; ?>`
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

            document.getElementById("DaftarKegiatan").innerHTML = `<?= $Kegiatan; ?>`
        }
    }

    function DaftarMapel(id_ta, id_smt, ta, smt) {
        fetch("/mata-pelajaran/mapel?ta=" + id_ta + "&smt=" + id_smt)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    var baris = "";
                    data.forEach(function(item, index) {
                        baris += `
                            <tr>
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">${item.kode}</td>
                                <td>${item.mata_pelajaran}</td>
                                <td class="text-center">${item.kategori}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DetailMapel('${item.kode}')">
                                        <i class="bi bi-info-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="DaftarPengampu('${item.kode}')">
                                        <i class="bi bi-people-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });

                    var isi = `
                            <table class="table table-striped w-100" id="mapel">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Mata Pelajaran</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${baris}
                                </tbody>
                            </table>
                        `;

                    var daftar_mapel = document.getElementById("tabel-daftar-mapel");
                    var judul = document.getElementById("info-daftar-mapel");

                    daftar_mapel.innerHTML = isi;
                    judul.innerHTML = `Total ${data.length} Mata Pelajaran <span>| ${smt} ${ta}`;

                    $("#mapel").DataTable();
                }
            })
            .catch(error => {
                console.log(error);

                var isi = `
                        <div class="my-5 d-flex justify-content-center">
                            <p>Terjadi Kesalahan Sistem</p>
                        </div>
                    `;

                var daftar_mapel = document.getElementById("tabel-daftar-mapel");
                daftar_mapel.innerHTML = isi;
            });
    }

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

    function DaftarPengampu(id) {
        fetch("/mata-pelajaran/pengampu?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    var isi = "";
                    data.forEach(function(item, index) {
                        isi += `
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold"><a href="/profil-guru?nip=${item.nip}">${item.nama}</a></div>
                                    <a href="/kelas">${item.kelas.replace(/[123]/g, m => ['X', 'XI', 'XII'][parseInt(m) - 1])}</a>
                                </div>
                                <span class="badge bg-primary rounded-pill">${item.jumlah_jam}</span>
                            </li>
                         `;
                    });

                    var pengampu = document.getElementById("daftar-pengampu");
                    pengampu.innerHTML = isi;
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }
</script>
<?= $this->endSection() ?>