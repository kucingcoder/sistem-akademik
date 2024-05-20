<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAmpuMapel extends Model
{
    protected $table = "ampu_mapel";

    function MataPelajaranDiampu($nip)
    {
        $this->select("mata_pelajaran.nama_mapel, kelas.nama_kelas AS kelas, jumlah_jam, COUNT(*) AS jml_siswa");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("komposisi_kelas", "komposisi_kelas.kelas_id_kelas = kelas.id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END)", false);
        $this->where("guru_inisial", "(SELECT inisial FROM guru WHERE nip = $nip)", false);
        $this->groupby("mata_pelajaran.nama_mapel, kelas.nama_kelas, jumlah_jam");

        $query = $this->get();
        return $query->getResult();
    }

    function MataPelajaranDiampuProfil($nip)
    {
        $this->select('ampu_mapel.id_ampu, mata_pelajaran.nama_mapel, kelas_id_kelas, kelas.nama_kelas, jumlah_jam');
        $this->join('guru', 'guru.inisial = ampu_mapel.guru_inisial');
        $this->join('mata_pelajaran', 'mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel');
        $this->join('kelas', 'kelas.id_kelas = ampu_mapel.kelas_id_kelas');
        $this->where('guru.nip', $nip);

        $query = $this->get();
        return $query->getResult();
    }

    function RiwayatMengampu($nip)
    {
        $this->select("ampu_mapel.id_ampu, tahun_akademik.ta, semester.semester, mata_pelajaran.nama_mapel, kelas_id_kelas, kelas.nama_kelas, jumlah_jam");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("guru.nip", $nip);

        $query = $this->get();
        return $query->getResult();
    }
}
