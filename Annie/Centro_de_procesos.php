<?php
#abonos
    $elemento='folio';#nombre del archivo 
    $tabla='informacion_vital';
    $name_validacion='folio'; 
    echo $database=$_POST['name_programa'].'_'.$_POST['Soft_version'].'';
    include("enrutador.php");
#cartas porte     
/*
    $elemento='cartas_porte'; #nombre del archivo 
    $tabla='cartas_porte';
    $name_validacion='cartas_porte'; 
    $database=$_POST['name_programa'].'_'.$_POST['Soft_version'];
    include("enrutador.php");   
    */
                /*
                    case $elementos_ajustes[0]:#tanques
                        $tabla='tanques';
                        $database='combustible';
                        include_once('Inicia_operadores.php');
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')    {include_once('limpiar_formulario/Tanques_lim.php');}
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')   {include_once('Elimina/tanques_Elim.php');}
                        if(!empty($_POST['Descargar']))                                         {include_once('Descargar/Tanques_Desc.php');}
                        if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
                        {$view='true';} else { $view='false';}
                        
                        include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/validaciones/tanques.php');
                        if($validacion_de_campos['Validacion_general']==true){
                            if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar' and $validacion_de_campos['Validacion_insert']==true)        {include_once('Guardar/Tanques_save.php');}
                            if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar'and $validacion_de_campos['Validacion_update']==true)      {include_once('Modificar/tanques_mod.php');}
                        }else{
                            if(empty($consola))$consola='';
                            $consola=$consola."<a class='ok'>campos vacios</a>";
                        }
                    
                    break;
                */
    
?>
