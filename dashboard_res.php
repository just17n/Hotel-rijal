<?php
    $countUser = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalUser FROM table_user"));
    $countKamar = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(jumlah_kamar) as totalKamar FROM tipe_kamar"));
    $countFasilitas = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalFasil FROM fasilitas_hotel"));
    $countReservasi = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalReserv FROM reservasi"));
?>
<div class="row">
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah User</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countUser['totalUser']; ?></h1>
                <p class="card-text">Jumlah guests yang telah mendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah Kamar Tersedia</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countKamar['totalKamar']; ?></h1>
                <p class="card-text">Jumlah kamar.</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah Fasilitas</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countFasilitas['totalFasil']; ?></h1>
                <p class="card-text">Jumlah fasilitas yang tersedia.</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah Reservasi</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countReservasi['totalReserv']; ?></h1>
                <p class="card-text">Jumlah reservasi.</p>
            </div>
        </div>
    </div>
</div>