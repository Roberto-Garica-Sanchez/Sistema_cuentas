<?php 

if (empty($libre_v1))	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
if (empty($libre_v2))	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}

if(empty($libre_v2))$libre_v2= new libre_v2('php7',$conexion);
if(empty($tablas_v2))$tablas_v2= new tablas_v2();
			
#if (empty($estilo)){echo"<LINK REL='STYLESHEET' HREF='../Cliente_de_legado/estilo.css' />";$estilo='cargado';}
if (empty($estilo)){echo"<LINK REL='STYLESHEET' HREF='../estilo.css' />";$estilo='cargado';}
$style='position: absolute;top: 60px;width: 105px;z-index: 1;';
#echo $libre_v2->menu2('submit',$style,'id="sub_menu"','name2set','idI','id_I'	,'Nuevo','Folder','Modificar','Altas','Reporte','','','','','','',' ')	;

$name_menu="name2set";
$elemento_menu=array('Nuevo','Folder','Modificar','Altas');          
$class=array(
	'Conte_princiapal'=>'menu_lateral isquierda',
	'Div_Opcion'=>'lista',
	'marco'=>' ',
	'Boton'=>'',
	'img'=>''
);
$otros_arrays=array(
	'img_activa'=> 'false',
	'img_defaul'=>'../img/defaul.jpg',
	'img'=>array("","",';',"",""),
	'icons'=>array('fas fa-pen','fas fa-folder','fas fa-edit','fas fa-tools'),#<i class="fas fa-file-plus"></i>
	'memoria'=>array('Activa'=>true,'type'=>'hidden')
);
$libre_v5->menu2($name_menu,$elemento_menu,$class,$otros_arrays);					

if(empty($_POST['Soft_version'])){$_POST['Soft_version']="Ares";}

if(empty($_POST['D_i']))$_POST['D_i']='';
if(empty($_POST['M_i']))$_POST['M_i']='';
if(empty($_POST['A_i']))$_POST['A_i']='';
if(empty($_POST['D_f']))$_POST['D_f']='';
if(empty($_POST['M_f']))$_POST['M_f']='';
if(empty($_POST['A_f']))$_POST['A_f']='';
$libre='';
echo $libre_v2->input2('hidden','D_i','',$_POST['D_i'],$style,'',$libre,'','','');
echo $libre_v2->input2('hidden','M_i','',$_POST['M_i'],$style,'',$libre,'','','');
echo $libre_v2->input2('hidden','A_i','',$_POST['A_i'],$style,'',$libre,'','','');

echo $libre_v2->input2('hidden','D_f','',$_POST['D_f'],$style,'',$libre,'','','');
echo $libre_v2->input2('hidden','M_f','',$_POST['M_f'],$style,'',$libre,'','','');
echo $libre_v2->input2('hidden','A_f','',$_POST['A_f'],$style,'',$libre,'','','');
if(empty($_POST['operador']))$_POST['operador']='';
if($_POST['operador']=='Limpiar'){include("limpia.php");}
#echo"<div id='div_centro' style='color: black;width: 1250px;position: relative;overflow: hidden;top: 45px;height: 600px;background: url(../img/8.jpg);margin-right: auto;margin-left: auto;'>";
	
if($_POST['Soft_version']=='Ares'){	
	if ($_POST['name2set']=='Nuevo')		{include("Nuevo.php");}
	if ($_POST['name2set']=='Folder')		{include("folder2.php");}
	#if ($_POST['name2set']=='Arc. Mur.')	{include("Baul.php");}
	//if ($_POST[name2set]==Modificar)	{include("Cambio2.php");}
	if ($_POST['name2set']=='Modificar')	{include("Nuevo.php");}
	if ($_POST['name2set']=='Altas')		{include("ajuste2.php");}    
	if ($_POST['name2set']=='Reporte')     	{
		$_POST['win_carga']='Reportes';
		include("../windows.php");
	}	
	
} 
	
#echo"</div>";

/*
function liinputli($type,$name,$id,$value){
	echo"<li ><input type='submit' name='".$name."' id='".$id."' value='".$value."'> </li>";
}
function sub_menu($style,$name,$name2,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13){
	$id=idI;
	if($_POST[$name]<>''){$_POST[$name2]=$_POST[$name];}
	if($_POST[$name2]==$var1){$id1='id_I';}else{$id1=$id;}
	if($_POST[$name2]==$var2){$id2='id_I';}else{$id2=$id;}
	if($_POST[$name2]==$var3){$id3='id_I';}else{$id3=$id;}
	if($_POST[$name2]==$var4){$id4='id_I';}else{$id4=$id;}
	if($_POST[$name2]==$var5){$id5='id_I';}else{$id5=$id;}
	if($_POST[$name2]==$var6){$id6='id_I';}else{$id6=$id;}
	if($_POST[$name2]==$var7){$id7='id_I';}else{$id7=$id;}
	if($_POST[$name2]==$var8){$id8='id_I';}else{$id8=$id;}
	if($_POST[$name2]==$var9){$id9='id_I';}else{$id9=$id;}
	if($_POST[$name2]==$var10){$id10='id_I';}else{$id10=$id;}
	if($_POST[$name2]==$var11){$id11='id_I';}else{$id11=$id;}
	echo"
	<div id='conte-isqu' style='".$style."'>
		<div id='sub_menu'>
		<input type='hidden' class='Medio' name='".$name2."' value='".$_POST[$name2]."'>
			<ul id='smenu-botones'>";
				liinputli('submit',$name,$id1,$var1);
				liinputli('submit',$name,$id2,$var2);
				liinputli('submit',$name,$id3,$var3);
				liinputli('submit',$name,$id4,$var4);
				liinputli('submit',$name,$id5,$var5);
				liinputli('submit',$name,$id6,$var6);
				liinputli('submit',$name,$id7,$var7);
				liinputli('submit',$name,$id8,$var8);
				liinputli('submit',$name,$id9,$var9);
				liinputli('submit',$name,$id10,$var10);
				liinputli('submit',$name,$id11,$var11);

	echo"	</ul >
		</div >
	</div >
	";
}
*/
?>


<?php 
/*
	if (empty($libre_v1))	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
	if (empty($libre_v2))	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
	$libre_v1= new libre_v1();
	if(empty($libre_v2))$libre_v2= new libre_v2('php7',$conexion);
	$tablas_v2= new tablas_v2();
				
	if (empty($estilo)){echo"<LINK REL='STYLESHEET' HREF='../Cliente_de_legado/estilo.css' />";$estilo='cargado';}
	$style='position: absolute;top: 60px;width: 105px;z-index: 1;';
	echo $libre_v2->menu2('submit',$style,'id="sub_menu"','name2set','idI','id_I','Nuevo','Folder','Arc. Mur.','Modificar','Altas','Reporte','','','','','',' ')	;

	if(empty($_POST['Soft_version'])){$_POST['Soft_version']="Ares";}

	if(empty($_POST['D_i']))$_POST['D_i']='';
	if(empty($_POST['M_i']))$_POST['M_i']='';
	if(empty($_POST['A_i']))$_POST['A_i']='';

	if(empty($_POST['D_f']))$_POST['D_f']='';
	if(empty($_POST['M_f']))$_POST['M_f']='';
	if(empty($_POST['A_f']))$_POST['A_f']='';
	$libre='';
	echo $libre_v2->input2('hidden','D_i','',$_POST['D_i'],$style,'',$libre,'','','');
	echo $libre_v2->input2('hidden','M_i','',$_POST['M_i'],$style,'',$libre,'','','');
	echo $libre_v2->input2('hidden','A_i','',$_POST['A_i'],$style,'',$libre,'','','');

	echo $libre_v2->input2('hidden','D_f','',$_POST['D_f'],$style,'',$libre,'','','');
	echo $libre_v2->input2('hidden','M_f','',$_POST['M_f'],$style,'',$libre,'','','');
	echo $libre_v2->input2('hidden','A_f','',$_POST['A_f'],$style,'',$libre,'','','');
	if(empty($_POST['operador']))$_POST['operador']='';
	if($_POST['operador']=='Limpiar'){include("../Cliente_de_legado_Ares/limpia.php");}
	echo"<div id='div_centro' style='width: 1250px;position: relative;overflow: hidden;top: 45px;height: 600px;background: url(../img/8.jpg);margin-right: auto;margin-left: auto;'>";
	if($_POST['Soft_version']=='Ares'){	
		if ($_POST['name2set']=='Nuevo')		{include("Nuevo.php");}
		if ($_POST['name2set']=='Folder')		{include("folder2.php");}
		if ($_POST['name2set']=='Arc. Mur.')	{include("Baul.php");}
		//if ($_POST[name2set]==Modificar)	{include("Cambio2.php");}
		if ($_POST['name2set']=='Modificar')	{include("Nuevo.php");}
		if ($_POST['name2set']=='Altas')		{include("ajuste2.php");}    
		if ($_POST['name2set']=='Reporte')     	{
			$_POST['win_carga']='Reportes';
			include("../windows.php");
		}	
	} 
	echo"</div>";

	function liinputli($type,$name,$id,$value){
		echo"<li ><input type='submit' name='".$name."' id='".$id."' value='".$value."'> </li>";
	}
	function sub_menu($style,$name,$name2,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13){
		$id=idI;
		if($_POST[$name]<>''){$_POST[$name2]=$_POST[$name];}
		if($_POST[$name2]==$var1){$id1='id_I';}else{$id1=$id;}
		if($_POST[$name2]==$var2){$id2='id_I';}else{$id2=$id;}
		if($_POST[$name2]==$var3){$id3='id_I';}else{$id3=$id;}
		if($_POST[$name2]==$var4){$id4='id_I';}else{$id4=$id;}
		if($_POST[$name2]==$var5){$id5='id_I';}else{$id5=$id;}
		if($_POST[$name2]==$var6){$id6='id_I';}else{$id6=$id;}
		if($_POST[$name2]==$var7){$id7='id_I';}else{$id7=$id;}
		if($_POST[$name2]==$var8){$id8='id_I';}else{$id8=$id;}
		if($_POST[$name2]==$var9){$id9='id_I';}else{$id9=$id;}
		if($_POST[$name2]==$var10){$id10='id_I';}else{$id10=$id;}
		if($_POST[$name2]==$var11){$id11='id_I';}else{$id11=$id;}
		echo"
		<div id='conte-isqu' style='".$style."'>
			<div id='sub_menu'>
			<input type='hidden' class='Medio' name='".$name2."' value='".$_POST[$name2]."'>
				<ul id='smenu-botones'>";
					liinputli(submit,$name,$id1,$var1);
					liinputli(submit,$name,$id2,$var2);
					liinputli(submit,$name,$id3,$var3);
					liinputli(submit,$name,$id4,$var4);
					liinputli(submit,$name,$id5,$var5);
					liinputli(submit,$name,$id6,$var6);
					liinputli(submit,$name,$id7,$var7);
					liinputli(submit,$name,$id8,$var8);
					liinputli(submit,$name,$id9,$var9);
					liinputli(submit,$name,$id10,$var10);
					liinputli(submit,$name,$id11,$var11);

		echo"	</ul >
			</div >
		</div >
		";
	}
*/
?>
