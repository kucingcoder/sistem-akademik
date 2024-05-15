<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKBM;
use App\Models\ModelSiswa;
use CodeIgniter\HTTP\ResponseInterface;

class PelaksanaanKBM extends BaseController
{
    public function index($input1, $input2, $input3)
    {
        $Jadwal = new ModelJadwal();
        $Siswa  = new ModelSiswa();
        $KBM    = new ModelKBM();

        $idKBM    =  str_replace(":", "", $input1 . date('d') . date('m') . date('Y') . $input2 . $input3);

        $Ada = $KBM->where('id_kbm', $idKBM)->countAllResults();

        $Presensi = false;

        if ($Ada > 0) {
            $Presensi = true;
        }

        $Info        = $Jadwal->PelaksanaanKBM($input1);
        $DaftarSiswa = $Siswa->DaftarSiswaDiKelas($Info["nama_kelas"]);

        $data = array(
            "Presensi"      => $Presensi,
            "Kode"          => $input1,
            "Mapel"         => $Info["nama_mapel"],
            "Kelas"         => $Info["nama_kelas"],
            "Mulai"         => $input2,
            "Sampai"        => $input3,
            "JumlahJam"     => $Info["jumlah_jam"],
            "Siswa"         => $DaftarSiswa
        );

        return view("PelaksanaanKBM", $data);
    }

    function SimpanAbsensi()
    {
        $Json = $this->request->getJSON();

        $idKBM        = str_replace(":", "", $Json->kode . date('d') . date('m') . date('Y') . $Json->mulai . $Json->sampai);
        $Tanggal      = date('Y-m-d');
        $Materi       = $Json->materi;
        $UraianMateri = $Json->uraian_materi;
        $IdAmpu       = $Json->kode;
        $Absensi      = $Json->absensi;

        $db = \Config\Database::connect();

        $db->transStart();

        $db->query("INSERT INTO kbm VALUES (?, ?, ?, ?, ?)", [$idKBM, $Tanggal, $Materi, $UraianMateri, $IdAmpu]);

        foreach ($Absensi as $Siswa) {
            $db->query("INSERT INTO kehadiran (kbm_id_kbm, siswa_nis, keterangan) VALUES (?, ?, ?)", [$idKBM, $Siswa->nis, $Siswa->kehadiran]);
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/kbm");
    }
}
