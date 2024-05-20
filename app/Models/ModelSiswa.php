<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "nis";
    protected $allowedFields = ["nis", "nisn", "nama", "jenis_kelamin_id_jk", "agama_id_agama", "tempat_lahir", "tanggal_lahir", "alamat_domisili", "no_hp", "email", "nama_ayah", "nama_ibu", "hp_ayah", "hp_ibu", "kerja_ayah", "Kerja_ibu", "sekolah_asal", "nilai_smp", "tahun_lulus", "foto", "status_id_status", "username", "password"];

    function DaftarSiswaDiKelas($Kelas)
    {
        $this->select("siswa.nis, siswa.nama, siswa.jenis_kelamin_id_jk AS gender, siswa.kelas");
        $this->join("kelas", "siswa.kelas = kelas.id_kelas");
        $this->where("kelas.nama_kelas", $Kelas);
        $this->where("siswa.status_id_status", "A");
        $this->orderBy("siswa.nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarSiswaAktif()
    {
        $this->select("siswa.nis, siswa.nama, kelas.nama_kelas AS kelas, jenis_kelamin.jenis_kelamin AS gender");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = siswa.jenis_kelamin_id_jk");
        $this->join("komposisi_kelas", "siswa.nis = komposisi_kelas.siswa_nis");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("siswa.status_id_status", "A");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarSiswaLulus()
    {
        $this->select("siswa.nis, siswa.nama, kelas.nama_kelas AS kelas, jenis_kelamin.jenis_kelamin AS gender, siswa.lulus_tahun AS tahun_lulus");
        $this->join("kelas", "kelas.id_kelas = siswa.kelas");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = siswa.jenis_kelamin_id_jk");
        $this->where("status_id_status", "L");
        $this->orderBy("lulus_tahun", "DESC");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarSiswaDropOut()
    {
        $this->select("siswa.nis, siswa.nama, kelas.nama_kelas AS kelas, jenis_kelamin.jenis_kelamin AS gender, status.status AS keterangan");
        $this->join("kelas", "kelas.id_kelas = siswa.kelas");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = siswa.jenis_kelamin_id_jk");
        $this->join("status", "status.id_status = siswa.status_id_status");
        $this->where("status_id_status !=", "L");
        $this->where("status_id_status !=", "A");

        $query = $this->get();
        return $query->getResult();
    }

    function InfoSiswaDO($NIS)
    {
        $this->select("siswa.nis, siswa.nisn, siswa.nama, kelas.nama_kelas AS kelas, jenis_kelamin.jenis_kelamin AS gender, agama.agama, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.alamat_domisili AS alamat, siswa.sekolah_asal as asal_sekolah, siswa.nama_ayah, siswa.nama_ibu, siswa.hp_ayah AS no_telp_ayah, siswa.hp_ibu AS no_telp_ibu");
        $this->join("agama", "agama.id_agama = siswa.agama_id_agama");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = siswa.jenis_kelamin_id_jk");
        $this->join("komposisi_kelas", "komposisi_kelas.siswa_nis = siswa.nis");
        $this->join("kelas", "kelas.id_kelas = komposisi_kelas.kelas_id_kelas");
        $this->join("tahun_akademik", "tahun_akademik.id_ta = kelas.tahun_akademik_id_ta");
        $this->where("tahun_akademik.mulai <=", date("Y-m-d"));
        $this->where("tahun_akademik.sampai >=", date("Y-m-d"));
        $this->where("siswa.nis", $NIS);

        return $this->first();
    }

    function DOSiswa($NIS, $Status)
    {
        $data = [
            "status_id_status" => $Status
        ];

        return $this->update($NIS, $data);
    }

    function Profil($NIS)
    {
        $this->select("siswa.nis, siswa.nisn, siswa.nama, jenis_kelamin.jenis_kelamin, siswa.tempat_lahir, siswa.tanggal_lahir, '%d %M %Y', siswa.no_hp, siswa.email, siswa.alamat_domisili, agama.agama, sekolah_asal, nilai_smp, tahun_lulus, nama_ayah, nama_ibu, hp_ayah, hp_ibu, kerja_ayah, kerja_ibu");
        $this->join("agama", "agama.id_agama = siswa.agama_id_agama");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = siswa.jenis_kelamin_id_jk");
        $this->where("siswa.nis", $NIS);

        return $this->first();
    }

    function UbahProfil($NisLama, $Nis, $Nisn, $NamaLengkap, $Gender, $Agama, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $AsalSekolah, $NilaiUjian, $TahunLulus, $NamaAyah, $NamaIbu, $NoTelpAyah, $NoTelpIbu, $KerjaAyah, $KerjaIbu, $Foto)
    {
        $Dokumen = new ModelDokumenSiswa();

        $DaftarDokumen = $Dokumen->DaftarPrestasi($NisLama);

        foreach ($DaftarDokumen as $Item) {
            $Dokumen->GantiNis($Item->id_dokumen_siswa, null);
        }

        $data = [
            "nis"                 => $Nis,
            "nisn"                => $Nisn,
            "nama"                => $NamaLengkap,
            "jenis_kelamin_id_jk" => $Gender,
            "agama_id_agama"      => $Agama,
            "tempat_lahir"        => $TempatLahir,
            "tanggal_lahir"       => $TanggalLahir,
            "alamat_domisili"     => $Alamat,
            "no_hp"               => $NoTelp,
            "email"               => $Email,
            "nama_ayah"           => $NamaAyah,
            "nama_ibu"            => $NamaIbu,
            "hp_ayah"             => $NoTelpAyah,
            "hp_ibu"              => $NoTelpIbu,
            "kerja_ayah"          => $KerjaAyah,
            "Kerja_ibu"           => $KerjaIbu,
            "sekolah_asal"        => $AsalSekolah,
            "nilai_smp"           => $NilaiUjian,
            "tahun_lulus"         => $TahunLulus,
            "foto" => $Foto
        ];

        $this->update($NisLama, $data);

        foreach ($DaftarDokumen as $Item) {
            $Dokumen->GantiNis($Item->id_dokumen_siswa, $Nis);
        }

        return true;
    }

    function UbahUsernamePassword($nis, $Username, $Password)
    {
        $data = [
            "username" => $Username,
            "password" => md5($Password)
        ];

        return $this->update($nis, $data);
    }
}
