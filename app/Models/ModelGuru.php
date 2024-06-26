<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table = "guru";
    protected $primaryKey = "nip";
    protected $allowedFields = ["nip", "nik", "nama", "jenis_kelamin_id_jk", "agama_id_agama", "status_kawin_id_status", "tempat_lahir", "tanggal_lahir", "no_hp", "email", "alamat_domisili", "kompetensi", "lulusan_tahun", "lulusan", "jabatan", "foto", "username", "password", "status_id_status", "inisial", "jenis"];

    public function Masuk($username, $password)
    {
        $this->select("nip, inisial, nama, jabatan, jenis, foto");
        $this->where("username", $username);
        $this->where("password", md5($password));
        return $this->first();
    }

    function DataJenis($jenis)
    {
        $NilaiJenis = ["P", "A", "N"];
        if (!in_array($jenis, $NilaiJenis)) {
            return [];
        }

        $this->select("COUNT(*)*100/(SELECT COUNT(*) FROM guru WHERE status_id_status = 'A') as persen, COUNT(*) as jml, kategori.status");
        $this->join("kategori", "kategori.id_kategori = guru.kategori_id_kategori");
        $this->where("guru.status_id_status", "A");
        $this->where("kategori_id_kategori", $jenis);

        $query = $this->get();
        return $query->getResult();
    }

    function DataSemuaJenis()
    {
        $this->select("100 as persen, COUNT(*) as jml, 'Semua' AS status");
        $this->where("status_id_status", "A");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarSemuaJenis()
    {
        $this->select("nip, nama, kategori.status AS kategori, jenis_kelamin.jenis_kelamin AS gender");
        $this->join("kategori", "kategori.id_kategori = guru.kategori_id_kategori");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = guru.jenis_kelamin_id_jk");
        $this->where("guru.status_id_status", "A");

        $query = $this->get();
        return $query->getResult();
    }

    function DaftarJenis($jenis)
    {
        $NilaiJenis = ["P", "A", "N"];
        if (!in_array($jenis, $NilaiJenis)) {
            return [];
        }

        $this->select("nip, nama, kategori.status AS kategori, jenis_kelamin.jenis_kelamin AS gender");
        $this->join("kategori", "kategori.id_kategori = guru.kategori_id_kategori");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = guru.jenis_kelamin_id_jk");
        $this->where("guru.status_id_status", "A");
        $this->where("guru.kategori_id_kategori", $jenis);

        $query = $this->get();
        return $query->getResult();
    }

    function InfoGuruBerhenti($nip)
    {
        $this->select("guru.nip, guru.nik, guru.nama, kategori.status as kategori, jenis_kelamin.jenis_kelamin AS gender, agama.agama AS agama, guru.tempat_lahir, guru.tanggal_lahir, guru.alamat_domisili AS alamat, guru.kompetensi");
        $this->join("kategori", "guru.kategori_id_kategori = kategori.id_kategori");
        $this->join("jenis_kelamin", "guru.jenis_kelamin_id_jk = jenis_kelamin.id_jk");
        $this->join("agama", "guru.agama_id_agama = agama.id_agama");
        $this->where("guru.nip", $nip);

        return $this->first();
    }

    function BerhentikanGuru($NIP, $Status)
    {
        $data = [
            "status_id_status" => $Status
        ];

        return $this->update($NIP, $data);
    }

    function Profil($nip)
    {
        $this->select("nip, nik, nama AS nama_lengkap, jenis_kelamin AS gender, agama, status_kawin AS status_perkawinan, tempat_lahir, tanggal_lahir, no_hp AS no_telp, email, alamat_domisili AS alamat, kompetensi, lulusan_tahun, lulusan AS asal_perguruan_tinggi, jabatan, foto");
        $this->join("agama", "agama.id_agama = guru.agama_id_agama");
        $this->join("jenis_kelamin", "jenis_kelamin.id_jk = guru.jenis_kelamin_id_jk");
        $this->join("status_kawin", "status_kawin.id_status = guru.status_kawin_id_status");
        $this->where("nip", $nip);

        return $this->first();
    }

    function UbahProfil($nip, $nik, $gender, $agama, $status_perkawinan, $tempat_lahir, $tanggal_lahir, $no_telp, $email, $alamat, $kompetensi, $lulusan_tahun, $asal_perguruan_tinggi, $jabatan, $foto)
    {
        try {
            $data = [
                "nik"                    => $nik,
                "jenis_kelamin_id_jk"    => $gender,
                "agama_id_agama"         => $agama,
                "status_kawin_id_status" => $status_perkawinan,
                "tempat_lahir"           => $tempat_lahir,
                "tanggal_lahir"          => $tanggal_lahir,
                "no_hp"                  => $no_telp,
                "email"                  => $email,
                "alamat_domisili"        => $alamat,
                "kompetensi"             => $kompetensi,
                "lulusan_tahun"          => $lulusan_tahun,
                "lulusan"                => $asal_perguruan_tinggi,
                "jabatan"                => $jabatan,
                "foto"                   => $foto
            ];

            $this->update($nip, $data);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function UbahUsernamePassword($nip, $Username, $Password)
    {
        $data = [
            "username" => $Username,
            "password" => md5($Password)
        ];

        return $this->update($nip, $data);
    }

    function AngkatAdmin($Nip)
    {
        $data = ["jenis" => "staff admin"];
        return $this->update($Nip, $data);
    }

    function CabutAdmin($Nip)
    {
        $data = ["jenis" => "staff"];
        return $this->update($Nip, $data);
    }


    function TambahGuru($Nip, $Nik, $Nama, $Gender, $Agama, $StatusPerkawinan, $TempatLahir, $TanggalLahir, $NoTelp, $Email, $Alamat, $Kompetensi, $LulusanTahun, $AsalPerguruanTinggi, $Jabatan, $Foto)
    {
        $string_acak = str_shuffle(str_replace(' ', '', $Nama));
        $inisial = strtoupper(substr($string_acak, 0, 2));

        $data = [
            'nip' => $Nip,
            'nik' => $Nik,
            'nama' => $Nama,
            'jenis_kelamin_id_jk' => $Gender,
            'agama_id_agama' => $Agama,
            'status_kawin_id_status' => $StatusPerkawinan,
            'tempat_lahir' => $TempatLahir,
            'tanggal_lahir' => $TanggalLahir,
            'no_hp' => $NoTelp,
            'email' => $Email,
            'alamat_domisili' => $Alamat,
            'kompetensi' => $Kompetensi,
            'lulusan' => $AsalPerguruanTinggi,
            'lulusan_tahun' => $LulusanTahun,
            'jabatan' => $Jabatan,
            'foto' => $Foto,
            'inisial' => $inisial,
            'status_id_status' => 'A',
            'username' => $Email,
            'password' => md5('123'),
            'jenis' => 'staff'
        ];

        return $this->insert($data);
    }

    function DaftarGuru()
    {
        $this->select("nip, nama, inisial");
        $this->where("inisial IS NOT NULL");
        $this->orderBy("nama", "ASC");

        $query = $this->get();
        return $query->getResult();
    }
}
