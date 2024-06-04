<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAmpuMapel;
use App\Models\ModelGuru;
use App\Models\ModelKelas;
use App\Models\ModelMataPelajaran;
use App\Models\ModelSmtSkr;
use App\Models\ModelTahunAkademik;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class AmpuMapel extends BaseController
{
    function index()
    {
        $AmpuMapel        = new ModelAmpuMapel();
        $Tahun            = new ModelTASkr();
        $SemesterSekarang = new ModelSmtSkr();
        $MataPelajaran    = new ModelMataPelajaran();
        $Guru             = new ModelGuru();
        $Kelas            = new ModelKelas();

        $data = array(
            "Tahun"         => $Tahun->TahunAjaranSekarang(),
            "Semester"      => $SemesterSekarang->SemesterSekarang(),
            "DaftarMapel"   => $AmpuMapel->DaftarPengampuMapel(),
            "MapelTersedia" => $MataPelajaran->DaftarMapelSimpel(),
            "DaftarGuru"    => $Guru->DaftarGuru(),
            "DaftarKelas"   => $Kelas->KelasTersediaTanpaJurusan()
        );

        return view("AmpuMapel", $data);
    }

    function TambahAmpu()
    {
        $AmpuMapel = new ModelAmpuMapel();
        $TA        = new ModelTahunAkademik();

        $Inisial = $this->request->getGet("inisial");
        $IdMapel = $this->request->getGet("mapel");
        $IdTa    = $TA->IdTaSekarang();
        $Idkelas = $this->request->getGet("kelas");
        $JumlahJam = $this->request->getGet("jam");

        $AmpuMapel->TambahAmpuMapel($Inisial, $IdMapel, $IdTa["id_ta"], $Idkelas, $JumlahJam);

        return redirect()->to("/ampu-mapel");
    }

    function HapusAmpu()
    {
        $AmpuMapel = new ModelAmpuMapel();

        $Id = $this->request->getGet("id");

        $AmpuMapel->HapusAmpuMapel($Id);

        return redirect()->to("/ampu-mapel");
    }
}
