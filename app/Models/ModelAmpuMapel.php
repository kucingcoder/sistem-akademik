<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAmpuMapel extends Model
{
    protected $table = "ampu_mapel";
    protected $allowedFields = ["guru_inisial", "mata_pelajaran_id_mapel", "tahun_akademik_id_ta", "kelas_id_kelas", "jumlah_jam", "semester_id_semester"];

    function MataPelajaranDiampu($nip)
    {
        $this->select("mata_pelajaran.nama_mapel, kelas.nama_kelas AS kelas, jumlah_jam, COUNT(*) AS jml_siswa");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("komposisi_kelas", "komposisi_kelas.kelas_id_kelas = kelas.id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END)", false);
        $this->where("guru_inisial", "(SELECT inisial FROM guru WHERE nip = $nip)", false);
        $this->groupby("mata_pelajaran.nama_mapel, kelas.nama_kelas, jumlah_jam");

        $query = $this->get();
        return $query->getResult();
    }

    function MataPelajaranDiampuProfil($nip)
    {
        $this->select("ampu_mapel.id_ampu, mata_pelajaran.nama_mapel, kelas_id_kelas, kelas.nama_kelas, jumlah_jam");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->where("guru.nip", $nip);

        $query = $this->get();
        return $query->getResult();
    }

    function RiwayatMengampu($nip)
    {
        $this->select("ampu_mapel.id_ampu, tahun_akademik.ta, semester.semester, mata_pelajaran.nama_mapel, kelas_id_kelas, kelas.nama_kelas, jumlah_jam");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("semester", "semester.id_semester = ampu_mapel.semester_id_semester");
        $this->where("guru.nip", $nip);

        $query = $this->get();
        return $query->getResult();
    }

    function GuruPengampu($Id)
    {
        $this->select("guru.nip, guru.nama, kelas.nama_kelas AS kelas, jumlah_jam");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", (date("n") >= 7) ? 1 : 1);
        $this->where("mata_pelajaran.id_mapel", $Id);

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarPengampuMapel()
    {
        $this->select("ampu_mapel.id_ampu, mata_pelajaran.id_mapel, kode_ampu, mata_pelajaran.nama_mapel AS mata_pelajaran, guru.nama AS guru_pengampu, kelas.nama_kelas AS kelas, jumlah_jam");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", date("n") >= 7 ? 1 : 1);
        $this->orderBy("ampu_mapel.tanggal", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function TambahAmpuMapel($Inisial, $IdMapel, $Ta, $IdKelas, $JumlahJam)
    {
        $data = [
            "guru_inisial" => $Inisial,
            "mata_pelajaran_id_mapel" => $IdMapel,
            "tahun_akademik_id_ta" => $Ta,
            "kelas_id_kelas" => $IdKelas,
            "jumlah_jam" => $JumlahJam,
            "semester_id_semester" => date("n") >= 7 ? 1 : 1
        ];

        return $this->insert($data);
    }

    function HapusAmpuMapel($IdMapel)
    {
        $this->where("id_ampu", $IdMapel);
        return $this->delete();
    }

    function JadwalKelasHari($NamaKelas, $Hari)
    {
        $this->select("id_ampu, CONCAT(kode_ampu,'--', guru.nama,'--', mata_pelajaran.nama_mapel,'--', jumlah_jam, ' jam') kode, kelas.nama_kelas, jadwal.hari");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->join("jadwal", "jadwal.ampu_mapel_id_ampu = ampu_mapel.id_ampu");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END)", false);
        $this->where("kelas.nama_kelas", $NamaKelas);
        $this->where("jadwal.hari", $Hari);
        $this->orderBy("jadwal.jam_ke");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarKodeMapel($NamaKelas)
    {
        $this->select("id_ampu, CONCAT(kode_ampu,'--', guru.nama,'--', mata_pelajaran.nama_mapel,'--', jumlah_jam, ' jam') kode");
        $this->join("mata_pelajaran", "mata_pelajaran.id_mapel = ampu_mapel.mata_pelajaran_id_mapel");
        $this->join("guru", "guru.inisial = ampu_mapel.guru_inisial");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = ampu_mapel.tahun_akademik_id_ta");
        $this->join("kelas", "kelas.id_kelas = ampu_mapel.kelas_id_kelas");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("semester_id_semester", "(SELECT CASE WHEN MONTH(CURRENT_DATE) <= 6 THEN 1 ELSE 1 END)", false);
        $this->where("kelas.nama_kelas", $NamaKelas);
        $this->orderBy("mata_pelajaran.nama_mapel");

        $query = $this->get();
        return $query->getResult();
    }
}
