<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
    protected $table = 'jurusan';

    function DaftarJurusan()
    {
        $this->select("id_jurusan as id, jurusan as nama");
        $this->orderBy("jurusan", "ASC");

        $query = $this->get();
        return $query->getResult();
    }
}
