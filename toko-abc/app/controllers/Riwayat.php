<?php

class Riwayat extends Controller{
    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Histori Pesanan';
            $data['pesanan'] = $this->model('Riwayat_model')->getAllTransaksiById($_SESSION["iduser"]);
            $this->view('templates/header2', $data);
            $this->view('riwayat/index', $data);
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('login/index', $data);
            $this->view('templates/footer');
        }
    }
}