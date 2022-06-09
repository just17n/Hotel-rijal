<?php
    $countUser = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalUser FROM table_user"));
    $countKamar = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalKamar FROM kamar"));
    $countFasilitas = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as totalFasil FROM fasilitas_hotel"));
    $countReservasi = mysqli_fetch_array(mysqli_query($db, "SELECT sum(jumlah_kamar) as totalkamar FROM tipe_kamar"));
?>
<div class="row">
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah User</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countUser['totalUser']; ?></h1>
                <p class="card-text">Jumlah guests yang telah mendaftar</p>
            </div>
            <div class="card-footer text-muted">
                <a href="?page=user" class="btn btn-sm btn-primary">Kelola User <i class="bi-person-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah Tipe Kamar </div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countKamar['totalKamar']; ?></h1>
                <p class="card-text">Jumlah kamar.</p>
            </div>
            <div class="card-footer text-muted">
                <a href="?page=kamar" class="btn btn-sm btn-primary">Kelola Kamar <i class="bi-collection-fill"></i></a>
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
            <div class="card-footer text-muted">
                <a href="?page=fasilitas_hotel" class="btn btn-sm btn-primary">Kelola Fasilitas <i class="bi-stars"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Jumlah kamar</div>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $countReservasi['totalkamar']; ?></h1>
                <p class="card-text">Jumlah seluruh kamar.</p>
            </div>
            <div class="card-footer text-muted">
                <a href="?page=tipe_kamar" class="btn btn-sm btn-primary">Kelola Reservasi <i class="bi-clipboard2-check-fill"></i></a>
            </div>
        </div>
    </div>
</div>