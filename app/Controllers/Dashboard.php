<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelKelas;
use App\Models\ModelKomposisiKelas;
use App\Models\ModelMataPelajaran;
use App\Models\ModelSmtSkr;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class Dashboard extends BaseController
{
    public function index()
    {
        $Jadwal         = new ModelJadwal();
        $KomposisiKelas = new ModelKomposisiKelas();
        $Guru           = new ModelGuru();
        $Kelas          = new ModelKelas();
        $Mapel          = new ModelMataPelajaran();
        $Kaldik         = new ModelKaldik();
        $Semester       = new ModelSmtSkr();

        $JadwalHariIni = $Jadwal->JadwalHariIni(session()->get("nip"));

        $KaldikGanjil  = $Kaldik->DaftarKegiatan(1);
        $KaldikGenap   = $Kaldik->DaftarKegiatan(2);

        $NamaSemester  = $Semester->SemesterSekarang();

        $SiswaTingkat1 = $KomposisiKelas->DataTingkat(1);
        $SiswaTingkat2 = $KomposisiKelas->DataTingkat(2);
        $SiswaTingkat3 = $KomposisiKelas->DataTingkat(3);
        $SiswaSemua    = $KomposisiKelas->DataSemuaTingkat();

        $GuruNormatif  = $Guru->DataJenis("N");
        $GuruProduktif = $Guru->DataJenis("P");
        $GuruAdaptif   = $Guru->DataJenis("A");
        $GuruSemua     = $Guru->DataSemuaJenis();

        $KelasTingkat1 = $Kelas->DataTingkat(1);
        $KelasTingkat2 = $Kelas->DataTingkat(2);
        $KelasTingkat3 = $Kelas->DataTingkat(3);
        $KelasSemua    = $Kelas->DataSemuaTingkat();

        $MapelNormatif  = $Mapel->DataJenis("N");
        $MapelProduktif = $Mapel->DataJenis("P");
        $MapelAdaptif   = $Mapel->DataJenis("A");
        $MapelSemua     = $Mapel->DataSemuaJenis();

        $DataKaldik = array(
            "Ganjil"   => $KaldikGanjil,
            "Genap"    => $KaldikGenap,
            "Semester" => $NamaSemester
        );

        $DataSiswa = array(
            "I"     => $SiswaTingkat1,
            "II"    => $SiswaTingkat2,
            "III"   => $SiswaTingkat3,
            "Semua" => $SiswaSemua
        );

        $DataGuru = array(
            "Normatif"  => $GuruNormatif,
            "Produktif" => $GuruProduktif,
            "Adaptif"   => $GuruAdaptif,
            "Semua"     => $GuruSemua
        );

        $DataKelas =  array(
            "I"     => $KelasTingkat1,
            "II"    => $KelasTingkat2,
            "III"   => $KelasTingkat3,
            "Semua" => $KelasSemua
        );

        $DataMapel = array(
            "Normatif"  => $MapelNormatif,
            "Produktif" => $MapelProduktif,
            "Adaptif"   => $MapelAdaptif,
            "Semua"     => $MapelSemua
        );

        $data = array(
            "Nama"          => session()->get("nama"),
            "Jabatan"       => session()->get("jabatan") . " ",
            "Jenis"         => session()->get("jenis"),
            "Foto"          => session()->get("foto"),
            "JadwalHariIni" => $JadwalHariIni,
            "Kaldik"        => $DataKaldik,
            "Siswa"         => $DataSiswa,
            "Guru"          => $DataGuru,
            "Kelas"         => $DataKelas,
            "MataPelajaran" => $DataMapel
        );

        return view("Dashboard", $data);
    }
}
