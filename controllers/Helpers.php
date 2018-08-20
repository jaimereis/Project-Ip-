<?php

/**
 * Description Classe de apoio a regra de negocio do controlador
 *
 * @author jaimer
 */
class Helpers {

    public function trataCpfCnpj($cpfCnpj) {
        $caracteres = array("/", ".","-");
        $result = str_replace($caracteres, "", $cpfCnpj);
        return $result;
    }
    
    
    public function modificaData($dt) {
        $dt_americana = explode("/", $dt);
        $dt_americana = $dt_americana[2] . "-" . $dt_americana[1] . "-" . $dt_americana[0];
        return $dt_americana;
    }
   

}
