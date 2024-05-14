<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title><?= $this->renderSection('Judul') ?></title>

    <link href="<?= base_url('assets/img/logo-removebg-preview.png'); ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets/img/blogo.png'); ?>" alt="logo SMK">
                <span class="d-none d-lg-block">SMK Bahari Tegal</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url(session()->get("foto")) ?>" alt="Foto" class="rounded-circle" style="width: 35px; height: 35px; object-fit: fill; object-position: center;">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get("nama") ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <img src="<?= base_url(session()->get("foto")) ?>" alt="Foto" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; object-position: center; margin-bottom: 10px;">
                            <h6><?= session()->get("nama") ?></h6>
                            <span><?= session()->get("jabatan") . " (" . session()->get("jenis") . ")" ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profil">
                                <i class="bi bi-person-fill"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/auth">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/kbm">
                    <i class="bi bi-journal-check"></i>
                    <span>KBM</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/profil">
                    <i class="bi bi-person-fill"></i>
                    <span>Profil Saya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/siswa">
                    <i class="bi bi-people"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/guru">
                    <i class="bi bi-people-fill"></i>
                    <span>Guru</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/kelas">
                    <i class="bi bi-person-square"></i>
                    <span>Kelas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/mata-pelajaran">
                    <i class="bi bi-journals"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/jadwal-pelajaran">
                    <i class="bi bi-journal-text"></i>
                    <span>Jadwal Pelajaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/tahun-akademik">
                    <i class="bi bi-list-stars"></i>
                    <span>Tahun Akademik</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="/rekapitulasi">
                    <i class="bi bi-list-stars"></i>
                    <span>Rekapitulasi</span>
                </a>
            </li> -->
        </ul>
    </aside>

    <main id="main" class="main">
        <?= $this->renderSection('Konten') ?>
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">&copy; Copyright <strong><span>SMK Bahari Tegal</span></strong>. All Rights Reserved</div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/quill/quill.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

<?= $this->renderSection('SkripJS') ?>

</html>