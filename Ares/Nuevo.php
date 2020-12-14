<?php
//--------------------------------librerias y ajustes
//$libre_v=1;
//if ($libre_v1=='')	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
//if ($libre_v2=='')	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
//$libre_v2->db($db,$conexion,$phpv);
$db='almacen';
$libre_v2->db($db,$conexion,$phpv);
$consu_choferes	= 	$libre_v2->consulta	('operadores'	,$conexion	,'','','Nombre'	,'' ,$phpv,'','');
$consu_placas	= 	$libre_v2->consulta	('unidades'		,$conexion	,'','','Placas'	,''	,$phpv,'','');
$consu_clientes	= 	$libre_v2->consulta	('clientes'		,$conexion	,'','','Nombre'	,''	,$phpv,'','');
$db='sistema_cuentas_ares';
$libre_v2->db($db,$conexion,$phpv);
if(empty($_POST['Carta0']) and !empty($_POST['Carta1'])){$_POST['Carta0']=$_POST['Carta1'];}
/*
$consu_choferes	= 	$libre_v2->consulta	('choferes'	,$conexion	,'','','Nombre_Ch'	,'',$phpv,'','');
$consu_placas	= 	$libre_v2->consulta	('placas'	,$conexion	,'','','Placas'		,''	,$phpv,'','');
$consu_clientes	= 	$libre_v2->consulta	('clientes'	,$conexion	,'','','Nombre_Cl'	,''	,$phpv,'','');
*/
$consu_folio	= 	$libre_v2->consulta	('folio'	,$conexion	,'','',''			,'1',$phpv,'','');
$consu_abo_acu	= 	$libre_v2->consulta	('abo_acu'	,$conexion	,'','',''			,'1',$phpv,'','');
$folio			=	$tablas_v2->info($db,'folio');
$fechas			=	$tablas_v2->info($db,'fechas');
$fletes			=	$tablas_v2->info($db,'fletes');
$km				=	$tablas_v2->info($db,'km');
if(!empty($_POST['chofer']))$N_fact			=	$libre_v2->compro($_POST['chofer'],'Nombre'	,'ulti_viaje',$consu_choferes,$conexion,$phpv,'');
if(!empty($_POST['Carta1']))$revi			=	$libre_v2->compro($_POST['Carta1'],'ID_G'		,'Revisado',$consu_folio,$conexion,$phpv,'');
if(!empty($_POST['ID_ac1']))$estado_arr		=	$libre_v2->compro($_POST['ID_ac1'],'ID_G'		,'add_en',$consu_abo_acu,$conexion,$phpv,'');

// $consu_carta1	=$libre_v2->compro($_POST[Carta1],ID_G		,'',$consu_folio,$conexion,$phpv);	

//onkeyup='calcula_update();'
//--------------------------------Operadores1

if(!empty($_POST['Carta_arr'])){
	$com=$libre_v2->compro($_POST['Carta_arr'],'ID_G','add_en',$consu_abo_acu,$conexion,$phpv,'');
	
	$N2="ac".$x;
	$libre_v2->mysql_da_se	($consu_abo_acu,0,$phpv);
	while($datos=$libre_v2->mysql_fe_ar	($consu_abo_acu,$phpv)){
		if($datos[ID_G]==$_POST[$N1]){$_POST[$N2]=$datos[Total_Total];}
	}
}
if($_POST['name2set']=='Nuevo'){	//proceso de guardado
	if(!empty($_POST['N_Cuenta']) and !empty($N_fact))$_POST['N_Cuenta']=$N_fact+1;
	if(!empty($_POST['operador']) and $_POST['operador']=="Guardar"){
		$grava=true;
		$open_consola=false;
		if(!empty($_POST['Carta1']))$consu_carta1	=$libre_v2->compro($_POST['Carta1'],'ID_G'		,'',$consu_folio,$conexion,$phpv,'');	
		if(!empty($_POST['Carta2']))$consu_carta2	=$libre_v2->compro($_POST['Carta2'],'ID_G'		,'',$consu_folio,$conexion,$phpv,'');
		if(!empty($_POST['Carta3']))$consu_carta3	=$libre_v2->compro($_POST['Carta3'],'ID_G'		,'',$consu_folio,$conexion,$phpv,'');
		if(!empty($_POST['Carta4']))$consu_carta4	=$libre_v2->compro($_POST['Carta4'],'ID_G'		,'',$consu_folio,$conexion,$phpv,'');
		$fec_ini=$_POST['A']	.$libre_v2->zero($_POST['M'])	.$libre_v2->zero($_POST['D']);
		$fec_fin=$_POST['A_r'].$libre_v2->zero($_POST['M_r']).$libre_v2->zero($_POST['D_r']);
		
		$red="box-shadow: inset 0px 0px 15px red;";
		$blue="box-shadow: inset 0px 0px 15px #0066ff;";
		$style_chofer=$blue;
		$style_placas=$blue;
		$style_cliente=$blue;
		$style_Carta1=$blue;
		$style_Carta2=$blue;
		$style_Carta3=$blue;
		$style_Carta4=$blue;
		$style_km_i=$blue;
		$style_km_f=$blue;
		$style_D=$blue;
		$style_D_r=$blue;
		$style_M=$blue;
		$style_M_r=$blue;
		$style_A=$blue;
		$style_A_r=$blue;
		if(!empty($consu_carta1) and $consu_carta1==1){$style_Carta1=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1 Existente<br>";}//compueva disponible el cuenta 
		if(!empty($consu_carta2) and $consu_carta2==1){$style_Carta2=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2 Existente<br>";}//compueva disponible el cuenta
		if(!empty($consu_carta3) and $consu_carta3==1){$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 3 Existente<br>";}//compueva disponible el cuenta
		if(!empty($consu_carta4) and $consu_carta4==1){$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 4 Existente<br>";}//compueva disponible el cuenta
		if(!empty($estado_arr) and ($estado_arr<>$_POST['Carta1'])and !empty($_POST['ID_ac1'])){$style_ID_ac1=$red;$grava=false;$open_consola=true;$resc=$resc."Conflicto De Cuenta Arrastrada ($_POST[ID_ac1]) Vinculada a la cuenta ($estado_arr)[verfica1] <br>";}//compueva disponible el cuenta
		
		if(!empty($_POST['Carta1'])and($_POST['Carta1']==$_POST['Carta2'])){$style_Carta1=$red;$style_Carta2=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta2 ($_POST[Carta2])<br>";}
		if(!empty($_POST['Carta1'])and($_POST['Carta1']==$_POST['Carta3'])){$style_Carta1=$red;$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta3 ($_POST[Carta3])<br>";}
		if(!empty($_POST['Carta1'])and($_POST['Carta1']==$_POST['Carta4'])){$style_Carta1=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta4 ($_POST[Carta4])<br>";}
		
		if(!empty($_POST['Carta2'])and($_POST['Carta2']==$_POST['Carta3'])){$style_Carta2=$red;$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2($_POST[Carta2]) Igual A Carta3 ($_POST[Carta3])<br>";}
		if(!empty($_POST['Carta2'])and($_POST['Carta2']==$_POST['Carta4'])){$style_Carta2=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2($_POST[Carta2]) Igual A Carta4 ($_POST[Carta4])<br>";}
		
		if(!empty($_POST['Carta3'])and($_POST['Carta3']==$_POST['Carta4'])){$style_Carta3=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 3($_POST[Carta3]) Igual A Carta4 ($_POST[Carta4])<br>";}
		if(("000000"==$fec_fin)or("000000"==$fec_fin))	{
			$grava=false;
			$open_consola=true;
			$style_D=$style_D_r=$red;
			$style_M=$style_M_r=$red;
			$style_A=$style_A_r=$red;
			$resc=$resc."Fecha Faltante<br>";
		}		
		if($_POST['chofer']=='chofer'){$grava=false;$open_consola=true;$style_chofer=$red;}
		if($_POST['placas']=='placas'){$grava=false;$open_consola=true;$style_placas=$red;}
		if($_POST['cliente']=='cliente'){$grava=false;$open_consola=true;$style_cliente=$red;}
		if($_POST['Carta1']=="")	{$grava=false;$open_consola=true;$style_Carta1=$red;}
		if($_POST['D']=="")		{$grava=false;$open_consola=true;$style_D=$red;}
		if($_POST['D_r']=="")		{$grava=false;$open_consola=true;$style_D_r=$red;}
		if($_POST['M']=="")		{$grava=false;$open_consola=true;$style_M=$red;}
		if($_POST['M_r']=="")		{$grava=false;$open_consola=true;$style_M_r=$red;}
		if($_POST['A']=="")		{$grava=false;$open_consola=true;$style_A=$red;}
		if($_POST['A_r']=="")		{$grava=false;$open_consola=true;$style_A_r=$red;}
		if($fec_ini>$fec_fin)	{//que la fecha final sea mayor que la fecha inicial 
			$grava=false;
			$open_consola=true;
			$style_D=$style_D_r=$red;
			$style_M=$style_M_r=$red;
			$style_A=$style_A_r=$red;
			$resc=$resc."Fecha Incorecta<br>";
		}
		if($_POST['km_i']=='')	{//que este ingresado el kilometraje inicial
			$grava=false;
			$open_consola=true;
			$style_km_i=$red;
			$resc=$resc."Kilometraje Faltante<br>";
		}
		if($_POST['km_f']=='')	{//que este ingresado el kilometraje final
			$grava=false;
			$open_consola=true;
			$style_km_f=$red;
			$resc=$resc."Kilometraje Faltante<br>";
		}
		$total_km=$_POST['km_f']-$_POST['km_i'];
		if ($_POST['km_i']>=$_POST['km_f'])				{//que este kilometraje correcto 
			$grava=false;
			$open_consola=true;
			$style_km_i=$style_km_f=$red;
			$resc=$resc."Kilometrajes Invertido <br>";
		}	
		if($open_consola==true)$consola="open";
	}
}
if($_POST['name2set']=='Modificar'){//proceso de modificado
	$_POST['N_Cuenta']= $libre_v2->compro($_POST['Carta1'],'ID_G'	,'N_Cuenta'	,$consu_folio,$conexion,$phpv,'');
	if($_POST['operador']=="Guardar"){
		$grava=true;
		$open_consola=false;
		//verifica que no existan en otras cuentas 
		if(!empty($_POST['Carta1'])){
			$sql="SELECT * FROM folio WHERE ID_G LIKE $_POST[Carta1] OR Carta1 LIKE $_POST[Carta1] OR Carta2 LIKE $_POST[Carta1] OR Carta3 LIKE $_POST[Carta1] OR Carta4 LIKE $_POST[Carta1]";
			$res=$libre_v2-> ejecuta($conexion,$sql,$phpv);
			$datos=$libre_v2->mysql_fe_ar($res,$phpv,'');
			if($datos['ID_G']==$_POST['Carta1']){$consu_carta1=0;}else{$consu_carta1=$datos['ID_G'];}
		}
		if(!empty($_POST['Carta2'])){
			$sql="SELECT * FROM folio WHERE ID_G LIKE $_POST[Carta2] OR Carta1 LIKE $_POST[Carta2] OR Carta2 LIKE $_POST[Carta2] OR Carta3 LIKE $_POST[Carta2] OR Carta4 LIKE $_POST[Carta2]";
			$res=$libre_v2-> ejecuta($conexion,$sql,$phpv);
			$datos=$libre_v2->mysql_fe_ar($res,$phpv,'');
			if($datos['ID_G']==$_POST['Carta1']){$consu_carta2=0;}else{$consu_carta2=$datos['ID_G'];}
		}
		if(!empty($_POST['Carta3'])){
			$sql="SELECT * FROM folio WHERE ID_G LIKE $_POST[Carta3] OR Carta1 LIKE $_POST[Carta3] OR Carta2 LIKE $_POST[Carta3] OR Carta3 LIKE $_POST[Carta3] OR Carta4 LIKE $_POST[Carta3]";
			$res=$libre_v2-> ejecuta($conexion,$sql,$phpv);
			$datos=$libre_v2->mysql_fe_ar($res,$phpv,'');
			if($datos['ID_G']==$_POST['Carta1']){$consu_carta3=0;}else{$consu_carta3=$datos['ID_G'];}
		}
		if($_POST['Carta4']<>""){
			$sql="SELECT * FROM folio WHERE ID_G LIKE $_POST[Carta4] OR Carta1 LIKE $_POST[Carta4] OR Carta2 LIKE $_POST[Carta4] OR Carta3 LIKE $_POST[Carta4] OR Carta4 LIKE $_POST[Carta4]";
			$res=$libre_v2-> ejecuta($conexion,$sql,$phpv);
			$datos=$libre_v2->mysql_fe_ar($res,$phpv,'');
			if($datos['ID_G']==$_POST['Carta1']){$consu_carta4=0;}else{$consu_carta4=$datos['ID_G'];}
		}
		$fec_ini=$_POST['A']	.$libre_v2->zero($_POST['M'])	.$libre_v2->zero($_POST['D']);
		$fec_fin=$_POST['A_r'].$libre_v2->zero($_POST['M_r']).$libre_v2->zero($_POST['D_r']);
		
		$red="box-shadow: inset 0px 0px 15px red;";
		$blue="box-shadow: inset 0px 0px 15px #0066ff;";
		$style_chofer=$blue;
		$style_placas=$blue;
		$style_cliente=$blue;
		$style_Carta1=$blue;
		$style_Carta2=$blue;
		$style_Carta3=$blue;
		$style_Carta4=$blue;
		$style_km_i=$blue;
		$style_km_f=$blue;
		$style_D=$blue;
		$style_D_r=$blue;
		$style_M=$blue;
		$style_M_r=$blue;
		$style_A=$blue;
		$style_A_r=$blue;
		
		if(!empty($consu_carta1) and $consu_carta1!=0){$style_Carta1=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Existente en $consu_carta1<br>";}//compueva disponible el cuenta 
		if(!empty($consu_carta2) and $consu_carta2!=0){$style_Carta2=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2($_POST[Carta2]) Existente en $consu_carta2<br>";}//compueva disponible el cuenta
		if(!empty($consu_carta3) and $consu_carta3!=0){$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 3($_POST[Carta3]) Existente en $consu_carta3<br>";}//compueva disponible el cuenta
		if(!empty($consu_carta4) and $consu_carta4!=0){$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 4($_POST[Carta4]) Existente en $consu_carta4<br>";}//compueva disponible el cuenta
		if(!empty($estado_arr)and($estado_arr!=$_POST['Carta1'])and(!empty($_POST['ID_ac1']))){$style_ID_ac1=$red;$grava=false;$open_consola=true;$resc=$resc."Conflicto De Cuenta Arrastrada ($_POST[ID_ac1]) Vinculada a la cuenta ($estado_arr)[verfica2] <br>";}//compueva disponible el cuenta
		
		if(!empty($_POST['Carta1']) and($_POST['Carta1']==$_POST['Carta2'])){$style_Carta1=$red;$style_Carta2=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta2 ($_POST[Carta2])<br>";}
		if(!empty($_POST['Carta1'])and($_POST['Carta1']==$_POST['Carta3'])){$style_Carta1=$red;$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta3 ($_POST[Carta3])<br>";}
		if(!empty($_POST['Carta1'])and($_POST['Carta1']==$_POST['Carta4'])){$style_Carta1=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 1($_POST[Carta1]) Igual A Carta4 ($_POST[Carta4])<br>";}
		
		if(!empty($_POST['Carta2'])and($_POST['Carta2']==$_POST['Carta3'])){$style_Carta2=$red;$style_Carta3=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2($_POST[Carta2]) Igual A Carta3 ($_POST[Carta3])<br>";}
		if(!empty($_POST['Carta2'])and($_POST['Carta2']==$_POST['Carta4'])){$style_Carta2=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 2($_POST[Carta2]) Igual A Carta4 ($_POST[Carta4])<br>";}
		
		if(!empty($_POST['Carta3'])and($_POST['Carta3']==$_POST['Carta4'])){$style_Carta3=$red;$style_Carta4=$red;$grava=false;$open_consola=true;$resc=$resc."Carta Porte 3($_POST[Carta3]) Igual A Carta4 ($_POST[Carta4])<br>";}
		
		if(("000000"==$fec_fin)or("000000"==$fec_fin))	{
			$grava=false;
			$open_consola=true;
			$style_D=$style_D_r=$red;
			$style_M=$style_M_r=$red;
			$style_A=$style_A_r=$red;
			$resc=$resc."Fecha Faltante<br>";
		}		
		if($_POST['chofer']=='chofer')	{$grava=false;$open_consola=true;$style_chofer=$red;$resc=$resc."Selecionar Operador<br>";}
		if($_POST['placas']=='placas')	{$grava=false;$open_consola=true;$style_placas=$red;$resc=$resc."Selecionar Unidad<br>";}
		if($_POST['cliente']=='cliente')	{$grava=false;$open_consola=true;$style_cliente=$red;$resc=$resc."Selecionar Cliente<br>";}
		if($_POST['Carta1']=="")		{$grava=false;$open_consola=true;$style_Carta1=$red; $resc=$resc."Carta Porte 1 No Puede Estar en Blanco<br>";}
		if($_POST['D']=="")				{$grava=false;$open_consola=true;$style_D=$red;		$resc=$resc."Campo de Fecha Vasio<br>";}
		if($_POST['D_r']=="")			{$grava=false;$open_consola=true;$style_D_r=$red;	$resc=$resc."Campo de Fecha Vasio<br>";}
		if($_POST['M']=="")				{$grava=false;$open_consola=true;$style_M=$red;		$resc=$resc."Campo de Fecha Vasio<br>";}
		if($_POST['M_r']=="")			{$grava=false;$open_consola=true;$style_M_r=$red;	$resc=$resc."Campo de Fecha Vasio<br>";}
		if($_POST['A']=="")				{$grava=false;$open_consola=true;$style_A=$red;		$resc=$resc."Campo de Fecha Vasio<br>";}
		if($_POST['A_r']=="")			{$grava=false;$open_consola=true;$style_A_r=$red;	$resc=$resc."Campo de Fecha Vasio<br>";}
		if($fec_ini>$fec_fin)			{//que la fecha final sea mayor que la fecha inicial 
			$grava=false;
			$open_consola=true;
			$style_D=$style_D_r=$red;
			$style_M=$style_M_r=$red;
			$style_A=$style_A_r=$red;
			$resc=$resc."Fecha Incorecta<br>";
		}
		if ($_POST['km_i']=='')						{//que este ingresado el kilometraje inicial
			$grava=false;
			$open_consola=true;
			$style_km_i=$red;
			$resc=$resc."Kilometraje Faltante<br>";
		}
		if ($_POST['km_f']=='')						{//que este ingresado el kilometraje final
			$grava=false;
			$open_consola=true;
			$style_km_f=$red;
			$resc=$resc."Kilometraje Faltante<br>";
		}
		$total_km=$_POST['km_f']-$_POST['km_i'];
		if ($_POST['km_i']>=$_POST['km_f'])				{//que este kilometraje correcto 
			$grava=false;
			$open_consola=true;
			$style_km_i=$style_km_f=$red;
			$resc=$resc."Kilometraje Invertido<br>";
		}	
		if($open_consola==true)$consola="open";
		
	}
}
//--------------------------------Calculadora
	$Fecha_Sistema=date("Y").date("m").date("d");
	if(!empty($_POST['D']) and !empty($_POST['M']) and !empty($_POST['A'])){
		$Fecha_Cuenta=$_POST['A'].$_POST['M'].$_POST['D'];		
	}else{
		$Fecha_Cuenta=0;
	}
	/*
	if(!empty($Fecha_Cuenta) and $Fecha_Sistema>=$Fecha_Cuenta )  {
		#Antes de 2020-06-23
		include('Calculadoras.php');
		Calculadora_Annie_Anterior_A_2020_06_29();
	}
	*/
	#if(($Fecha_Sistema<$Fecha_Cuenta) or (empty($_POST['D']) and empty($_POST['M']) and empty($_POST['A']))){		
		#2020-06-23
		include('Calculadoras.php');
		Calculadora_Annie_2020_06_29('');
		

	#}
	
	#### Indicadores de Casillas 
		if(!empty($dif1) and $dif1<0)				{$style_dif1="background: pink; color: black;";}else 	{$style_dif1="background: Greenyellow; color: black;";}
		if(!empty($dif2) and $dif2<0)				{$style_dif2="background: pink; color: black;";}else 	{$style_dif2="background: Greenyellow; color: black;";}
		if(!empty($re) and $re<30)					{$style_re	="background: pink; color: black;";}else 	{$style_re="background: Greenyellow; color: black;";}
		if(!empty($_POST['Totalac']) and $_POST['Totalac']<0)	{$style_ac	="background: pink; color: black;";}else 	{$style_ac="background: Greenyellow; color: black;";}
		if(!empty($_POST['Totalab']) and $_POST['Totalab']<0)	{$style_ab	="background: pink; color: black;";}else 	{$style_ab="background: Greenyellow; color: black;";}
		if(!empty($dif4) and $dif4<0)				{$style_dif4="background: pink; color: black;";}else 	{$style_dif4="background: Greenyellow; color: black;";}
		if(empty($_POST['CambRevi']))$_POST['CambRevi']=0;
		if(!empty($revi) and $revi==0)	{$estado='Pendiente';$_POST['CambRevi']=$revi; $style_estado="background: pink; color: black;";}
		if(empty($revi))				{$estado='Pendiente';$_POST['CambRevi']=0; $style_estado="background: pink; color: black;";}
		if(!empty($revi) and $revi==1)	{$estado='Revisado';$_POST['CambRevi']=$revi; $style_estado="background: Greenyellow; color: black;";}
		//if($dif4<0)				{$style_dif4="background: pink; color: black;";}else 	{$style_dif4="background: Greenyellow; color: black;";}

######################## Operaciones 
	//<>--------------------Nuevo  	
	if(!empty($_POST['name2set']) and $_POST['name2set']=='Nuevo'){	
		if(!empty($_POST['operador']) and ($_POST['operador']=="Guardar")and($grava==true)){
			include("Guarda.php");
			$resc=$resc."<br>Finalizado Guardando";
			$consola="open";
		}
	}
	if(!empty($_POST['name2set']) and $_POST['name2set']=='Modificar'){
		if(!empty($_POST['operador']) and ($_POST['operador']=="Guardar")and($grava==true)){
			include("Guarda.php");
			$resc=$resc."Finalizado Modificaiones";
			$consola="open";
		}
	}
	
######################## memoria de datos
	//dinamica input2				($type2,$name,$title,$value,$style,$id,$libre,$class)										
	if(empty($style_all))$style_all='';
	if(!empty($_POST['menu1_sel']))
	echo $libre_v2->input2('hidden','menu1_sel'		,'',$_POST['menu1_sel']	,$style_all.'background: #B6B1B1;','menu1_sel','','');
	//fiaja
	echo $libre_v2->input2('hidden','Hide_ac'		,'',5	,$style_all.'background: #B6B1B1;','Hide_ac','','');
	echo $libre_v2->input2('hidden','Hide_ab'		,'',5	,$style_all.'background: #B6B1B1;','Hide_ab','','');
	if(!empty($_POST['add_en']))echo $libre_v2->input2('hidden','add_en'			,'',$_POST['add_en'],$style_all.'background: #B6B1B1;','add_en','','');
	echo $libre_v2->input2('hidden','HIDE1'			,'',20	,$style_all.'background: #B6B1B1;','HIDE1','','');
	echo $libre_v2->input2('hidden','HIDE2'			,'',20	,$style_all.'background: #B6B1B1;','HIDE2','','');
	echo $libre_v2->input2('hidden','HIDE3'			,'',20	,$style_all.'background: #B6B1B1;','HIDE3','','');
	echo $libre_v2->input2('hidden','HIDE4'			,'',20	,$style_all.'background: #B6B1B1;','HIDE4','','');
	echo $libre_v2->input2('hidden','HIDE5'			,'',20	,$style_all.'background: #B6B1B1;','HIDE5','','');
	echo $libre_v2->input2('hidden','HIDE6'			,'',20	,$style_all.'background: #B6B1B1;','HIDE6','','');
	echo $libre_v2->input2('hidden','HIDE7'			,'',20	,$style_all.'background: #B6B1B1;','HIDE7','','');
	echo $libre_v2->input2('hidden','HIDE8'			,'',20	,$style_all.'background: #B6B1B1;','HIDE8','','');
	echo $libre_v2->input2('hidden','HIDE9'			,'',20	,$style_all.'background: #B6B1B1;','HIDE9','','');
	if(!empty($tipo))echo $libre_v2->input2('hidden','TIPO'			,'',$tipo	,$style_all.'background: #B6B1B1;','TIPO','','');


#### #### Interface
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

	######################## Interface de ingreso 
	
		$style_all="margin: 0px .5px; min-width: 70px; width: 70px; text-align: center;";
		$TYPE='text';
		$style_all=$style_all."background: #343434; color: #0075ff;";
		$libre_all="";
		echo "<div id='general_datos' style='display: block;float: right; width: 722px; position: relative;background: #444;padding: 5px;top: 0px; box-shadow: inset 0px 0px 5px black;'>";
			$name_menu ="menu-list";
			$opti_menu1="Fletes";
			$opti_menu2="Viaticos";
			$opti_menu3="Diesel";
			$opti_menu4="Casetas";
			$opti_menu5="Facturas";
			$opti_menu6="R y R";
			$opti_menu7="Guias";
			$opti_menu8="Maniobras";
			$opti_menu9="Via Pass";			
			$style_all="margin: 0px; min-width: 70px; width: 70px; text-align: center;float: left;";
			$TYPE='text';
			$style_all=$style_all."background: #343434; color: #0075ff;";
			echo $libre_v2->input2($TYPE,'','','',$style_all,'','disabled','','','','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu1,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu2,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu3,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu4,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu5,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu6,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu7,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu8,$style_all,'','disabled','');
			echo $libre_v2->input2($TYPE,$name_menu,'',$opti_menu9,$style_all,'','disabled','');
			if(empty($_POST['focus_gene']))$_POST['focus_gene']='';
			echo $libre_v2->input2('hidden','focus_gene','',$_POST['focus_gene'],$style_all,'','disabled','');	
			$conta=0;
			/* conversion de datos de 4TEXT_VIA -A- 9TEXT
			for($x=1; $x<=20; $x++){
				$name1="4TEXT_VIA".$x;
				$name2="9TEXT".$x;
				if(!empty($_POST[$name1]))$_POST[$name2]=$_POST[$name1];
			}	
			*/
			for($x=1; $x<=20; $x++){
				$text="background: #343434; color: #0075ff; float: left;";
				$conta=$conta+1;
				$id=$conta;
				echo $libre_v2->input2($TYPE,'',$id,$x,$style_all.$text,$id,'disabled','');
				for($y=1; $y<10; $y++){	
					$name=$y."TEXT";
					$name0=$name;
					$name=$y."TEXT".$x;
					$name_next="";
					$title=$y."TEXT_C".$x;
					$name_c=$y."TEXT_C".$x;
					$style1="";	
					$id=$name;
					$style1="background: white; color: black;box-shadow: inset 0px 0px 4px #0073ff;     float: left;";
					$libre_all="";
					if(($x>5)&&($y==1))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}else{$z=$x+1;$name_next=$y."TEXT".$z;}//limite 1  -> fletes
					if(($x>5)&&($y==2))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 2  -> casetas
					if(($x>7)&&($y==3))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 3  -> diesel
					if(($x>20)&&($y==4)){$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 4  -> casetas
					if(($x>5)&&($y==5))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 5  -> facturas
					if(($x>10)&&($y==6)){$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 6  -> "r y r "
					if(($x>5)&&($y==7))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 7  -> "Guias "
					if(($x>6)&&($y==8))	{$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 8  -> "Maniobras "
					if(($x>20)&&($y==9)){$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}//limite 9  -> via pass
					
					$value='';
					$value_c='';
					if(!empty($_POST[$name]))	$value=$_POST[$name];
					if(!empty($_POST[$title]))	$title=$_POST[$title];		
					if(!empty($_POST[$name_c]))	$value_c=$_POST[$name_c];
					/* casetas vias pass traducion  					
					if($y==9){
						$name="4TEXT_VIA".$x;
						$name_c="4TEXT_VIA_C".$x;
					}
					*/
					echo $libre_v2->input2($TYPE,$name,$title,$value,$style_all.$style1,$id,
					//.'onKeyUp="mueve_diba_text(event,this); 	calcula_update();" onKeyPress=" mueve_diba_text(event,this); " onfocus="comentariosA(this);"');
					'
					onKeyPress	="return valida_n(event,'."''".','."''".','."'".$name_next."'".');"
					onKeyUp		="mueve_diba_text(event,this);calcula_update();"
					onfocus		="comentariosA(this);"
					maxlength	="15"
					','');
					//comentariosA(this);
					//input2				($type2,$name,$title,$value,$style,$id,$libre,$class)
					echo $libre_v2->input2('hidden',$name_c,'',$value_c,'',$name_c,'','');
				}	
			}
			if(empty($_POST['TOTAL1']))$_POST['TOTAL1']='';
			if(empty($_POST['TOTAL2']))$_POST['TOTAL2']='';
			if(empty($_POST['TOTAL3']))$_POST['TOTAL3']='';
			if(empty($_POST['TOTAL4']))$_POST['TOTAL4']='';
			if(empty($_POST['TOTAL5']))$_POST['TOTAL5']='';
			if(empty($_POST['TOTAL6']))$_POST['TOTAL6']='';
			if(empty($_POST['TOTAL7']))$_POST['TOTAL7']='';
			if(empty($_POST['TOTAL8']))$_POST['TOTAL8']='';
			if(empty($_POST['TOTAL9']))$_POST['TOTAL9']='';
			echo $libre_v2->input2($TYPE,'','','TOTALES',$style_all,'','disabled','');
			
			echo $libre_v2->input2($TYPE,'TOTAL1','',$_POST['TOTAL1'],$style_all.$text,'TOTAL1','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL2','',$_POST['TOTAL2'],$style_all.$text,'TOTAL2','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL3','',$_POST['TOTAL3'],$style_all.$text,'TOTAL3','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL4','',$_POST['TOTAL4'],$style_all.$text,'TOTAL4','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL5','',$_POST['TOTAL5'],$style_all.$text,'TOTAL5','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL6','',$_POST['TOTAL6'],$style_all.$text,'TOTAL6','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL7','',$_POST['TOTAL7'],$style_all.$text,'TOTAL7','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL8','',$_POST['TOTAL8'],$style_all.$text,'TOTAL8','disabled','');
			echo $libre_v2->input2($TYPE,'TOTAL9','',$_POST['TOTAL9'],$style_all.$text,'TOTAL9','disabled','');
			
			echo $libre_v2->input2('hidden','hidden_fe'		,'',5	,'hidden_fe','','','');
			echo $libre_v2->input2('hidden','hidden_v'		,'',5	,'hidden_v','','','');
			echo $libre_v2->input2('hidden','hidden_d'		,'',7	,'hidden_d','','','');
			echo $libre_v2->input2('hidden','hidden_c'		,'',20	,'hidden_c','','','');
			echo $libre_v2->input2('hidden','hidden_c_via'	,'',20	,'hidden_c_via','','','');
			echo $libre_v2->input2('hidden','hidden_f'		,'',5	,'hidden_f','','','');
			echo $libre_v2->input2('hidden','hidden_r'		,'',10	,'hidden_r','','','');
			echo $libre_v2->input2('hidden','hidden_g'		,'',5	,'hidden_g','','','');
			echo $libre_v2->input2('hidden','hidden_m'		,'',10	,'hidden_m','','','');
			
		echo "</div>";	

	######################## Cuentas Actual 	
		#### Datos De Ajuste
			$style_all="margin: 0px .5px;text-align: center;background: #343434; color: #0075ff;float:left;";			
			$style_all2="margin: 0px .5px;text-align: center;float:left;";			
			//$style_all=$style_all."background: #343434; color: #0075ff;";
			if(empty($style_gene_actual))$style_gene_actual='';
			if(empty($TITLE_g_t))$TITLE_g_t='';
			if(empty($g_t))$g_t='';
			if(empty($comicion))$comicion='';
			if(empty($t_g))$t_g='';
			if(empty($suedo_chofer ))$suedo_chofer ='';
			if(empty($T_G_F))$T_G_F  ='';
			if(empty($t_d_g))$t_d_g   ='';
			if(empty($rete))$rete    ='';
			if(empty($dif1))$dif1     ='';
			if(empty($dif2))$dif2     ='';
			if(empty($neto))$neto     ='';
			if(empty($re))$re     ='';
			if(empty($_POST['comi']))$_POST['comi']='';
			if(empty($_POST['TOTAL2']))$_POST['TOTAL2']='';
			if(empty($_POST['TOTAL3']))$_POST['TOTAL3']='';
			if(empty($_POST['flete_real_sin_comision']))$_POST['flete_real_sin_comision']='';
		####
		echo "<div id='gene_actual' style='$style_gene_actual display: block;position: relative;background: #28336985;padding: 5px;width: 640px;float: right;'>";
			echo $libre_v2->input2($TYPE,'','',"Cuenta Actual",'background: #343434; color: #a4c1e3; width: 100%; text-align: center;','','disabled','');
			echo"<div style='float: left;position: relative;width: 210px;'>";
				echo $libre_v2->input2($TYPE,'','',"Comision %"													,$style_all.'background: #343434; color: #0075ff;','','disabled','');
				echo $libre_v2->input2($TYPE,'comi','',$_POST['comi']											,$style_all."background: white; box-shadow: inset 0px 0px 8px #0072fd;",'comi',"placeholder='15% por Defaul' maxlength='15' onkeypress='return valida_n(event)'onKeyUp='calcula_update();'",'');
				echo $libre_v2->input2($TYPE,'','',"Gastos T."													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'gastos_en_viaje',$TITLE_g_t		,$_POST['gastos_en_viaje']		,$style_all,'G_T','disabled','');
				echo $libre_v2->input2($TYPE,'','','Chofer Neto'												,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'sueldo_operador_menos_ISR','',$_POST['sueldo_operador_menos_ISR']	,$style_all."background: white; color: black;",'readonly="readonly"','','');
				echo $libre_v2->input2($TYPE,'','',''					,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'gastos_de_flete','',$_POST['gastos_de_flete']	,$style_all."background: white; color: black;",'readonly="readonly"','','');
				echo $libre_v2->input2($TYPE,'','',"Viaticos"													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',$_POST['TOTAL2']												,$style_all2."background: #01d501;color: black;",'VIATICOS2','disabled','');
				echo $libre_v2->input2($TYPE,'','',"DIFERENCIA"													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'Sueldo_Final_Operador_en_cuenta_actual','',$_POST['Sueldo_Final_Operador_en_cuenta_actual']														,$style_all2.$style_dif1,'DIF_TV','disabled','');	
			echo"</div>";
			
			echo"<div style='float: left;position: relative;width: 210px;'>";
				echo $libre_v2->input2($TYPE,'','','',$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','','',$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',"Gts.sin Chof."											,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'gastos_en_viaje',''												,$_POST['gastos_en_viaje']							,$style_all2."background: orange;color: black;",'G_T2','disabled','');
				echo $libre_v2->input2($TYPE,'','',"Viaticos"													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',$_POST['TOTAL2']												,$style_all2."background: #01d501;color: black;",'VIATICOS','disabled','');	
				echo $libre_v2->input2($TYPE,'','',"Diferencia"													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'efectivo_con_el_Operador','',$_POST['efectivo_con_el_Operador']	,$style_all2.$style_dif2,'DIF_VIA_GSC','disabled','');
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',''															,$style_all,'','disabled','');			
			echo"</div>";
			
			echo"<div  style='float: left;position: relative;width: 210px;'>";
				echo $libre_v2->input2($TYPE,'','Flete Real Sin Comision',"Flete R sin Comi"					,$style_all,'','disabled','');
				#echo $libre_v2->input2($TYPE,'flete_real_sin_comision','',$_POST['flete_real_sin_comision'],$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'flete_real_sin_comision','',$_POST['flete_real_sin_comision']											,$style_all."background: white; box-shadow: inset 0px 0px 8px #0072fd;",'flete_real_sin_comision',"placeholder='15% por Defaul' maxlength='15' onkeypress='return valida_n(event)'onKeyUp='calcula_update();'",'');
				echo $libre_v2->input2($TYPE,'','',"Fletes R."													,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',$libre_v2->formato_num($_POST['flete_r'])										,$style_all2."background: #00d2ff;color: black;",'flete_r2','disabled','');
				echo $libre_v2->input2($TYPE,'','',"Total g."					,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'gastos_totales_flete',"",$libre_v2->formato_num($_POST['gastos_totales_flete']),$style_all2."background: orange;color: black;",'T_G_F','disabled','');
				echo $libre_v2->input2($TYPE,'','',"Neto Carro"			,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'neto_carro','',$libre_v2->formato_num($_POST['neto_carro'])			,$style_all2."background: #01d501;color: black;",'NETO_CARRO','disabled','');
				echo $libre_v2->input2($TYPE,'','',''					,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''					,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''					,$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',''					,$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',"Rendimiento"			,$style_all."background: yellow;",'','disabled','');
				echo $libre_v2->input2($TYPE,'','',$libre_v2->formato_num($_POST['rendimiento_flete'])				,$style_all2.$style_re,'RENDIMIENTO','disabled','');	
			echo"</div>";
			
			
			
			
				
					
		echo "</div>";
	######################## Combustible 
		echo "<div id='gene_combustible'  class='gene_combustible'  style='display: block;float: right;'>";
			echo "<div onclick='ventanas2(gene_combustible);'style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";

			echo $libre_v2->input2($TYPE,'','','Relacion de combustible'	,'width: 100%; text-align: center; color: #a4c1e3; height: 20px;',"",'disabled','botone_n');
			echo"<div style='width: 420px;'>";	
				if(empty($_POST['presio_d']))$_POST['presio_d']='';
				if(empty($_POST['crome_i']))$_POST['crome_i']='';
				if(empty($_POST['crome_f']))$_POST['crome_f']='';
				if(empty($_POST['crome_t']))$_POST['crome_t']='';
				if(empty($_POST['km_i']))$_POST['km_i']='';
				if(empty($_POST['km_f']))$_POST['km_f']='';
				IF(empty($dif_km))$dif_km='';
				IF(empty($dif_despacho))$dif_despacho='';
				IF(empty($km_lts))$km_lts='';
				IF(empty($dif4))$dif4='';
			
				echo"<div style='float: left;position: relative;width: 210px;'>";
					echo $libre_v2->input2($TYPE,'','','Diesel'	,$style_all.'margin: 0px .5px; width:100%; text-align: center; color: #a4c1e3;',"",'disabled','');	
					echo $libre_v2->input2($TYPE,'','','Presio',$style_all.'background: #343434; color: #0075ff;',"",'disabled','');
					echo $libre_v2->input2($TYPE,'presio_d','',$_POST['presio_d'],$style_all."background: white; color: black;box-shadow: inset 0px 0px 8px #0072fd;",'presio_d',"placeholder='Costo' onkeyup='calcula_update();calcu_combustible();'onkeypress='return valida_n(event,crome_i)' maxlength='10'",'');
					echo $libre_v2->input2($TYPE,'','','Inicio'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'crome_i','',$_POST['crome_i']	,$style_all.'background: white;color: black;box-shadow: inset 0px 0px 8px #0072fd;'	,'crome_i',"onkeyup='calcula_update();calcu_combustible();'onkeypress='return valida_n(event,crome_f)' maxlength='15'",'');	
					echo $libre_v2->input2($TYPE,'','','Final'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'crome_f','',$_POST['crome_f']	,$style_all.'background: white;color: black;box-shadow: inset 0px 0px 8px #0072fd;'	,'crome_f',"onkeyup='calcula_update();calcu_combustible();'onkeypress='return valida_n(event)' maxlength='15'",'');
					echo $libre_v2->input2($TYPE,'','','Despachado Lts'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'crome_t','',$_POST['crome_t'],$style_all.'color: #a4c1e3;'	,'crome_t',"disabled",'');
					echo $libre_v2->input2($TYPE,'','','Costo'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'crome_t','',"$".$libre_v2->formato_num($_POST['precio_de_litros_consumidos'])	,$style_all.'color: #a4c1e3;'	,'crome_t',"disabled",'');
				echo"</div>";
				
				echo"<div style='float: left;position: relative;width: 210px;'>";
					echo $libre_v2->input2($TYPE,'','','Kilometrajes'		,$style_all.'margin: 0px .5px; width: 100%; text-align: center; color: #a4c1e3;',"",'disabled','');
					echo $libre_v2->input2($TYPE,'','','Inicio'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'','',$_POST['km_i']." Km"	,$style_all.'color: #0075ff;'	,'',"disabled ",'');
					echo $libre_v2->input2($TYPE,'','','Final'				,$style_all				,''		,"disabled",'');
					echo $libre_v2->input2($TYPE,'','',$_POST['km_f']." Km"	,$style_all.'color: #0075ff;'	,'',"disabled",'');
					echo $libre_v2->input2($TYPE,'','',' Recoridos',$style_all,'',"disabled",'');
					echo $libre_v2->input2($TYPE,'','',$_POST['Total_km']." Km",$style_all,'Total_km',"disabled",'');			
					echo $libre_v2->input2($TYPE,'','','Km/Lts',$style_all,"",'disabled','');
					echo $libre_v2->input2($TYPE,'','',$_POST['km_lts']." km/L",$style_all,'km_l','disabled','');
				echo"</div>";
			
			
			echo"</div>";
			//echo"<br>";
			//echo $libre_v2->input2($TYPE,'','','Total Litros',$style_all,"",'disabled');
			//echo $libre_v2->input2($TYPE,'','',$T_L,$style_all,t_l,'disabled');
		echo "</div>";	
		
	######################## Saldos Arrastrados 
		echo "<div id='gene_arrastre' class='gene_arrastre' style='display: block;'>";		
			if(empty($_POST['ID_ac1']))$_POST['ID_ac1']='';
			if(empty($_POST['ID_ac2']))$_POST['ID_ac2']='';
			if(empty($_POST['ID_ac3']))$_POST['ID_ac3']='';
			if(empty($_POST['ID_ac4']))$_POST['ID_ac4']='';
			if(empty($_POST['ID_ac5']))$_POST['ID_ac5']='';
			if(empty($_POST['ac1']))$_POST['ac1']='';
			if(empty($_POST['ac2']))$_POST['ac2']='';
			if(empty($_POST['ac3']))$_POST['ac3']='';
			if(empty($_POST['ac4']))$_POST['ac4']='';
			if(empty($_POST['ac5']))$_POST['ac5']='';
			if(empty($_POST['ab_Com1']))$_POST['ab_Com1']='';
			if(empty($_POST['ab_Com2']))$_POST['ab_Com2']='';
			if(empty($_POST['ab_Com3']))$_POST['ab_Com3']='';
			if(empty($_POST['ab_Com4']))$_POST['ab_Com4']='';
			if(empty($_POST['ab_Com5']))$_POST['ab_Com5']='';
			if(empty($_POST['ab1']))$_POST['ab1']='';
			if(empty($_POST['ab2']))$_POST['ab2']='';
			if(empty($_POST['ab3']))$_POST['ab3']='';
			if(empty($_POST['ab4']))$_POST['ab4']='';
			if(empty($_POST['ab5']))$_POST['ab5']='';
			if(empty($_POST['Totalac']))$_POST['Totalac']='';
			if(empty($_POST['Totalab']))$_POST['Totalab']='';
			if(empty($style_ID_ac1))$style_ID_ac1='';
			echo $libre_v2->input2($TYPE,'','','Arrastrado',"width: 100%; text-align: center;  color: #a4c1e3; height: 20px;",'',"disabled",'botone_n');
			echo "<div onclick='ventanas2(gene_arrastre);'style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";
			echo"<div style='width: 202px'>";	
				echo $libre_v2->input2($TYPE,'','','Anteriores',$style_all,'',"disabled",'');
				echo $libre_v2->input2($TYPE,'','','',$style_all,'',"disabled",'');
					
				echo $libre_v2->input2('text','ID_ac1'	,'Click Para Eliminar',$_POST['ID_ac1']	,$style_all.'background: #343434; color: #0075ff;','ID_ac1'		,"placeholder='Folio add' readonly='readonly' onclick='elimi_arra(this);calcula_update();' ",'');
				//echo $libre_v2->input2($TYPE,ac1		,'',$_POST[ac1]		,$style_all.$style_ID_ac1.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ac1'						,"onkeyup='calcula_update();'onchange='calcula_update();' readonly='readonly'");
				echo $libre_v2->input2($TYPE,'ac1'		,'',$_POST['ac1']		,$style_all.$style_ID_ac1,'ac1'						,"onkeyup='calcula_update();'onchange='calcula_update();' readonly='readonly'",'');
				
				echo $libre_v2->input2($TYPE,'','','',$style_all,'','','','');
				echo $libre_v2->input2($TYPE,'','',$_POST['Totalac'],$style_all.'background: yellow;','Totalac',$libre_all,'');
				
				////////////
				echo $libre_v2->input2($TYPE,'','','Abonado'," width: 100%; text-align: center;color: #a4c1e3; height: 20px;",'',"disabled",'botone_n');
					
				echo $libre_v2->input2($TYPE,'','','Fecha',$style_all,'',"disabled",'');
				echo $libre_v2->input2($TYPE,'','','',$style_all,'',$libre_all,'',"disabled",'');
						
				echo $libre_v2->input2($TYPE,'ab_Com1'	,'',$_POST['ab_Com1']	,$style_all.'background: #343434; color: #0075ff;','ab_Com1'	,"placeholder='DD/MM/AA'",'');
				echo $libre_v2->input2($TYPE,'ab1'		,'',$_POST['ab1']		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab1'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab2);'",'');
					
				echo $libre_v2->input2($TYPE,'ab_Com2'	,'',$_POST['ab_Com2']	,$style_all.'background: #343434; color: #0075ff;','ab_Com2'	,"placeholder='DD/MM/AA'",'');
				echo $libre_v2->input2($TYPE,'ab2'		,'',$_POST['ab2']		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab2'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab3);'",'');
						
				echo $libre_v2->input2($TYPE,'ab_Com3'	,'',$_POST['ab_Com3']	,$style_all.'background: #343434; color: #0075ff;','ab_Com3'	,"placeholder='DD/MM/AA'",'');
				echo $libre_v2->input2($TYPE,'ab3'		,'',$_POST['ab3']		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab3'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab4);'",'');
						
				echo $libre_v2->input2($TYPE,'ab_Com4'	,'',$_POST['ab_Com4']	,$style_all.'background: #343434; color: #0075ff;','ab_Com4'	,"placeholder='DD/MM/AA'",'');
				echo $libre_v2->input2($TYPE,'ab4'		,'',$_POST['ab4']		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab4'						,"placeholder='0000.00'onkeyup='calcula_update();'onkeypress='return valida_n(event,ab5);'",'');
						
				echo $libre_v2->input2($TYPE,'ab_Com5'	,'',$_POST['ab_Com5']	,$style_all.'background: #343434; color: #0075ff;','ab_Com5'	,"placeholder='DD/MM/AA'",'');
				echo $libre_v2->input2($TYPE,'ab5'		,'',$_POST['ab5']		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab5'						,"placeholder='0000.00'onkeyup='calcula_update();'",'');
						
				echo $libre_v2->input2($TYPE,'','','',$style_all,'','','','');	
				echo $libre_v2->input2($TYPE,'','',$_POST['Totalab'],$style_all.'background: yellow;','Totalab',$libre_all,'','','','');
						
				echo $libre_v2->input2($TYPE,'','','Resultados'," width: 100%; text-align: center;color: #a4c1e3; height: 20px;",'',"disabled",'botone_n');	
							
				echo $libre_v2->input2($TYPE,'','','Actual',$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'dif1','',$dif1,$style_all.$style_dif1,'DIF_TV2',$libre_all,'');
						
				echo $libre_v2->input2($TYPE,'','','Acumulado',$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'','',$_POST['Totalac'],$style_all.$style_ac,'Totalac2',$libre_all,'');
				
				echo $libre_v2->input2($TYPE,'','','Abonado',$style_all,'','disabled','');	
				echo $libre_v2->input2($TYPE,'','',$_POST['Totalab'],$style_all.$style_ab,'Totalab2',$libre_all,'');
						
				echo $libre_v2->input2($TYPE,'','','Diferencia',$style_all,'','disabled','');
				echo $libre_v2->input2($TYPE,'Total_Total','',$dif4,$style_all.$style_dif4,'Total_Total',$libre_all,'');
			echo"</div>";		
		echo "</div>";
	######################## Cuentas Anteriores 
		echo "<div id='gene_list_arras' class='gene_list_arras'>";
			echo $libre_v2->input2('button','','',"Cuentas Para Arrastrar",'height: 20px; width: 100%; color: #a4c1e3;','','','botone_n');
			echo "<div onclick='ventanas2(gene_list_arras);'style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";
			echo"<div style='width: 306px;'>";
				echo $libre_v2->input2('button','','',"Folio 1"	,'min-width: 50px;width: 50px; height: 15px;  margin: 0px .5px; float:left;','','','');	
				echo $libre_v2->input2('button','','',"Saldo"  	,'min-width: 50px;width: 60px; height: 15px;  margin: 0px .5px; float:left;','','','');	
				echo $libre_v2->input2('button','','',"Estado"  	,'min-width: 50px;width: 70px; height: 15px;  margin: 0px .5px; float:left;','','','');	
				echo $libre_v2->input2('button','','',"Añadidos"	,'min-width: 50px;width: 70px; height: 15px;  margin: 0px .5px; float:left;','','','');
			echo "</div>";
			$text="background: #343434; color: #0075ff;";
			echo "<div id	='divArrastrar' style='overflow-x: hidden;overflow-y: auto;height: 96px;position: relative;padding: 5px 0px;background: white;width: 275px;box-shadow: inset 0px 0px 8px #0073ff;'>";
				$style_all="margin: 0px .5px; text-align: center; float:left;";
				$libre_v2->db							($db,$conexion,$phpv);
				if(($_POST['chofer']<>'chofer')&&($_POST['chofer']<>'')){
					$consu5	= $libre_v2->consulta			('folio',$conexion	,'CHOFER',$_POST['chofer'],'ID_G','1'	,$phpv,'','');
					$libre_v2->mysql_da_se	($consu5,0,$phpv);			
					while($datos=$libre_v2->mysql_fe_ar	($consu5,$phpv,'')){
						$consu24	= 	$libre_v2->consulta('abo_acu',$conexion	,'ID_G',$datos['ID_G'],'',''	,$phpv,'1','');
						$dato		= 	$libre_v2->mysql_fe_ar	($consu24,$phpv,'');
						$c0='';	$c1='';	$c2='';
						if($datos['Revisado']==0){$c2='white';	$c0='red';			$Revisado="Pendiente";}
						if($datos['Revisado']==1){$c2='white';	$c0='yellowgreen';	$Revisado="Revisada";}
						if($dato['add_en']==''){$c1='#121212';	$Estado="Libre";}
						if($dato['add_en']<>''){$c1='#343434';	$Estado="Arrastrada";}
						
						if($Estado=='Libre')		echo $libre_v2->input2('button'	,'Carta_arr'	,'',$datos['ID_G']		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"','');
						if($Estado=='Arrastrada')	echo $libre_v2->input2('button'	,'Carta_arr'	,'',$datos['ID_G']		,"width: 50px;".$style_all.$text,'','','');
						//echo $libre_v2->input2(submit	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','');
						echo $libre_v2->input2('button'	,''			,'',$libre_v2->zero($dato['Total_Total']),"background: $c1; color: $c2; width: 60px;".$style_all,'','','');
						echo $libre_v2->input2('button'	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all,'','','');
						echo $libre_v2->input2('button'	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all,'','','');
						#echo "<br>";
					}
				}
			echo "</div>";
			
		echo "</div>";
	######################## Consola

		$id='Consola';
		if(empty($resc))$resc='';
		if(!empty($consola) and $consola=="open"){$class=$id;}else{$class="min";}
		echo "<div id='$id' class='$class'>";
		echo "<div  onclick='ventanas($id);'style='position: absolute; width: 20px; height: 20px; background: #ada7a7; float: right; right: 5px; text-align: center;' >o</div>";
		echo "<div id='res$id' style='color:black; position: absolute; top: 20px; left: 5px; right: 5px; bottom: 5px; background: white;overflow-y: auto; overflow-x: auto;' >$resc</div>";
		echo "</div>";
		$nuevo="Nuevo_Ares";


?>