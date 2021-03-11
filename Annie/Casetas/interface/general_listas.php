<?php

echo"<div id='Contenedor_auto2' class='Contenedor_auto2'>";        
$Repostaje= new inface($database,$tabla,$phpv,$conexion);
    $array=array(
        'tipo'=>array('formulario'=>'false','lista'=>'true'),
        'class'=>array(
            'columnaFija'=>'Diseno_botones1',
            'casilla'=>'Diseno_botones1',
            'id'=>'Diseno_boton_id'
        ),
        "lista"=>array(
            "ByOrder"=>array(
                "Columna"	=>$columnaByOrder,
                "ASC-DESC"	=>$DirecionByOrder
            )
        )

    );
    $Repostaje->Interface_de_usuario($array);
   
echo"</div>";

/*
echo"<div class='Contenedor_auto2'>";                                     
    echo"<div>";       
        $columnas   = $libre_v4->Columnas($database,$tabla);     //obtiene las columnas de la tabla tanque
        $libre_v4->ExtraColumns($database,$tabla);               //busca si existe una columna auto incremental
        $Incrementales  = $libre_v4->getExtraColumns();                     //obtiene los resultados de la busqueda 
        for ($x=0; $x < count($columnas); $x++) { 
            $class='Diseno_botones1';
            for ($z=0; $z < count($Incrementales) ; $z++) { 
                if($Incrementales[$z]==$columnas[$x]){$class='Diseno_boton_id';break;}
            }
            echo $libre_v5->input('submit','',$columnas[$x],'',$class,'','','');
        }
    echo"</div>";
    if(empty($getColumnas))     $getColumnas    = array('*');
    if(empty($BuscaColumnas))   $BuscaColumnas  = array();
    if(empty($BuscaDatos))      $BuscaDatos     = array();
    if(empty($Condiciones))     $Condiciones ="";
    if(empty($columnaByOrder))  $columnaByOrder ="";
    if(empty($DirecionByOrder))  $DirecionByOrder ="DESC";
    
    $array=array(
        "tabla"=>$tabla,
        "Operacion"=>
        array('SELECT'=>array(
                "Activar"	=>'true',
                "LIKE"		=>'true',
                "getColumnas"    =>$getColumnas,
                "BuscaColumnas"  =>$BuscaColumnas,
                "BuscaDatos"     =>$BuscaDatos,
                "Condiciones"	=>$Condiciones,
                "ByOrder"		=>array(
                    "Columna"	=>$columnaByOrder,
                    "ASC-DESC"	=>$DirecionByOrder
                    )
            )
        )
    );
    $Ares_v1-> GeneraSql($array);
    $sql=$Ares_v1-> getSql($array);        
    $libre_v2->db($database,$conexion,$phpv);

    $resu=mysqli_query($conexion,$sql)or die("Error".mysqli_error($conexion));     //Solicita los datos 
    $elementos_encontrados=$libre_v2->mysql_nu_ro		($resu,$phpv);
    $libre_v2->mysql_da_se		($resu,0,$phpv);
    while ($fila = mysqli_fetch_array($resu)) {                                         //ciclo para parentar todos los datos obtenido en la consulta 
        $class='Diseno_botones1';
        for ($y=0; $y < count($columnas); $y++) {                            
            $name='';
            for ($z=0; $z < count($Incrementales) ; $z++) {//recorre la columnas que tiene 
                $class='Diseno_botones1';
                if($Incrementales[$z]==$columnas[$y]){
                    $class='Diseno_boton_id';
                    $name='Descargar';
                    break;
                }
            }
            echo $libre_v5->input('submit',$name,$fila[$columnas[$y]],'',$class,'','','');   
        }
        echo"<br>";
        //echo $libre_v5->input('submit','',$fila[$x],'',$class,'','','');
        $x++;
    }
echo"</div>";
*/
?>