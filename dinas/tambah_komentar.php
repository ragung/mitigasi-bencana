<?php
session_start();
include 'includes/config.php';
include 'csrf.php';
 
function anti($text){
	return $id = stripslashes(strip_tags(htmlspecialchars($text, ENT_QUOTES)));
}
$nama_pengirim = anti($_POST["nama_pengirim"]);
$komen = anti($_POST["komen"]);
$komen_id = anti($_POST["komentar_id"]);
$id_lapor = $_POST['id_lapor'];
 
$query = "INSERT INTO tbl_komentar (id, id_lapor, komentar, nama_pengirim) VALUES (?, ?, ?, ?)";
$dewan1 = $mysqli->prepare($query);
$dewan1->bind_param("sdss", $komen_id, $id_lapor, $komen, $nama_pengirim);
$dewan1->execute();
 
echo json_encode(['success' => 'Sukses']);
?>