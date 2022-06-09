<?php
error_reporting(1);
  if(isset($_GET['status'])){
    $status = $_GET['status'];

    ?>
    <div class="alert alert-<?php echo ($status=='sukses')? 'success':'danger'; ?> alert-dismissible fade show animate__animated animated__fadeInDown" role="alert">
      <?php 
        if($status=="sukses"){
          ?>
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <?php
        } else {
          ?>
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <?php
        }
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }
?>

<div class="card border-success">
  <div class="card-body mt-5 mb-5">
    <h1 class="card-title text-center">Selamat datang di Hotel Trio!</h1>
    <p class="card-text text-center">Berikut daftar kamar yang tersedia</p>
  </div>
</div>
<div class="row mt-5">
<?php 
    include "../../db/db_connect.php";

    $query_load_hotel = mysqli_query($db, "SELECT * from fasilitas_hotel ");
    while($ext = mysqli_fetch_array($query_load_hotel))  {
        ?>
            <div class="col-lg-6">
                <div class="card border-secondary animate__animated animate__fadeInUp animate__fast">
                    <div class="row g-0">
                        <div class="col-md-6">
                        <img src="../../images/fasilitas/<?= $ext['image']; ?>" class="img-fluid rounded-start rounded-end">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body mb-3">
                                <h2 class="card-title"><b><?= $ext['nama_fasilitas']; ?></b></h2>
                                <h3 class="card-title"><?= $ext['keterangan']; ?></h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
</div>