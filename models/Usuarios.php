<?php

/**
 * Classe Model Usuarios
 */
class Usuarios {

    private $userInfo;

    /**
     * 
     * @return true caso o usuário esteja logado no sistema e false caso não seja localizado sessao de usuário
     */
    public function isLogged() {
        if (isset($_SESSION['sessionUser']) && !empty($_SESSION['sessionUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function fazerLogin($login, $password) {
        $r = new Read();
        $r->FullRead("select * from usuarios where login = '$login' and password = md5('$password') ");

        if ($r->getRowCount() == 1) {
            $_SESSION['sessionUser'] = $r->getResult();
            return true;
        } else {
            return false;
        }
    }

 

    public function confirmaUsuarioLogado() {
        if (isset($_SESSION['sessionUser']) && !empty($_SESSION['sessionUser'])) {
            $this->userInfo = $_SESSION['sessionUser'];
            return $this->userInfo;
        }
    }

    public function getUserPerfil() {
        $u = $this->confirmaUsuarioLogado();
        return $u[0]['perfil'];
    }

    public function logout() {
        unset($_SESSION['sessionUser']);
    }



}
