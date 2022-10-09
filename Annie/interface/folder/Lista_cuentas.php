<?php
echo "<div id=Lista_cuentas>";
    ## control desplegable celdas 
            if(empty($_POST['style_Desplegable_cuentas']))$_POST['style_Desplegable_cuentas']='block';
            if(!empty($_POST['Desplegable_cuentas'])){
                if($_POST['style_Desplegable_cuentas']=='block'){
                    $DIV_style_display='none';
                }else{
                    $DIV_style_display='block';
                }
            }else{
                $DIV_style_display=$_POST['style_Desplegable_cuentas'];
            }
        echo$libre_v5->input('hidden','style_Desplegable_cuentas',$DIV_style_display,'style_Desplegable_cuentas','','','','float: right;width: max-content');
        echo$libre_v5->input('button','Desplegable_cuentas','Lista Cuentas','','','','onclick="OcultarDIV(this);"','float: right;width: max-content');
    
    echo"<div id='Desplegable_cuentas' class='Contenedor_auto2'     style='display: $DIV_style_display;'>"; 
        $getColumnas=array('ID_G','N_Cuenta','FechaSalida','FechaRegreso','CLIENTE','PLACAS','Revisado','Sueldo',);
        $Consulta_tabla= new inface($database,$tabla,$phpv,$conexion);
        #### consentrado de informacion 
        $array_consulta=array(
            "tabla"=>$tabla,
            "Operacion"=>array(	
                #'viewSQL'=>'true',
                'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    #"getColumnas"	=>array('*'),
                    "getColumnas"	=>$getColumnas,
                    "ByOrder"		=>array(
                        "Columna"	=>'ID_G',
                        "ASC-DESC"	=>'DESC'
                    ),
                ),
            ),
            'Consulta_especifica'=>array(
                "name_boton_descarga"=>'Descarga_Cuenta'
            ),
            'class'=>array(
                'columnaFija'=>'Diseno_botones1 ',
                'casilla'=>'Diseno_botones1 ',
                'id'=>'Diseno_boton_id '
            ),
            'Div_principal'=>"<div style='position: relative;float: left;overflow: auto;max-height: 300px;width: max-content;margin: 0px 12px 0px 0px;'>",
            'CambiosColumnas'=> array(
                'TextColumna'=>array(
                    'N_Cuenta'=>'Numero de Cuenta',
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
?>