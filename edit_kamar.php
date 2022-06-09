<?php
    include "../../db/db_connect.php";

    if(isset($_GET['id'])){
        $kode_kamar = $_GET['id'];

        $query = mysqli_query($db,"SELECT * FROM kamar WHERE kode_kamar=$kode_kamar");
        $ekstrak = mysqli_fetch_array($query);

    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Edit Kamar</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../dist/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="kembali">
                    <button class="btn btn-md btn-outline-dark btn-light" onclick="history.back();"><i class="bi-arrow-90deg-left"></i> Kembali</button>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="kd_kamar" class="form-label">Kode Kamar</label>
                                <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" readonly="true" value="<?= $ekstrak['kode_kamar']; ?>">
                            </div>
                            <div class="col-md-8">
                                <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                <select class="form-select" aria-label="Pilih Tipe Kamar" name="tipe_kamar">
                                    <option selected>Pilih Kamar</option>
                                    <option value="Single" <?= ($ekstrak['tipe'] == 'Single')? 'selected':''; ?> >Single</option>
                                    <option value="Double" <?= ($ekstrak['tipe'] == 'Double')? 'selected':''; ?> >Double</option>
                                    <option value="Suite" <?= ($ekstrak['tipe'] == 'Suite')? 'selected':''; ?> >Suite</option>
                                    <option value="VIP" <?= ($ekstrak['tipe'] == 'VIP')? 'selected':''; ?> >VIP</option>
                                    <option value="VVIP" <?= ($ekstrak['tipe'] == 'VVIP')? 'selected':''; ?> >VVIP</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="harga" class="form-label">Harga kamar /malam</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Rp.</span>
                                    <input type="text" class="form-control" id="harga" name="harga" autocomplete="off" aria-describedby="basic-addon3" value="<?= $ekstrak['harga']; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="gambar_kamar" class="form-label">Gambar Saat Ini</label>
                                <img src="../../images/kamar/<?= $ekstrak['image']; ?>" class="rounded" width="250" id="gambar_kamar">
                            </div>
                            <div class="col-4">
                                <label for="file_gambar_kamar" class="form-label">Upload Gambar</label>
                                <input type="file" name="gambar_kamar" id="gambar_kamar" class="form-control">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="tambah" class="btn btn-primary">Tambahkan Kamar</button>
                            </div>
                        </form>
                        <?php
                        
                            if(isset($_POST['tambah'])){
                                $kode_kamar = $_POST['kd_kamar'];
                                $tipe = $_POST['tipe_kamar'];
                                $harga = $_POST['harga'];

                                $file = $_FILES['gambar_kamar']['name'];
                                $tmp_file = $_FILES['gambar_kamar']['tmp_name'];

                                $query = "UPDATE kamar SET tipe='".$tipe."', harga=$harga, image='".$file."' WHERE kode_kamar=$kode_kamar";
                                $exec = mysqli_query($db, $query);
                                if($exec){
                                    if(!empty($file)){
                                        $locate = "../../images/kamar/";
                                        move_uploaded_file($tmp_file,$locate.$file);
                                        ?>
                                            <script type="text/javascript">
                                                window.location.href = "index.php?page=kamar";
                                            </script>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Maaf!</strong> Gambar tidak boleh kosong
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                    }
                                    
                                } else {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Maaf!</strong> tambah kamar gagal
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
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