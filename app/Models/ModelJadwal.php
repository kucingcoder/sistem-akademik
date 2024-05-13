<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
    protected $table = "jadwal";

    public function JadwalHariIni($nip)
    {
        $this->select("ampu_mapel.id_ampu as kode_mapel, MIN(jadwal.mulai) AS mulai, MIN(jadwal.selesai) AS selesai, CONCAT(mata_pelajaran.nama_mapel, ' di Kelas ', kelas.nama_kelas) AS teks");
        $this->join("ampu_mapel", "ampu_mapel.id_ampu = jadwal.ampu_mapel_id_ampu");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("hari", "hari.id_hari = jadwal.hari");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("hari.id_hari", "WEEKDAY(CURRENT_DATE)", false);
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END)", false);
        $this->where("guru.nip", $nip);
        $this->groupBy("mata_pelajaran.nama_mapel, kelas.nama_kelas");

        $query = $this->get();
        return $query->getResult();
    }

    function PelaksanaanKBM($id_ampu)
    {
        $this->select("mata_pelajaran.nama_mapel AS nama_mapel, kelas.nama_kelas, ampu_mapel.jumlah_jam AS jumlah_jam");
        $this->join("ampu_mapel", "jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("ampu_mapel.id_ampu", $id_ampu);

        return $this->first();
    }
}
