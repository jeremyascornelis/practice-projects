<?php

class User extends Controller {

    public function index() {
        $data['judul'] = 'Data User';
        $data['user'] = $this->model("User_model")->getAllUser();
        // $data->view('templates/header', $data);
        // $data->view('User/index');
        // $data->view('templates/footer');
    }

    public function prosesLogin() {
        if(isset($_POST["tuser"])) {
            $user = $_POST["tuser"];
            $pass = $_POST["tpass"];
            $data['user'] = $this->model('User_model')->cekUser($user, $pass);
            if(!$data['user']) {
                echo "User Tidak Valid!";
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