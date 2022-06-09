<?php    

$query = mysqli_query($db, "SELECT * FROM reservasi");

    echo $ekstrak['id_user'];
    echo $ekstrak['tgl_in'];
    echo $ekstrak['tgl_out'];

    ?>
<div class="col-md-6">
        <div class="card border-primary mb-6">
            <div class="card-header">Hasil Reservasi</div>
            <div class="card-body text-primary">
                <h1 class="card-title"></h1>
                <p class="card-text">hasil reservasi anda</p>
            </div>
        </div>
    </div>
<?php?>