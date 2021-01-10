<?php 
/*
    #validacion generiaca 
    $libre_v4-> Columnas($database,$tabla);
    $columnas=$libre_v4->getColumnas();
    $libre_v4->KeyColumnUsege($database,$tabla);
    $key=$libre_v4->getKeyColumnUsege();
    $validacionGeneral='true';
    $validacion='true';
    $vacio=array();
    //verifica si las columnas estan vacias []
    for ($x=0; $x <count($columnas) ; $x++) {
        if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x]){
            $validacion='false';$validacionGeneral='false';
            if(empty($consola))$consola='';
            $consola=$consola.$columnas[$x]."<br>";
        }else{
            $validacion='true';
        }
        
        $vacio[$columnas[$x]]=$validacion;
    }
    
    $validacionFormularo=$vacio;
*/
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
        echo $columnas[$x];
        #PHP strtoupper(): Convierte a mayúsculas los caracteres de una cadena string.
        #PHP strtolower(): Convierte a minúsculas los caracteres de una cadena string.
        #PHP ucfirst(): Convierte a mayúsculas el primer caracter de una cadena string.
        #PHP ucwords(): Convirte a mayúsculas el primer caracter de cada palabra de una cadena o string.
        #echo isset($_POST[$columnas[$x]]);
        echo " / ";
        echo $name=strtoupper($columnas[$x]);   if(isset($_POST[$name])){echo "<a style='color: red;'> : 1 </a>";}else{echo " : 0 ";}
        echo " / ";
        echo $name=strtolower($columnas[$x]);   if(isset($_POST[$name])){echo "<a style='color: red;'> : 1 </a>";}else{echo " : 0 ";}
        echo " / ";
        echo $name=ucwords($columnas[$x]);      if(isset($_POST[$name])){echo "<a style='color: red;'> : 1 </a>";}else{echo " : 0 ";}
        echo " / ";
        echo $name=strtoupper($columnas[$x]);   if(isset($_POST[$name])){echo "<a style='color: red;'> : 1 </a>";}else{echo " : 0 ";}
        
        echo "<br>";
        if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x]){
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
            if(!empty($_POST[$columnas[$i]]) and $_POST[$columnas[$i]]==$valores_no_validos[$columnas[$i]]){
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
    
#name_validacion
if(!empty($name_validacion)){
    $sistema_validaciones[$name_validacion]=$validacion_de_campos;
    $name_validacion='';
}
?>