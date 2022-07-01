
<?php

class User extends Controller {

    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Data User';
            $data['user'] = $this->model("User_model")->getAllUser();
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('user/login');
            $this->view('templates/footer');
        }
        
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
                echo "<script>alert('User tidak valid! Silahkan login ulang!');
                window.location.href = '". BASEURL ."/home';
                </script>";
                // header("Refresh: 0.3; URL='". BASEURL ."'/home");
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
