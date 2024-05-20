<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    protected $table = "nilai";

    function CekNilaiTugas($IdTugas, $Kelas, $Mapel)
    {
        $this->select("1 as ada");
        $this->join("tugas", "nilai.id_nilai = tugas.id");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("tugas.id", $IdTugas);
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->where("nilai.penilaian_id_penilaian", "T");

        $query = $this->get();
        return $query->getResult();
    }

    function CekNilaiUTS($Kelas, $Mapel)
    {
        $this->select("detil_nilai.nilai_id_nilai AS id");
        $this->join("detil_nilai", "nilai.id_nilai = detil_nilai.nilai_id_nilai");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->where("nilai.penilaian_id_penilaian", "U");

        return $this->first();
    }

    function CekNilaiUAS($Kelas, $Mapel)
    {
        $this->select("detil_nilai.nilai_id_nilai AS id");
        $this->join("detil_nilai", "nilai.id_nilai = detil_nilai.nilai_id_nilai");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->where("nilai.penilaian_id_penilaian", "A");

        return $this->first();
    }
}
