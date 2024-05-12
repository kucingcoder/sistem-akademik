<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokumenGuru extends Model
{
    protected $table = "dokumen_guru";
    protected $primaryKey = "id_dokumen_guru";
    protected $allowedFields = ["nama_dokumen", "deskripsi", "file", "guru_nip"];

    function Dokumentasi($nip)
    {
        $this->select("id_dokumen_guru, DATE_FORMAT(tanggal, '%d %b %y') tanggal, nama_dokumen");
        $this->where("guru_nip", $nip);

        $query = $this->get();
        return $query->getResult();
    }

    function TambahDokumen($nip, $NamaDokumen, $DeskripsiDokumen, $NamaFile)
    {
        $data = [
            "nama_dokumen" => $NamaDokumen,
            "deskripsi" => $DeskripsiDokumen,
            "file" => $NamaDokumen,
            "guru_nip" => $nip
        ];

        return $this->insert($data);
    }

    function GantiNip($id_Dokumen, $nip_baru)
    {
        $data = [
            "guru_nip" => $nip_baru
        ];

        return $this->update($id_Dokumen, $data);
    }
}
