<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Produk';
        $data['produk'] = $this->model('Produk_model')->getAllProduct();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}