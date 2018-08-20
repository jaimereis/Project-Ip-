<?php

class ManipulaGrafico{
    
    private $arrData = array(
        "chart" => array(
            "caption" =>"",
            "bgColor" => "#ffffff",
            "formatnumberscale" => "0",
            "canvasBorderAlpha" => "0",
            "usePlotGradientColor" => "0",
            "plotBorderAlpha" => "10",
            "showXAxisLine" => "1",
            "exportEnabled" => "1"
        )        
    );    
    private $excel="";
    private $renderizar=false;
    
    function __construct($titulo) {
        isset($titulo) ? $this->arrData['chart']["caption"]=$titulo:'';        
    }
    
    
    public function graficoSimples($tipoGrafico,$altura,$idRend,$arrayDados){
        $visaoTabela="<table><tr><th>CRITERIO AVALIADO</th><th>QUANTIDADE</th></tr>";        
        $this->arrData["data"]=[];
        foreach ($arrayDados as $row) {
            array_push($this->arrData["data"], array("label"=>$row["LABEL"],"value"=>$row["VALUE"],"displayValue"=>$row["VALUE"]));
            $visaoTabela .= "<tr><td>".$row["LABEL"]."</td><td>".$row["VALUE"]."</td></tr>";
        }
        $visaoTabela.="</table>";
        $jsonEncodedData = json_encode($this->arrData);    
        $columnChart = new FusionCharts($tipoGrafico,"chart-container", "100%",$altura,$idRend, "json", $jsonEncodedData);
        if(!empty($arrayDados)){
            $this->renderizar=true;
            $this->excel=$visaoTabela;
            $columnChart->render();
        }
    }
    
    public function getExcel(){
        return $this->excel;
    }
    
    public function isRenderizar(){
        return $this->renderizar;
    }
    
    public function getArrData(){
        return $this->arrData;
    }
    
    public function setArrData($arrData){
        $this->arrData=(array)$arrData;
    }
    
}