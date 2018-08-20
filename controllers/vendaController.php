<?php
require_once 'Helpers.php';
class vendaController extends controller {

    public function __construct() {
        $u = new Usuarios();
        if ($u->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
        }
    }

    public function cadastrar() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();
        $this->loadTemplate('Venda/vendaView', $data);
    }

    public function mostraProdutos() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        $p = new Produtos();
        $data['produtos'] = $p->getAllProdutos();

        $this->loadView('Venda/returnProdutoVenda', $data);
    }

    public function AddVenda() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['id_cliente']) && !empty($_POST['id_cliente']) && isset($_POST['prod']) && !empty($_POST['prod'])) {
            $idVenda = addslashes($_POST['id_cliente']);
            $arrVenda = array('cliente_id' => $idVenda);

            $v = new Venda();
            $idVenda = $v->addVenda('venda', $arrVenda);

            if ($v == TRUE) {
                for ($i = 0; $i < count($_POST['prod']); $i++) {
                    $arr = array();
                    $iv = new ItensVenda();
                    $arr = array('venda_id' => $idVenda, 'produto_id' => $_POST['prod'][$i], 'qtd' => $_POST['qtd'][$i]);
                    $iv->addItensVenda('itens_venda', $arr);
                }
                $this->montaComprovante($idVenda);
                //Aqui é interessante usar transação em um software comercial pois se algum item da venda falhar a venda deverá falhar fazendo um rolback
            } else {
                $data['color'] = "#f56954";
                $data['msg'] = "Falha ao cadastrar venda";
            }
        }
    }

    public function montaComprovante($idVenda) {
        $p = new Produtos();
        $data['dadosCompra'] = $p->getDadosVenda($idVenda);
        $vFinal = $p->getDadosVendaValorFinal($idVenda);
        $data['valorFinal'] = $vFinal[0]['valor_final'];

        $data['color'] = "#5cb85c";
        $data['msg'] = "Comprovante da Compra:";
        $this->loadView('msgViewComprovante', $data);
        exit();
    }

    public function buscarVenda() {
        $data = array();
        $u = new Usuarios();
        $data['info'] = $u->confirmaUsuarioLogado();

        if (isset($_POST['data']) && !empty($_POST['data'])) {
            $decoded = json_decode($_POST['data'], true);
            $h = new Helpers();
            $v = new Venda();
            $result = $v->buscaVenda($h->modificaData($decoded[0]['value']),$h->modificaData($decoded[1]['value']),$decoded[2]['value']);
            echo json_encode($result);
        } else {
            $this->loadTemplate('Venda/filtroVendaView', $data);
        }
    }


}
