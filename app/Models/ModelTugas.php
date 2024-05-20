<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTugas extends Model
{
    protected $table = "tugas";
    protected $allowedFields = ["id", "tanggal", "nama", "uraian", "tanggal"];

    function TambahTugas($Nama, $Uraian, $Kelas, $Mapel)
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT ampu_mapel.id_ampu as id FROM ampu_mapel INNER JOIN mata_pelajaran ON ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel Inner JOIN kelas ON ampu_mapel.kelas_id_kelas = kelas.id_kelas WHERE kelas.nama_kelas = ? AND mata_pelajaran.nama_mapel = ?", [$Kelas, $Mapel]);
        $row = $query->getRow();

        $IdAmpu = "";

        if ($row) {
            $IdAmpu = $row->id;
        }

        $db->query("INSERT INTO tugas (nama, uraian, tanggal, ampu_mapel_id_ampu) VALUES (?, ?, ?, ?)", [$Nama, $Uraian, date("Y-m-d"), $IdAmpu]);
    }

    function DaftarTugas($kelas, $mapel)
    {
        $this->select("tugas.id AS id, tugas.tanggal AS tanggal, tugas.nama AS nama, ampu_mapel_id_ampu AS id_ampu");
        $this->join("ampu_mapel", "tugas.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("kelas", "ampu_mapel.kelas_id_kelas = kelas.id_kelas");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->where("kelas.nama_kelas", $kelas);
        $this->where("mata_pelajaran.nama_mapel", $mapel);
        $this->orderBy("tugas.tanggal", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function DetailTugas($id)
    {
        $this->select("tugas.tanggal as tanggal, mata_pelajaran.nama_mapel as mapel, tugas.uraian");
        $this->join("ampu_mapel", "tugas.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->join("mata_pelajaran", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->where("tugas.id", $id);

        return $this->first();
    }
}
