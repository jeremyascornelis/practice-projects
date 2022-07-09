<div class="container mt-3">
 <div class="row">
  <div class="col-12">
  <h1 class="mb-4 text-center" style="color:#21313C;">Daftar Riwayat Pesanan</h1>  
    <table class="table table-stripped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Jenis Pembayaran</th>
            <th scope="col">Jasa Pengiriman</th>
            <th scope="col">Jenis Paket</th>
            <th scope="col">Total Produk</th>
            <th scope="col">Total Bayar</th>
        </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($data['pesanan'] as $p) : ?>
            <!-- <?php $total = number_format($p['total_bayar']); ?> -->
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $p['jenis_pembayaran'];?></td>
            <td><?= $p['jasa_pengiriman'];?></td>
            <td><?= $p['jenis_paket'];?></td>
            <td><?= $p['total_produk'];?> produk</td>
            <td>Rp. <?= $total?></td>
            <?php $nomor += 1; ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>
</div>