<!DOCTYPE html>
<html lang="id">

<head>
    <title>SMK Bahari Tegal - Masuk</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="<?= base_url('assets/img/favicon.ico') ?>" rel="icon">
    <link href="<?= base_url('assets/img/favicon.ico') ?>" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container col-10">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">SMK Bahari Tegal</h1>
                        <?php if (session()->getFlashdata("msg")) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata("msg") ?></div>
                        <?php endif; ?>
                        <form action="/auth" method="post">
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" maxlength="35" required autocomplete="username">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" onclick="togglePassword()" id="showPassword">
                                    <label class="form-check-label" for="showPassword">tampilkan password</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</html>