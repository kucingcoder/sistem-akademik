<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelSmtSkr;
use CodeIgniter\HTTP\ResponseInterface;

class JadwalPelajaran extends BaseController
{
    function index()
    {
        $Jadwal         = new ModelJadwal();
        $Kaldik         = new ModelKaldik();
        $Semester       = new ModelSmtSkr();

        $JadwalHariIni = $Jadwal->JadwalHariIni(session()->get("nip"));

        $KaldikGanjil  = $Kaldik->DaftarKegiatan(1);
        $KaldikGenap   = $Kaldik->DaftarKegiatan(2);

        $NamaSemester  = $Semester->SemesterSekarang();

        $DataKaldik = array(
            "Ganjil"   => $KaldikGanjil,
            "Genap"    => $KaldikGenap,
            "Semester" => $NamaSemester
        );

        $data = array(
            "JadwalHariIni" => $JadwalHariIni,
            "Kaldik"        => $DataKaldik
        );

        return view("JadwalPelajaran", $data);
    }
}
