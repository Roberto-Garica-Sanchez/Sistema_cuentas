<?php
$consu1=consulta('choferes'				,$conexion);
$consu2=consulta('placas'              	,$conexion);
$consu3=consulta('clientes'            	,$conexion);
$consu4=consulta('fechas'	           	,$conexion);
$consu5=consulta('folio'	           	,$conexion);
$consu6=consulta('fletes'	           	,$conexion);
$consu7=consulta('viaticos'				,$conexion);
$consu8=consulta('disel'	           	,$conexion);
$consu9=consulta('casetas'				,$conexion);
$consu9_1=consulta('casetas_via'		,$conexion);
$consu9_2=consulta('casetas_c_via'		,$conexion);
$consu10=consulta('facturas'	       	,$conexion);
$consu11=consulta('ryr'					,$conexion);
$consu12=consulta('guias'	           	,$conexion);
$consu13=consulta('maniobras'	       	,$conexion);
$consu14=consulta('km'		           	,$conexion);
$consu16=consulta('fletes_c'	       	,$conexion);
$consu17=consulta('viaticos_c'	       	,$conexion);
$consu18=consulta('disel_c'				,$conexion);
$consu19=consulta('casetas_c'	       	,$conexion);
$consu20=consulta('facturas_c'	       	,$conexion);
$consu21=consulta('ryr_c'	           	,$conexion);
$consu22=consulta('guias_c'				,$conexion);
$consu23=consulta('maniobras_c'			,$conexion);
$consu24=consulta('abo_acu' 	       	,$conexion);
mysql_data_seek($consu5,0);
while($dato5=mysql_fetch_array($consu5))
{
	if($dato5[ID_G]==$_POST[Carta]){
	$_POST[Carta1]	="";
	$_POST[Carta2]	="";
	$_POST[Carta3]	="";
	$_POST[Carta4]	="";
	$_POST[chofer]	="";
	$_POST[placas]	="";
	$_POST[cliente]	="";
	$_POST[n_c]		="";
	$_POST[Revisado]="";
	$_POST[come]	="";
	$_POST[D]		="";
	$_POST[M]		="";
	$_POST[A]		="";
	$_POST[D_c]		="";
	$_POST[M_c]		="";
	$_POST[A_c]		="";
	$_POST[D_r]		="";
	$_POST[M_r]		="";
	$_POST[A_r]		="";
	$_POST[km_i]	="";
	$_POST[km_f]	="";
	$_POST[hidden_fe]	="";
	$_POST[hidden_v]	="";
	$_POST[hidden_d]	="";
	$_POST[hidden_c]	="";
	$_POST[hidden_c_via]="";
	$_POST[hidden_f]	="";
	$_POST[hidden_r]	="";
	$_POST[hidden_g]	="";
	$_POST[hidden_m]	="";
	$_POST[hidden_ab]	="";
	$_POST[hidden_ac]	="";
	$_POST[hidden_ac_a]	="";
	$_POST[revisado]	="";
	$_POST[flete_r]		="";
	$_POST[comi]		="";
	$_POST[presio_d]	="";
	
	function borrar($n1){
		for($y=1; $y<=20; $y++){
			$N=$n1.$y;
			$_POST[$N]='';
		}
	}	
	borrar('1TEXT');
	borrar('1TEXT_C');
	borrar('2TEXT');
	borrar('2TEXT_C');
	borrar('3TEXT');
	borrar('3TEXT_C');
	borrar('4TEXT');
	borrar('4TEXT_C');        
	borrar('4TEXT_VIA');
	borrar('4TEXT_C_VIA');
	borrar('5TEXT');
	borrar('5TEXT_C');
	borrar('6TEXT');
	borrar('6TEXT_C');
	borrar('7TEXT');
	borrar('7TEXT_C');
	borrar('8TEXT');
	borrar('8TEXT_C');
	borrar('ab_Com');
	borrar('ab');
	borrar('ID_ac');
	borrar('ac');
	
	include("sincro.php");
	$_POST[Carta1]=$dato5[Carta1];
	$_POST[Carta2]=$dato5[Carta2];
	$_POST[Carta3]=$dato5[Carta3];
	$_POST[Carta4]=$dato5[Carta4];
	$_POST[chofer]=$dato5[CHOFER];
	$_POST[placas]=$dato5[PLACAS];
	$_POST[cliente]=$dato5[CLIENTE];
	$_POST[n_c]=$dato5[N_Cuenta];
	$_POST[Revisado]=$dato5[Revisado];
	$_POST[come]=$dato5[Descripcion];
	$_POST[D]=$dato4[D];
	$_POST[M]=$dato4[M];
	$_POST[A]=$dato4[A];
	$_POST[D_c]=$dato4[D_c];
	$_POST[M_c]=$dato4[M_c];
	$_POST[A_c]=$dato4[A_c];
	$_POST[D_r]=$dato4[D_r];
	$_POST[M_r]=$dato4[M_r];
	$_POST[A_r]=$dato4[A_r];
	$_POST[km_i]=$dato14[KM_S];
	$_POST[km_f]=$dato14[KM_E];
	$_POST[hidden_fe]=$dato6[HIDE1];
	$_POST[hidden_v]=$dato7[HIDE2];
	$_POST[hidden_d]=$dato8[HIDE3];
	$_POST[hidden_c]=$dato9[HIDE4];
	$_POST[hidden_c_via]=$dato9_1[HIDE];
	$_POST[hidden_f]=$dato10[HIDE5];
	$_POST[hidden_r]=$dato11[HIDE6];
	$_POST[hidden_g]=$dato12[HIDE7];
	$_POST[hidden_m]=$dato13[HIDE8];
	$_POST[hidden_ab]=$dato24[Hide_ab];
	$_POST[hidden_ac]=$dato24[Hide_ac];
	$_POST[hidden_ac_a]=$dato24[Hide_ac];
	$_POST[revisado]=$dato5[Revisado];
	$_POST[flete_r]=$dato6[Flete_R];
	$_POST[comi]=$dato6[comi_ass];
	$_POST[presio_d]=$dato8[presio_d];

	function tran($hidden,$name1,$name2,$dato){
		for($x=1; $x<=$hidden; $x++){
			$Name1=$name1.$x;
			$Name2=$name2.$x;
			$_POST[$Name1]=$dato[$Name2];
			
		}
	}
	tran($_POST[hidden_fe]		,'1TEXT'		,'1TEXT',$dato6	);
	tran($_POST[hidden_fe]		,'1TEXT_C'		,'1TEXT',$dato16);
	tran($_POST[hidden_v]		,'2TEXT'		,'2TEXT',$dato7	);
	tran($_POST[hidden_v]		,'2TEXT_C'		,'2TEXT',$dato17);
	tran($_POST[hidden_d]		,'3TEXT'		,'3TEXT',$dato8	);
	tran($_POST[hidden_d]		,'3TEXT_C'		,'3TEXT',$dato18);
	tran($_POST[hidden_c]		,'4TEXT'		,'4TEXT',$dato9	);
	tran($_POST[hidden_c]		,'4TEXT_C'		,'4TEXT',$dato19);        
	tran($_POST[hidden_c_via]	,'4TEXT_VIA'	,'TEXT',$dato9_1);
	tran($_POST[hidden_c_via]	,'4TEXT_C_VIA'	,'TEXT',$dato9_2);
	tran($_POST[hidden_f]		,'5TEXT'		,'5TEXT',$dato10);
	tran($_POST[hidden_f]		,'5TEXT_C'		,'5TEXT',$dato20);
	tran($_POST[hidden_r]		,'6TEXT'		,'6TEXT',$dato11);
	tran($_POST[hidden_r]		,'6TEXT_C'		,'6TEXT',$dato21);
	tran($_POST[hidden_g]		,'7TEXT'		,'7TEXT',$dato12);
	tran($_POST[hidden_g]		,'7TEXT_C'		,'7TEXT',$dato22);
	tran($_POST[hidden_m]		,'8TEXT'		,'8TEXT',$dato13);
	tran($_POST[hidden_m]		,'8TEXT_C'		,'8TEXT',$dato23);
	tran($_POST[hidden_ab]		,'ab_Com'		,'ab_Com',$dato24);
	tran($_POST[hidden_ab]		,'ab'			,'ab'	,$dato24);
	tran($_POST[hidden_ac]		,'ID_ac'		,'ID_ac',$dato24);
	tran($_POST[hidden_ac]		,'ac'			,'ac'	,$dato24);
   }
}
?>
