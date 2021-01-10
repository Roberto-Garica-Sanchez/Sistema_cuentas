<?php
$database='combustible';
mysqli_select_db ($conexion ,$database);
#obtiene la informacion del tanque que cambiara de nivel 
$datos_tanque_consu =$libre_v2->consulta('tanques',$conexion,'desendente','','','',$phpv,'','');

while ($Tanques=$libre_v2->mysql_fe_ar		($datos_tanque_consu,$phpv,'')) {
    $CombustibleRestante=$Tanques['NivelActual'];
    echo"<div class='Contenedor_auto2_1'>";
        #presenta los dtos del tanque actual 
        echo"Tanque: ";            
        echo $libre_v5->input('text','',$Tanques['Nombre'],'','Medio','','','width: 100px;');
            if($Tanques['Unidad']!='Unidad'){
                echo"<br>:Unidad ";            
                echo $libre_v5->input('text','',$Tanques['Unidad'],'','Medio','','','width: 100px;');
            }
        echo"<br>Capacidad: ";            
        echo $libre_v5->input('text','',$Tanques['Capacidad'],'','Medio','','','width: 100px;');
        echo"<br>Litros Disponible: ";            
        echo $libre_v5->input('text','',$Tanques['NivelActual'],'','Medio','','','width: 100px;');
        
        echo"<br>Fecha Registro: ";            
        echo $libre_v5->input('text','',$Tanques['Fecha'],'','Medio','','','width: 100px;');
        echo"<br>Ultimo Repostaje: ";            
        echo $libre_v5->input('text','',$Tanques['Ultimo_Repostaje'],'','Medio','','','width: 100px;');
        $array=array(
            "tanque"=>$Tanques['Nombre'],
            "FechaRegistro"=>$Tanques['Fecha'],
            "FechaInicio"=>$Tanques['Ultimo_Repostaje'],
            "Fechafinal"=>''
        );
        $Control=$subRutinas_combustible->Control_repostaje_tanque($array);
        
        echo"<br>Repostajes Realizados: ";   
        echo $libre_v5->input('text','',$Control['Contador'],'','Medio','','','width: 100px;');
        echo"<br>Fechas: ";   
            $despieges=array(
                "Elementos"=>$Control['Fechas'],
                "class"=>'Medio'
            );
        echo $libre_v5->despieges($despieges);
        # Busca consumo repostajes de unidades antes del primer abastesimiento       
        if($Control['Contador']==0 or ($Control['Contador']!=0 and $Control['Fechas'][0]>$Tanques['Fecha'])){
            echo"<div>" ;
            #obtiene los repostajes efectuados desde la registro del tanque hasta el primer repostaje (obio el tanque tiene combustibleanterior)
            if($Control['Contador']==0)$fecha_final=''; else$fecha_final=$Control['Fechas'][0];
            $array_bru=array(
                "Tanque"=>$Tanques['Nombre'],
                "Unidad"=>'',
                "LitrosRestantes"=>$Tanques['NivelActual'],
                "FechaInicio"=>$Tanques['Ultimo_Repostaje'],
                "Fechafinal"=>$fecha_final
            );
            $Respotajes=$subRutinas_combustible->Busca_repostajes_unidades($array_bru);
            $CombustibleRestante=$CombustibleRestante-$Respotajes['SumaConsumo'];
            
            
                echo"<br>Busqueda Repostaje a Unidades: ";            
                echo $libre_v5->input('text','',$Respotajes['Contador'],'','Medio','','','width: 100px;');
                echo"<br>Litros Iniciales: ";
                echo $libre_v5->input('text','',$Tanques['NivelActual'],'','Medio','','','width: 100px;');
                echo"<br>Litros Consumidos: ";
                echo $libre_v5->input('text','',$Respotajes['SumaConsumo'],'','Medio','','','width: 100px; color: red;');
                echo"<br>Litros Restantes: ";
                echo $libre_v5->input('text','',$CombustibleRestante,'','Medio','','','width: 100px;');
                echo "<br>".$Respotajes['Interface_de_usuario'];
            echo"</div>";
        }
        
        #abastesimiento tanques
        if($Control['Contador']>0){#si el control detecto un reabastesimiento             
            $array_brt=array(
                "tanque"=>$Tanques['Nombre'],
                "NivelDetanque"=>$CombustibleRestante,
                "FechaInicio"=>$Tanques['Ultimo_Repostaje'],
                "Fechafinal"=>''
            );
            $busquesaRepostajes=$subRutinas_combustible->Busca_repostajes_tanques($array_brt);            
            echo"<div class='Contenedor_auto2_1'>";
                echo"Repostaje A tanque: ";
                echo $libre_v5->input('text','',$busquesaRepostajes['Contador'],'','Medio','','','width: 100px;');
                echo"<br>Fecha Para Cierre: ";
                echo $libre_v5->input('radio','TanqueCierre',$Tanques['Nombre'],'','none','','','');
                echo $libre_v5->input('text','FechaCierre',$busquesaRepostajes['FechaCierre'],'','Medio','','','width: 100px;');
                echo"<br>Litros Restantes: ";
                echo $libre_v5->input('text','',$CombustibleRestante,'','Medio','','','width: 100px;');
                echo"<br>".$busquesaRepostajes['Interface_de_usuario'];
                $CombustibleRestante=$busquesaRepostajes['NuevoNivel'];
            echo"</div>";
			$array=array(
				"tabla"=>"Tanques",
				"Operacion"=>
				array('UPDATE'=>array(
						"Activar"	=>'true',//'false'
						"LIKE"		=>'false',//'false'
						"ModifiColumnas"    =>array('Ultimo_Repostaje','NivelActual'),
						"ModifiDatos"    	=>array($busquesaRepostajes['FechaCierre'],$CombustibleRestante),//array()
						"BuscaColumnas"  	=>array('Nombre'),//array()
						"BuscaDatos"     	=>array($Tanques['Nombre']),//array()
						"Condiciones"  		=>'',
						"Excepcion"			=>''
					)
				)
            );
            $Ares_v1->GeneraSql($array);
            echo $sql=$Ares_v1->getSql();
            
            if (mysqli_query($conexion, $sql)) {                                //Envia las instruciones pa MYSQL para guarda la informacion 
                if(empty($consola))$consola='';
                if(empty($res))$res='';
                $res="OK";
                $consola=$consola."<a class='ok'>Se han Modificado ".mysqli_affected_rows($conexion)."</>";
        
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
            }
            
        }
       
        echo"<br>";
        
    echo"</div>";
}

?>