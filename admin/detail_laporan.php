<?php

//Mengirimkan Token Keamanan Ajax Request (Csrf Token)
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

    if(isset($_GET['id'])){
        $id_lapor = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "includes/config.php";
    
    $ret="select *, userregistration.firstName from lapor join userregistration on userregistration.id = lapor.user_id WHERE id_lapor=$id_lapor";
                                            $stmt= $mysqli->prepare($ret) ;

                                            //$stmt->bind_param('i',$aid);
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                                {
?>
<html>
<html lang="en" class="no-js">

<head>
    <!-- Csrf Token -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Laporan</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin',
                'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
                510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

</head>
<body>
    <?php include('includes/header.php');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div class="ts-main-content">
        
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title"> Detail Laporan</h2>
                        <div class="panel panel-default">
                            <form method="post" action="ubah-lapor.php" class="form-horizontal" enctype="multipart/form-data">
                            <div class="panel-heading"><p><i>Note: Dibawah ini adalah detail informasi laporan id Lapor</i> <b><?php echo $id_lapor?></b></p></div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover"
                                    cellspacing="0" width="100%">

        <tr>
            <td>Nama</td>
            <td>: 
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                <?php echo $row->firstName;?></td>
        </tr>
        <tr>
            <td>foto</td>
            <td><input type="file" name="foto" class="form-control">: <img src="<?= '../uploads/'.$row->foto;?>" style="max-width: 150px;"></td>
        </tr>
        <tr>
            <td>bencana</td>
            <td><input type="text" name="bencana" id="bencana" value="<?php echo $row->bencana;?>" class="form-control" required> </td>
        </tr>
        <tr>
            <td>alamat</td>
            <td><input type="text" name="alamat" id="alamat" value="<?php echo $row->alamat;?>" class="form-control" required></td>
        </tr>
        <tr>
            <td>status</td>
            <td>
                <select name="status" id="status" class="form-control">
                    <option value="ON PROGRESS" selected>ON PROGRESS</option>
                    <option value="DONE">DONE</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td>waktu</td>
            <input type="hidden" name="waktu" value="<?= $row->waktu ?>">
            <td>:<?php echo $row->waktu;?></td>
                
        </tr>
        <tr height="40">
            <td><a href="laporan.php">Kembali</a></td>
            <td><input type="submit" name="submit" Value="Ubah"
                                                    class="btn btn-primary"></td>
        </tr>
        
        <?php
                                            $cnt=$cnt+1;
                                        } ?>
    </form>                                        
    </table>
    
    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script> -->
<nav class="navbar navbar-dark bg-danger fixed-top">
  
</nav>
 
<div class="container mb-3">
    <h2 align="center" style="margin: 60px 10px 10px 10px;">Komentar</h2><hr>
    <form method="POST" id="form_komen">
        <input type="hidden" name="id_lapor" id="id_lapor" value="<?= $id_lapor ?>">
        <div class="form-group">
            <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Masukkan Nama" />
        </div>
        <div class="form-group">
            <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </div>
    </form>
    <hr>
    <h4 class="mb-3">Komentar :</h4>
    <span id="message"></span>
   
    <div id="display_comment"></div>
</div>
 


<script>
        $(document).ready(function(){
            //Mengirimkan Token Keamanan
            $.ajaxSetup({
                headers : {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $('#form_komen').on('submit', function(event){
                event.preventDefault();
                let nama_pengirim = $('#nama_pengirim').val();
                let komen = $('#komen').val();
                let id_lapor = $('#id_lapor').val();
                
                if(nama_pengirim==''){
                    alert("Nama Pengirim Harus disii");
                } else if(komen==''){
                    alert("Komentar Harus disii");
                } else {
                    var data = $(this).serialize();
                        
                    $.ajax({
                        url:"tambah_komentar.php",
                        method:"POST",
                        data:data,
                        success:function(data){
                            $('#form_komen')[0].reset();
                            $('#komentar_id').val('0');
                            load_comment();
                        }, error: function(data) {
                            console.log(data.responseText)
                        }
                    })
                }
            });
 
            load_comment();
 
            function load_comment(){
                let id_lapor ="<?= $_GET['id'] ?>";
                $.ajax({
                    url:"ambil_komentar.php",
                    method:"GET",
                    success:function(data){
                        $('#display_comment').html(data);
                    }, error: function(data) {
                        console.log(data.responseText)
                    }
                })
            }
 
            $(document).on('click', '.reply', function(){
                var komentar_id = $(this).attr("id");
                $('#komentar_id').val(komentar_id);
                $('#nama_pengirim').focus();
            });
        });
    </script>

</body>
</html>