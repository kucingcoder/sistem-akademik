<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSmtSkr extends Model
{
    protected $table = "smt_skr";

    public function SemesterSekarang()
    {
        $row = $this->select("semester")->first();
        return $row["semester"];
    }
}
