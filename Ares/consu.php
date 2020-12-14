<?php 
if ($libre_v1=='')	{	include_once("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
if ($libre_v2=='')	{	include_once("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
if($_POST['Soft_version']=='Ares'){	
	if($_POST['win_carga']=='open_consu'){
		$libre_v2->db		($db,$conexion,$phpv);
		$consu1=$libre_v2->consulta('choferes'			,$conexion	,'','','','1'	,$phpv,'','','');
		$consu2=$libre_v2->consulta('placas'			,$conexion	,'','','','1'	,$phpv,'','','');
		$consu3=$libre_v2->consulta('clientes'  		,$conexion	,'','','','1'	,$phpv,'','','');
		$consu4=$libre_v2->consulta('fechas'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu5=$libre_v2->consulta('folio'				,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','true');
		$consu6=$libre_v2->consulta('fletes'	    	,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu7=$libre_v2->consulta('viaticos'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu8=$libre_v2->consulta('disel'	    		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu9=$libre_v2->consulta('casetas'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu9_1=$libre_v2->consulta('casetas_via'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu10=$libre_v2->consulta('facturas'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu11=$libre_v2->consulta('ryr'				,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu12=$libre_v2->consulta('guias'	    	,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu13=$libre_v2->consulta('maniobras'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu14=$libre_v2->consulta('km'				,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu16=$libre_v2->consulta('fletes_c'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu17=$libre_v2->consulta('viaticos_c'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu18=$libre_v2->consulta('disel_c'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu19=$libre_v2->consulta('casetas_c'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu9_2=$libre_v2->consulta('casetas_c_via'	,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu20=$libre_v2->consulta('facturas_c'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu21=$libre_v2->consulta('ryr_c'	   		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu22=$libre_v2->consulta('guias_c'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu23=$libre_v2->consulta('maniobras_c'		,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
		$consu24=$libre_v2->consulta('abo_acu'			,$conexion	,'ID_G',$_POST['Carta'],'ID_G','1'	,$phpv,'','','');
	}
	if($_POST['win_carga']=="mysql_fe_ar"){
		//$datos=$libre_v2->mysql_fe_ar($consu5,$phpv);
		$dato4=$libre_v2->mysql_fe_ar($consu4,$phpv,'');
		$dato6=$libre_v2->mysql_fe_ar($consu6,$phpv,'');
		$dato7=$libre_v2->mysql_fe_ar($consu7,$phpv,'');
		$dato8=$libre_v2->mysql_fe_ar($consu8,$phpv,'');
		$dato9=$libre_v2->mysql_fe_ar($consu9,$phpv,'');
		$dato9_1=$libre_v2->mysql_fe_ar($consu9_1,$phpv,'');
		$dato9_2=$libre_v2->mysql_fe_ar($consu9_2,$phpv,'');
		$dato10=$libre_v2->mysql_fe_ar($consu10,$phpv,'');
		$dato11=$libre_v2->mysql_fe_ar($consu11,$phpv,'');
		$dato12=$libre_v2->mysql_fe_ar($consu12,$phpv,'');
		$dato13=$libre_v2->mysql_fe_ar($consu13,$phpv,'');
		$dato14=$libre_v2->mysql_fe_ar($consu14,$phpv,'');
		$dato16=$libre_v2->mysql_fe_ar($consu16,$phpv,'');
		$dato17=$libre_v2->mysql_fe_ar($consu17,$phpv,'');
		$dato18=$libre_v2->mysql_fe_ar($consu18,$phpv,'');
		$dato19=$libre_v2->mysql_fe_ar($consu19,$phpv,'');
		$dato20=$libre_v2->mysql_fe_ar($consu20,$phpv,'');
		$dato21=$libre_v2->mysql_fe_ar($consu21,$phpv,'');
		$dato22=$libre_v2->mysql_fe_ar($consu22,$phpv,'');
		$dato23=$libre_v2->mysql_fe_ar($consu23,$phpv,'');
		$dato24=$libre_v2->mysql_fe_ar($consu24,$phpv,'');
	}
}

?>