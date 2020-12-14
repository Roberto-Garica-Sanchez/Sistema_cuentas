<?php 


$style="position: absolute;top: 142px;width: 100px;background: #00174cb3;padding: 2px;";
$style='    position: absolute;top: 60px;width: 105px;z-index: 1;';
//echo $libre_v2->menu2(submit,$style,'',sub2,botones_submenu,id_I,Nuevo,Folder,'Arc. Mur.',Modificar,Altas,Reporte,$v7,$v8,$v9,$v10,$v11,' ')	;
$array=array('Operadores','Veiculos','Clientes');
$libre_v2->db('empresa',$conexion,$phpv);	
$consu_choferes=$libre_v2->consulta('choferes',$conexion,'','','Nombre_Ch',0,$phpv,'','');
if(!empty($_POST['descarga_chofer'])){
	$consu=$libre_v2->consulta('choferes',$conexion,'Nombre_Ch',$_POST['descarga_chofer'],'','',$phpv,'','');
	$datos=$libre_v2->mysql_fe_ar($consu,$phpv);
	$_POST['chofer']		= $datos['Nombre_Ch'];
	$_POST['Edad']		= $datos['Edad'];
	$_POST['Direccion']	= $datos['Direccion'];
	$_POST['Celular']		= $datos['Celular'];
}
	$libre_v2->menu3('submit',$style,'','sub1','id_I','','botones_submenu','botone_n',$array,'');
	echo"<div id='general_info' style='background: #05486cab;width: 220px;right: 0px;top: 12px;bottom: 5px;position: absolute;color: white;'>";
		echo"<div id='datos_info'>";
			if($_POST['sub1']=='Operadores'){
				if(empty($style_chofer))$style_chofer='';
				if(empty($style_Edad))$style_Edad='';
				if(empty($style_Direccion))$style_Direccion='';
				if(empty($style_Celular))$style_Celular='';
				
				if(empty($_POST['chofer']))$_POST['chofer']='';
				if(empty($_POST['Edad']))$_POST['Edad']='';
				if(empty($_POST['Direccion']))$_POST['Direccion']='';
				if(empty($_POST['Celular']))$_POST['Celular']='';
				echo $libre_v2->input2('text','','','Operador'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','chofer','',$_POST['chofer']			,$style_chofer."width: 60%",'',"placeholder='Nombre Completo'",'botones_submenu');
				echo $libre_v2->input2('text','','','Edad'						,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Edad','',$_POST['Edad']				,$style_Edad."width: 60%",'','onkeypress="return valida_n(event)"','botones_submenu');
				echo $libre_v2->input2('text','','','Direccion'				,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Direccion','',$_POST['Direccion']	,$style_Direccion."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','','Celular'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Celular','',$_POST['Celular']		,$style_Celular."width: 60%",'','onkeypress="return valida_n(event)"','botones_submenu');		
			}
			if($_POST['sub1']=='Veiculos'){
				if(empty($style_Placas))$style_Placas='';
				if(empty($style_Marca))$style_Marca='';
				if(empty($style_Modelo))$style_Modelo='';
				if(empty($style_N_eco))$style_N_eco='';
				if(empty($style_Color))$style_Color='';
				
				if(empty($_POST['Placas']))$_POST['Placas']='';
				if(empty($_POST['Marca']))$_POST['Marca']='';
				if(empty($_POST['Modelo']))$_POST['Modelo']='';
				if(empty($_POST['N_eco']))$_POST['N_eco']='';
				if(empty($_POST['Color']))$_POST['Color']='';
				echo $libre_v2->input2('text','','','Placas'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Placas','',$_POST['Placas']		,$style_Placas."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','','Marca'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Marca','',$_POST['Marca']		,$style_Marca."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','','Modelo'					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Modelo','',$_POST['Modelo']		,$style_Modelo."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','',"N° Economico"					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','N_eco','',$_POST['N_eco']		,$style_N_eco."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','','Color' 					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Color','',$_POST['Color']		,$style_Color."width: 60%",'',"",'botones_submenu');
			}
			if($_POST['sub1']=='Clientes'){
				if(empty($style_Nombre_Cl))$style_Nombre_Cl='';
				if(empty($style_RFC_Cl))$style_RFC_Cl='';
				if(empty($style_Destino))$style_Destino='';
				
				if(empty($_POST['Nombre_Cl']))$_POST['Nombre_Cl']='';
				if(empty($_POST['RFC_Cl']))$_POST['RFC_Cl']='';
				if(empty($_POST['Destino']))$_POST['Destino']='';
				echo $libre_v2->input2('text','','','Nombre' 					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Nombre_Cl','',$_POST['Nombre_Cl']	,$style_Nombre_Cl."width: 60%",'',"placeholder='Alias'",'botones_submenu');
				echo $libre_v2->input2('text','','','RFC' 						,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','RFC_Cl','',$_POST['RFC_Cl']			,$style_RFC_Cl."width: 60%",'',"",'botones_submenu');
				echo $libre_v2->input2('text','','','Destino' 					,"width: 40%",'',"disabled",'botone_n');
				echo $libre_v2->input2('text','Destino','',$_POST['Destino']		,$style_Destino."width: 60%",'',"",'botones_submenu');
			}
		echo"</div>";
	echo"</div>";
	echo"<div style='position: absolute;top: 0px;bottom: 100px;left: 105px;right: 225px;background: #05486cab;padding: 5px;    '>";
		echo $libre_v2->input2('text','','',$_POST['sub1']					,"width: 100%",'',"disabled",'botone_n');
		if($_POST['sub1']=='Operadores'){
			echo"<div id='list_choferes' style='overflow-y: auto;position: absolute;top: 41px; width: 763px;height: 455px;background: #434343;box-shadow: inset 0px 0px 0px 1px white;'>";
	
			$consu=$libre_v2->consulta('choferes',$conexion,'','','Nombre_Ch',0,$phpv,'','');
			while($datos=$libre_v2->mysql_fe_ar	($consu,$phpv,'')){
				echo $libre_v2->input2('submit','descarga_chofer','',$datos['Nombre_Ch'],"width: 300px;",'',"",'botones_submenu');
				//echo $libre_v2->input2(text,'','',$datos[Nombre_Ch] 					,"width: 250px;",'',"disabled",botone_n);
				echo"<br>";
			}				
			echo"</div>";
		}
		if($_POST['sub1']=='Clientes'){
			echo"<div id='list_Cliente' style='overflow-y: auto;position: absolute;top: 41px; width: 763px;height: 455px;background: #434343;box-shadow: inset 0px 0px 0px 1px white;'>";
			
			$consu=$libre_v2->consulta('clientes',$conexion,'','','Nombre_Cl',0,$phpv,'','');
			$libre_v2->mysql_da_se($consu,0,$phpv);
			while($datos=$libre_v2->mysql_fe_ar	($consu,$phpv,'')){
				echo $libre_v2->input2('submit','descarga_cliente','',$datos['Nombre_Cl'] 					,"width: 300px;",'',"",'botones_submenu');
				//echo $libre_v2->input2(text,'','',$datos[Nombre_Ch] 					,"width: 250px;",'',"disabled",botone_n);
				echo"<br>";
			}				
			echo"</div>";
		}
	echo"</div>";
?>