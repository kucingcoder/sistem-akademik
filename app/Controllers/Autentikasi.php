<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class Autentikasi extends BaseController
{
    public function Masuk()
    {
        $Session = session();

        $Username = $this->request->getVar("username");
        $Password = md5($this->request->getVar("password"));

        $ModelGuru = new ModelGuru();
        $Guru = $ModelGuru->where(["username" => $Username, "password" => $Password])->first();

        if (!$Guru) {
            $Session->setFlashdata("msg", "Username atau Password salah");
            return redirect()->to("/");
        }

        $Foto = "foto-profil/";

        if (empty($Guru["foto"])) {
            $Foto .= "default.jpg";
        } else {
            $Foto .= $Guru["foto"];
        }

        $Data = [
            "nip"     => $Guru["nip"],
            "inisial" => $Guru["inisial"],
            "nama"    => $Guru["nama"],
            "jabatan" => $Guru["jabatan"],
            "jenis"   => $Guru["jenis"],
            "foto"    => $Foto,
            "sesi"    => true
        ];

        $Session->set($Data);

        return redirect()->to("/dashboard");
    }

    public function Keluar()
    {
        $Session = session();
        $Session->destroy();
        return redirect()->to("/");
    }
}
