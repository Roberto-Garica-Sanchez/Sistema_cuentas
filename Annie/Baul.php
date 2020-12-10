<?php
$size=0;
$type=hidden;
$type2=hidden;
include('libre_Bau.php');
if($_POST[confi_dele]==Confirmar){delete();}
if ($_POST[confi_dele_car]==Confirmar){delete_esp(choferes_off,Nombre,$_POST[chofer]);delete_esp(choferes_on,Nombre_Ch,$_POST[chofer]);}
if($_POST[transferir]==Activar){delete_e(choferes_off);$_POST[chofer]='';$consu1_1=consulta('choferes_off',$conexion);}
if(($_POST[CambRevi]<>'')and($_POST[revisado]==1)){edita('folio','0',$_POST[Carta1]); $_POST[Carta]=$_POST[Carta1];}
if(($_POST[CambRevi]<>'')and($_POST[revisado]==0)){edita('folio','1',$_POST[Carta1]); $_POST[Carta]=$_POST[Carta1];}
if ($_POST[Carta]<>''){
$consu5=consulta('folio',$conexion);
include('descarga_cue.php');
}
$type_car=submit;
mysql_data_seek($consu5,0);
while($datos=mysql_fetch_array($consu5))
{
if ($datos[CHOFER]==$_POST[chofer]){$type_car=button;break;}
}
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
	$d14=input($type2,'come');
	$km_t=round($_POST[km_f]-$_POST[km_i],2);
    $d15=input($type2,D_c).'-'.input($type2,M_c).'-'.input($type2,A_c);
if($_POST[revisado]==0){$revisado="Pendiente"; $style="color: pink; border-radius: 5px; background: #787878;";}
if($_POST[revisado]==1){$revisado="Revisado";  $style="color: yellowgreen; border-radius: 5px; background: #787878;";}
	$d16=input(submit,CambRevi,'Cambiar Estado De Cuenta',$revisado,$style).input2(hidden,revisado,'',$_POST[revisado]);
	$i16=input2(submit,dele_cue,'Eliminar Permanentemente La cuenta '.$_POST[Carta1],Eliminar);
if($_POST[dele_cue]==Eliminar)
    {$i16=input2(submit,confi_dele,'Eliminar La Carta P. '.$_POST[Carta1].' [Proceso Sin recuperacion]',Confirmar);$cf16=red;}
	$d17=input2(submit,transferir,'Activar La Carpeta De '.$_POST[chofer].' [Transfiera A Folder]',Activar);
	$d18=input2($type_car,dele_car,'Eliminar Carpeta '.$_POST[chofer].' [Solo Sera Posible si La Carpeta Esta Totalmente Vacia]',Eliminar);
if($_POST[dele_car]==Eliminar)
    {$d18=input2($type_car,confi_dele_car,'Eliminar Carpeta de '.$_POST[chofer].' [Proceso Sin recuperacion]',Confirmar);$cf18=red;}
	$cf17=orange;
tablero(
/*datos tabl*/'0','background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: 220px; left: -1px; color: white;','Cartas Porte<br>'.$title
/*datos isqu*/,'1','2','3','4','Chofer','Placas','Cliente','Salida','Llegada','Flete R.','Kms Inicio','Kms Fin','N°Cuenta','Come.','Registro',$i16,Folder,'Carpeta'
/*datos dere*/,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18
/*fondo dual*/,'',$cf2,$cf3,$cf4,$cf5,$cf6,$cf7,$cf8,$cf9,$cf10,$cf11,$cf12,$cf13,$cf14,'',$cf16,$cf17,$cf18
/*simp. isqu*/,'','','','','','','','','','','','','','','','','',''
/*simp. dere*/,$sd1,$sd2,$sd3,$sd4,$sd5,$sd6,$sd7,$sd8,$sd9,$sd10,$sd11,$sd12,$sd13,$sd14,$sd15,$sd16,$sd17,''
/*letr. isqu*/,'','','','','','','','','','','','','','','','','',''
/*letr. dere*/,'','','','','','','','','','','','','','','','','',''
);
$lista=lista_chofer(submit,chofer,$consu1_1,Nombre,'position: absolute; top: 220px; width: 115px; height: 400px; overflow: scroll; overflow-x:hidden;',$conexion);
echo'
<div style="overflow: scroll; overflow-x:hidden; position: absolute; left: 115px; height: 632px; width: 664px;">
   <table style="" >
	<tr style="background: #836953;">
		<td width="20"></td >
		<td width="175">C.P.</td >
		<td width="">Cliente</td >
		<td width="60">Cuenta</td >
		<td >Estado</td >
		<td >Fecha</td >
		<td >Descripcion</td >
	</tr >';
	$consu5=consulta('folio',$conexion,CHOFER,chofer,chofer);
	mysql_data_seek($consu5,0);
	while($datos=mysql_fetch_array($consu5))
	{
	$revisado="";
	if($datos[Revisado]==0){$revisado="<font color='pink'>Pendiente</font>";}
	if($datos[Revisado]==1){$revisado="<font color='greenyellow'>Revisado</font>";}
	mysql_data_seek($consu4,0);
	while($dato4=mysql_fetch_array($consu4))
	{
		if($dato4[ID_G]==$datos[ID_G])
		{$fecha=$dato4[D].'-'.$dato4[M].'-'.$dato4[A];}
	}
	echo'<tr>
		<td bgcolor="#454545">'.$datos[N_Cuenta].'		</td >
		<td bgcolor="#898989">
		<input type="submit" value="'.$datos[ID_G].'"   name="Carta" class="Medio" style=" width: 40px;">
		<input type="button" value="'.$datos[Carta2].'"	class="Medio" style="width: 40px;">
		<input type="button" value="'.$datos[Carta3].'" class="Medio" style="width: 40px;">
		<input type="button" value="'.$datos[Carta4].'" class="Medio" style="width: 40px;">
		    </td >
		<td bgcolor="#454545"><input type="button" value="'.$datos[CLIENTE].'" 	title="'.$datos[CLIENTE].'" 	class="Medio">	</td >
		<td bgcolor="#898989">'.round($datos[Difer_1]).'	</td >
		<td bgcolor="#454545">'.$revisado.'		</td >
		<td bgcolor="#898989" align="right">'.$fecha.'		</td >
		<td bgcolor="#454545"><input type="button" value="'.$datos[Descripcion].'" title="'.$datos[Descripcion].'" class="Medio"></td >
	     </tr >';
	}
echo'
   </table >
</div >
';
echo$d2=input2($type2,presio_d,'',$_POST[presio_d]);
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
