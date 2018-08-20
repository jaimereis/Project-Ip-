<?php

/**
 * Classe Model Produtos
 */
class Produtos {

    public function addProduto($tabela, array $dados) {
        $c = new Create();
        $c->ExeCreate($tabela, $dados);
        if ($c->getResult()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAllProdutos() {
        $r = new Read();
        $r->FullRead('select * from produtos where status_produto = 1');

        if ($r->getRowCount() > 0) {
            return $r->getResult();
        }
    }

    public function getProdutoId($id) {
        $r = new Read();
        $r->FullRead("select * from produtos p where p.id = $id");

        if ($r->getRowCount() > 0) {
            return $r->getResult();
        }
    }

    public function getDadosVenda($id) {
        $r = new Read();
        $r->FullRead("select iv.id,p.descricao,p.preco,iv.qtd,format(p.preco*iv.qtd,2) as total_item
                    from itens_venda iv
                    inner join produtos p on p.id = iv.produto_id
                    where iv.venda_id = $id");

        if ($r->getRowCount() > 0) {
            return $r->getResult();
        }
    }

    public function getDadosVendaValorFinal($id) {
        $r = new Read();
        $r->FullRead("select sum(format(p.preco*iv.qtd,2)) as  valor_final
                    from itens_venda iv
                    inner join produtos p on p.id = iv.produto_id
                    where iv.venda_id = $id");

        if ($r->getRowCount() > 0) {
            return $r->getResult();
        }
    }

    public function atualizarProduto($Tabela, array $Dados, $id) {
        $u = new Update();
        $u->ExeUpdate("$Tabela", $Dados, "where id = :id ", "id=$id");

        if ($u->getRowCount() > 0) {
            return TRUE;
        }
    }

}
