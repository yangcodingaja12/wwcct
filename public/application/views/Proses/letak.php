<?php
$username = $_SESSION['username'];
if (isset($_SESSION['quantity']) && isset($_SESSION['part']) && isset($_SESSION['quantity']) && isset($_SESSION['status'])) {
	$supplier = $_SESSION['supplier'];
	$part = $_SESSION['part'];
	$quantity = $_SESSION['quantity'];
	$status = $_SESSION['status'];

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Favicons -->
    <link href="<?= base_url()?>vendor/image/logotese.png" rel="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>style(letak).css">

    <!-- JavaScript -->
    <script src="<?= base_url('vendor/'); ?>js/jquery-3.7.0.min.js"></script>
    <script src="<?= base_url('vendor/'); ?>js/bootstrap.min.js"></script>
    <title>Input</title>
</head>

<body>
    <style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 200px;
        /* Adjust the width as needed */
        background-color: #2371b9;
        /* Adjust the background color as needed */
        color: #fff;
        /* Adjust the text color as needed */
        overflow-y: auto;
        /* Enable scrolling if sidebar height exceeds viewport */
        z-index: 1000;
        /* Ensure sidebar appears above other content */
    }

    .global-container {
        margin-left: 200px;
        /* Adjust this value to match sidebar width */
        padding: 20px;
        width: calc(100% - 200px);
        /* Adjust content width to account for sidebar */
        background-color: #f0f0f0;
        /* Background color for content */
    }
    </style>

    <!-- Header -->
    <header>
        <nav>
            <div class="user-profile" id="user" onClick="toggleMenu()">
                <a><img src="<?= base_url('vendor/'); ?>Image/User.jpg" class="user-pic" alt="">&ensp;
                    <?php echo $username; ?>
                    <span><i class="fa-solid fa-caret-down"></i></span></a>
            </div>
        </nav>
        <div class="sub-menu-warp" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <p>User</p>
                </div>
                <hr>
                <a href="<?= base_url('Login/logout'); ?>" class="sub-menu-link">
                    <p><i class="fa-solid fa-right-from-bracket"></i>&ensp; Log Out</p>
                    <span>></span>
                </a>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- <div class="empty-div"></div>
		<div class="empty2-div"></div> -->
        <a href="<?= base_url('Dashboard/dashboard/') ?>" class="active"><i class="fa-light fa-house"></i>&ensp;
            Home</a>
    </div>

    <!-- Main -->
    <main>
        <div class="global-container">
            <div class="container my-3 bd-layout">
                <div class="col-12 pt-4 pb-2">
                    <div class="card container" id="main">
                        <div class="card-body">
                            <center>
                                <h4 class="mt-2">Please put the item on the scales.<br>
                                    Make sure the item has been placed properly.</h4>
                                <img alt="" src="<?= base_url('vendor/'); ?>Image/scale-box.png" width="40%">
                            </center>
                            <div style="position: absolute; bottom: 25px; right: 25px;">
                                <a href="<?= base_url('Proses/input2/') ?>" class="btn btn-primary"
                                    style="display: inline-block; margin-right: 10px;">Next</a>
                                <a href="<?= base_url('Proses/input1/') ?>" class="btn btn-secondary"
                                    style="display: inline-block;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    let subMenu = document.getElementById("subMenu");
    let user = document.getElementById("user");

    function toggleMenu() {
        document.addEventListener('mouseup', function(e) {
            if (!user.contains(e.target) && !subMenu.contains(e.target)) {
                subMenu.classList.remove("open-menu");
            }
        });

        subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>
<?php
} else {
	redirect(base_url('Proses/input1/'));
}
?>