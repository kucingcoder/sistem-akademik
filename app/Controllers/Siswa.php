<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelJurusan;
use App\Models\ModelKaldik;
use App\Models\ModelSiswa;
use App\Models\ModelSmtSkr;
use CodeIgniter\HTTP\ResponseInterface;

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
                $db->query("UPDATE siswa SET status_id_status = 'L' WHERE nis = ?", [$Anak->nis]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/siswa");
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

        $NIS    = $this->request->getPost("NIS");
        $Status = $this->request->getPost("Status");

        if ($NIS != "" && $Status != "") {
            $Siswa->DOSiswa($NIS, $Status);
        }

        return redirect()->to("/siswa");
    }
}
