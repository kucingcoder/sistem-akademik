<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMataPelajaran;
use App\Models\ModelSmtSkr;
use App\Models\ModelTASkr;
use CodeIgniter\HTTP\ResponseInterface;

class TetapkanMapel extends BaseController
{
    function index()
    {
        $Tahun            = new ModelTASkr();
        $SemesterSekarang = new ModelSmtSkr();
        $MataPelajaran    = new ModelMataPelajaran();

        $data = array(
            "Tahun"               => $Tahun->TahunAjaranSekarang(),
            "Semester"            => $SemesterSekarang->SemesterSekarang(),
            "DaftarMapel"         => $MataPelajaran->DaftarMapelAktif(),
            "DaftarMapelNonAktif" => $MataPelajaran->DaftarMapelTidakAktif()
        );

        return view("TetapkanMapel", $data);
    }

    function AktifkanMapel()
    {
        $DaftarIdMapel = $this->request->getJSON();

        $db = \Config\Database::connect();

        $db->transStart();

        foreach ($DaftarIdMapel as $Mapel) {
            $db->query("UPDATE mata_pelajaran SET status = 1 WHERE id_mapel = ?", [$Mapel]);
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
        } else {
            $db->transCommit();
        }

        return redirect()->to("/tetapkan-mapel");
    }

    function NonAktifkanMapel()
    {
        $Mapel = new ModelMataPelajaran();

        $Id = $this->request->getGet("id");

        $Mapel->NonAktifkanMapel($Id);

        return redirect()->to("/tetapkan-mapel");
    }
}
