<?php
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('vendor/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>Image/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url('vendor/'); ?>style(input1).css">

	<!-- JavaScript -->
	<script src="<?= base_url('vendor/'); ?>js/jquery-3.7.0.min.js"></script>
	<script src="<?= base_url('vendor/'); ?>js/bootstrap.min.js"></script>
	<title>Input</title>
</head>

<body>
	<!-- Header -->
	<header>
		<nav>
			<div class="user-profile" id="user" onClick="toggleMenu()">
				<a><img src="<?= base_url('vendor/'); ?>Image/User.jpg" class="user-pic" alt="">&ensp; <?php echo $username; ?>
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
		<a href="<?= base_url('Dashboard/dashboard/') ?>" class="active"><i class="fa-light fa-house"></i>&ensp; Home</a>
	</div>

	<!-- Main -->
	<main>
		<div class="global-container">
			<form action="<?= base_url('Proses/sessiondata'); ?>" method="post" id="dataform">
				<div class="container my-3 bd-layout">
					<div class="col-12 pt-4 pb-2">
						<div class="card container" id="main">
							<div class="card-body">
								<table id="DataTable" cellpadding="5" style="position: absolute; top: 30px;">
									<tr>
										<td>Supplier Name</td>
										<td>&ensp;</td>
										<td> : </td>
										<td><input type="text" value="<?php if (isset($_SESSION['supplier'])) {
																			echo $_SESSION['supplier'];
																		} ?>" name="supplier" id="supplier"></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
									</tr>
									<tr>
										<td>Part Number </td>
										<td>&ensp;</td>
										<td> : </td>
										<td><input type="text" value="<?php if (isset($_SESSION['part'])) {
																			echo $_SESSION['part'];
																		} ?>" name="part" id="part"></td>
										<td></td>
									</tr>
									<tr>
										<td> </td>
									</tr>
									<tr>
										<td>Quantity per Box </td>
										<td>&ensp;</td>
										<td> : </td>
										<td><input type="text" value="<?php if (isset($_SESSION['quantity'])) {
																			echo $_SESSION['quantity'];
																		} ?>" name="quantity" id="quantity"></td>
										<td></td>
									</tr>
								</table>
								<div style="position: absolute; bottom: 25px; right: 25px;">
									<button type="button" id="ConfirmShowModal" class="btn btn-primary" style="display: inline-block; margin-right: 10px;" data-toggle="modal">Next</button>
									<a href="<?= base_url('Dashboard/dashboard/') ?>" class="btn btn-secondary" style="display: inline-block;">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- The Modal -->
		<div class="modal fade" id="ConfirmModal" tabindex="-1" aria-hidden="true">
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
						<p id="text"> </p>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button id="btnModalConfirm" class="btn btn-primary confirm">Continue</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

		$(document).ready(function() {
			$("#supplier").keyup(function() {
				$("#supplier").css("border-color", "");
				$("#DataTable tr:eq(0) td:eq(4)").html("");
			});

			$("#part").keyup(function() {
				$("#part").css("border-color", "");
				$("#DataTable tr:eq(2) td:eq(4)").html("");
			});

			$("#quantity").keyup(function() {
				$("#quantity").css("border-color", "");
				$("#DataTable tr:eq(4) td:eq(4)").html("");
			});

			$("#ConfirmShowModal").click(function() {
				if ($("#supplier").val().length > 0 && $("#part").val().length > 0 && $("#quantity").val().length > 0) {
					var supplier = $("#supplier").val();
					var part = $("#part").val();
					var quantity = $("#quantity").val();
					$.post("<?= base_url('Proses/cekdata'); ?>", {
						supplier: supplier,
						part: part,
						quantity: quantity,
					}, function(data) {
						$("#text").html(data);
					});
					$("#ConfirmModal").modal();
					$("#btnModalConfirm").click(function() {
						$("#dataform").submit();
					});

				} else {
					if ($("#supplier").val().length == 0) {
						$("#supplier").css("border-color", "red");
						$("#DataTable tr:eq(0) td:eq(4)").html("<i class='fa-solid fa-triangle-exclamation' style='color: #ff0000;'></i>");
					}
					if ($("#part").val().length == 0) {
						$("#part").css("border-color", "red");
						$("#DataTable tr:eq(2) td:eq(4)").html("<i class='fa-solid fa-triangle-exclamation' style='color: #ff0000;'></i>");
					}
					if ($("#quantity").val().length == 0) {
						$("#quantity").css("border-color", "red");
						$("#DataTable tr:eq(4) td:eq(4)").html("<i class='fa-solid fa-triangle-exclamation' style='color: #ff0000;'></i>");
					}
				}
			});
		})
	</script>

	<style>
		input[type=text] {
			-webkit-transition: 0.5s;
			transition: 0.5s;
			outline: none;
		}
	</style>
</body>

</html>