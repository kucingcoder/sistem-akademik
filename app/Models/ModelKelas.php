<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    protected $table = "kelas";
    protected $allowedFields = ["guru_nip", "nama_kelas", "jurusan_id_jurusan", "tingkat"];

    function DataTingkat($tingkat)
    {
        $NilaiTingkat = [1, 2, 3];
        if (!in_array($tingkat, $NilaiTingkat)) {
            return [];
        }

        $this->select("COUNT(*) * 100 / (SELECT COUNT(*) FROM kelas INNER JOIN tahun_akademik ON tahun_akademik.id_ta = kelas.tahun_akademik_id_ta WHERE tahun_akademik.mulai <= CURRENT_DATE AND tahun_akademik.sampai >= CURRENT_DATE) as persen, COUNT(*) as jml, tingkat");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <= CURRENT_DATE");
        $this->where("tahun_akademik.sampai >= CURRENT_DATE");
        $this->where("tingkat", $tingkat);


        $query = $this->get();
        return $query->getResult();
    }

    function DataSemuaTingkat()
    {
        $this->select("100 as persen, COUNT(*) as jml, 'Semua Tingkat' as tingkat");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarKelasSekarang()
    {
        $this->select("kelas.id_kelas, kelas.nama_kelas, guru.nama AS wali_kelas, SUM(CASE WHEN siswa_nis IS NOT NULL THEN 1 ELSE 0 END) AS jml_siswa, jurusan_id_jurusan as id_jurusan");
        $this->join("komposisi_kelas", "komposisi_kelas.kelas_id_kelas = kelas.id_kelas", "left");
        $this->join("guru", "guru.nip = kelas.guru_nip", "inner");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta", "inner");
        $this->where("tahun_akademik.id_ta = (SELECT tahun_akademik.id_ta FROM tahun_akademik WHERE tahun_akademik.mulai <= CURRENT_DATE AND tahun_akademik.sampai >= CURRENT_DATE)", NULL, FALSE);
        $this->groupBy("kelas.id_kelas, kelas.nama_kelas, guru.nama");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarKelas($Mulai, $Sampai)
    {
        $this->select("kelas.id_kelas, kelas.nama_kelas, guru.nama AS wali_kelas, SUM(CASE WHEN siswa_nis IS NOT NULL THEN 1 ELSE 0 END) AS jml_siswa, jurusan_id_jurusan as id_jurusan");
        $this->join("komposisi_kelas", "komposisi_kelas.kelas_id_kelas = kelas.id_kelas", "left");
        $this->join("guru", "guru.nip = kelas.guru_nip", "inner");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta", "inner");
        $this->where("tahun_akademik.id_ta = (SELECT tahun_akademik.id_ta FROM tahun_akademik WHERE tahun_akademik.mulai <= " . $this->escape($Mulai) . " AND tahun_akademik.sampai >= " . $this->escape($Sampai) . ")");
        $this->groupBy("kelas.id_kelas, kelas.nama_kelas, guru.nama");

        $query = $this->get();
        return $query->getResult();
    }

    function KelasTersedia($Nis)
    {
        $this->select("kelas.id_kelas, nama_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", "CURRENT_DATE()", FALSE);
        $this->where("tahun_akademik.sampai >=", "CURRENT_DATE()", FALSE);
        $this->where("jurusan_id_jurusan", "(SELECT siswa.jurusan_id_jurusan FROM siswa WHERE siswa.nis = '" . $Nis . "')", FALSE);

        $query = $this->get();
        return $query->getResult();
    }

    function TambahKelas($Data)
    {
        return $this->insert($Data);
    }
}
