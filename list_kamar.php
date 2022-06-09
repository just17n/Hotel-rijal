<div class="row">
<?php 
    include "../../db/db_connect.php";

    $query_load_hotel = mysqli_query($db, "SELECT kamar.kode_kamar, kamar.tipe, kamar.harga, kamar.image, tipe_kamar.fasilitas, tipe_kamar.jumlah_kamar FROM kamar INNER JOIN tipe_kamar ON kamar.tipe = tipe_kamar.tipe");
    while($ext = mysqli_fetch_array($query_load_hotel))  {
        ?>
            <div class="col-lg-6">
                <div class="card border-secondary animate__animated animate__fadeInUp animate__fast">
                    <div class="row g-0">
                        <div class="col-md-6">
                        <img src="../../images/kamar/<?= $ext['image']; ?>" class="img-fluid rounded-start rounded-end">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body mb-3">
                                <h3 class="card-title"><b><?= $ext['tipe']; ?></b></h3>
                                <h6 class="card-text text-success"><b>Rp. <?= $ext['harga']; ?> /malam</b></h6>
                                <p class="card-text mt-3">Fasilitas :
                                    <?php
                                    //    $fas = $ext['fasilitas'];
                                    $txt_fas = explode(",",$ext['fasilitas']);
                                    $jml = count($txt_fas);
                                       for($a=0; $a<$jml;$a++){
                                        ?>
                                            <ul>
                                                <li><?= $txt_fas[$a]; ?></li>
                                            </ul>
                                        <?php
                                       }
                                    ?>
                                </p>
                                <p class="card-text"><span class="badge rounded-pill bg-warning">Tersisa <?= $ext['jumlah_kamar']; ?> kamar.</span></p>
                                <a class="btn btn-sm btn-outline-success ml-3 animate__animated animate__pulse animate__repeat-3" href="?page=order&id_kamar=<?= $ext['kode_kamar']; ?>&id_user=<?= $id; ?>">Pesan Kamar Ini <i class="bi-box-arrow-in-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
</div>