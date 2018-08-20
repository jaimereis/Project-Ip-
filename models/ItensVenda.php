<?php

/**
 * Classe Model ItensVenda
 */
class ItensVenda {


    public function addItensVenda($tabela, array $dados) {
        $c = new Create();
        $c->ExeCreate($tabela, $dados);
        if ($c->getResult()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getTop10ClientesMaiorGasto(){
        $r = new Read();
        $r->FullRead("select c.nome,sum(p.preco*iv.qtd) as gastos
                    from itens_venda iv
                    inner join produtos p on p.id = iv.produto_id
                    inner join venda v on v.id = iv.venda_id
                    inner join clientes c on c.id = v.cliente_id

                    group by c.nome order by sum(p.preco*iv.qtd) desc limit 10");
        
        if ($r->getRowCount() > 0){
            return $r->getResult();
        }
        
    }





}
