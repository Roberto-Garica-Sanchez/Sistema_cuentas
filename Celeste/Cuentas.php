<?php
	echo"<div id='general_info' style='float: right;background: #05486cab;width: 220px;right: 0px;top: 0px;bottom: 5px;position: relative;color: white;'>";
    #### Informacion primaria
        echo"<div id='datos_info'>";		
            #tabla Folio
                $database='cuentas_carmesi';
                $tabla='mapa_de_folios';
                $Folio= new inface($database,$tabla,$phpv,$conexion);
                if(empty($view))$view='';
                if(empty($validacionFormularo))$validacionFormularo='';
                $TextColumna=array(
                    "Principal_folio"=>'Folio'
                );
                $ColumnasEspeciales=array();
                $array=array(
                    'tipo'=>array('formulario'=>'true','lista'=>''),
                    'class'=>array(
                        'columnaFija'=>'',
                        #'columnaFija'=>'',
                        'casilla'=>'',
                        #'casilla'=>'',
                        'id'=>''
                    ),
                    'validacionFormularo'=>$validacionFormularo,
                    'CambiosColumnas'=>array(
                        'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
                        'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
                    ),
                    "lista"=>array(
                        "ByOrder"=>array(
                            "Columna"	=>'ID_G',
                            "ASC-DESC"	=>'DESC'
                        )
                    )
                );
                $Folio->Interface_de_usuario($array);    
                /*
            #tabla fechas
                $database='cuentas_carmesi';
                $tabla='fechas';
                $Folio= new inface($database,$tabla,$phpv,$conexion);
                if(empty($view))$view='';
                if(empty($validacionFormularo))$validacionFormularo='';
                $TextColumna=array();
                $ColumnasEspeciales=array();
                $array=array(
                    'tipo'=>array('formulario'=>'true','lista'=>''),
                    'class'=>array(
                        #'columnaFija'=>'botone_n',
                        'columnaFija'=>'',
                        #'casilla'=>'botones_submenu',
                        'casilla'=>'',
                        'id'=>''
                    ),
                    'validacionFormularo'=>$validacionFormularo,
                    'CambiosColumnas'=>array(
                        'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
                        'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
                    ),
                    "lista"=>array(
                        "ByOrder"=>array(
                            "Columna"	=>'ID_G',
                            "ASC-DESC"	=>'DESC'
                        )
                    )
                );
                $Folio->Interface_de_usuario($array);      
                #tabla kilometrajes
                    $database='cuentas_carmesi';
                    $tabla='km';
                    $Folio= new inface($database,$tabla,$phpv,$conexion);
                    if(empty($view))$view='';
                    if(empty($validacionFormularo))$validacionFormularo='';
                    $TextColumna=array();
                    $ColumnasEspeciales=array();
                    $array=array(
                        'tipo'=>array('formulario'=>'true','lista'=>''),
                        'class'=>array(
                            #'columnaFija'=>'botone_n',
                            'columnaFija'=>'',
                            #'casilla'=>'botones_submenu',
                            'casilla'=>'',
                            'id'=>''
                        ),
                        'validacionFormularo'=>$validacionFormularo,
                        'CambiosColumnas'=>array(
                            'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
                            'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
                        ),
                        "lista"=>array(
                            "ByOrder"=>array(
                                "Columna"	=>'ID_G',
                                "ASC-DESC"	=>'DESC'
                            )
                        )
                    );
                    $Folio->Interface_de_usuario($array);  

                    */
        echo"</div>";
?>