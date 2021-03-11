<?php
$libre_v4-> Columnas($database,$tabla);
$columnas=$libre_v4->getColumnas();
$libre_v4->KeyColumnUsege($database,$tabla);
$key=$libre_v4->getKeyColumnUsege();
$validacionGeneral='true';
$validacion='true';
$vacio=array();
include_once('inicia_validaciones.php');
#verifica si las columnas estan vacias
    $vacio=array();   
    for ($x=0; $x <count($columnas) ; $x++) {
        if(isset($_POST[$columnas[$x]])){#verifica que este indexados
            #verifica si es numerico 
                if(is_numeric($_POST[$columnas[$x]])){
                    if($_POST[$columnas[$x]]==0)$_POST[$columnas[$x]]=0;
                }
                /*
            #verifica si es string            
                if(!is_numeric($_POST[$columnas[$x]])){
                }
                */
            if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x] and !is_numeric($_POST[$columnas[$x]])){#busca los campos vacios y omite el campo index de la tabla
                $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                $validacion_de_campos['Campos_vacios'][$columnas[$x]]=false;
                $validacion_de_campos['Campos_vacios']['validacion']=false;
            }
        }  
    }
#validaciones para valores no permitidos     
    $valores_no_validos=array(
        'IDTanque'=>'IDTanque',
    );
    for ($i=0; $i <count($columnas) ; $i++) {
        if(!empty($valores_no_validos[$columnas[$i]])){
            if(!empty($_POST[$columnas[$i]]) and $_POST[$columnas[$i]]==$valores_no_validos[$columnas[$i]]){
                $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                $validacion_de_campos['noDefaul'][$columnas[$i]]=false;
                $validacion_de_campos['noDefaul']['validacion']=false;
            }
        }            
    }
#swchis maestros 
#valida que este modificando registros
if(!empty($_POST['ID'])){
    $validacion_de_campos['Validacion_insert']=false;
}
if($validacion_de_campos['Campos_vacios']['validacion']==false){
    #$validacion_de_campos['Validacion_insert']=false;
    $validacion_de_campos['validacion_update']=false;
}

$validacionFormularo=$vacio;
?>