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

    function PelaksanaanKBM($mapel, $kelas, $nip, $mulai)
    {
        $this->select("jadwal.mulai, jadwal.selesai as sampai, ampu_mapel.jumlah_jam");
        $this->join("ampu_mapel", "jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->where("jadwal.ampu_mapel_id_ampu", function ($subQuery) use ($mapel, $kelas, $nip) {
            $subQuery->select("id_ampu")
                ->from("ampu_mapel")
                ->where("kelas_id_kelas", function ($subSubQuery) use ($kelas) {
                    $subSubQuery->select("id_kelas")
                        ->from("kelas")
                        ->where("nama_kelas", $kelas);
                })
                ->where("semester_id_semester", function ($subSubQuery) {
                    $subSubQuery->select("CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END");
                })
                ->where("mata_pelajaran_id_mapel", function ($subSubQuery) use ($mapel) {
                    $subSubQuery->select("id_mapel")
                        ->from("mata_pelajaran")
                        ->where("nama_mapel", $mapel);
                })
                ->where("guru_inisial", function ($subSubQuery) use ($nip) {
                    $subSubQuery->select("inisial")
                        ->from("guru")
                        ->where("nip", $nip);
                });
        });
        $this->where("jadwal.mulai", "TIME_FORMAT('$mulai', '%H:%i:%s')", false);

        return $this->first();
    }
}
