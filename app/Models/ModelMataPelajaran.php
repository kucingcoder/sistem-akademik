<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMataPelajaran extends Model
{
    protected $table = "mata_pelajaran";

    function DataJenis($jenis)
    {
        $NilaiJenis = ["P", "A", "N"];
        if (!in_array($jenis, $NilaiJenis)) {
            return [];
        }

        $subQuery = "
            SELECT COUNT(DISTINCT(mata_pelajaran_id_mapel)) AS sub_count
            FROM ampu_mapel
            INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta
            WHERE tahun_akademik.mulai <= CURRENT_DATE
            AND tahun_akademik.sampai >= CURRENT_DATE
            AND semester_id_semester = 1
        ";

        $subResult = $this->db->query($subQuery)->getRow();
        $subCount = $subResult ? $subResult->sub_count : 0;

        $mainQuery = "
            SELECT COUNT(DISTINCT(mata_pelajaran.id_mapel))*100 / {$subCount} AS persen, COUNT(DISTINCT(mata_pelajaran.id_mapel)) AS jml, kategori.status
            FROM ampu_mapel
            INNER JOIN mata_pelajaran ON mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel
            INNER JOIN kategori ON mata_pelajaran.kategori_id_kategori = kategori.id_kategori
            INNER JOIN tahun_akademik ON tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta
            INNER JOIN semester ON semester.id_semester = ampu_mapel.semester_id_semester
            WHERE tahun_akademik.mulai <= CURRENT_DATE
            AND tahun_akademik.sampai >= CURRENT_DATE
            AND semester.id_semester = 1
            AND kategori.id_kategori = '$jenis'
        ";

        return $this->db->query($mainQuery)->getResult();
    }

    function DataSemuaJenis()
    {
        $this->select("100 AS persen, COUNT(DISTINCT(id_mapel)) AS jml, 'Semua' AS status");
        $this->join("ampu_mapel", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("kategori", "kategori.id_kategori = mata_pelajaran.kategori_id_kategori");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester.id_semester", 1);

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarMapel()
    {
        $this->select("DISTINCT(mata_pelajaran.id_mapel) AS kode, nama_mapel AS mata_pelajaran, kategori.status AS kategori");
        $this->join("kategori", "kategori.id_kategori = mata_pelajaran.kategori_id_kategori");
        $this->join("ampu_mapel", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("mata_pelajaran.status", 1);
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester.id_semester", date("n") >= 7 ? 1 : 1);
        $this->orderBy("mata_pelajaran.nama_mapel");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarMapelSpesifik($IdTahunAkademik, $IdSemester)
    {
        $this->select("DISTINCT(mata_pelajaran.id_mapel) AS kode, nama_mapel AS mata_pelajaran, kategori.status AS kategori");
        $this->join("kategori", "kategori.id_kategori = mata_pelajaran.kategori_id_kategori");
        $this->join("ampu_mapel", "ampu_mapel.mata_pelajaran_id_mapel = mata_pelajaran.id_mapel");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("mata_pelajaran.status", 1);
        $this->where("tahun_akademik.id_ta", $IdTahunAkademik);
        $this->where("semester.id_semester", $IdSemester);
        $this->orderBy("mata_pelajaran.nama_mapel");

        $query = $this->get();
        return $query->getResult();
    }

    function InfoMapel($Id)
    {
        $this->select("mata_pelajaran.nama_mapel, kategori.status AS kategori, mata_pelajaran.deskripsi");
        $this->join("kategori", "mata_pelajaran.kategori_id_kategori = kategori.id_kategori");
        $this->where("mata_pelajaran.status", 1);
        $this->where("id_mapel", $Id);

        return $this->first();
    }
}
