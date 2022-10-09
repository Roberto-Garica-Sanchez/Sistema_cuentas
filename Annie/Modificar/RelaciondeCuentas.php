<?php

   
	$tabla_relacioncuentas='relacioncuentas';
    $array=array(
        "tabla"=>$tabla_relacioncuentas,
        "Operacion"=>array(  
            'viewSQL'=>'',  
            'SELECT'=>array(
                "Activar"	=>'true',
                "LIKE"		=>'falses',
                "getColumnas"	=>array('*'),
                "BuscaColumnas"	=>array('ID_G'),
                "BuscaDatos"	=>array($_POST['ID_G']),
                "ByOrder"		=>array(
                    "Columna"	=>'ID_G',
                    "ASC-DESC"	=>'DESC'
                ),

            )
        )
    );
    $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
    #$Ares_v1->viewSql();                            //visualisa el codigo generado
    $sql=$Ares_v1->getSql();                       //recupera el codigo generado

    $libre_v4->Columnas_Avanzado($database,$tabla_relacioncuentas);
    $columnas		= $libre_v4->getColumnas();

    $libre_v2->db($database,$conexion,$phpv);
    $array_CONSU_relacioncuentas=array(
        "index"=>array(),
        "ElementosEncontrados"=>0,
        "Columnas"=>$columnas,
        "Datos"=>array(),
    );
    $array_datos_en_Proceso=array(
        "index"=>array(),
        "ElementosEncontrados"=>0,
        "Columnas"=>$columnas,
        "Datos"=>array(),
    );

    #### obtiene los datos en procesado por el program 
    $name_prestamos='Prestamos';
    $memoria_name=$name_prestamos.'_memoria';
    $columna_index='ID';
    $columnas=array('ID','Fechas','Cantidad');
    for ($i=1; $i <$_POST[$memoria_name]; $i++) { 
        $name_Celda_prestamo=$name_prestamos.'_'.$columna_index.$i;
        $array_datos_en_Proceso['ElementosEncontrados']++;        
        $array_datos_en_Proceso['index'][]=$_POST[$name_prestamos.'_'.$columnas[0].$i];
        $array_datos_en_Proceso['Datos'][$_POST[$name_prestamos.'_'.$columnas[0].$i]]=array(
            "ID_G"=>$_POST['ID_G'],
            "ID_G_Arrastre"=>$_POST[$name_prestamos.'_'.$columnas[0].$i],
            "Saldo_Cuenta"=>$_POST[$name_prestamos.'_'.$columnas[2].$i],
        );
    }
     /*
    #### verificasion de elementos alterados 
    if ($res=mysqli_query($conexion, $sql)) {      
        #### obtiene los datos coincidentes con la tabla en proceso de guardado 
        #### con el objetivo de comparar los datos que se van a guardar/modificar y borrar          
		while($datos=$libre_v2->mysql_fe_ar($res,$phpv,'')){
            $array_CONSU_relacioncuentas['ElementosEncontrados']++;
            $array_CONSU_relacioncuentas['index'][]=$datos['ID_G_Arrastre'];
            $array_CONSU_relacioncuentas['Datos'][$datos['ID_G_Arrastre']]=array(
                "ID_G"=>$datos['ID_G'],
                "ID_G_Arrastre"=>$datos['ID_G_Arrastre'],
                "Saldo_Cuenta"=>$datos['Saldo_Cuenta'],
            );
		}
        echo('<pre>');
        print_r($array_datos_en_Proceso);
        echo('</pre>'); 
        echo('<pre>');
        print_r($array_CONSU_relacioncuentas);
        echo('</pre>'); 
        #### Comparacion 
        $array_Estatus=array(
            "insert"=>array(),
            "update"=>array(),
            "delect"=>array(),
        );
        if($array_CONSU_relacioncuentas['ElementosEncontrados']>0){
            #$array_datos_en_Proceso
            #$array_CONSU_relacioncuentas
            for ($i=0; $i <count($array_CONSU_relacioncuentas['index']) ; $i++) { 
                echo $index=$array_CONSU_relacioncuentas['index'][$i];
                echo('<pre>');
                print_r($array_datos_en_Proceso['Datos'][$index]);
                echo('</pre>'); 
                #if(isset($array_datos_en_Proceso['Datos'][$index])){
                #    echo$array_datos_en_Proceso['Datos'][$index];
                #};
                #echo $array_datos_en_Proceso['Datos'][$index];
                
                #echo $array_datos_en_Proceso['Datos']['Datos'];
                #echo array_key_exists($array_datos_en_Proceso['Datos'],$array_datos_en_Proceso['Datos']);
                echo"<br>";
            }
        }
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    */
?>