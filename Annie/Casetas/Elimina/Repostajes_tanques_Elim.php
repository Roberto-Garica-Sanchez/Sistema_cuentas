<?php
    $libre_v4->KeyColumnUsege($database,$tabla);
    $BuscaColumnas=array($libre_v4->getKeyColumnUsege());
    $BuscaDatos=array($_POST[$libre_v4->getKeyColumnUsege()]);

    $array=array(
        "tabla"=>$tabla,
        "Operacion"=>
        array('DELETE'=>array(
                "Activar"	=>'true',//'false'
                "LIKE"		=>'false',//'false'
                "BuscaColumnas"  	=>$BuscaColumnas,//array()
                "BuscaDatos"     	=>$BuscaDatos,//array()
            )
        )
    );

    $Ares_v1->GeneraSql($array);
    #$Ares_v1->viewSql();
    $sql=$Ares_v1->getSql();
    $libre_v2->db($database,$conexion,$phpv);
    
    if (mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa MYSQL para guarda la informacion 
        $consola="<br><a class='ok'>Se Eliminaron Registros ".mysqli_affected_rows($conexion)." </a>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
    }
    if(mysqli_affected_rows($conexion)>0){
        $libre_v4->Columnas($database,$tabla);
        $libre_v4->ColunasInPostClear();
    }
    

?>