<?php
if(empty($_SESSION['cart']['arrCart']))
    $_SESSION['cart']['arrCart'] = array();
?>

<div class="container mt-3 mb-5 ps-4">
<div class="row">
<h1 class="mb-4">Daftar Produk</h1>
    <?php foreach ($data['produk'] as $p) : ?>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= BASEURL2; ?>/img/daun/<?= $p['foto']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $p['nama']; ?></h5>
                    <p class="card-text">Harga <?= number_format($p['hrg']); ?></p>
                    <a href="<?= BASEURL; ?>/produk/addcart/<?= $p['id'];?>" class="btn btn-primary">Order</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>