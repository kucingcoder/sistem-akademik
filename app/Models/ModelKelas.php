<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    protected $table = "kelas";

    function DataTingkat($tingkat)
    {
        $NilaiTingkat = [1, 2, 3];
        if (!in_array($tingkat, $NilaiTingkat)) {
            return [];
        }

        $this->select("COUNT(*) * 100 / (SELECT COUNT(*) FROM kelas INNER JOIN tahun_akademik ON tahun_akademik.id_ta = kelas.tahun_akademik_id_ta WHERE tahun_akademik.mulai <= CURRENT_DATE AND tahun_akademik.sampai >= CURRENT_DATE) as persen, COUNT(*) as jml, tingkat");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <= CURRENT_DATE");
        $this->where("tahun_akademik.sampai >= CURRENT_DATE");
        $this->where("tingkat", $tingkat);


        $query = $this->get();
        return $query->getResult();
    }

    function DataSemuaTingkat()
    {
        $this->select("100 as persen, COUNT(*) as jml, 'Semua Tingkat' as tingkat");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));

        $query = $this->get();
        return $query->getResult();
    }
}
