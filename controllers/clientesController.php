<?php

require_once 'Helpers.php';

class clientesController extends controller {

    public function __construct() {
        $u = new Usuarios();
        if ($u->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
        }
    }

    public function Listar() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();
        if ($data['info'][0]['perfil'] == 'ADMIN') {
            $this->loadTemplate('Clientes/listarView', $data);
        } elseif ($data['info'][0]['perfil'] == 'COMUN') {
            $this->loadTemplate('Clientes/listarComunView', $data);
        }
    }

    public function getAllClientes() {
        $c = new Clientes();
        $dados = $c->getAllClientes();
        echo json_encode($dados);
    }

    public function getClienteId($id) {
        $c = new Clientes();
        $dados = $c->getClienteId($id);
        echo json_encode($dados);
    }

    public function adicionarCliente() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);

            $h = new Helpers();

            if (!empty($decoded[0]['value']) && !empty($decoded[1]['value']) && !empty($decoded[2]['value']) && !empty($decoded[3]['value']) && !empty($decoded[4]['value']) && !empty($decoded[5]['value']) && !empty($decoded[6]['value']) && !empty($decoded[7]['value']) && !empty($decoded[9]['value'])) {

                $c = new Clientes();
                $dados = array('nome' => $decoded[0]['value'], 'cpf_cnpj' => $h->trataCpfCnpj($decoded[1]['value']), 'email' => $decoded[2]['value'], 'cep' => $decoded[3]['value'], 'localidade' => $decoded[4]['value'], 'estado' => $decoded[5]['value'], 'logradouro' => $decoded[6]['value'], 'bairro' => $decoded[7]['value'], 'numero' => $decoded[8]['value'], 'telefone1' => $decoded[9]['value'], 'telefone2' => $decoded[10]['value'], 'usuarios_id' => $data['info'][0]['id']);
                $c = $c->addCliente('clientes', $dados);

                if ($c == TRUE) {
                    $data['color'] = "#5cb85c";
                    $data['msg'] = "Cliente cadastrado com sucesso!";
                } else {
                    $data['color'] = "#f56954";
                    $data['msg'] = "Falha ao cadastrar cliente";
                }
                $this->loadView('msgView', $data);
                exit();
            } else {
                $data['color'] = "#f56954";
                $data['msg'] = "Você deve preencher todos os campos!";
                $this->loadView('msgView', $data);
                exit();
            }
        } else {
            $this->loadTemplate('Clientes/listarView', $data);
        }
    }

    public function returnCep($cep) {
        $c = new clientes();
        $json = $c->getCep($cep);
        print_r($json);
    }

    public function atualizarCliente() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);
            $h = new Helpers();

            if (!empty($decoded[0]['value']) && !empty($decoded[1]['value']) && !empty($decoded[2]['value']) && !empty($decoded[3]['value']) && !empty($decoded[4]['value']) && !empty($decoded[5]['value']) && !empty($decoded[6]['value']) && !empty($decoded[7]['value']) && !empty($decoded[9]['value'])) {

                $c = new Clientes();
                $dados = array('nome' => $decoded[1]['value'], 'cpf_cnpj' => $h->trataCpfCnpj($decoded[2]['value']), 'email' => $decoded[3]['value'], 'cep' => $decoded[4]['value'], 'localidade' => $decoded[5]['value'], 'estado' => $decoded[6]['value'], 'logradouro' => $decoded[7]['value'], 'bairro' => $decoded[8]['value'], 'numero' => $decoded[9]['value'], 'telefone1' => $decoded[10]['value'], 'telefone2' => $decoded[11]['value'], 'usuarios_id' => $data['info'][0]['id']);
                $c = $c->atualizarCliente('clientes', $dados, $decoded[0]['value']);

                if ($c == TRUE) {
                    $data['color'] = "#5cb85c";
                    $data['msg'] = "Cliente atualizado com sucesso!";
                } else {
                    $data['color'] = "#f56954";
                    $data['msg'] = "Falha ao atualizar cliente";
                }
                $this->loadView('msgView', $data);
                exit();
            } else {
                $data['color'] = "#f56954";
                $data['msg'] = "Você deve preencher todos os campos!";
                $this->loadView('msgView', $data);
                exit();
            }
        } else {
            $this->loadTemplate('Clientes/listarView', $data);
        }
    }

    public function inativarCliente() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);

            $c = new Clientes();
            $dados = array('status_cliente' => '0');
            $c = $c->atualizarCliente('clientes', $dados, $decoded['id']);

            if ($c == TRUE) {
                $data['color'] = "#5cb85c";
                $data['msg'] = "Cliente removido com sucesso!";
            } else {
                $data['color'] = "#f56954";
                $data['msg'] = "Falha ao remover cliente";
            }
            $this->loadView('msgView', $data);
            exit();
        } else {
            $this->loadTemplate('Clientes/listarView', $data);
        }
    }


}
