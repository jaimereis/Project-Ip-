<?php

class loginController extends controller {

    public function index() {
        $data = array();

        if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $login = addslashes($_POST['login']);
            $password = addslashes($_POST['password']);

            $u = new Usuarios();

            if ($u->fazerLogin($login, $password)) {
                header("Location:" . BASE_URL);
                exit();
            } else {
                $data['error'] = "Usuário e ou senha incorretos!";
            }
        }

        $this->loadView('login', $data);
    }

    public function logout() {
        $u = new Usuarios();
        $u->logout();
        header("Location: " . BASE_URL);
    }


}
