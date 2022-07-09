<div class="container mt-3">
    <!-- <h1 class="mb-4 text-center" style="color:#21313C;">Halaman Pesanan</h1> -->
    <?php if(!empty($_SESSION['cart']['arrCart'])): ?>
        <div class="d-flex justify-content-evenly jumlah-data">
            <?php
                $totalProduk = sizeof($_SESSION['cart']['arrCart']);
                echo "<br><h4 class='text-center align-self-center'>Jumlah Produk dipesan : ".$totalProduk. "</h4>";
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
            <a href="<?= BASEURL; ?>/cart" class="btn btn-primary justify-content-center fs-5 mx-3 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal">Checkout</a>
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

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Form Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/cart/insData" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama Pemesan</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['user']['nama_user'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="text">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data['user']['alamat'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="<?= $data['user']['notelp'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="distrik">Distrik</label>
                    <input type="text" name="distrik" id="distrik" class="form-control" value="<?= $data['user']['distrik'] ?>" id-distrik="<?= $data['user']['id_distrik'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control" value="<?= $data['user']['provinsi'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="text" name="kodepos" id="kodepos" class="form-control" value="<?= $data['user']['kodepos'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="bayar">Jenis Pembayaran</label>
                    <select name="jenisbayar" id="bayar" class="form-control">
                        <option value="">Pilih Opsi</option>
                        <option name="bca" value="bca">BCA</option>
                        <option name="bri" value="bri">BRI</option>
                        <option name="tunai" value="tunai">Tunai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="norek">Nomor Rekening</label>
                    <input type="text" name="norek" id="norek" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jasakirim">Jasa Pengiriman</label>
                    <select name="jasakirim" id="jasakirim" class="form-control">
                        

                    </select>
                </div>
                <div class="form-group">
                    <label for="jenispaket">Jenis Paket</label>
                    <select name="jenispaket" id="jenispaket" class="form-control">
                        

                    </select>
                </div>
                <div class="form-group">
                    <label for="bkirim">Biaya Pengiriman</label>
                    <input type="text" name="bkirim" id="bkirim" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tbayar">Total Pembayaran</label>
                    <input type="text" name="tbayar" id="tbayar" class="form-control">
                </div>
                <input type="hidden" id="iduser" name="iduser" value="<?= $data['user']['iduser'];?>">
                <input type="hidden" id="total_produk" name="total_produk" value="<?= $totalProduk;?>">
                <input type="hidden" id="total_bayar" name="total_bayar">
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("select[name=jenisbayar]").on("change", function() {
            let jenis_pembayaran = $("select[name=jenisbayar]").val();
            if(jenis_pembayaran == "tunai") {
                document.getElementById("norek").disabled = true;
            } else {
                document.getElementById("norek").disabled = false;
            }
        });

        $.ajax({
            type: 'post',
            url: '<?= BASEURL; ?>/cart/getDataEkspedisi',
            success: function(hasil_ekspedisi) {
                $("select[name=jasakirim]").html(hasil_ekspedisi);
                // console.log(hasil_ekspedisi);
            }
        });
        $("select[name=jasakirim]").on("change", function() {
            let ekspedisi_terpilih = $("select[name=jasakirim]").val();
            // console.log(ekspedisi_terpilih);
            let distrik_terpilih = $("input[name=distrik]").attr('id-distrik');
            // console.log(distrik_terpilih);
            $.ajax({
                type: 'post',
                url: '<?=BASEURL;?>/cart/getDataPaket',
                data: 'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat=1',
                success: function(hasilpaket) {
                    // console.log(hasilpaket);
                    $("select[name=jenispaket]").html(hasilpaket);
                }
            });
        })
        $("select[name=jenispaket").on("change", function() {
            let ekspedisi_terpilih = $("select[name=jasakirim]").val();
            let id_paket_terpilih = $("option:selected",this).attr("id_paket");
            let distrik_terpilih = $("input[name=distrik]").attr('id-distrik');
            // console.log(id_paket_terpilih);
            let total_harga = <?php echo json_encode($totalPrice) ?>;
            // console.log(total_harga);
            let berat_produk = 1;

            $.ajax({
                type: 'post',
                url: '<?=BASEURL;?>/cart/getDataOngkir',
                data: 'paket='+id_paket_terpilih+'&ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+berat_produk,
                success: function(hasilongkir) {
                    document.getElementById("bkirim").value = "Rp. " + parseInt(hasilongkir).toLocaleString();
                    // console.log(hasilongkir);
                    let totalBayar = parseInt(total_harga) + parseInt(hasilongkir);
                    document.getElementById("tbayar").value = "Rp. " + parseInt(totalBayar).toLocaleString();
                    document.getElementById("total_bayar").value = totalBayar;
                    // console.log(totalBayar);
                    // $("select[name=jenispaket]").html(hasilpaket);
                }
            });
        })
    });
</script>