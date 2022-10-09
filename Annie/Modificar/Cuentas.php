<?php	

    $estatus_modificar='';
    $resultado_Operacion=array(
        "Operacion"=>'Modificar',
        "Tablas en proceso"=>$TO_SAVE,
        "Completo"=>'true',
        "Parcial"=>'false',
        "Ninguno"=>'true'
    );
    for ($i=0; $i <count($TO_SAVE) ; $i++) { 
        $Operacion_sql[$TO_SAVE[$i]]=array(
            'Estatus sql'=>'Espera',
            'Alteracion A tabla'=>'',
            'Notificasion de Operacion'=>''
        );
    }
    for ($i=0; $i <count($TO_SAVE); $i++) {    
                
        #########
        if(!empty($Sustituto[$TO_SAVE[$i]])){                    
            $array_DataToPost=array(
                #"BuscaDatos"=>"",
                #"getColumnas"=>array(),
                "Columnas a transferir"=>$Sustituto[$TO_SAVE[$i]],
            );
        }else{
            $array_DataToPost='';
        }
        #proceso normal para modificasion 
        $columnas   = $libre_v4->Columnas($database,$TO_SAVE[$i]);     //obtiene las columnas de la tabla tanque
        $libre_v4->getKeyColumnUsege($database,$tabla);               //busca si existe una columna auto incremental
        $valores    = $libre_v4->ColunasInPost($array_DataToPost);                       //obtiene los valores enviado por post apartir de los nombre de las columnas 

        $getColumnas    =$columnas;                //columnas de insert 
        $ModifiDatos    =$valores;                //valores para insetar en la tabla 
        $BuscaColumnas  =array('ID_G');
        $BuscaDatos     =array($_POST['ID_G']);
        #$Excepcion      =array($libre_v4->getKeyColumnUsege());
        $array=array(
            "tabla"=>$TO_SAVE[$i],
            "Operacion"=>
            array(    'UPDATE'=>array(
                    "Activar"	=>'true',//'false'
                    "LIKE"		=>'false',//'false'
                    "ModifiColumnas"   =>$getColumnas,//array()
                    "ModifiDatos"    	=>$ModifiDatos,//array()
                    "BuscaColumnas"  	=>$BuscaColumnas,//array()
                    "BuscaDatos"     	=>$BuscaDatos,//array()
                    #"Excepcion"        =>$Excepcion
                )
            )
        );    
        $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
        #if($TO_SAVE[$i]=='acumulado') $Ares_v1->viewSql();                            //visualisa el codigo generado
        #$Ares_v1->viewSql();                            //visualisa el codigo generado
        $sql=$Ares_v1->getSql();                        //recupera el codigo generado

        
        $libre_v2->db($database,$conexion,$phpv);
        if (mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa MYSQL para guarda la informacion 
            if(empty($consola))$consola='';
            #$consola=$consola."<br><a class='ok'>".$TO_SAVE[$i]." Se modificaron ".mysqli_affected_rows($conexion)."</>";
            $resultado_Operacion[$TO_SAVE[$i]]['Estatus']='OK';
            if(mysqli_affected_rows($conexion)==1){
                $resultado_Operacion[$TO_SAVE[$i]]['Alteracion A tabla']='true';
                $resultado_Operacion["Parcial"]='true';
                
            }else{                
                $resultado_Operacion[$TO_SAVE[$i]]['Alteracion A tabla']='false';
                $resultado_Operacion["Completo"]='false';
                
            }
        }else {
            $resultado_Operacion[$TO_SAVE[$i]]['Estatus']='Error';
            $resultado_Operacion[$TO_SAVE[$i]]['Notificasion de Operacion']=mysqli_error($conexion);
            #echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
        }
        
    }
    #### Datos Vinculados
    
    $tabla_vinculaciones_by_id='vinculaciones_by_id';
    $array_vinculaciones_by_id=array();
    if(!empty($_POST['ID_Combustible'])){
        $array_vinculaciones_by_id["Combustible"]=array(
                'ID_G'=>$_POST['ID_G'],
                'BaseDeDatos'=>'combustible',
                'Tabla'=>'repostaje_unidades',
                'ColumnaEspecifica'=>'ID',
                'ValorColuman'=>$_POST['ID_Combustible']
        );

    }
    if(count($array_vinculaciones_by_id)>0){
        $keys=array_keys($array_vinculaciones_by_id);
        for ($i=0; $i <count($keys) ; $i++) { 
            
                #echo $keys[$i];
                #echo('<pre>');
                #print_r($array_vinculaciones_by_id);
                #echo('</pre>'); 
            
            #proceso normal para modificasion 
            $columnas   = $libre_v4->Columnas($database,$tabla_vinculaciones_by_id);     //obtiene las columnas de la tabla tanque
            $libre_v4->getKeyColumnUsege($database,$tabla_vinculaciones_by_id);               //busca si existe una columna auto incremental
            #$valores    = $libre_v4->ColunasInPost($array_DataToPost);                       //obtiene los valores enviado por post apartir de los nombre de las columnas 
            $valores        =$array_vinculaciones_by_id[$keys[$i]];
            $getColumnas    =$columnas;                //columnas de insert 
            $ModifiDatos    =$valores;                //valores para insetar en la tabla 
            $BuscaColumnas  =array('ID_G');
            $BuscaDatos     =array($_POST['ID_G']);
            #$Excepcion      =array($libre_v4->getKeyColumnUsege());
            $array=array(
                "tabla"=>$tabla_vinculaciones_by_id,
                "Operacion"=>array(                    
					#'viewSQL'=>'true',
                    'UPDATE'=>array(
                        "Activar"	=>'true',//'false'
                        "LIKE"		=>'false',//'false'
                        "ModifiColumnas"   =>$getColumnas,//array()
                        "ModifiDatos"    	=>$ModifiDatos,//array()
                        "BuscaColumnas"  	=>$BuscaColumnas,//array()
                        "BuscaDatos"     	=>$BuscaDatos,//array()
                        #"Excepcion"        =>$Excepcion
                    )
                )
            );    
            $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
            #$Ares_v1->viewSql();                            //visualisa el codigo generado
            $sql=$Ares_v1->getSql();                        //recupera el codigo generado
        }
        
        $libre_v2->db($database,$conexion,$phpv);
        if (mysqli_query($conexion, $sql)) { 
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

    }
    
    #include('RelaciondeCuentas.php');
    /*     
    $name_prestamos='Prestamos';
        $memoria_name=$name_prestamos.'_memoria';
        $columna_index='ID';
        
        
        for ($i=1; $i <$_POST[$memoria_name]; $i++) { 
            echo $name_Celda_prestamo=$name_prestamos.'_'.$columna_index.$i;
            $tabla_relacioncuentas='relacioncuentas';

            $array_DataToPost=array(
                    #"getColumnas"=>array('*'),
                    #"BuscaColumnas"=>"",
                    #"BuscaDatos"=>"",
                    "Columnas a transferir"=>array(
                        "ID_G_Arrastre"=>$_POST[$name_Celda_prestamo],
                        "Saldo_Cuenta "=>''

                    )
                );
                #proceso normal para modificasion 
                $columnas   = $libre_v4->Columnas($database,$tabla_relacioncuentas);     //obtiene las columnas de la tabla tanque
                $libre_v4->getKeyColumnUsege($database,$tabla_relacioncuentas);               //busca si existe una columna auto incremental
                $valores    = $libre_v4->ColunasInPost($array_DataToPost);                       //obtiene los valores enviado por post apartir de los nombre de las columnas 
                #$valores        =$array_vinculaciones_by_id[$keys[$i]];
                $getColumnas    =$columnas;                //columnas de insert 
                $ModifiDatos    =$valores;                //valores para insetar en la tabla 
                $BuscaColumnas  =array('ID_G','ID_G_Arrastre');
                $BuscaDatos     =array($_POST['ID_G'],$_POST[$name_Celda_prestamo]);
                #$Excepcion      =array($libre_v4->getKeyColumnUsege());
                $array=array(
                    "tabla"=>$tabla_relacioncuentas,
                    "Operacion"=>
                    array(    'UPDATE'=>array(
                            "Activar"	=>'true',//'false'
                            "LIKE"		=>'false',//'false'
                            "ModifiColumnas"   =>$getColumnas,//array()
                            "ModifiDatos"    	=>$ModifiDatos,//array()
                            "BuscaColumnas"  	=>$BuscaColumnas,//array()
                            "BuscaDatos"     	=>$BuscaDatos,//array()
                            #"Excepcion"        =>$Excepcion
                        )
                    )
                );    
                $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
                $Ares_v1->viewSql();                            //visualisa el codigo generado
                #$sql=$Ares_v1->getSql();                        //recupera el codigo generado

            
        }
    */
    
?>