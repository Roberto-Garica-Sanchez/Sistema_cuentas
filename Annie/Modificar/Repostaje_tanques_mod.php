<?php    
    $arrays='';
    $columnas   = $libre_v4->Columnas($database,$tabla);        //obtiene las columnas de la tabla tanque
    $libre_v4->KeyColumnUsege($database,$tabla);               //busca si existe una columna auto incremental
    $valores    = $libre_v4->ColunasInPost();                   //obtiene los valores enviado por post apartir de los nombre de las columnas 

        $getColumnas    =$columnas;                //columnas de insert 
        $ModifiDatos    =$valores;                //valores para insetar en la tabla 
        $BuscaColumnas  =array($libre_v4->getKeyColumnUsege()); 
        $BuscaDatos     =array($_POST[$libre_v4->getKeyColumnUsege()]);
        $Excepcion      =array($libre_v4->getKeyColumnUsege());
        $array=array(
            "tabla"=>$tabla,
            "Operacion"=>
            array(     'UPDATE'=>array(
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

    
    $libre_v2->db($database,$conexion,$phpv);
    if (mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa MYSQL para guarda la informacion 
        if(empty($consola))$consola='';
        $consola=$consola."<a class='ok'>Se modificaron ".mysqli_affected_rows($conexion)."</>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
    }
    if(mysqli_affected_rows($conexion)>0){
        $libre_v4->Columnas($database,$tabla);
        $libre_v4->ColunasInPostClear();
    }
    
    
    
?>