<?php

class wsController extends controller {

    public function __construct() {
        
    }

    public function index() {
        echo "404";
    }

    public function getTop10ClientesMaiorGasto() {
        $iv = new ItensVenda();
        $result = $iv->getTop10ClientesMaiorGasto();

        $arrData = array(
            "chart" => array(
              "caption" => "Valor Gasto por Cliente ",
                "numberprefix" => "R$",
                "bgColor" => "#ffffff",
                "formatnumberscale" => "0",
                "canvasBorderAlpha" => "0",
                "usePlotGradientColor" => "0",
                "showBorder" => 0,
                "exportEnabled" => "1",
            )
        );

        $arrData["data"] = array();

        foreach ($result as $row) {
            array_push($arrData["data"], array(
                "label" => strtoupper($row["nome"]),
                "value" => $row["gastos"]
                    )
            );
        }

        $jsonEncodedData = json_encode($arrData);
        print_r($jsonEncodedData);
    }

}
