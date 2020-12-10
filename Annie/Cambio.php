<?php
$menu='menu-list';
$listn1='';
$listn2=Cuenta;
$listn3=Flete;
$listn4=Viaticos;
$listn5=Diesel;
$listn6=Casetas;
$listn7=Facturas;
$listn8="R Y R";
$listn9=Guias;
$listn10=Maniobras;
$listn11=Abonos;
$type=hidden;
$type2=text;
$style="top: 250px;";
//include("parche1.php");				if($parche1=="")		{echo"<script>alert('parche1 no localizado');</script>";}
include('lista.php');
include('libre_cam.php');
if (($_POST[Grava]==Guardar) and ($_POST[Carta1]<>'')){
    $_POST[Carta]=$_POST[Carta1];
    $consu5=consulta('folio',$conexion);
    include('descarga_cam.php');
}
IF($_POST[Carta_arr]<>''){
	$esi=si;
	$com=compro($_POST[Carta_arr],ID_G,add_en,$consu24,$conexion);
	IF($_POST[Carta_arr]==$_POST[Carta1])$esi=no;
	IF($com<>''){$esi=no;}
	for($x=1; $x<=$_POST[hidden_ac]; $x++){
		$n1="ID_ac".$x;
		IF($_POST[$n1]==$_POST[Carta_arr])$esi=no;
	}
	for($x=1; $x<=$_POST[hidden_ac]; $x++){
		$N1="ID_ac".$x;
		$N2="ac".$x;
		mysql_data_seek($consu24,0);
		if(($_POST[hidden_ac]==$x)and($esi==si)and($com=='')){
			if($x==$_POST[hidden_ac])$_POST[$N1]=$_POST[Carta_arr];
			mysql_data_seek($consu24,0);
			while($datos=mysql_fetch_array($consu24)){
				if($datos[ID_G]==$_POST[$N1]){$_POST[$N2]=$datos[Total_Total];}
			}
		}
	}
}

$total1=	presenta2 (hidden_fe	,'1TEXT_C','1TEXT',$type);
$total2=	presenta2 (hidden_v		,'2TEXT_C','2TEXT',$type);
$total3=	presenta2 (hidden_d		,'3TEXT_C','3TEXT',$type);
$total4=	presenta2 (hidden_c		,'4TEXT_C','4TEXT',$type);
$total4_via=presenta2 (hidden_c_via	,'4TEXT_C_VIA','4TEXT_VIA',$type);
$total5=	presenta2 (hidden_f		,'5TEXT_C','5TEXT',$type);
$total6=	presenta2 (hidden_r		,'6TEXT_C','6TEXT',$type);
$total7=	presenta2 (hidden_g		,'7TEXT_C','7TEXT',$type);
$total8=	presenta2 (hidden_m		,'8TEXT_C','8TEXT',$type);
$total9=	presenta2 (hidden_ab	,'ab_Com','ab',$type);
$total10=	presenta2 (hidden_ac	,'ID_ac','ac',$type,'',$_POST[Delete_Arr],$consu24);
echo input(hidden,A_i,$_POST[A_i]);
echo input(hidden,M_i,$_POST[M_i]);
echo input(hidden,D_i,$_POST[D_i]);
echo input(hidden,A_f,$_POST[A_f]);
echo input(hidden,M_f,$_POST[M_f]);
echo input(hidden,D_f,$_POST[D_f]);

$g_t=$total4+$total5+$total6+$total7+$total8;	//casetas+facturas+ryr+guias+maniobras
$c=$total1*0.15;   								//comicion pre-definida (para chofer)
if($_POST[comi]<>'')$c=$total1*($_POST[comi]/100); //comicion variada	(para chofer)
$rete=($c*7.5)/100;								//Isr
$t_g=   round($g_t+$c,2);						//gatos_total+comision
$dif1=  round($total2-$t_g+$rete,2);			//viaticos-total_gastos+retencion
$dif2=  round($total2-$g_t,2);					//viaticos-gatos_total
$dif3=$dif1+$total10;							//dif1+ acumulado
$pre_d=$dif1+$total10;							// ??? esta mal ??? repetido con el anterior
$dif4=$pre_d+$total9;							//
$comi=  round($_POST[flete_r]*0.0928,2);		//Flete_Real * 0.0928
$t_d_g= round($total3+$t_g+$comi+$total4_via,2);//diesel+total_gatos+comision
$n_c=   round($_POST[flete_r]-$t_d_g,2);
$re=    round($_POST[flete_r]*0.01,2);
$re=    round($n_c/$re,2);
$km_t=	round($_POST[km_f]-$_POST[km_i],2);
//------------------------------------------------------
$c2=compro($_POST[Carta2],ID_G,'',$consu5,$conexion);
$c3=compro($_POST[Carta3],ID_G,'',$consu5,$conexion);
$c4=compro($_POST[Carta4],ID_G,'',$consu5,$conexion);
$n=compro($_POST[chofer],Nombre_Ch,ulti_viaje,$consu1_2,$conexion);
$fec_ini=$_POST[A].zero($_POST[M]).zero($_POST[D]);
$fec_fin=$_POST[A_r].zero($_POST[M_r]).zero($_POST[D_r]);
$grava=1;
IF ($_POST[Carta1]<>'')			{if ($c1==1){$grava=0;	$dc1=pink;$indc1=red;}	if ($c1==0){	$dc1=yellowgreen;}}
IF ($_POST[Carta2]<>'')			{if ($c2==1){$grava=0;	$dc2=pink;$indc2=red;}	if ($c2==0){	$dc2=yellowgreen;}}
IF ($_POST[Carta3]<>'')			{if ($c3==1){$grava=0;	$dc3=pink;$indc3=red;}	if ($c3==0){	$dc3=yellowgreen;}}
IF ($_POST[Carta4]<>'')			{if ($c4==1){$grava=0;	$dc4=pink;$indc4=red;}	if ($c4==0){	$dc4=yellowgreen;}}
IF ($_POST[chofer]<>chofer)		{$dc5=yellowgreen;}		else{$grava=0;}
IF ($_POST[placas]<>placas)		{$dc6=yellowgreen;}		else{$grava=0;}
IF ($_POST[cliente]<>cliente)	{$dc7=yellowgreen;}		else{$grava=0;}
IF ($_POST[flete_r]<>'')		{$dc10=yellowgreen;}	
IF ($fec_ini<$fec_fin)			{$dc8=$dc9=yellowgreen;}
IF ($fec_ini>$fec_fin)			{$dc8=$dc9=pink;			$grava=0;}
IF ((20150101==$fec_fin)and(20150101==$fec_fin)){$dc8=$dc9=pink;			$grava=0;}
IF ($_POST[km_i]<>'')			{$dc11=yellowgreen;}	else{$grava=0;}
IF ($_POST[km_f]<>'')			{$dc12=yellowgreen;}	else{$grava=0;}
IF ($_POST[km_i]>$_POST[km_f])	{$dc11=$dc12=pink;$grava=0;} 

$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title='Nueva Cuenta';
$i1=1;                  $d1=input(hidden,Carta1,$_POST[Carta1],'',"color: $indc1;",'maxlength="4"').input(button,Carta1,$_POST[Carta1]);
$i2=2;                  $d2=input(text,Carta2,$_POST[Carta2],'',"color: $indc2;",'maxlength="4"');
$i3=3;                  $d3=input(text,Carta3,$_POST[Carta3],'',"color: $indc3;",'maxlength="4"');
$i4=4;                  $d4=input(text,Carta4,$_POST[Carta4],'',"color: $indc4;",'maxlength="4"');
$i5=Chofer;             $d5=despliegre_mysql(chofer,Chofer,$consu1,Nombre_Ch);
$i6=Placas;             $d6=despliegre_mysql(placas,Placas,$consu2,Placas);
$i7=Cliente;            $d7=despliegre_mysql(cliente,Clientes,$consu3,Nombre_Cl);
$i8=Salida;             $d8=despieges(D,Dia,1,31).despieges(M,Mes,1,12).despieges(A,Año,2015,2030);
$i9=Llegada;            $d9=despieges(D_r,Dia,1,31).despieges(M_r,Mes,1,12).despieges(A_r,Año,2015,2030);
$i10='Flete R.';        $d10=input(text,flete_r,$_POST[flete_r],'','','maxlength="10"');
$i11="Kms inicio";      $d11=input(text,km_i,$_POST[km_i],'','','maxlength="10"');
$i12="Kms fin";         $d12=input(text,km_f,$_POST[km_f],'','','');
$i13="N° Cuenta";       $d13=input(hidden,n_c,$_POST[n_c]).input(button,n_c,$_POST[n_c]);
$i14=Cometa;            $d14="<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
$d15=date("d/m/Y");
IF ($grava==1)$d16=input(submit,Grava,Guardar,'','','');
IF ($grava==0)$d16="Verifique <br> marcadas en <br>Rosa o Vacias";

$tabla=folio;$n_id=ID_G;$id=$_POST[Carta1];
$n1=CHOFER;		$v1=$_POST[chofer];	$n2=PLACAS;		$v2=$_POST[placas];	$n3=CLIENTE;	$v3=$_POST[cliente];
				$n5=Descripcion;$v5=$_POST[come];	$n6=Difer_1;	$v6=$dif1;
$n7=Carta1;		$v7=$_POST[Carta1];	$n8=Carta2;		$v8=$_POST[Carta2];	$n9=Carta3;		$v9=$_POST[Carta3];
$n11=Carta4;	$v11=$_POST[Carta4];$n12=N_Cuenta;	$v12=$_POST[n_c]; 
$n13=sueldo;	$v13=$c;			$n14=isr;		$v14=$rete; 
include('espe_tab.php');
IF (($grava==1)&&($_POST[Grava]==Guardar)){
	MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));
	$d16='Guardar <br>Con Exito';
}
include("tablero.php");
//----------------------------------------------------------
$size=0;
$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; width: auto; color: white;";
$ts="background: black;";
$title1='Generales';
$i1=Chofer;			$d1=input(button,'',$c,"Flete[$total1] * 0.15= $c ",'background: #FDFD96; color: black;');
$i2=ISR;			$d2=input(button,'',$rete,"(Chofer[$c] * 7.5)/100 = $rete ",'background: orange; color: black;');
$i3='';				$d3=input(button,'',$c-$rete);
$i4="Gastos T.";   	$d4=input(button,'',$g_t,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black;');
$i5=Viaticos;		$d5=input(button,'',$total2,'','background: greenyellow; color: black;');
$i6='';				$d6=input(button,'',$dif1,"+[$total2]Viaticos\r+[$rete]Retencion\r -[$g_t]Gasto T.\r -[$c]chofer\r----------------\r[$dif1] Total ","background: $sd5; color: $ld5;");
$tc7='#989898';		$i7='';			$d7='';
$i8='Sin. Cho.';	$d8=input(button,'',$g_t,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black; ');
$i9=Viaticos;		$d9=input(button,'',$total2,'','background: greenyellow; color: black;');
$i10='';			$d10=input(button,'',$dif2,"+Viaticos[$total2] -Gasto T.[$g_t] = $dif2 ","background: $sd9; color: $ld9;");
$tc11='#989898';	$i11='';			$d11='';
$i12=Flete;			$d12=input(button,'',$_POST[flete_r],'','background: aqua;');
$i13='Total G.';	$d13=input(button,'',$t_d_g,"Via Pass [$total4_via] +Diesel[$total3] +Gasto T.[$t_g] + Comision[$comi] = $t_d_g ","background: orange; color: black;");
$i14='Neto Carro';	$d14=input(button,'',$n_c,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
$i15=Rendimiento;	$d15=input(button,'',$re,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
$i16='Cuentas';		$d16='';			$tc16='#000';
$i17='Actual';		$d17=input(button,'',$dif1,"+[$total2]Viaticos\r -[$rete]Retencion\r -[$g_t]Gasto T.\r -[$c]chofer\r----------------\r[$dif1] Total ","background: $indf16; color: $indc16;");
$i18='Arrastado';	$d18=input(button,'',$total10,"Suma de todas las Cuentas Arastradas","background: $indf17; color: $indc17;");
$i19='';			$d19=input(button,'',$dif3,"Actual[$dif1] + Arrastrada[$total10]= $dif3","background: $indf18; color: $indc18;");
$i20=Abonos;		$d20=input (button,'',$total9,"Suma de los abonos de esta cuenta ","background: $indf19; color: $indc19;");
$i21=Total;			$d21=input(button,'',$dif4,"Arrastrado[$total10]-Abonos[$total9]=$dif4","background: $indf20; color: $indc20;");
include('tablero.php');



//Fletes
echo input($type,comi,$_POST[comi],'Porcentaje de comicion del chofer con relacion de el flete');
if($_POST['menu-list']==$listn3){
    $d=input(text,comi,$_POST[comi]);
    $final="
    <tr bgcolor='#000'><td colspan='3'></td></tr>
    <tr><td></td><td>Comicion %</td><td>$d</td><tr>";
    $id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Fletes;
	$col1=Fecha;					$col2=Valor;
	$repite=$_POST[hidden_fe];		$limite=$hidden_fe;
	$t1=text;						$t2=text;
	$name1='1TEXT_C';				$name2='1TEXT';			$name3=total2;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_fe]=$res;
}
//Viaticos
if($_POST['menu-list']==$listn4){
    $id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Viaticos;
	$col1=Fecha;					$col2=Cantida;
	$repite=$_POST[hidden_v];		$limite=$hidden_v;
	$t1=text;						$t2=text;
	$name1='2TEXT_C';				$name2='2TEXT';			$name3=total2;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_v]=$res;
}
//Diesel
echo input($type,presio_d,$_POST[presio_d]);
if($_POST['menu-list']==$listn5){
    $t_l=round($total3/$_POST[presio_d],2);
	$km_l=round($km_t/$t_l,2);
	$d=input($stype2,presio_d,$_POST[presio_d]);
    $final="
      <tr bgcolor='#000'>                <td colspan='3'></td></tr><tr>
      <tr><td></td><td>Recorido      </td><td>$km_t  </td></tr>
      <tr><td></td><td>Presio Diesel     </td><td>$d     </td></tr>
      <tr><td></td><td>Total De Litros   </td><td>$t_l   </td></tr>
      <tr><td></td><td>K * L             </td><td>$km_l  </td></tr>
    ";
	$id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Diesel;
	$col1=RFC;						$col2=Costo;
	$repite=$_POST[hidden_d];		$limite=$hidden_d;
	$t1=text;						$t2=text;
	$name1='3TEXT_C';				$name2='3TEXT';			$name3=total3;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_d]=$res;
}
//Casetas
IF ($_POST[select]=='')$_POST[select]=Casetas;
echo input(hidden,select,$_POST[select]);
if($_POST['menu-list']==$listn6){
	$id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Casetas;
	$col1=Nombre;					$col2=Costo;
	$repite=$_POST[hidden_c];		$limite=$hidden_c;
	$t1=text;						$t2=text;
	$name1='4TEXT_C';				$name2='4TEXT';			$name3=total4;
	$max1=200;		$max2=10;
	if ($_POST[select]=='Via Pass'){
		$title=input(submit,select,Casetas,'width: 70px;');
		$t0=hidden;		$t1=hidden;	$t2=hidden;
	}
	include("presenta3.php");
	$_POST[hidden_c]=$res;
	//-----------------------
	$id='';							$style="position: absolute; left: 346px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title='Casetas Via Pass';
	$col1=Nombre;					$col2=Costo;
	$repite=$_POST[hidden_c_via];	$limite=$hidden_c_via;
	$t1=text;						$t2=text;
	$name1='4TEXT_C_VIA';			$name2='4TEXT_VIA';			$name3=total4_VIA;
	$max1=200;		$max2=10;
	if ($_POST[select]==Casetas){
		$title=input(submit,select,'Via Pass','width: 250px;');
		$t0=hidden;		$t1=hidden;	$t2=hidden;
	}
	include("presenta3.php");
	$_POST[hidden_c_via]=$res;
}
if($_POST['menu-list']==$listn7){
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Facturas;
	$col1=RFC;						$col2=Importe;
	$repite=$_POST[hidden_f];		$limite=$hidden_f;
	$t1=text;						$t2=text;
	$name1='5TEXT_C';				$name2='5TEXT';			$name3=total5;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_f]=$res;
}
if($_POST['menu-list']==$listn8){
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title='R y R';
	$col1=Producto;					$col2=Costo;
	$repite=$_POST[hidden_r];		$limite=$hidden_r;
	$t1=text;						$t2=text;
	$name1='6TEXT_C';				$name2='6TEXT';			$name3=total6;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_r]=$res;
}
if($_POST['menu-list']==$listn9){
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Guais;
	$col1=Nombre;					$col2=Cobro;
	$repite=$_POST[hidden_g];		$limite=$hidden_g;
	$t1=text;						$t2=text;
	$name1='7TEXT_C';				$name2='7TEXT';			$name3=total7;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_g]=$res;
}
if($_POST['menu-list']==$listn10){
   	$id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Maniobras;
	$col1='';						$col2=Costo;
	$repite=$_POST[hidden_m];		$limite=$hidden_m;
	$t1=text;						$t2=text;
	$name1='8TEXT_C';				$name2='8TEXT';			$name3=total8;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_m]=$res;
}
if(($_POST['menu-list']==$listn11)or($_POST['menu-list']==$listn2)){
//if($_POST['menu-list']==$listn11){
	$id='';
	if ($_POST['menu-list']==$listn2)$style="position: absolute; left: 355px; top: 410px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	if ($_POST['menu-list']==$listn11)$style="position: absolute; left: 355px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$title=Abonos;
	$col1=Fecha;					$col2=importe;
	$repite=$_POST[hidden_ab];		$limite=$hidden_ab;
	$t1=text;						$t2=text;
	$name1=ab_Com;	$name2=ab;		$name3=total9;
	$n_r1='';
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_ab]=$res;
//-----------------------
	$id='';	
	if ($_POST['menu-list']==$listn2)$style="position: absolute; left: 110px; top: 410px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	if ($_POST['menu-list']==$listn11)$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$title=Arrastrados;
	$col1=Carta;					$col2=Saldo;
	$repite=$_POST[hidden_ac];		$limite=$hidden_ac;
	$t0=hidden;	$t1=submit;						$t2=hidden;
	$name1=ID_ac;					$name2=ac;				$name3=total10;
	$max1=200;		$max2=10;
	$n_r1=Delete_Arr;
	include("presenta3.php");
	$_POST[hidden_ac]=$res;
}
//-----------------------	
if($_POST['menu-list']==$listn11){
	$style1="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
	left: 110px; height: 375px; width: 472px; top: 220px;";
	$style2="background: rgba(100, 100, 100, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x: hidden; position: absolute;
	left: 110px; height: 28px; width: 472px; top: 193px;";

	$b1=input(button,'',Cuente,'','width: 70px;');
	$b2=input(button,'',Saldo);
	$b3=input(button,'',Revision,'','width: 70px;');
	$b4=input(button,'',Estado	,'','width: 70px;' );
	$b5=input(button,'',Descripcion);
	print "
	 <div style='$style2'>
		<table>
			<tr>
				<td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td>
			</tr>
		</table>
	 </div>
	 <div style='$style1'>
		<table>
	";
			$consu5=consulta('folio',$conexion,'','',ID_G,1);
			mysql_data_seek($consu5,0);
			while($datos=mysql_fetch_array($consu5)){
				if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
					mysql_data_seek($consu24,0);
					while($dato=mysql_fetch_array($consu24)){
						if($dato[ID_G]==$datos[ID_G])break;
					}
					$c0='';	$c1='';	$c2='';
					if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
					if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
					if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
					if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
					$b1=input(submit,Carta_arr,$datos[ID_G]	,'','width: 70px;');
					$b2=input(button,'',$dato[Total_Total]	,'',"background: $c1; color:$c2;");
					$b3=input(button,'',$Revisado			,'',"background: $c1; color:$c0; width: 70px;");
					$b4=input(button,'',$Estado				,'',"background: $c1; color:$c2; width: 70px;");
					$b5=input(text	,'',$datos[Descripcion]	,$datos[Descripcion],"background: $c1; color:$c2;");
					print "
						<tr >
							<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td style='width: auto;'>$b6</td>
						</tr>
					";
				}
			}
	print "
		</table>
	 </div>
	";
}
if($dif1<0)		{$sd5='pink'; $ld5='red';}else 		 {$sd5='Greenyellow'; 	 $ld5='green';}
if($dif2<0)		{$sd9='pink'; $ld9='red';}else 		 {$sd9='Greenyellow'; 	 $ld9='green';}
if($n_c<10)		{$sd13='pink'; $ld13='red';}else 	 {$sd13='Greenyellow'; 	 $ld13='green';}
if($re<30)		{$sd14='pink'; $ld14='red';}else 	 {$sd14='Greenyellow'; 	 $ld14='green';}
if($dif1<0)	    {$indf16='pink'; $indc16='red';}else {$indf16='Greenyellow'; $indc16='green';}
if($total10<0)	{$indf17='pink'; $indc17='red';}else {$indf17='Greenyellow'; $indc17='green';}
if($pre_d<0)	{$indf18='pink'; $indc18='red';}else {$indf18='Greenyellow'; $indc18='green';}
if($total9<0)	{$indf19='pink'; $indc19='red';}else {$indf19='Greenyellow'; $indc19='green';}
if($dif4<0)	    {$indf20='pink'; $indc20='red';}else {$indf20='Greenyellow'; $indc20='green';}

if($_POST['menu-list']==$listn2){
$size=0;
$title1="Gastos sin Chofer";
$style="position: absolute; left: 387px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
$i6='';				$d6='';				$tc6='#989898';
/*$i7='Sin. Cho.';*/$d7=input(button,'',$g_t   ,'','background: orangered;');
$i8=Viaticos;		$d8=input(button,'',$total2,'','background: yellowgreen;');
$i9='';				$d9='';				$tc9='#989898';
$i10='';			$d10=input(button,'',$dif2 ,'',"background: $sd9; color: $ld9;");
$i11='';			$d11='';			$tc11=white;
$i12=Flete;			$d12=input(button,'',$_POST[flete_r],'','background: aqua;');
$i13='';			$d13='';			$tc13='#989898';
$i14=Chofer;		$d14=input(button,'',$c    ,'','background: #FDFD96;');
$i15=Diesel;		$d15=input(button,'',$total3,'','background: #FDFD96;');
$i16=Comisiones;	$d16=input(button,'',$comi,'','background: #FDFD96;');
$i17='Via pass';	$d17=input(button,'',$total4_via	);
$i18='';			$d18='';			$tc18='#989898';
$i19='';			$d19=input(button,'',$t_d_g,'','background: orangered;');
$i20=Neto;			$d20=input(button,'',$n_c  ,'',"background: $sd13; color: $ld13;");

include("tablero.php");
//---------------------------------------------------------------
$size=0;
$title1='Gastos con Chofer';
$style="position: absolute; left: 100px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
$i6='';				$d6='';				$tc6='#989898';
					$d7=input(button,'',$g_t   ,'','background: orange;');
$i8=Chofer;			$d8=input(button,'',$c	   ,'','background: orange;');
$i9='';				$d9='';				$tc9='#989898';
$i10='';			$d10=input(button,'',$t_g  ,'','background: orangered;');
$i11=Viaticos;		$d11=input(button,'',$total2,'','background: yellowgreen;');
$i12='';			$d12='';			$tc12='#989898';
$i13='';			$d13=input(button,'',$dif1 ,'',"background: $sd5; color: $ld5;");
include("tablero.php");		
}
//----------------------------------------------------------------
print input($type,hidden_fe,$_POST[hidden_fe]);
print input($type,hidden_v,$_POST[hidden_v]);
print input($type,hidden_d,$_POST[hidden_d]);
print input($type,hidden_c,$_POST[hidden_c]);
print input($type,hidden_c_via,$_POST[hidden_c_via]);
print input($type,hidden_f,$_POST[hidden_f]);
print input($type,hidden_r,$_POST[hidden_r]);
print input($type,hidden_g,$_POST[hidden_g]);
print input($type,hidden_m,$_POST[hidden_m]);
print input($type,hidden_c,$_POST[hidden_c]);
print input($type,hidden_ab,$_POST[hidden_ab]);
print input($type,hidden_ac,$_POST[hidden_ac]);
print input($type,hidden_ac_a,$_POST[hidden_ac_a]);
echo"<TEXTAREA style='width: 100px; height: 220px; color: white; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;'>";
	//-----------------------------------------------------------
	$tabla=km;		$n_id=ID_G;			$id=$_POST[Carta1];
	$n1=KM_S;		$v1=$_POST[km_i];	$n2=KM_E;		$v2=$_POST[km_f];	  
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//-----------------------------------------------------------
	$tabla=fechas;	$n_id=ID_G;		$id=$_POST[Carta1];
	$n1=D;			$v1=$_POST[D];	$n2=M;				$v2=$_POST[M];	$n3=A;	$v3=$_POST[A];
	$n4=D_r;		$v4=$_POST[D_r];$n5=M_r;			$v5=$_POST[M_r];$n6=A_r;$v6=$_POST[A_r];
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//-------------------------------------------- ---------------
	$tabla=fletes;$na1="1TEXT";$va1="1TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_fe];$n1=Flete_R;$v1=$_POST[flete_r];$n2=comi_ass;$v2=$_POST[comi];$n3=HIDE1;$v3=$_POST[hidden_fe];$n4=TOTAL1;$v4=$total1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=viaticos;$na1="2TEXT";$va1="2TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_v];$n1=HIDE2;$v1=$_POST[hidden_v];$n2=TOTAL2;$v2=$total2;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=disel;	$na1="3TEXT";$va1="3TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_d];$n1=presio_d;$v1=$_POST[presio_d];$n2=HIDE3;$v2=$_POST[hidden_d];$n3=TOTAL3;$v3=$total3;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//---------------------------------------------------------
	$tabla=casetas;	$na1="4TEXT";$va1="4TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c];$n1=HIDE4;$v1=$_POST[hidden_c];$n2=TOTAL4;$v2=$total4;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//---------------------------------------------------------
	$tabla=casetas_via;$na1="TEXT";$va1="4TEXT_VIA";
	$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c_via];$n1=TOTAL;$v1=$total4_via; $n2=HIDE;	$v2=$_POST[hidden_c_via];
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=facturas;$na1="5TEXT";$va1="5TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_f];$n1=HIDE5;$v1=$_POST[hidden_f];$n2=TOTAL5;$v2=$total5;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=ryr;	$na1="6TEXT";$va1="6TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_r];$n1=HIDE6;$v1=$_POST[hidden_r];$n2=TOTAL6;$v2=$total6;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=guias;$na1="7TEXT";$va1="7TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_g];$n1=HIDE7;$v1=$_POST[hidden_g];$n2=TOTAL7;$v2=$total7;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=maniobras;$na1="8TEXT";$va1="8TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_m];$n1=HIDE8;$v1=$_POST[hidden_m];$n2=TOTAL8;$v2=$total8;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------


	$tabla=fletes_c;	$na1="1TEXT";$va1="1TEXT_C";$repit1=$_POST[hidden_fe];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//-----------------------------------------------------------
	$tabla=viaticos_c;	$na1="2TEXT";$va1="2TEXT_C";$repit1=$_POST[hidden_v];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=disel_c;		$na1="3TEXT";$va1="3TEXT_C";$repit1=$_POST[hidden_d];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=casetas_c_via;$na1="TEXT";$va1="4TEXT_C_VIA";
	$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c_via];
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=casetas_c;	$na1="4TEXT";$va1="4TEXT_C";$repit1=$_POST[hidden_c];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=facturas_c;	$na1="5TEXT";$va1="5TEXT_C";$repit1=$_POST[hidden_f];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=ryr_c;		$na1="6TEXT";$va1="6TEXT_C";$repit1=$_POST[hidden_r];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=guias_c;		$na1="7TEXT";$va1="7TEXT_C";$repit1=$_POST[hidden_g];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	$tabla=maniobras_c;	$na1="8TEXT";$va1="8TEXT_C";$repit1=$_POST[hidden_m];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	//----------------------------------------------------------
	for($x=1; $x<=$_POST[hidden_ac]; $x++){
		$N1=ID_ac.$x;
		$tabla=abo_acu;
		$n_modificando=ID_G;$v_modificando=$_POST[$N1];
		$n_id=add_en;$id=$_POST[Carta1];
		include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	}


	mysql_data_seek($consu24,0);
	while($dato=mysql_fetch_array($consu24)){
		if($dato[ID_G]==$_POST[Carta1])break;
	}
	for($x=1; $x<=$dato[Hide_ac]; $x++){
		$N1=ID_ac.$x;
		$dat=no;
		for($y=1; $y<=$_POST[hidden_ac]; $y++){
			$na1=ID_ac.$y;
			if ($_POST[$na1]==$dato[$N1]){$dat=si;}
		}
		if ($dat==no){
			$tabla=abo_acu;
			$n_modificando=ID_G;$v_modificando=$dato[$N1];
			$n_id=add_en;$id='';
			include('espe_tab.php');
		IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
		}
	}
	//----------------------------------------------------------
	$tabla=abo_acu;
	$na1=ID_ac;	$va1=ID_ac;	$repit1=$_POST[hidden_ac];
	$na2=ac;	$va2=ac;	$repit2=$_POST[hidden_ac];
	$na3=ab;	$va3=ab;	$repit3=$_POST[hidden_ab];
	$na4=ab_Com;$va4=ab_Com;$repit4=$_POST[hidden_ab];

	$n_id="ID_G";	$id=Carta1;
	$n1=Hide_ac;	$v1=$_POST[hidden_ac];
	$n2=Hide_ab;	$v2=$_POST[hidden_ab];

	$n3=Totalac;	$v3=$total10;
	$n4=Totalab;	$v4=$total9;
	$n5=Total_Total;$v5=$dif4;
	$n6=rete;		$v6=$rete;
	$n7=dif1;		$v7=$dif1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
	
	$consu24=consulta('abo_acu',$conexion);
	Actua($_POST[Carta1],$grava,$conexion);
	
function Actua($carta,$grava,$conexion){
	if ($conexion=='')echo"No Hay Conexion par Actua";
	if ($conexion<>'')$consu24=consulta('abo_acu',$conexion);
	$c0='';
	$c0=compro($carta,ID_G,add_en,$consu24,$conexion);
	$fec_fin=$_POST[A_r].zero($_POST[M_r]).zero($_POST[D_r]);
	IF($c0<>''){
		if ($conexion<>'')$consu24=consulta('abo_acu',$conexion);
		$c1=compro($carta,ID_G,Total_Total,$consu24,$conexion);
		print"Cuenta  : $carta \r";
		print"Saldo   : $c1 \r";
		print"--------------\r";
		print"Arras en: $c0 \r";
		$consu24=consulta('abo_acu',$conexion,ID_G,$c0);
		for($x=1; $x<=5; $x++){
			$N1=ID_ac.$x;
			$N2=ac.$x;
			$c2=compro($carta,$N1,$N2,$consu24,$conexion);
			if ($c2<>''){
				echo "Posicion: $N1 \r saldo   : $c2 ";
				if ($c2<>$c1){
					echo'>Guardar saldo<';
					$tabla=abo_acu;
					$n_id=ID_G;$id=$c0;
					$n_modificando=ID_G;$v_modificando=$c0;
					$n1=$N2;	$v1=$c1;	
					include('espe_tab.php');
					IF (($grava==1)&&($_POST[Grava]==Guardar)&&($fec_fin>=20160601)){
						echo"\r".$res;
						MYSQL_QUERY($res,$conexion)or die("Error \r$res\r".mysql_error($conexion));
					}
				}
			}
		}	
		$total=0;
		for($y=1; $y<=5;$y++){
			$N1=ID_ac.$y;
			$N2=ac.$y;
			$consu24=consulta('abo_acu',$conexion,ID_G,$c0);
			while($dato=mysql_fetch_array($consu24)){
				$total=$total+$dato[$N2];
			}
		}
		$consu5=consulta('folio'			   ,$conexion,ID_G,$c0);
		$consu6=consulta('fletes'	           ,$conexion,ID_G,$c0);
		$consu7=consulta('viaticos'	           ,$conexion,ID_G,$c0);
		$consu8=consulta('disel'	           ,$conexion,ID_G,$c0);
		$consu9=consulta('casetas'	           ,$conexion,ID_G,$c0);
		$consu10=consulta('facturas'	       ,$conexion,ID_G,$c0);
		$consu11=consulta('ryr'		           ,$conexion,ID_G,$c0);
		$consu12=consulta('guias'	           ,$conexion,ID_G,$c0);
		$consu13=consulta('maniobras'	       ,$conexion,ID_G,$c0);
		
		$total1=compro($c0,ID_G,TOTAL1		,$consu6,$conexion);
		$comi_a=compro($c0,ID_G,comi_ass	,$consu6,$conexion);
		$total2=compro($c0,ID_G,TOTAL2		,$consu7,$conexion);
		$total4=compro($c0,ID_G,TOTAL4		,$consu9,$conexion);
		$total5=compro($c0,ID_G,TOTAL5		,$consu10,$conexion);
		$total6=compro($c0,ID_G,TOTAL6		,$consu11,$conexion);
		$total7=compro($c0,ID_G,TOTAL7		,$consu12,$conexion);
		$total8=compro($c0,ID_G,TOTAL8		,$consu13,$conexion);
		$dif=	compro($c0,ID_G,Difer_1		,$consu5,$conexion);
		$sue=	compro($c0,ID_G,sueldo		,$consu5,$conexion);
		$cac=	compro($c0,ID_G,Totalac		,$consu24,$conexion);
		$cab=	compro($c0,ID_G,Totalab		,$consu24,$conexion);
		$tot=	compro($c0,ID_G,Total_Total	,$consu24,$conexion);
		
		$g_t=$total4+$total5+$total6+$total7+$total8;
		$c=$total1*0.15;    if($comi_a<>'')$c=$total1*($comi_a/100);
		$rete=($c*7.5)/100;
		$t_g=   round($g_t+$c,2);
		$dif2=  round($total2-$t_g+$rete,2);
		$t1=$total+$dif2;
		$dif1=  round($cab+$t1,2);
		echo"\r----------------";
		echo"\rSue            de $c0 : $sue ";
		echo"\rG_T            de $c0 : $g_t ";
		echo"\rCh             de $c0 : $c ";
		echo"\rRe             de $c0 : $rete ";
		echo"\rT_G            de $c0 : $t_g ";
		echo"\rDif_cal        de $c0 : $dif2 ";
		echo"\r----------------";
		echo"\rFlete          de $c0 : $total1 ";
		echo"\rViaticos       de $c0 : $total2 ";
		echo"\rCasetas        de $c0 : $total4 ";
		echo"\rFacturas       de $c0 : $total5 ";
		echo"\rRyR            de $c0 : $total6 ";
		echo"\rGuias          de $c0 : $total7 ";
		echo"\rManiobras      de $c0 : $total8 ";
		echo"\rComi           de $c0 : $comi_a ";
		echo"\r----------------\r";
		echo"\rDifer1         de $c0 : $dif ";
		echo"\rcalcu Arastedo de $c0 : $total ";
		echo"\rTotal Abonado  de $c0 : $cab ";
		echo"\rTotalTotal     de $c0 : $tot ";
		echo"\rTotal calcu           : $dif1";
		if ($c<>$sue){
			echo"\r>Guardar Sueldo<";
			$tabla=folio;
			$n_id=ID_G;$id=$c0;
			$n_modificando=ID_G;$v_modificando=$c0;
			$n1=sueldo;	$v1=$c;	
			include('espe_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)&&($fec_fin>=20160601)){
				echo"\r".$res;
				MYSQL_QUERY($res,$conexion)or die("Error \r$res\r".mysql_error($conexion));
			}
		}
		if ($tot<>$dif1){
			echo"\r>Guardar Total<";
			$tabla=abo_acu;
			$n_id=ID_G;$id=$c0;
			$n_modificando=ID_G;$v_modificando=$c0;
			$n1=Total_Total;	$v1=$dif1;	
			include('espe_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)&&($fec_fin>=20160601)){
				echo"\r".$res;
				MYSQL_QUERY($res,$conexion)or die("Error \r$res\r".mysql_error($conexion));
			}
		}
		echo"\r----------------\r";
		Actua($c0,$grava,$conexion);
	}
}
echo"</TEXTAREA>";
?>
