<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Jadwal Pelajaran<?= $this->endSection() ?>
<?= $this->section('Menu') ?>jadwal-pelajaran<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<div class="pagetitle">
    <h1>Jadwal Pelajaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Pelajaran</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card info-card sales-card">
                    <div class="filter" data-bs-toggle="tooltip" data-bs-placement="left" title="Pilih Kelas">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Kelas</h6>
                            </li>
                            <?php foreach ($DaftarKelas as $Kelas) : ?>
                                <li type="button"><a class="dropdown-item" onclick="GantiKelas('<?= $Kelas->kelas ?>')"><?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Kelas->kelas); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title badge border-danger border-1 text-secondary">Jadwal Pelajaran <span>| <?= $Semester ?> <?= $Tahun ?></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Jadwal Pelajaran">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#editjadwalpelajaran">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive" id="tabel-jadwal">
                            <table class="table table-striped table-bordered border-primary w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Hari</th>
                                        <th class="text-center">Jam Ke</th>
                                        <th class="text-center">Mulai</th>
                                        <th class="text-center">Selesai</th>
                                        <th class="text-center">Durasi</th>
                                        <th class="text-center col-md-2">Mata Pelajaran</th>
                                        <th class="text-center">Guru</th>
                                        <th class="text-center">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1; ?>
                                    <?php foreach ($JadwalTerpilih as $Jadwal) : ?>
                                        <tr>
                                            <th class="text-center"><?= $index; ?></th>
                                            <td class="text-center"><?php echo $Jadwal->hari; ?></td>
                                            <td class="text-center"><?php echo $Jadwal->jam_ke; ?></td>
                                            <td class="text-center"><?php echo $Jadwal->mulai; ?></td>
                                            <td class="text-center"><?php echo $Jadwal->selesai; ?></td>
                                            <td class="text-center"><?php echo $Jadwal->durasi; ?></td>
                                            <td><?php echo $Jadwal->mata_pelajaran; ?></td>
                                            <td><?php echo $Jadwal->guru; ?></td>
                                            <td class="text-center"><?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Jadwal->kelas); ?></td>
                                        </tr>
                                        <?php $index++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
                <h5 class="modal-title">Edit Jadwal Pelajaran <span>| <?= $Semester ?> <?= $Tahun ?></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example" id="pilih-kelas" onchange="LihatJadwal()">
                            <option value="null" selected disabled>Pilih Kelas</option>
                            <?php foreach ($DaftarKelas as $Kelas) : ?>
                                <option value="<?= $Kelas->kelas ?>"><?= $Kelas->kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example" id="pilih-hari" onchange="LihatJadwal()">
                            <option value="null" selected disabled>Pilih Hari</option>
                            <option value="0">Senin</option>
                            <option value="1">Selasa</option>
                            <option value="2">Rabu</option>
                            <option value="3">Kamis</option>
                            <option value="4">Jumat</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive" id="tabel-jadwal-edit">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="SimpanJadwal()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    function GantiKelas(kelas) {
        fetch("/jadwal-pelajaran/jadwal-kelas?kelas=" + kelas)
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
                                    <td class="text-center">${item.hari}</td>
                                    <td class="text-center">${item.jam_ke}</td>
                                    <td class="text-center">${item.mulai}</td>
                                    <td class="text-center">${item.selesai}</td>
                                    <td class="text-center">${item.durasi}</td>
                                    <td>${item.mata_pelajaran}</td>
                                    <td>${item.guru}</td>
                                    <td class="text-center">${item.kelas.replace(/[123]/g, m => ['X', 'XI', 'XII'][parseInt(m) - 1])}</td>
                                </tr>
                        `;
                    });

                    var isi = `
                            <table class="table table-striped table-bordered border-primary w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Hari</th>
                                        <th class="text-center">Jam Ke</th>
                                        <th class="text-center">Mulai</th>
                                        <th class="text-center">Selesai</th>
                                        <th class="text-center">Durasi</th>
                                        <th class="text-center col-md-2">Mata Pelajaran</th>
                                        <th class="text-center">Guru</th>
                                        <th class="text-center">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${baris}
                                </tbody>
                            </table>
                        `;

                    var jadwal = document.getElementById("tabel-jadwal");
                    jadwal.innerHTML = isi;
                }
            })
            .catch(error => {
                var isi = `
                        <div class="my-5 d-flex justify-content-center">
                            <p>Terjadi Kesalahan Sistem</p>
                        </div>
                    `;

                var jadwal = document.getElementById("tabel-jadwal");
                jadwal.innerHTML = isi;
            })
    }

    function LihatJadwal() {
        let kelas = document.getElementById("pilih-kelas").value;
        let hari = document.getElementById("pilih-hari").value;

        if (kelas != "null" && hari != "null") {
            fetch("/jadwal-pelajaran/edit-jadwal-kelas?kelas=" + kelas + "&hari=" + hari)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    var daftar_pilih = "";

                    data.daftar_kode.forEach(function(item, index) {
                        daftar_pilih += `<option value="${item.id_ampu}">${item.kode}</option>`;
                    });

                    var baris = "";
                    for (let index = 0; index < 10; index++) {
                        baris += `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="pilih-${index}" onchange="EditJadwal(${index})">
                                            <option value="null" selected disabled>Pilih Mata Pelajaran</option>
                                            ${daftar_pilih}
                                        </select>
                                    </td>
                                </tr>
                        `;
                    }

                    var isi = `
                            <table class="table table-striped table-bordered border-primary w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center col-md-1">Jam Ke</th>
                                        <th class="text-center col-md-3">Kode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${baris}
                                </tbody>
                        </table>
                        `;

                    var jadwal = document.getElementById("tabel-jadwal-edit");
                    jadwal.innerHTML = isi;

                    data.daftar_jadwal.forEach(function(item, index) {
                        var jadwal = document.getElementById("pilih-" + index);
                        jadwal.value = item.id_ampu
                    });
                })
                .catch(error => {
                    var isi = `
                        <div class="my-5 d-flex justify-content-center">
                            <p>Terjadi Kesalahan Sistem</p>
                        </div>
                    `;

                    var jadwal = document.getElementById("tabel-jadwal-edit");
                    jadwal.innerHTML = isi;
                })
        }
    }

    jadwal_baru = []

    function EditJadwal(index) {
        let kelas = document.getElementById("pilih-kelas").value;
        let hari = document.getElementById("pilih-hari").value;
        let id_ampu = document.getElementById("pilih-" + index).value;

        let jadwal = {
            kelas: kelas,
            hari: hari,
            jam_ke: index + 1,
            id_ampu: id_ampu
        };

        jadwal_baru.push(jadwal);
    }

    function SimpanJadwal() {
        fetch('/jadwal-pelajaran/edit-jadwal-kelas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(jadwal_baru)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }
</script>
<?= $this->endSection() ?>