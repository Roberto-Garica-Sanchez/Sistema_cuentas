<?php

echo"<div class='formularios'>";
echo"<div class='titulos'>Editor Registro</div>";

    if(empty($view))$view='';
    if(empty($validacionFormularo))$validacionFormularo='';

    $TextColumna="";
    $ColumnasEspeciales="";

    $TextColumna=array(
    );

    $ColumnasEspeciales=array(
        'Estatus'=>array(
            'type'=>'despliegre',
            'ListaDeDatos'=>array('Activo','Inactivo')
        )
    );

    include_once('general_interfaces.php');
echo"</div>";
mysqli_select_db ($conexion ,$database);
$getColumnas    = array('*');
$BuscaColumnas  = array();
$BuscaDatos     = array();
$Condiciones ="";
$columnaByOrder='Nombre';
$DirecionByOrder ="ASC";
include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/Consola_de_operaciones.php');
include_once('general_listas.php');
?>