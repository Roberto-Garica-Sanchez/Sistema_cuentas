<?php

if(empty($columnaByOrder))$columnaByOrder='';
if(empty($DirecionByOrder))$DirecionByOrder='';
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

?>