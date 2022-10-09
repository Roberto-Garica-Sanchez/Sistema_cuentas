<?php
    if(!empty($_POST['Descarga_Cuenta_arrastrada'])){
        #echo"Descarga una cuenta vinculada";
        
        #### Descarga 
        $tabla_vinculaciones_by_id='folio';
        $getColumnas=array('ID_G','FechaSalida','Difer_1');
        $BuscaColumnas=array('ID_G');
        $BuscaDatos=array($_POST['Descarga_Cuenta_arrastrada']);
    
        $array=array(
            "tabla"=>$tabla_vinculaciones_by_id,
            "Operacion"=>array(       
                'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>$getColumnas,
                    "BuscaColumnas"=>$BuscaColumnas,
                    "BuscaDatos"	=>$BuscaDatos,
                    "ByOrder"		=>array(
                            "Columna"	=>'ID_G',
                            "ASC-DESC"=>'DESC'
                    ),
                ),    
            )
        );


        $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
        #$Ares_v1->viewSql();                            //visualisa el codigo generado
        $sql=$Ares_v1->getSql();                        //recupera el codigo generado
        $libre_v2->db($database,$conexion,$phpv);
        if ($res=mysqli_query($conexion, $sql)) {           
            $libre_v4->Columnas($database,$tabla_vinculaciones_by_id);
            $Columnas=$libre_v4->GetColumnas();
            $datos=$libre_v2->mysql_fe_ar($res,$phpv,'');
            $datos_to_arrastre=array(
                "ID"=>$datos['ID_G'],
                "Fechas"=>$datos['FechaSalida'],
                "Cantidad"=>$datos['Difer_1'],
            );
            /*
                while($datos=$libre_v2->mysql_fe_ar($res,$phpv,'')){
                    echo('<pre>');
                    print_r($datos);
                    echo('</pre>'); 
                }
            */

    }else{
         echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
               #echo('<pre>');
               #print_r($datos);
               #echo('</pre>'); 
    }
?>