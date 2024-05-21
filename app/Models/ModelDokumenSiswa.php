<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokumenSiswa extends Model
{
    protected $table = "dokumen_siswa";
    protected $primaryKey = "id_dokumen_siswa";
    protected $allowedFields = ["nama_dokumen", "deskripsi", "file", "siswa_nis", "kategori"];

    function DaftarPrestasi($NIS)
    {
        $this->select("id_dokumen_siswa, DATE_FORMAT(tanggal, '%d %b %Y') as tanggal, nama_dokumen");
        $this->where("siswa_nis", $NIS);

        $query = $this->get();
        return $query->getResult();
    }

    function InfoPrestasi($id_dokumen)
    {
        $this->select("tanggal, nama_dokumen as prestasi, deskripsi");
        $this->where("id_dokumen_siswa", $id_dokumen);

        return $this->first();
    }

    function TambahPrestasi($nis, $Prestasi, $Deskripsi, $NamaFile)
    {
        $data = [
            "nama_dokumen" => $Prestasi,
            "deskripsi"    => $Deskripsi,
            "file"         => $NamaFile,
            "siswa_nis"    => $nis
        ];

        return $this->insert($data);
    }

    function GantiNis($id_Dokumen, $nis_baru)
    {
        $data = [
            "siswa_nis" => $nis_baru
        ];

        return $this->update($id_Dokumen, $data);
    }

    function TambahDokumen($nis, $NamaDokumen, $Deskripsi, $NamaFile)
    {
        $data = [
            "nama_dokumen" => $NamaDokumen,
            "deskripsi"    => $Deskripsi,
            "file"         => $NamaFile,
            "siswa_nis"    => $nis,
            "kategori"     => "dokumen"
        ];

        return $this->insert($data);
    }
}
