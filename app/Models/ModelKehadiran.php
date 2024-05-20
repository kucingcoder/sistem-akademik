<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKehadiran extends Model
{
    protected $table = "kehadiran";
    protected $allowedFields = ['keterangan'];

    function KehadiranSiswa($kbm_id)
    {
        $this->select("siswa.nis, siswa.nama, siswa.jenis_kelamin_id_jk AS gender, kehadiran.keterangan");
        $this->join("siswa", "kehadiran.siswa_nis = siswa.nis");
        $this->where("kehadiran.kbm_id_kbm", $kbm_id);
        $this->orderBy("siswa.nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }

    public function UbahKehadiranSiswa($daftar_perubahan)
    {
        if (empty($daftar_perubahan)) {
            return true;
        }

        foreach ($daftar_perubahan as $perubahan) {
            $this->set('keterangan', $perubahan->keterangan);
            $this->where('kbm_id_kbm', $perubahan->id_kbm);
            $this->where('siswa_nis', $perubahan->nis);
            $this->update();
        }

        return true;
    }
}
