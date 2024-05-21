<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDokumenGuru;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelSmtSkr;
use CodeIgniter\HTTP\ResponseInterface;

class Guru extends BaseController
{
    function index()
    {
        $Jadwal         = new ModelJadwal();
        $Kaldik         = new ModelKaldik();
        $Semester       = new ModelSmtSkr();
        $Guru           = new ModelGuru();

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
            "Kaldik"        => $DataKaldik,
            "GuruSemua"     => $Guru->DaftarSemuaJenis(),
            "GuruProduktif" => $Guru->DaftarJenis("P"),
            "GuruAdaptif"   => $Guru->DaftarJenis("A"),
            "GuruNormatif"  => $Guru->DaftarJenis("N")
        );

        return view("Guru", $data);
    }

    function InfoGuruBerhenti()
    {
        $Guru = new ModelGuru();
        $nip  = $this->request->getGet("nip");
        $Info = $Guru->InfoGuruBerhenti($nip);

        if ($Info) {
            $data = [
                "nip"           => $Info["nip"],
                "nik"           => $Info["nik"],
                "nama"          => $Info["nama"],
                "gender"        => $Info["gender"],
                "agama"         => $Info["agama"],
                "tempat_lahir"  => $Info["tempat_lahir"],
                "tanggal_lahir" => $Info["tanggal_lahir"],
                "alamat"        => $Info["alamat"],
                "kategori"      => $Info["kategori"],
                "kompetensi"    => $Info["kompetensi"],
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function GuruBerhenti()
    {
        $Guru        = new ModelGuru();
        $DokumenGuru = new ModelDokumenGuru();

        $NIP     = $this->request->getPost("NIP");
        $Status  = $this->request->getPost("Status");
        $Dokumen = $this->request->getFile("Dokumen");

        if ($NIP != "" && $Status != "" && $Dokumen != null && $Dokumen->isValid()) {
            $NamaFile = $Dokumen->getRandomName();
            $Guru->BerhentikanGuru($NIP, $Status);
            if ($DokumenGuru->TambahDokumen($NIP, "Dokumen non-aktif", "Dokumen yang diterbitkan untuk menonaktifkan guru", $NamaFile)) {
                $Dokumen->move(ROOTPATH . "public/dokumen", $NamaFile);
            }
        }

        return redirect()->to("/guru");
    }

    function TambahGuru()
    {
        $Guru = new ModelGuru();

        $Nip = $this->request->getPost("Nip");
        $Nik = $this->request->getPost("Nik");
        $NamaLengkap = $this->request->getPost("Nama");
        $Gender = $this->request->getPost("Gender");
        $Agama = $this->request->getPost("Agama");
        $StatusPerkawinan = $this->request->getPost("StatusPerkawinan");
        $TempatLahir = $this->request->getPost("TempatLahir");
        $TanggalLahir = $this->request->getPost("TanggalLahir");
        $NoTelp = $this->request->getPost("NoTelp");
        $Email = $this->request->getPost("Email");
        $Alamat = $this->request->getPost("Alamat");
        $Kompetensi = $this->request->getPost("Kompetensi");
        $LulusanTahun = $this->request->getPost("LulusanTahun");
        $AsalPerguruanTinggi = $this->request->getPost("AsalPerguruanTinggi");
        $Jabatan = $this->request->getPost("Jabatan");
        $Foto = $this->request->getFile("Foto");

        if (!empty($Nip) && !empty($Nik) && !empty($NamaLengkap) && !empty($Gender) && !empty($Agama) && !empty($StatusPerkawinan) && !empty($TempatLahir) && !empty($TanggalLahir) && !empty($NoTelp) && !empty($Email) && !empty($Alamat) && !empty($Kompetensi) && !empty($LulusanTahun) && !empty($AsalPerguruanTinggi) && !empty($Jabatan) && $Foto != null && $Foto->isValid()) {
            $NamaFile = $Foto->getRandomName();

            try {
                $Guru->TambahGuru($Nip, $Nik, $NamaLengkap, $Gender, $Agama, $StatusPerkawinan, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $Kompetensi, $LulusanTahun, $AsalPerguruanTinggi, $Jabatan, $NamaFile);
            } catch (\Throwable $th) {
                log_message("debug", $th);
            }

            if (false) {
                $Foto->move(ROOTPATH . "public/foto-profil", $NamaFile);

                $Hasil = [
                    "status"  => "200",
                    "message" => "Berhasil menambah guru"
                ];
            } else {
                $Hasil = [
                    "status"  => "404",
                    "message" => "Gagal menambah"
                ];
            }
        } else {
            $Hasil = [
                "status"  => "403",
                "message" => "Masih ada data yang kosong"
            ];
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($Hasil);
    }
}
