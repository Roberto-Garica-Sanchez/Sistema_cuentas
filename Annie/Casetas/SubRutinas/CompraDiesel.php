<?php
    /* 
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
        case 'NuevoRegistro':
            $tanquemodificado=$datos['Tanque']['Nombre'];
            include('ActualizaNivelTanque.php');
        break;
        case 'CambioRegistro':
            /*
                #obtenemos los datos del registro existente ya modificados
                    $array=array(
                        "tabla"=>'repostajes_tanques',
                        "Operacion"=>
                        array('SELECT'=>array(
                                "Activar"	=>'true',
                                "LIKE"		=>'falses',
                                "getColumnas"	=>array('*'),
                                "BuscaColumnas"	=>array('ID'),
                                "BuscaDatos"	=>array($datos['CompraDiesel_RegistroPrevio']['ID']),
                            )
                        )
                    );  
                    $Ares_v1->GeneraSql($array);
                    #$Ares_v1->viewSql();               
                    $sql=$Ares_v1->getSql();  
                    $libre_v2->db($database,$conexion,$phpv);
                    if ($Respuesta_sql['Compra_combustible']=mysqli_query($conexion, $sql)) {  
                        #consulta Exitosa                     
                        $datos['CompraDiesel_RegistroModificado']=$libre_v2->mysql_fe_ar		($Respuesta_sql['Compra_combustible'],$phpv,'');
                    }else{
                        #error de la consulta
                        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       
                    }   
                #compara los datos antes y despues de modificar 
                    $columnas   = $libre_v4->Columnas($database,$tabla); 
                    $CambioDetectados=array();
                    for ($i=0; $i <count($columnas) ; $i++) { 
                        if($datos['CompraDiesel_RegistroModificado'][$columnas[$i]]!=$datos['CompraDiesel_RegistroPrevio'][$columnas[$i]]){
                            $CambioDetectados[$columnas[$i]]=array(
                                "ValorPre"=>$datos['CompraDiesel_RegistroPrevio'][$columnas[$i]],
                                "ValorPos"=>$datos['CompraDiesel_RegistroModificado'][$columnas[$i]]
                            );

                        }
                    }   
                #ACTUALIZA LAS COLUMNAS MODIFICADAS
            */
            $tanquemodificado=$datos['Tanque']['Nombre'];
            include('ActualizaNivelTanque.php');
        break;
        case 'EliminarRegistro':
            $tanquemodificado=$datos['Tanque']['Nombre'];
            include('ActualizaNivelTanque.php');

        break;
    }
?>