<?php

class Cart extends Controller {

    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Keranjang';
            $this->view('templates/header2', $data);
            $this->view('cart/index');
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('login/index');
            $this->view('templates/footer');
        }
    }


    public function addcart($id) {
        $data['judul'] = 'Detail Pesanan';
        $data['produk'] = $this->model('Produk_model')->getProductById($id);
        $brg = $data['produk']['nama_produk'];
        $hrg = $data['produk']['harga'];
        $jml = 1;
  
          if(!empty($_SESSION['cart']['arrCart'])) {
              $max = sizeof($_SESSION['cart']['arrCart']);
              $find = false;
              for($i = 0; $i < $max; $i++) {
                  $cari = array_search($brg, $_SESSION['cart']['arrCart'][$i]);
                  if($cari) {
                      $_SESSION['cart']['arrCart'][$i]['jml'] += 1;
                      $_SESSION['cart']['arrCart'][$i]['hrg'] *=  $_SESSION['cart']['arrCart'][$i]['jml'];
                      $find=true;
                      break;
                  }
              }
            }
  
          if(!$find) {
              $item = array('nmProduk' => $brg, 'jml' => $jml, 'hrg' => $hrg);
              array_push($_SESSION["cart"]["arrCart"], $item);
          }
      
        header("location:".BASEURL."\cart");
    }
  
    public function removeAll() {
        unset($_SESSION['cart']);
        header("location:".BASEURL."\cart");
    }

    public function removeItem($id) {
        $data = $_SESSION["cart"]["arrCart"];
        unset($data[$id]);
        $_SESSION["cart"]["arrCart"] = array_merge($data);
        header("location:".BASEURL."\cart");
    }
}