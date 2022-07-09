<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Checkout</title>
  </head>
  <body>
    <div class="container">
        <h3>Data belanjaan</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                </tr>
            </tbody>
        </table>

        <h3>Alamat</h3>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select class="form-control" name="nama_provinsi">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="provinsi">Distrik</label>
                        <select class="form-control" name="nama_distrik">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="nama_ekspedisi" class="form-control">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="nama_paket" class="form-control">

                        </select>
                    </div>
                </div>
            </div>
            <input type="text" name="total_berat" value="1200" hidden>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'post',
                url: 'dataprovinsi.php',
                success: function(hasil_provinsi) {
                    // console.log(hasil);
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change", function() {
                // alert("change provinsi");
                //get id_provinsi that has been change
                let id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'datadistrik.php',
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_distrik) {
                        // console.log(hasil_distrik);
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                });

                $.ajax({
                    type: 'post',
                    url: 'dataekspedisi.php',
                    success: function(hasil_ekspedisi) {
                        // console.log(hasil_ekspedisi);
                        $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                    }
                });

                $("select[name=nama_ekspedisi]").on("change", function() {
                    //get data ongkir

                    //get ekspedisi
                    let ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                    
                    //get id_distrik that has been chosen
                    let distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
                    
                    //get total_berat from weight
                    let total_berat = $("input[name=total_berat]").val();
                    $.ajax({
                        type: 'post',
                        url: 'dataongkir.php',
                        data: 'ekspedisi='+ ekspedisi_terpilih +'&distrik='+ distrik_terpilih +'&berat='+ total_berat,
                        success: function(hasil_paket) {
                            // console.log(hasil_paket);
                            $("select[name=nama_paket]").html(hasil_paket);
                        }
                    });
                })
            });
        });
    </script>
  </body>
</html>