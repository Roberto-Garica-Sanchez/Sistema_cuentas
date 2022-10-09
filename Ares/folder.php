<?php
#### #### Interface
$libre_v2->db('almacen',$conexion,$phpv);
$consu_choferes	= 	$libre_v2->consulta	('operadores'	,$conexion	,'','','Nombre'	,'' ,$phpv,'','');
$consu_placas	= 	$libre_v2->consulta	('unidades'		,$conexion	,'','','Placas'	,''	,$phpv,'','');
$consu_clientes	= 	$libre_v2->consulta	('clientes'		,$conexion	,'','','Nombre'	,''	,$phpv,'','');
	######################## Configuracion de aranque
	if(empty($style_chofer))$style_chofer='';
	if(empty($style_placas))$style_placas='';
	if(empty($style_cliente))$style_cliente='';
	if(empty($style_Carta1))$style_Carta1='';
	if(empty($style_Carta2))$style_Carta2='';
	if(empty($style_Carta3))$style_Carta3='';
	if(empty($style_Carta4))$style_Carta4='';
	if(empty($style_estado))$style_estado='';
	if(empty($estado))$estado='';
	if(empty($style_D))$style_D='';
	if(empty($style_M))$style_M='';
	if(empty($style_A))$style_A='';
	if(empty($style_D_r))$style_D_r='';
	if(empty($style_M_r))$style_M_r='';
	if(empty($style_A_r))$style_A_r='';
	if(empty($style_km_i))$style_km_i='';
	if(empty($style_km_f))$style_km_f='';
	if(empty($style_flete_r))$style_flete_r='';
	if(empty($style_come))$style_come='';
	if(empty($_POST['chofer']))$_POST['chofer']='';
	if(empty($_POST['placas']))$_POST['placas']='';
	if(empty($_POST['cliente']))$_POST['cliente']='';
	if(empty($_POST['flete_r']))$_POST['flete_r']=0;
	if(empty($_POST['N_Cuenta']))$_POST['N_Cuenta']='';
	if(empty($_POST['come']))$_POST['come']='';

######################## Informmacion vital
	echo"<div id='general_info' style='float: right;background: #05486cab;width: 220px;right: 0px;top: 0px;bottom: 5px;position: relative;color: white;'>";
		#### Informacion primaria
			echo"<div id='datos_info'>";
				echo $libre_v2->input2('text','','','Estado',"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('button','estado','',$estado,$style_estado."width: 60%",'',"disabled",'botones_submenu');
				echo $libre_v2->input2('hidden','CambRevi','',$_POST['CambRevi'],'','','','');
				echo $libre_v2->input2('text','','','Operador'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql('chofer','Operador',$consu_choferes,'Nombre',$phpv,"style='width: 60%; ".$style_chofer."' id='CHOFER' onchange='carga_arrastrados();'",'botones_submenu','Nombre',$_POST['chofer']);
				echo $libre_v2->input2('text','','','Unidad'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql('placas','Unidad',$consu_placas,'Placas',$phpv,"style='width: 60%; $style_placas' id='placas'",'botones_submenu','Placas',$_POST['placas']);
				echo $libre_v2->input2('text','','','Cliente'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql('cliente','Cliente',$consu_clientes,'Nombre',$phpv,"style='width: 60%; $style_cliente;' id='cliente'",'botones_submenu','Nombre',$_POST['cliente']);
				echo $libre_v2->input2('text','','','Carta Porte 1'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','Carta1','',''					,"width: 60%","",'onkeypress="return valida_n(event,Carta2)"'		,'botones_submenu');
				echo $libre_v2->input2('text','','','Carta Porte 2'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','Carta2','',''					,"width: 60%","",'onkeypress="return valida_n(event,Carta3)"'		,'botones_submenu');
				echo $libre_v2->input2('text','','','Carta Porte 3'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','Carta3','',''					,"width: 60%","",'onkeypress="return valida_n(event,Carta4)"'		,'botones_submenu');
				echo $libre_v2->input2('text','','','Carta Porte 4'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','Carta4','',''					,"width: 60%","",'onkeypress="return valida_n(event,D)"'			,'botones_submenu');
				#input2				($type2,$name,$title,$value,$style,$id,$libre,$class)	

				echo $libre_v2->input2('text','','','Fecha Inicio'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','D','',''							,"width: 20%","",'onkeypress="return valida_n(event,M)"'			,'botones_submenu');
				echo $libre_v2->input2('text','M','',''							,"width: 20%","",'onkeypress="return valida_n(event,A)"'			,'botones_submenu');
				echo $libre_v2->input2('text','A','',''							,"width: 20%","",'onkeypress="return valida_n(event,D_r)"'			,'botones_submenu');
				
				echo $libre_v2->input2('text','','','Fecha Final'				,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','D_r','',''						,"width: 20%","",'onkeypress="return valida_n(event,M_r)"'			,'botones_submenu');
				echo $libre_v2->input2('text','M_r','',''						,"width: 20%","",'onkeypress="return valida_n(event,A_r)"'			,'botones_submenu');
				echo $libre_v2->input2('text','A_r','',''						,"width: 20%","",'onkeypress="return valida_n(event,KM_S)"'			,'botones_submenu');
				
				echo $libre_v2->input2('text','','','Km Inicio'					,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','KM_S','',''						,"width: 60%","",'onkeypress="return valida_n(event,KM_E)"'			,'botones_submenu');
				echo $libre_v2->input2('text','','','Km Inicio'					,"width: 40%",''													,"disabled",'botone_n');
				echo $libre_v2->input2('text','KM_E','',''						,"width: 60%","",'onkeypress="return valida_n(event,Flete_R)"'		,'botones_submenu');
				
				echo $libre_v2->input2('text','','','Flete Real'					,"width: 40%",''												,"disabled",'botone_n');
				echo $libre_v2->input2('text','Flete_R','',''						,"width: 60%","",'onkeypress="return valida_n(event,N_Cuenta)"'			,'botones_submenu');
				
				echo $libre_v2->input2('text','','','Numero Cuenta'					,"width: 40%",''												,"disabled",'botone_n');
				echo $libre_v2->input2('text','N_Cuenta','',''						,"width: 60%","",'onkeypress="return valida_n(event,come)"'			,'botones_submenu');
				
				echo $libre_v2->input2('text','','','Comentarios'					,"width: 40%",''												,"disabled",'botone_n');
				echo $libre_v2->input2('tarea','come','',''							,"width: 60%","",'onkeypress="return valida_n(event,)"'			,'botones_submenu');
			echo"</div>";
		#### Botones Operadores
			echo"<div style='position: relative;'>";
				echo $libre_v2->input2('submit','operador','',"Limpiar"			,'									bottom: 5px;		right: 110px;width: 110px;'					,'limpia_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('submit','operador','',"Buscar"			,'					width: 110px;	bottom: 5px;		right: 0px;'	,'guarda_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('button','operador','',"Guardar Cambios"	,'display: none;	width: 110px;	bottom: 5px;		right: 0px;'	,'cambio_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('button','operador','',"Confirmar"		,'display: none;	width: 110px;	bottom: 40px;	right: 0px;background: yellow;color: black;','confirma_cuenta','','botones_submenu');
			echo"</div>";	
		####	
	echo"</div>";				
	$DataBase='sistema_cuentas_ares';
		
		$tabla="folio";
		$getColumnas        = array('*') ;
		$BuscaColumnas      = array();#array('ID_G') ;
		$BuscaDatos         = array();#array(5);
		$Condiciones        = array();		
	
		$array=array(
			"tabla"=>$tabla,
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
					"ByOrder"		=>array(
						"Columna"	=>'',
						"ASC-DESC"	=>'DESC'
					),
					"JOIN"=>array(
						'Inner Join'=>Array(
							'ColumnaUnion'=>'',	
							'vinculos'=>array(
								'tabla'=>array(),
								'columna'=>array(),
								
							)
						),
						'Left outer Join'=>Array(),
						'Right outer Join'=>Array(),
						'Full outer join'=>Array(),

					)

				),    
			)
		);
		Control_Consulta($array_consulta);
		
		$Ares_v1->GeneraSql($array);
		$Ares_v1->viewSql();
		$SQL=$Ares_v1->getSql();
		
		$libre_v2->db($DataBase,$conexion,$phpv);
		$consulta=$libre_v2->ejecuta($conexion,$SQL,$phpv);
		$libre_v4->Columnas($DataBase,$tabla);
		$columnas=$libre_v4->GetColumnas();
		$style_Columnas="width: 60px; font-size:11px;";
		
		$Lista_cuentas= new inface($DataBase,$tabla,$phpv,$conexion);
		$array=array(
			'tipo'=>array('lista'=>'true'),
			'class'=>array(
				'columnaFija'=>	' design_black dsgn_border_blue_1 PX_wd_gra  PX_hg_med txt_le hov_yellow_claro1 ',
				'casilla'=>		' design_gris  dsgn_border_blue_1 PX_wd_gra  PX_hg_med txt_le hov_azul_claro1',
				'id'=>'Diseno_boton_id'
			),
			#'style'=>array(
			#	"casillas"=>''
			#),
			'viewValidacion'=>'false',         
			#'validacionFormularo'=>$validacionFormularo,
			'CambiosColumnas'=>array(
				'TextColumna'=>array(
					'ID_G'=>'Carta Porte',
					'PLACAS'=>'Unidad',
					'CHOFER'=>'Operador',
					'Difer_1'=>'Saldo De Cuenta',
					'sueldo'=>'Sueldo',
					'N_Cuenta'=>'Numero Cuenta',
					'isr'=>'Retencion ISR',
				),                   
				#'ColumnasEspeciales'=>$ColumnasEspeciales       
			),
			"Interfaces"=>array(
				"tablas_relacionadas"=>array(
				)
			),
			"Ocultar_columanas"=>array(
				'Carta1'=>true,
				'Carta2'=>true,
				'Carta3'=>true,
				'Carta4'=>true
			),
			"lista"=>array(
				"ByOrder"=>array(
					"Columna"	=>'ID_G',
					"ASC-DESC"	=>'DESC'
				)
			)
		);
		
	echo"<div id='Datos_de_consulta' style='position: relative;background: #05486cab;padding: 5px;overflow-y: auto;border: 1px solid #0e6a9c;height: 68vh; width: max-content;'>";	
		$Lista_cuentas->Interface_de_usuario2($array);
	echo"</div>";
	/*
	echo"<div style='position: relative;background: lightseagreen;float: left; '>";
		echo"<div id='Columnas'style='width: max-content;'> ";	
			for ($i=0; $i <count($columnas) ; $i++) { 
				#echo $columnas[$i];
				#echo"<br>";
				echo $libre_v5->input('button','',$columnas[$i],'Columna_'.$columnas[$i],'botones_submenu','','','float: left; padding: 5px 10px;'.$style_Columnas);
			}
			
		echo"</div>";
		
		echo"<div id='Datos_de_consulta' style='position: relative;background: #05486cab;padding: 5px;overflow-y: auto;border: 1px solid #0e6a9c;height: 68vh; width: max-content;'>";	
			while($datos=$libre_v2->mysql_fe_ar($consulta,$phpv,'Columna')){
				echo"<div>";
					for ($i=0; $i <count($columnas) ; $i++) { 
						#echo $columnas[$i];
						#echo"<br>";
						echo $libre_v5->input('button','',$datos[$columnas[$i]],'Columna_'.$columnas[$i],'botones_submenu',$datos[$columnas[$i]],'','float: left; padding: 5px 10px;'.$style_Columnas);
						#echo $libre_v5->input('button','',$columnas[$i],'Columna_'.$columnas[$i],'botones_submenu','','','float: left;width: min-content; padding: 5px 10px;');
					}
					#echo $datos['ID_G'];
					#echo $libre_v5->input('button','',$columnas[$i],'Columna_'.$columnas[$i],'botones_submenu','','','float: left;width: min-content; padding: 5px 10px;');

				echo"</div>";
				echo"<br>";
			}
			
		echo"</div>";	
	echo"</div>";		
	*/	



?>