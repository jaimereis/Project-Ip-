<?php

require_once 'Helpers.php';

class produtosController extends controller {

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
        $this->loadTemplate('Produtos/listarView', $data);
    }

    public function getAllProdutos() {
        $c = new Produtos();
        $dados = $c->getAllProdutos();
        echo json_encode($dados);
    }

    public function getProdutoId($id) {
        $c = new Produtos();
        $dados = $c->getProdutoId($id);
        echo json_encode($dados);
    }

    public function adicionarProduto() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);

            if (!empty($decoded[0]['value']) && !empty($decoded[1]['value']) && !empty($decoded[2]['value']) && !empty($decoded[3]['value']) && !empty($decoded[4]['value']) && !empty($decoded[5]['value'])  ) {

                $c = new Produtos();
                $dados = array('descricao' => $decoded[0]['value'], 'referencia' => $decoded[1]['value'], 'marca' => $decoded[2]['value'], 'preco' => $decoded[3]['value'], 'estoque' => $decoded[4]['value'], 'unidade_de_venda' => $decoded[5]['value']);
                $c = $c->addProduto('produtos', $dados);

                if ($c == TRUE) {
                    $data['color'] = "#5cb85c";
                    $data['msg'] = "Produto cadastrado com sucesso!";
                } else {
                    $data['color'] = "#f56954";
                    $data['msg'] = "Falha ao cadastrar Produto";
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
            $this->loadTemplate('Produtos/listarView', $data);
        }
    }
    
    public function atualizarProduto() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);

            if (!empty($decoded[0]['value']) && !empty($decoded[1]['value']) && !empty($decoded[2]['value']) && !empty($decoded[3]['value']) && !empty($decoded[4]['value']) && !empty($decoded[5]['value'])) {

                $p = new Produtos();
                $dados = array('descricao' => $decoded[1]['value'], 'referencia' => $decoded[2]['value'], 'marca' => $decoded[3]['value'], 'preco' => $decoded[4]['value'], 'estoque' => $decoded[5]['value'], 'unidade_de_venda' => $decoded[6]['value']);
                $p = $p->atualizarProduto('produtos', $dados, $decoded[0]['value']);

                if ($p == TRUE) {
                    $data['color'] = "#5cb85c";
                    $data['msg'] = "Produto atualizado com sucesso!";
                } else {
                    $data['color'] = "#f56954";
                    $data['msg'] = "Falha ao atualizar produto";
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
            $this->loadTemplate('Produtos/listarView', $data);
        }
    }

    public function inativarProduto() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);
            
            $p = new Produtos();
            $dados = array('status_produto' => '0');
            $p = $p->atualizarProduto('produtos', $dados, $decoded['id']);
            
            if ($p == TRUE) {
                $data['color'] = "#5cb85c";
                $data['msg'] = "Produto removido com sucesso!";
            } else {
                $data['color'] = "#f56954";
                $data['msg'] = "Falha ao remover produto";
            }
            $this->loadView('msgView', $data);
            exit();
        } else {
            $this->loadTemplate('Produtos/listarView', $data);
        }
    }


}
