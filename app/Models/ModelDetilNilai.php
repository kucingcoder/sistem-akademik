<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDetilNilai extends Model
{
    protected $table = "detil_nilai";

    function DaftarNilaiTugas($Id, $Kelas, $Mapel)
    {
        $this->select("detil_nilai.id_detil, siswa.nis as nis, siswa.nama as nama, siswa.jenis_kelamin_id_jk as gender, detil_nilai.nilai as nilai");
        $this->join("siswa", "detil_nilai.siswa_nis = siswa.nis");
        $this->join("nilai", "detil_nilai.nilai_id_nilai = nilai.id_nilai");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("nilai.penilaian_id_penilaian", "T");
        $this->where("nilai.id_nilai", $Id);
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->orderBy("siswa.nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarNilaiUTS($Kelas, $Mapel)
    {
        $this->select("detil_nilai.id_detil, siswa.nis as nis, siswa.nama as nama, siswa.jenis_kelamin_id_jk as gender, detil_nilai.nilai as nilai");
        $this->join("siswa", "detil_nilai.siswa_nis = siswa.nis");
        $this->join("nilai", "detil_nilai.nilai_id_nilai = nilai.id_nilai");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("nilai.penilaian_id_penilaian", "U");
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->orderBy("siswa.nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarNilaiUAS($Kelas, $Mapel)
    {
        $this->select("detil_nilai.id_detil, siswa.nis as nis, siswa.nama as nama, siswa.jenis_kelamin_id_jk as gender, detil_nilai.nilai as nilai");
        $this->join("siswa", "detil_nilai.siswa_nis = siswa.nis");
        $this->join("nilai", "detil_nilai.nilai_id_nilai = nilai.id_nilai");
        $this->join("ampu_mapel", "nilai.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->where("nilai.penilaian_id_penilaian", "A");
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("mata_pelajaran.nama_mapel", $Mapel);
        $this->orderBy("siswa.nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }
}
