<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - KBM<?= $this->endSection() ?>
<?= $this->section('Menu') ?>kbm<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Kegiatan Belajar Mengajar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">KBM</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Mata Pelajaran yang Diampu di Semester Ini <span>| <?= $Kaldik["Semester"] . " " . $TahunAjaran; ?></span></h5>
                    </div>
                </div>
                <?php if (!empty($MataPelajaran)) : ?>
                    <?php foreach ($MataPelajaran as $mapel) : ?>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $mapel->nama_mapel; ?> <span>| <?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $mapel->kelas); ?></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <a class="nav-link collapsed" role="button" data-bs-toggle="modal" data-bs-target="#tempat-1" onclick="Pertemuan('<?= $mapel->kelas; ?>','<?= $mapel->nama_mapel; ?>')">
                                                <i class="bi bi-people"></i>
                                            </a>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $mapel->jml_siswa; ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?= $mapel->jumlah_jam; ?></span> <span class="text-muted small pt-2 ps-1">Jam Pelajaran</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal fade" id="tempat-1" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail KBM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pertemuan-tab" data-bs-toggle="tab" data-bs-target="#pertemuan" type="button" role="tab" aria-controls="pertemuan" aria-selected="false">Pertemuan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" onclick="DaftarTugas()">Penugasan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="riwayatampu-tab" data-bs-toggle="tab" data-bs-target="#riwayatampu" type="button" role="tab" aria-controls="riwayatampu" aria-selected="false">Penilaian UTS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Penilaian UAS</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2" id="myTabContent">
                                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                        <div class="my-5 d-flex justify-content-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                        </div>
                                    </div>

                                    <!-- <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                        <h5 class="card-title">Penilaian Ujian Akhir Semester <span>| nama mapel kelas</span></h5>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">NIS</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>28</td>
                                                    <td>Brandon Jacob</td>
                                                    <td>Laki-Laki</td>
                                                    <td>
                                                        <form>
                                                            <input type="number" class="form-control">
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary"><a href="kbm">Simpan</a></button>
                                    </div> -->

                                    <div class="tab-pane fade" id="riwayatampu" role="tabpanel" aria-labelledby="riwayatampu-tab">
                                        <div class="my-5 d-flex justify-content-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                        </div>
                                    </div>

                                    <!-- <div class="tab-pane fade" id="riwayatampu" role="tabpanel" aria-labelledby="riwayatampu-tab">
                                        <h5 class="card-title">Penilaian Ujian Tengah Semester <span>| nama mapel kelas</span></h5>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">NIS</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>28</td>
                                                    <td>Brandon Jacob</td>
                                                    <td>Laki-Laki</td>
                                                    <td>
                                                        <form>
                                                            <input type="number" class="form-control">
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary"><a href="kbm">Simpan</a></button>
                                    </div> -->

                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="my-5 d-flex justify-content-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show active" id="pertemuan" role="tabpanel" aria-labelledby="pertemuan-tab">
                                        <div class="my-5 d-flex justify-content-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
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
</section>

<div class="modal fade" id="verticalycentered1" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Melihat Detail KBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" id="DetailKbm-Tanggal" placeholder="3 Agustus 2023" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="DetailKbm-Kelas" placeholder="XII Teknika" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="DetailKbm-Mapel" placeholder="Bahasa Indonesia" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Materi</label>
                        <input type="text" class="form-control" id="DetailKbm-Materi" placeholder="Materi Bahasa Indonesia" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Uraian Materi</label>
                        <input type="text" class="form-control" id="DetailKbm-UraianMateri" placeholder="Uraian Materi Pembelajaran Bahasa Indonesia" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tempat-1">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Melihat Kehadiran Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="kehadiran">
                <div class="my-5 d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tempat-1">BATAL</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered2">Ubah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered2" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Mengubah Kehadiran Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah yakin data profil yang anda ubah sudah benar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered">BATAL</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tempat-1" onclick="UpdateKehadiran()">Ubah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahtugas" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Menambahkan Tugas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="/kbm/tambah-tugas" method="post">
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <input type="text" class="form-control" id="NamaTugas" name="TambahTugas-Nama" placeholder="Nama Tugas">
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea rows="8" class="form-control" id="UraianTugas" name="TambahTugas-Uraian" placeholder="Uraian Tugas"></textarea>
                    </div>
                    <input type="hidden" id="KelasTugas" name="KelasTugas" value="">
                    <input type="hidden" id="MapelTugas" name="MapelTugas" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tempat-1">BATAL</button>
                    <button type="submit" class="btn btn-primary">TAMBAHKAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="infotugas" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Tanggal Tugas</label>
                        <input type="text" class="form-control" id="DetailTugas-Tanggal" placeholder="3 Agustus 2023" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="DetailTugas-Mapel" placeholder="Bahasa Indonesia" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Uraian</label>
                        <textarea rows="8" class="form-control" id="DetailTugas-Uraian" placeholder="Deskripsi Tugas Pelajaran Bahasa Indonesia" disabled></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tempat-1">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nilaitugas" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-nilai-tugas">Penilaian Tugas nama tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped w-100" id="daftar-siswa-tugas">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center">#</th>
                                <th class="text-center">NIS</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody id="daftar-nilai-siswa">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tempat-1">Kembali</button>
                <button type="button" class="btn btn-primary"><a href="kbm">Simpan</a></button>
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

    $('#tempat-1').on('hidden.bs.modal', function() {
        var tab_pertemuan = document.getElementById("pertemuan-tab");
        var tab_penugasan = document.getElementById("contact-tab");
        var tab_uts = document.getElementById("riwayatampu-tab");
        var tab_uas = document.getElementById("tab3-tab");

        var pertemuan = document.getElementById("pertemuan");
        var penugasan = document.getElementById("contact");
        var uts = document.getElementById("riwayatampu");
        var uas = document.getElementById("tab3");

        tab_pertemuan.classList.remove("active");
        tab_penugasan.classList.remove("active");
        tab_uts.classList.remove("active");
        tab_uas.classList.remove("active");

        pertemuan.classList.remove("show");
        penugasan.classList.remove("show");
        uts.classList.remove("show");
        uas.classList.remove("show");

        pertemuan.classList.remove("active");
        penugasan.classList.remove("active");
        uts.classList.remove("active");
        uas.classList.remove("active");

        tab_pertemuan.classList.add("active");
        pertemuan.classList.add("show");
        pertemuan.classList.add("active");
    });

    let kelas_terpilih, mapel_terpilih;

    function Pertemuan(kelas, mapel) {
        kelas_terpilih = kelas;
        mapel_terpilih = mapel;

        fetch("/kbm/pertemuan?kelas=" + kelas + "&mapel=" + mapel)
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
                            <tr class="align-middle">
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">${new Date(item.tanggal).toLocaleDateString('id-ID',{year:'numeric',month:'long',day:'numeric'})}</td>
                                <td>${item.materi}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DetailPertemuan('${item.id_kbm}', '${kelas}', '${mapel}')">
                                        <i class="bi bi-info-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="Kehadiran('${item.id_kbm}')">
                                        <i class="bi bi-people"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });

                    var isi = `
                            <h5 class="card-title">Pelaksanaan KBM <span>| ${mapel} ${kelas.replace(/[123]/g, m => ['X', 'XI', 'XII'][parseInt(m) - 1])}</span></h5>
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="daftar-pertemuan">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Materi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${baris}
                                    </tbody>
                                </table>
                            </div>
                        `;

                    var pertemuan = document.getElementById("pertemuan");
                    pertemuan.innerHTML = isi;

                    $("#daftar-pertemuan").DataTable();
                }
            })
            .catch(error => {
                var isi = `
                        <div class="my-5 d-flex justify-content-center">
                            <p>Terjadi Kesalahan Sistem</p>
                        </div>
                    `;

                var pertemuan = document.getElementById("pertemuan");
                pertemuan.innerHTML = isi;
            });
    }

    function DetailPertemuan(id, kelas, mapel) {
        document.getElementById("DetailKbm-Tanggal").removeAttribute("disabled");
        document.getElementById("DetailKbm-Kelas").removeAttribute("disabled");
        document.getElementById("DetailKbm-Mapel").removeAttribute("disabled");
        document.getElementById("DetailKbm-Materi").removeAttribute("disabled");
        document.getElementById("DetailKbm-UraianMateri").removeAttribute("disabled");

        document.getElementById("DetailKbm-Tanggal").value = "";
        document.getElementById("DetailKbm-Kelas").value = "";
        document.getElementById("DetailKbm-Mapel").value = "";
        document.getElementById("DetailKbm-Materi").value = "";
        document.getElementById("DetailKbm-UraianMateri").value = "";

        fetch("/kbm/detail-pertemuan?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("DetailKbm-Tanggal").value = new Date(data.tanggal).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById("DetailKbm-Kelas").value = kelas.replace(/[123]/g, m => ['X', 'XI', 'XII'][parseInt(m) - 1]);
                    document.getElementById("DetailKbm-Mapel").value = mapel;
                    document.getElementById("DetailKbm-Materi").value = data.materi;
                    document.getElementById("DetailKbm-UraianMateri").value = data.uraian;
                }
            })
            .catch(error => {
                document.getElementById("DetailKbm-Tanggal").value = "Kesalahan Sistem";
                document.getElementById("DetailKbm-Kelas").value = "Kesalahan Sistem";
                document.getElementById("DetailKbm-Mapel").value = "Kesalahan Sistem";
                document.getElementById("DetailKbm-Materi").value = "Kesalahan Sistem";
                document.getElementById("DetailKbm-UraianMateri").value = "Kesalahan Sistem";
            });

        document.getElementById("DetailKbm-Tanggal").setAttribute("disabled", "disabled");
        document.getElementById("DetailKbm-Kelas").setAttribute("disabled", "disabled");
        document.getElementById("DetailKbm-Mapel").setAttribute("disabled", "disabled");
        document.getElementById("DetailKbm-Materi").setAttribute("disabled", "disabled");
        document.getElementById("DetailKbm-UraianMateri").setAttribute("disabled", "disabled");
    }

    var PerubahanKehadiran = {};

    function Kehadiran(id_kbm) {
        PerubahanKehadiran = {};

        fetch("/kbm/kehadiran?id=" + id_kbm)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    var baris = "";
                    data.forEach(function(item, index) {
                        let keteranganSelected = (item.keterangan === 'H') ? 'Hadir' : (item.keterangan === 'S') ? 'Sakit' : (item.keterangan === 'I') ? 'Izin' : (item.keterangan === 'A') ? 'Alfa' : '';

                        baris += `
                            <tr class="align-middle">
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">${item.nis}</td>
                                <td>${item.nama}</td>
                                <td class="text-center">${(item.gender === 'L') ? 'Laki-Laki' : (item.gender === 'P') ? 'Perempuan' : ''}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" onchange="UbahKehadiran('${item.nis}','${id_kbm}',this.value)">
                                                <option value="H" ${keteranganSelected === 'Hadir' ? 'selected' : ''}>Hadir</option>
                                                <option value="S" ${keteranganSelected === 'Sakit' ? 'selected' : ''}>Sakit</option>
                                                <option value="I" ${keteranganSelected === 'Izin' ? 'selected' : ''}>Izin</option>
                                                <option value="A" ${keteranganSelected === 'Alfa' ? 'selected' : ''}>Alfa</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         `;
                    });

                    var isi = `
                            <div class="table-responsive">
                                <table id="tabel-kehadiran" class="table table-striped w-100">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="text-center">#</th>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${baris}
                                    </tbody>
                                </table>
                            </div>
                        `;

                    var kehadiran = document.getElementById("kehadiran");
                    kehadiran.innerHTML = isi;

                    $("#tabel-kehadiran").DataTable();
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function UbahKehadiran(nis, id_kbm, keterangan) {
        if (!PerubahanKehadiran[nis]) {
            PerubahanKehadiran[nis] = [];
        }

        var existingIndex = PerubahanKehadiran[nis].findIndex(function(data) {
            return data.id_kbm === id_kbm;
        });

        if (existingIndex !== -1) {
            PerubahanKehadiran[nis][existingIndex].keterangan = keterangan;
        } else {
            PerubahanKehadiran[nis].push({
                id_kbm: id_kbm,
                keterangan: keterangan
            });
        }
    }

    function UpdateKehadiran() {
        var data = [];
        for (var key in PerubahanKehadiran) {
            PerubahanKehadiran[key].forEach(function(item) {
                var obj = {
                    nis: key,
                    id_kbm: item.id_kbm,
                    keterangan: item.keterangan
                };
                data.push(obj);
            });
        }

        fetch("/kbm/kehadiran", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (response.status === 404) {
                    alert('Gagal');
                }
            })
            .catch(error => {
                alert('Gagal');
            });
    }

    function setTambahTugas() {
        var kelas = document.getElementById("KelasTugas");
        var mapel = document.getElementById("MapelTugas");

        kelas.value = kelas_terpilih;
        mapel.value = mapel_terpilih;
    }

    function DaftarTugas() {
        fetch("/kbm/penugasan?kelas=" + kelas_terpilih + "&mapel=" + mapel_terpilih)
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
                                <tr class="align-middle">
                                    <th class="text-center">${index + 1}</th>
                                    <td class="text-center">${new Date(item.tanggal).toLocaleDateString('id-ID',{year:'numeric',month:'long',day:'numeric'})}</td>
                                    <td>${item.nama}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#infotugas" onclick="DetailTugas(${item.id})">
                                            <i class="bi bi-info-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-success rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#nilaitugas" onclick="InfoNilaiTugas(${item.id}, '${kelas_terpilih}', '${mapel_terpilih}', '${item.nama}')">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                </tr>
                        `;
                    });

                    var isi = `
                            <h5 class="card-title">Pemberian Tugas <span>| ${mapel_terpilih} ${kelas_terpilih.replace(/[123]/g, m => ['X', 'XI', 'XII'][parseInt(m) - 1])}</span></h5>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" onclick="setTambahTugas()">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#tambahtugas">
                                    <i class="bi bi-plus-square"></i>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="daftar-tugas">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Tugas</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${baris}
                                    </tbody>
                                </table>
                            </div>
                        `;

                    var penugasan = document.getElementById("contact");
                    penugasan.innerHTML = isi;

                    $("#daftar-tugas").DataTable();
                }
            })
            .catch(error => {
                var isi = `
                        <div class="my-5 d-flex justify-content-center">
                            <p>Terjadi Kesalahan Sistem</p>
                        </div>
                    `;

                var penugasan = document.getElementById("contact");
                penugasan.innerHTML = isi;

                console.log(error);
            })
    }

    function DetailTugas(id) {
        document.getElementById("DetailTugas-Tanggal").removeAttribute("disabled");
        document.getElementById("DetailTugas-Mapel").removeAttribute("disabled");
        document.getElementById("DetailTugas-Uraian").removeAttribute("disabled");

        document.getElementById("DetailTugas-Tanggal").value = "";
        document.getElementById("DetailTugas-Mapel").value = "";
        document.getElementById("DetailTugas-Uraian").value = "";

        fetch("/kbm/detail-tugas?id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    document.getElementById("DetailTugas-Tanggal").value = new Date(data.tanggal).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById("DetailTugas-Mapel").value = data.mapel;
                    document.getElementById("DetailTugas-Uraian").value = data.uraian;
                }
            })
            .catch(error => {
                document.getElementById("DetailTugas-Tanggal").value = "Kesalahan Sistem";
                document.getElementById("DetailTugas-Mapel").value = "Kesalahan Sistem";
                document.getElementById("DetailTugas-Uraian").value = "Kesalahan Sistem";
            });

        document.getElementById("DetailTugas-Tanggal").setAttribute("disabled", "disabled");
        document.getElementById("DetailTugas-Mapel").setAttribute("disabled", "disabled");
        document.getElementById("DetailTugas-Uraian").setAttribute("disabled", "disabled");
    }

    function InfoNilaiTugas(id_tugas, nama_kelas, nama_mapel, nama_tugas) {
        PerubahanNilai = {};

        fetch("/kbm/nilai-tugas?kelas=" + nama_kelas + "&mapel=" + nama_mapel + "&id=" + id_tugas)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    var baris = "";
                    data.forEach(function(item, index) {
                        baris += `
                            <tr class="align-middle">
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">${item.nis}</td>
                                <td>${item.nama}</td>
                                <td class="text-center">${(item.gender === 'L') ? 'Laki-Laki' : (item.gender === 'P') ? 'Perempuan' : ''}</td>
                                <td> <input type="number" min="0" max="100" value="${item.nilai}" class="form-control"></td>
                            </tr>
                         `;
                    });


                    var judulnilaitugas = document.getElementById("judul-nilai-tugas");
                    judulnilaitugas.innerHTML = "Penilaian Tugas " + nama_tugas;

                    var nilaitugas = document.getElementById("daftar-nilai-siswa");
                    nilaitugas.innerHTML = baris;

                    $("#daftar-siswa-tugas").DataTable();
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }
</script>
<?= $this->endSection() ?>