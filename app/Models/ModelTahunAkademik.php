<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAkademik extends Model
{
    protected $table = "tahun_akademik";
    protected $allowedFields = ["id_ta", "ta", "mulai", "sampai"];

    function DaftarTahunAkademik()
    {
        $this->select("ta, mulai, sampai");
        $this->orderBy("ta", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarTahunAkademikSingkat()
    {
        $this->select("id_ta, ta");
        $this->orderBy("id_ta", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function TahunAkademikSelanjutnya()
    {
        $this->select("CONCAT(YEAR(ADDDATE(mulai, INTERVAL 1 YEAR)), '/',YEAR(ADDDATE(sampai, INTERVAL 1 YEAR))) as tahun, ADDDATE(mulai, INTERVAL 1 YEAR) as mulai, ADDDATE(sampai, INTERVAL 1 YEAR) as sampai");
        $this->where("sampai", "(SELECT MAX(sampai) FROM tahun_akademik)", false);

        $query = $this->get();
        return $query->getRow();
    }

    function TambahTahunAkademik()
    {
        $this->db->query("
            INSERT INTO tahun_akademik (id_ta, ta, mulai, sampai) 
            SELECT CONCAT(RIGHT(YEAR(ADDDATE(mulai, INTERVAL 1 YEAR)),2), RIGHT(YEAR(ADDDATE(sampai, INTERVAL 1 YEAR)),2)) AS id_ta, 
                   CONCAT(YEAR(ADDDATE(mulai, INTERVAL 1 YEAR)), '/',YEAR(ADDDATE(sampai, INTERVAL 1 YEAR))) AS ta, 
                   ADDDATE(mulai, INTERVAL 1 YEAR) AS mulai, 
                   ADDDATE(sampai, INTERVAL 1 YEAR) AS sampai 
            FROM tahun_akademik 
            WHERE sampai = (SELECT MAX(sampai) FROM tahun_akademik)
        ");

        return $this->db->affectedRows();
    }
}
