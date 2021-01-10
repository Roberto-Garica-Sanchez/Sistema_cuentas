<?php 
#echo"Validavion iniciada";
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
?>