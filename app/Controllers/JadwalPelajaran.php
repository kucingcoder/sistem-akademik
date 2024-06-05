<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAmpuMapel;
use App\Models\ModelJadwal;
use App\Models\ModelKelas;
use App\Models\ModelSmtSkr;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class JadwalPelajaran extends BaseController
{
    function index()
    {
        $Tahun            = new ModelTASkr();
        $SemesterSekarang = new ModelSmtSkr();
        $Kelas            = new ModelKelas();
        $Jadwal           = new ModelJadwal();

        $DaftarKelas = $Kelas->KelasTersediaTanpaJurusan();
        $KelasPertama = $DaftarKelas[0]->kelas;

        $data = array(
            "Tahun"          => $Tahun->TahunAjaranSekarang(),
            "Semester"       => $SemesterSekarang->SemesterSekarang(),
            "DaftarKelas"    => $DaftarKelas,
            "KelasTerpilih"  => $KelasPertama,
            "JadwalTerpilih" => $Jadwal->JadwalKelas($KelasPertama)
        );

        return view("JadwalPelajaran", $data);
    }

    function JadwalKelas()
    {
        $Jadwal = new ModelJadwal();

        $Kelas = $this->request->getGet("kelas");

        $data = $Jadwal->JadwalKelas($Kelas);

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function DataEdit()
    {
        $AmpuMapel = new ModelAmpuMapel();

        $Kelas = $this->request->getGet("kelas");
        $Hari = $this->request->getGet("hari");

        $Jadwal = $AmpuMapel->JadwalKelasHari($Kelas, $Hari);
        $KodeJadwal = $AmpuMapel->DaftarKodeMapel($Kelas);

        $data = array(
            "daftar_jadwal" => $Jadwal,
            "daftar_kode"   => $KodeJadwal
        );

        $this->response->setHeader("Content-Type", "application/json");
        return json_encode($data);
    }

    function EditJadwal()
    {
        $Jadwal = new ModelJadwal();

        $DaftarJadwalBaru = $this->request->getJSON();

        $db = \Config\Database::connect();

        $db->transStart();

        foreach ($DaftarJadwalBaru as $JadwalBaru) {
            switch ($JadwalBaru->jam_ke) {
                case 1:
                    $Mulai = "07:20:00";
                    $Selesai = "08:00:00";
                    break;
                case 2:
                    $Mulai = "08:00:00";
                    $Selesai = "08:40:00";
                    break;
                case 3:
                    $Mulai = "08:40:00";
                    $Selesai = "09:20:00";
                    break;
                case 4:
                    $Mulai = "09:40:00";
                    $Selesai = "10:20:00";
                    break;
                case 5:
                    $Mulai = "10:20:00";
                    $Selesai = "11:00:00";
                    break;
                case 6:
                    $Mulai = "11:00:00";
                    $Selesai = "11:40:00";
                    break;
                case 7:
                    $Mulai = "12:20:00";
                    $Selesai = "13:00:00";
                    break;
                case 8:
                    $Mulai = "13:00:00";
                    $Selesai = "13:40:00";
                    break;
                case 9:
                    $Mulai = "13:40:00";
                    $Selesai = "14:20:00";
                    break;
                case 10:
                    $Mulai = "14:20:00";
                    $Selesai = "15:00:00";
                    break;
                default:
                    $Mulai = "00:00:00";
                    $Selesai = "00:00:00";
                    break;
            }

            if ($Jadwal->CekJadwal($JadwalBaru->kelas, $JadwalBaru->hari, $JadwalBaru->jam_ke) != null) {
                $db->query("UPDATE jadwal INNER JOIN hari ON jadwal.hari = hari.id_hari INNER JOIN ampu_mapel ON jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta INNER JOIN semester ON semester.id_semester = ampu_mapel.semester_id_semester INNER JOIN kelas ON ampu_mapel.kelas_id_kelas = kelas.id_kelas SET jadwal.ampu_mapel_id_ampu = ? WHERE tahun_akademik.mulai <= CURRENT_DATE AND tahun_akademik.sampai >= CURRENT_DATE AND semester_id_semester = (SELECT CASE WHEN MONTH(CURRENT_DATE) >= 7 THEN 1 ELSE 2 END) AND kelas.nama_kelas = ? AND hari.id_hari = ? AND jam_ke = ?", [$JadwalBaru->id_ampu, $JadwalBaru->kelas, $JadwalBaru->hari, $JadwalBaru->jam_ke]);
            } else {
                $db->query("INSERT INTO jadwal (hari, jam_ke, mulai, selesai, ampu_mapel_id_ampu) VALUES (?, ?, ?, ?, ?)", [$JadwalBaru->hari, $JadwalBaru->jam_ke, $Mulai, $Selesai, $JadwalBaru->id_ampu]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/jadwal-pelajaran");
    }
}
