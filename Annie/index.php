<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
        <head>
			    <TITLE>Admin </TITLE>
                <META CHARSET="UTF-8"/>
				<LINK REL="STYLESHEET" HREF="estilo.css"        TYPE="TEXT/CSS"/>
				
        </head>
	<body style='color: white;'>
		<?php
			date_default_timezone_set("Mexico/General");
			echo'<form action="" method="POST" enctype="multipart/form-data">'; 
			include_once($_SERVER["DOCUMENT_ROOT"]."/CentroDeProcesos.php");
//login	
			 
			if(empty($_POST['user']))$_POST['user']='';
			if(empty($_POST['pass']))$_POST['pass']='';
			$me1=input2('hidden','user','',$_POST['user'],'','','');
			$me2=input2('hidden','pass','',$_POST['pass'],'','','');
			if(! empty($_POST['user'])) {
				echo$me1;
				echo$me2; 
				//$conexion=login('localhost',$_POST['user'],$_POST['pass']);
				$conexion=$libre_v2->login('localhost',$_POST['user'],$_POST['pass'],'',$phpv);
			}
				//include("../cuentas/login/login2.php");	if ($login=='')		{echo"Error de Carga 'login'";}
			if (empty($conexion))include("login.php");
//login fin
			if (!empty($conexion)){
				$m1='Cuentas';

				$m4='Cerrar Sesion';
				include("menu.php");
				echo$me1;
				echo$me2;
				$conexion=$libre_v2->login('localhost',$_POST['user'],$_POST['pass'],'',$phpv);
				if ($_POST['menu']=='')$_POST['menu']=$m1;
				if($_POST['menu']==$m1){include('Cuentas.php');}
				
			}
			
			echo'</form>';
function login($host,$user,$pass){
        $conexion=mysql_connect($host,$user,$pass);
        //or die("Problema Para Iniciar Secion");
        return $conexion;
}
function input2($type2,$name,$title,$value,$style,$id,$libre){
		if(empty($id))$id='';
		if(empty($style))$style='';
		if(empty($libre))$libre='';
        $d='<input type="'.$type2.'" style="'.$style.'" id="'.$id.'" class="Medio" name="'.$name.'" value="'.$value.'" title="'.$title.'" '.$libre.' >';
        return $d;
}
		
		
		?>
	</body>
</html>
