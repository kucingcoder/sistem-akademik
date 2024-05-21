<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDokumenSiswa;
use App\Models\ModelKomposisiKelas;
use App\Models\ModelSiswa;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilSiswa extends BaseController
{
    function index()
    {
        $Siswa   = new ModelSiswa();
        $Kelas   = new ModelKomposisiKelas();
        $Dokumen = new ModelDokumenSiswa();

        $NIS = $this->request->getGet("nis");

        $data = array(
            "Profil"       => $Siswa->Profil($NIS),
            "RiwayatKelas" => $Kelas->RiwayatKelas($NIS),
            "Prestasi"     => $Dokumen->DaftarPrestasi($NIS)
        );

        return view("ProfilSiswaAktif", $data);
    }

    function MantanSiswa($Status)
    {
        if ($Status === "lulus") {
            $Jenis = "Lulusan";
        } else {
            $Jenis = "Siswa Dropout";
        }

        $Siswa   = new ModelSiswa();
        $Kelas   = new ModelKomposisiKelas();
        $Dokumen = new ModelDokumenSiswa();

        $NIS = $this->request->getGet("nis");

        $data = array(
            "Jenis"        => $Jenis,
            "Profil"       => $Siswa->Profil($NIS),
            "RiwayatKelas" => $Kelas->RiwayatKelas($NIS),
            "Prestasi"     => $Dokumen->DaftarPrestasi($NIS)
        );

        return view("ProfilMantanSiswa", $data);
    }

    function UbahProfil()
    {
        $Siswa = new ModelSiswa();

        $NisLama      = $this->request->getPost("NisLama");
        $Nis          = $this->request->getPost("Nis");
        $Nisn         = $this->request->getPost("Nisn");
        $NamaLengkap  = $this->request->getPost("NamaLengkap");
        $Gender       = $this->request->getPost("Gender");
        $Agama        = $this->request->getPost("Agama");
        $TempatLahir  = $this->request->getPost("TempatLahir");
        $TanggalLahir = $this->request->getPost("TanggalLahir");
        $NoTelp       = $this->request->getPost("NoTelp");
        $Email        = $this->request->getPost("Email");
        $Alamat       = $this->request->getPost("Alamat");
        $AsalSekolah  = $this->request->getPost("AsalSekolah");
        $NilaiUjian   = $this->request->getPost("NilaiUjian");
        $TahunLulus   = $this->request->getPost("TahunLulus");
        $NamaAyah     = $this->request->getPost("NamaAyah");
        $NamaIbu      = $this->request->getPost("NamaIbu");
        $NoTelpAyah   = $this->request->getPost("NoTelpAyah");
        $NoTelpIbu    = $this->request->getPost("NoTelpIbu");
        $KerjaAyah    = $this->request->getPost("KerjaAyah");
        $KerjaIbu     = $this->request->getPost("KerjaIbu");
        $Foto         = $this->request->getFile("Foto");

        if (!empty($NisLama) && !empty($Nis) && !empty($Nisn) && !empty($NamaLengkap) && !empty($Gender) && !empty($Agama) && !empty($TempatLahir) && !empty($TanggalLahir) && !empty($NoTelp) && !empty($Email) && !empty($Alamat) && !empty($AsalSekolah) && !empty($NilaiUjian) && !empty($TahunLulus) && !empty($NamaAyah) && !empty($NamaIbu) && !empty($NoTelpAyah) && !empty($NoTelpIbu) && !empty($KerjaAyah) && !empty($KerjaIbu) && $Foto != null && $Foto->isValid()) {
            $NamaFile = $Foto->getRandomName();

            if ($Siswa->UbahProfil($NisLama, $Nis, $Nisn, $NamaLengkap, $Gender, $Agama, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $AsalSekolah, $NilaiUjian, $TahunLulus, $NamaAyah, $NamaIbu, $NoTelpAyah, $NoTelpIbu, $KerjaAyah, $KerjaIbu, $NamaFile)) {
                $Foto->move(WRITEPATH . "uploads/picture", $NamaFile);

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

    function UbahUsernamePassword()
    {
        $Siswa = new ModelSiswa();

        $Data = $this->request->getJSON();

        $NIS             = $Data->nis;
        $Username        = $Data->username;
        $Password        = $Data->password;
        $Confirmpassword = $Data->confirmpassword;

        if (empty($NIS) || empty($Username) || empty($Password) || empty($Confirmpassword)) {
            $Hasil = [
                "status"  => "403",
                "message" => "Masih ada data yang kosong"
            ];
        } else if ($Password != $Confirmpassword) {
            $Hasil = [
                "status"  => "403",
                "message" => "Password dengan Confirm Password berbeda"
            ];
        } else if ($Siswa->UbahUsernamePassword($NIS, $Username, $Password)) {
            $Hasil = [
                "status"  => "200",
                "message" => "Berhasil mengubah username dan password"
            ];
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($Hasil);
    }

    function InfoPrestasi()
    {
        $Dokumen   = new ModelDokumenSiswa();
        $IdDokumen = $this->request->getGet("id");
        $Info      = $Dokumen->InfoPrestasi($IdDokumen);

        if ($Info) {
            $data = [
                "tanggal"   => $Info["tanggal"],
                "prestasi"  => $Info["prestasi"],
                "deskripsi" => $Info["deskripsi"],
                "file" => $Info["file"]
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function TambahPrestasi()
    {
        $Dokumen = new ModelDokumenSiswa();

        $NIS               = $this->request->getPost("NIS");
        $NamaPrestasi      = $this->request->getPost("NamaPrestasi");
        $DeskripsiPrestasi = $this->request->getPost("DeskripsiPrestasi");
        $FilePrestasi      = $this->request->getFile("FilePrestasi");

        if ($NamaPrestasi != "" && $DeskripsiPrestasi != "" && $FilePrestasi != null && $FilePrestasi->isValid()) {
            $NamaFile = $FilePrestasi->getRandomName();

            if ($Dokumen->TambahPrestasi($NIS, $NamaPrestasi, $DeskripsiPrestasi, $NamaFile)) {
                $FilePrestasi->move(ROOTPATH . "public/dokumen", $NamaFile);
            }
        }

        return redirect()->to("/profil-siswa?nis=" . $NIS);
    }
}
