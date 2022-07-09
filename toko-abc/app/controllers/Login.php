<?php

class Login extends Controller {
    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Produk';
            $data['produk'] = $this->model('Produk_model')->getAllProduct();
            $this->view('templates/header2', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('login/index');
            $this->view('templates/footer');
        }
    }

    public function prosesLogin() {
        if(isset($_POST['username'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $data["user"] = $this->model('Login_model')->cekUser($username, $password);
            if(!$data["user"]) {
                echo "<script>alert('User tidak valid! Silahkan login ulang!');
                window.location.href = '". BASEURL ."/home';
                </script>";
            } else {
                $_SESSION["iduser"] = $data["user"]["iduser"];
                header("location:".BASEURL."\home");
            }
        }
    }

    public function logout() {
        session_destroy();
        header("location:".BASEURL."\home");
    }
}