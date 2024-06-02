<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAmpuMapel;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelMataPelajaran;
use App\Models\ModelSemester;
use App\Models\ModelSmtSkr;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class MataPelajaran extends BaseController
{
    function index()
    {
        $Jadwal           = new ModelJadwal();
        $Kaldik           = new ModelKaldik();
        $Tahun            = new ModelTASkr();
        $SemesterSekarang = new ModelSmtSkr();
        $Semester         = new ModelSemester();
        $Mapel            = new ModelMataPelajaran();

        $JadwalHariIni = $Jadwal->JadwalHariIni(session()->get("nip"));

        $KaldikGanjil  = $Kaldik->DaftarKegiatan(1);
        $KaldikGenap   = $Kaldik->DaftarKegiatan(2);

        $NamaSemester  = $SemesterSekarang->SemesterSekarang();

        $DataKaldik = array(
            "Ganjil"   => $KaldikGanjil,
            "Genap"    => $KaldikGenap,
            "Semester" => $NamaSemester
        );

        $DaftarSemester = $Semester->DaftarSemester();

        $DaftarMapel    = $Mapel->DaftarMapel();

        $data = array(
            "JadwalHariIni"  => $JadwalHariIni,
            "Kaldik"         => $DataKaldik,
            "TahunAjaran"    => $Tahun->TahunAjaranSekarang(),
            "DaftarSemester" => $DaftarSemester,
            "DaftarMapel"    => $DaftarMapel
        );

        return view("MataPelajaran", $data);
    }

    function DaftarMapel()
    {
        $Mapel = new ModelMataPelajaran();
        $Ta = $this->request->getGet("ta");
        $Smt = $this->request->getGet("smt");

        $data = $Mapel->DaftarMapelSpesifik($Ta, $Smt);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function DetailMapel()
    {
        $Mapel = new ModelMataPelajaran();
        $Id = $this->request->getGet("id");

        $Info = $Mapel->InfoMapel($Id);
        if ($Info) {
            $data = [
                "nama"      => $Info["nama_mapel"],
                "kategori"  => $Info["kategori"],
                "deskripsi" => $Info["deskripsi"]
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function GuruPengampu()
    {
        $AmpuMapel = new ModelAmpuMapel();
        $Id = $this->request->getGet("id");

        $data = $AmpuMapel->GuruPengampu($Id);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }
}
