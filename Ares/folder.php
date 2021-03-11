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
				echo $libre_v2->input2('text','','','Operador'			,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql	('chofer','Operador',$consu_choferes,'Nombre',$phpv,"style='width: 60%; ".$style_chofer."' id='CHOFER' onchange='carga_arrastrados();'",'botones_submenu','Nombre',$_POST['chofer']);
				echo $libre_v2->input2('text','','','Unidad'			,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql	('placas','Unidad',$consu_placas,'Placas',$phpv,"style='width: 60%; $style_placas' id='placas'",'botones_submenu','Placas',$_POST['placas']);
				echo $libre_v2->input2('text','','','Cliente'			,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->despliegre_mysql	('cliente','Cliente',$consu_clientes,'Nombre',$phpv,"style='width: 60%; $style_cliente;' id='cliente'",'botones_submenu','Nombre',$_POST['cliente']);
				echo $libre_v2->input2('text','','','Carta Porte 1'		,"width: 40%",''		,"disabled",'botone_n');
				echo $libre_v2->input3($folio,'Carta1','input','text'	,'width: 60%;'.$style_Carta1,'botones_submenu','','','onkeypress="return valida_n(event,Carta2)"','');
				echo $libre_v2->input3($folio,'Carta2','inter','text'	,'width: 40%;'				,'botone_n','','','','');
				echo $libre_v2->input3($folio,'Carta2','input','text'	,'width: 60%;'.$style_Carta2,'botones_submenu','','','onkeypress="return valida_n(event,Carta3)"','');
				echo $libre_v2->input3($folio,'Carta3','inter','text'	,'width: 40%;','botone_n','','','','');
				echo $libre_v2->input3($folio,'Carta3','input','text'	,'width: 60%;'.$style_Carta3,'botones_submenu','','','onkeypress="return valida_n(event,Carta4)"','');
				echo $libre_v2->input3($folio,'Carta4','inter','text'	,'width: 40%;','botone_n','','','','');
				echo $libre_v2->input3($folio,'Carta4','input','text'	,'width: 60%;'.$style_Carta4,'botones_submenu','','','onkeypress="return valida_n(event,D)"','');
				echo $libre_v2->input2('text','','','Fecha Inicio'		,"width: 40%",'',"disabled",'botone_n','','','');
				echo $libre_v2->input3($fechas,'D','input','text'		,'width: 20%;'.$style_D,'botones_submenu','','','onkeypress="return valida_n(event,M)"','');
				echo $libre_v2->input3($fechas,'M','input','text'		,'width: 20%;'.$style_M,'botones_submenu','','','onkeypress="return valida_n(event,A)"','');
				echo $libre_v2->input3($fechas,'A','input','text','width: 20%;'.$style_A,'botones_submenu','','','onkeypress="return valida_n(event,D_r)"','');
				echo $libre_v2->input2('text','',''	,'Fecha Final',"width: 40%",'',"disabled",'botone_n','','','');
				echo $libre_v2->input3($fechas,'D_r','input','text','width: 20%;'.$style_D_r,'botones_submenu','','','onkeypress="return valida_n(event,M_r)"','');
				echo $libre_v2->input3($fechas,'M_r','input','text','width: 20%;'.$style_M_r,'botones_submenu','','','onkeypress="return valida_n(event,A_r)"','');
				echo $libre_v2->input3($fechas,'A_r','input','text','width: 20%;'.$style_A_r,'botones_submenu','','','onkeypress="return valida_n(event,KM_S)"','');
				echo $libre_v2->input2('text','',''	,'Km Inicio',"width: 40%",'',"disabled",'botone_n','','','');
				echo $libre_v2->input3($km,'KM_S','input','text','width:60%;'.$style_km_i,'botones_submenu','','','onkeypress="return valida_n(event,KM_E)"','');
				echo $libre_v2->input2('text','',''	,'Km Final',"width: 40%",'',"disabled",'botone_n','','','');
				echo $libre_v2->input3($km,'KM_E','input','text','width:60%;'.$style_km_f,'botones_submenu','','','onkeypress="return valida_n(event,Flete_R)"','');
				echo $libre_v2->input3($fletes,'Flete_R','inter','text','width: 40%;','botone_n','','','','');
				echo $libre_v2->input3($fletes,'Flete_R','input','text','width: 60%;'.$style_flete_r,'botones_submenu','','','onkeypress="return valida_n(event)"','');
				echo $libre_v2->input3($folio,'N_Cuenta','inter','text','width: 40%;','botone_n','','','','');
				
				echo $libre_v2->input2('text','N_Cuenta','',$_POST['N_Cuenta'],"width: 60%",'N_Cuenta',"readonly=''",'botones_submenu');
				echo $libre_v2->input2('text','','','Comentarios'			,"width: 100%"				,'',"disabled",'botone_n');
				echo $libre_v2->input2('tarea','come','',$_POST['come']		,"width: 100%;height: 60px; $style_come",'come'		,' placeholder="" maxlength ="200"','botones_submenu');
			echo"</div>";
		#### Botones Operadores
			echo"<div style='position: relative;'>";
				echo $libre_v2->input2('submit','operador','',"Limpiar"			,'									bottom: 5px;		right: 110px;width: 110px;'					,'limpia_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('submit','operador','',"Guardar"			,'					width: 110px;	bottom: 5px;		right: 0px;'	,'guarda_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('button','operador','',"Guardar Cambios"	,'display: none;	width: 110px;	bottom: 5px;		right: 0px;'	,'cambio_cuenta'		,'','botones_submenu');
				echo $libre_v2->input2('button','operador','',"Confirmar"		,'display: none;	width: 110px;	bottom: 40px;	right: 0px;background: yellow;color: black;','confirma_cuenta','','botones_submenu');
			echo"</div>";	
		####	
	echo"</div>";	


?>