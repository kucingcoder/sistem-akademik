<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTASkr extends Model
{
    protected $table = "ta_skr";

    public function TahunAjaranSekarang()
    {
        $row = $this->select("ta")->first();
        return $row["ta"];
    }
}
