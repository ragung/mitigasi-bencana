<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$ret="SELECT noTelp,nama FROM sms_phonebook order by nama asc";
                                            $stmt= $mysqli->prepare($ret) ;

                                            //$stmt->bind_param('i',$aid);
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            $cnt=1;



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
	<title>Kirim SMS</title>
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
					
						<h2 class="page-title">Kirimkan </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Silahkan</div>
									<div class="panel-body">
										
											
										
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left"> Sms </h4> </label>
</div>
<form method="post" action="send.php">



     <h2>Kirim SMS Semua Penduduk</h2>
   		
          <table class='list'>
		  <tr><td class='left'><b>Pilih Nomor Tujuan :<br> 
		  
 		
 		  <select name='nohp' class="form-control" size="">
 		  	<?php while($row=$res->fetch_object()) { ?>
 		  		<option value="<?= $row->noTelp; ?>"><?= $row->noTelp.' '.$row->nama; ?></option>
 		  	<?php } ?>
 		  </select>

		  </br> *)Gunakan tombol Ctrl+Click Untuk mengirim lebih dari 1 tujuan.</td></tr>
          <tr><td class='left'>Message  : </td></tr>
          <tr><td><textarea name='msg' style='width: 350px; height: 120px;'></textarea></td></tr>
		  <tr><td class='left' colspan=2><input type=submit name="submit" value=Kirim SMS>
          <input type=button value=Batal onclick=self.history.back()></td></tr>
          </div>   
</table>
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