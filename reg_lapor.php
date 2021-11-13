<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$user_id = $_SESSION['id'];

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Lapor</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Laporkan </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Silahkan</div>
									<div class="panel-body">
										<form method="post" action="lapor-aksi.php" class="form-horizontal" enctype="multipart/form-data">
											<input type="hidden" name="user_id" value="<?= $user_id ?>">
											<div class="form-group">
												<label class="col-sm-4 control-label">
													<h4 style="color: green" align="left"> Info </h4>
												</label>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Foto </label>
												<div class="col-sm-8">
													<input type="file" name="foto" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Bencana</label>
												<div class="col-sm-8">
													<input type="text" name="bencana" id="bencana" class="form-control" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Alamat </label>
												<div class="col-sm-8">
													<textarea rows="5" name="alamat" id="alamat" class="form-control"
														required></textarea>
												</div>
											</div>



											<div class="form-group">
												<label class="col-sm-2 control-label">status</label>
												<div class="col-sm-8">
													<select name="status" class="form-control" required>
														<option value="ON PROGRESS" selected>ON PROGRESS</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">waktu</label>
												<div class="col-sm-8">
													<input type="date" name="waktu" id="waktu" class="form-control" required>
												</div>
											</div>


											<div class="col-sm-6 col-sm-offset-4">

												<input type="submit" name="submit" Value="Lapor"
													class="btn btn-primary">
											</div>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>