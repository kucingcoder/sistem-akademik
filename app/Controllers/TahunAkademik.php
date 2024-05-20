<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelSmtSkr;
use App\Models\ModelTahunAkademik;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class TahunAkademik extends BaseController
{
    function index()
    {
        if ($this->request->getGet("aksi") == "tambah") {
            $TahunAjaran = new ModelTahunAkademik();
            $TahunAjaran->TambahTahunAkademik();

            return redirect()->to("/tahun-akademik");
        } elseif ($this->request->getGet("aksi") == "lihat") {
            $TahunAjaran = new ModelTahunAkademik();
            $data = $TahunAjaran->TahunAkademikSelanjutnya();
            $this->response->setHeader("Content-Type", "application/json");
            return $this->response->setJSON($data);
        } else {
            $Jadwal   = new ModelJadwal();
            $Kaldik   = new ModelKaldik();
            $Akademik = new ModelTahunAkademik();
            $Tahun    = new ModelTASkr();
            $Semester = new ModelSmtSkr();

            $JadwalHariIni = $Jadwal->JadwalHariIni(session()->get("nip"));

            $KaldikGanjil  = $Kaldik->DaftarKegiatan(1);
            $KaldikGenap   = $Kaldik->DaftarKegiatan(2);

            $NamaSemester = $Semester->SemesterSekarang();

            $DataKaldik = array(
                "Ganjil"   => $KaldikGanjil,
                "Genap"    => $KaldikGenap,
                "Semester" => $NamaSemester
            );

            $data = array(
                "Nama"          => session()->get("nama"),
                "JadwalHariIni" => $JadwalHariIni,
                "Kaldik"        => $DataKaldik,
                "TahunAjaran"   => $Tahun->TahunAjaranSekarang(),
                "DaftarTahun"   => $Akademik->DaftarTahunAkademik()
            );
            return view("TahunAkademik", $data);
        }
    }
}
