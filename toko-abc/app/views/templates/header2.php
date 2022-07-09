<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h1><a href="<?= BASEURL;?>" class="navbar-brand mb-0 h1 fs-2" style="font-size: 30px; color:#21313C;"><b>ABC Bag Store</b></a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-4" aria-current="page" href="<?= BASEURL; ?>/cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="<?= BASEURL;?>/riwayat">Histori Transaksi</a>
                    </li>
                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?= BASEURL;?>/produk/displaycart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?= BASEURL;?>/about">About</a>
                    </li> -->
                </ul>
                <span class="navbar-text">
                <button class="btn btn-danger me-5"><a href="<?= BASEURL;?>/login/logout" style="color: #fff; font-size: 16px; text-decoration:none;">Logout</a></button>
                </span>
            </div>
        </div>
    </nav>
</div>