<?php 
    $db='empresa';
    $tablas=array(
        'folio',
        'abo_acu',
        'casetas',
        'casetas_c',
        'casetas_via',
        'fletes',
        'viaticos',
        'diesel',
        'facturas',
        'ryr',
        'guias',
        'maniobras',
        'fletes_c',
        'viaticos_c',
        'diesel_c',
        'facturas_c',
        'ryr_c',
        'guias_c',
        'maniobras_c',
        'fechas',
        'km',
        'casetas_c_via'
    );
    
    
    for ($c=0; $c <count($tablas) ; $c++) {
        $datos_traducion=$tablas_v2->info($db,$tablas[$c]);
        $columnas=$libre_v4->Columnas($db,$tablas[$c]);

        $array=array(
            "tabla"=>$tablas[$c],
            "Operacion"=>
            array(  'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>array('*'),   
                    "BuscaColumnas"	=>array('ID_G'),
                    "BuscaDatos"	=>array($_POST['Carta'])
                )
            )
        );
        $Ares_v1-> GeneraSql($array);   
        $sql    =$Ares_v1->getSql();
        $libre_v2->db('empresa',$conexion,$phpv);
        $consu  =$libre_v2->ejecuta($conexion,$sql,$phpv);
        $datos  =$libre_v2->mysql_fe_ar($consu,$phpv,'');

            #echo"<div style='float: left;'>";
                #echo$tablas[$c];
                #echo"<br>";
                for ($i=0; $i < count($columnas); $i++) { 
                    $value=$datos[$columnas[$i]];        
                    $name=$datos_traducion['name'][$columnas[$i]];        
                    #echo"-";
                    echo$libre_v2->input2('hidden',$name,'',$value,'','','','');
                    #echo"<br>";
                    $_POST[$name]=$value;
                }
            #echo"</div>";
    }
?>