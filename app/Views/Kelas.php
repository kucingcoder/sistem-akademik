<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Kelas<?= $this->endSection() ?>
<?= $this->section('Menu') ?>kelas<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Kelas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Kelas</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="card info-card customers-card">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Tahun Akademik">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Tahun Akademik</h6>
                            </li>
                            <?php foreach ($DaftarTA as $TA) : ?>
                                <li onclick="GantiTA('<?= $TA->ta; ?>','<?= $TA->mulai; ?>','<?= $TA->sampai; ?>')"><a class="dropdown-item"><?= $TA->ta; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title" id="judul-daftar-kelas-utama">Total <?= count($DaftarKelas); ?> Kelas <span>| Tahun akademik <?= $TahunAjaran; ?></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Menetapkan Kelas Baru Beserta Wali Kelasnya pada Tahun Akademik saat ini">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    <i class="bi bi-person-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive" id="kelas-yang-ada">
                        <table class="table table-striped w-100" id="daftar-kelas">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Wali Kelas</th>
                                    <th class="text-center">Jumlah Siswa</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="isi-daftar-kelas">
                                <?php $index = 1; ?>
                                <?php foreach ($DaftarKelas as $Kelas) : ?>
                                    <tr class="align-middle">
                                        <th class="text-center"><?= $index; ?></th>
                                        <td><?= $Kelas->nama_kelas; ?></td>
                                        <td><?= $Kelas->wali_kelas; ?></td>
                                        <td class="text-center"><?= $Kelas->jml_siswa; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DaftarSiswaCalonKelas('<?= $Kelas->nama_kelas; ?>','<?= $Kelas->id_jurusan; ?>','<?= $Kelas->id_kelas; ?>')">
                                                <i class="bi bi-person-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-success rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered2" onclick="KomposisiKelas('<?= $Kelas->nama_kelas; ?>','<?= $Kelas->id_kelas; ?>')">
                                                <i class="bi bi-search"></i>
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
</section>

<div class="modal fade" id="verticalycentered1" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-calon-siswa-kelas">Nama - nama Siswa yang akan Ditetapkan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="table-responsive" id="daftar-calon">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered3">MASUKKAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Menetapkan Kelas dan Wali Kelasnya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Nama Kelas" id="Tambah-Nama">
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" aria-label="Default select example" id="Tambah-Jurusan">
                            <option selected disabled>Pilih Jurusan</option>
                            <?php foreach ($DaftarJurusan as $Jurusan) : ?>
                                <option value="<?= $Jurusan->id; ?>"><?= $Jurusan->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" aria-label="Default select example" id="Tambah-Tingkat">
                            <option selected disabled>Pilih Tingkat</option>
                            <option value="1">Tingkat I</option>
                            <option value="2">Tingkat II</option>
                            <option value="3">Tingkat III</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" aria-label="default select example" id="Tambah-Guru">
                            <option selected disabled>Pilih Guru Wali Kelas</option>
                            <?php foreach ($DaftarGuru as $Guru) : ?>
                                <option value="<?= $Guru->nip; ?>"><?= $Guru->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered6">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered2" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-komposisi-kelas">Komposisi Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" id="komposisi-yang-ada">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered3" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menetapkan Siswa Ke dalam Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Yakin Nama - nama tersebut akan Dimasukkan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered1">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="BeriKelas()">IYA</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered4" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Memindahkan Siswa Ke dalam Kelas Lain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="loading" id="nama-pindah">
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Kelas Sebelumnya</label>
                        <input type="text" class="form-control" placeholder="loading" id="kelas-pindah">
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Dipindah ke Kelas</label>
                        <select id="daftar-kelas-pindah" class="form-select" onchange="setIdKelas(this.value)">
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered2">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered7">IYA</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered5" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menghapus Seorang Siswa dari Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered2">Batal</button>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="HapusDariKelas()">IYA</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered6" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Menetapkan Kelas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Yakin Pilihan yang Ditetapkan sudah benar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="TambahKelas()">IYA</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered7" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Memindahkan Siswa Ke Kelas Lain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verticalycentered4">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="PindahKelas()">IYA</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    kode_unik_terpilih = "", id_kelas_terpilih = "", calonsiswa = [];

    $("#daftar-kelas").DataTable();

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

    function GantiTA(ta, mulai, sampai) {
        fetch("/kelas/daftar-kelas?mulai=" + mulai + "&sampai=" + sampai)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    var judul = document.getElementById("judul-daftar-kelas-utama");
                    var kelas = document.getElementById("kelas-yang-ada");

                    judul.innerHTML = "Total " + data.length + " Kelas <span>| Tahun akademik " + ta + "</span>";
                    baris = "";

                    data.forEach((kelas, index) => {
                        baris += `
                                <tr class="align-middle">
                                    <th class="text-center">${index + 1}</th>
                                    <td>${kelas.nama_kelas}</td>
                                    <td>${kelas.wali_kelas}</td>
                                    <td class="text-center">${kelas.jml_siswa}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered1" onclick="DaftarSiswaCalonKelas('${kelas.nama_kelas}','${kelas.id_jurusan}')">
                                            <i class="bi bi-person-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-success rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered2" onclick="KomposisiKelas('${kelas.nama_kelas}','${kelas.id_kelas}')">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </td>
                                </tr>
                        `
                    });

                    data = `
                        <table class="table table-striped w-100" id="daftar-kelas">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Wali Kelas</th>
                                    <th class="text-center">Jumlah Siswa</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${baris}
                            </tbody>
                        </table>
                    `

                    kelas.innerHTML = data;

                    $("#daftar-kelas").DataTable();
                }
            })
            .catch(error => {});
    }

    function DaftarSiswaCalonKelas(nama_kelas, id_kelas, tambahan) {
        id_kelas_terpilih = tambahan;
        calonsiswa = []

        fetch("/kelas/daftar-siswa-calon-kelas?id=" + id_kelas)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    var judul = document.getElementById("judul-calon-siswa-kelas");
                    var tabel = document.getElementById("daftar-calon");

                    judul.innerHTML = "Nama - nama Siswa yang akan Ditetapkan di Kelas " + nama_kelas;

                    baris = "";

                    data.forEach((siswa, index) => {
                        baris += `
                            <tr>
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" id="gridCheck2" onchange="DaftarPenambahan('${siswa.nis}', this)">
                                </td>
                                <td class="text-center">${siswa.nis}</td>
                                <td>${siswa.nama}</td>
                                <td class="text-center">${siswa.kelas_sebelumnya}</td>
                            </tr>
                        `
                    });

                    data = `
                        <table class="table table-striped w-100" id="daftar-kelas">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Masukan</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">Kelas Sebelumnya</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${baris}
                            </tbody>
                        </table>
                    `

                    tabel.innerHTML = data;

                    $("#siswa-rohingya").DataTable();
                }
            })
            .catch(error => {});
    }

    function KomposisiKelas(nama_kelas, id_kelas) {
        fetch("/kelas/komposisi-kelas?id=" + id_kelas)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    var judul = document.getElementById("judul-komposisi-kelas");
                    var kelas = document.getElementById("komposisi-yang-ada");

                    judul.innerHTML = "Komposisi Kelas " + nama_kelas;

                    baris = "";

                    data.forEach((siswa, index) => {
                        baris += `
                            <tr>
                                <th class="text-center">${index + 1}</th>
                                <td class="text-center">${siswa.nis}</td>
                                <td>${siswa.nama}</td>
                                <td>${siswa.kelas}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered4" onclick="InfoPerpindahan('${siswa.nis}', '${siswa.kode_unik}')">
                                        <i class="bi bi-arrow-right-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered5" onclick="setKode('${siswa.kode_unik}')">
                                        <i class="bi bi-eraser"></i>
                                    </button>
                                </td>
                            </tr>
                        `
                    });

                    data = `
                        <table class="table table-striped w-100" id="komposisi-kelas">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="isi-komposisi-kelas">
                                ${baris}
                            </tbody>
                        </table>
                    `

                    kelas.innerHTML = data;

                    $("#komposisi-kelas").DataTable();

                }
            })
            .catch(error => {});
    }

    function InfoPerpindahan(nis, kode_unik) {
        kode_unik_terpilih = kode_unik;

        fetch("/kelas/info-pindah-kelas?nis=" + nis + "&kode=" + kode_unik)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data !== null) {
                    var nama = document.getElementById("nama-pindah");
                    var kelas = document.getElementById("kelas-pindah");
                    var daftar_kelas = document.getElementById("daftar-kelas-pindah");

                    nama.value = data.nama;
                    kelas.value = data.nama_kelas;

                    pilihan = "\n<option selected disabled>Pilih Kelas...</option>\n";

                    data.daftar_kelas.forEach((kelas) => {
                        pilihan += `
                            <option value='${kelas.id_kelas}'>${kelas.nama_kelas}</option>
                        `
                    });


                    daftar_kelas.innerHTML = pilihan;
                }
            })
            .catch(error => {});
    }

    function TambahKelas() {
        var nama = document.getElementById("Tambah-Nama").value;
        var jurusan = document.getElementById("Tambah-Jurusan").value;
        var tingkat = document.getElementById("Tambah-Tingkat").value;
        var guru = document.getElementById("Tambah-Guru").value;

        data = {
            'guru_nip': guru,
            'nama_kelas': nama,
            'jurusan_id_jurusan': jurusan,
            'tingkat': tingkat
        }

        fetch('/kelas/tambah-kelas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }

    function setKode(kode_unik) {
        kode_unik_terpilih = kode_unik;
    }

    function setIdKelas(id_kelas) {
        id_kelas_terpilih = id_kelas;
    }

    function HapusDariKelas() {
        fetch('/kelas/hapus-siswa?kode=' + kode_unik_terpilih)
            .then(response => {
                if (response.redirected) {
                    window.history.replaceState(null, null, response.url);
                    window.location.href = response.url;
                }
            })
    }

    function PindahKelas() {
        fetch('/kelas/pindah-kelas?kode=' + kode_unik_terpilih + "&id=" + id_kelas_terpilih)
            .then(response => {
                if (response.redirected) {
                    window.history.replaceState(null, null, response.url);
                    window.location.href = response.url;
                }
            })
    }

    function DaftarPenambahan(nis, status) {
        if (status.checked == true) {
            calonsiswa.push(nis);
        }

        if (status.checked == false) {
            let index = calonsiswa.indexOf(nis);

            if (index !== -1) {
                calonsiswa.splice(index, 1);
            }
        }
    }

    function BeriKelas() {
        fetch('/kelas/beri-kelas?id=' + id_kelas_terpilih, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(calonsiswa)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }
</script>
<?= $this->endSection() ?>