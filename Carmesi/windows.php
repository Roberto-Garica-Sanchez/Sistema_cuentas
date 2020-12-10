<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/login_tem.php");
include_once($_SERVER["DOCUMENT_ROOT"].'/CentroDeProcesos.php');
$phpv='php7'	;//vercion de php con que estara trabajando 
$db='empresa';
$libre_v2->db($db,$conexion,$phpv);
if(empty($win_carga))$win_carga='';
if(($_POST['win_carga']=="Nuevo")or($win_carga=="Nuevo")){
	//--------------------------------librerias y ajustes
	$libre_v=1;
	include_once("../libre_v1.php");	
	include_once("../libre_v2.php");	
	if(empty($libre_v1))		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	if(empty($libre_v2))		{echo"<script>alert('[libre_v2] no localizado');</script>";}
	$empresa='empresa';
	libre_v1::db		($empresa,$conexion,$phpv);
	$consu_choferes	= 	libre_v1::consulta	('choferes',$conexion	,'','','','1'	,$phpv,'');
	$consu_placas	= 	libre_v1::consulta	('placas'	,$conexion	,'','','','1'	,$phpv,'');
	$consu_clientes	= 	libre_v1::consulta	('clientes',$conexion	,'','','','1'	,$phpv,'');
	$folio			=tablas_v2::info('empresa','folio');
	$fechas			=tablas_v2::info('empresa','fechas');
	$fletes			=tablas_v2::info('empresa','fletes');
	$km				=tablas_v2::info('empresa','km');

	//onkeyup='calcula_update();'
	//--------------------------------Operadores
	
	//--------------------------------Calculadora
	//---------[totales]
	for($x=1; $x<=8; $x++){
		for($y=1; $y<=20; $y++){
			$name=$x."TEXT".$y;
			
			$total=$total+$_POST[$name];
		}
		$_POST["TOTAL".$x]=$total;
		$total=0;
	}
	//4TEXT_VIA13
	for($y=1; $y<=20; $y++){$name="4TEXT_VIA".$y;$total=$total+$_POST[$name];$_POST["TOTAL9"]=$total;}$total=0;
	for($y=1; $y<=5; $y++){$name="ab".$y;$total=$total+$_POST[$name];$_POST["Totalab"]=$total;}$total=0;
	for($y=1; $y<=5; $y++){$name="ac".$y;$total=$total+$_POST[$name];$_POST["Totalac"]=$total;}$total=0;
	//----------[calculos]
	$g_t			=$_POST[TOTAL4]+$_POST[TOTAL5]+$_POST[TOTAL6]+$_POST[TOTAL7]+$_POST[TOTAL8];	//casetas+facturas+ryr+guias+maniobras
	$comicion		=$_POST[TOTAL1]*0.15;   														//comicion pre-definida (para chofer)
	if($_POST[comi]<>''){$comicion=$_POST[TOTAL1]*($_POST[comi]/100);} 								//comicion variada	(para chofer)
	$rete=($comicion*7.5)/100;																		//Isr
	$t_g=   round($g_t+$comicion,2);																//gatos_total+comision
	$dif1=  round($_POST[TOTAL2]-$t_g+$rete,2);															//viaticos-total_gastos+retencion

	$dif2	=  	round($_POST[TOTAL2]-$g_t,2);						//viaticos-gatos_total
	$dif3	=	$dif1+$_POST[Totalac];								//dif1+ acumulado

								
	$dif4=$_POST[Totalab]+$dif1+$_POST[Totalac];									//
	//$pre_d	=	$dif1+$_POST[Totalac];								// ??? esta mal ??? repetido con el anterior
	//$dif4	=	$pre_d+$_POST[TOTAL9];								//
	$comi	=  	round($_POST[flete_r]*0.0928,2);					//Flete_Real * 0.0928
	$t_d_g	= 	round($_POST[TOTAL3]+$t_g+$comi+$_POST[TOTAL9],2);//diesel+total_gatos+comision
	$neto	=   round($_POST[flete_r]-$t_d_g,2);
	$re		=   round($_POST[flete_r]*0.01,2);
	$re		=   round($neto/$re,2);
	$dif_km	=	round($_POST[km_f]-$_POST[km_i],2);
	$dif_despacho		=$_POST[crome_f]-$_POST[crome_i];
	$km_lts				=round($dif_km/$dif_despacho,2);

	if($dif1<0)				{$style_dif1="background: pink; color: black;";}else 	{$style_dif1="background: Greenyellow; color: black;";}
	if($dif2<0)				{$style_dif2="background: pink; color: black;";}else 	{$style_dif2="background: Greenyellow; color: black;";}
	if($re<30)				{$style_re	="background: pink; color: black;";}else 	{$style_re="background: Greenyellow; color: black;";}
	if($_POST[Totalac]<0)	{$style_ac	="background: pink; color: black;";}else 	{$style_ac="background: Greenyellow; color: black;";}
	if($_POST[Totalab]<0)	{$style_ab	="background: pink; color: black;";}else 	{$style_ab="background: Greenyellow; color: black;";}
	if($dif4<0)				{$style_dif4="background: pink; color: black;";}else 	{$style_dif4="background: Greenyellow; color: black;";}

	//--------------------------------memorias 
	//dinamica 
	echo libre_v1::input2(hidden,menu1_sel		,'',$_POST[menu1_sel]	,$style_all.'background: #B6B1B1;',menu1_sel);
	//fiaja
	echo libre_v1::input2(hidden,Hide_ac		,'',5	,$style_all.'background: #B6B1B1;','Hide_ac');
	echo libre_v1::input2(hidden,Hide_ab		,'',5	,$style_all.'background: #B6B1B1;','Hide_ab');
	echo libre_v1::input2(hidden,add_en		,'',$_POST[add_en]		,$style_all.'background: #B6B1B1;','add_en');
	echo libre_v1::input2(hidden,HIDE1		,'',20	,$style_all.'background: #B6B1B1;','HIDE1');
	echo libre_v1::input2(hidden,HIDE2		,'',20	,$style_all.'background: #B6B1B1;','HIDE2');
	echo libre_v1::input2(hidden,HIDE3		,'',20	,$style_all.'background: #B6B1B1;','HIDE3');
	echo libre_v1::input2(hidden,HIDE4		,'',20	,$style_all.'background: #B6B1B1;','HIDE4');
	echo libre_v1::input2(hidden,HIDE5		,'',20	,$style_all.'background: #B6B1B1;','HIDE5');
	echo libre_v1::input2(hidden,HIDE6		,'',20	,$style_all.'background: #B6B1B1;','HIDE6');
	echo libre_v1::input2(hidden,HIDE7		,'',20	,$style_all.'background: #B6B1B1;','HIDE7');
	echo libre_v1::input2(hidden,HIDE8		,'',20	,$style_all.'background: #B6B1B1;','HIDE8');
	echo libre_v1::input2(hidden,HIDE9		,'',20	,$style_all.'background: #B6B1B1;','HIDE9');
	echo libre_v1::input2(hidden,TIPO		,'',$tipo	,$style_all.'background: #B6B1B1;','TIPO');
	//--------------------------------Intefaces
	//	if($_POST[win_carga]==inter_info) 		{
	//----------------------------[generarl info]
	echo"<div id='general_info' style='background: #05486cab;width: 220px;right: 0px;top: 0px;bottom: 5px;position: absolute;color: white;'>";
		echo"<div id='datos_info'>";
			echo libre_v1::input2(text,'','','Operador'				,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::despliegre_mysql	(chofer,Operador,$consu_choferes,Nombre_Ch,$phpv,"style='width: 60%; $style_chofer' id='chofer'",botones_submenu,'Nombre_Ch',$_POST[chofer]);
			echo libre_v1::input2(text,'','','Unidad'				,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::despliegre_mysql	(placas,Unidad,$consu_placas,Placas,$phpv,"style='width: 60%; $style_plcas' id='placas'",botones_submenu,'Placas',$_POST[placas]);
			echo libre_v1::input2(text,'','','Cliente'				,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::despliegre_mysql	(cliente,Cliente,$consu_clientes,Nombre_Cl,$phpv,"style='width: 60% $style_cliente;' id='cliente'",botones_submenu,'Nombre_Cl',$_POST[cliente]);
			echo libre_v1::input2(text,'','','Carta Porte 1'		,"width: 40%"				,''		,"disabled",botone_n);
			echo libre_v2::input3($folio,Carta1,'input',text,'width: 60%;'.$style_Carta1,botones_submenu,'','','onkeypress="return valida_n(event,Carta2)"');
			echo libre_v2::input3($folio,Carta2,'inter',text,'width: 40%;'				,botone_n,'');
			echo libre_v2::input3($folio,Carta2,'input',text,'width: 60%;'.$style_Carta2,botones_submenu,'','','onkeypress="return valida_n(event,Carta3)"');				
			echo libre_v2::input3($folio,Carta3,'inter',text,'width: 40%;'				,botone_n,'');
			echo libre_v2::input3($folio,Carta3,'input',text,'width: 60%;'.$style_Carta3,botones_submenu,'','','onkeypress="return valida_n(event,Carta4)"');
			echo libre_v2::input3($folio,Carta4,'inter',text,'width: 40%;'				,botone_n,'');
			echo libre_v2::input3($folio,Carta4,'input',text,'width: 60%;'.$style_Carta4,botones_submenu,'','','onkeypress="return valida_n(event,D)"');
			echo libre_v1::input2(text,'','','Fecha Inicio'			,"width: 40%"				,''		,"disabled",botone_n);
			echo libre_v2::input3($fechas,D		,'input',text,'width: 20%;'.$style_D,botones_submenu,'','','onkeypress="return valida_n(event,M)"');
			echo libre_v2::input3($fechas,M		,'input',text,'width: 20%;'.$style_A,botones_submenu,'','','onkeypress="return valida_n(event,A)"');
			echo libre_v2::input3($fechas,A		,'input',text,'width: 20%;'.$style_M,botones_submenu,'','','onkeypress="return valida_n(event,D_r)"');
			echo libre_v1::input2(text,'',''	,'Fecha Final'			,"width: 40%"				,''		,"disabled",botone_n);
			echo libre_v2::input3($fechas,D_r	,'input',text,'width: 20%;'.$style_D_r,botones_submenu,'','','onkeypress="return valida_n(event,M_r)"');
			echo libre_v2::input3($fechas,M_r	,'input',text,'width: 20%;'.$style_A_r,botones_submenu,'','','onkeypress="return valida_n(event,A_r)"');
			echo libre_v2::input3($fechas,A_r	,'input',text,'width: 20%;'.$style_M_r,botones_submenu,'','','onkeypress="return valida_n(event,km_i)"');
			echo libre_v1::input2(text,'',''	,'Km Inicio'			,"width: 40%"				,''		,"disabled",botone_n);
			echo libre_v2::input3($km,km_i		,'input',text,'width:60%;'.$style_km_i,botones_submenu,'','','onkeypress="return valida_n(event,km_f)"');
			echo libre_v1::input2(text,'',''	,'Km Final'				,"width: 40%"				,''		,"disabled",botone_n);
			echo libre_v2::input3($km,km_f		,'input',text,'width:60%;'.$style_km_f,botones_submenu,'','','onkeypress="return valida_n(event,flete_r)"');
			echo libre_v2::input3($fletes,flete_r,'inter',text,'width: 40%;'				,botone_n,'');
			echo libre_v2::input3($fletes,flete_r,'input',text,'width: 60%;'.$style_flete_r,botones_submenu,'','','onkeypress="return valida_n(event)"');
			echo libre_v2::input3($folio,n_c,'inter',text,'width: 40%;'				,botone_n,'');
			echo libre_v2::input3($folio,n_c,'input',text,'width: 60%;'.$style_n_c	,botones_submenu,'','','onkeypress="return valida_n(event)"',1);
			echo libre_v1::input2(text,'','','Comentarios'			,"width: 100%"				,'',"disabled",botone_n);
			echo libre_v1::input2(tarea,come,'',$_POST[come]		,"width: 100%;height: 60px; $style_come",come		,' placeholder="" maxlength ="200"',botones_submenu);
		echo"</div>";
		echo libre_v1::input2(button,'','',"Limpiar"		,'position: absolute;bottom: 5px;right: 110px;width: 110px;'					,'limpia_cuenta'		,'onclick="operadores(this)"',botones_submenu);
		echo libre_v1::input2(button,'','',"Guardar"		,'					width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'guarda_cuenta'		,'onclick="operadores(this);"',botones_submenu);
		echo libre_v1::input2(button,'','',"Guardar Cambios",'display: none;	width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'cambio_cuenta'		,'onclick="operadores(this);"',botones_submenu);
		echo libre_v1::input2(button,'','',"Confirmar"		,'display: none;	width: 110px;position: absolute;bottom: 40px;right: 0px;background: yellow;color: black;','confirma_cuenta','onclick="operadores(this)"',botones_submenu);
	echo"</div>";	
	//---------------------[datos_general}
	echo "<div id='general_datos' style='position: absolute;right: 220px;background: #444;padding: 5px;top: 0px; box-shadow: inset 0px 0px 5px black;'>";
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
		$style_all="margin: 0px .5px; width: 70px; text-align: center;";
		$TYPE=text;
		$style_all=$style_all."background: #343434; color: #0075ff;";
		echo libre_v1::input2($TYPE,'','','',$style_all);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu1,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu2,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu3,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu4,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu5,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu6,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu7,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu8,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu9,$style_all,'',disabled);
		echo libre_v1::input2(hidden,focus_gene,'',$_POST[focus_gene],$style_all,'',disabled);	
		echo "<br>";
		$conta=0;
		for($x=1; $x<=20; $x++){
			$name1="4TEXT_VIA".$x;
			$name2="9TEXT".$x;
			$_POST[$name2]=$_POST[$name1];
		}	
		for($x=1; $x<=20; $x++){
			$text="background: #343434; color: #0075ff;";
			$conta=$conta+1;
			$id=$conta;
			echo libre_v1::input2($TYPE,'',$id,$x,$style_all.$text,$id,disabled);
			for($y=1; $y<10; $y++){	
				$name=$y."TEXT";
				$name0=$name;
				$name=$y."TEXT".$x;
				$name_next="";
				$title=$y."TEXT_C".$x;
				$name_c=$y."TEXT_C".$x;
				$style1="";	
				$id=$name;
				$style1="background: white; color: black;box-shadow: inset 0px 0px 4px #0073ff;";
				$libre_all="";
				if(($x>5)&&($y==1))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}else{$z=$x+1;$name_next=$y."TEXT".$z;}//limite 1  -> fletes
				if(($x>5)&&($y==2))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 2  -> casetas
				if(($x>7)&&($y==3))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 3  -> diesel
				if(($x>20)&&($y==4)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 4  -> casetas
				if(($x>5)&&($y==5))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 5  -> facturas
				if(($x>10)&&($y==6)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 6  -> "r y r "
				if(($x>5)&&($y==7))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 7  -> "Guias "
				if(($x>10)&&($y==8)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 8  -> "Maniobras "
				if(($x>20)&&($y==9)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 9  -> via pass
			
				$value=$_POST[$name];
				$title=$_POST[$title];		
				$value_c=$_POST[$name_c];		
				//input2							  ($type2,$name,$title	,$value,$style		,$id,$libre,$class)	onkeypress="return pulsar(event)"
				if($y==9){
					$name="4TEXT_VIA".$x;
				}
				echo libre_v1::input2($TYPE,$name,$title,$value,$style_all.$style1,$id,
				//.'onKeyUp="mueve_diba_text(event,this); 	calcula_update();" onKeyPress=" mueve_diba_text(event,this); " onfocus="comentariosA(this);"');
				'
				onKeyPress	="return valida_n(event,'."''".','."''".','."'$name_next'".');"
				onKeyUp		="mueve_diba_text(event,this);calcula_update();"
				onfocus		="comentariosA(this);"
				maxlength	="15"
				');//comentariosA(this);
				echo libre_v1::input2(hidden,$name_c,'',$value_c,'',$name_c);
			}
			echo "<br>";	
		}
		echo libre_v1::input2($TYPE,'','',TOTALES,$style_all).libre_v1::input2(hidden,hidden_fe				,'',5	);
		echo libre_v1::input2($TYPE,TOTAL1,'',$_POST[TOTAL1],$style_all.$text,TOTAL1,disabled).libre_v1::input2(hidden,hidden_fe		,'',5	,hidden_fe);
		echo libre_v1::input2($TYPE,TOTAL2,'',$_POST[TOTAL2],$style_all.$text,TOTAL2,disabled).libre_v1::input2(hidden,hidden_v		,'',5	,hidden_v);
		echo libre_v1::input2($TYPE,TOTAL3,'',$_POST[TOTAL3],$style_all.$text,TOTAL3,disabled).libre_v1::input2(hidden,hidden_d		,'',7	,hidden_d);
		echo libre_v1::input2($TYPE,TOTAL4,'',$_POST[TOTAL4],$style_all.$text,TOTAL4,disabled).libre_v1::input2(hidden,hidden_c		,'',20	,hidden_c);
		echo libre_v1::input2($TYPE,TOTAL5,'',$_POST[TOTAL5],$style_all.$text,TOTAL5,disabled).libre_v1::input2(hidden,hidden_c_via	,'',20	,hidden_c_via);
		echo libre_v1::input2($TYPE,TOTAL6,'',$_POST[TOTAL6],$style_all.$text,TOTAL6,disabled).libre_v1::input2(hidden,hidden_f		,'',5	,hidden_f);
		echo libre_v1::input2($TYPE,TOTAL7,'',$_POST[TOTAL7],$style_all.$text,TOTAL7,disabled).libre_v1::input2(hidden,hidden_r		,'',10	,hidden_r);
		echo libre_v1::input2($TYPE,TOTAL8,'',$_POST[TOTAL8],$style_all.$text,TOTAL8,disabled).libre_v1::input2(hidden,hidden_g		,'',5	,hidden_g);
		echo libre_v1::input2($TYPE,TOTAL9,'',$_POST[TOTAL9],$style_all.$text,TOTAL9,disabled).libre_v1::input2(hidden,hidden_m		,'',10	,hidden_m);
	echo "</div>";	
	//---------------[Calculadora]		
	$style_all="margin: 0px .5px;text-align: center;background: #343434; color: #0075ff;";			
	$style_all2="margin: 0px .5px;text-align: center;";			
	//$style_all=$style_all."background: #343434; color: #0075ff;";
	echo "<div id='gene_actual' style='$style_gene_actual position: absolute;background: #28336985;padding: 5px;top: 464px;right: 220px;'>";
		echo libre_v1::input2($TYPE,'','',"Cuenta Actual",'background: #343434; color: #a4c1e3; width: 100%; text-align: center;','','disabled');
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"Comision %",$style_all.'background: #343434; color: #0075ff;','','disabled');
		echo libre_v1::input2($TYPE,comi,'',$_POST[comi],$style_all."background: white; box-shadow: inset 0px 0px 8px #0072fd;",comi,"placeholder='15% por Defaul' maxlength='15' onkeypress='return valida_n(event)'onKeyUp='calcula_update();'");
		echo libre_v1::input2($TYPE,'','','',$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','','',$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','','',$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','','',$style_all,'','disabled');
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"Gastos T."			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'',$TITLE_g_t		,$g_t	,$style_all,G_T,'disabled');
		echo libre_v1::input2($TYPE,'','',"Gts.sin Chof."		,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$g_t					,$style_all2."background: orange;color: black;",G_T2,'disabled');	
		echo libre_v1::input2($TYPE,'','',"Fletes R."			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$_POST[flete_r]		,$style_all2."background: #00d2ff;color: black;",flete_r2,'disabled');
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"Chofer"				,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$comicion				,$style_all,"CHOFER",'disabled');	
		echo libre_v1::input2($TYPE,'','',"Viaticos"			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$_POST[TOTAL2]		,$style_all2."background: #01d501;color: black;",VIATICOS,'disabled');	
		echo libre_v1::input2($TYPE,'','',"Total g."			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'',"Diesel[".$_POST[TOTAL3]."] + Gasto T.[$t_g] + Chofer(Comision)[$comicion] + Via pass[".$_POST[TOTAL9]."] = $T_G_F ",$t_d_g,$style_all2."background: orange;color: black;",T_G_F,'disabled');	
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"ISR"					,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$rete					,$style_all,ISR,'disabled');
		echo libre_v1::input2($TYPE,'','',"Diferencia"			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$dif2					,$style_all2.$style_dif2,DIF_VIA_GSC,'disabled');
		echo libre_v1::input2($TYPE,'','',"Neto Carro"			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$neto					,$style_all2."background: #01d501;color: black;",NETO_CARRO,'disabled');
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"Viaticos"			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$_POST[TOTAL2]		,$style_all2."background: #01d501;color: black;",VIATICOS2,'disabled');
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo "<br>";
		echo libre_v1::input2($TYPE,'','',"DIFERENCIA"			,$style_all,'','disabled');
		echo libre_v1::input2($TYPE,'','',$dif1					,$style_all2.$style_dif1,DIF_TV,'disabled');	
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo libre_v1::input2($TYPE,'','',''					,$style_all,'','disabled');	
		echo libre_v1::input2($TYPE,'','',"Rendimiento"			,$style_all."background: yellow;",'','disabled');
		echo libre_v1::input2($TYPE,'','',$re					,$style_all2.$style_re,RENDIMIENTO,'disabled');			
	echo "</div>";
	echo "<div id='gene_combustible' style='$style_gene_combustible    position: absolute;background: #444444;padding: 5px;background: #28336985;top: 464px;right: 836px;'>";
		echo libre_v1::input2($TYPE,'','','Combustible(Diesel)'	,'margin: 0px .5px; width: 50%; text-align: center; color: #a4c1e3; height: 20px;',"",'disabled',botone_n);
		echo libre_v1::input2($TYPE,'','','Kilometrajes'		,'margin: 0px .5px; width: 49.5%; text-align: center; color: #a4c1e3; height: 20px;',"",'disabled',botone_n);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','','Presio',$style_all.'background: #343434; color: #0075ff;',"",'disabled');
		echo libre_v1::input2($TYPE,presio_d,'',$_POST[presio_d],$style_all."background: white; color: black;box-shadow: inset 0px 0px 8px #0072fd;",presio_d,"placeholder='Costo' onkeyup='calcula_update();'onkeypress='return valida_n(event,crome_i)' maxlength='10'");				
		echo libre_v1::input2($TYPE,'','','Inicio'				,$style_all				,''		,"disabled");
		echo libre_v1::input2($TYPE,'','',$_POST[km_i]." Km"	,$style_all.'color: #0075ff;'	,'',"disabled ");
		echo "<br>";	
		echo libre_v1::input2($TYPE,'','','Inicio'				,$style_all				,''		,"disabled");
		echo libre_v1::input2($TYPE,crome_i,'',$_POST[crome_i]	,$style_all.'background: white;color: black;box-shadow: inset 0px 0px 8px #0072fd;'	,crome_i,"onkeypress='return valida_n(event,crome_f)' maxlength='15'");	
		echo libre_v1::input2($TYPE,'','','Final'				,$style_all				,''		,"disabled");
		echo libre_v1::input2($TYPE,'','',$_POST[km_f]." Km"	,$style_all.'color: #0075ff;'	,'',"disabled");
		echo"<br>";
		echo libre_v1::input2($TYPE,'','','Final'				,$style_all				,''		,"disabled");
		echo libre_v1::input2($TYPE,crome_f,'',$_POST[crome_f]	,$style_all.'background: white;color: black;box-shadow: inset 0px 0px 8px #0072fd;'	,crome_f,"onkeypress='return valida_n(event)' maxlength='15'");
		echo libre_v1::input2($TYPE,'','',' Recoridos',$style_all,'',"disabled");		
		echo libre_v1::input2($TYPE,'','',$dif_km." Km",$style_all,Total_km,"disabled");
		echo "<br>";
		echo libre_v1::input2($TYPE,'','','Despachado'				,$style_all				,''		,"disabled");
		echo libre_v1::input2($TYPE,'','',$dif_despacho." Litros"	,$style_all.'color: #a4c1e3;'	,'',"disabled");
		echo libre_v1::input2($TYPE,'','','Km/Lts',$style_all,"",'disabled');
		echo libre_v1::input2($TYPE,'','',$km_lts." km/L",$style_all,km_l,'disabled');
		//echo"<br>";
		//echo libre_v1::input2($TYPE,'','','Total Litros',$style_all,"",'disabled');
		//echo libre_v1::input2($TYPE,'','',$T_L,$style_all,t_l,'disabled');
	echo "</div>";			
	//arrastrados
	echo "<div id='gene_arrastre' style='$style_gene_arrastre left: 100px;position: relative;background: #28336985;padding: 5px;float: left;'>";		
		echo libre_v1::input2($TYPE,'','',Arrastrado,"width: 100%; text-align: center;  color: #a4c1e3; height: 20px;",'',"disabled",botone_n);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','','Anteriores',$style_all,'',"disabled");
		echo libre_v1::input2($TYPE,'','','',$style_all,'',"disabled");
		echo "<br>";		
		echo libre_v1::input2($TYPE,ID_ac1	,'',$_POST[ID_ac1]	,$style_all.'background: #343434; color: #0075ff;','ID_ac1'		,"placeholder='Folio add' readonly='readonly'  onclick='elimi_arra(this);calcula_update();'");
		echo libre_v1::input2($TYPE,ac1		,'',$_POST[ac1]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ac1'						,"onkeyup='calcula_update();'onchange='calcula_update();' readonly='readonly'");
		echo "<br>";
		echo libre_v1::input2($TYPE,'','','',$style_all);
		echo libre_v1::input2($TYPE,'','',$_POST[Totalac],$style_all.'background: yellow;',Totalac,$libre_all);
		echo "<br>";
		////////////
		echo libre_v1::input2($TYPE,'','',Abonado," width: 100%; text-align: center;color: #a4c1e3; height: 20px;",'',"disabled",botone_n);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','','Fecha',$style_all,'',"disabled");
		echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all,'',"disabled");
		echo "<br>";		
		echo libre_v1::input2($TYPE,ab_Com1	,'',$_POST[ab_Com1]	,$style_all.'background: #343434; color: #0075ff;','ab_Com1'	,"placeholder='DD/MM/AA'");
		echo libre_v1::input2($TYPE,ab1		,'',$_POST[ab1]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab1'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab2);'");
		echo "<br>";	
		echo libre_v1::input2($TYPE,ab_Com2	,'',$_POST[ab_Com2]	,$style_all.'background: #343434; color: #0075ff;','ab_Com2'	,"placeholder='DD/MM/AA'");
		echo libre_v1::input2($TYPE,ab2		,'',$_POST[ab2]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab2'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab3);'");
		echo "<br>";		
		echo libre_v1::input2($TYPE,ab_Com3	,'',$_POST[ab_Com3]	,$style_all.'background: #343434; color: #0075ff;','ab_Com3'	,"placeholder='DD/MM/AA'");
		echo libre_v1::input2($TYPE,ab3		,'',$_POST[ab3]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab3'						,"placeholder='0000.00' onkeyup='calcula_update();'onkeypress='return valida_n(event,ab4);'");
		echo "<br>";		
		echo libre_v1::input2($TYPE,ab_Com4	,'',$_POST[ab_Com4]	,$style_all.'background: #343434; color: #0075ff;','ab_Com4'	,"placeholder='DD/MM/AA'");
		echo libre_v1::input2($TYPE,ab4		,'',$_POST[ab4]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab4'						,"placeholder='0000.00'onkeyup='calcula_update();'onkeypress='return valida_n(event,ab5);'");
		echo "<br>";		
		echo libre_v1::input2($TYPE,ab_Com5	,'',$_POST[ab_Com5]	,$style_all.'background: #343434; color: #0075ff;','ab_Com5'	,"placeholder='DD/MM/AA'");
		echo libre_v1::input2($TYPE,ab5		,'',$_POST[ab5]		,$style_all.'background: white;box-shadow: inset 0px 0px 8px #0073ff;','ab5'						,"placeholder='0000.00'onkeyup='calcula_update();'");
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','','',$style_all);	
		echo libre_v1::input2($TYPE,'','',$_POST[Totalab],$style_all.'background: yellow;',Totalab,$libre_all);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','',Resultados," width: 100%; text-align: center;color: #a4c1e3; height: 20px;",'',"disabled",botone_n);	
		echo "<br>";			
		echo libre_v1::input2($TYPE,'','','Actual',$style_all,'',disabled);
		echo libre_v1::input2($TYPE,'','',$dif1,$style_all.$style_dif1,DIF_TV2,$libre_all);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','','Acumulado',$style_all,'',disabled);
		echo libre_v1::input2($TYPE,'','',$_POST[Totalac],$style_all.$style_ac,Totalac2,$libre_all);
		echo "<br>";
		echo libre_v1::input2($TYPE,'','','Abonado',$style_all,'',disabled);	
		echo libre_v1::input2($TYPE,'','',$_POST[Totalab],$style_all.$style_ab,Totalab2,$libre_all);
		echo "<br>";		
		echo libre_v1::input2($TYPE,'','',Diferencia,$style_all,'',disabled);
		echo libre_v1::input2($TYPE,Total_Total,'',$dif4,$style_all.$style_dif4,Total_Total,$libre_all);
		echo "<br>";		
	echo "</div>";
	//arrastra
	echo "<div id='gene_list_arras' style='$style_gene_list_arras top: 328px;position: absolute;background: #28336985;padding: 5px;right: 939px;'>";
		echo libre_v1::input2(button,'','',"Folio 1"	,'width: 50px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
		echo libre_v1::input2(button,'','',"Saldo"  	,'width: 60px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
		echo libre_v1::input2(button,'','',"Estado"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
		echo libre_v1::input2(button,'','',"Añadidos"  ,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');
		$text="background: #343434; color: #0075ff;";
		echo "<div id	='divArrastrar' style='overflow-x: hidden;overflow-y: auto;height: 96px;position: relative;padding: 5px 0px;background: white;width: 275px;box-shadow: inset 0px 0px 8px #0073ff;'>";
			$style_all="margin: 0px .5px; text-align: center;";
			libre_v1::db							(empresa,$conexion,$phpv);
			$consu5	= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'ID_G','1'	,$phpv,'');
			libre_v1::mysql_da_se	($consu5,0,$phpv);			
			while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
				$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
				$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
				$c0='';	$c1='';	$c2='';
				if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
				if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
				if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
				if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
				
				echo libre_v1::input2(button	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"');
				echo libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;".$style_all);
				echo libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all);
				echo libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all);
				echo "<br>";
			}
		echo "</div>";
	echo "</div>";
	//--------------[consola]
		
	$id=Consola;
	$min="min";
	if($min<>""){$class=$min;}else{$class=$id;}
	echo "<div id='$id' class='$class'>";
	echo "<div style='position: absolute; width: 20px; height: 20px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='ventanas($id);'>o</div>";
	echo "<div style='position: absolute; top: 20px; left: 5px; right: 5px; bottom: 5px; background: white;overflow-y: auto; overflow-x: auto;' id='res$id'></div>";
	echo "</div>";
}
if(($_POST['win_carga']=="Folder")or($win_carga=="Folder")){
		
	$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] ORDER BY ID_G DESC";
	if($_POST['A_i']==$_POST['A_f'])$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] AND M >= $_POST[M_i] AND M <= $_POST[M_f] ORDER BY ID_G DESC";
	
	$consu_fecha	= $libre_v2->ejecuta($conexion,$res,$phpv);
	$N_Datos_consu_fecha=$libre_v2->mysql_nu_ro($consu_fecha,$phpv);
	if($N_Datos_consu_fecha>0){
		$libre_v2->mysql_da_se		($consu_fecha,0,$phpv);
		$D_i	=$libre_v2->zero($_POST['D_i']);	$A_i=$libre_v2->zero($_POST['A_i']);	$M_i=$libre_v2->zero($_POST['M_i']);
		$D_f	=$libre_v2->zero($_POST['D_f']);	$A_f=$libre_v2->zero($_POST['A_f']);	$M_f=$libre_v2->zero($_POST['M_f']);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		$x=0;
		while($fechas=$libre_v2->mysql_fe_ar($consu_fecha,$phpv,'')){
			$D		=$libre_v2->zero($fechas['D']);		$A	=$libre_v2->zero($fechas['A']);	$M	=$libre_v2->zero($fechas['M']);
			$D_c	=$libre_v2->zero($fechas['D_c']);		$A_c=$libre_v2->zero($fechas['A_c']);	$M_c=$libre_v2->zero($fechas['M_c']);
			$fec_set= $A.$M.$D;
			
			if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				$consu_abo_acu	=$libre_v2->consulta('abo_acu',$conexion	,'ID_G',$fechas['ID_G'],'ID_G','1'	,$phpv,'','');
				$N_Datos_consu_abo_acu=$libre_v2->mysql_nu_ro($consu_abo_acu,$phpv);
				if($N_Datos_consu_abo_acu>0){
					$abo_acu		=$libre_v2->mysql_fe_ar	($consu_abo_acu,$phpv,'');
					
					$res	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
					if(!empty($_POST['chofer']) and $_POST['chofer']!='chofer'){$res=$res." AND CHOFER LIKE  '$_POST[chofer]'";}
					if(!empty($_POST['placas_b']) and ($_POST['placas_b']!='placas_b')){$res=$res." AND PLACAS LIKE  '$_POST[placas_b]'";}
					if(!empty($_POST['cliente_b']) and ($_POST['cliente_b']!='cliente_b')){$res=$res." AND CLIENTE LIKE  '$_POST[cliente_b]'";}
				
					$folios	= $libre_v2->ejecuta			($conexion,$res,$phpv);
					$N_Datos_folios=$libre_v2->mysql_nu_ro($folios,$phpv);
					if($N_Datos_folios>0){
						$folio=$libre_v2->mysql_fe_ar		($folios,$phpv,'');
						if($folio<>""){
							$x++;
							if($abo_acu['add_en']==''){$style='background:#121212;';	$Estado="Libre";}
							if($abo_acu['add_en']<>''){$style='background:#6d6d6d;';	$Estado="Arrastrada";}
							if($folio['Revisado']==0){$style_Revisado="color: red;";			$Revisado="Pendiente";}
							if($folio['Revisado']==1){$style_Revisado="color: yellowgreen;";	$Revisado="Revisada";}
							$fecha="$fechas[D]-$fechas[M]-$fechas[A]";
							echo $libre_v2->input2('text','',''		,$x						,"margin: 2px .5px;text-align: center;width: 40px;color: white;".$style,'','','');
							//echo $libre_v2->input2(submit,Carta,''	,$fechas[ID_G]			,"margin: 2px .5px;text-align: center; width: 50px;color: white; background: #102f41;",botones_submenu);
							echo $libre_v2->input2('submit','Carta',''	,$fechas['ID_G']			,"margin: 2px .5px;text-align: center; width: 50px; height: 17px;",'','','botones_submenu');
							echo $libre_v2->input2('text','',''		,$abo_acu['Total_Total']		,"margin: 2px .5px;text-align: center;color: white;".$style,'','','');
							echo $libre_v2->input2('text','',''		,$folio['sueldo']			,"margin: 2px .5px;text-align: center;color: white;".$style,'','','');
							echo $libre_v2->input2('text','',''		,$fecha					,"margin: 2px .5px;text-align: center;color: white;".$style,'','','');
							
							echo $libre_v2->input2('text','',''		,$folio['CLIENTE']		,"margin: 2px .5px;text-align: center; width: 250px;color: white;".$style,'','','');
							echo $libre_v2->input2('text','',''		,$Revisado				,"margin: 2px .5px;text-align: center; color: white;".$style.$style_Revisado,'','','');
							echo $libre_v2->input2('text','',''		,$Estado				,"margin: 2px .5px;text-align: center; color: white;".$style,'','','');
							echo"<br>";
						}
					}
				}
			}
		}
	}else{
		echo "<img src='../img/vacio-sistem.png' style='position: absolute;left: 410px;top: 150px;height: 156px;'></img>";
	}
}
?>