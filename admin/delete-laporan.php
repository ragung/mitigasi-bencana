<?php

include ('includes/config.php');

$id = $_GET['id'];
$get_data = "select * from lapor where id_lapor = $id";
$stmt= $mysqli->prepare($get_data) ;

$stmt->execute() ;
$res=$stmt->get_result();

$row = $res->fetch_object();
$img = $row->foto;
unlink('../uploads/'.$img);

$sql = "delete from lapor where id_lapor=$id";
$mysqli->query($sql);

echo "<script>
		window.location.href = 'laporan.php';
	  </script>";
die();