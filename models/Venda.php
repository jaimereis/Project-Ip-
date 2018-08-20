<?php

/**
 * Classe Model Venda
 */
class Venda {


    public function addVenda($tabela, array $dados) {
        $c = new Create();
        $c->ExeCreate($tabela, $dados);
        if ($c->getResult()) {
            return $c->getResult();
        } else {
            return FALSE;
        }
    }
    
    public function buscaVenda($dt_ini,$dt_fim,$id_cliente){
        $r = new Read();
        $r->FullRead("select v.id,p.descricao,p.preco,iv.qtd,c.nome,DATE_FORMAT(v.dt_venda,'%d-%m-%Y : %H:%i') as dt_venda

                    from itens_venda iv
                    inner join venda v on v.id = iv.venda_id
                    inner join produtos p on p.id = iv.produto_id
                    inner join clientes c on c.id = v.cliente_id

                    where v.dt_venda BETWEEN '$dt_ini 00:00:00' and '$dt_fim 23:59:59' and v.cliente_id = $id_cliente");
        
        if($r->getRowCount() > 0){
            return $r->getResult();
        }
    }


}
