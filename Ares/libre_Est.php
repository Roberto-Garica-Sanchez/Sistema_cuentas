<?php
/*Ejecucion de mysql*/
//$conexion=login('localhost','root','anamaria100');
//$conexion=login('localhost','tcgh','');
db('empresa',$conexion);
$consu1=consulta('choferes'     ,$conexion);
        $consu1_1=consulta('choferes_off',$conexion);
	$consu1_2=consulta('choferes_on',$conexion);
$consu4=consulta('fechas'       ,$conexion);
$consu5=consulta('folio'        ,$conexion);
$consu6=consulta('fletes'       ,$conexion);
$consu7=consulta('viaticos'     ,$conexion);
$consu8=consulta('disel'        ,$conexion);
$consu9=consulta('casetas'      ,$conexion);
$consu10=consulta('facturas'    ,$conexion);
$consu11=consulta('ryr'         ,$conexion);
$consu12=consulta('guias'       ,$conexion);
$consu13=consulta('maniobras'   ,$conexion);
$consu14=consulta('km'          ,$conexion);

$consu16=consulta('fletes_c'    ,$conexion);
$consu17=consulta('viaticos_c'  ,$conexion);
$consu18=consulta('disel_c'     ,$conexion);
$consu19=consulta('casetas_c'   ,$conexion);
$consu20=consulta('facturas_c'  ,$conexion);
$consu21=consulta('ryr_c'       ,$conexion);
$consu22=consulta('guias_c'     ,$conexion);
$consu23=consulta('maniobras_c' ,$conexion);
$consu24=consulta('abo_acu'     ,$conexion);

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
function consulta($tabla,$conexion,$consu_esp)
{
        $consulta="SELECT * FROM ".$tabla;
	if ($consu_esp<>'')$consulta=$consu_esp;
        $consu=mysql_query($consulta,$conexion) or Die  ("Error Al Estableser Comunicasion Con La Tabla '".$tabla."'<br> formu ".$consulta."<br>consu ");
        return $consu;
}
function despliegre_mysql($name,$name2,$consu,$descarga)
{
        $d=$d.'<select class="Medio" name="'.$name.'" >';
        $d=$d.'<OPTION VALUE="'.$name.'">'.$name2.'</OPTION>';
        mysql_data_seek($consu,0);
        while($datos=mysql_fetch_array($consu))
        {       $set="";
                if($datos[$descarga]==$_POST[$name]){$set="selected";}
                $d=$d.'<option value="'.$datos[$descarga].'" '.$set.'>'.$datos[$descarga].'</option>';
        }

        $d=$d.'</select>';
        return $d;
}
function sumas_gene($car,$cho,$fec,$fle,$via,$die,$cas,$fac,$ryr,$gui,$man,$title,$style,$title_fecha,$chofer,$mes,$ano,$m_f,$a_f
,$consu4,$consu5,$consu6,$consu7,$consu8,$consu9,$consu10,$consu11,$consu12,$consu13,$consu14){
echo'<table style="background: #343434; left: 100px; position: absolute; color: white; max-width: 670px;'.$style.'">
	<!--<tr style="background: black;" ><td align="center" colspan="11" bgcolor="aquapink">'.$title.'</td ></tr >-->
	<tr style="background: black;">';
               if($car<>'')echo'<td width="30">Carta    					</td >';
               //if($cho<>'')echo'<td >Chofer 					</td >';
               //if($fec<>'')echo'<td >Fecha 					</td >';
               if($fle<>'')echo'<td width="50" bgcolor="green">		Flet.		</td >';
               if($via<>'')echo'<td width="50" bgcolor="yellowgreen">	viat.   </td >';
               if($die<>'')echo'<td width="50" bgcolor="aquagreen">	Dies.     	</td >';
               if($cas<>'')echo'<td width="50" bgcolor="purple">		Case.   </td >';
               if($fac<>'')echo'<td width="50" bgcolor="orangeaqua">	Fact.   </td >';
               if($ryr<>'')echo'<td width="50" bgcolor="goldgreen">	RYR         </td >';
               if($gui<>'')echo'<td width="50" bgcolor="gold">		Guias       </td >';
               if($man<>'')echo'<td width="50" bgcolor="bluegreen">	Mani.		</td >';
               if($fec<>'')echo'<td width="73">Fecha                            </td >';
	       if($cho<>'')echo'<td >Chofer                                   	    </td >';
echo'   </tr >
	<tr >
		<td  colspan="11">
			<div style="height: 125px; overflow-y: scroll; overflow-x: hidden;">
				<table >';
 		mysql_data_seek($consu5,0);
	        while($dato5=mysql_fetch_array($consu5)){
			include("sincro.php");
			$escri1=0;
			$escri2=0;
			$chof=0;
	                if ((($mes<>'') or($ano<>''))and(($m_f=='')and($a_f==''))){
				if($dato4[M]==$mes){$escri1=1;}else{$escri1=0;}
				if($dato4[A]==$ano){$escri2=1;}else{$escri2=0;}
		        }
			if(($m_f<>'') and($a_f<>'')){
				$escri1=0;$escri2=0;
				if(($dato4[A]>=$ano) and($dato4[A]<=$a_f))$escri1=1;
				if(($dato4[M]>=$mes) and($dato4[M]<=$m_f))$escri2=1;
				if(($dato4[M]>=$mes) and($ano<$a_f))$escri2=1;
				if(($dato4[A]>$ano) and($dato4[A]<$a_f))$escri2=1;
				if(($dato4[A]>$ano) and($dato4[M]<=$m_f))$escri2=1;
			}
			if($chofer==$dato5[CHOFER])$chof=1;
			if(($chofer==Chofer) or($chofer==''))$chof=1;
                        $fecha=$dato4[D].'-'.$dato4[M].'-'.$dato4[A];
			if (($chof==1) and ((($mes=='') and($ano=='')) or (($escri1==1)and($escri2==1)))){
			echo' <tr style="background: black;">';
               			if($car<>'') echo'<td >				'.$dato5[ID_G].'	</td >';
               			//if($cho<>'') echo'<td >				'.$dato5[CHOFER].'	</td >';
               			//if($fec<>'') echo'<td >				'.$fecha.'   		</td >';
               			if($fle<>'') {echo'<td width="50" bgcolor="green">		'.$dato6[TOTAL1].'      </td >';$total1=$total1+$dato6[TOTAL1];}
               			if($via<>'') {echo'<td width="50" bgcolor="yellowgreen">	'.$dato7[TOTAL2].'      </td >';$total2=$total2+$dato7[TOTAL2];}
               			if($die<>'') {echo'<td width="50" bgcolor="aquagreen">		'.$dato8[TOTAL3].'	</td >';$total3=$total3+$dato8[TOTAL3];}
               			if($cas<>'') {echo'<td width="50" bgcolor="purple">		'.$dato9[TOTAL4].'	</td >';$total4=$total4+$dato9[TOTAL4];}
              			if($fac<>'') {echo'<td width="50" bgcolor="orangeaqua">		'.$dato10[TOTAL5].'     </td >';$total5=$total5+$dato10[TOTAL5];}
               			if($ryr<>'') {echo'<td width="50" bgcolor="goldgreen">		'.$dato11[TOTAL6].'	</td >';$total6=$total6+$dato11[TOTAL6];}
                        if($gui<>'') {echo'<td width="50" bgcolor="gold">        	'.$dato12[TOTAL7].'     </td >';$total7=$total7+$dato12[TOTAL7];}
                        if($man<>'') {echo'<td width="50" bgcolor="bluegreen">		'.$dato13[TOTAL8].'     </td >';$total8=$total8+$dato13[TOTAL8];}
                        if($fec<>'') echo'<td >                               		'.$fecha.'              </td >';
                        if($cho<>'') echo'<td >                               		'.$dato5[CHOFER].'      </td >';

			echo' </tr >';
			}
		}
echo'                   	</table >
			</div >
                </td >
        </tr >
        <tr style="background: black;">';
               if($car<>'') echo'<td >			</td >';
//               if($cho<>'') echo'<td >		 	</td >';
//               if($fec<>'') echo'<td >[D-M-A] 		</td >';
               if($fle<>'') echo'<td > '.$total1.'   	</td >';
               if($via<>'') echo'<td > '.$total2.'   	</td >';
               if($die<>'') echo'<td > '.$total3.'   	</td >';
               if($cas<>'') echo'<td > '.$total4.'   	</td >';
               if($fac<>'') echo'<td > '.$total5.'   	</td >';
               if($ryr<>'') echo'<td > '.$total6.'   	</td >';
               if($gui<>'') echo'<td > '.$total7.'     	</td >';
               if($man<>'') echo'<td > '.$total8.'     	</td >';
               if($fec<>'') echo'<td >[D-M-A]           </td >';
	       if($cho<>'') echo'<td >                  </td >';
echo'        </tr >
	</tr >
';
echo'</table >';
}
function despieges($name,$name2,$title,$inicio,$fin)
{
        $d=$d.'<select name="'.$name.'" class="Medio" style="width: auto;" title="'.$title.'">';
        $d=$d.'<OPTION VALUE="'.$name2.'">'.$name2.'</OPTION>';
        for($x=$inicio; $x<=$fin; $x++)
        {$set="";
                if($_POST[$name]==$x){$set="selected";}
                $d=$d.'<option value="'.$x.'" '.$set.'>'.$x.'</option>';
        }
        $d=$d.'</select>';
        return $d;
}
function tablero
(
	$size,$style,$title1
	,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$i13,$i14,$i15,$i16,$i17,$i18//texto derecho
	,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18//color fondo dual
	,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16,$tc17,$tc18//color fondo dual
	,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16,$ic17,$ic18//color simple fondo isquierdo
	,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16,$dc17,$dc18//color simple fondo derecha
	,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16,$if17,$if18//color letras isquierda
	,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16,$df17,$df18//color letras derecha
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
		<tr  bgcolor="'.$tc17.'">
				<td bgcolor="'.$ic17.'"><font color="'.$if17.'">        '.$i17.'</font ></td >
				<td bgcolor="'.$dc17.'"><font color="'.$df17.'">        '.$d17.'</font ></td >
		</tr >
		<tr  bgcolor="'.$tc18.'">
				<td bgcolor="'.$ic18.'"><font color="'.$if18.'">        '.$i18.'</font ></td >
				<td bgcolor="'.$dc18.'"><font color="'.$df18.'">        '.$d18.'</font ></td >
		</tr >
	</table >
';
}
/*Estructuras de texto*/
/*
$z=1;
$y=30;
for($x=0; $x<=875;){
 for($y=0; $y<=1000;){
    echo'<div id="hexagon" style="top: '.$x.'px; left: '.$y.'px;"></div >';
    $y=$y+105;
 }
 $x=$x+170;
 $z=$z+1;
 if ($z==5)break;
}
$z=3;
$y=-23;
for($x=85; $x<=1000;){
 for($y=-53; $y<=1000;){
    echo'<div id="hexagon" style="top: '.$x.'px; left: '.$y.'px;"></div >';
    $y=$y+105;
 }
 $x=$x+170;
 $z=$z+1;
 if ($z==7)break;
}*/
?>

