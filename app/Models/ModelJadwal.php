<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
    protected $table = "jadwal";
    protected $allowedFields = ["hari", "jam_ke", "mulai", "selesai", "ampu_mapel_id_ampu"];

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
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)", false);
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

    function JadwalKelas($NamaKelas)
    {
        $this->select("hari.hari, jam_ke, jadwal.mulai, jadwal.selesai, TIMEDIFF(jadwal.selesai, jadwal.mulai) AS durasi,mata_pelajaran.nama_mapel AS mata_pelajaran, guru.nama AS guru, kelas.nama_kelas AS kelas");
        $this->join("hari", "ON hari.id_hari = jadwal.hari");
        $this->join("ampu_mapel", "ampu_mapel.id_ampu = jadwal.ampu_mapel_id_ampu");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)", false);
        $this->where("kelas.nama_kelas", $NamaKelas);
        $this->orderBy("kelas.id_kelas");
        $this->orderBy("jadwal.hari");
        $this->orderBy("jam_ke");

        $query = $this->get();
        return $query->getResult();
    }

    function CekJadwal($Kelas, $IdHari, $Jam)
    {
        $this->select("1 AS ada");
        $this->join("hari", "jadwal.hari = hari.id_hari");
        $this->join("ampu_mapel", "jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)", false);
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("hari.id_hari", $IdHari);
        $this->where("jam_ke", $Jam);

        return $this->first();
    }
}
