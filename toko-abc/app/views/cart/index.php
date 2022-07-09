<div class="container mt-3">
    <!-- <h1 class="mb-4 text-center" style="color:#21313C;">Halaman Pesanan</h1> -->
    <?php if(!empty($_SESSION['cart']['arrCart'])): ?>
        <div class="d-flex justify-content-evenly jumlah-data">
            <?php
                echo "<br><h4 class='text-center align-self-center'>Jumlah Produk dipesan : ".sizeof($_SESSION['cart']['arrCart']). "</h4>";
            ?>
            <a href="<?= BASEURL; ?>/cart/removeAll"><button class='btn btn-warning fs-5'>Remove All</button></a><br/><br />         
        </div>
        <div class="row justify-content-center">
            <table class="table justify-content-center" style="width: 80%">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $totalPrice = null;
                        $maxProduk = sizeof($_SESSION['cart']['arrCart']);
                    ?>
                    <?php for($i = 0; $i < $maxProduk; $i++): ?>
                        <tr scope="row">
                            <?php foreach($_SESSION['cart']['arrCart'][$i] as $key => $val): ?>
                                <?php 
                                    if($key == 'hrg') {
                                        $totalPrice += $val;
                                    }    
                                ?>
                                <td><?php echo $val ?></td>
                            <?php endforeach; ?>
                            <td><a href="<?= BASEURL; ?>/cart/removeItem/<?= $i;?>" class="btn btn-danger">Remove</a></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
                <?php
                    $total_bayar = number_format($totalPrice);
                    echo "<b><h3 class='text-center align-self-center mt-4 mb-5'>Total Pembayaran Sementara: Rp $total_bayar</h3></b>";
                ?>
            </table>
            
        </div>
        <div class="text-center">
            <a href="<?= BASEURL; ?>/home" class="btn btn-outline-primary justify-content-center fs-5 mx-1">Kembali ke halaman Produk</a>
            <a href="<?= BASEURL; ?>/home" class="btn btn-primary justify-content-center fs-5 mx-3">Checkout</a>
        </div>
        
    <?php else: ?>
        <h3 class='text-center align-self-center'>Keranjang Anda Kosong!</h3>
        <br>
        <div class='text-center'>
            <img src='<?= BASEURL; ?>/img/empty-cart.png' style='width: 200px;' class='rounded' alt='empty cart'>
        </div>";
        <h3 class='text-center align-self-center'>Silahkan memesan produk terlebih dahulu</h3>
    <?php endif ?>
</div>