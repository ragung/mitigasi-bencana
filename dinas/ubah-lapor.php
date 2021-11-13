<?php 
include('includes/config.php');
// var_dump($_POST);
// die();
if(isset($_POST['submit'])) {
    // Inisialiasi
    $bencana = $_POST['bencana'];
    $alamat = $_POST['alamat'];
    $waktu = $_POST['waktu'];
    $user_id = $_POST['user_id'];
    $id_lapor = $_POST['id'];
    $status = $_POST['status'];
    $ret = "SELECT * FROM lapor WHERE id_lapor = $id_lapor";
    $stmt= $mysqli->prepare($ret) ;

    //$stmt->bind_param('i',$aid);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    $row = $res->fetch_object();
    $foto_name = $row->foto;

    // Upload Files
    if($_FILES['foto']['name'] != "") {
        $target_dir = "../uploads/";

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
                  </script>";
            die();
        }

        if(file_exists($path_filename_ext)) {
            echo "Maaf, file sudah tersedia";
        } else {
            move_uploaded_file($tmp_name, $path_filename_ext);
            echo "<script>
                    alert('File berhasil di upload');
                 </script>";
        }
    }

   $query = "UPDATE lapor set user_id='$user_id', foto='$foto_name' , bencana='$bencana' , alamat='$alamat', waktu='$waktu', status='$status' WHERE id_lapor='$id_lapor'";
   $mysqli->query($query);

   if($query) {
    echo "<script>
            alert('Update Succesfully!');
            
            var win = window.open('laporan.php', 'foobar');
            win.location.reload();
            window.close();
         </script>";
   }
}

// header("location:reg_lapor.php?pesan=input");
?>