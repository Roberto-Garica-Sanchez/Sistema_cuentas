<?php				
	$Sustituto=Array();
    $Sustituto['km']=array(
        'Total_Recorrido'=>'Total_km',
        'KilometrosPorLitro'=>'km_lts'
    );
    $Sustituto['Fletes']=array(
        'Flete_R'=>'Flete_Real',
        'comi_ass'=>'comi'
        );   
        for ($i=1; $i <=5; $i++) { 
            $name='Fletes'.$i;
            $nameSustituto='Fletes_Cantidad'.$i;
            $Sustituto['Fletes'][$name]=$nameSustituto;
        }
        
    $Sustituto['Fletes_C']=array();   
        for ($i=1; $i <=5; $i++) { 
            $name='Fletes_C'.$i;
            $nameSustituto='Fletes_Fechas'.$i;
            $Sustituto['Fletes_C'][$name]=$nameSustituto;
        }
    $Sustituto['Viaticos']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Viaticos'.$i;
            $nameSustituto='Viaticos_Cantidad'.$i;
            $Sustituto['Viaticos'][$name]=$nameSustituto;
        }  
    $Sustituto['Viaticos_C']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Viaticos_C'.$i;
            $nameSustituto='Viaticos_Fechas'.$i;
            $Sustituto['Viaticos_C'][$name]=$nameSustituto;
        }  
    $Sustituto['abonos']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Abonos'.$i;
            $nameSustituto='Abonos_Cantidad'.$i;
            $Sustituto['abonos'][$name]=$nameSustituto;
        }  
    $Sustituto['Abonos_C']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Abonos_C'.$i;
            $nameSustituto='Abonos_Fechas'.$i;
            $Sustituto['Abonos_C'][$name]=$nameSustituto;
        }  
    
    $Sustituto['acumulado']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Acumulado'.$i;
            $nameSustituto='Prestamos_Cantidad'.$i;
            $Sustituto['acumulado'][$name]=$nameSustituto;
        }  
    $Sustituto['Acumulado_C']=array();    
        for ($i=1; $i <=5; $i++) { 
            $name='Acumulado_C'.$i;
            $nameSustituto='Prestamos_Fechas'.$i;
            $Sustituto['Acumulado_C'][$name]=$nameSustituto;
        } 
    /*	
        echo('<pre>');
        print_r($Sustituto['Abonos_C']);
        echo('</pre>');  
    */
    ###
    for ($i=0; $i <count($TO_SAVE); $i++) {             
            $columnas   = $libre_v4->Columnas($database,$TO_SAVE[$i]);     //obtiene las columnas de la tabla tanque
            $libre_v4->ExtraColumns($database,$TO_SAVE[$i]);               //busca si existe una columna auto incremental
            $Excepcion  = $libre_v4->getExtraColumns();                     //obtiene los resultados de la busqueda 
            #### sistema de traducion de _POST a Nombres de tabla 
                if(!empty($Sustituto[$TO_SAVE[$i]])){                    
                    $array_DataToPost=array(
                        #"BuscaDatos"=>"",
                        #"getColumnas"=>array(),
                        "Columnas a transferir"=>$Sustituto[$TO_SAVE[$i]],
                    );
                }else{
                    $array_DataToPost='';
                }
            $valores    = $libre_v4->ColunasInPost($array_DataToPost);                       //obtiene los valores enviado por post apartir de los nombre de las columnas 
                        
            $ColumnasInsert     = $columnas;                //columnas de insert 
            $ValoresInsert      =  $valores;                //valores para insetar en la tabla 
            $array=array(
                "tabla"=>$TO_SAVE[$i],
                "Operacion"=>array(  
                    'INSERT'=>array(
                        "Activar"    =>'true',
                        "ColumnasInsert"    =>$ColumnasInsert,//array(),
                        "ValoresInsert"     =>$ValoresInsert, //array(),
                        "Excepcion"         =>$Excepcion
                    ) 
                )
        );
        
        $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
        #$Ares_v1->viewSql();                            //visualisa el codigo generado
        $sql=$Ares_v1->getSql();                        //recupera el codigo generado
        
            $libre_v2->db($database,$conexion,$phpv);
            if ($res=mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa / MYSQL para guarda la informacion 
                
                #echo('<pre>');
                #print_r($res);
                #echo('</pre>');
                if(empty($consola))$consola='';
                if(empty($res))$res='';
                $res="OK";
                #$consola=$consola."<a class='ok'>Se han Registros ".mysqli_affected_rows($conexion)."</>";

            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
            }
                  
            
            /*
            if(mysqli_affected_rows($conexion)>0){
                $libre_v4->Columnas($database,$tabla);
                $libre_v4->ColunasInPostClear('');
            }
            */
        
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
            /*
                echo $keys[$i];
                echo('<pre>');
                print_r($array_vinculaciones_by_id);
                echo('</pre>'); 
            */
            #proceso normal para modificasion 
            $columnas   = $libre_v4->Columnas($database,$tabla_vinculaciones_by_id);     //obtiene las columnas de la tabla tanque
            $libre_v4->getKeyColumnUsege($database,$tabla_vinculaciones_by_id);               //busca si existe una columna auto incremental
            #$valores    = $libre_v4->ColunasInPost($array_DataToPost);                       //obtiene los valores enviado por post apartir de los nombre de las columnas 
            $valores        =$array_vinculaciones_by_id[$keys[$i]];
            $ColumnasInsert =$columnas;                //columnas de insert 
            $ValoresInsert  =$valores;                //valores para insetar en la tabla 
            $Excepcion      =array();
            $array=array(
                "tabla"=>$tabla_vinculaciones_by_id,
                "Operacion"=>array(    
                    'INSERT'=>array(
                        "Activar"    =>'true',
                        "ColumnasInsert"    =>$ColumnasInsert,//array(),
                        "ValoresInsert"     =>$ValoresInsert, //array(),
                        "Excepcion"         =>$Excepcion
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
    
    
?>