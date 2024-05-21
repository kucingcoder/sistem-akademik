<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelJurusan;
use App\Models\ModelKaldik;
use App\Models\ModelKelas;
use App\Models\ModelKomposisiKelas;
use App\Models\ModelSiswa;
use App\Models\ModelSmtSkr;
use App\Models\ModelTahunAkademik;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class Kelas extends BaseController
{
    function index()
    {
        $Jadwal        = new ModelJadwal();
        $Kaldik        = new ModelKaldik();
        $Tahun         = new ModelTASkr();
        $Semester      = new ModelSmtSkr();
        $Jurusan       = new ModelJurusan();
        $TahunAkademik = new ModelTahunAkademik();
        $Kelas         = new ModelKelas();
        $Guru          = new ModelGuru();

        $JadwalHariIni = $Jadwal->JadwalHariIni(session()->get("nip"));

        $KaldikGanjil  = $Kaldik->DaftarKegiatan(1);
        $KaldikGenap   = $Kaldik->DaftarKegiatan(2);

        $NamaSemester  = $Semester->SemesterSekarang();

        $DaftarTA      = $TahunAkademik->DaftarTahunAkademik();
        $DaftarKelas   = $Kelas->DaftarKelasSekarang();
        $DaftarJurusan = $Jurusan->DaftarJurusan();
        $DaftarGuru    = $Guru->DaftarGuru();

        $DataKaldik = array(
            "Ganjil"   => $KaldikGanjil,
            "Genap"    => $KaldikGenap,
            "Semester" => $NamaSemester
        );

        $data = array(
            "JadwalHariIni" => $JadwalHariIni,
            "Kaldik"        => $DataKaldik,
            "TahunAjaran"   => $Tahun->TahunAjaranSekarang(),
            "DaftarTA"      => $DaftarTA,
            "DaftarKelas"   => $DaftarKelas,
            "DaftarJurusan" => $DaftarJurusan,
            "DaftarGuru"    => $DaftarGuru
        );

        return view("kelas", $data);
    }

    function DaftarKelas()
    {
        $Kelas = new ModelKelas();

        $Mulai  = $this->request->getGet("mulai");
        $Sampai = $this->request->getGet("sampai");

        $data = $Kelas->DaftarKelas($Mulai, $Sampai);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function DaftarSiswaCalonPenghuniKelas()
    {
        $Siswa = new ModelSiswa();

        $Id  = $this->request->getGet("id");

        $data = $Siswa->CalonKelas($Id);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function KomposisiKelas()
    {
        $Siswa = new ModelSiswa();

        $Id  = $this->request->getGet("id");

        $data = $Siswa->KomposisiKelas($Id);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function InfoPerpindahan()
    {
        $Kelas = new ModelKelas();
        $KomposisiKelas = new ModelKomposisiKelas();

        $Nis  = $this->request->getGet("nis");
        $Kode = $this->request->getGet("kode");

        $data = $KomposisiKelas->InfoKelasSebelumya($Kode);
        $data["daftar_kelas"] = $Kelas->KelasTersedia($Nis);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function TambahKelas()
    {
        $Kelas = new ModelKelas();

        $Data = $this->request->getJSON();

        $Kelas->TambahKelas($Data);

        return redirect()->to("/kelas");
    }

    function HapusSiswaDariKelas()
    {
        $KomposisiKelas = new ModelKomposisiKelas();

        $Kode = $this->request->getGet("kode");

        $KomposisiKelas->HapusSiswaDariKelas($Kode);

        return redirect()->to("/kelas");
    }

    function PindahKelas()
    {
        $KomposisiKelas = new ModelKomposisiKelas();

        $Kode = $this->request->getGet("kode");
        $Id = $this->request->getGet("id");

        $KomposisiKelas->PindahKelas($Kode, $Id);

        return redirect()->to("/kelas");
    }

    function BeriKelas()
    {
        $IdKelas  = $this->request->getGet("id");
        $DaftarNis = $this->request->getJSON();

        $db = \Config\Database::connect();

        $db->transStart();

        foreach ($DaftarNis as $Nis) {
            $db->query("INSERT INTO komposisi_kelas (siswa_nis, kelas_id_kelas) VALUES (?, ?)", [$Nis, $IdKelas]);
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/kelas");
    }
}
