<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
<?php 
date_default_timezone_set("Mexico/General");
$phpv='php7'	;//vercion de php con que estara trabajando 
$_POST['name_programa']='sistema_cuentas';
echo"	
	<head>
			<title>Cuentas 2.0</title>
			<META CHARSET='UTF-8'/>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>   
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	</head>";
?>
	<body onload='load();'>
		<?php			
		echo'<form action="" method="POST" enctype="multipart/form-data" id="formu1">'; 
			include_once($_SERVER["DOCUMENT_ROOT"]."/Librerias/General/Auto_load.php");
			

			/*
				include_once($_SERVER["DOCUMENT_ROOT"].$libreria."/CentroDeProcesos.php");
				if(empty($estilo_v1)){echo"<LINK REL='STYLESHEET' HREF='../estilo_v1.css' />";$estilo_v1='cargado';}
				#include_once($_SERVER["DOCUMENT_ROOT"]."/login2.php");
				include_once($_SERVER["DOCUMENT_ROOT"].$libreria."/login_tem.php");
				include_once($_SERVER["DOCUMENT_ROOT"].$libreria.'/CentroDeProcesos.php');
			*/
			
			
			if(!empty($conexion)){
				echo"<div style=' min-width: 1000px; position: fixed;background: black;z-index: 1;top: 0px;left: 0px;height: 50px;width: 100%;'>";
					$name='Menu1';
					$v1='Cuentas';
					$v2='Casetas';
					$style=" ";
					echo"<div id='lateral' class='lateral'>";//meni principal
						$script_input=" ";	
						$array=array(
							'memoria'=>array(
								'id'=>'id_I'
							)
						);
						echo $libre_v2->menu('submit',$style,'',$name,$v1,$v2,'','','','','','','','','',$script_input,$array);
					echo"</div>";
					//contenedor login 
					
					echo"<div style='background: #A51C30;position: relative;width: 16vw;height: 5vh;float: right;'>";
					echo"<select name='Soft_version' class='botones_submenu' onChange='envia_formulario();'>";
							echo"<OPTION value='' $set>Version del Cliente</OPTION>";
							//if($_POST[Soft_version]=="Legado")	{$set='selected';}else{$set="";}	echo"<OPTION value='Legado' $set>Legado</OPTION>";
							if($_POST['Soft_version']=="ares")	{$set='selected';}else{$set="";}	echo"<OPTION value='ares' $set>Ares</OPTION>";
							if($_POST['Soft_version']=="annie")	{$set='selected';}else{$set="";}	echo"<OPTION value='annie' $set>Annie</OPTION>";
							if($_POST['Soft_version']=="carmesi")	{$set='selected';}else{$set="";}	echo"<OPTION value='carmesi' $set>Carmesi</OPTION>";
							if($_POST['Soft_version']=="celeste")	{$set='selected';}else{$set="";}	echo"<OPTION value='celeste' $set>Celeste</OPTION>";
						echo"</select >";

					echo"</div>";
				
				echo"</div>";
				#echo"<div style='position: absolute;background: #1f1f1f;top: 60px;left: 2%;right: 2%;bottom: 2%;min-height: 558px;'>";
				echo"<div style='position: absolute;background: #1f1f1f;top: 60px;left: 0%;right: 0%;bottom: .5%;min-height: 569px;'>";
					
					if(!empty($_POST['Soft_version']))
					switch ($_POST['Soft_version']) {
						case 'ares':
							$db='empresa';
							$db_combustible='combustible';
							#if($_POST['Menu1']==$v1){include_once($_SERVER["DOCUMENT_ROOT"].'/Cliente_de_legado_ares/Cuentas.php');}
							if($_POST['Menu1']==$v1){include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/Cuentas.php");}
							//if($_POST['Menu1']==$v2){include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/Casetas/body.php");}
						break;
						case 'annie':
							$db='empresa';
							$db_combustible='combustible';
							if($_POST['Menu1']==$v1){include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/Cuentas.php");}
							if($_POST['Menu1']==$v2){include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/Casetas/body.php");}
						break;
						case 'carmesi':						
							$db='sistema_cuentas_carmesi';
							#$db_combustible='combustible';
							if($_POST['Menu1']==$v1){	
								include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/Cuentas.php");
							}
						break;
						case 'celeste':
							$database='sistema_cuentas_celeste';
							if($_POST['Menu1']==$v1){include_once($_SERVER["DOCUMENT_ROOT"]."/Sistema_Cuentas/$_POST[Soft_version]/body-Manual.php");}
						break;
						
					}
				
			
				echo"</div>";
			}
			echo'</form>';
		?>
	</body>
</html>
