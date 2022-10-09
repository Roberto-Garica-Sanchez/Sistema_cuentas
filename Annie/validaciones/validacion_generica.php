<?php 
 
#validacion generiaca v2 
$libre_v4-> Columnas($database,$tabla);             
$columnas=$libre_v4->getColumnas();         //obtiene las columnas de la tabla donde se guardar la informacion
##inicializa todas la variables de validacion 
    #estructura basada en las columnas
        $array_base=array();
        $array_base['validacion']=true;
        for ($i=0; $i <count($columnas) ; $i++) {$array_base[$columnas[$i]]=true;}
        $validacion_de_campos=array(
            "Validacion_general"=>true,
            "Validacion_insert"=>true,
            "Validacion_update"=>true,
            "Validacion_delect"=>true,
            "Campos_vacios"         =>$array_base,
            "noDefaul"              =>$array_base,
            "Valores_No_validos"    =>$array_base,
            "Error_especifico"      =>$array_base,
        );
## inicia todas la validaciones 
    $libre_v4->KeyColumnUsege($database,$tabla);
    $key=$libre_v4->getKeyColumnUsege();
#Calculos 
#verifica si las columnas estan vacias
    $vacio=array();   
    for ($x=0; $x <count($columnas) ; $x++) {
        if(isset($_POST[$columnas[$x]]))        #verifica que exista la variable 
        if(!is_numeric($_POST[$columnas[$x]]))  #verifica que no sea numerica (permitira que los 0 sean contemplados como true)
        if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x]){ #verifica que no este vacia y que no sea el ID
            $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
            $validacion_de_campos['Campos_vacios'][$columnas[$x]]=false;
            $validacion_de_campos['Campos_vacios']['validacion']=false;
        }        

    }
#validaciones para valores no permitidos   (universal, desacativado )  
    $valores_no_validos=array(
        #'Operador'=>'Operador',
        #'Placas'=>'Placas',
        #'Cliente'=>'Cliente',
        #'TanqueSurtidor'=>'TanqueSurtidor'
    );
    for ($i=0; $i <count($columnas) ; $i++) {
        if(!empty($valores_no_validos[$columnas[$i]])){
            if(!empty($_POST[$columnas[$i]]) and $_POST[$columnas[$i]]==$valores_no_validos[$columnas[$i]] ){
                $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                $validacion_de_campos['noDefaul'][$columnas[$i]]=false;
                $validacion_de_campos['noDefaul']['validacion']=false;
            }
        }            
    }


#valida que este modificando registros
    if(!empty($_POST['ID'])){
        $validacion_de_campos['Validacion_insert']=false;
    }
?>