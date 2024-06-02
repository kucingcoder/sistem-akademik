<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSemester extends Model
{
    protected $table = "semester";

    public function DaftarSemester()
    {
        $this->select("id_ta, id_semester, CONCAT(semester,' ', tahun_akademik.ta) AS smt , semester.semester, tahun_akademik.ta");
        $this->join("tahun_akademik", "1=1");
        $this->orderBy("id_ta", "DESC");
        $this->orderBy("id_semester", "DESC");

        $query = $this->get();
        return $query->getResult();
    }
}
