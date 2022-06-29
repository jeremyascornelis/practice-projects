<?php

class Produk extends Controller {
    public function index(){
      $data['judul'] = 'Daftar Produk';
      $data['produk'] = $this->model('Produk_model')->getAllProduct();
      $this->view('templates/header', $data);
      $this->view('produk/index', $data);
      $this->view('templates/footer'); 
    }

    public function displaycart() {
      if(isset($_SESSION["id"])) {
        $data['judul'] = 'Detail Pesanan';
        $this->view('templates/header', $data);
        $this->view('produk/displaycart');
        $this->view('templates/footer');
      } else {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('user/login');
        $this->view('templates/footer');
      }
    }

    public function checkout() {
      if(isset($_SESSION["id"])) {
        $data['judul'] = 'Checkout';
        $id = $_SESSION['id'];
        $data['pemesan'] = $this->model('Member_model')->getMemberById($id);
        $this->view('templates/header', $data);
        $this->view('produk/checkout', $data);
        $this->view('templates/footer');
      } else {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('user/login');
        $this->view('templates/footer');
      }
    }

    public function addcart($id) {
      $data['judul'] = 'Detail Pesanan';
      $data['produk'] = $this->model('Produk_model')->getProductById($id);
      $brg = $data['produk']['nama'];
      $hrg = $data['produk']['hrg'];
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
    
      header("location:".BASEURL."\produk\displaycart");
    }

    public function removeall() {
      unset($_SESSION['cart']);
      header("location:".BASEURL."\produk\displaycart");
    }

    public function tambahpesanan() {
      $this->model('Produk_model')->tambahDataPesanan($_POST);
      header('Location: ' . BASEURL . '/home');
      // if($this->model('Produk_model')->tambahDataPesanan($_POST) > 0) {
      //     //set flash message
      //     Flasher::setFlash('berhasil','checkout','success');
      //     header('Location: ' . BASEURL . '/home');
      //     exit;
      // } else {
      //     Flasher::setFlash('gagal','checkout','danger');
      //     header('Location: ' . BASEURL . '/home');
      //     exit;
      // }
    }
   
    public function detail($id){
      $data['judul'] = 'Detail Produk';
      $data['produk'] = $this->model('Produk_model')->getProductById($id);
      $this->view('templates/header', $data);
      $this->view('produk/detail', $data);
      $this->view('templates/footer');
    }

    public function tambah() {
      if($this->model('Produk_model')->add($_POST, $_FILES['foto'])) {
          //set flash message
          Flasher::setFlash('berhasil','ditambahkan','success');
          header('Location: ' . BASEURL . '/produk');
          exit;
      } else {
          Flasher::setFlash('gagal','ditambahkan','danger');
          header('Location: ' . BASEURL . '/produk');
          exit;
      }
    }

    public function edit($id){

      $data['judul'] = 'Detail Produk';
      $data['produk'] = $this->model('Produk_model')->getProductById($id);
      $this->view('templates/header', $data);
      $this->view('produk/edit', $data);
      $this->view('templates/footer');
    }

    public function updProduk(){  
      $this->model('Produk_model')->edit($_POST,$_FILES['foto']);
      header("location:".BASEURL."/produk");
    }
    
    public function delProduk($id){       
      $this->model('Produk_model')->del($id);	
      header("location:".BASEURL."/produk");
    }

    public function cari() {
      $data['judul'] = 'Daftar Produk';
      $data['produk'] = $this->model('Produk_model')->cariDataProduk();
      $this->view('templates/header', $data);
      $this->view('produk/index', $data);
      $this->view('templates/footer');
    }
}