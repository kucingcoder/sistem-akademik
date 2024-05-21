<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Jadwal Pelajaran<?= $this->endSection() ?>
<?= $this->section('Menu') ?>jadwal-pelajaran<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Jadwal Pelajaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Dashboard.html">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Pelajaran</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- BAGIAN HEADER TABEL -->
                <div class="card info-card sales-card">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Pilih Kelas">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Kelas</h6>
                                <!-- INI QUERYNYA
SELECT id_kelas, nama_kelas AS kelas
FROM kelas 
INNER JOIN tahun_akademik ON tahun_akademik.id_ta = kelas.tahun_akademik_id_ta
WHERE tahun_akademik.mulai <= CURRENT_DATE
AND tahun_akademik.sampai >= CURRENT_DATE;
-->
                            </li>
                            <li><a class="dropdown-item" href="#">1 Nautika</a></li>
                            <li><a class="dropdown-item" href="#">1 Teknika</a></li>
                            <li><a class="dropdown-item" href="#">2 Nautika</a></li>
                            <li><a class="dropdown-item" href="#">2 Teknika</a></li>
                            <li><a class="dropdown-item" href="#">3 Nautika</a></li>
                            <li><a class="dropdown-item" href="#">3 Teknika</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title badge border-danger border-1 text-secondary">Jadwal Pelajaran <span>| Ganjil 2023/2024</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Jadwal Pelajaran">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#editjadwalpelajaran">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <!-- INI QUERYNYA
SELECT hari.hari, jam_ke, jadwal.mulai, jadwal.selesai, TIMEDIFF(jadwal.selesai, jadwal.mulai) AS durasi,mata_pelajaran.nama_mapel AS mata_pelajaran, guru.nama AS guru, kelas.nama_kelas AS kelas
FROM jadwal
INNER JOIN hari ON hari.id_hari = jadwal.hari
INNER JOIN ampu_mapel ON ampu_mapel.id_ampu = jadwal.ampu_mapel_id_ampu
INNER JOIN mata_pelajaran ON mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel
INNER JOIN guru ON guru.inisial = ampu_mapel.guru_inisial
INNER JOIN kelas ON kelas.id_kelas = ampu_mapel.kelas_id_kelas
INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta
INNER JOIN semester ON semester.id_semester = ampu_mapel.semester_id_semester
WHERE tahun_akademik.mulai <= CURRENT_DATE 
AND tahun_akademik.sampai >= CURRENT_DATE
AND semester.id_semester = (SELECT CASE WHEN month(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)
ORDER BY kelas.id_kelas, jadwal.hari, jam_ke;
-->
                        <table class="table table-striped table-bordered border-primary text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam Ke</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Guru</th>
                                    <th scope="col">Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Senin</td>
                                    <td>1</td>
                                    <td>07:20</td>
                                    <td>08:00</td>
                                    <td>00:40</td>
                                    <td>Bahasa Indonesia</td>
                                    <td>Tubagus Faizal Bahri</td>
                                    <td>1 Nautika</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editjadwalpelajaran" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jadwal Pelajaran <span>| Ganjil 2023/2024</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <!-- INI QUERYNYA
SELECT id_kelas, nama_kelas AS kelas
FROM kelas 
INNER JOIN tahun_akademik ON tahun_akademik.id_ta = kelas.tahun_akademik_id_ta
WHERE tahun_akademik.mulai <= CURRENT_DATE
AND tahun_akademik.sampai >= CURRENT_DATE;
-->
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>1 Nautika</option>
                            <option value="231NA">1 Nautika</option>
                            <option value="231TA">1 Teknika</option>
                            <option value="232NA">2 Nautika</option>
                            <option value="232TA">2 Teknika</option>
                            <option value="233NA">3 Nautika</option>
                            <option value="233TA">3 Teknika</option>
                        </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Senin</option>
                            <option value="0">Senin</option>
                            <option value="1">Selasa</option>
                            <option value="2">Rabu</option>
                            <option value="3">Kamis</option>
                            <option value="4">Jumat</option>
                        </select>
                    </div>
                </div>
                <!-- INI QUERYNYA
SELECT id_ampu, 
CONCAT(kode_ampu,'--', guru.nama,'--', mata_pelajaran.nama_mapel,'--', jumlah_jam, ' jam') kode,
kelas.nama_kelas, jadwal.hari
FROM ampu_mapel 
INNER JOIN mata_pelajaran ON mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel
INNER JOIN guru ON guru.inisial = ampu_mapel.guru_inisial
INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta
INNER JOIN kelas ON kelas.id_kelas = ampu_mapel.kelas_id_kelas
INNER JOIN jadwal ON jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu
WHERE tahun_akademik.mulai <= CURRENT_DATE
AND tahun_akademik.sampai >= CURRENT_DATE
AND semester_id_semester = (SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)
AND kelas.nama_kelas = '1 Nautika'
AND jadwal.hari = 0; 
--> <!-- Table with stripped rows -->
                <table class="table table-striped table-bordered border-primary text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jam Ke</th>
                            <th scope="col">Kode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>1</td>
                            <td>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>EY45--Etty Yuniarti--Fisika Terapan--2 jam</option>
                                    <option value="231NA1AA03">AA03--Alsun Amini--Bahasa Indonesia--4 jam</option>
                                    <option value="231NA1AA07">AA07--Alsun Amini--Bahasa Jawa--2 jam</option>
                                    <option value="231NA1EN05">EN05--Kuswaeni--Sejarah Indonesia/Sejarah--2 jam</option>
                                    <option value="231NA1EY45">EY45--Etty Yuniarti--Fisika Terapan--2 jam</option>
                                    <!-- INI QUERYNYA
SELECT id_ampu, CONCAT(kode_ampu,'--', guru.nama,'--', mata_pelajaran.nama_mapel,'--', jumlah_jam, ' jam') kode
FROM ampu_mapel 
INNER JOIN mata_pelajaran ON mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel
INNER JOIN guru ON guru.inisial = ampu_mapel.guru_inisial
INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta
INNER JOIN kelas ON kelas.id_kelas = ampu_mapel.kelas_id_kelas
WHERE tahun_akademik.mulai <= CURRENT_DATE
AND tahun_akademik.sampai >= CURRENT_DATE
AND semester_id_semester = (SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)
AND kelas.nama_kelas = '1 Nautika'
AND jadwal.hari = 0; 
-->
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>

<?= $this->endSection() ?>