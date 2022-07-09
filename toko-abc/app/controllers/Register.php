<?php

class Register extends Controller {
    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Produk';
            $data['produk'] = $this->model('Produk_model')->getAllProduct();
            $this->view('templates/header2', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Registrasi';
            $this->view('templates/header', $data);
            $this->view('register/index', $data);
            $this->view('templates/footer');
        }
    }

    public function getDataProvinsi() {
        $this->view('register/data/dataprovinsi');
    }

    public function getDataDistrik() {
        $this->view('register/data/datadistrik');
    }

    public function getDataKodePos() {
        $this->view('register/data/datakodepos');
    }

    public function daftar() {
        $this->model('Register_model')->addData($_POST);
        header('Location: ' . BASEURL . '/login');
    }

}