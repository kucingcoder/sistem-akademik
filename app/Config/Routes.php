<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'umum'], function ($routes) {
    $routes->get('/', 'Home::Index');

    $routes->post('/auth', 'Autentikasi::Masuk');
});

$routes->group('', ['filter' => 'sesi'], function ($routes) {
    $routes->get('/auth', 'Autentikasi::Keluar');

    $routes->get('/dashboard', 'Dashboard::Index');

    $routes->get("/pelaksanaan-kbm/(:segment)/(:segment)/(:segment)", "PelaksanaanKBM::index/$1/$2/$3");
    $routes->post('/pelaksanaan-kbm/simpan-absensi', 'PelaksanaanKBM::SimpanAbsensi');

    $routes->get("/kbm", "KBM::index");
    $routes->get("/kbm/pertemuan", "KBM::Pertemuan");
    $routes->get("/kbm/detail-pertemuan", "KBM::DetailPertemuan");
    $routes->get("/kbm/kehadiran", "KBM::Kehadiran");
    $routes->post("/kbm/kehadiran", "KBM::Updatekehadiran");
    $routes->post("/kbm/tambah-tugas", "KBM::TambahTugas");
    $routes->get("/kbm/penugasan", "KBM::Penugasan");
    $routes->get("/kbm/detail-tugas", "KBM::DetailTugas");
    $routes->get("/kbm/nilai-tugas", "KBM::DaftarNilaiTugas");
    $routes->post("/kbm/nilai-tugas", "KBM::UpdateNilaiTugas");
    $routes->get("/kbm/nilai-uts", "KBM::DaftarNilaiUTS");
    $routes->post("/kbm/nilai-uts", "KBM::UpdateNilaiUTS");
    $routes->get("/kbm/nilai-uas", "KBM::DaftarNilaiUAS");
    $routes->post("/kbm/nilai-uas", "KBM::UpdateNilaiUAS");

    $routes->get("/profil", "ProfilSaya::index");
    $routes->post("/profil/ubah-profil", "ProfilSaya::UbahProfil");
    $routes->get("/profil/deskripsi-kelas", "ProfilSaya::DeskripsiKelas");
    $routes->post("/profil/ubah-username-password", "ProfilSaya::UbahUsernamePassword");
    $routes->post("/profil/tambah-dokumen", "ProfilSaya::TambahDokumen");
    $routes->get("/profil/info-dokumen", "ProfilSaya::InfoDokumen");
});

$routes->group('', ['filter' => 'admin'], function ($routes) {
    $routes->get("/guru", "Guru::index");
    $routes->get("/guru/berhenti", "Guru::InfoGuruBerhenti");
    $routes->post("/guru/berhenti", "Guru::GuruBerhenti");
    $routes->post("/guru/tambah", "Guru::TambahGuru");

    $routes->get("/tahun-akademik", "TahunAkademik::index");
});
