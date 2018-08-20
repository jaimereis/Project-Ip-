<?php

class homeController extends controller {

    public function __construct() {

        $u = new Usuarios();
        if ($u->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
        }
    }

    public function index() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();
        
        $this->loadTemplate('home', $data);
    }


}
