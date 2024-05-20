<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAmpuMapel;
use App\Models\ModelDetilNilai;
use App\Models\ModelJadwal;
use App\Models\ModelKaldik;
use App\Models\ModelKBM;
use App\Models\ModelKehadiran;
use App\Models\ModelSiswa;
use App\Models\ModelSmtSkr;
use App\Models\ModelTASkr;
use App\Models\ModelTugas;
use CodeIgniter\HTTP\ResponseInterface;

class KBM extends BaseController
{
    public function index()
    {
        $Jadwal   = new ModelJadwal();
        $Kaldik   = new ModelKaldik();
        $Mapel    = new ModelAmpuMapel();
        $Tahun    = new ModelTASkr();
        $Semester = new ModelSmtSkr();

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
            "TahunAjaran"   => $Tahun->TahunAjaranSekarang(),
            "MataPelajaran" => $Mapel->MataPelajaranDiampu(session()->get("nip"))
        );

        return view("KBM", $data);
    }

    function Pertemuan()
    {
        $KBM = new ModelKBM();

        $nip   = session()->get("nip");
        $kelas = $this->request->getGet("kelas");
        $mapel = $this->request->getGet("mapel");

        $data = $KBM->Pertemuan($nip, $kelas, $mapel);

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }

    function DetailPertemuan()
    {
        $KBM = new ModelKBM();
        $id = $this->request->getGet("id");

        $data = $KBM->DetailPertemuan($id);

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }

    function Kehadiran()
    {
        $Absen = new ModelKehadiran();
        $id = $this->request->getGet("id");

        $data = $Absen->KehadiranSiswa($id);

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }

    function Updatekehadiran()
    {
        $DaftarPerubahan = $this->request->getJSON();
        $Absen = new ModelKehadiran();

        if ($Absen->UbahKehadiranSiswa($DaftarPerubahan)) {
            return $this->response->setStatusCode(200);
        } else {
            return $this->response->setStatusCode(404);
        }
    }

    function Penugasan()
    {
        $Tugas = new ModelTugas();

        $kelas = $this->request->getGet("kelas");
        $mapel = $this->request->getGet("mapel");

        $data = $Tugas->DaftarTugas($kelas, $mapel);

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }

    function DetailTugas()
    {
        $Tugas = new ModelTugas();
        $id = $this->request->getGet("id");

        $data = $Tugas->DetailTugas($id);

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }

    function TambahTugas()
    {
        $Tugas = new ModelTugas();

        $Nama   = $this->request->getVar("TambahTugas-Nama");
        $Uraian = $this->request->getVar("TambahTugas-Uraian");
        $Kelas  = $this->request->getVar("KelasTugas");
        $Mapel  = $this->request->getVar("MapelTugas");

        $Tugas->TambahTugas($Nama, $Uraian, $Kelas, $Mapel);

        return redirect()->to("/kbm");
    }

    function DaftarNilaiTugas()
    {
        $id_tugas = $this->request->getGet("id");
        $kelas    = $this->request->getGet("kelas");
        $mapel    = $this->request->getGet("mapel");

        $DetilNilai = new ModelDetilNilai();

        $data = $DetilNilai->DaftarNilaiTugas($id_tugas, $kelas, $mapel);

        if (count($data) == 0) {
            $Siswa = new ModelSiswa();
            $data = $Siswa->DaftarNilai($kelas);
        }

        $this->response->setHeader("Content-Type", "application/json");
        return $this->response->setJSON($data);
    }
}
