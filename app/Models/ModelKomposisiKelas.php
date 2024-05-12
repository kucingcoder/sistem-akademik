<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKomposisiKelas extends Model
{
    protected $table = "komposisi_kelas";

    function DataTingkat($tingkat)
    {
        $NilaiTingkat = [1, 2, 3];
        if (!in_array($tingkat, $NilaiTingkat)) {
            return [];
        }

        $this->select("COUNT(*)*100/(SELECT COUNT(*) FROM siswa WHERE status_id_status = 'A') as persen, COUNT(*) as jml, kelas.tingkat");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->join("siswa", "siswa.nis = komposisi_kelas.siswa_nis");
        $this->where("siswa.status_id_status", "A");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("kelas.tingkat", $tingkat);
        $this->groupBy("kelas.tingkat");

        $query = $this->get();
        return $query->getResult();
    }

    function DataSemuaTingkat()
    {
        $this->select("100 as persen, COUNT(*) as jml, 'Semua Tingkat' as tingkat");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->join("siswa", "siswa.nis = komposisi_kelas.siswa_nis");
        $this->where("siswa.status_id_status", "A");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));

        $query = $this->get();
        return $query->getResult();
    }

    function RiwayatWaliKelas($nip)
    {
        $this->select("tahun_akademik.ta, kelas.id_kelas, kelas.nama_kelas, COUNT(*) jumlah");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->join("guru", "kelas.guru_nip = guru.nip");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("guru.nip", $nip);

        $query = $this->get();

        if ($query->getNumRows() == 1 && is_null($query->getRow()->ta)) {
            return [];
        } else {
            return $query->getResult();
        }
    }

    function DeskripsiKelas($id_kelas)
    {
        $this->select('kelas.id_kelas, kelas.nama_kelas, guru.nama walas, COUNT(*) jumlah');
        $this->join('kelas', 'kelas.id_kelas = komposisi_kelas.kelas_id_kelas');
        $this->join('guru', 'kelas.guru_nip = guru.nip');
        $this->where('kelas.id_kelas', $id_kelas);

        return $this->first();
    }

    function RiwayatKelas($NIS)
    {
        $this->select("CASE kelas.tingkat WHEN 1 THEN 'Tingkat I' WHEN 2 THEN 'Tingkat II' ELSE 'Tingkat III' END AS tingkat, kelas.nama_kelas AS kelas");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->where("siswa_nis", $NIS);

        $query = $this->get();
        return $query->getResult();
    }
}
