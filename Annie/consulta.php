<?php
$menu="menu-list";
if ($_POST[Carta1]<>''){
$listn2=Cuenta;
$listn3=Flete;
$listn4=Viaticos;
$listn5=Disel;
$listn6=Casetas;
$listn7=Facturas;
$listn8="R Y R";
$listn9=Guias;
$listn10=Maniobras;
$listn11=Abonos;
}else{
//echo'Tienes que Seleccionar una Cuenta<br >Folder';
echo'
<table id="viaticos" style="background: white;">
	<tr ><td >No es Posible Visualizar Datos</td ></tr >
	<tr ><td ></td ></tr >
	<tr ><td ><--- Tienes Que Dirigirte A Folder Y Seleccionar un Chofer <br >y Despues Una Carta Porte</td >	</tr >
</table >
';
}
$size=0;
$type=hidden;
$type2=hidden;
$style="top: 250px;";
if ($_POST['menu-list']==''){$_POST['menu-list']=$listn2;}
include('lista.php');
include('libre_con.php');
if($_POST[confi_dele]==Confirmar){delete();}
if(($_POST[CambRevi]<>'')and($_POST[revisado]==1)){edita('folio','0',$_POST[Carta1]); $_POST[Carta]=$_POST[Carta1];}
if(($_POST[CambRevi]<>'')and($_POST[revisado]==0)){edita('folio','1',$_POST[Carta1]); $_POST[Carta]=$_POST[Carta1];}

$total1=presenta2 (hidden_fe,'1TEXT_C','1TEXT',$type);
$total2=presenta2 (hidden_v,'2TEXT_C','2TEXT',$type);
$total3=presenta2 (hidden_d,'3TEXT_C','3TEXT',$type);
$total4=presenta2 (hidden_c,'4TEXT_C','4TEXT',$type);
$total5=presenta2 (hidden_f,'5TEXT_C','5TEXT',$type);
$total6=presenta2 (hidden_r,'6TEXT_C','6TEXT',$type);
$total7=presenta2 (hidden_g,'7TEXT_C','7TEXT',$type);
$total8=presenta2 (hidden_m,'8TEXT_C','8TEXT',$type);
$total9=presenta2 (hidden_ab,'ab_Com','ab',$type);
$total10=presenta2 (hidden_ac,'ID_ac','ac',$type);
echo $d2=input2($type,presio_d,'',$_POST[presio_d]);
echo $d2=input2($type,comi,'',$_POST[comi]);

$g_t=$total4+$total5+$total6+$total7+$total8;
$c=$total1*0.15;
if($_POST[comi]<>'')$c=$total1*($_POST[comi]/100);
$t_g=round($g_t+$c,2);
$dif1=round($total2-$t_g,2);
$dif2=round($total2-$g_t,2);
$comi=round($_POST[flete_r]*0.0928,2);
$t_d_g=round($total3+$t_g+$comi,2);
$n_c=round($_POST[flete_r]-$t_d_g,2);
$re=round($_POST[flete_r]*0.01,2);
$re=round($n_c/$re,2);
	$d1=input($type2,'Carta1','Carta Porte [Principal]','','',4);
	$d2=input($type2,'Carta2','Carta Porte [2]','','',4);
	$d3=input($type2,'Carta3','Carta Porte [3]','','',4);
	$d4=input($type2,'Carta4','Carta Porte [4]','','',4);
	$d5=input($type2,chofer,chofer);
        $d6=input($type2,placas,placas);
        $d7=input($type2,cliente,cliente);
	$d8=input($type2,D).'-'.input($type2,M).'-'.input($type2,A);
	$d9=input($type2,D_r).'-'.input($type2,M_r).'-'.input($type2,A_r);
	$d10=input($type2,'flete_r');
	$d11=input($type2,'km_i');
	$d12=input($type2,'km_f');
	$d13=input($type2,'n_c');
	//$d14=input($type2,'come');
    $d14="<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come' disable>$_POST[come]</TEXTAREA>";   
	$km_t=round($_POST[km_f]-$_POST[km_i],2);
        $d15=input($type2,D_c).'-'.input($type2,M_c).'-'.input($type2,A_c);
	if($_POST[revisado]==0){$revisado="Pendiente"; $style="color: pink;";}
	if($_POST[revisado]==1){$revisado="Revisado";  $style="color: yellowgreen; border-radius: 5px; background: #787878;";}
	$d16=input(submit,CambRevi,'Cambiar Estado De Cuenta',$revisado,$style).input2(hidden,revisado,'',$_POST[revisado]);
	$i16=input2(submit,dele_cue,'Eliminar Permanentemente La cuenta',Eliminar);
	if($_POST[dele_cue]==Eliminar)
	{$i16=input2(submit,confi_dele,'Este Proseso Es Ireversible Eliminando la Cuenta',Confirmar);}
tablero(
/*datos tabl*/'0','background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;','Cartas Porte<br>'.$title
/*datos isqu*/,'1','2','3','4','Chofer','Placas','Cliente','Salida','Llegada','Flete R.',' Kms Inicio','Kms Fin','N°Cuenta','Come.','Registro',$i16
/*datos dere*/,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16
/*fondo dual*/,'',$cf2,$cf3,$cf4,$cf5,$cf6,$cf7,$cf8,$cf9,$cf10,$cf11,$cf12,$cf13,$cf14,'',''
/*simp. isqu*/,'','','','','','','','','','','','','','','',''
/*simp. dere*/,$sd1,$sd2,$sd3,$sd4,$sd5,$sd6,$sd7,$sd8,$sd9,$sd10,$sd11,$sd12,$sd13,$sd14,$sd15,$sd16
/*letr. isqu*/,'','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','','','','','','','','','','','','',''
);
if($dif1<0){$sd5='pink'; $ld5='red';}else {$sd5='Greenyellow'; $ld5='green';}
if($dif2<0){$sd9='pink'; $ld9='red';}else {$sd9='Greenyellow'; $ld9='green';}
if($n_c<0){$sd13='pink'; $ld13='red';}else {$sd13='Greenyellow'; $ld13='green';}
if($re<30){$sd14='pink'; $ld14='red';}else {$sd14='Greenyellow'; $ld14='green';}

$d2=input2($type2,presio_d,'',$_POST[presio_d]);
$com=input($type,comi);
if($_POST['menu-list']<>$listn1)
{
tablero(
/*datos tabl*/'0','background: #343434; width: auto;  position: relative; float: rigth; left: -5px;',''
/*datos isqu*/,'Gastos T.','Chofer','Total::..','Viaticos','','---','GTS.SIN CHO.','Viaticos','','---','Fletes','Total De G.','Neto P. Caro','Rendimiento','',''
/*datos dere*/,$g_t,$c,$t_g,$total2,$dif1,'---',$g_t,$total2,$dif2,'---',$_POST[flete_r],$t_d_g,$n_c,$re,'',''
/*fondo dual*/,'#FDFD96','#FDFD96','orange','greenyellow','','#898989','orange','greenyellow','','#898989','aqua','orange','greenyellow','','',''
/*simp. isqu*/,'','','','','','','','','','','','','','','',''
/*simp. dere*/,'','','','',$sd5,'','','',$sd9,'','','',$sd13,$sd14,'',''
/*letr. isqu*/,'','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','',$ld5,'','','',$ld9,'','','',$ld13,$ld14,'',''
);
}
if(($_POST['menu-list']==$listn2) and ($_POST[Carta1]<>''))
{
$sd6=$sd13;
$ld6=$ld13;
$sd8=$sd9;
$ld8=$ld9;
$sd11=$sd5;
$ld11=$ld5;
tablero(
/*datos tabl*/'0','background: #787878; width: auto; color: #34343; left: -15px;',''
/*datos isqu*/,'Flete R.','Chofer','Disel','Comisiones','Gasto T.','Neto','','','','','','','','','',''
/*datos dere*/,$_POST[flete_r],$c,$total3,$comi,/*$t_g*/$t_d_g,$n_c,'','','','','','','','','',''
/*fondo dual*/,'aqua','#FDFD96','#FDFD96','#FDFD96','orange','greenyellow','','','','','','','','','',''
/*simp. isqu*/,'','','','','','','','','','','','','','','',''
/*simp. dere*/,'','','','','',$sd6,'','','','','','','','','',''
/*letr. isqu*/,'','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','','',$ld6,'','','','','','','','','',''
);
tablero(
/*datos tabl*/'0','background: #787878; width: auto; color: #34344; left: -15px;',''
/*datos isqu*/,'Casetas','Facturas','RYR','Guias','Maniobras','GTS. SIN. CHO.','Viaticos','','','','','','','','',''
/*datos dere*/,$total4,$total5,$total6,$total7,$total8,$g_t,$total2,$dif2,'','','','','','','',''
/*fondo dual*/,'#FDFD96','#FDFD96','#FDFD96','#FDFD96','#FDFD96','orange','greenyellow','','','','','','','','',''
/*simp. isqu*/,'','','','','','','','','','','','','','','',''
/*simp. dere*/,'','','','','','','',$sd8,'','','','','','','',''
/*letr. isqu*/,'','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','','','','',$ld8,'','','','','','','',''
);

tablero(
/*datos tabl*/'0','background: #787878; width: auto; color: #34343; left: -15px;',''
/*datos isqu*/,'Casetas','Facturas','RYR','Guias','Maniobras','Gastos T.','Chofer','..::Total::..','Viaticos','','','','','','',''
/*datos dere*/,$total4,$total5,$total6,$total7,$total8,$g_t,$c,$t_g,$total2,$dif1,'','','','','',''
/*fondo dual*/,'#FDFD96','#FDFD96','#FDFD96','#FDFD96','#FDFD96','orangered','orangered','orange','aqua','','','','','','',''
/*simp. isqu*/,'','','','','','','','','','','','','','','',''
/*simp. dere*/,'','','','','','','','','',$sd11,'','','','','',''
/*letr. isqu*/,'','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','','','','','','',$ld11,'','','','','',''
);
}

if(($_POST['menu-list']==$listn3)and($_POST[Carta1]<>'')){
presenta3($type2,hidden_fe,'1TEXT_C','1TEXT',$total1,'total1',$type,'5');
$d1=input2(text,comi,'Porcentaje de comicion del chofer con relacion de el flete',$_POST[comi]);
        tablero
        ( $size,'background: #343434; width: auto;  position: relative; float: rigth; left: -15px;',$title1
          ,'Comicion %','','','','','','','','','','','','','','',''//texto derecho
          ,$d1,'','','','','','','','','','','','','','',''//color fondo dual
          ,'#898989','','','','',$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16//color fondo dual
          ,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16//color simple fondo isquierdo
          ,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16//color simple fondo derecha
          ,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16//color letras isquierda
          ,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16//color letras derecha
        );
}
if(($_POST['menu-list']==$listn4)and($_POST[Carta1]<>'')){Presenta3($type2,hidden_v ,'2TEXT_C','2TEXT',$total2,'total2',$type,'5');}
if(($_POST['menu-list']==$listn5)and($_POST[Carta1]<>'')){presenta3($type2,hidden_d ,'3TEXT_C','3TEXT',$total3,'total3',$type,'7');
	$t_l=round($total3/$_POST[presio_d],2);
	$km_l=round($km_t/$t_l,2);
	$d2=input($type2,presio_d,'Presio de el diesel','','',8);
	tablero
	(
	  $size,'background: #343434; width: auto;  position: relative; float: rigth; left: -15px;',$title1
	  ,'Recorido ','Presio Diesel','Total De Litros','Kilom X Litro','','','','','','','','','','','',''//texto derecho
	  ,$km_t,$d2,$t_l,$km_l,'','','','','','','','','','','',''//color fondo dual
	  ,'#898989','#898989','#898989','#898989',$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16//color fondo dual
	  ,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16//color simple fondo isquierdo
	  ,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16//color simple fondo derecha
	  ,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16//color letras isquierda
	  ,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16//color letras derecha
	);
}

if(($_POST['menu-list']==$listn6)and($_POST[Carta1]<>'')){presenta3($type2,hidden_c ,'4TEXT_C','4TEXT',$total4,'total4',$type,'20');}
if(($_POST['menu-list']==$listn7)and($_POST[Carta1]<>'')){presenta3($type2,hidden_f ,'5TEXT_C','5TEXT',$total5,'total5',$type,'5');}
if(($_POST['menu-list']==$listn8)and($_POST[Carta1]<>'')){presenta3($type2,hidden_r ,'6TEXT_C','6TEXT',$total6,'total6',$type,'10');}
if(($_POST['menu-list']==$listn9)and($_POST[Carta1]<>'')){presenta3($type2,hidden_g ,'7TEXT_C','7TEXT',$total7,'total7',$type,'5');}
if(($_POST['menu-list']==$listn10)and($_POST[Carta1]<>'')){presenta3($type2,hidden_m ,'8TEXT_C','8TEXT',$total8,'total8',$type,'6');}
if(($_POST['menu-list']==$listn11)and($_POST[Carta1]<>'')){
$pre_d=$dif1+$total10;
$dif4=$pre_d+$total9;
if($dif1<0){$dc1='pink'; $df1='red';}else {$dc1='Greenyellow'; $df1='green';}
if($total10<0){$dc2='pink'; $df2='red';}else {$dc2='Greenyellow'; $df2='green';}
if($pre_d<0){$dc3='pink'; $df3='red';}else {$dc3='Greenyellow'; $df3='green';}
if($total9<0){$dc4='pink'; $df4='red';}else {$dc4='Greenyellow'; $df4='green';}
if($dif4<0){$dc5='pink'; $df5='red';}else {$dc5='Greenyellow'; $df5='green';}

tablero
(
	$size,'color: white; left: -5px;',''
	,Actual,'Arrastado',sub,Abonado,Total,'','','','','','','','','','',''//texto derecho
	,$dif1,$total10,$pre_d,$total9,$dif4,'','','','','','','','','','',''//color fondo dual
	,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16//color fondo dual
	,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16//color simple fondo isquierdo
	,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16//color simple fondo derecha
	,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16//color letras isquierda
	,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16//color letras derecha
);
presenta3($type2,hidden_ab,ab_Com,ab,$total9,'total9',$type,5,'left: 290px;',Abonado);
presenta3($type2,hidden_ac,ID_ac,ac,$total10,'total10',$type,5,'',Arrastados);
}

echo$hiden1=input2($type,'hidden_fe','',$_POST[hidden_fe]);
echo$hiden2=input2($type,'hidden_v','',$_POST[hidden_v]);
echo$hiden3=input2($type,'hidden_d','',$_POST[hidden_d]);
echo$hiden4=input2($type,'hidden_c','',$_POST[hidden_c]);
echo$hiden5=input2($type,'hidden_f','',$_POST[hidden_f]);
echo$hiden6=input2($type,'hidden_r','',$_POST[hidden_r]);
echo$hiden7=input2($type,'hidden_g','',$_POST[hidden_g]);
echo$hiden8=input2($type,'hidden_m','',$_POST[hidden_m]);
echo$hiden9=input2($type,'hidden_ab','',$_POST[hidden_ab]);
echo$hiden10=input2($type,'hidden_ac','',$_POST[hidden_ac]);

?>
