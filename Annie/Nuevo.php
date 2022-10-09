<?php
$libre_v2->db('almacen',$conexion,$phpv);
	$consu_choferes	= 	$libre_v2->consulta	('operadores'	,$conexion	,'','','Nombre'	,'' ,$phpv,'','');
	$consu_placas	= 	$libre_v2->consulta	('unidades'		,$conexion	,'','','Placas'	,''	,$phpv,'','');
	$consu_clientes	= 	$libre_v2->consulta	('clientes'		,$conexion	,'','','Nombre'	,''	,$phpv,'','');

$database='sistema_cuentas_annie';
$tabla='folio';
####Parametros de ajuste para manejo de base de datos 
	$TO_SAVE=array(
		"folio",
		"km",
		"abonos",
		"acumulado",
		"Fletes",
		"Viaticos",
		"Diesel",
		"Casetas",
		"Facturas",
		"RyR",
		"Guias",
		"Maniobras",
		"ViaPass",
			
		"Abonos_C",
		"Acumulado_C",
		"Fletes_C",
		"Viaticos_C",
		"Diesel_C",
		"Casetas_C",
		"Facturas_C",
		"RyR_C",
		"Guias_C",
		"Maniobras_C",
		"ViaPass_C",
	);	
					
	$Sustituto=Array();
	$Sustituto['km']=array(
		'Total_Recorrido'=>'Total_km',
		'KilometrosPorLitro'=>'km_lts'
		);
	$Sustituto['Fletes']=array(
		'Flete_R'=>'Flete_Real',
		'comi_ass'=>'comi'
		);   
		for ($i=1; $i <=5; $i++) { 
			$name='Fletes'.$i;
			$nameSustituto='Fletes_Cantidad'.$i;
			$Sustituto['Fletes'][$name]=$nameSustituto;
		}
		
	$Sustituto['Fletes_C']=array();   
		for ($i=1; $i <=5; $i++) { 
			$name='Fletes_C'.$i;
			$nameSustituto='Fletes_Fechas'.$i;
			$Sustituto['Fletes_C'][$name]=$nameSustituto;
		}
	$Sustituto['Viaticos']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Viaticos'.$i;
			$nameSustituto='Viaticos_Cantidad'.$i;
			$Sustituto['Viaticos'][$name]=$nameSustituto;
		}  
	$Sustituto['Viaticos_C']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Viaticos_C'.$i;
			$nameSustituto='Viaticos_Fechas'.$i;
			$Sustituto['Viaticos_C'][$name]=$nameSustituto;
		}  
	$Sustituto['abonos']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Abonos'.$i;
			$nameSustituto='Abonos_Cantidad'.$i;
			$Sustituto['abonos'][$name]=$nameSustituto;
		}  
	$Sustituto['Abonos_C']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Abonos_C'.$i;
			$nameSustituto='Abonos_Fechas'.$i;
			$Sustituto['Abonos_C'][$name]=$nameSustituto;
		}  

	$Sustituto['acumulado']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Acumulado'.$i;
			$nameSustituto='Prestamos_Cantidad'.$i;
			$Sustituto['acumulado'][$name]=$nameSustituto;
		}  
	$Sustituto['Acumulado_C']=array();    
		for ($i=1; $i <=5; $i++) { 
			$name='Acumulado_C'.$i;
			$nameSustituto='Prestamos_Fechas'.$i;
			$Sustituto['Acumulado_C'][$name]=$nameSustituto;
		} 
#####
include_once($_SERVER["DOCUMENT_ROOT"].'/Librerias/General/Inicia_operadores.php');
$libre_v2->db($database,$conexion,$phpv);
if(empty($_POST['ID_G']) and !empty($_POST['Carta1'])){$_POST['ID_G']=$_POST['Carta1'];}

$consu_folio	= 	$libre_v2->consulta	('folio'	,$conexion	,'','',''			,'1',$phpv,'','');
$consu_abo_acu	= 	$libre_v2->consulta	('abo_acu'	,$conexion	,'','',''			,'1',$phpv,'','');
#### control ventanas
	include("interface/Control_desplegables.php");
#### #### Sistema Elimina
	include("limpiar_formulario/Cuentas.php");
#### inicialicacion de Variables 

	if(!empty($_POST['Carta1']))				$_POST['ID_G']=$_POST['Carta1'];
	if(empty($_POST['Flete_Real']))			$_POST['Flete_Real']=0;
	if(empty($_POST['Total_Prestamos']))	$_POST['Total_Prestamos']=0;
	if(empty($_POST['Total_Abonos']))		$_POST['Total_Abonos']=0;
	if(empty($_POST['Total_Casetas']))		$_POST['Total_Casetas']=0;
	if(empty($_POST['Total_Facturas']))		$_POST['Total_Facturas']=0;
	if(empty($_POST['Total_RyR']))			$_POST['Total_RyR']=0;
	if(empty($_POST['Total_Guias']))		$_POST['Total_Guias']=0;
	if(empty($_POST['Total_Maniobras']))	$_POST['Total_Maniobras']=0;
	if(empty($_POST['Total_RyR']))			$_POST['Total_RyR']=0;
	if(empty($_POST['Total_ViaPass']))		$_POST['Total_ViaPass']=0;
	if(empty($_POST['Total_Fletes']))		$_POST['Total_Fletes']=0;
	if(empty($_POST['Total_Viaticos']))		$_POST['Total_Viaticos']=0;
	if(empty($_POST['Total_Diesel']))		$_POST['Total_Diesel']=0;

## pre Calculos
	if(!empty($_POST['ID_G'])){
		
		$titles=array('',"Diesel","Casetas","Facturas","RyR","Guias","Maniobras","ViaPass");				
		$total=0;
		for ($i=0; $i <count($titles) ; $i++) { # columnas
			$totales="TOTAL".$i;
			#echo $totales_aux="TOTAL_".$titles[$i];
			$total=0;
			for ($o=1; $o <=25 ; $o++) {
				$total_aux="Total_".$titles[$i];
				$name=$titles[$i].$o;	
				if(!empty($_POST[$name])){
					$total=$total+floatval($_POST[$name]);
					$_POST[$totales]=$total;
					$_POST[$total_aux]=$total;
				}
			}
		}
		$Cuenta_actual=array();
		$Cuenta_actual['Gastos de viaje']=$_POST['Total_Casetas']+$_POST['Total_Facturas']+$_POST['Total_RyR']+$_POST['Total_Guias']+$_POST['Total_Maniobras'];
		$Cuenta_actual['Chofer']['Sueldo de Flete']=($_POST['Total_Fletes']*(15/100));
		$Cuenta_actual['Chofer']['Retencion de Sueldo']=$Cuenta_actual['Chofer']['Sueldo de Flete']*(7.5/100);
		$Cuenta_actual['Chofer']['Sueldo con retencion']=$Cuenta_actual['Chofer']['Sueldo de Flete']-$Cuenta_actual['Chofer']['Retencion de Sueldo'];
		$Cuenta_actual['Suma Total de Gastos']=$Cuenta_actual['Gastos de viaje']+$Cuenta_actual['Chofer']['Sueldo con retencion'];
		$Cuenta_actual['Saldo Cuenta Actual']=$Cuenta_actual['Suma Total de Gastos']-$_POST['Total_Viaticos'];
		$Cuenta_actual['Chofer']['Viaticos Restantes']=$_POST['Total_Viaticos']-$Cuenta_actual['Gastos de viaje'];
		$Cuenta_actual['Gastos del flete']=floatval($_POST['Total_ViaPass'])+floatval($Cuenta_actual['Suma Total de Gastos'])+floatval($_POST['Total_Diesel'])+floatval($_POST['Flete_Real']*0.06);
		$Cuenta_actual['Ganacia Flete']=$_POST['Flete_Real']-$Cuenta_actual['Gastos del flete'];
		if(is_numeric($_POST['Flete_Real']) and ($_POST['Flete_Real']>0))
			$Cuenta_actual['Rendimiento Flete']=$Cuenta_actual['Ganacia Flete']/($_POST['Flete_Real']*0.01);
		else
			$Cuenta_actual['Rendimiento Flete']=0;
			$Cuenta_actual['Diferencia Actual']=floatval($_POST['Total_Abonos'])-floatval($Cuenta_actual['Saldo Cuenta Actual'])-floatval($_POST['Total_Prestamos']);
			$_POST['Difer_1']=$Cuenta_actual['Saldo Cuenta Actual'];
			$_POST['Sueldo']=$Cuenta_actual['Chofer']['Sueldo de Flete'];
			$_POST['Retencion_ISR']=$Cuenta_actual['Chofer']['Retencion de Sueldo'];
		
	}else{
			$Cuenta_actual=array();
			$Cuenta_actual['Gastos de viaje']=0;
			$Cuenta_actual['Chofer']['Sueldo de Flete']=0;
			$Cuenta_actual['Chofer']['Retencion de Sueldo']=0;
			$Cuenta_actual['Chofer']['Sueldo con retencion']=0;
			$Cuenta_actual['Suma Total de Gastos']=0;
			$Cuenta_actual['Saldo Cuenta Actual']=0;
			$Cuenta_actual['Chofer']['Viaticos Restantes']=0;
			$Cuenta_actual['Gastos del flete']=0;
			$Cuenta_actual['Ganacia Flete']=0;
			$Cuenta_actual['Rendimiento Flete']=0;
			$Cuenta_actual['Diferencia Actual']=0;
	}
#### #### Descargas 
	include('Descargar/Combustible.php');
	include('Descargar/Cuentas_arrastradas.php');
	include('Descargar/Cuentas.php');
#### #### Sistema de validacion 
	include('Validaciones/folio.php');
#### #### SISTEMA DE GUARDADO 
	#### NUEVO
	/*
	*/
	if($validacion_de_campos['Validacion_general']==true){
		if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar' and $validacion_de_campos['Validacion_insert']==true)       {   
			include('Guardar/Cuentas.php');
		}
		
		if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar'and $validacion_de_campos['Validacion_update']==true)      {            
			
			include('Modificar/Cuentas.php');
		}
		
	}else{
		if(empty($consola))$consola='';
	}
	/*
	echo('<pre>');
	print_r($resultado_Operacion);
	echo('</pre>'); 
	*/


#### #### Sistema Elimina
	include("Elimina/Cuentas.php");	
#### #### Interface_de_usuario
	######################## Informacion vital
		include_once('interface/nuevo_registro/datos_principales.php');	
	######################## Lista De Cuentas
		include_once('interface/folder/Lista_cuentas.php');	
	######################## Interface_de_usuario de ingreso 	
		echo "<div id='general_datos' style='display: block;float: right;width: min-content;position: relative;background: #0f4c75;top: 0px;'>";
			## cabezeras
				#$titles=array('',"Fletes","Viaticos","Diesel","Casetas","Facturas","R y R","Guias","Maniobras","Via Pass");				
				$titles=array('',"Diesel","Casetas","Facturas","RyR","Guias","Maniobras","ViaPass");				
				echo"<div id='Boton_ingreso_Datos' style='position: relative;min-width: 500px;min-height: 21px;'>";
			## control desplegable celdas 
					if(empty($_POST['style_Celdas']))$_POST['style_Celdas']='block';
					if(!empty($_POST['Celdas'])){
						if($_POST['style_Celdas']=='block'){
							$DIV_style_display='none';
						}else{
							$DIV_style_display='block';
						}
					}else{
						$DIV_style_display=$_POST['style_Celdas'];
					}
					echo$libre_v5->input('hidden','style_Celdas',$DIV_style_display,'style_Celdas','','','','float: right;width: max-content');
					echo$libre_v5->input('button','Celdas','Totales','','','','onclick="OcultarDIV(this);"','float: right;width: max-content');
				echo"</div>";
				echo"<div id='cabezeras' style='width: max-content;'>";
				
					for ($i=0; $i <count($titles) ; $i++) { # columnas
						$class='Celdas Medio';
						if($i==0){$class=$class." id";}
						echo$libre_v5->input('button','',$titles[$i],'',$class,'','','');
					}
				echo"</div>";
			## celdas
				echo"<div id='Celdas' style='display: $DIV_style_display;'>";
					for ($i=0; $i <count($titles) ; $i++) { # columnas
						echo"<div id='Columnas'style='min-width: 10px;width: min-content;min-height: 200px;height: max-content;background: #676767; float: left;'>";				
							$total=0;
							#### genera renglones 
							for ($o=1; $o <=25 ; $o++) {
								$totales="TOTAL".$i;
								$class='Celdas Medio';
								if($i==0){$class=$class." id";}	
								if($i==0){
									echo$libre_v5->input('button','',$o,'',$class,'','','');
								}		
								if($i>0){
									$name=$titles[$i].$o;			
									$name_comentarios=$titles[$i]."_C".$o;
									$name_next=$i."TEXT".($o+1);
									$id=$i."TEXT".$o;
									$style='float: left; text-align: right;';
									$title=$name_comentarios;
									if(!empty($_POST[$name])){
										$total=$total+floatval($_POST[$name]);
										$_POST[$totales]=$total;
									}else{$total=0;}	#suma los valores para totales
									if(!empty($_POST[$name_comentarios])){$style=$style." box-shadow: inset 0px 0px 0px 1px #55bfd0; ";}
									echo $libre_v2->input2('text',$name,$title,'',$style,$id,
									
										'
										onKeyPress	="return valida_n(event,'."''".','."''".','."'".$name_next."'".');"
										onKeyUp		="mueve_diba_text(event,this);calcula_update();"
										
										onfocus		="celda_a_editor(this);"
										maxlength	="15"
										',$class);
										#onfocus		="comentariosA(this);"1
										
									echo $libre_v2->input2('hidden',$name_comentarios,'','','',$name_comentarios,'','');
								}
							}					
						echo"</div>";
					}
				echo"</div>";
			## totales
				echo"<div id='Totales' style=''>";
				$class='Celdas Medio id';
				echo"<div style='float: left;width: min-content;'>";
					echo$libre_v5->input('button','','TOTAL','',$class,'','','');
					echo$libre_v5->input('button','','DESGLOSADO','',$class,'','','');
					echo$libre_v5->input('button','','IVA','',$class,'','','');
				echo"</div>";
					for ($i=1; $i <count($titles) ; $i++) { 
						## la suma de los totales se realiza en el generador de celdas 
						$totales="TOTAL".$i;
						$class='Celdas Medio';
						if(empty($_POST[$totales])){$_POST[$totales]='0';}
						#$_POST[$titles]=$_POST[$totales];
						echo"<div style='float: left;width: min-content;'>";
							$desglose=$_POST[$totales]/1.16;
							$Iva=$_POST[$totales]*0.15;
							$_POST["Total_".$titles[$i]]=$_POST[$totales];
							##asignacion de id y names
							echo$libre_v5->input('hidden',"Total_".$titles[$i],$_POST[$totales],"Total_".$titles[$i],$class,'','','text-align: right;');
							echo$libre_v5->input('button',$totales,$libre_v2->formato_num($_POST[$totales],2),$totales,$class,'','','text-align: right;');
							echo$libre_v5->input('button','',$libre_v2->formato_num($desglose,2),'',$class,'','','text-align: right;');
							echo$libre_v5->input('button','',$libre_v2->formato_num($Iva,2),'',$class,'','','text-align: right;');
						echo"</div>";
					}
				echo"</div>";
			##comentarios
				echo"<div style='float: left;width: 100%;'>";
					echo$libre_v5->input('button','','Comentario','','botone_n','','',' width: 40%');
					echo$libre_v5->input('text','','','comentario_compartido','botones_submenu','','onchange="Editor_a_celda(this);"','width: 60%');
				echo"</div>";
		echo"</div>";
	######################## Fletes viaticos abonos Prestamos
		echo "<div id='AutoColumnas' 	style='display: block;float: left;background: #28336985; width: min-content;'>";
			echo "<div id='Fletes'style='position: relative;width: max-content; float: left;'>";
				echo$libre_v5->input('button','','Fletes','','Medio botone_n','','','width: 100%;');
				$array['name']='Fletes';
				$abonos=new Columna_automaticas($phpv,$conexion,$array);
				$abonos->Nombre='Fletes';
				$abonos->add_columna('Fechas');
				$abonos->add_columna('Cantidad');
				$abonos->columnas_requeridas(
					array(
						'Fechas'=>false,
						'Cantidad'=>true
						)
				);
				$abonos->title['Fechas']['propiedades']['value']='Fecha';
				$abonos->title['Fechas']['propiedades']['class']=' Medio botone_n';
				$abonos->title['Fechas']['propiedades']['disabled']=true;
				$abonos->title['Fechas']['propiedades']['style']['width']='140px';

				$abonos->title['Cantidad']['propiedades']['value']='Cantidad';
				$abonos->title['Cantidad']['propiedades']['class']='Celdas Medio botone_n ';# botone_n 
				$abonos->title['Cantidad']['propiedades']['disabled']=true;
				$abonos->colunas['Fechas']['propiedades']['class']='Celdas Medio botones_submenu mediano ';#botones_submenu
				$abonos->colunas['Fechas']['propiedades']['type']='date';
				$abonos->colunas['Cantidad']['propiedades']['class']='Celdas Medio botones_submenu';
				$abonos->contro_lista_autoSuma(array('Cantidad'));
				$abonos->view();
			
			echo "</div>";	
			echo "<div id='Viaticos'style='position: relative;width: max-content; float: left;'>";
				echo$libre_v5->input('button','','Viaticos','','Medio botone_n','','','width: 100%;');
				$array['name']='Viaticos';
				$abonos=new Columna_automaticas($phpv,$conexion,$array);
				$abonos->Nombre='Viaticos';
				$abonos->add_columna('Fechas');
				$abonos->add_columna('Cantidad');
				$abonos->columnas_requeridas(
					array(
						'Fechas'=>false,
						'Cantidad'=>true
						)
				);
				$abonos->title['Fechas']['propiedades']['value']='Fecha';
				$abonos->title['Fechas']['propiedades']['class']=' Medio botone_n';
				$abonos->title['Fechas']['propiedades']['disabled']=true;
				$abonos->title['Fechas']['propiedades']['style']['width']='140px';

				$abonos->title['Cantidad']['propiedades']['value']='Cantidad';
				$abonos->title['Cantidad']['propiedades']['class']='Celdas Medio botone_n ';# botone_n 
				$abonos->title['Cantidad']['propiedades']['disabled']=true;
				$abonos->colunas['Fechas']['propiedades']['class']='Celdas Medio botones_submenu mediano ';#botones_submenu
				$abonos->colunas['Fechas']['propiedades']['type']='date';
				$abonos->colunas['Cantidad']['propiedades']['class']='Celdas Medio botones_submenu';
				$abonos->contro_lista_autoSuma(array('Cantidad'));
				$abonos->view();
			
			echo "</div>";	
			echo "<div id='Abonos'style='position: relative;width: max-content; float: left;'>";
				echo$libre_v5->input('button','','Abonos','','Medio botone_n','','','width: 100%;');
				$array['name']='Abonos';
				$abonos=new Columna_automaticas($phpv,$conexion,$array);
				$abonos->Nombre='Abonos';
				$abonos->add_columna('Fechas');
				$abonos->add_columna('Cantidad');
				$abonos->columnas_requeridas(
					array(
						'Fechas'=>false,
						'Cantidad'=>true
						)
				);
				$abonos->title['Fechas']['propiedades']['value']='Fecha';
				$abonos->title['Fechas']['propiedades']['class']=' Medio botone_n';
				$abonos->title['Fechas']['propiedades']['disabled']=true;
				$abonos->title['Fechas']['propiedades']['style']['width']='140px';

				$abonos->title['Cantidad']['propiedades']['value']='Cantidad';
				$abonos->title['Cantidad']['propiedades']['class']='Celdas Medio botone_n ';# botone_n 
				$abonos->title['Cantidad']['propiedades']['disabled']=true;
				$abonos->colunas['Fechas']['propiedades']['class']='Celdas Medio botones_submenu mediano ';#botones_submenu
				$abonos->colunas['Fechas']['propiedades']['type']='date';
				$abonos->colunas['Cantidad']['propiedades']['class']='Celdas Medio botones_submenu';
				$abonos->contro_lista_autoSuma(array('Cantidad'));
				$abonos->view();
			
			echo "</div>";
		echo "</div>";
		echo "<div id='AutoColumnas' 	style='display: block;float: left;background: #28336985; width: max-content;'>";
			echo "<div id='Prestamos style='position: relative;width: max-content; float: left;'>";
				echo$libre_v5->input('button','','Prestamos[Acumulado]','','Medio botone_n','','','width: 100%;');
				$array['name']='Prestamos';
				$Prestamos=new Columna_automaticas($phpv,$conexion,$array);
				$Prestamos->Nombre='Prestamos';
				$Prestamos->add_columna('ID');
				$Prestamos->add_columna('Fechas');
				$Prestamos->add_columna('Cantidad');
				$Prestamos->columnas_requeridas(
					array(
						'Fechas'=>false,
						'Cantidad'=>true
						)
				);
				if(!empty($datos_to_arrastre)){
					$array_inset_dato=array(
						"Datos"=>$datos_to_arrastre,
						"ControlDatos"=>array(
							"Index"=>'ID'
						)
					);
					$Prestamos->inset_dato($array_inset_dato);

				}
				if(!empty($_POST['Quitar_ID_G_arrastre'])){
					$array_delect_dato=array(
						"Datos"=>$_POST['Quitar_ID_G_arrastre'],
						"ControlDatos"=>array(
							"Index"=>'ID'
						)
					);
					$Prestamos->delect_dato($array_delect_dato);

				}
				$Prestamos->title['ID']['propiedades']['value']='ID Cuenta';
				$Prestamos->title['ID']['propiedades']['class']='Celdas Medio botone_n Diseno_boton_id ';# botone_n 
				$Prestamos->title['ID']['propiedades']['disabled']=true;

				$Prestamos->title['Fechas']['propiedades']['value']='Fecha';
				$Prestamos->title['Fechas']['propiedades']['class']=' Medio botone_n';
				$Prestamos->title['Fechas']['propiedades']['disabled']=true;
				$Prestamos->title['Fechas']['propiedades']['style']['width']='140px';

				$Prestamos->title['Cantidad']['propiedades']['value']='Cantidad';
				$Prestamos->title['Cantidad']['propiedades']['class']='Celdas Medio botone_n ';# botone_n 
				$Prestamos->title['Cantidad']['propiedades']['disabled']=true;


				$Prestamos->colunas['ID']['propiedades']['class']='Celdas Medio botones_submenu mediano Diseno_boton_id ';#botones_submenu
				$Prestamos->colunas['ID']['propiedades']['type']='submit';
				$Prestamos->colunas['ID']['memoria']['Activa']=true;
				$Prestamos->colunas['ID']['memoria']['propiedades']['type']='hidden';
				$Prestamos->colunas['ID']['reemplazo']['input']['propiedades']['name']='Quitar_ID_G_arrastre';
				$Prestamos->colunas['ID']['reemplazo']['input']['Activa']=true;

				$Prestamos->colunas['Fechas']['propiedades']['class']='Celdas Medio botones_submenu mediano ';#botones_submenu
				$Prestamos->colunas['Fechas']['propiedades']['type']='date';
				$Prestamos->colunas['Cantidad']['propiedades']['class']='Celdas Medio botones_submenu';
				$Prestamos->contro_lista_autoSuma(array('Cantidad'));
				$Prestamos->view();
			
			echo "</div>";	
			#### LISTA DE CUENTAS PARA ARRASTRAR 
				echo"<div id='vinculo_cuentas' style='position: relative;float: left;margin: 1px; max-height: 227px; background: royalblue; overflow: hidden;  '>";	
				echo$libre_v5->input('button','','Vincular Cuentas','','Medio botone_n','','','width: 100%;');					
				## control despliege
					if(empty($_POST['style_Vinculo_cuentas']))$_POST['style_Vinculo_cuentas']='none';
					if(!empty($_POST['Vinculo_cuentas'])){
						if($_POST['style_Vinculo_cuentas']=='block'){
							$style_Vinculo_cuentas='none';
						}else{
							$style_Vinculo_cuentas='block';
						}
					}else{
						$style_Vinculo_cuentas=$_POST['style_Vinculo_cuentas'];
					}
					echo$libre_v5->input('hidden','style_Vinculo_cuentas',$style_Vinculo_cuentas,'style_Vinculo_cuentas','','','','float: right;width: max-content');
					echo$libre_v5->input('button','Vinculo_cuentas','-','','','','onclick="OcultarDIV(this);"','float: right;width: max-content');
				## presenta datos 
					echo"<div id='Vinculo_cuentas' style='display: $style_Vinculo_cuentas;'>";
						$tabla_consulta='folio';
						$database_consulta='sistema_cuentas_annie';
						$Consulta_tabla= new inface($database_consulta,$tabla_consulta,$phpv,$conexion);
						#### control de busqueda 
							$getColumnas=array('ID_G','Revisado','N_cuenta','Difer_1','CLIENTE','CHOFER');
							$BuscaColumnas=array();
							$BuscaDatos=array();
							/*
								if(!empty($_POST['CLIENTE']) and $_POST['CLIENTE']!='CLIENTE'){
								$BuscaColumnas[]="CLIENTE";
								$BuscaDatos[]=$_POST['CLIENTE'];
								}else{
									$getColumnas[]='Cliente';
								}
							*/
						#### consentrado de informacion 
							$array_consulta=array(
								"tabla"=>$tabla_consulta,
								"Operacion"=>array(
									'viewSQL'=>'false',
									'SELECT'=>array(
										"Activar"	=>'true',
										"LIKE"		=>'falses',
										#"getColumnas"	=>array('*'),
										"getColumnas"	=>$getColumnas,
										"BuscaColumnas"	=>$BuscaColumnas,
										"BuscaDatos"	=>$BuscaDatos,
										"Condiciones"	=>array(),
										"ByOrder"		=>array(
											"Columna"	=>'ID_G',
											"ASC-DESC"	=>'DESC'
										),	
									),
								),
								'Consulta_especifica'=>array(
									"name_boton_descarga"=>'Descarga_Cuenta_arrastrada'
								),
								'class'=>array(
									'columnaFija'=>'Diseno_botones1 ',
									'casilla'=>'Diseno_botones1 ',
									'id'=>'Diseno_boton_id '
								),
								'Div_principal'=>"<div style='overflow: auto;height: 70px;width: max-content;margin: 0px 12px 0px 0px;'>",
								'CambiosColumnas'=> array(
									'TextColumna'=>array(
										'Contador_inicial'=>'Inicio',
										'Contador_Final'=>'Final',
										'Total_Despachado'=>'Total',
										'placas'=>'Unidad',
										'Cliente'=>'Cliente',
										'operador'=>'Operador',
									),
									'ColumnasEspeciales'=>''      
								),
								'style'=>array(
									'Ancho'=>'',
								)
							);
						$Consulta_tabla->Control_Consulta($array_consulta);
						$Consulta_tabla->Consulta_tabla();
						$Consulta_tabla->view_Consulta_tabla();						
					echo"</div>";
			echo"</div>";
		echo "</div>";	
	######################## Combustible 
		#### Operaciones matematicas
			if(!empty($_POST['crome_i']) and!empty($_POST['crome_f']))$_POST['crome_t']=$_POST['crome_f']-$_POST['crome_i'];else{$_POST['crome_t']=0;}
			if(!empty($_POST['km_f']) and!empty($_POST['km_i']))$total_km=$_POST['km_f']-$_POST['km_i'];else{$total_km=0;}
			if(!empty($_POST['crome_t']) and $total_km>=0){$KmPorLitro=$total_km/$_POST['crome_t'];}else{$KmPorLitro=0;}
		echo "<div id='gene_combustible' 	style='display: block;float: left;padding: 5px;background: #28336985;margin: 2.5px;max-width: min-content; overflow: hidden;'>";
			echo$libre_v5->input('button','','Relacion de combustible','','Medio botone_n','','','width: 100%;');
			echo"<div style='position: relative;float: left;'>";	
				echo"<div style='position: relative;width: min-content; float: left;'>";
					echo$libre_v5->input('button','','Diesel','','Medio botone_n','','','width: 200px;');					
					echo$libre_v5->input('button','','Presio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','presio_d','','presio_d','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();calcu_combustible();"','width: 40%;'); 
					echo$libre_v5->input('button','','ID Combustible','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','ID_Combustible','','','Celdas Medio botones_submenu boton_desactivado','','readonly="readonly" ','width: 40%;'); 
					echo$libre_v5->input('button','','Contador Inicio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_i','','crome_i','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,crome_f)" onkeyup="calcula_update();calcu_combustible();"','width: 40%	;'); 
					echo$libre_v5->input('button','','Contador Final','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_f','','crome_f','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,)" onkeyup="calcula_update();calcu_combustible();"','width: 40%;'); 
					echo$libre_v5->input('button','','Lts. Despachados','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_t','','crome_t','Celdas Medio botones_submenu boton_desactivado','','','width: 40%;');
				echo"</div>";
				echo"<div style='position: relative;width: min-content; float: left;'>";
					echo$libre_v5->input('button','','Kilometrajes','','Medio botone_n','','','width: 200px;');
					echo$libre_v5->input('button','','Inicio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_i','','km_i','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,km_f);"','width: 40%;'); 
					
					echo$libre_v5->input('button','','Final','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_f','','km_f','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,);"','width: 40%;'); 
					echo$libre_v5->input('button','','Recoridos','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','Total_km',$libre_v2->formato_num($total_km,2),'Total_km','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					
					echo$libre_v5->input('button','','Km/Lts','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_lts',$libre_v2->formato_num($KmPorLitro,2),'km_l','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo"</div>";				
			echo"</div>";
			#### lista para vincular combustible 
				echo"<div id='vinculo_combustible' style='position: relative;float: left;margin: 1px; max-height: 227px; background: royalblue; overflow: hidden;  '>";	
					echo$libre_v5->input('button','','Vincular Combustible','','Medio botone_n','','','width: 100%;');					
					## control despliege
						if(empty($_POST['style_Vinculo_combustible']))$_POST['style_Vinculo_combustible']='none';
						if(!empty($_POST['Vinculo_combustible'])){
							if($_POST['style_Vinculo_combustible']=='block'){
								$style_Vinculo_combustible='none';
							}else{
								$style_Vinculo_combustible='block';
							}
						}else{
							$style_Vinculo_combustible=$_POST['style_Vinculo_combustible'];
						}
						echo$libre_v5->input('hidden','style_Vinculo_combustible',$style_Vinculo_combustible,'style_Vinculo_combustible','','','','float: right;width: max-content');
						echo$libre_v5->input('button','Vinculo_combustible','-','','','','onclick="OcultarDIV(this);"','float: right;width: max-content');
					## presenta datos 
						echo"<div id='Vinculo_combustible' style='display: $style_Vinculo_combustible;'>";
							$tabla_consulta='Repostajes_unidades';
							$database_consulta='combustible';
							$Consulta_tabla= new inface($database_consulta,$tabla_consulta,$phpv,$conexion);
							#### control de busqueda 
								$getColumnas=array('ID','fecha','Contador_Inicio','Contador_Final','Total_Despachado');
								$BuscaColumnas=array();
								$BuscaDatos=array();
								/*if(!empty($_POST['CLIENTE']) and $_POST['CLIENTE']!='CLIENTE'){
									$BuscaColumnas[]="CLIENTE";
									$BuscaDatos[]=$_POST['CLIENTE'];
								}else{
									$getColumnas[]='Cliente';
								}*/
								if(!empty($_POST['CHOFER']) and $_POST['CHOFER']!='CHOFER'){
									$BuscaColumnas[]="operador";
									$BuscaDatos[]=$_POST['CHOFER'];
								}else{
									$getColumnas[]='operador';
								}
								if(!empty($_POST['PLACAS']) and $_POST['PLACAS']!='PLACAS'){
									$BuscaColumnas[]="PLACAS";
									$BuscaDatos[]=$_POST['PLACAS'];
								}else{
									$getColumnas[]='placas';
								}
							#### consentrado de informacion 
								$array_consulta=array(
									"tabla"=>$tabla_consulta,
									"Operacion"=>array(
										'SELECT'=>array(
											"Activar"	=>'true',
											"LIKE"		=>'falses',
											#"getColumnas"	=>array('*'),
											"getColumnas"	=>$getColumnas,
											"BuscaColumnas"	=>$BuscaColumnas,
											"BuscaDatos"	=>$BuscaDatos,
											"Condiciones"	=>array(),
											
										)
									),
									'Consulta_especifica'=>array(
										"name_boton_descarga"=>'Descarga_combustible'
									),
									'class'=>array(
										'columnaFija'=>'Diseno_botones1 ',
										'casilla'=>'Diseno_botones1 ',
										'id'=>'Diseno_boton_id '
									),
									'Div_principal'=>"<div style='overflow: auto;height: 70px;width: max-content;margin: 0px 12px 0px 0px;'>",
									'CambiosColumnas'=> array(
										'TextColumna'=>array(
											'Contador_inicial'=>'Inicio',
											'Contador_Final'=>'Final',
											'Total_Despachado'=>'Total',
											'placas'=>'Unidad',
											'Cliente'=>'Cliente',
											'operador'=>'Operador',
										),
										'ColumnasEspeciales'=>''      
									),
									'style'=>array(
										'Ancho'=>'',
									)
								);
							$Consulta_tabla->Control_Consulta($array_consulta);
							$Consulta_tabla->Consulta_tabla();
							$Consulta_tabla->view_Consulta_tabla();						
						echo"</div>";
				echo"</div>";
			
		echo "</div>";	
	######################## Cuentas Actual 
		#### Calculos 
			if(empty($_POST['Flete_Real']))			$_POST['Flete_Real']=0;
			if(empty($_POST['Total_Prestamos']))	$_POST['Total_Prestamos']=0;
			if(empty($_POST['Total_Abonos']))		$_POST['Total_Abonos']=0;
			if(empty($Cuenta_actual['Rendimiento Flete']))		$Cuenta_actual['Rendimiento Flete']=0;
			if(empty($Cuenta_actual['Rendimiento Flete']))		$Cuenta_actual['Rendimiento Flete']=0;
			if(!empty($_POST['ID_G'])){ #PROCETECION DE ARRANQUE DE VARIABLES
				$Cuenta_actual=array();
				$Cuenta_actual['Gastos de viaje']=$_POST['Total_Casetas']+$_POST['Total_Facturas']+$_POST['Total_RyR']+$_POST['Total_Guias']+$_POST['Total_Maniobras'];
				$Cuenta_actual['Chofer']['Sueldo de Flete']=($_POST['Total_Fletes']*(15/100));
				$Cuenta_actual['Chofer']['Retencion de Sueldo']=$Cuenta_actual['Chofer']['Sueldo de Flete']*(7.5/100);
				$Cuenta_actual['Chofer']['Sueldo con retencion']=$Cuenta_actual['Chofer']['Sueldo de Flete']-$Cuenta_actual['Chofer']['Retencion de Sueldo'];
				$Cuenta_actual['Suma Total de Gastos']=$Cuenta_actual['Gastos de viaje']+$Cuenta_actual['Chofer']['Sueldo con retencion'];
				$Cuenta_actual['Saldo Cuenta Actual']=$Cuenta_actual['Suma Total de Gastos']-$_POST['Total_Viaticos'];
				$Cuenta_actual['Chofer']['Viaticos Restantes']=$_POST['Total_Viaticos']-$Cuenta_actual['Gastos de viaje'];
				$Cuenta_actual['Gastos del flete']=floatval($_POST['Total_ViaPass'])+floatval($Cuenta_actual['Suma Total de Gastos'])+floatval($_POST['Total_Diesel'])+floatval($_POST['Flete_Real']*0.06);
				$Cuenta_actual['Ganacia Flete']=$_POST['Flete_Real']-$Cuenta_actual['Gastos del flete'];
				if(is_numeric($_POST['Flete_Real']) and ($_POST['Flete_Real']>0))
					$Cuenta_actual['Rendimiento Flete']=$Cuenta_actual['Ganacia Flete']/($_POST['Flete_Real']*0.01);
				else
					$Cuenta_actual['Rendimiento Flete']=0;
				$Cuenta_actual['Diferencia Actual']=floatval($_POST['Total_Abonos'])-floatval($Cuenta_actual['Saldo Cuenta Actual'])-floatval($_POST['Total_Prestamos']);

			}
		#### Presenta 
		echo "<div id='gene_actua' class='' style='display: block;position: relative;background: #28336985;padding: 5px;width: 634px;float: right;margin: 2.5px;   '>";	
			echo$libre_v5->input('button','','Calculos de Cuenta Actual','','Medio botone_n','','','width: 100%;');
			echo"<div style='position: relative;float: left;'>";
				echo"<div style='float: left;position: relative;width: 144px;'>";
					echo$libre_v5->input('button','','Comision %','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('text','comi','','comi','Celdas Medio botones_submenu ','','maxlength="15"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();"','width: 40%;'); 			
					echo$libre_v5->input('button','','Gastos T.','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual["Gastos de viaje"],2),'G_T','Celdas Medio botones_submenu boton_desactivado ','','maxlength="15"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();"','width: 40%;'); 			
					echo$libre_v5->input('button','','CHOFER','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Chofer']['Sueldo con retencion'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 						
					echo$libre_v5->input('button','','','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Suma Total de Gastos'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					echo$libre_v5->input('button','','Viaticos','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($_POST['Total_Viaticos'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					echo$libre_v5->input('button','','Diferencia','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Saldo Cuenta Actual'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo "</div>";
				echo"<div style='float: left;position: relative;width: 160px;'>";
					echo$libre_v5->input('button','','Gastos sin Choferes','','Medio botone_n','','','width: 100%;');
					echo$libre_v5->input('button','','Gastos de Viaje','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual["Gastos de viaje"],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					echo$libre_v5->input('button','','Viaticos','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($_POST['Total_Viaticos'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					echo$libre_v5->input('button','','Diferencia','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Chofer']['Viaticos Restantes'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo "</div>";
				echo"<div style='float: left;position: relative;width: 160px;'>";
					#echo$libre_v5->input('button','','Flete Real Sin Comision','','Medio botone_n','','','width: 60%;');
					#echo$libre_v5->input('text','flete_real_sin_comision','','','Celdas Medio botones_submenu  ','','','width: 40%;');
					echo$libre_v5->input('button','','Flete Real','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('text','Flete_Real','','','Celdas Medio botones_submenu  ','','','width: 40%;');  
					echo$libre_v5->input('button','','Gastos Totales','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Gastos del flete'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					echo$libre_v5->input('button','','Neto Carro','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Ganacia Flete'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
					echo$libre_v5->input('button','','Rendimiento','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Rendimiento Flete'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
				echo "</div>";			
				echo"<div style='float: left;position: relative;width: 160px;'>";
					echo$libre_v5->input('button','','CHOFER','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$Cuenta_actual['Chofer']['Sueldo de Flete'],'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
					echo$libre_v5->input('button','','RET 7.5%','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$Cuenta_actual['Chofer']['Retencion de Sueldo'],'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
					echo$libre_v5->input('button','','Sueldo','','Medio botone_n','','','width: 60%;');
					echo$libre_v5->input('button','',$Cuenta_actual['Chofer']['Sueldo con retencion'],'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
				echo "</div>";
			echo"</div>";
			echo"<div style='background: orange;position: relative;float: left;'>";
				echo$libre_v5->input('button','','Equilibrio cuenta','','Medio botone_n','','','width: 100%;');
				echo$libre_v5->input('button','','Cuenta Actual','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','',"-".$libre_v2->formato_num($Cuenta_actual['Saldo Cuenta Actual'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Total Acumulados','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','',"-".$libre_v2->formato_num($_POST['Total_Prestamos'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Total Abonos','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','',$libre_v2->formato_num($_POST['Total_Abonos'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Diferencia Actual','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','',$libre_v2->formato_num($Cuenta_actual['Diferencia Actual'],2),'','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				
					
			echo"</div>";
		echo "</div>";
	
?>