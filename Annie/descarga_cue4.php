<?php 
    #$db='empresa';
    $tablas=array(
        'folio',
        'abo_acu',
        'casetas',
        'casetas_c',
        'casetas_c_via',
        'casetas_via',
        'diesel',
        'diesel_c',
        'facturas',
        'facturas_c',
        'fechas',
        'fletes',
        'fletes_c',
        'guias',
        'guias_c',
        'km',
        'maniobras',
        'maniobras_c',
        'ryr',
        'ryr_c',
        'viaticos',
        'viaticos_c',
    );
    
    
    for ($c=0; $c <count($tablas) ; $c++) {
        $libre_v4->Columnas($database,$tablas[$c]);
        $datos_post=$libre_v4->DataToPost($_POST['Carta']);
        if($datos_post["Resultado de consulta"]==0){
            $color='orange';
        }else{
            $color='white';
        }
        echo"<div style='background: $color;width: auto;min-width: max-content;height-min: 50px;margin: .5px;float: left;position: relative;padding: 5px;'>";
            echo"Tabla: ".$tablas[$c];
            echo"<br>";
            echo"Datos encontrados: ".$datos_post["Resultado de consulta"];
        echo"</div>";
    }
    
?>