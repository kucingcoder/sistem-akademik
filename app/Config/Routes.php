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

    $routes->get("/siswa", "Siswa::index");
    $routes->post("/siswa/tambah", "Siswa::TambahSiswa");
    $routes->post("/siswa/tambah-masal", "Siswa::TambahSiswaMasal");
    $routes->get("/siswa-lulus", "Siswa::SiswaLulus");
    $routes->post("/siswa-lulus/luluskan", "Siswa::Luluskan");
    $routes->post("/siswa/do", "Siswa::DOSiswa");
    $routes->get("/siswa-dropout", "Siswa::SiswaDO");
    $routes->get("/siswa/do", "Siswa::InfoSiswaDO");
    $routes->post("/siswa/do", "Siswa::DOSiswa");
    $routes->get("/profil-siswa", "ProfilSiswa::index");
    $routes->post("/profil-siswa/ubah-profil", "ProfilSiswa::UbahProfil");
    $routes->post("/profil-siswa/ubah-username-password", "ProfilSiswa::UbahUsernamePassword");
    $routes->get("/profil-siswa/info-prestasi", "ProfilSiswa::InfoPrestasi");
    $routes->post("/profil-siswa/tambah-prestasi", "ProfilSiswa::TambahPrestasi");
    $routes->get("/profil-lulusan", "ProfilSiswa::MantanSiswa/lulus");
    $routes->get("/profil-siswa-drop-out", "ProfilSiswa::MantanSiswa/do");
});

$routes->group('', ['filter' => 'admin'], function ($routes) {
    $routes->get("/guru", "Guru::index");
    $routes->get("/guru/berhenti", "Guru::InfoGuruBerhenti");
    $routes->post("/guru/berhenti", "Guru::GuruBerhenti");
    $routes->post("/guru/tambah", "Guru::TambahGuru");

    $routes->get("/profil-guru", "ProfilGuru::index");
    $routes->post("/profil-guru/ubah-profil", "ProfilGuru::UbahProfil");
    $routes->get("/profil-guru/deskripsi-kelas", "ProfilGuru::DeskripsiKelas");
    $routes->post("/profil-guru/ubah-username-password", "ProfilGuru::UbahUsernamePassword");
    $routes->get("/profil-guru/setadmin", "ProfilGuru::AngkatAdmin");
    $routes->get("/profil-guru/removeadmin", "ProfilGuru::CabutAdmin");
    $routes->post("/profil-guru/tambah-dokumen", "ProfilGuru::TambahDokumen");
    $routes->get("/profil-guru/info-dokumen", "ProfilSaya::InfoDokumen");

    $routes->get("/kelas", "Kelas::index");
    $routes->get("/kelas/daftar-kelas", "Kelas::DaftarKelas");
    $routes->get("/kelas/daftar-siswa-calon-kelas", "Kelas::DaftarSiswaCalonPenghuniKelas");
    $routes->get("/kelas/komposisi-kelas", "Kelas::KomposisiKelas");
    $routes->get("/kelas/info-pindah-kelas", "Kelas::InfoPerpindahan");
    $routes->post("/kelas/tambah-kelas", "Kelas::TambahKelas");
    $routes->get("/kelas/hapus-siswa", "Kelas::HapusSiswaDariKelas");
    $routes->get("/kelas/pindah-kelas", "Kelas::PindahKelas");
    $routes->post("/kelas/beri-kelas", "Kelas::BeriKelas");

    $routes->get("/mata-pelajaran", "MataPelajaran::index");

    $routes->get("/jadwal-pelajaran", "JadwalPelajaran::index");

    $routes->get("/tahun-akademik", "TahunAkademik::index");
});
