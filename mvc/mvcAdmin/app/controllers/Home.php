<?php

class Home extends Controller {
    public function index() {
        // session_start();
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index');
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('user/login');
            $this->view('templates/footer');
        }
    }
}