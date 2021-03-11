<?php
    /* 
    SUBRUTINAS PREVIAS A MODIFICASION 
    esta subrutina esta destinada a actualizar el nivel del tanque cada ves 
    que se registra un cambio en los registros de compra de diesel 

    */
    /*
        $subrutinas['CompraDiesel'] 
    */
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar'){$subrutinas['CompraDiesel']='NuevoRegistro';}
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar'){$subrutinas['CompraDiesel']='CambioRegistro';}
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Confirmar' and !empty($_POST['Confirma_eliminar'])){$subrutinas['CompraDiesel']='EliminarRegistro';}
    switch ($subrutinas['CompraDiesel']) {
        case 'NuevoRegistro':#obtenemos los datos del tanque que sufrira un cambio
        if(!empty($_POST['IDTanque']))$tanque=$_POST['IDTanque'];
        if(!empty($_POST['TanqueSurtidor']))$tanque=$_POST['TanqueSurtidor'];
        $array=array(
            "tabla"=>'tanques',
            "Operacion"=>
            array('SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>array('*'),
                    "BuscaColumnas"	=>array('Nombre'),
                    "BuscaDatos"	=>array($tanque)
                )
            )
        );
        $Ares_v1->GeneraSql($array); 
        #$Ares_v1->viewSql();                   
        $sql=$Ares_v1->getSql();            
        $libre_v2->db($database,$conexion,$phpv);
        if ($Respuesta_sql['Tanque']=mysqli_query($conexion, $sql)) {  
            #consulta Exitosa        
            $datos['Tanque']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Tanque'],$phpv,'');             
        }else{
            #error de la consulta
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
        }
        break;
        case 'CambioRegistro': 
            #obtenemos los datos del registro existente que aun no han sido modificados
                if($_POST[$name_menu_repostajes]==$elementos_menu_repostajes[0])$tanqueOriginal='repostajes_unidades';
                if($_POST[$name_menu_repostajes]==$elementos_menu_repostajes[1])$tanqueOriginal='repostajes_tanques';
                if(!empty($_POST['TanqueSurtidor']))$tanque=$_POST['TanqueSurtidor'];
                    $array=array(
                        "tabla"=>$tanqueOriginal,
                        "Operacion"=>
                        array('SELECT'=>array(
                                "Activar"	=>'true',
                                "LIKE"		=>'falses',
                                "getColumnas"	=>array('*'),
                                "BuscaColumnas"	=>array('ID'),
                                "BuscaDatos"	=>array($_POST['ID']),
                            )
                        )
                    );  
                    $Ares_v1->GeneraSql($array);
                    #$Ares_v1->viewSql();                      
                    $sql=$Ares_v1->getSql();  
                    $libre_v2->db($database,$conexion,$phpv);
                    if ($Respuesta_sql['Registro_original']=mysqli_query($conexion, $sql)) {  
                        #consulta Exitosa                     
                        $datos['Registro_original']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Registro_original'],$phpv,'');
                        
                    }else{
                        #error de la consulta
                        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
                    }   
            #obtenemos los datos del tanque que sufrira un cambio
                if(!empty($_POST['IDTanque']))$tanque=$_POST['IDTanque'];
                if(!empty($_POST['TanqueSurtidor']))$tanque=$_POST['TanqueSurtidor'];
                $array=array(
                    "tabla"=>'tanques',
                    "Operacion"=>
                    array('SELECT'=>array(
                            "Activar"	=>'true',
                            "LIKE"		=>'falses',
                            "getColumnas"	=>array('*'),
                            "BuscaColumnas"	=>array('Nombre'),
                            "BuscaDatos"	=>array($tanque)
                        )
                    )
                );
                $Ares_v1->GeneraSql($array); 
                #$Ares_v1->viewSql();            
                $sql=$Ares_v1->getSql();            
                $libre_v2->db($database,$conexion,$phpv);
                if ($Respuesta_sql['Tanque']=mysqli_query($conexion, $sql)) {  
                    #consulta Exitosa    
                    #echo"resultados: ".$libre_v2->mysql_nu_ro($Respuesta_sql['Tanque'],$phpv);
                    $datos['Tanque']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Tanque'],$phpv,'');             
                }else{
                    #error de la consulta
                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
                }
        break;
        case 'EliminarRegistro':
            #obtenemos los datos del registro existente que aun no han sido modificados
                if($_POST[$name_menu_repostajes]==$elementos_menu_repostajes[0])$tanqueOriginal='repostajes_unidades';
                if($_POST[$name_menu_repostajes]==$elementos_menu_repostajes[1])$tanqueOriginal='repostajes_tanques';
                    $array=array(
                        "tabla"=>$tanqueOriginal,
                        "Operacion"=>
                        array('SELECT'=>array(
                                "Activar"	=>'true',
                                "LIKE"		=>'falses',
                                "getColumnas"	=>array('*'),
                                "BuscaColumnas"	=>array('ID'),
                                "BuscaDatos"	=>array($_POST['ID']),
                            )
                        )
                    );  
                    $Ares_v1->GeneraSql($array);
                    #$Ares_v1->viewSql();               
                    $sql=$Ares_v1->getSql();  
                    $libre_v2->db($database,$conexion,$phpv);
                    if ($Respuesta_sql['Registro_original']=mysqli_query($conexion, $sql)) {  
                        #consulta Exitosa                     
                        $datos['Registro_original']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Registro_original'],$phpv,'');
                    }else{
                        #error de la consulta
                        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
                    }   
            #obtenemos los datos del tanque que sufrira un cambio
                if(!empty($_POST['IDTanque']))$tanque=$_POST['IDTanque'];
                if(!empty($_POST['TanqueSurtidor']))$tanque=$_POST['TanqueSurtidor'];
                $array=array(
                    "tabla"=>'tanques',
                    "Operacion"=>
                    array('SELECT'=>array(
                            "Activar"	=>'true',
                            "LIKE"		=>'falses',
                            "getColumnas"	=>array('*'),
                            "BuscaColumnas"	=>array('Nombre'),
                            "BuscaDatos"	=>array($tanque)
                        )
                    )
                );
                $Ares_v1->GeneraSql($array); 
                #$Ares_v1->viewSql();            
                $sql=$Ares_v1->getSql();            
                $libre_v2->db($database,$conexion,$phpv);
                if ($Respuesta_sql['Tanque']=mysqli_query($conexion, $sql)) {  
                    #consulta Exitosa        
                    $datos['Tanque']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Tanque'],$phpv,'');             
                }else{
                    #error de la consulta
                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
                }
        break;
    }
?>