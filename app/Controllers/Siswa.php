<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDokumenSiswa;
use App\Models\ModelJadwal;
use App\Models\ModelJurusan;
use App\Models\ModelKaldik;
use App\Models\ModelSiswa;
use App\Models\ModelSmtSkr;
use CodeIgniter\HTTP\ResponseInterface;
use Shuchkin\SimpleXLSX;

class Siswa extends BaseController
{
    function index()
    {
        $Jadwal   = new ModelJadwal();
        $Kaldik   = new ModelKaldik();
        $Semester = new ModelSmtSkr();
        $Jurusan  = new ModelJurusan();
        $Siswa    = new ModelSiswa();

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
            "DaftarJurusan" => $Jurusan->DaftarJurusan(),
            "SiswaAktif"    => $Siswa->DaftarSiswaAktif()
        );

        return view("SiswaAktif", $data);
    }

    function TambahSiswa()
    {
        $Siswa = new ModelSiswa();

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
        $Jurusan      = $this->request->getPost("Jurusan");
        $Foto         = $this->request->getFile("Foto");

        $NamaFile = $Foto->getRandomName();

        if ($Siswa->TambahSiswa($Nis, $Nisn, $NamaLengkap, $Gender, $Agama, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $AsalSekolah, $NilaiUjian, $TahunLulus, $NamaAyah, $NamaIbu, $NoTelpAyah, $NoTelpIbu, $KerjaAyah, $KerjaIbu, $NamaFile, $Jurusan)) {
            $Foto->move(ROOTPATH . "public/foto-profil", $NamaFile);
        }

        return redirect()->to("/siswa");
    }

    function TambahSiswaMasal()
    {
        $File = $this->request->getFile("File");
        $NamaFile = $File->getRandomName();

        $File->move(ROOTPATH . "public/dokumen", $NamaFile);

        if ($xlsx = SimpleXLSX::parse(ROOTPATH . "public/dokumen/" . $NamaFile)) {
            $rows = $xlsx->rows();

            $db = \Config\Database::connect();

            $db->transStart();

            foreach ($rows as $index => $row) {
                if ($index === 0) {
                    continue;
                }

                $db->query("INSERT INTO siswa (nis, nisn, nama, jenis_kelamin_id_jk, agama_id_agama, tempat_lahir, tanggal_lahir, no_hp, email, alamat_domisili, sekolah_asal, nilai_smp, tahun_lulus, nama_ayah, nama_ibu, hp_ayah, hp_ibu, kerja_ayah, kerja_ibu, jurusan_id_jurusan, status_id_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 'A')", [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19]]);
            }

            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                $db->transRollback();
            } else {
                $db->transCommit();
            }

            unlink(ROOTPATH . "public/dokumen/" . $NamaFile);
        } else {
            log_message("debug", SimpleXLSX::parseError());
        }

        return redirect()->to("/siswa");
    }

    function SiswaLulus()
    {
        $Jadwal   = new ModelJadwal();
        $Kaldik   = new ModelKaldik();
        $Semester = new ModelSmtSkr();
        $Siswa    = new ModelSiswa();

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
            "SiswaLulus"    => $Siswa->DaftarSiswaLulus(),
            "SiswaMauLulus" => $Siswa->DaftarSiswaMauLulus()
        );

        return view("SiswaLulus", $data);
    }

    function Luluskan()
    {
        $Siswa    = new ModelSiswa();

        $Kecuali = $this->request->getJSON();

        $CalonLulusan = $Siswa->DaftarSiswaMauLulus();

        $db = \Config\Database::connect();

        $db->transStart();

        foreach ($CalonLulusan as $Anak) {
            if (!in_array($Anak->nis, $Kecuali)) {
                $db->query("UPDATE siswa SET status_id_status = 'L', lulus_tahun = ?  WHERE nis = ?", [date("Y"), $Anak->nis]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/siswa-lulus");
    }

    function SiswaDO()
    {
        $Jadwal   = new ModelJadwal();
        $Kaldik   = new ModelKaldik();
        $Semester = new ModelSmtSkr();
        $Siswa    = new ModelSiswa();

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
            "SiswaDO"       => $Siswa->DaftarSiswaDropOut()
        );

        return view("SiswaDropOut", $data);
    }

    function InfoSiswaDO()
    {
        $Siswa = new ModelSiswa();
        $NIS   = $this->request->getGet("nis");
        $Info  = $Siswa->InfoSiswaDO($NIS);

        if ($Info) {
            $data = [
                "nis"           => $Info["nis"],
                "nisn"          => $Info["nisn"],
                "asal_sekolah"  => $Info["asal_sekolah"],
                "kelas"         => $Info["kelas"],
                "nama"          => $Info["nama"],
                "gender"        => $Info["gender"],
                "agama"         => $Info["agama"],
                "tempat_lahir"  => $Info["tempat_lahir"],
                "tanggal_lahir" => $Info["tanggal_lahir"],
                "alamat"        => $Info["alamat"],
                "nama_ayah"     => $Info["nama_ayah"],
                "no_telp_ayah"  => $Info["no_telp_ayah"],
                "nama_ibu"      => $Info["nama_ibu"],
                "no_telp_ibu"   => $Info["no_telp_ibu"]
            ];
        } else {
            $data = null;
        }

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function DOSiswa()
    {
        $Siswa = new ModelSiswa();
        $DokumenSiswa = new ModelDokumenSiswa();

        $NIS     = $this->request->getPost("NIS");
        $Status  = $this->request->getPost("Status");
        $Dokumen = $this->request->getFile("Dokumen");

        if ($NIS != "" && $Status != "" && $Dokumen != null && $Dokumen->isValid()) {
            $NamaFile = $Dokumen->getRandomName();

            if ($DokumenSiswa->TambahDokumen($NIS, "Surat Keluar Sekolah", "Dokumen yang menjelaskan alasan keluar sekolah", $NamaFile) && $Siswa->DOSiswa($NIS, $Status)) {
                $Dokumen->move(ROOTPATH . "public/dokumen", $NamaFile);
            }
        }

        return redirect()->to("/siswa");
    }
}
