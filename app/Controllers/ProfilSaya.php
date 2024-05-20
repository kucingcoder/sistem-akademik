<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAmpuMapel;
use App\Models\ModelDokumenGuru;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKomposisiKelas;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilSaya extends BaseController
{
    function index()
    {
        $Jadwal         = new ModelJadwal();
        $Dokumen        = new ModelDokumenGuru();
        $Guru           = new ModelGuru();
        $AmpuMapel      = new ModelAmpuMapel();
        $KomposisiKelas = new ModelKomposisiKelas();

        $nip = session()->get("nip");

        $JadwalHariIni   = $Jadwal->JadwalHariIni($nip);
        $DokumenSaya     = $Dokumen->Dokumentasi($nip);
        $Profil          = $Guru->Profil($nip);
        $Mapel           = $AmpuMapel->MataPelajaranDiampuProfil($nip);
        $RiwayatMengampu = $AmpuMapel->RiwayatMengampu($nip);
        $RiwayatWalkel   = $KomposisiKelas->RiwayatWaliKelas($nip);

        $data = array(
            "Nama"             => session()->get("nama"),
            "JadwalHariIni"    => $JadwalHariIni,
            "Dokumen"          => $DokumenSaya,
            "Profil"           => $Profil,
            "MataPelajaran"    => $Mapel,
            "RiwayatMengampu"  => $RiwayatMengampu,
            "RiwayatWaliKelas" => $RiwayatWalkel
        );

        return view("ProfilSaya", $data);
    }

    function UbahProfil()
    {
        $Guru = new ModelGuru();

        $Nip = session()->get("nip");
        $Nik = $this->request->getPost("Nik");
        $NamaLengkap = session()->get("nama");
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

            if ($Guru->UbahProfil($Nip, $Nik, $Gender, $Agama, $StatusPerkawinan, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $Kompetensi, $LulusanTahun, $AsalPerguruanTinggi, $Jabatan, $NamaFile)) {
                $Foto->move(ROOTPATH . "public/foto-profil", $NamaFile);

                $session = session();

                $ses_data = [
                    "nip"  => $Nip,
                    "nama" => $NamaLengkap,
                    "sesi" => TRUE
                ];
                $session->set($ses_data);

                $Hasil = [
                    "status"  => "200",
                    "message" => "Berhasil mengubah profil"
                ];
            } else {
                $Hasil = [
                    "status"  => "404",
                    "message" => "Gagal mengubah profil"
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

    function DeskripsiKelas()
    {
        $KomposisiKelas = new ModelKomposisiKelas();
        $Id_kelas = $this->request->getGet("id");
        $DeskripsiKelas = $KomposisiKelas->DeskripsiKelas($Id_kelas);

        if ($DeskripsiKelas["nama_kelas"] != null) {
            $data = [
                "kelas"        => $DeskripsiKelas["nama_kelas"],
                "wali_kelas"   => $DeskripsiKelas["walas"],
                "jumlah_siswa" => $DeskripsiKelas["jumlah"]
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function UbahUsernamePassword()
    {
        $Guru = new ModelGuru();

        $Data = $this->request->getJSON();

        $Username        = $Data->username;
        $Password        = $Data->password;
        $Confirmpassword = $Data->confirmpassword;

        if (empty($Username) || empty($Password) || empty($Confirmpassword)) {
            $Hasil = [
                "status"  => "403",
                "message" => "Masih ada data yang kosong"
            ];
        } else if ($Password != $Confirmpassword) {
            $Hasil = [
                "status"  => "403",
                "message" => "Password dengan Confirm Password berbeda"
            ];
        } else if ($Guru->UbahUsernamePassword(session()->get("nip"), $Username, $Password)) {
            $Hasil = [
                "status"  => "200",
                "message" => "Berhasil mengubah username dan password"
            ];
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($Hasil);
    }

    function TambahDokumen()
    {
        $Dokumen = new ModelDokumenGuru();

        $NamaDokumen      = $this->request->getPost("NamaDokumen");
        $DeskripsiDokumen = $this->request->getPost("DeskripsiDokumen");
        $FileDokumen      = $this->request->getFile("FileDokumen");

        if ($NamaDokumen != "" && $DeskripsiDokumen != "" && $FileDokumen != null && $FileDokumen->isValid()) {
            $NamaFile = $FileDokumen->getRandomName();
            if ($Dokumen->TambahDokumen(session()->get("nip"), $NamaDokumen, $DeskripsiDokumen, $NamaFile)) {
                $FileDokumen->move(ROOTPATH . "public/dokumen", $NamaFile);
            }
        }

        return redirect()->to("/profil");
    }

    function InfoDokumen()
    {
        $Dokumen   = new ModelDokumenGuru();
        $IdDokumen = $this->request->getGet("id");
        $Info      = $Dokumen->InfoDokumen($IdDokumen);

        if ($Info) {
            $data = [
                "nama"      => $Info["nama"],
                "deskripsi" => $Info["deskripsi"],
                "file"      => $Info["file"]
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }
}
