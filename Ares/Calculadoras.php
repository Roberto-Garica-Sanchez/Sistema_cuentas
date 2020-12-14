<?php

if(!empty($calculadora)){
/*Calculadora: 
Fechas
Diseño 
modificasiones 
*/
/*
$Calculadora=array(
    'Nombre'=>'',
    "version"=>''
)
*/
    
   
}
function Calculadora_Annie_Anterior_A_2020_06_29(){
    
    /*
    #### calcula litros y kilometrajes [ok]2020-06-23
		if(
			!empty($_POST['km_f']) and 
			!empty($_POST['km_i']) and 
			!empty($_POST['crome_f']) and 
			!empty($_POST['crome_i'])
		){
			$dif_km			= round($_POST['km_f']-$_POST['km_i'],2);
			$dif_despacho	= $_POST['crome_f']-$_POST['crome_i'];
			$km_lts			= round($dif_km/$dif_despacho,2);
		}
	####[totales]	
		$total=0;
		for($x=1; $x<=8; $x++){
			for($y=1; $y<=20; $y++){
				$name=$x."TEXT".$y;		
				if(!empty($_POST[$name]))$total=$total+$_POST[$name];
			}
			if(!empty($_POST["TOTAL".$x]))$_POST["TOTAL".$x]=$total;
			$total=0;
		}
		//4TEXT_VIA13
		for($y=1; $y<=20; $y++){$name="4TEXT_VIA".$y;if(!empty($_POST[$name]))$total=$total+$_POST[$name];$_POST["TOTAL9"]=$total;}$total=0;
		for($y=1; $y<=5; $y++){$name="ab".$y;if(!empty($_POST[$name]))$total=$total+$_POST[$name];$_POST["Totalab"]=$total;}$total=0;
		for($y=1; $y<=5; $y++){$name="ac".$y;if(!empty($_POST[$name]))$total=$total+$_POST[$name];$_POST["Totalac"]=$total;}$total=0;
	####[calculos]
		if(
			!empty($_POST['TOTAL1']) and 
			!empty($_POST['TOTAL2']) and 
			!empty($_POST['TOTAL4']) and 
			!empty($_POST['TOTAL5']) and 
			!empty($_POST['TOTAL6']) and 
			!empty($_POST['TOTAL7']) and 
			!empty($_POST['TOTAL8']) and 
			!empty($_POST['Totalac']) and 
			!empty($_POST['Totalab']) and 
			!empty($_POST['comi'])
		){
            #Calculadora Antigua Diseñada para su uso entre 2019 a el 06_29_2020
			$g_t			= $_POST['TOTAL4']+$_POST['TOTAL5']+$_POST['TOTAL6']+$_POST['TOTAL7']+$_POST['TOTAL8'];	//casetas+facturas+ryr+guias+maniobras
			$comicion		= $_POST['TOTAL1']*0.15;                        //comicion pre-definida (para chofer)
			$comicion=$_POST['TOTAL1']*($_POST['comi']/100);                //comicion variada	(para chofer)
			$rete=($comicion*7.5)/100;                                      //gatos_total+comision
			$suedo_chofer	= round($comicion-$suedo_chofer,2);             //Isr
			$t_g			= round($g_t,2);    
			$dif1			= round($_POST['TOTAL2']-($t_g+$ret),2);        //viaticos-total_gastos+retencion

			$dif2			= round($_POST['TOTAL2']-$g_t,2);               //viaticos-gatos_total
			$dif3			= $dif1+$_POST['Totalac'];                      //dif1+ acumulado
			//gasto_t + chofer_sinISA + diesel + viapass    
			$_POST['Total_Total']=$dif4=$_POST['Totalab']+$dif1+$_POST['Totalac'];  //
			//$pre_d	=	$dif1+$_POST[Totalac];                          // ??? esta mal ??? repetido con el anterior
			//$dif4	=	$pre_d+$_POST[TOTAL9];								//
		}

	#### Calcula Flete Real 
		if(
			!empty($_POST['flete_r']) and 
			!empty($_POST['TOTAL3']) and 
			!empty($_POST['TOTAL9'])
		){
			$comi			= round($_POST['flete_r']*0.0928,2);					//Flete_Real * 0.0928
			$t_d_g			= round($_POST['TOTAL3']+$t_g+$suedo_chofer+$_POST['TOTAL9'],2);//diesel+total_gatos+comision
			$neto			= round($_POST['flete_r']-$t_d_g,2);
			$re				= round($_POST['flete_r']*0.01,2);
			$re				= round($neto/$re,2);
		}
	
    */
    #calculo diesel y presio de diesel 
            #$litro_totales_consumidos=$litros_finales-$litros_iniciales;
            #$precio_de_litros_consumidos= $litro_totales_consumidos*$precio_por_litro;# $precio_por_litro=20.2;
            if(!empty($_POST['crome_f'])&&!empty($_POST['crome_i'])){
                $_POST['crome_t']=$_POST['crome_f']-$_POST['crome_i'];     
            }else{
                $_POST['crome_t']=0;
            }
            if(empty($_POST['presio_d']))$_POST['presio_d']=20.2;
            $_POST['precio_de_litros_consumidos']=$_POST['crome_t']*$_POST['presio_d'];


    #calculo de kilometros
        #$kilometros_recoridos=$kilometraje_final-$kilometraje_inicial;            
        if(!empty($_POST['km_f'])&&!empty($_POST['km_i'])){
            $_POST['Total_km']=$_POST['km_f']-$_POST['km_i'];
        }else{
            $_POST['Total_km']=0;
        }


    #calculo de Rendiemientos
        #$rendiemiento_litros_de_diesel=$litro_totales_consumidos/$kilometros_recoridos            
        if(!empty($_POST['crome_t'])&&!empty($_POST['Total_km'])){
            $_POST['km_lts']=$_POST['crome_t']/$_POST['Total_km'];
        }else{
            $_POST['km_lts']=0;
        }
       
    ####[totales]	
        for ($n=1; $n <=9; $n++) { 
            $total=0;
            for ($i=1; $i <= 20 ; $i++) { 
                $name=$n.'TEXT'.$i;
                if(!empty($_POST[$name]))$total=$_POST[$name]+$total;
            }
            $_POST['TOTAL'.$n]=$total;
        }
        for($y=1; $y<=5; $y++){
            $name="ab".$y;
            if(!empty($_POST[$name])){
                $total=$total+$_POST[$name];
            }
            $_POST["Totalab"]=$total;
        }
        $total=0;
        for($y=1; $y<=5; $y++){
            $name="ac".$y;
            if(!empty($_POST[$name])){$total=$total+$_POST[$name];}
            $_POST["Totalac"]=$total;
        }
        $total=0;
    #Gastos En viaje         
        #$g_t			= $_POST['TOTAL4']+$_POST['TOTAL5']+$_POST['TOTAL6']+$_POST['TOTAL7']+$_POST['TOTAL8'];	
        #casetas+facturas+ryr+guias+maniobras

        if(empty($_POST['TOTAL4']))$_POST['TOTAL4']=0;
        if(empty($_POST['TOTAL5']))$_POST['TOTAL5']=0;
        if(empty($_POST['TOTAL6']))$_POST['TOTAL6']=0;
        if(empty($_POST['TOTAL7']))$_POST['TOTAL7']=0;
        if(empty($_POST['TOTAL8']))$_POST['TOTAL8']=0;
        $_POST['gastos_en_viaje']=0;
        for ($n=4; $n <=8; $n++) { 
            $_POST['gastos_en_viaje']=$_POST['gastos_en_viaje']+$_POST['TOTAL'.$n];
        }
    #gastos Operador
        #$comicion=$_POST['TOTAL1']*0.15;             
        #comicion pre-definida (para chofer)        
        if(empty($_POST['comi']))$_POST['comi']=15;
        if(!empty($_POST['TOTAL1'])){
            $_POST['sueldo_operador']=$_POST['TOTAL1']*($_POST['comi']/100);
        }else{
            $_POST['sueldo_operador']=0;
        }
    #retencion
        #$rete=($comicion*7.5)/100;
        //gatos_total+comision
        if(empty($_POST['porcen_ISR']))$_POST['porcen_ISR']=7.5;
        if(!empty($_POST['sueldo_operador'])&&!empty($_POST['porcen_ISR'])){  
            $_POST['ISR_operador']=$_POST['sueldo_operador']*($_POST['porcen_ISR']/100);
        }else{
            $_POST['ISR_operador']=0;
        }
    #$suedo_chofer	= round($comicion-$suedo_chofer,2);             //Isr
}
function Calculadora_Annie_2020_06_29($array){
    /* #datos
        ## input 
            
            
            *arrays 
                viaticos 
                fletes 
                diesel 
                casetas
                facturas
                ryr
                guias
                maniobras
                casetas Via pass

        ## output
        *desgloses 
        *ivas 


    */
    /*#### formulas 
        #calculo diesel y presio de diesel 
            $litro_totales_consumidos=$litros_finales-$litros_iniciales;
            $precio_de_litros_consumidos= $litro_totales_consumidos*$precio_por_litro;# $precio_por_litro=20.2;
        #calculo de kilometros
            $kilometros_recoridos=$kilometraje_final-$kilometraje_inicial;
        #calculo de Rendiemientos
            $rendiemiento_litros_de_diesel=$litro_totales_consumidos/kilometros_recoridos
        #comiciones
            $comicion_flete_completo=$flete_completo*$Porcentaje_comicion_flete;#Porcentaje_comicion_flete=0.06;#sin uso aparente 
        #sumas de celdas en forma e columnas (1,2,4,5,6,n)
            #$desglose=total*1.15;
            #iva=$total*0.15;
            #Diesel
                *desglose $desglose=total*1.15;
                *iva
            #casetas
                *desglose
                *iva
            #facturas
                *desglose
                *iva
            #ryr
            #Guias
            #maniobras
            #casetas electronicas
                *desglose
                *iva
                
        #Gastos En viaje 
            $gastos_en_viaje=$total_casetas+$total_facturas+$total_ryr+$total_guias+$total_maniobras;
        #gastos Operador
            $sueldo_operador=$total_flete_viaje*porcen_operador;          #$porcentaje_operador=15%;
            #retencion
            $ISR_operador=$sueldo_operador*porcen_ISR;              #$porcen_ISR=7.5%
            $sueldo_operador_menos_ISR=$sueldo_operador-$ISR_operador;
        #gastos totales a el flete
            $gastos_de_flete=$gastos_en_viaje+$sueldo_operador_menos_ISR;
        
        #saldo final para el operador 
            $Sueldo_Final_Operador_en_cuenta_actual=$gastos_de_flete-$viaticos;
        #diferencia gastos vs viaticos 
            $efectivo_con_el_Operador=gastos_en_viaje-$viaticos;

        ####    Gastos Oficina 
            $total_diesel+($flete_completo*0.0928);
            $gastos_totales_flete=$total_diesel+$total_casetas_electronias+$gastos_de_flete;
            $neto_carro=$flete_completo-$gastos_totales_flete;
            $rendimiento_flete=$neto_carro/($flete_completo*0.01);

        #saldo final de la cuentanta 
            $saldo_final_cuenta=($Sueldo_Final_Operador_en_cuenta_actual+$total_acumulados)-$total_abonos;
    */
        #calculo diesel y presio de diesel 
            #$litro_totales_consumidos=$litros_finales-$litros_iniciales;
            #$precio_de_litros_consumidos= $litro_totales_consumidos*$precio_por_litro;# $precio_por_litro=20.2;
            if(!empty($_POST['crome_f'])&&!empty($_POST['crome_i'])){
                $_POST['crome_t']=$_POST['crome_f']-$_POST['crome_i'];     
            }else{$_POST['crome_t']=0;}
            if(empty($_POST['presio_d']))$_POST['presio_d']=20.2;
            $_POST['precio_de_litros_consumidos']=$_POST['crome_t']*$_POST['presio_d'];


        #calculo de kilometros
            #$kilometros_recoridos=$kilometraje_final-$kilometraje_inicial;            
            if(!empty($_POST['km_f'])&&!empty($_POST['km_i'])){
                $_POST['Total_km']=$_POST['km_f']-$_POST['km_i'];
            }else{
                $_POST['Total_km']=0;
            }


        #calculo de Rendiemientos
            #$rendiemiento_litros_de_diesel=$litro_totales_consumidos/$kilometros_recoridos            
            if(!empty($_POST['crome_t'])&&!empty($_POST['Total_km'])){
                $_POST['km_lts']=$_POST['crome_t']/$_POST['Total_km'];
            }else{
                $_POST['km_lts']=0;
            }
       
        #comiciones
            if(empty($_POST['Porcentaje_comicion_flete']))$_POST['Porcentaje_comicion_flete']=0.06;
            #$comicion_flete_completo=$flete_completo*$Porcentaje_comicion_flete;#Porcentaje_comicion_flete=0.06;     
            if(!empty($_POST['flete_r'])&&!empty($_POST['Porcentaje_comicion_flete'])){            
                $_POST['comicion_flete_completo']=$_POST['flete_r']*$_POST['Porcentaje_comicion_flete'];
            }else{
                $_POST['comicion_flete_completo']=0;
            }
        #sumas (fletes,viaticos,diesel,casetas,facturas,ryr,guias,mniobras,casetas electronicas) 
            for ($n=1; $n <=9; $n++) { 
                $total=0;
                for ($i=1; $i <= 20 ; $i++) { 
                     $name=$n.'TEXT'.$i;
                    if(!empty($_POST[$name])){
                        if (is_numeric($_POST[$name]))
                        $total=$_POST[$name]+$total;
                    }
                }
                $_POST['TOTAL'.$n]=$total;
            }

        #Gastos En viaje 
            #$gastos_en_viaje=$total_casetas+$total_facturas+$total_ryr+$total_guias+$total_maniobras;
            if(empty($_POST['TOTAL4']))$_POST['TOTAL4']=0;
            if(empty($_POST['TOTAL5']))$_POST['TOTAL5']=0;
            if(empty($_POST['TOTAL6']))$_POST['TOTAL6']=0;
            if(empty($_POST['TOTAL7']))$_POST['TOTAL7']=0;
            if(empty($_POST['TOTAL8']))$_POST['TOTAL8']=0;
            $_POST['gastos_en_viaje']=0;
            for ($n=4; $n <=8; $n++) { 
                $_POST['gastos_en_viaje']=$_POST['gastos_en_viaje']+$_POST['TOTAL'.$n];
            }

        
        #gastos Operador
            #$porcentaje_operador=15%;
            if(empty($_POST['comi']))$_POST['comi']=15;
            #$sueldo_operador=$total_flete_viaje*porcen_operador;          #$porcentaje_operador=15%;
            if(!empty($_POST['TOTAL1'])){
                $_POST['sueldo_operador']=$_POST['TOTAL1']*($_POST['comi']/100);
            }else{
                $_POST['sueldo_operador']=0;
            }
            #retencion
            if(empty($_POST['porcen_ISR']))$_POST['porcen_ISR']=7.5;
            #$ISR_operador=$sueldo_operador*$porcen_ISR;              #$porcen_ISR=7.5%
            if(!empty($_POST['sueldo_operador'])&&!empty($_POST['porcen_ISR'])){  
                $_POST['ISR_operador']=$_POST['sueldo_operador']*($_POST['porcen_ISR']/100);
            }else{
                $_POST['ISR_operador']=0;
            }
            #$sueldo_operador_menos_ISR=$sueldo_operador-$ISR_operador;
            if(!empty($_POST['sueldo_operador'])&&!empty($_POST['ISR_operador'])){  
                $_POST['sueldo_operador_menos_ISR']=$_POST['sueldo_operador']-$_POST['ISR_operador'];
            }else{
                $_POST['sueldo_operador_menos_ISR']=0;
            }
            #if(!empty($_POST['flete_r'])&&!empty($_POST['Porcentaje_comicion_flete'])){  
        #gastos totales a el flete 
            if(!empty($_POST['gastos_en_viaje'])&&!empty($_POST['sueldo_operador_menos_ISR'])){  
                $_POST['gastos_de_flete']=$_POST['gastos_en_viaje']+$_POST['sueldo_operador_menos_ISR'];
            }else{
                $_POST['gastos_de_flete']=0;
            }
        #saldo final para el operador 
            #$Sueldo_Final_Operador_en_cuenta_actual=$gastos_de_flete-$viaticos;
            if(!empty($_POST['gastos_de_flete'])&&!empty($_POST['TOTAL2'])){  
                $_POST['Sueldo_Final_Operador_en_cuenta_actual']=$_POST['gastos_de_flete']-$_POST['TOTAL2'];
            }else{
                $_POST['Sueldo_Final_Operador_en_cuenta_actual']=0;
            }
        ##abonos
       $Totalab=0;
        for ($i=1; $i <= 20 ; $i++) { 
            $name='ab'.$i;
            if(!empty($_POST[$name])){
                if (is_numeric($_POST[$name]))
                $Totalab=$_POST[$name]+$Totalab;
            }
        }
        $_POST['Totalab']=$Totalab;
       ##abonos
       $Totalac=0;
        for ($i=1; $i <= 20 ; $i++) { 
            $name='ac'.$i;
            if(!empty($_POST[$name])){
                if (is_numeric($_POST[$name]))
                $Totalac=$_POST[$name]+$Totalac;
            }
        }
       $_POST['Totalac']=$Totalac;
        #diferencia gastos vs viaticos 
            #$efectivo_con_el_Operador=gastos_en_viaje-$viaticos;
            if(!empty($_POST['gastos_en_viaje'])&&!empty($_POST['TOTAL2'])){  
                $_POST['efectivo_con_el_Operador']=$_POST['gastos_en_viaje']-$_POST['TOTAL2'];
            }else{
                $_POST['efectivo_con_el_Operador']=0;
            }
        ####    Gastos Oficina 
            
            #$total_diesel+($flete_completo*0.0928);
            #$gastos_totales_flete=$total_diesel+$total_casetas_electronias+$gastos_de_flete;
            #$neto_carro=$flete_completo-$gastos_totales_flete;
            #$rendimiento_flete=$neto_carro/($flete_completo*0.01);
            if(empty($_POST['Porcentaje_comicion_flete_a_cliente']))$_POST['Porcentaje_comicion_flete_a_cliente']=0.0928;
            if(!empty($_POST['flete_r'])&&!empty($_POST['Porcentaje_comicion_flete_a_cliente'])){            
                $_POST['comicion_flete_completo_a_cliente']=$_POST['flete_r']*$_POST['Porcentaje_comicion_flete_a_cliente'];
            }else{
                $_POST['comicion_flete_completo_a_cliente']=0;
            }
            
            $_POST['gastos_totales_flete']=0;
            if(!empty($_POST['TOTAL3']))                            {$_POST['gastos_totales_flete']=$_POST['gastos_totales_flete']+$_POST['TOTAL3']; }
            if(!empty($_POST['TOTAL9']))                            {$_POST['gastos_totales_flete']=$_POST['gastos_totales_flete']+$_POST['TOTAL9']; }
            if(!empty($_POST['gastos_de_flete']))                   {$_POST['gastos_totales_flete']=$_POST['gastos_totales_flete']+$_POST['gastos_de_flete']; }
            if(!empty($_POST['comicion_flete_completo_a_cliente'])) {$_POST['gastos_totales_flete']=$_POST['gastos_totales_flete']+$_POST['comicion_flete_completo_a_cliente'];}
            if(!empty($_POST['precio_de_litros_consumidos']))       {$_POST['gastos_totales_flete']=$_POST['gastos_totales_flete']+$_POST['precio_de_litros_consumidos']; }

            if(!empty($_POST['flete_r']) && !empty($_POST['gastos_totales_flete'])){
                $_POST['neto_carro']=$_POST['flete_r']-$_POST['gastos_totales_flete'];
            }else{
                $_POST['neto_carro']=0;
            }
            if(!empty($_POST['neto_carro']) && !empty($_POST['flete_r'])){
                $_POST['rendimiento_flete']=$_POST['neto_carro']/($_POST['flete_r']*0.01);
            }
            else{
                $_POST['rendimiento_flete']=0;
            }
            
            
    $datos_res=array('');
    return $datos_res;
}
?>