<?php
/*
    $database='';
    $table='';
    $phpv='php7';
    $genera_interface_name=;#combre asignado
*/
if(empty($database) or empty($tabla)or empty($phpv) or empty($conexion)or empty($genera_interface_name)){
    $Errores['Precargado'][]=
    array(
        'name'=>'Genera_inface',
        'message'=>'Faltan valores',
        'Datos'=>array(
            'database'=>$database,
            'tabla'=>$tabla,
            'phpv'=>$phpv
        )
    );
    echo $registro_final=count($Errores['Precargado']);
    if(empty($database))                {$Errores['Precargado'][$registro_final-1]['database']='Valore no Asignado';}
    if(empty($tabla))                   {$Errores['Precargado'][$registro_final-1]['tabla']='Valore no Asignado';}
    if(empty($phpv))                    {$Errores['Precargado'][$registro_final-1]['phpv']='Valore no Asignado';}
    if(empty($conexion))                {$Errores['Precargado'][$registro_final-1]['conexion']='Valore no Asignado';}
    if(empty($genera_interface_name))   {$Errores['Precargado'][$registro_final-1]['genera_interface_name']='Valore no Asignado';}
    echo('<pre>');
    print_r($Errores['Precargado'][$registro_final-1]);
    echo('</pre>');
    exit();
}else{        
    $inface[$genera_interface_name]= new inface($database,$tabla,$phpv,$conexion);
    if(!empty($validacionFormularo))$valida_porta=$validacionFormularo;
    if(!empty($validacion_de_campos))$valida_porta=$validacion_de_campos;
    if(empty($TextColumna))$TextColumna=array();
    if(empty($ColumnasEspeciales))$ColumnasEspeciales=array();
    if(empty($view))$view='true';
    if(empty($valida_porta)){echo "sistema de validacion no encontrado "; $valida_porta='';}
    $array=array(
        'tipo'=>array('formulario'=>'true','lista'=>'false'),
        'class'=>array(
            'columnaFija'=>'Diseno_botones2',
            'casilla'=>'Diseno_botones3',
            'id'=>''
        ),
        'viewValidacion'=>$view,                            ## on/off para visualizar los elementos con error 
        'validacionFormularo'=>$valida_porta,
        'CambiosColumnas'=> array(
            'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
            'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
        ),
        "Interfaces"=>array(
            "tablas_relacionadas"=>array(
                "Columnas_a_descargar"=>"Nombre"
            )
        ),
    );
    $inface[$genera_interface_name]->Interface_de_usuario2($array);    
    
    
}
?>