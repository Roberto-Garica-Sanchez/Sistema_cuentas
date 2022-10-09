<?php 
    
#validacion generiaca v2 
$libre_v4-> Columnas($database,$tabla);             
$columnas=$libre_v4->getColumnas();         //obtiene las columnas de la tabla donde se guardar la informacion
$No_Validar=array(
    'Carta2'=>'false',
    'Carta3'=>'false',
    'Carta4'=>'false',
    'Retencion_ISR'=>'false',
    'Descripcion'=>'false'
);
$TextColumna=array(
    "N_Cuenta"=>'Cuenta N',
    "Carta1"=>'Carta Principal',
    "Carta2"=>'Secundaria 1',
    "Carta3"=>'Secundaria 2',
    "Carta4"=>'Secundaria 3',
    "Difer_1"=>'Saldo Cuenta',
    "Retencion_ISR"=>'Retencion ISR',
);
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
#verifica si las columnas estan vacias
    $vacio=array();   
    /*
    Echo('<pre>');
    print_r($verificar);
    echo('</pre>');   
    Echo('<pre>');
    print_r($columnas);
    echo('</pre>');   */
    for ($x=0; $x <count($columnas) ; $x++) {
        if(isset($_POST[$columnas[$x]]))        #verifica que exista la variable 
        if(!is_numeric($_POST[$columnas[$x]]))  #verifica que no sea numerica (permitira que los 0 sean contemplados como true)
        if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x] ){ #verifica que no este vacia y que no sea el ID
            if(!empty($No_Validar) and !isset($No_Validar[$columnas[$x]]) ){
                $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                $validacion_de_campos['Campos_vacios'][$columnas[$x]]=false;
                $validacion_de_campos['Campos_vacios']['validacion']=false;
            }
        }        

    }
#validaciones para valores no permitidos   (universal, desacativado )  
    $valores_no_validos=array(
        'CHOFER'=>'CHOFER',
        'PLACAS'=>'PLACAS',
        'CLIENTE'=>'CLIENTE',
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
    #### validacion basica 
        if(!empty($_POST['ID'])){
            $validacion_de_campos['Validacion_insert']=false;
        }
    #### validacion desde la base de datos 
    if(!empty($_POST['ID_G'])){
        $array=array(
            "tabla"=>$tabla,
            "Operacion"=>
            array(
                'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>array('*'),
                    "BuscaColumnas"	=>array('ID_G'),
                    "BuscaDatos"	=>array($_POST['ID_G']),
                )

            )
            
        );
    
        $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
        #$Ares_v1->viewSql();                            //visualisa el codigo generado
        $sql=$Ares_v1->getSql();                        //recupera el codigo generado
        
        $libre_v2->db($database,$conexion,$phpv);
        if ($res=mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa MYSQL para guarda la informacion 
            if(mysqli_num_rows($res))
            $validacion_de_campos['Validacion_insert']=false;
        }   
    }    
    
    /*
    Echo('<pre>');
    print_r($validacion_de_campos);
    echo('</pre>');   */
?>