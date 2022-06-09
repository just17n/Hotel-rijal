<?php
    //ekstrak variabel get
    include "../../db/db_connect.php";

    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
        $id_kamar = $_GET['id_kamar'];

        $query = mysqli_query($db,"SELECT * FROM table_user WHERE id=$id_user");
        $ekstrak = mysqli_fetch_array($query);

        $query_kamar = mysqli_query($db,"SELECT * FROM tipe_kamar WHERE id=$id_kamar");
        $ekstrak_kamar = mysqli_fetch_array($query_kamar);
 }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel Trio | Pesan Kamar</title>
        
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../../dist/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
    <body>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="kembali animate__animated animate__fadeInDown animate__fast">
                        <button class="btn btn-md btn-outline-dark btn-light" onclick="history.back();"><i class="bi-arrow-90deg-left"></i> Kembali</button>
                    </div>
                    <div class="card mt-3 animate__animated animate__fadeInUp animate__fast">
                        <div class="card-body">
                            <form class="row g-3" method="post">
                                <div class="col-md-2">
                                    <label for="id_user" class="form-label">id</label>
                                    <input type="text" class="form-control" id="id_user" name="id_user" autocomplete="off" value="<?= $ekstrak['id']; ?>" readonly="true">
                                </div>
                                <div class="col-md-2">
                                    <label for="id_kamar" class="form-label">id kamar</label>
                                    <input type="text" class="form-control" id="id_kamar" name="id_kamar" autocomplete="off" value="<?= $ekstrak_kamar['id']; ?>" readonly="true">
                                </div>
                                <div class="col-md-4">
                                    <label for="nm_tamu" class="form-label">Nama Tamu</label>
                                    <input type="text" class="form-control" id="nm_tamu" name="nm_tamu" autocomplete="off" value="<?= $ekstrak['email']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="jon@mail.com">
                                </div>
                                <div class="col-md-4">
                                    <label for="tipe_kamar" class="form-label">Tipe kamar </label>
                                    <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" readonly="true" value="<?= $ekstrak_kamar['tipe'];?>" >
                                </div>
                                <div class="col-md-4">
                                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" placeholder="081234567">
                                </div>
                                <div class="col-md-4">
                                    <label for="jml_pesan" class="form-label">Jumlah Kamar yang dipesan</label>
                                    <input type="number" class="form-control" id="jml_pesan" name="jml_pesan" autocomplete="off" placeholder="1-<?= $ekstrak_kamar['jumlah_kamar']; ?>" min="1" max="<?= $ekstrak_kamar['jumlah_kamar']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_in" class="form-label">Tanggal <i>Check-In</i></label>
                                    <input type="date" class="form-control" id="tgl_in" name="tgl_in" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_out" class="form-label">Tanggal <i>Check-Out</i></label>
                                    <input type="date" class="form-control" id="tgl_out" name="tgl_out" autocomplete="off">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="pesan" class="btn btn-primary animate__animated animate__pulse animate__repeat-3">Pesan Kamar <i class="bi-box-arrow-in-right"></i></button>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['pesan'])){
                                    $tgl_reserv = date("Y-m-d");
                                    $tgl_in = $_POST['tgl_in'];
                                    $tgl_out = $_POST['tgl_out'];
                                    $kd_kamar = $_POST['id_kamar'];
                                    $id_user = $_POST['id_user'];
                                    $nama_user = $_POST['nm_tamu'];
                                    $email = $_POST['email'];
                                    $telp = $_POST['no_telp'];
                                    $tipe = $_POST['tipe_kamar'];
                                    $jml = $_POST['jml_pesan'];

                                    echo $query_insert = "INSERT INTO reservasi VALUES(DEFAULT,'".$tgl_reserv."','".$tgl_in."','".$tgl_out."',$kd_kamar,$id_user,'".$nama_user."','".$email."','".$telp."','".$tipe."',$jml)";
                                    $exec = mysqli_query($db, $query_insert);
                                    if($exec){
                                        $sub_kamar = $ekstrak_kamar['jumlah_kamar'] - $jml;
                                        $update_kamar = mysqli_query($db, "UPDATE tipe_kamar SET jumlah_kamar=$sub_kamar WHERE tipe='".$tipe."'");
                                        if($update_kamar){
                                            ?>
                                                <script type="text/javascript">
                                                    // window.location.href = "?page=dashboard&?status=sukses";
                                                </script>
                                            <?php   
                                        } else {
                                            ?>
                                                <script type="text/javascript">
                                                    // window.location.href = "?page=dashboard&?status=gagal";
                                                </script>
                                            <?php   
                                        }
                                    } else {
                                        ?>
                                            <script type="text/javascript">
                                                // window.location.href = "?page=dashboard&?status=gagal";
                                            </script>
                                        <?php 
                                    }
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../../js/jquery-3.6.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>
</html>