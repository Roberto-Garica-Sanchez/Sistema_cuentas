<?php
if ($libre_v1=='')	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
if ($libre_v2=='')	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}

if($_POST['Soft_version']=='Ares'){
	if(($_POST['name2set']=="Nuevo")or($_POST['name2set']=="Modificar")){
		echo"<div id='consola_guarda' class='consola_guarda'style=''>";
			echo "<div onclick='ventanas2(consola_guarda);'style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";
			//datos De Configuracion y db
			#$db='empresa';
			$database='sistema_cuentas_ares';
			#$array=descarga_db($db,$conexion,$phpv);
			$Proceso_mysql= new ProcesosMysql($phpv,$conexion);
			$array=$Proceso_mysql->descarga_db		($database,$conexion,$phpv,'');
			$tb=$array['tablas'];
			$colum=$array['columnas'];
			$id=$_POST['Carta1'];
			#$array_deseado	= array('folio','abo_acu','casetas','casetas_c','casetas_via','casetas_c_via','diesel','diesel_c','fechas','fletes','fletes_c','facturas','facturas_c','viaticos','viaticos_c','ryr','ryr_c','guias','guias_c','maniobras','maniobras_c','km');
			/*
			//$array_deseado	= array(km);
			$res_VER_TB2=Verifica_en_tablas2($id,$tb,$array,$array_deseado,$conexion,$phpv);
			Repara_en_tabla($id,'','',$array,$res_VER_TB2,$database,$conexion,$phpv);		//incluse proceso insert	
			Updates($database,$id,$array,$array_deseado,$conexion,$phpv);
			echo"<div style='position: absolute;top: 5px;right: 5px;height: 570px;width: 370px;background: #000000c2;color: white;overflow-y: auto;overflow-x: hidden;'>";
			//---//Actua($id,$conexion,$phpv);
			actua2($id,$conexion,$phpv,1);
			*/
			echo"</div>";
		echo"</div>";
	}
	/*
	if($_POST[name2set]=="Altas"){
		if($_POST[sub1]=="Operadores"){
			if(($_POST[operador]=="Guardar")and(($grava==true)or($guarda==true))){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Nombre_Ch,insert,choferes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
				$res=Ares_v1::genera_sql(Nombre_Ch,update,choferes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
				
			}
			if($_POST[operador]=="Guardar Cambios"){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Nombre_Ch,update,choferes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
				///$resc=$resc.$res[sql];//presenda el sql en la consola asignada 
			}
		}
		if($_POST[sub1]=="Vehiculos"){
			if($_POST[operador]=="Guardar"){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Placas,insert,placas,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
				$res=Ares_v1::genera_sql(Placas,update,placas,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
			if($_POST[operador]=="Guardar Cambios"){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Placas,update,placas,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
			
		}
		if($_POST[sub1]==Clientes){
			if($_POST[operador]=="Guardar"){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Nombre_Cl,insert,clientes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
				$res=Ares_v1::genera_sql(Nombre_Cl,update,clientes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
			if($_POST[operador]=="Guardar Cambios"){
				$systm[diagnostico]=false;
				$res=Ares_v1::genera_sql(Nombre_Cl,update,clientes,$db,$conexion,$phpv,$systm);
				libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
		}
	}
	if($_POST[Menu1]==Combustible){
		if($_POST[name2set]==Ajustes){
			if($_POST[sub1]==Tanques){	
				if($_POST[operador]=="Guardar"){
					$systm[diagnostico]=false;
					$res=Ares_v1::genera_sql(ID_G,insert,tanques,$db_combustible,$conexion,$phpv,$systm);
					libre_v2::ejecuta($conexion,$res[sql],$phpv);
					
					$res=Ares_v1::genera_sql(ID_G,update,tanques,$db_combustible,$conexion,$phpv,$systm);
					libre_v2::ejecuta($conexion,$res[sql],$phpv);
				}
				if($_POST[operador]=="Guardar Cambios"){
					$systm[diagnostico]=false;
					
					$res=Ares_v1::genera_sql(ID_G,update,tanques,$db_combustible,$conexion,$phpv,$systm);
					libre_v2::ejecuta($conexion,$res[sql],$phpv);
				}
			}
			
		}
		if($_POST[name2set]==Estados){
				if($_POST[operador]=="Guardar"){
					$Consola[open]=true;
					$systm[diagnostico]=false;
					$res=Ares_v1::genera_sql(ID_G,insert,despacho,$db_combustible,$conexion,$phpv,$systm);
					libre_v2::ejecuta($conexion,$res[sql],$phpv);
					$res=Ares_v1::genera_sql(ID_G,update,despacho,$db_combustible,$conexion,$phpv,$systm);
					libre_v2::ejecuta($conexion,$res[sql],$phpv);
				}
		}
	}
	*/
}

function auto_sql_insert	($tb,$name_array,$id){
	if ($id=='')		{echo"<br>[auto_sql_insert]Sin id		";	exit;}
	if ($tb=='')		{echo"<br>[auto_sql_insert]Sin tablas tb";	exit;}
	if ($name_array==''){echo"<br>[auto_sql_insert]Sin name_array";	exit;}
	//if($id<>''){//Crea una Celda vacia
		$sql="INSERT INTO ".$tb." (".$name_array[0];
		for($x=1; $x<count($name_array); $x++){
			$sql=$sql.",".$name_array[$x];
		}
		$sql=$sql.") VALUE ('".$id;
		for($x=1; $x<count($name_array); $x++){
			$sql=$sql."','";
		}
		$sql=$sql."')";
	//}
	return $sql;
}
function descarga_db		($db,$conexion,$phpv){//(procesos lento)descarga la informacion(tablas y sus columnas) de una base de datos 
	libre_v1::db('information_schema',$conexion,$phpv);
	$res=libre_v1::consulta('COLUMNS',$conexion,'TABLE_SCHEMA',$db,$orde,$dire,$phpv,$buscar);
	$tb=array();
	$colum=array();
	while($datos=libre_v1::mysql_fe_ar($res,$phpv)){
		$add=true;
		//busca un conjunto de tablas
		for($x=0; $x<=count($tb); $x++){//busca si existe el id
			if($tb[$x]==$datos['TABLE_NAME']){$add=false;}
		}
		//crear una nueva secuencia de arrays para una tabla/columnas
		if($add==true){//añade si no existe
			$tb[]=$datos['TABLE_NAME'];
			$colum[$datos['TABLE_NAME']]=array();
		}
		//Almacena las columnas de las tablas 
		for($x=0; $x<=count($tb); $x++){				
			if($tb[$x]==$datos['TABLE_NAME']){
				$colum[$datos['TABLE_NAME']][]=$datos['COLUMN_NAME'];
			}
		}
	}
	libre_v1::db($db,$conexion,$phpv);
	$res			= array(
	"version"	=> "descarga_db",
	"tablas"	=> $tb,
	"columnas"	=> $colum
	);
	return $res;
}
function ver_db				($tb,$colum,$array){
	if($array<>""){
		$tb=$array[tablas];
		$colum=$array[columnas];
	}
	for($x=0; $x<count($tb); $x++){
		
		echo"<br>";
		echo libre_v1::input2(text,"","",$tb[$x],"width: 50px; margin: 0px .5px; font-size: 10px; text-align: center; ");
		echo libre_v1::input2(text,"","",count($colum[$tb[$x]]),"width: 50px; margin: 0px .5px; font-size: 10px; text-align: center;");
		for($y=0; $y<count($colum[$tb[$x]]); $y++){
			echo libre_v1::input2(text,"","",$colum[$tb[$x]][$y],"width: 50px; margin: 0px .5px; font-size: 10px; text-align: center;");
		}
	}			
}
function Verifica_en_tablas	($id,$tb,$conexion,$phpv){	
		if($tb=='')$tb= array(
		folio,
		abo_acu,
		casetas,
		casetas_c,
		casetas_via,
		casetas_c_via,
		disel,
		disel_c,
		fechas,
		fletes,
		fletes_c,
		facturas,
		facturas_c,
		viaticos,
		viaticos_c,
		ryr,
		ryr_c,
		guias,
		guias_c,
		maniobras,
		maniobras_c,
		km,
		);
	
	for($x=0; $x<=21; $x++){
		
		$res= Verifica_existe($id,$tb[$x],$conexion,$phpv);
		if($res==0){Echo"id: $id  tabla:  $tb[$x]   reparar";}
		
	}	

}
function Verifica_en_tablas2($id,$tb,$array,$array_deseado,$conexion,$phpv){//verifica en todas las tabla que exista. si no devulve un array con la tablas que no existen 
	echo"<div style='position: relative;background: #000000c2;margin: 1px 5px;left: 0px;width: 805px;padding: 5px;height: 180px;overflow-y: auto; overflow-x: hidden;'>";
	if($_POST[name2set]==Nuevo)		echo libre_v1::input2(text,'','',"Verificando Disponiblilidad",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
	if($_POST[name2set]==Modificar)	echo libre_v1::input2(text,'','',"Verificando Estado",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
	if($tb==''){
		if($array[version]=="descarga_db"){//compatibilidad con [descarga_db]
			$tb=$array[tablas];
			$colum=$array[columnas];
		}
	}
	if ($conexion=="") 	{echo"[Verifica_en_tablas2]Sin Conexion ";	exit;}
	if ($phpv=="")		{echo"[Verifica_en_tablas2]Sin Version	";	exit;}
	if ($id=='')		{echo"[Verifica_en_tablas2]Sin id		";	exit;}
	if ($tb=='')		{echo"[Verifica_en_tablas2]Sin tablas tb";	exit;}
	$array_error=array();
	$array_bien=array();
	for($x=0; $x<count($tb); $x++){
		$deseado=false;
		for($y=0; $y<count($array_deseado); $y++){//ciclo para ver si esta tabla es una de las que se quiere revisar 
			if($tb[$x]==$array_deseado[$y]){$deseado=true; break;}
		}
		if($deseado==true){							//si la tabla es para verificar 
			$res = Verifica_existe($id,$tb[$x],$conexion,$phpv);		
			if($_POST[name2set]==Nuevo){
				echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
				if($res==0){
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
				}
				if($res==1){
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"X",'background: #34374b; color: #ff0000;text-align: center;width: 50px;margin: 0px .5px;');
				}
				echo"</div>";
			}
			if($_POST[name2set]==Modificar){
				echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
				if($res==1){
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
				}
				if($res==0){
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"X",'background: #34374b; color: #ff0000;text-align: center;width: 50px;margin: 0px .5px;');
				}
				echo"</div>";
			}
			if($_POST[name2set]==Modificar){
				
			}
			if($res==0){//almacena las datos que tiene errores 
				$array_error[]=$tb[$x];
			}
			if($res==1){//almacena las datos que esten bien 
				$array_bien[]=$tb[$x];
			}
		}
	}
	$array_res= array(
	"version"	=> "Verifica_en_tablas2",
	"mal"	=> $array_error,
	"bien"		=> $array_bien
	);
	if($_POST[name2set]==Nuevo){
		if(count($array_error)<22)	echo libre_v1::input2(text,'','',"Conflicto de Datos Detectada",'width: 100%;text-align: center;margin: 0px 1px;background: #e6b220;color: black;');
	}
	if($_POST[name2set]==Modificar){
		if(count($array_error)<>0)	echo libre_v1::input2(text,'','',"Perdida de Dato Detectada",'width: 100%;text-align: center;margin: 0px 1px;background: #e6b220;color: black;');
	}
	echo"</div>";
	return $array_res;//devulve un array con todas las tabla que faltan de crear 
}
function Verifica_existe	($id,$tb,$conexion,$phpv){	//consulta si exista una elemento en una tabla 	
		$consu	= libre_v1::consulta		($tb,$conexion,ID_G,$id,'',''	,$phpv,'');
		$datos	= libre_v1::mysql_fe_ar		($consu,$phpv);
		if($datos[ID_G]==""){$res=0;}
		if($datos[ID_G]<>""){$res=1;}
		return $res;
}
function Repara_en_tabla	($id,$tb,$colum,$array,$array_deseado,$db,$conexion,$phpv){//Repara las tablas [agrega en cada tabla faltante un nuevo renglon]
	echo"<div style='color: white;position: relative;background: #000000c2;margin: 1px 5px;left: 0px;width: 805px;padding: 5px;height: 180px;overflow-y: auto; overflow-x: hidden;'>";
	//echo"<div style='color: white;position: relative;background: #000000c2;margin: 1px 5px;left: 0px;width: 1203px;padding: 5px;height: 300px;overflow-y: auto;overflow-x: hidden;'>";
	if($_POST[name2set]==Nuevo){	
		echo libre_v1::input2(text,'','',"Abilitando Campos",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
		$array_deseado=$array_deseado[mal];
	}
	if($_POST[name2set]==Modificar){
		echo libre_v1::input2(text,'','',"Correcion De Errores",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
		$array_deseado=$array_deseado[mal];
	}
	if($array[version]=="descarga_db"){//compatibilidad con [descarga_db]
		if($tb=='')		$tb=$array[tablas];
		if($colum=='')	$colum=$array[columnas];
	}
	if ($array_deseado=="") {echo"[Repara_en_tabla] Sin 'array_deseado' ";	exit;}
	if ($conexion=="") 		{echo"[Repara_en_tabla] Sin Conexion ";	exit;}
	if ($phpv=="")			{echo"[Repara_en_tabla] Sin Version	";	exit;}
	if ($id=='')			{echo"[Repara_en_tabla] Sin id		";	exit;}
	if ($tb=='')			{echo"[Repara_en_tabla] Sin tablas tb";	exit;}
	
	$datos_Systm[datos_mysql]	= descarga_db		($db,$conexion,$phpv);	//descarga los datos de mysql
	$systm[diagnostico]=false;
	for($x=0; $x<count($tb); $x++){
		$deseado=false;
		for($y=0; $y<count($array_deseado); $y++){//ciclo para ver si esta tabla es una de las que se quiere revisar 
			
			if($tb[$x]==$array_deseado[$y]){$deseado=true;}
		}
		if($deseado==true){
			if($_POST[name2set]==Nuevo){
			$res=Ares_v1::genera_sql(ID_G,insert,$tb[$x],$db,$conexion,$phpv,$systm,'',$datos_Systm);
			libre_v2::ejecuta($conexion,$res[sql],$phpv);
			$res=Ares_v1::genera_sql(ID_G,update,$tb[$x],$db,$conexion,$phpv,$systm,'',$datos_Systm);
			libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
			
			if($_POST[name2set]==Modificar){
			//$res=Ares_v1::genera_sql(ID_G,update,$tb[$x],$db,$conexion,$phpv,$systm,'',$datos_Systm);
			//libre_v2::ejecuta($conexion,$res[sql],$phpv);
			}
			//-- post_actualizacion---
			//echo"<br>". $res=auto_sql_insert($tb[$x],$colum[$tb[$x]],$id);
			//libre_v2::ejecuta($conexion,$res,$phpv);// crea el renglon faltante 
			//if($_POST[name2set]==Modificar)libre_v2::ejecuta($conexion,$res,$phpv);// crea el renglon faltante 
					
			if($_POST[name2set]==Nuevo){
				echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
				echo"</div>";
			}
			if($_POST[name2set]==Modificar){
				echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
					echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
					echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
				echo"</div>";
			}
			
		}
	}
	$array_res= array(
	"version"	=> "Verifica_en_tablas2",
	"mal"		=> $array_error,
	"bien"		=> $array_bien
	);
	echo"</div>";
	return $array_res;
}
function Updates			($db,$id,$array,$array_deseado,$conexion,$phpv){
	echo"<div style='position: relative;background: #000000c2;margin: 1px 5px;left: 0px;width: 805px;padding: 5px;height: 180px;overflow-y: auto; overflow-x: hidden;'>";
	echo libre_v1::input2(text,'','',"Proceso De Guardado",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
	echo"<br>";
	//verificacion de arranque
	$close=false;
	if($db=="")					{echo"<br>[Updates] sin DB ";$close=true;}
	if($id=="")					{echo"<br>[Updates] sin ID ";$close=true;}
	if($array=="")				{echo"<br>[Updates] sin ARRAY ";$close=true;}
	if($array_deseado=="")		{echo"<br>[Updates] sin ARRAY DESEADO";$close=true;}
	if($conexion=="")			{echo"<br>[Updates] sin CONEXION";$close=true;}
	if($phpv=="")				{echo"<br>[Updates] sin PHPV";$close=true;}
	if($close==true){exit;}
	//configuraciones
	if($array[version]=="descarga_db"){//compatibilidad con [descarga_db]
		if($tb=='')		$tb=$array[tablas];
		if($colum=='')	$colum=$array[columnas];
	}
	if($tb=="")					{echo"<br>[Updates] sin TB";$close=true;}
	if($colum=="")				{echo"<br>[Updates] sin COLUM";$close=true;}
	if($close==true){exit;}
	$datos_Systm[datos_mysql]	= descarga_db		($db,$conexion,$phpv);	//descarga los datos de mysql
	$systm[diagnostico]=false;	
	
	for($x=0;$x<count($tb); $x++){//presenta todas la tablas 
		$tabla_actual=$tb[$x];
		$deseado=false;
		for($y=0; $y<count($array_deseado); $y++){//ciclo para ver si esta tabla es una de las que se quiere revisar 
			if($tabla_actual==$array_deseado[$y]){$deseado=true;}
		}
		if($deseado==true){	
			echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
			echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
			echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
			//descarga datos de la tabla actual
			 
			$columnas=$colum[$tabla_actual];//descarga las colunas de la tabla
			$dato_traductor=tablas_v2::info($db,$tabla_actual);
			$array_exencion=$dato_traductor[none];		
			
			$tipo_traducion=$dato_traductor[tradu];
			$array_traductor=$dato_traductor[name];
			//echo libre_v1::input2(text,'','',"Colunas",'margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',count($columnas),'margin: 0px .5px;');
			//echo"<br>";	
			//echo libre_v1::input2(text,'','',"Colunas tradu",'margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',count($array_traductor),'margin: 0px .5px;');
			//echo"<br>";	
			//echo libre_v1::input2(text,'','',"Tipo De tradu",'margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',$tipo_traducion,'margin: 0px .5px;');
			//echo"<br>";	
			//echo libre_v1::input2(text,'','',"Col"			,' width: 70px;margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',"Val"			,' width: 70px;margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',"Col tradu"	,' width: 70px;margin: 0px .5px;');
			//echo libre_v1::input2(text,'','',"Val tradu"	,' width: 70px;margin: 0px .5px;');
			//echo"<br>";
			for($y=0; $y<count($columnas);$y++){//presnta las colunas de la tabla
				$columna_actual=$columnas[$y];
				if($tipo_traducion=="auto"){
					//echo libre_v1::input2(text,'','',$array_traductor[$y]			,' width: 70px;margin: 0px .5px;');
					//echo libre_v1::input2(text,'','',$_POST[$array_traductor[$y]]	,' width: 70px;margin: 0px .5px;');
				}
				if($tipo_traducion=="manual"){					
					$columna_actual_tradu=$array_traductor[$columna_actual];
					//echo libre_v1::input2(text,'','',$columna_actual_tradu			,' width: 70px;margin: 0px .5px;');
					//echo libre_v1::input2(text,'','',$_POST[$columna_actual_tradu]	,' width: 70px;margin: 0px .5px;');
				}
			}
			//PROCESO UPDATE
			
			//$sql=array_update($id,ID_G,$tabla_actual,$columnas,$array_traductor,$tipo_traducion,$array_exencion);
			//if($tabla_actual=="casetas_via")echo$sql;
			//libre_v2::ejecuta($conexion,$sql,$phpv);
					
			$res=Ares_v1::genera_sql(ID_G,update,$tb[$x],$db,$conexion,$phpv,$systm,'',$datos_Systm);
			libre_v2::ejecuta($conexion,$res[sql],$phpv);
			echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
			echo"</div>";
			
		}
	}
	echo"</div>";
}
function Update_en_tabla	($db,$id,$tb,$array,$array_traductor,$conexion,$phpv){//function muerta
	//informacion operativa 
	//este bloque se encarga de prosesar solamente la informacion y variables de una sola tabla 
	//verificacion de arranque
	
	$close=false;
		if($db=="")					{echo"<br>[Update_en_tabla] sin DB ";$close=true;}
		if($id=="")					{echo"<br>[Update_en_tabla] sin ID ";$close=true;}
		if($array=="")				{echo"<br>[Update_en_tabla] sin ARRAY ";$close=true;}
		if($array_deseado=="")		{echo"<br>[Update_en_tabla] sin ARRAY DESEADO";$close=true;}
		//if($array_traductor=="")	{echo"<br>[Update_en_tabla] sin ARRAY TRADUCTOR";$close=true;}
		if($conexion=="")			{echo"<br>[Update_en_tabla] sin CONEXION";$close=true;}
		if($phpv=="")				{echo"<br>[Update_en_tabla] sin PHPV";$close=true;}
		if($close==true){exit;}
	//configuraciones 
	libre_v1::db($db,$conexion,$phpv);
	$array_traductor=tablas_v1::info($db,$tb);
	
}
function array_update($id,$name_id,$tb,$array_name,$array_value,$tipo,$array_exencion){
	//verificacion de arranque
	//añadir execiones 
	//for($x=0;$x=<count($array_value))
		
	$close=false;	
	if($id=="")					{echo"<br>[array_update] sin ID ";$close=true;}
	if($name_id=="")			{echo"<br>[array_update] sin NAME_ID ";$close=true;}
	if($array_name=="")			{echo"<br>[array_update] sin ARRAY NAME ";$close=true;}
	if($array_value=="")		{echo"<br>[array_update] sin ARRAY VALUE";$close=true;}
	if($close==true){exit;}
	//
	if($array_value[version]=="tablas_v2::info"){//compatibilidad
		$tipo=			$array_value[tradu];
		$array_value=	$array_value[name];
	}
	if($tipo=="auto"){
		//verifica que el id exista en el array_name 
		$igual=false;
		for($x=0; $x<count($array_name); $x++){
			if($array_name[$x]==$name_id){$igual=true; break;}
		}
		if($igual==false){echo"<br>[array_update] sql_id($name_id) no coincide con el sql_principal($array_name)";exit;}
		
	}
	if($tipo=="manual"){
		
	}
	if(count($array_name)<>count($array_value)){//verifica que el array_name se igual de largo que el array_ value
		echo"<br>[array_update] Diferencia entre los array de name(".count($array_name).") y value ".count($array_value);
	}
	if(count($array_name)<>count($array_exencion)){//verifica que el array_name se igual de largo que el array_ value
		echo"<br>[array_update] Diferencia entre los array de exencion(".count($array_exencion).") y value ".count($array_value);
	}
	if($tipo=="auto"){
		$res="UPDATE $tb SET ".$array_name[0]."='".$_POST[$array_value[0]]."'";
			for($x=1; $x<count($array_name); $x++){
			if($array_exencion[$x]<>1){
				$res=$res.",".$array_name[$x]."='".$_POST[$array_value[$x]]."'";
			}
		}	
		$res=$res." WHERE $name_id='$id'";
	}
	
	if($tipo=="manual"){
		$res="UPDATE $tb SET ".$array_name[0]."='".$_POST[$array_value[$array_name[0]]]."'";
		for($x=1; $x<count($array_name); $x++){
			if($array_exencion[$array_name[$x]]<>1){
				$res=$res.",".$array_name[$x]."='".$_POST[$array_value[$array_name[$x]]]."'";
			}
		}	
		$res=$res." WHERE $name_id='$id'";
		
	}
	return $res;
}
function actua2($carta,$conexion,$phpv,$inteface){
	echo libre_v1::input2(text,'','',"Actualizando Cuentas Vinculadas($carta)",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
	
	//datos de la cueta actual 
	$consu24_actua		= libre_v1::consulta(abo_acu,$conexion,ID_G,$carta,'','',$phpv,'','');//descarga los datos de la cuenta actual 
	$abo_acu_actua		= libre_v1::mysql_fe_ar($consu24_actua,$phpv);//empaqueta los datos 
	//datos en la cuenta arrastrada 
	$consu24_arras		= libre_v1::consulta(abo_acu,$conexion,ID_G,$abo_acu_actua[add_en],'','',$phpv,'','');//descarga los datos de la cuenta actual 
	$abo_acu_arras		= libre_v1::mysql_fe_ar($consu24_arras,$phpv);//empaqueta los datos 
	//RECALCULACION DE 
	for($x=1; $x<=5; $x++){$N="ac".$x;$total_acu=$total_acu+$abo_acu_actua[$N];}//calcula total acu_actual 
	for($x=1; $x<=5; $x++){$N="ab".$x;$total_ab=$total_ab+$abo_acu_actua[$N];}//calcula total acu_actual 
	$dif1=$abo_acu_actua[dif1];	//valor actual 
	
	$total_recalculado=round($dif1+$total_acu+$total_ab,2);//recalculado 
	 
	if($total_recalculado==$abo_acu_actua[Total_Total]){$style_total_recalculado="background: green;";}else{//si existe diferencia
		$actua_saldos=1;
		$style_total_recalculado="background: red;";
	}
	$calculo_dif=$abo_acu_actua[Total_Total]-$total_recalculado;
	//correcion 
	
	if($abo_acu_actua[add_en]==""){$estado2="Libre";}else{$estado2=$abo_acu_actua[add_en];}
	if($estado2<>"Libre"){//revisa si esta vinculado
		for($x=1; $x<=5; $x++){//busca la posicion del vinculo entre actual y arrastrante
			$N1="ID_ac".$x;
			$N2="ac".$x;
			if($abo_acu_arras[$N1]==$carta){$posicion=$N1;break;}
		}
		if($abo_acu_arras[$N2]==$abo_acu_actua[Total_Total]){$totales_dif=0;}else{$totales_dif=1;}//detecta si hay diferencia entre actual y arrastrado
		if($totales_dif==1){$style_estado1="background: red;";$estado1="Diferencia de saldos";}//interfacez
		if($totales_dif==0){$style_estado1="background: green;";$estado1="Bien";}//indica el estado el vinculo 
	}
	if($actua_saldos==1){
		$sql=libre_v2::espe_tab_update	(abo_acu,"ID_G",$carta,Total_Total,$total_recalculado);//actualizar saldo total_total en la cuenta actual 
		libre_v2:: ejecuta($conexion,$sql,$phpv);		
		if($estado2<>Libre){
			$sql=libre_v2::espe_tab_update	(abo_acu,"ID_G",$estado2,$N2,$total_recalculado);//actualiza en la cuenta arrastrada 
			libre_v2:: ejecuta($conexion,$sql,$phpv);
		}
		$estado3="En Correcion";
	}
	
	if($inteface=="1"){
		echo libre_v1::input2(text,'','',Actual);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Total Final Registrado ");
		echo libre_v1::input2(text,'','',$abo_acu_actua[Total_Total],"background: orange;");
		echo"<br>";
		echo libre_v1::input2(text,'','',"Actual ");
		echo libre_v1::input2(text,'','',$dif1);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Total Acumulado");
		echo libre_v1::input2(text,'','',$total_acu);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Total Abono");
		echo libre_v1::input2(text,'','',$total_ab);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Total Recalculado");
		echo libre_v1::input2(text,'','',$total_recalculado,$style_total_recalculado);
		if($estado3<>"")echo libre_v1::input2(text,'','',$estado3,"background: #3fff00");
		
		echo"<br>";
		echo libre_v1::input2(text,'','',"dif Recalculado");
		echo libre_v1::input2(text,'','',$calculo_dif);
		echo"<br>";
		echo"<div style='background: #005aff;width: 220px; padding: 5px 0px 5px 5px;'>";
		echo libre_v1::input2(text,'','',"Arrastrada en: $estado2",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
		echo"<br>";
		echo libre_v1::input2(text,'','',"Arrastrada en: ");
		echo libre_v1::input2(text,'','',$estado2);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Posicion en: ");
		echo libre_v1::input2(text,'','',$N1);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Total arrastrado: ");
		echo libre_v1::input2(text,'','',$abo_acu_arras[$N2]);
		echo"<br>";
		echo libre_v1::input2(text,'','',"Estado De Vinculo: ");
		echo libre_v1::input2(text,'','',$estado1,$style_estado1);
		echo"</div>";
		//verifica estado de cuenta 
		//repara la cuenta si  esta mal
	}
	if($abo_acu_actua[add_en]<>"")actua2($abo_acu_actua[add_en],$conexion,$phpv,$inteface);
	
}
function Actua($carta,$conexion,$phpv){
	$close=false;
	if ($conexion==''){echo"<br>No Hay Conexion [Actua]";$close=true;}
	if($close==true){exit;}
	echo libre_v1::input2(text,'','',"Actualizando Cuentas Vinculadas($carta)",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
	$consu24=libre_v1::consulta(abo_acu,$conexion,ID_G,$carta,'','',$phpv,'','');//descarga los datos de la cuenta actual 
	$c0='';
	$c0=libre_v1::mysql_fe_ar($consu24,$phpv,"Actua->busca add_en");//enpaqueta los datos 
	$fec_fin=$_POST[A_r].libre_v1::zero($_POST[M_r]).libre_v1::zero($_POST[D_r]);
	echo "<br>";
	if($c0[add_en]=='')echo"<br>Arrastrada en: Libre";
	if($c0[add_en]<>''){//si existe un vinvulo re-calcula valres 	$c0[add_en]
		echo"<br>Arrastrada en: $c0[add_en]";
		//actualiza el total actual en la cuenta en la que esta siendo arrastrada
		//$consu=libre_v1::consulta('abo_acu',$conexion,ID_G,$c0);
		$consu1=libre_v1::consulta(abo_acu,$conexion,ID_G,$c0[add_en],'','',$phpv,'','');//Descarga la cuenta donde esta siendo arrastrada
		$c1=libre_v1::mysql_fe_ar		($consu1,$phpv,"");
		echo"<br>Total: ".$c1=$c1[Total_Total];
		for($x=1; $x<=5; $x++){
			$N1=ID_ac.$x;
			$N2=ac.$x;
			$consu2=libre_v1::consulta(abo_acu,$conexion,ID_G,$c0[add_en],'','',$phpv,'','');//Descarga la cuenta donde esta siendo arrastrada
			$c2=libre_v1::mysql_fe_ar		($consu2,$phpv,"");
			$consu3=libre_v1::consulta(abo_acu,$conexion,ID_G,$c2[$N1],'','',$phpv,'','');//Descarga la cuenta donde esta siendo arrastrada
			$c3=libre_v1::mysql_fe_ar		($consu3,$phpv,"Actua->busca IDac");
			echo"<br> $N1: ". $c2[$N1].	" -> ". $c2[$N2];
			echo"<br> ID : ". $c2[$N1].	" -> ". $c2[$N2];
			/*if ($c2<>''){
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
					}*
				}
			}*/
		}
		
		Actua($c0[add_en],$conexion,$phpv);
	}
	
	
	/*$c0='';
	$c0=libre_v1::compro($carta,ID_G,add_en,$consu24,$conexion);
	$fec_fin=$_POST[A_r].libre_v1::zero($_POST[M_r]).libre_v1::zero($_POST[D_r]);
	IF($c0<>''){
		if ($conexion<>'')$consu24=consulta('abo_acu',$conexion);
		$c1=libre_v1::compro($carta,ID_G,Total_Total,$consu24,$conexion);//total de cuenta actual
		print"Cuenta  : $carta \r";
		print"Saldo   : $c1 \r";
		print"--------------\r";
		print"Arras en: $c0 \r";
		$consu24=libre_v1::consulta('abo_acu',$conexion,ID_G,$c0);//descarga datos de abonos
		for($x=1; $x<=5; $x++){
			$N1=ID_ac.$x;
			$N2=ac.$x;
			$c2=libre_v1::compro($carta,$N1,$N2,$consu24,$conexion);
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
		$consu5=libre_v1::consulta('folio'			   ,$conexion,ID_G,$c0);
		$consu6=libre_v1::consulta('fletes'	           ,$conexion,ID_G,$c0);
		$consu7=libre_v1::consulta('viaticos'	           ,$conexion,ID_G,$c0);
		$consu8=libre_v1::consulta('disel'	           ,$conexion,ID_G,$c0);
		$consu9=libre_v1::consulta('casetas'	           ,$conexion,ID_G,$c0);
		$consu10=libre_v1::consulta('facturas'	       ,$conexion,ID_G,$c0);
		$consu11=libre_v1::consulta('ryr'		           ,$conexion,ID_G,$c0);
		$consu12=libre_v1::consulta('guias'	           ,$conexion,ID_G,$c0);
		$consu13=libre_v1::consulta('maniobras'	       ,$conexion,ID_G,$c0);
		
		$total1=libre_v1::compro($c0,ID_G,TOTAL1		,$consu6,$conexion);
		$comi_a=libre_v1::compro($c0,ID_G,comi_ass	,$consu6,$conexion);
		$total2=libre_v1::compro($c0,ID_G,TOTAL2		,$consu7,$conexion);
		$total4=libre_v1::compro($c0,ID_G,TOTAL4		,$consu9,$conexion);
		$total5=libre_v1::compro($c0,ID_G,TOTAL5		,$consu10,$conexion);
		$total6=libre_v1::compro($c0,ID_G,TOTAL6		,$consu11,$conexion);
		$total7=libre_v1::compro($c0,ID_G,TOTAL7		,$consu12,$conexion);
		$total8=libre_v1::compro($c0,ID_G,TOTAL8		,$consu13,$conexion);
		$dif=	libre_v1::compro($c0,ID_G,Difer_1		,$consu5,$conexion);
		$sue=	libre_v1::compro($c0,ID_G,sueldo		,$consu5,$conexion);
		$cac=	libre_v1::compro($c0,ID_G,Totalac		,$consu24,$conexion);
		$cab=	libre_v1::compro($c0,ID_G,Totalab		,$consu24,$conexion);
		$tot=	libre_v1::compro($c0,ID_G,Total_Total	,$consu24,$conexion);
		
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
*/
	}
function calculadora_cuentas($cuenta,$type,$conexion,$phpv,$inteface){
	if($type=="sql"){
		$consu_abo_acu		= libre_v1::consulta	(abo_acu,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_abo_acu		= libre_v1::mysql_fe_ar	($consu_abo_acu,$phpv);									//empaqueta los datos 
		$consu_casetas		= libre_v1::consulta	(casetas,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_casetas		= libre_v1::mysql_fe_ar	($consu_casetas,$phpv);									//empaqueta los datos 
		$consu_casetas_via	= libre_v1::consulta	(casetas_via,$conexion,ID_G,$carta,'','',$phpv,'','');	//descarga los datos de la cuenta actual 
		$datos_casetas_via	= libre_v1::mysql_fe_ar	($consu_casetas_via,$phpv);								//empaqueta los datos 
		$consu_disel		= libre_v1::consulta	(disel,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_disel		= libre_v1::mysql_fe_ar	($consu_disel,$phpv);									//empaqueta los datos		
		$consu_fechas		= libre_v1::consulta	(fechas,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_fechas		= libre_v1::mysql_fe_ar	($consu_fechas,$phpv);		
		$consu_facturas		= libre_v1::consulta	(facturas,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_facturas		= libre_v1::mysql_fe_ar	($consu_facturas,$phpv);								//empaqueta los datos 		
		$consu_fletes		= libre_v1::consulta	(fletes,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_fletes		= libre_v1::mysql_fe_ar	($consu_fletes,$phpv);									//empaqueta los datos 
		$consu_folio		= libre_v1::consulta	(folio,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_folio		= libre_v1::mysql_fe_ar	($consu_folio,$phpv);									//empaqueta los datos 		
		$consu_km			= libre_v1::consulta	(km,$conexion,ID_G,$carta,'','',$phpv,'','');			//descarga los datos de la cuenta actual 
		$datos_km			= libre_v1::mysql_fe_ar	($consu_km,$phpv);										//empaqueta los datos 		
		$consu_maniobras	= libre_v1::consulta	(maniobras,$conexion,ID_G,$carta,'','',$phpv,'','');	//descarga los datos de la cuenta actual 
		$datos_maniobras	= libre_v1::mysql_fe_ar	($consu_maniobras,$phpv);								//empaqueta los datos 		
		$consu_ryr			= libre_v1::consulta	(ryr,$conexion,ID_G,$carta,'','',$phpv,'','');			//descarga los datos de la cuenta actual 
		$datos_ryr			= libre_v1::mysql_fe_ar	($consu_ryr,$phpv);										//empaqueta los datos 		
		$consu_viaticos		= libre_v1::consulta	(viaticos,$conexion,ID_G,$carta,'','',$phpv,'','');		//descarga los datos de la cuenta actual 
		$datos_viaticos		= libre_v1::mysql_fe_ar	($consu_viaticos,$phpv);								//empaqueta los datos 
		
		$total1	=$datos_casetas[TOTAL1];
		$total2	=$datos_casetas[TOTAL2];
		$total2	=$datos_casetas[TOTAL3];
		$total4	=$datos_casetas[TOTAL4];
		$total4_via=$datos_casetas_via[TOTAL];
		$total5	=$datos_casetas[TOTAL5];
		$total6	=$datos_casetas[TOTAL6];
		$total7	=$datos_casetas[TOTAL7];
		$total8	=$datos_casetas[TOTAL8];
		$total9	=$datos_casetas[TOTAL9];
		$total10=$datos_casetas[TOTAL10];
		$comi	=$datos_fletes[comi_ass];
		$Flete_R=$datos_fletes[Flete_R];
		$g_t=$total4+$total5+$total6+$total7+$total8;	//casetas+facturas+ryr+guias+maniobras
		
		$c=$total1*0.15;   
		if($comi<>'')$c=$total1*($comi/100); 			//comicion variada	(para chofer)
		$rete=($c*7.5)/100;								//Isr
		$t_g=   round($g_t+$c,2);						//gatos_total+comision
		$dif1=  round($total2-$t_g+$rete,2);			//viaticos-total_gastos+retencion
		$dif2=  round($total2-$g_t,2);					//viaticos-gatos_total
		$dif3=$dif1+$total10;							//dif1+ acumulado
		$pre_d=$dif1+$total10;							// ??? esta mal ??? repetido con el anterior
		$dif4=$pre_d+$total9;	
		$comi=  round($Flete_R*0.0928,2);		//Flete_Real * 0.0928		
		$t_d_g= round($total3+$t_g+$comi+$total4_via,2);//diesel+total_gatos+comision
		$n_c=   round($Flete_R-$t_d_g,2);		
		$re=    round($Flete_R*0.01,2);			
		$re=    round($n_c/$re,2);
	}
	/*							
	$km_t=	round($_POST[km_f]-$_POST[km_i],2);
	*/
	$res			= array(
		"version"	=> "calculadora_cuentas",
		"g_t"		=> $t_g
	);
	return $res;
}
class Guarda{
	function Verifica_existe	($conexion,$phpv,$Systm_datos,$Systm){	//consulta si exista una elemento en una tabla 	
	
		//$consu	= libre_v1::consulta		($Systm_datos[tb],$conexion,ID_G,$Systm_datos[id],'',''	,$phpv,$Systm[diagnostico]);
		$consu=libre_v2::consulta					($Systm_datos[tb],$conexion,$Systm_datos[name_id],$dato[id],$orde,$dire,$phpv,$buscar,$Systm[ver_sql]);
		$datos	= libre_v1::mysql_fe_ar		($consu,$phpv);
		if($datos[ID_G]==""){$res=0;}//no existe
		if($datos[ID_G]<>""){$res=1;}//si existe
		return $res;
	}
	function busca_en_tabla($conexion,$phpv,$Systm_datos){//verifica en todas las tabla que exista. si no devulve un array con la tablas que no existen 
		
		$function[close]=false;
		if ($conexion=="") 	{echo"<br>[Verifica_en_tablas2]Sin Conexion ";	$function[close]=true;}
		if ($phpv=="")		{echo"<br>[Verifica_en_tablas2]Sin Version	";	$function[close]=true;}
		if ($id=='')		{echo"<br>[Verifica_en_tablas2]Sin id		";	$function[close]=true;}
		if ($name_id=='')	{echo"<br>[Verifica_en_tablas2]Sin name id	";	$function[close]=true;}
		if ($tb=='')		{echo"<br>[Verifica_en_tablas2]Sin tablas tb";	$function[close]=true;}
		if ($db=='')		{echo"<br>[Verifica_en_tablas2]Sin tablas db";	$function[close]=true;}
		if ($function[close]==true){exit;}
		$systm[diagnostico]=true;
		/*
		echo"<div style='position: relative;background: #000000c2; color:white;margin: 1px 5px;left: 0px;width: 805px;padding: 5px;height: 180px;overflow-y: auto; overflow-x: hidden;'>";
		if($_POST[name2set]==Nuevo)		echo libre_v1::input2(text,'','',"Verificando Disponiblilidad",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
		if($_POST[name2set]==Modificar)	echo libre_v1::input2(text,'','',"Verificando Estado",'width: 100%;text-align: center;margin: 0px 1px;background: #102f41;color: white;');
		if($tb==''){
			if($array[version]=="descarga_db"){//compatibilidad con [descarga_db]
				$tb=$array[tablas];
				$colum=$array[columnas];
			}
		}
		$array_error=array();
		$array_bien=array();
		for($x=0; $x<count($tb); $x++){
			$deseado=false;
			for($y=0; $y<count($array_deseado); $y++){//ciclo para ver si esta tabla es una de las que se quiere revisar 
				if($tb[$x]==$array_deseado[$y]){$deseado=true; break;}
			}
			if($deseado==true){							//si la tabla es para verificar 
				$res = Verifica_existe($id,$tb[$x],$conexion,$phpv);		
				if($_POST[name2set]==Nuevo){
					echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
					if($res==0){
						echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
					}
					if($res==1){
						echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',"X",'background: #34374b; color: #ff0000;text-align: center;width: 50px;margin: 0px .5px;');
					}
					echo"</div>";
				}
				if($_POST[name2set]==Modificar){
					echo"<div style='float: left;margin: 1px 1px;background: #ffffffb5;width: 260px;'>";
					if($res==1){
						echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',"OK",'background: #34374b; color: #00ff00;text-align: center;width: 50px;margin: 0px .5px;');
					}
					if($res==0){
						echo libre_v1::input2(text,'','',"Tabla",'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',$tb[$x],'margin: 0px .5px;');
						echo libre_v1::input2(text,'','',"X",'background: #34374b; color: #ff0000;text-align: center;width: 50px;margin: 0px .5px;');
					}
					echo"</div>";
				}
				if($_POST[name2set]==Modificar){
					
				}
				if($res==0){//almacena las datos que tiene errores 
					$array_error[]=$tb[$x];
				}
				if($res==1){//almacena las datos que esten bien 
					$array_bien[]=$tb[$x];
				}
			}
		}
		$array_res= array(
		"version"	=> "Verifica_en_tablas2",
		"mal"	=> $array_error,
		"bien"		=> $array_bien
		);
		if($_POST[name2set]==Nuevo){
			if(count($array_error)<22)	echo libre_v1::input2(text,'','',"Conflicto de Datos Detectada",'width: 100%;text-align: center;margin: 0px 1px;background: #e6b220;color: black;');
		}
		if($_POST[name2set]==Modificar){
			if(count($array_error)<>0)	echo libre_v1::input2(text,'','',"Perdida de Dato Detectada",'width: 100%;text-align: center;margin: 0px 1px;background: #e6b220;color: black;');
		}
		echo"</div>";
		return $array_res;//devulve un array con todas las tabla que faltan de crear */
	}
}
?>
