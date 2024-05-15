<?= $this->extend('Template') ?>

<?= $this->section('Judul') ?>SMK Bahari Tegal - Pelaksanaan KBM<?= $this->endSection() ?>

<?= $this->section('Konten') ?>
<?php if ($Presensi == true) : ?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sudah Melakukan Presensi</h5>
                        </div>

                        <div class="card-body text-center">
                            <a href="/kbm" class="btn btn-primary">Ubah di KBM</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php else : ?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Kegiatan Belajar Mengajar Saat Ini</h5>
                        </div>

                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingAsalSKl" value="<?= $Mapel; ?>" disabled>
                                        <label for="floatingAsalSKl">Nama Mata Pelajaran</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="inputEmail4" value="<?= str_replace(['1', '2', '3'], ['X', 'XI', 'XII'], $Kelas); ?>" disabled>
                                        <label for="inputEmail4">Kelas</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" id="inputPassword4" value="<?= $Mulai; ?>" disabled>
                                        <label for="inputPassword4" class="form-label">Mulai Pukul</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" id="inputPassword4" value="<?= $Sampai; ?>" disabled>
                                        <label for="inputPassword4" class="form-label">Sampai Pukul</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="inputPassword4" value="<?= $JumlahJam; ?>" disabled>
                                        <label for="inputPassword4" class="form-label">Jumlah Jam</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="Materi" placeholder="Materi">
                                        <label for="inputAddress" class="form-label">Materi</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="UraianMateri" placeholder="Uraian Materi">
                                        <label for="inputAddress" class="form-label">Uraian Materi</label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">Simpan</button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal fade" id="fullscreenModal1" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Presensi Siswa Kegiatan Belajar Mengajar Saat Ini</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="daftar-siswa">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($Siswa)) : ?>
                                            <?php $index = 1; ?>
                                            <?php foreach ($Siswa as $Anak) : ?>
                                                <tr class="align-middle">
                                                    <td class="text-center"><?= $index; ?></td>
                                                    <td class="text-center"><?= $Anak->nis; ?></td>
                                                    <td><?= $Anak->nama; ?></td>
                                                    <td class="text-center"><?= str_replace(["L", "P"], ["Laki-Laki", "Perempuan"], $Anak->gender); ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <select class="form-select" aria-label="Default select example" onchange="AturKehadiran('<?= $Anak->nis; ?>', this.value)">
                                                                    <option value="H">Hadir</option>
                                                                    <option value="S">Sakit</option>
                                                                    <option value="I">Izin</option>
                                                                    <option value="A" selected>Alfa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $index++; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><a onclick="Simpan()">Simpan</a></button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('SkripJS') ?>
<script>
    let dataKehadiran = JSON.parse(`{
        <?php if (!empty($Siswa)) : ?>
            <?php foreach ($Siswa as $Anak) : ?>"<?= $Anak->nis; ?>" : "A"<?php if ($Anak != end($Siswa)) : ?> <?= ","; ?> <?php endif; ?><?php endforeach; ?>
        <?php endif; ?>
    }`);

    $('#daftar-siswa').DataTable();

    function AturKehadiran(nis, kehadiran) {
        if (dataKehadiran[nis]) {
            dataKehadiran[nis] = kehadiran;
        } else {
            dataKehadiran[nis] = kehadiran;
        }
    }

    function Simpan() {
        var Materi = document.getElementById("Materi").value;
        var UraianMateri = document.getElementById("UraianMateri").value;

        const Absensi = Object.entries(dataKehadiran).map(([nis, kehadiran]) => {
            return {
                nis,
                kehadiran
            };
        });

        let json = {
            'kode': '<?= $Kode; ?>',
            'materi': Materi,
            'uraian_materi': UraianMateri,
            'mulai': '<?= $Mulai; ?>',
            'sampai': '<?= $Sampai; ?>',
            'absensi': Absensi
        }

        fetch('/pelaksanaan-kbm/simpan-absensi', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(json)
        }).then(response => {
            if (response.redirected) {
                window.history.replaceState(null, null, response.url);
                window.location.href = response.url;
            }
        })
    }
</script>
<?= $this->endSection() ?>