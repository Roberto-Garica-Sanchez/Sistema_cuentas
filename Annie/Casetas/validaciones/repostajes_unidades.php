<?php
#validacion generiaca 
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
    #valida que este modificando registros
        if(!empty($_POST['ID'])){
            $validacion_de_campos['Validacion_insert']=false;
        }
    #verifica si las columnas estan vacias
        $vacio=array();   
        for ($x=0; $x <count($columnas) ; $x++) {
            if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x]){
                $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                $validacion_de_campos['Campos_vacios'][$columnas[$x]]=false;
                $validacion_de_campos['Campos_vacios']['validacion']=false;
            }        

        }
    #validaciones para valores no permitidos     
        $valores_no_validos=array(
            'Operador'=>'Operador',
            'Placas'=>'Placas',
            'Cliente'=>'Cliente',
            'TanqueSurtidor'=>'TanqueSurtidor'
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

#validaciones especiales
    #validacion para evitar dobles registros
        if(!empty($_POST['Contador_Inicio']) and empty($_POST['ID'])){
            $GeneraSql=array(
                "tabla"=>$tabla,
                "Operacion"=>
                array(    'SELECT'=>array(
                        "Activar"	=>'true',
                        "LIKE"		=>'falses',
                        "getColumnas"	=>array('*'),
                        "BuscaColumnas"	=>array(),
                        "BuscaDatos"	=>array(),
                        "Condiciones"	=>array(),
                        "LIMIT"			=>array(
                            "Elementos"=>'1',
                            "posicion"=>''
                        ),
                        "ByOrder"		=>array(
                            "Columna"	=>'Contador_Final ',
                            "ASC-DESC"	=>'DESC'
                            )

                    )
                )
            );
            $Ares_v1->GeneraSql($GeneraSql);        
            $consulta_secuencia=$Ares_v1->getSql();
            $libre_v2->db('combustible',$conexion,$phpv);
            $res_consulta=$libre_v2->ejecuta($conexion,$consulta_secuencia,$phpv)	;
            if($libre_v2->mysql_nu_ro($res_consulta,$phpv)>0){
                $datos=$libre_v2->mysql_fe_ar($res_consulta,$phpv,'');
                if($_POST['Contador_Inicio']<$datos['Contador_Final']){
                    $validacion_de_campos['Validacion_general']=false; #detiene los procesos 
                    #$validacion_de_campos['Validacion_insert']=false; #detiene los procesos solo paralos insert
                    $validacion_de_campos['Error_especifico']['Contador_Inicio']='El Valor Ya Existe';
                    $validacion_de_campos['Error_especifico']['validacion']=false;
                }
            }
        }
    #validad que el total de litros despachado sea mayores que 0    
        if(!empty($_POST['Contador_Inicio']) and !empty($_POST['Contador_Final'])){
            $_POST['Total_Despachado']=$_POST['Contador_Final']-$_POST['Contador_Inicio'];
            # verifica que el contador final sea mayor que el inicial 
                if($_POST['Contador_Final']<=$_POST['Contador_Inicio']){
                    $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                    $validacion_de_campos['Valores_No_validos']['Contador_Final']=false;
                    $validacion_de_campos['Valores_No_validos']['validacion']=false;
                }
            #verifica que el resultado ser un numero natural 
            
                if($_POST['Total_Despachado']<=0){
                    $validacion_de_campos['Validacion_general']=false; # detiene los procesos 
                    $validacion_de_campos['Valores_No_validos']['Contador_Final']=false;
                    $validacion_de_campos['Valores_No_validos']['Total_Despachado']=false;
                    $validacion_de_campos['Valores_No_validos']['validacion']=false;
                }
            
        }
    
?>