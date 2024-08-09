<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesom…
input2.php\
<!doctype html>
<>

<head>
	<!-- Favicons -->
	<link href=" <?= base_url()?>vendor/image/logotese.png" rel="icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>style(login).css">

    <!-- JavaScript -->
    <script src="<?= base_url('vendor/'); ?>js/jquery-3.7.0.min.js"></script>
    <script src="<?= base_url('vendor/'); ?>js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="global-container">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="login-form" action="<?php echo base_url('Login/ceklogin'); ?>" method="post">
                <p align="center" style="color: white; font-size: 40px; font-weight: lighter;">TESE App</p>
                <div class="card container col-5 pt-4 pb-5" id="main" style="width: 80%; max-width: 1200px;">
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="SESA ID"
                                style="height: 50px; font-size: 20px;">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" style="height: 50px; font-size: 20px;">
                        </div>
                        <div class="mb-3" align="center">
                            <button type="submit" class="form-control btn btn-primary"
                                style="height: 50px; font-size: 20px;"><i class="fa-solid fa-right-to-bracket"></i> Sign
                                In</button>
                        </div>
                        <img alt="" src="vendor/Image/pt-tese.png" width="100%">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>


</html>