<div class="container mt-3 mb-5 ps-4">
<div class="row">
<h1 class="mb-4">Daftar Produk</h1>
    <?php foreach ($data['produk'] as $p) : ?>
        <div class="col-4 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $p['gambar']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $p['nama_produk']; ?></h5>
                    <p class="card-text">Harga <?= number_format($p['harga']); ?></p>
                    <!-- <a href="<?= BASEURL; ?>/produk/addcart/<?= $p['id'];?>" class="btn btn-primary">Order</a> -->
                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>