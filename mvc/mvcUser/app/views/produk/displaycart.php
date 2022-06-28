
<div class="container mt-3">
    <h1>Halaman Order</h1>
    <a href="<?= BASEURL; ?>/produk"><button class='btn btn-primary fs-5 mt-3'>Kembali ke Halaman Produk</button></a>
    <div class="justify-content-center">
            <br>
            <?php
            if(!empty($_SESSION['cart']['arrCart'])) {
                ?>
                <div class="d-flex justify-content-evenly jumlah-data">
                    <?php
                    echo "<br><h4 class='text-center align-self-center'>Number of Products : ".sizeof($_SESSION['cart']['arrCart']). "</h4>";
                    ?>
                    <a href="<?= BASEURL; ?>/produk/removeall"><button class='btn btn-warning fs-5'>Remove All</button></a><br/><br />
                    
                </div>
                <br><br>
                    <?php
                    $max = sizeof($_SESSION['cart']['arrCart']);
                    echo "<table class='table table-striped table-bordered' style='margin-bottom:50px;'>
                    <thead>
                        <tr >
                            <th scope='col'>Nama Produk</th>
                            <th scope='col'>Jumlah Pesanan</th>
                            <th scope='col'>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    $totalPrice = null;
                    for($i = 0; $i < $max; $i++) {
                        ?>
                        <tr>
                        <?php foreach($_SESSION['cart']['arrCart'][$i] as $key => $val): ?>
                            <td style='font-size: 20px;'><?php echo "$val";?></td>
                            <?php 
                                if($key == 'hrg') {
                                    $totalPrice += $val;
                                }
                            ?>
                        <?php endforeach ?>
                        </tr>
                        <?php
                    }
                    echo "</tbody>";
                    echo "<b><h3 class='text-center align-self-center'>Total Pembayaran Sementara: Rp $totalPrice</h3></b>";
                    echo "<br>";
            } else {
                echo "<h3 class='text-center align-self-center'>Cart Anda Kosong!</h3>";
                echo "<br>"; ?>
                <div class='text-center'>
                    <img src='<?= BASEURL; ?>/img/empty-cart.png' style='width: 200px;' class='rounded' alt='empty cart'>
                </div>";
                <?php
                echo "<h3 class='text-center align-self-center'>Silahkan Order pada Halaman Produk</h3>";
            }
            ?>
    </div>
</div>