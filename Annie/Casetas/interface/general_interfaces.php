<?php

$Repostaje= new inface($database,$tabla,$phpv,$conexion);
if(!empty($validacionFormularo))$valida_porta=$validacionFormularo;
if(!empty($validacion_de_campos))$valida_porta=$validacion_de_campos;
if(empty($valida_porta)){echo "sistema de validacion no encontrado "; $valida_porta='';}
$array=array(
    'tipo'=>array('formulario'=>'true','lista'=>'false'),
    'class'=>array(
        'columnaFija'=>'Diseno_botones2',
        'casilla'=>'Diseno_botones3',
        'id'=>''
    ),
    'viewValidacion'=>$view,
    'validacionFormularo'=>$valida_porta,
    'CambiosColumnas'=> array(
        'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
        'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
    )
);
$Repostaje->Interface_de_usuario($array);    
?>