<?php
#dependencias de otras tablas 
$db='almacen';
$libre_v2->db($db,$conexion,$phpv);
$consu_choferes	= 	$libre_v2->consulta	('operadores'	,$conexion	,'','','Nombre'	,'' ,$phpv,'','');
$consu_placas	= 	$libre_v2->consulta	('unidades'		,$conexion	,'','','Placas'	,''	,$phpv,'','');
$consu_clientes	= 	$libre_v2->consulta	('clientes'		,$conexion	,'','','Nombre'	,''	,$phpv,'','');

#DEPENDECIAS GENERALES 
$libre='';
$class='';
#dependencia style 
#variables dependientes 
#variables de diseño 
/*
    $estado_Despiege=array(
        "name"=>'Estado',
        "Subtitulo"=>'',
        "Elementos"=>array('Pendiente','Revisado'),
        "TextComplemento"=>array(),
        "class"=>'botones_submenu',
        "style"=>'width: 60%;',
        "Excesiones"=>array(),
        "libre"=>''
    );
*/
echo"<div id='general_info' class='general_info colores_paleta1a' >";
#### Informacion primaria
    echo"<div id='datos_info' class='datos_info'>";
         
    $inface= new inface($database,$tabla,$phpv,$conexion);
        if(!empty($validacionFormularo))$valida_porta=$validacionFormularo;
        if(!empty($validacion_de_campos))$valida_porta=$validacion_de_campos;
        if(empty($TextColumna))$TextColumna=array();
        if(empty($ColumnasEspeciales))$ColumnasEspeciales=array();
        if(empty($viewValidacion))$viewValidacion='true';
        if(empty($valida_porta)){echo "sistema de validacion no encontrado "; $valida_porta='';}
        $TextColumna=array(
            "N_Cuenta"=>'Cuenta N',
            "FechaSalida"=>'Fecha Salida',
            "FechaRegreso"=>'Fecha Regreso',
            "Carta1"=>'Carta Principal',
            "Carta2"=>'Secundaria 1',
            "Carta3"=>'Secundaria 2',
            "Carta4"=>'Secundaria 3',
            "Difer_1"=>'Saldo Cuenta',
            "Retencion_ISR"=>'Retencion ISR',
        );
        $Interface_de_usuario2=array(
            'tipo'=>array('formulario'=>'true','lista'=>'false'),
            'class'=>array(
                'columnaFija'=>'un_cuartos botone_n ',
                'casilla'=>'botones_submenu tres_cuartos',
                'id'=>''
            ),
            'viewValidacion'=>$viewValidacion,                            ## on/off para visualizar los elementos con error 
            'validacionFormularo'=>$valida_porta,
            'CambiosColumnas'=> array(
                'TextColumna'=> $TextColumna,
                /*
                'ColumnasEspeciales'=>array(
                    'Revisado'=>array(
                        'type'=>'despliegre',
                        'ListaDeDatos'=>array('Revisado','Pendiente')
                    )
                )       //si se activa es te puede ingresar algo diferente a text
                */
            ),
            "Interfaces"=>array(
                "tablas_relacionadas"=>array(
                    "Columnas_a_descargar"=>array(
                        "CLIENTE"=>'Nombre',
                        "CHOFER"=>'Nombre',
                        "PLACAS"=>'Placas',
                    )
                )

            ),
            "Tablas Relacionadas"=>array(
                "CLIENTE"=>array(
                    'ByOrder'=>array(
                        "Columna"	=>'Nombre',
                        "ASC-DESC"	=>'ASC'
                    ),
                ),
                "CHOFER"=>array(
                    'ByOrder'=>array(
                        "Columna"	=>'Nombre',
                        "ASC-DESC"	=>'ASC'
                    ),
                ),
                "PLACAS"=>array(
                    'ByOrder'=>array(
                        "Columna"	=>'Placas',
                        "ASC-DESC"	=>'ASC'
                    ),
                ),
            )
        );
    $inface->Interface_de_usuario2($Interface_de_usuario2);    
   
    echo"</div>";
    
    include("../Librerias/General/Consola_de_operaciones.php");
echo"</div>";	

?>