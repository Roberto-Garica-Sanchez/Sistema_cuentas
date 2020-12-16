<?php
$libre_v2->db('almacen',$conexion,$phpv);
	$consu_choferes	= 	$libre_v2->consulta	('operadores'	,$conexion	,'','','Nombre'	,'' ,$phpv,'','');
	$consu_placas	= 	$libre_v2->consulta	('unidades'		,$conexion	,'','','Placas'	,''	,$phpv,'','');
	$consu_clientes	= 	$libre_v2->consulta	('clientes'		,$conexion	,'','','Nombre'	,''	,$phpv,'','');
$db_empresa='empresa_annie';
$libre_v2->db($db_empresa,$conexion,$phpv);
if(empty($_POST['Carta0']) and !empty($_POST['Carta1'])){$_POST['Carta0']=$_POST['Carta1'];}

$consu_folio	= 	$libre_v2->consulta	('folio'	,$conexion	,'','',''			,'1',$phpv,'','');
$consu_abo_acu	= 	$libre_v2->consulta	('abo_acu'	,$conexion	,'','',''			,'1',$phpv,'','');

#### #### Interface_de_usuario

	######################## Informmacion vital
		include_once('interface/nuevo_registro/datos_principales.php');
		
	######################## Interface_de_usuario de ingreso 	
		echo "<div id='general_datos' style='display: block;float: right; width: max-content; position: relative;background: #0f4c75;padding: 5px;top: 0px; box-shadow: inset 0px 0px 5px black; margin: 2.5px;'>";
			##celdas
				echo"<div>";
				$titles=array('',"Fletes","Viaticos","Diesel","Casetas","Facturas","R y R","Guias","Maniobras","Via Pass");
				for ($i=0; $i <=9 ; $i++) { 
					echo"<div style='min-width: 10px;width: min-content;min-height: 200px;height: max-content;background: #676767; float: left;'>";
					$class='Celdas Medio';
					if($i==0){$class=$class." id";}
					echo$libre_v5->input('button','',$titles[$i],'',$class,'','','');
					
					for ($o=1; $o <=20 ; $o++) { 
						if($i==0){
							echo$libre_v5->input('button','',$o,'',$class,'','','');
						}			
						if($i>0){
							$name=$i."TEXT".$o;			
							$name_comentarios=$i."TEXT_C".$o;
							$name_next=$i."TEXT".($o+1);
							$id=$name;
							$style='float: left;';
							$title=$name_comentarios;
							if(!empty($_POST[$name_comentarios])){$style=$style." box-shadow: inset 0px 0px 0px 1px #55bfd0;";}
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
						
						if($i==0 and $o==20){
							echo$libre_v5->input('button','','TOTAL','',$class,'','','');
						}
						if($i>0 and $o ==20){
							$totales="TOTAL".$i;
							if(empty($_POST[$totales])){$_POST[$totales]='';}
							echo$libre_v5->input('button',$totales,'',$totales,$class,'','','');
						}
					}
					
					echo"</div>";
				}
				echo"</div>";
			##comentarios
				echo"<div style='float: left;width: 100%;'>";
					echo$libre_v5->input('button','','Comentario','','botone_n','','',' width: 40%');
					echo$libre_v5->input('text','','','comentario_compartido','botones_submenu','','onchange="Editor_a_celda(this);"','width: 60%');
				echo"</div>";
		echo"</div>";
	######################## Combustible 
		echo "<div id='gene_combustible' 	style='display: block;float: left;padding: 5px;background: #28336985;margin: 2.5px;'>";
			echo$libre_v5->input('button','','Relacion de combustible','','Medio botone_n','','','width: 100%;');
			echo"<div style=''>";	
				echo"<div style='position: relative;width: min-content;'>";
					echo$libre_v5->input('button','','Diesel','','Medio botone_n','','','width: 200px;');					
					echo$libre_v5->input('button','','Presio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','presio_d','','presio_d','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();calcu_combustible();"','width: 40%;'); 
					echo$libre_v5->input('button','','Contador Inicio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_i','','crome_i','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,crome_f)" onkeyup="calcula_update();calcu_combustible();"','width: 40%	;'); 
					echo$libre_v5->input('button','','Contador Final','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_f','','crome_f','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,)" onkeyup="calcula_update();calcu_combustible();"','width: 40%;'); 
					echo$libre_v5->input('button','','Lts. Despachados','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','crome_t','','crome_t','Celdas Medio botones_submenu boton_desactivado','','','width: 40%;');
				
				echo"</div>";
				echo"<div style='position: relative;width: min-content; '>";
					echo$libre_v5->input('button','','Kilometrajes','','Medio botone_n','','','width: 200px;');
					echo$libre_v5->input('button','','Inicio','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_i','','km_i','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,km_f);"','width: 40%;'); 
					
					echo$libre_v5->input('button','','Final','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_f','','km_f','Celdas Medio botones_submenu ','','maxlength="10"onkeypress="return valida_n(event,);"','width: 40%;'); 
					echo$libre_v5->input('button','','Recoridos','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','Total_km','','Total_km','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					
					echo$libre_v5->input('button','','Km/Lts','','Celdas Medio botone_n ','','','width: 60%;');
					echo$libre_v5->input('text','km_lts','','km_l','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
					
					

				echo"</div>";				
			echo "</div>";	
		echo "</div>";	
	######################## Abonos
		echo "<div id='gene_Abonos' 	style='display: block;float: left;padding: 5px;background: #28336985;margin: 2.5px;'>";
			echo "<div style='position: relative;width: max-content;'>";
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
				$abonos->title['Cantidad']['propiedades']['value']='Cantidad';
				$abonos->title['Fechas']['propiedades']['class']=' Medio botone_n';
				$abonos->title['Cantidad']['propiedades']['class']='Celdas Medio botone_n ';# botone_n 
				$abonos->title['Fechas']['propiedades']['disabled']=true;
				$abonos->title['Cantidad']['propiedades']['disabled']=true;
				$abonos->colunas['Fechas']['propiedades']['class']='Celdas Medio botones_submenu mediano ';#botones_submenu
				$abonos->colunas['Cantidad']['propiedades']['class']='Celdas Medio botones_submenu';
				$abonos->contro_lista_autoSuma(array('Cantidad'));
				$abonos->view();
			
			echo "</div>";	
		echo "</div>";	
	######################## Cuentas Actual 	
		echo "<div id='gene_actua' class='' style='display: block;position: relative;background: #28336985;padding: 5px;width: 640px;float: right;margin: 2.5px;'>";	
			echo$libre_v5->input('button','','Calculos de Cuenta Actual','','Medio botone_n','','','width: 100%;');
			echo"<div style='float: left;position: relative;width: 210px;'>";
				echo$libre_v5->input('button','','Comision %','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('text','comi','','comi','Celdas Medio botones_submenu ','','maxlength="15"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();"','width: 40%;'); 			
				echo$libre_v5->input('button','','Gastos T.','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','gastos_en_viaje','','G_T','Celdas Medio botones_submenu boton_desactivado ','','maxlength="15"onkeypress="return valida_n(event,crome_i)" onkeyup="calcula_update();"','width: 40%;'); 			
				echo$libre_v5->input('button','','Chofer Neto.','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','sueldo_operador_menos_ISR','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 						
				echo$libre_v5->input('button','','','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','gastos_de_flete','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Viaticos','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','TOTAL2','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','DIFERENCIA','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','Sueldo_Final_Operador_en_cuenta_actual','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
			echo "</div>";
			echo"<div style='float: left;position: relative;width: 210px;'>";
				echo$libre_v5->input('button','','Gastos sin Choferes','','Medio botone_n','','','width: 100%;');
				echo$libre_v5->input('button','','Gastos de Viaje','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','gastos_en_viaje','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Viaticos','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','TOTAL2','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Diferencia','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','efectivo_con_el_Operador','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
			echo "</div>";
			echo"<div style='float: left;position: relative;width: 210px;'>";
				echo$libre_v5->input('button','','Flete Real Sin Comision','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('text','flete_real_sin_comision','','','Celdas Medio botones_submenu  ','','','width: 40%;');
				echo$libre_v5->input('button','','Flete Real','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','flete_r','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');  
				echo$libre_v5->input('button','','Gastos Totales','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','gastos_totales_flete','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;'); 
				echo$libre_v5->input('button','','Neto Carro','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','neto_carro','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
				echo$libre_v5->input('button','','Rendimiento','','Medio botone_n','','','width: 60%;');
				echo$libre_v5->input('button','rendimiento_flete','','','Celdas Medio botones_submenu boton_desactivado ','','','width: 40%;');   
			echo "</div>";
		echo "</div>";
	
	
?>