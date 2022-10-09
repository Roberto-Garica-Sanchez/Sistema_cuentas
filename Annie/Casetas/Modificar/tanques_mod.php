<?php
    #consifuraciones iniciales 

    $columnas   =$libre_v4->Columnas($database,$tabla);        #obtiene las columnas de la tabla tanque
                 $libre_v4->KeyColumnUsege($database,$tabla);  #busca si existe una columna auto incremental
    $IdKey      =$libre_v4->getKeyColumnUsege();
    $valores    =$libre_v4->ColunasInPost();                   #obtiene los valores enviado por post apartir de los nombre de las columnas 

    #Proceso previo para modificar el Nombre 
    $libre_v2->db($database,$conexion,$phpv);
    $res=$libre_v2->consulta($tabla,$conexion,$IdKey,$_POST[$IdKey],'','',$phpv,'','');
    #resultados=$libre_v2->mysql_nu_ro($DatosTemporales,$phpv);
    $DatosTemporales=$libre_v2->mysql_fe_ar($res,$phpv,'');

    #Proceso de modificasion a registro 
    
    
    $getColumnas    =$columnas;                //columnas de insert 
    $ModifiDatos    =$valores;                //valores para insetar en la tabla 
    $BuscaColumnas  =array($IdKey); 
    $BuscaDatos     =array($_POST[$IdKey]);
    $Excepcion      =array($IdKey);
    $array=array(
        "tabla"=>$tabla,
        "Operacion"=>
        array('UPDATE'=>array(
                "Activar"	=>'true',//'false'
                "LIKE"		=>'false',//'false'
                "ModifiColumnas"    =>$getColumnas,//array()
                "ModifiDatos"    	=>$ModifiDatos,//array()
                "BuscaColumnas"  	=>$BuscaColumnas,//array()
                "BuscaDatos"     	=>$BuscaDatos,//array()
                "Excepcion"			=>$Excepcion
            )
        )
    );
    
    $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
    #$Ares_v1->viewSql();                            //visualisa el codigo generado
    $sql=$Ares_v1->getSql();                        //recupera el codigo generado
    
    #modifica los registros 
        $libre_v2->db($database,$conexion,$phpv);
        $array=array('Sql'=>$sql);
        $res=$ProcesosMysql->Update($array);
        if($res['Registros']>=0){  
    
            if(empty($consola))$consola='';
            $consola=$consola."<br><a style='color:green;'>Se modificaron ".$res['Registros']."</a>";
            
            #actualiza el nombre de el tanque a las cargas de combustible 
                if($DatosTemporales['Nombre']!=$_POST['Nombre'] and !empty($_POST['Nombre']) ){
                    $array=array(
                        "tabla"=>'repostajes_unidades',
                        "Operacion"=>
                        array('UPDATE'=>array(
                                "Activar"	=>'true',
                                "LIKE"		=>'true',
                                "ModifiColumnas"    =>array('TanqueSurtidor'),
                                "ModifiDatos"    	=>array($_POST['Nombre']),
                                "BuscaColumnas"  	=>array('TanqueSurtidor'),
                                "BuscaDatos"     	=>array($DatosTemporales['Nombre']),
                            )
                        )
                    );
                    
                    $Ares_v1->GeneraSql($array);                    
                    #$Ares_v1->viewSql();           
                    $libre_v2->db($database,$conexion,$phpv);                 
                    $sql=$Ares_v1->getSql();
                    $array=array('Sql'=>$sql);
                    $res=$ProcesosMysql->Update($array);
                    if(!empty($res['Registros'])){
                        $consola=$consola."<br><a style='color: green;'>Se Actualizados ".$res['Registros']."</a>";
                    }

                }
        
        
            $libre_v4->Columnas($database,$tabla);
            $libre_v4->ColunasInPostClear('');
        }
        
    #
    
    
?>