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
	'Conte_principal'=>'menu_lateral isquierda',
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
	
	if($_POST['Soft_version']=='Carmesi'){	
		if ($_POST['name2set']=='Nuevo')		{include("Nuevo.php");}
		if ($_POST['name2set']=='Folder')		{include("folder2.php");}
		if ($_POST['name2set']=='Modificar')	{include("Nuevo.php");}
		if ($_POST['name2set']=='Altas')		{include("ajuste2.php");}    
		if ($_POST['name2set']=='Reporte')     	{
			$_POST['win_carga']='Reportes';
			include("../windows.php");
		}	
		
	} 
	
?>
