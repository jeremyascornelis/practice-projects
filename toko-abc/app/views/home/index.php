<?php
    //get user first name
    $namauser = explode(' ', $data['user']['nama_user']);
    $namadepan = $namauser[0];

    //create session for cart
    if(empty($_SESSION['cart']['arrCart'])) {
        $_SESSION['cart']['arrCart'] = array();
    }
        
?>
<div class="container mt-3 mb-5 ps-4">
<div class="row">
<h1 class="mb-4 text-center" style="color:#21313C;">Selamat Berbelanja, <span style="color: #EE5B2E;"><?= $namadepan ?></span></h1>
    <?php foreach ($data['produk'] as $p) : ?>
        <div class="col-4 mb-3">
            <div class="card shadow p-3 mb-5 bg-white rounded" >
                <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $p['gambar']; ?>" alt="Card image cap" width="200px">
                <div class="card-body">
                    <h5 class="card-title fs-3"><?= $p['nama_produk']; ?></h5>
                    <p class="card-text fs-5"><?= $p['deskripsi'];?></p>
                    <h6 class="card-text fs-4 mb-4">Rp. <?= number_format($p['harga']); ?></h6>
                    <!-- <a href="<?= BASEURL; ?>/produk/addcart/<?= $p['id'];?>" class="btn btn-primary">Order</a> -->
                    <a href="<?= BASEURL; ?>/cart/addcart/<?= $p['idproduk'];?>" class="btn btn-primary text-center fs-5" >Masukkan Keranjang</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>