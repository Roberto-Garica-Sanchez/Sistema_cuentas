<?php
db('empresa',$conexion);
$consu1=consulta('choferes'	,$conexion);
$consu2=consulta('placas'	,$conexion);
$consu3=consulta('clientes'	,$conexion);
/*
function login($host,$user,$pass)
{
        $conexion=mysql_connect($host,$user,$pass)or die("Problema Para Iniciar Secion");
        return $conexion;
}*/
function db($base,$conexion)
{
        mysql_select_db($base,$conexion)or die ('Probleamas Para Estableser Comunicasion Con La Base De Datos');
}
function consulta($tabla,$conexion,$col_espe,$espe,$bloque)
{
        $consulta="SELECT * FROM ".$tabla;
	if(($espe<>'') and ($col_espe<>'') and ($bloque<>$_POST[$espe])){$consulta="SELECT * FROM ".$tabla." WHERE $col_espe='$_POST[$espe]'";}
	$consu=mysql_query($consulta,$conexion)	or Die	("Error Al Estableser Comunicasion Con La Tabla '".$tabla."'<br>formu".$consulta."<br>consu");
        return $consu;
}
function Escribe($conexion,$tabla,$var1)
{
		$gra=Grava($tabla,$var1);
		MYSQL_QUERY($gra,$conexion)or die('La tabla '.$tabla.' A tenido Problamas Para Gravar'.$gra);
}
function Grava($tabla,$var1)
{
	$tabla1="choferes";
	$tabla2="placas";
	$tabla3="clientes";
	$tabla4="choferes_on";
	if ($tabla==$tabla1)$grava="INSERT INTO ".$tabla1." (Nombre_Ch,Edad,Direccion) 		
    VALUE	('". ucfirst($_POST[Nombre])."','$_POST[edad]','$_POST[direcciones]')";
	if ($tabla==$tabla2)$grava="INSERT INTO ".$tabla2." (Placas,Marca,Modelo,N_eco,Color) 	
    VALUE	('". ucfirst($_POST[placas])."','$_POST[marca]','$_POST[modelo]','$_POST[n_e]','$_POST[color]')";
	if ($tabla==$tabla3)$grava="INSERT INTO ".$tabla3." (Nombre_Cl,Fecha_re,Destino) 	
    VALUE	('". ucfirst($_POST[Nombre])."','$_POST[Registro]','$_POST[Destino]')";
	if ($tabla==$tabla4)$grava="INSERT INTO ".$tabla4." (Nombre_Ch)          		
    VALUE   ('". ucfirst($_POST[Nombre])."')";
return $grava;
}
function compro($compro,$tabla,$var1,$conexion)
{
	$c=1;
	$consu=consulta($tabla,$conexion);
	mysql_data_seek($consu,0);
        while($datos=mysql_fetch_array($consu))
	{
	if(($datos[$var1]==$compro)and($compro<>''))
	{$c=0;break;}
	}
	return $c;
}
function delete($tabla)
{
	if ($tabla==choferes)	{$delete="DELETE FROM ".$tabla."  WHERE Nombre_Ch='$_POST[opciones1]'";}
	if ($tabla==placas)	{$delete="DELETE FROM ".$tabla."  WHERE Placas='$_POST[opciones2]'";}
    if ($tabla==clientes)	{$delete="DELETE FROM ".$tabla."  WHERE Nombre_Cl='$_POST[opciones3]'";}
	MYSQL_QUERY($delete);
}/*
function input2($type2,$name,$title,$value,$style,$id,$max)
{
        $d='<input type="'.$type2.'" style="'.$style.'" id="'.$id.'" class="Medio" name="'.$name.'" value="'.$value.'" title="'.$title.'" maxlength="'.$max.'">';
        return $d;
}*/
function tablero(
	$size,$style,$title1
	,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$i13,$i14,$i15,$i16//texto derecho
	,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16//color fondo dual
	,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16//color fondo dual
	,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16//color simple fondo isquierdo
	,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16//color simple fondo derecha
	,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16//color letras isquierda
	,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16//color letras derecha
)
{
echo'	<table border="'.$size.'" id="conte-dere" style="'.$style.'">
		<tr  ><td colspan="2" align="center"><font color="'.$tf.'">'.$title1.'</font ></td ></tr >
                <tr  bgcolor="'.$tc1.'">
                        <td bgcolor="'.$ic1.'"><font color="'.$if1.'"> '.$i1.'</font ></td >
                        <td bgcolor="'.$dc1.'"><font color="'.$df1.'"> '.$d1.'</font ></td >
                </tr >
		<tr  bgcolor="'.$tc2.'">
			<td bgcolor="'.$ic2.'"><font color="'.$if2.'">	'.$i2.'</font ></td >
			<td bgcolor="'.$dc2.'"><font color="'.$df2.'">	'.$d2.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc3.'">
			<td bgcolor="'.$ic3.'"><font color="'.$if3.'">	'.$i3.'</font ></td >
			<td bgcolor="'.$dc3.'"><font color="'.$df3.'">	'.$d3.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc4.'">
			<td bgcolor="'.$ic4.'"><font color="'.$if4.'">	'.$i4.'</font ></td >
			<td bgcolor="'.$dc4.'"><font color="'.$df4.'">	'.$d4.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc5.'">
			<td bgcolor="'.$ic5.'"><font color="'.$if5.'">	'.$i5.'</font ></td >
			<td bgcolor="'.$dc5.'"><font color="'.$df5.'">	'.$d5.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc6.'">
			<td bgcolor="'.$ic6.'"><font color="'.$if6.'">	'.$i6.'</font ></td >
			<td bgcolor="'.$dc6.'"><font color="'.$df6.'">	'.$d6.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc7.'">
			<td bgcolor="'.$ic7.'"><font color="'.$if7.'">	'.$i7.'</font ></td >
			<td bgcolor="'.$dc7.'"><font color="'.$df7.'">	'.$d7.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc8.'">
			<td bgcolor="'.$ic8.'"><font color="'.$if8.'">	'.$i8.'</font ></td >
			<td bgcolor="'.$dc8.'"><font color="'.$df8.'">	'.$d8.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc9.'">
			<td bgcolor="'.$ic9.'"><font color="'.$if9.'">	'.$i9.'</font ></td >
			<td bgcolor="'.$dc9.'"><font color="'.$df9.'">	'.$d9.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc10.'">
			<td bgcolor="'.$ic10.'"><font color="'.$if10.'">	'.$i10.'</font ></td >
			<td bgcolor="'.$dc10.'"><font color="'.$df10.'">	'.$d10.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc11.'">
			<td bgcolor="'.$ic11.'"><font color="'.$if11.'">	'.$i11.'</font ></td >
			<td bgcolor="'.$dc11.'"><font color="'.$df11.'">	'.$d11.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc12.'">
			<td bgcolor="'.$ic12.'"><font color="'.$if12.'">	'.$i12.'</font ></td >
			<td bgcolor="'.$dc12.'"><font color="'.$df12.'">	'.$d12.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc13.'">
			<td bgcolor="'.$ic13.'"><font color="'.$if13.'">	'.$i13.'</font ></td >
			<td bgcolor="'.$dc13.'"><font color="'.$df13.'">	'.$d13.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc14.'">
			<td bgcolor="'.$ic14.'"><font color="'.$if14.'">	'.$i14.'</font ></td >
			<td bgcolor="'.$dc14.'"><font color="'.$df14.'">	'.$d14.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc15.'">
			<td bgcolor="'.$ic15.'"><font color="'.$if15.'">	'.$i15.'</font ></td >
			<td bgcolor="'.$dc15.'"><font color="'.$df15.'">	'.$d15.'</font ></td >
		</tr >
                <tr  bgcolor="'.$tc16.'">
                        <td bgcolor="'.$ic16.'"><font color="'.$if16.'">       	'.$i16.'</font ></td >
                        <td bgcolor="'.$dc16.'"><font color="'.$df16.'">       	'.$d16.'</font ></td >
                </tr >
	</table >
';
}
?>
