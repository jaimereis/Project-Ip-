<?php

/**
 * Classe Model Clientes
 */
class Clientes {


    public function addCliente($tabela, array $dados) {
        $c = new Create();
        $c->ExeCreate($tabela, $dados);
        if ($c->getResult()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    public function getAllClientes(){
        $r = new Read();
        $r->FullRead('select * from clientes where status_cliente = 1');
        
        if($r->getRowCount() > 0){
            return $r->getResult();
        }
    }
    
    public function getClienteId($id){
        $r = new Read();
        $r->FullRead("select * from clientes c where c.id = $id");
        
        if($r->getRowCount() > 0){
            return $r->getResult();
        }
    }
    
    public function getCep($cep) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://viacep.com.br/ws/' . $cep . '/json/',
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;
    }
    
    public function atualizarCliente($Tabela, array $Dados, $id) {
        $u = new Update();
        $u->ExeUpdate("$Tabela", $Dados, "where id = :id ", "id=$id");
        
        if ($u->getRowCount() > 0) {
            return TRUE;
        }
    }




}
