<?php 
include('includes/config.php');

if(isset($_POST['submit'])) {
    // Inisialiasi
    $bencana = $_POST['bencana'];
    $alamat = $_POST['alamat'];
    $waktu = $_POST['waktu'];
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];
    // Upload Files
    if($_FILES['foto']['name'] != "") {
        $target_dir = "uploads/";

        $file = $_FILES['foto']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $new_name = rand(0,999).$filename;
        $ext = $path['extension'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $path_filename_ext = $target_dir.$new_name.".".$ext;
        $foto_name = $new_name.".".$ext;

        if ($ext == 'docx' ) {
            echo "<script>
                    alert('extension tidak didukung');
                    window.location.href = 'reg_lapor.php';
                  </script>";
            die();
        }

        if(file_exists($path_filename_ext)) {
            echo "Maaf, file sudah tersedia";
        } else {
            move_uploaded_file($tmp_name, $path_filename_ext);
            echo "<script>
                    alert('File berhasil di upload');
                    window.location.href = 'laporan.php';
                 </script>";
        }
    }

   $query = "INSERT INTO lapor(user_id,foto, status,bencana, alamat, waktu) VALUES('$user_id','$foto_name', '$status','$bencana','$alamat','$waktu')";
   $mysqli->query($query);
}

// header("location:reg_lapor.php?pesan=input");
?>