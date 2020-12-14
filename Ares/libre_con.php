<?php 
$hidden_fe=5; $hidden_v=5; $hidden_d=7; $hidden_c=20; $hidden_f=5;
$hidden_r=10; $hidden_g=5; $hidden_m=6; $hidden_ab=5; $hidden_ac=5;
if ($_POST[hidden_fe]==0){$_POST[hidden_fe]=1;}
if ($_POST[hidden_v]==0){$_POST[hidden_v]=1;}
if ($_POST[hidden_d]==0){$_POST[hidden_d]=1;}
if ($_POST[hidden_c]==0){$_POST[hidden_c]=1;}
if ($_POST[hidden_f]==0){$_POST[hidden_f]=1;}
if ($_POST[hidden_r]==0){$_POST[hidden_r]=1;}
if ($_POST[hidden_g]==0){$_POST[hidden_g]=1;}
if ($_POST[hidden_m]==0){$_POST[hidden_m]=1;}
if ($_POST[hidden_ab]==0){$_POST[hidden_ab]=1;}
//$conexion=login('localhost','root','anamaria100');
//$conexion=login('localhost','tcgh','');
db('empresa',$conexion);
$consu1=consulta('choferes'	,$conexion);
$consu4=consulta('fechas'	,$conexion);
$consu5=consulta('folio'	,$conexion);
$consu6=consulta('fletes'	,$conexion);
$consu7=consulta('viaticos'	,$conexion);
$consu8=consulta('disel'	,$conexion);
$consu9=consulta('casetas'	,$conexion);
$consu10=consulta('facturas'	,$conexion);
$consu11=consulta('ryr'		,$conexion);
$consu12=consulta('guias'	,$conexion);
$consu13=consulta('maniobras'	,$conexion);
$consu14=consulta('km'		,$conexion);

$consu16=consulta('fletes_c'	,$conexion);
$consu17=consulta('viaticos_c'	,$conexion);
$consu18=consulta('disel_c'	,$conexion);
$consu19=consulta('casetas_c'	,$conexion);
$consu20=consulta('facturas_c'	,$conexion);
$consu21=consulta('ryr_c'	,$conexion);
$consu22=consulta('guias_c'	,$conexion);
$consu23=consulta('maniobras_c'	,$conexion);
$consu24=consulta('abo_acu' 	,$conexion);
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
function edita($tabla,$var1,$ID_G)
{
	$m="UPDATE ".$tabla." SET Revisado='".$var1."' WHERE ID_G='".$ID_G."'";
	MYSQL_QUERY($m)OR DIE ('ERROR AL Modificar '.$m);
}
function input($type2,$name,$title,$value,$style,$max)
{
	if ($value<>''){$_POST[$name]=$value;}
	if ($max<>''){$max='maxlength="'.$max.'"';}
	$d='<input type="'.$type2.'" style="'.$style.'" class="Medio" name="'.$name.'" value="'.$_POST[$name].'" title="'.$title.'" '.$max.'>';
	if ($type2==hidden)
	{$d=$d.$_POST[$name];}
	return $d;
}
function Presenta1($type2,$Name1,$Name2,$x,$hidden,$title1,$title2,$name_sub1,$name_sub2){
	if(($_POST[$Name1]=='')and($_POST[$hidden]==$x)){$focus1="autofocus";}
	if(($_POST[$Name1]<>'')and($_POST[$hidden]==$x)){$focus1='';$focus2="autofocus";}
	if(($_POST[$Name2]<>'')and($_POST[$hidden]==$x)){$focus2='';$focus1="autofocus";}
	$value1=$_POST[$Name1];
	$value2=$_POST[$Name2];
	$name1=$Name1;
	$name2=$Name2;
	if(($name_sub1<>'')and($type2==submit)){$name1=$name_sub1;}
        if(($name_sub2<>'')and($type2==submit)){$name2=$name_sub2;}
	if(($type2==text)or($type2<>hidden)){
        echo"
        <tr >
            <td >$x</td >
            <td ><input type='".$type2."' title='".$title1."' Class='Medio' ".$focus1." name='".$name1."' value='".$value1."' maxlength='50'>	</td >
            <td ><input type='".$type2."' title='".$title2."' Class='Medio' ".$focus2." name='".$name2."' value='".$value2."' maxlength='10'>	</td >
       	</tr >";
       	}
        if($type2==hidden){
        echo"
        <tr >   
            <td>$x</td>
            <td >".$_POST[$Name1]." </td >
            <td >".$_POST[$Name2]." </td >
        </tr >";
	}
}
function presenta2($hidden,$name1,$name2,$type,$style,$borra,$consu){
    for($x=1; $x<=$_POST[$hidden]; $x++){
            $Name1=$name1.$x;
            $Name2=$name2.$x;
            if(($_POST[$Name1]=='')and($_POST[$Name2]=='')and($_POST[$hidden]>1)){$_POST[$hidden]=$_POST[$hidden]-1;}
    }
	for($x=1; $x<=$_POST[$hidden]; $x++){
		$y=$x+1;
		$Name1=$name1.$x;
        $Name2=$name2.$x;
		$Name3=$name1.$y;
		$Name4=$name2.$y;
		if(($borra<>'')and($_POST[$Name1]==$borra))	{$_POST[$Name1]='';$_POST[$Name2]='';}
		if((($_POST[$Name1]=='')or($_POST[$Name1]=='0'))and($_POST[$Name2]=='')){$_POST[$Name1]=$_POST[$Name3];$_POST[$Name2]=$_POST[$Name4];$_POST[$Name3]='';$_POST[$Name4]='';}
		echo'
            <input type="'.$type.'" class="Medio" name="'.$Name1.'" value="'.$_POST[$Name1].'" style="'.$style.'">
			<input type="'.$type.'" class="Medio" name="'.$Name2.'" value="'.$_POST[$Name2].'" style="'.$style.'">';
		$total=$total+$_POST[$Name2];
	}
	return round($total,2);
}
function presenta3($type2,$hidden,$name1,$name2,$total,$name3,$type,$limite,$style,$title
,$col1,$col2,$title1,$title2,$name_sub1,$name_sub2){
        echo"<table id='viaticos' style='background: #787878;".$style."'>";
        echo"<tr ><td colspan='2'>".$title."              </td ></tr >";
        echo"<tr ><td ></td >";
        if ($col1<>''){echo"<td >".$col1."</td >";}else{echo"<td >Descripcion  </td >";}
        if ($col2<>''){echo"<td >".$col2."</td >";}else{echo"<td >Importe      </td >";}
        echo"</tr >";
        for($x=1; $x<=$_POST[$hidden]; $x++){
            $Name1=$name1.$x;
            $Name2=$name2.$x;
            if($_POST[$Name2]==0)$_POST[$Name2]='';
        	if(($_POST[$Name2]<>'')and($_POST[$hidden]==$x)and($_POST[$hidden]<$limite))$_POST[$hidden]=$_POST[$hidden]+1;
            Presenta1($type2,$Name1,$Name2,$x,$hidden,$title1,$title2,$name_sub1,$name_sub2);
        }
        $d=input($type,$name3,'',$total);
        echo"<tr>
                <td ></td >
                <td >Total     </td >
                <td >".$total."</td >
            </tr>
        </table>";
}

function lista_chofer($type,$name,$consu,$descarga,$style)
{
echo'
<div id="" style="'.$style.'">
	<ul id="menu-list" >';
	if($_POST[$name]<>''){
		echo'<li >'.$d=input2($type,$name,'',$_POST[$name],'width: 207px;',id_I).'</li >';
	}

        mysql_data_seek($consu,0);
        while($datos=mysql_fetch_array($consu))
        {       $set="idI";
                if($datos[$descarga]==$_POST[$name]){$set="id_I";}
		if($datos[$descarga]<>$_POST[$name]){
			echo$d='<li >'.$d=input2($type,$name,'',$datos[$descarga],'width: 207px;',$set).'</li >';
		}
	}
echo'	</ul >
</div >';
        return $d;
}

function dele_pre($tabla)
{
	$delete="DELETE FROM ".$tabla."  WHERE ID_G='$_POST[Carta1]'";
	MYSQL_QUERY($delete);
}
function delete()
{
       	dele_pre(fechas);
        dele_pre(folio);
        dele_pre(fletes);
        dele_pre(viaticos);
        dele_pre(disel);
        dele_pre(casetas);
        dele_pre(facturas);
        dele_pre(ryr);
        dele_pre(guias);
        dele_pre(maniobras);
        dele_pre(km);
        dele_pre(fletes_c);
        dele_pre(viaticos_c);
        dele_pre(disel_c);
        dele_pre(casetas_c);
        dele_pre(facturas_c);
        dele_pre(ryr_c);
        dele_pre(guias_c);
        dele_pre(maniobras_c);
}

function tablero
(
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
