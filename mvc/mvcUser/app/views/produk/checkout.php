<div class="container mt-3 ps-4">
    <h1>Halaman Order</h1>
    <div class="d-flex flex-row">
        
        <div class="row mt-5 mr-5  px-4">
       
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalPrice = null;?>
                <?Php $max=sizeof($_SESSION['cart']['arrCart']) ?>
                <?Php for ($i=0;$i<$max;$i++) : ?>
                    <tr scope="row">
                        <?Php foreach($_SESSION['cart']['arrCart'][$i] as $key => $val) :?>	
                            <?php 
                            if($key == 'hrg') {
                                $totalPrice += $val;
                            }
                            ?>
                            <td>
                                <?Php echo $val; ?>
                            </td>
                            <?Php endforeach; ?>
                    </tr>
                    <?Php endfor; ?>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Total Pembayaran:
                        </td>
                        <td>
                            <?php echo $totalPrice; ?>
                        </td>
                    </tr>
            </tbody>
        
        </table>
        </div>

        <div class="row mt-5 px-5">
        <h1>Form Checkout</h1>
            <form action="<?= BASEURL; ?>/produk/tambahpesanan" method="post" enctype="multipart/form-data"> 
                <div class="mb-3">
                <label for="l2" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="nama" name="tnama" value="<?= $data['pemesan']['nama_member'];?>" readonly>
                </div>	
                <div class="mb-3">
                <label for="l5" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="ket" name="talamat" value="<?= $data['pemesan']['alamat'];?>" readonly> 
                </div>
                <div class="mb-3">
                <label for="l4" class="form-label">Telp</label>
                <input type="text" class="form-control" id="jml" name="ttelp"  value="<?= $data['pemesan']['telp'];?>" readonly> 
                </div>
                <div class="mb-3">
                <label for="l7" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="nama" name="tprovinsi" value="<?= $data['pemesan']['provinsi'];?>" readonly>
                </div>	
                <div class="mb-3">
                <label for="bayar" class="form-label">Jenis Pembayaran</label>
                    <select name="tbayar" id="bayar" class="form-control">
                        <option value="TransferBank">Transfer Bank</option>
                        <option value="GoPay">E-Wallet GoPay</option>
                    </select>
                </div>
                <div class="mb-3">
                <label for="l7" class="form-label">No Rek/E-Wallet</label>
                <input type="text" class="form-control" id="nama" name="tnorek">
                </div>	
                <div class="mb-3">
                <label for="jasakirim" class="form-label">Jasa Pengiriman</label>
                    <select name="tjasakirim" id="bayar" class="form-control">
                        <option value="jne">JNE</option>
                        <option value="jntexpress">J&T Express</option>
                    </select>
                </div>
                <div class="mb-3">
                <label for="l7" class="form-label">Biaya Pengiriman</label>
                <input type="text" class="form-control" id="nama" name="tbiayajasa">
                </div>	
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"> Checkout </button>
                </div>		
            </form>
        </div>
    </div>

        <a href="<?= BASEURL; ?>/produk/displaycart" class="btn btn-primary">Back to Cart</a>
        
</div>