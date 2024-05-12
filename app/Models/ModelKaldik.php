<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaldik extends Model
{
    protected $table = "kaldik";

    public function DaftarKegiatan($semester)
    {
        $this->select(
            "CASE WHEN DATE_FORMAT(MIN(tanggal),'%d %b') = DATE_FORMAT(MAX(tanggal),'%d %b')
                THEN DATE_FORMAT(MAX(tanggal),'%d %b')
                ELSE CONCAT(DATE_FORMAT(MIN(tanggal),'%d %b'), ' - ', DATE_FORMAT(MAX(tanggal),'%d %b')) 
            END waktu, 
            kegiatan"
        );

        if ((date("n") <= 6 && $semester == 2) || (date("n") > 6 && $semester == 1)) {
            $this->where("tanggal >=", date("Y-m-d"));
        }

        $this->where("semester_id_semester", $semester);
        $this->groupBy("kegiatan");
        $this->orderBy("tanggal");
        $query = $this->get();
        return $query->getResult();
    }
}
