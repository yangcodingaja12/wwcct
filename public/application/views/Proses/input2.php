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
        <link href="<?= base_url() ?>vendor/image/logotese.png" rel="icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url('vendor/'); ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="<?= base_url('vendor/'); ?>style(input2).css">

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
                <form action="<?= base_url('Proses/saveupdatedata/'); ?>" method="post" id="alldataform">
                    <div class="container my-3 bd-layout">
                        <div class="col-12 pt-4 pb-2">
                            <div class="card container" id="main">
                                <div class="card-body">
                                    <hr style="height: 2px; width: 98%; border-width: 0; color: black; background-color: gray; position: relative; top: 55px; opacity: 80%" align="left">
                                    <table cellpadding="5" style="position: absolute; top: 30px;">
                                        <tr>
                                            <td>Supplier Name </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td><input type="text" name="supplier" id="supplier" value="<?php echo $supplier; ?>" disabled></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Length </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td>
                                                <?php
                                                foreach ($sementara as  $sm) :
                                                ?>

                                                    <input type="text" name="length" id="length" value="<?= $sm->data_sensor ?>">
                                                <?php endforeach; ?>
                                            </td>
                                            <td>cm</td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Width </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td>
                                                <?php
                                                foreach ($sementara as  $sm) :
                                                ?>
                                                    <input type="text" name="width" id="width" value="<?= $sm->data_sensor2 ?>">
                                                <?php endforeach; ?>
                                            </td>
                                            <td>cm</td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Height </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td>
                                                <?php
                                                foreach ($sementara as  $sm) :
                                                ?>
                                                    <input type="text" name="height" id="height" value="<?= $sm->data_sensor3 ?>">
                                                <?php endforeach; ?>
                                            </td>
                                            <td>cm</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="5" style="position: absolute; right: 60px; top: 30px;">
                                        <tr>
                                            <td>Part Number </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td><input type="text" name="part" id="part" value="<?php echo $part; ?>" disabled></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Volume </td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td>
                                                <?php
                                                foreach ($sementara as  $sm) :
                                                ?>
                                                    <?php
                                                    $total = $sm->data_sensor * $sm->data_sensor2  * $sm->data_sensor3;
                                                    ?>
                                                    <input type="text" name="volume" id="volume" value="<?= $total ?>">
                                                <?php endforeach;
                                                ?>
                                            </td>
                                            <td>cm<sup>3</sup></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td>&ensp;</td>
                                            <td> : </td>
                                            <td>
                                                <?php
                                                foreach ($sementara as  $sm) :
                                                ?>
                                                    <input type="text" name="weight" id="weight" value="<?= $sm->data_sensor4 ?>">
                                                <?php endforeach; ?>
                                            </td>
                                            <td>kg</td>
                                        </tr>
                                    </table>
                                    <div style="position: absolute; bottom: 25px; right: 25px;">
                                        <button type="button" class="btn btn-warning" style="display: inline-block; margin-right: 10px;" data-toggle="modal" data-target="#ModalRefresh">Check</button>
                                        <button type="button" class="btn btn-primary" style="display: inline-block; margin-right: 10px;" data-toggle="modal" data-target="#ConfirmModal">
                                            <?php
                                            if ($status == 'create') {
                                                echo "Save";
                                            } else if ($status == 'update') {
                                                echo "Update";
                                            }
                                            ?>
                                        </button>
                                        <a href="<?= base_url('Proses/input1/') ?>" class="btn btn-secondary" style="display: inline-block;">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="modal fade" id="ModalRefresh" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p style="color:red;">*If the data is not correct, then wait 10 seconds then press the check
                                button.
                            </p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" id="ilhamgod" class="btn btn-primary confirm" onClick="window.location.reload();">Close</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="ConfirmModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>
                                <?php
                                if ($status == 'create') {
                                    echo "Are you sure to save the data?";
                                } else if ($status == 'update') {
                                    echo "Are you want to update the data?";
                                }
                                ?>
                            <p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" id="btnModalConfirm" class="btn btn-primary" data-toggle="modal" data-dismiss="modal">
                                <?php
                                if ($status == 'create') {
                                    echo "Save";
                                } else if ($status == 'update') {
                                    echo "Update";
                                }
                                ?>
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal (Save/Update) -->
            <div class="modal fade" id="SaveUpdateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p id="text"> </p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" id="btnModalSaveUpdate" class="btn btn-primary confirm">Close</a>
                        </div>
                    </div>
                </div>
            </div>

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

                $(document).ready(function() {
                    $("#btnModalConfirm").click(function() {
                        var supplier = $("#supplier").val();
                        var part = $("#part").val();
                        var quantity = $("#quantity").val();
                        var length = $("#length").val();
                        var width = $("#width").val();
                        var height = $("#height").val();
                        var volume = $("#volume").val();
                        var weight = $("#weight").val();
                        $.post("<?= base_url('Proses/saveupdatedata'); ?>", {
                            supplier: supplier,
                            part: part,
                            quantity: quantity,
                            length: length,
                            width: width,
                            height: height,
                            volume: volume,
                            weight: weight,
                        }, function(data) {
                            $("#text").html(data);
                        });
                        $("#SaveUpdateModal").modal();
                        $("#SaveUpdateModal").on('shown.bs.modal', function() {
                            $("#btnModalSaveUpdate").click(function() {
                                $("#SaveUpdateModal").modal("hide");
                                window.location = '<?= base_url('Dashboard/dashboard/') ?>';
                            });
                        });
                    });
                });
            </script>
    </body>


    </html>
<?php
} else {
    redirect(base_url('Proses/input1/'));
}
?>