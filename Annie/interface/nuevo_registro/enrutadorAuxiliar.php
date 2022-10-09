<?php 
    #$elemento=$elementos_ajustes[x]
    
  $menu_option_select=$_POST[$name_menu[$programa_actual]];
  
  $temp_clear=$url_files[$carpeta_raiz_actual]['Elimina'][$menu_option_select]['DOC_Name'];
    include_once('../Librerias/General/Inicia_operadores.php');
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')    {
        if(file_exists('limpiar_formulario/'.$temp_clear)){
            include_once('limpiar_formulario/'.$temp_clear);
        }
        else if(file_exists('limpiar_formulario/limpia_genericos.php')){
            include_once('limpiar_formulario/limpia_genericos.php');
        }else{echo'Archivo no encontrado';}


    }
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')   {        
        $temp_dele=$url_files[$carpeta_raiz_actual]['Elimina'][$menu_option_select]['DOC_Name'];
        include_once('Elimina/'.$temp_dele);
    }
    #if(!empty($_POST['Descargar']))                                         {include_once('Descargar/'.$elemento.'.php');}
    if(!empty($_POST['Descargar']))                                         {
        $temp_down=$url_files[$carpeta_raiz_actual]['Descargas'][$menu_option_select]['DOC_Name'];
        include_once('Descargar/'.$temp_down);
    }
    if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
    {$view='true';} else { $view='false';}
    ##sistemas de validacion
    $temp_veri =$url_files[$carpeta_raiz_actual]['Validaciones'][$menu_option_select]['DOC_Name'];
    include_once('Validaciones/'.$temp_veri);#modificas el enrutado -> eliminar document_root

    if(!empty($validacionGeneral) and $validacionGeneral=='true'){
        
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')    {            
        $temp_save=$url_files[$carpeta_raiz_actual]['Guardar'][$menu_option_select]['DOC_Name'];
            include_once('Guardar/'. $temp_save);
        }
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')  {
            $temp_mod=$url_files[$carpeta_raiz_actual]['Modificar'][$menu_option_select]['DOC_Name'];
            include_once('Modificar/'. $temp_mod);
        }
    }else{
        if(empty($consola))$consola='';
        $consola=$consola."<a class='ok'>campos vacios</a>";
    }
    if($validacion_de_campos['Validacion_general']==true){
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar' and $validacion_de_campos['Validacion_insert']==true)       {
            
            $temp_save=$url_files[$carpeta_raiz_actual]['Guardar'][$menu_option_select]['DOC_Name'];
            include_once('Guardar/'. $temp_save);
        }
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar'and $validacion_de_campos['Validacion_update']==true)      {            
            $temp_mod=$url_files[$carpeta_raiz_actual]['Modificar'][$menu_option_select]['DOC_Name'];
            include_once('Modificar/'. $temp_mod);
        }
    }else{
        if(empty($consola))$consola='';
        $consola=$consola."<a class='ok'>campos vacios</a>";
    }
?>