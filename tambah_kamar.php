<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Trio | Tambah Kamar</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../dist/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include "../../db/db_connect.php";
        $cek_kamar = mysqli_query($db, "SELECT COUNT(*) as total_kamar FROM kamar");
        $ekstrak_cek = mysqli_fetch_array($cek_kamar);
        $total_kamar = $ekstrak_cek['total_kamar'];
    ?>
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
                                <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" readonly="true" value="<?= $total_kamar+1; ?>">
                            </div>
                            <div class="col-md-8">
                                <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                <select class="form-select" aria-label="Pilih Tipe Kamar" name="tipe_kamar">
                                    <option selected>Pilih Kamar</option>
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Suite">Suite</option>
                                    <option value="VIP">VIP</option>
                                    <option value="VVIP">VVIP</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label for="harga" class="form-label">Harga kamar /malam</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Rp.</span>
                                    <input type="text" class="form-control" id="harga" name="harga" autocomplete="off" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="file_gambar_kamar" class="form-label">Gambar</label>
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

                                $query = "INSERT INTO kamar VALUES($kode_kamar,'".$tipe."',$harga,'".$file."')";
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