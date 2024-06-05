<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKBM extends Model
{
    protected $table = "kbm";

    function Pertemuan($nip, $kelas, $mapel)
    {
        $this->select("kbm.id_kbm, kbm.tanggal, kbm.materi");
        $this->join("ampu_mapel", "kbm.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("guru", "ampu_mapel.guru_inisial = guru.inisial");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->join("semester", "ampu_mapel.semester_id_semester = semester.id_semester");
        $this->where("guru.nip", $nip);
        $this->where("kelas.nama_kelas", $kelas);
        $this->where("mata_pelajaran.nama_mapel", $mapel);
        $this->where("semester.id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END)", false);
        $this->orderBy("kbm.tanggal", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function DetailPertemuan($id)
    {
        $this->select("tanggal, materi, uraian");
        $this->where("id_kbm", $id);

        return $this->first();
    }
}
