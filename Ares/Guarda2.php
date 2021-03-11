<?php

echo"<div id='consola_guarda' class='consola_guarda'style=''>";			
	echo "<div onclick='ventanas2(consola_guarda);'style='z-index: 3; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";
	$Operacion['Guardar']=TRUE;
	$database='sistema_cuentas_ares';
	$Tablas['Para_guardar']=Array(
		"folio",
		"abo_acu",

		"casetas",
		"casetas_c",
		"casetas_via",
		"casetas_c_via",

		"diesel",
		"diesel_c",

		"facturas",
		"facturas_c",

		"fechas",
		"fletes",
		"fletes_c",

		"guias",
		"guias_c",

		"km",

		"maniobras",
		"maniobras_c",

		"ryr",
		"ryr_c",

		"viaticos",
		"viaticos_c",
		
	);	
	$Tablas['RegistroExistente']=Array();
	$Tablas['RegistroNoExistente']=Array();
	
	for ($i=0; $i <count($Tablas['Para_guardar']) ; $i++) { 
		$tabla_actual=$Tablas['Para_guardar'][$i];
		$getColumnas        = array('*') ;
		$BuscaColumnas      = array('ID_G') ;
		$BuscaDatos         = array(5);
		$Condiciones        = array();
		$array=array(
			"tabla"=>$tabla_actual,
			"Operacion"=>
			array(   'SELECT'=>array(
					"Activar"	=>'true',
					"LIKE"		=>'falses',
					"getColumnas"	=>$getColumnas,
					"BuscaColumnas"	=>$BuscaColumnas,
					"BuscaDatos"	=>$BuscaDatos,
					"Condiciones"	=>$Condiciones,
					"LIMIT"			=>array(
						"Elementos"=>'',
						"posicion"=>''
					),

				), 
			)
		);	
		$Ares_v1->GeneraSql($array);
		$sql=$Ares_v1->getSql();
		#$Ares_v1->viewSql();
		$res=$libre_v2->ejecuta($conexion,$sql,$phpv);
		$elemento_encontrados=$libre_v2->mysql_nu_ro($res,$phpv);
		if($elemento_encontrados>=1){#### si ya existe un registro, detiene le proceso de guardado 
			$Tablas['RegistroExistente'][]=$elemento_encontrados;
			echo"Existe Un Registro";
		}else{
			$Tablas['RegistroNoExistente'][]=$elemento_encontrados;

		}
	}
	if(count($Tablas['Para_guardar'])!=count($Tablas['RegistroNoExistente'])){#### sis todas las tablas estan disponibles guardas
		$Operacion['Guardar']=false;
		echo "las siguentes tablas lla contiene registros ";
		/*
		echo('<pre>');
		print_r($Tablas['RegistroExistente']);
		echo('</pre>');   
		*/
	}

	if($Operacion['Guardar']==true){
		$traductor= new traductor();	
		$datos_de_traducion=$traductor->traductor_tablas()['traduciones']['sistema_cuentas_ares'];
		for ($i=0; $i <count($Tablas['Para_guardar']) ; $i++) { 
#			echo $tabla_actual=$Tablas['Para_guardar'][$i];
			$tabla_actual=$Tablas['Para_guardar'][$i];
			#echo"<br>";
			$libre_v4->Columnas($database,$tabla_actual);
			if(count($datos_de_traducion[$tabla_actual])!=count($libre_v4->getColumnas())){			
				echo"datos desigual";
				/*
					$libre_v4->ColunasInPost_traduccion($datos_de_traducion[$tabla_actual]);
					echo('<pre>');
					print_r($datos_de_traducion[$tabla_actual]);
					echo('</pre>');   
					echo('<pre>');
					print_r($libre_v4->getColumnas());
					echo('</pre>');   
				*/
				
			}
			if(count($datos_de_traducion[$tabla_actual])==count($libre_v4->getColumnas())){				
				
				/*
				echo"traducion";
				echo count($datos_de_traducion[$tabla_actual]);
				echo('<pre>');
				print_r($datos_de_traducion[$tabla_actual]);
				echo('</pre>');   
				echo"<br>";
				echo"columnas";
				echo count($libre_v4->getColumnas());	
				echo('<pre>');
				print_r($libre_v4->getColumnas());
				echo('</pre>');   
				*/
				
				$ValoresInsert=array();
				
				$ColumnasInsert     = $libre_v4->getColumnas();
				for ($h=0; $h <count($libre_v4->getColumnas()) ; $h++) { 
					$ValoresInsert[]=$_POST[$datos_de_traducion[$tabla_actual][$libre_v4->getColumnas()[$h]]];
				}
				
				#$ValoresInsert= array($_POST['Fecha'],$_POST['Placas'],$_POST['Cliente'],$_POST['Operador'],$_POST['Contador_Inicio'],$_POST['Contador_Final'],$_POST['Total_Despachado']);
				
				$array_insert=array(
					"tabla"=>$tabla_actual,
					"Operacion"=>
					array(  
							'INSERT'=>array(
							"Activar"    =>'true',//'false'
							"ValoresByKey"		=>array(),
							"ColumnasInsert"    =>$ColumnasInsert,//array(),
							"ValoresInsert"     =>$ValoresInsert, //array(),
							"Excepcion"			=>array()//$Excepcion
						),         
					)
				);
				
				$Ares_v1->GeneraSql($array_insert);
				#$Ares_v1->viewSql();
				$sql=$Ares_v1->getSql();
				$libre_v2->db($database,$conexion,$phpv);
				$resultadoSQl=$libre_v2->ejecuta($conexion,$sql,$phpv);
				if($resultadoSQl){
					echo"OK :".$tabla_actual;
					echo "<br>";
				}

				
			}

		}
	}

	#### comprueba que esten en todas las tablas disponibles para guardar 
echo"</div>";
?>