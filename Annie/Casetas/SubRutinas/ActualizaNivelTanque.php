<?php
    #$tanquemodificado
    #busca en repostajes_tanques (compra de diesel) y repostaje_unidades (cargas de Diesel) 
    #todas los registros relacionados a el tanque y los sumas automaticamente 
    /*
        #consulta con la combinacion de tablas, descargaba datos repetidos necesita un filtro para omitir los registros
        $array=array(
            "tabla"=>'repostajes_tanques',#$tabla,
            "Operacion"=>
            array(
                'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>Array('(SUM(repostajes_tanques.Litros_Resividos)-SUM(repostajes_unidades.Total_Despachado))'),
                    "BuscaColumnas" =>array('IDTanque'),//array()
                    "BuscaDatos"    =>array($tanquemodificado),//array()
                    "Condiciones"	=>array(),
                    "LIMIT"			=>array(
                        "Elementos"=>'',
                        "posicion"=>''
                    ),
                    "JOIN"=>array(
                        'Inner Join'=>Array(
                            'ColumnaUnion'=>'IDTanque',	
                            'vinculos'=>array(
                                'tabla'=>array('repostajes_unidades'),
                                'columna'=>array('TanqueSurtidor'),
                            )
                        )
                    )

                )
            )
        ); 
        $Ares_v1->GeneraSql($array);
        $Ares_v1->viewsql();
        $res=$Ares_v1->getsql();
        $libre_v2->db('combustible',$conexion,$phpv);
        $resultado=$libre_v2->ejecuta($conexion,$res,$phpv);
        $datos=mysqli_fetch_row($resultado);
        echo $datos[0];
    */
    #busca las compras de diesel que coincidadn con el tanque 
        $array=array(
            "tabla"=>'repostajes_tanques',
            "Operacion"=>
            array('SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>array('SUM(Litros_Resividos)'),
                    "BuscaColumnas"	=>array('IDTanque'),
                    "BuscaDatos"	=>array($tanquemodificado),
                )
            )
        );

        $Ares_v1->GeneraSql($array);
        #$Ares_v1->viewsql();
        $res=$Ares_v1->getsql();
        $libre_v2->db('combustible',$conexion,$phpv);
        $resultado=$libre_v2->ejecuta($conexion,$res,$phpv);
        $res=mysqli_fetch_row($resultado);
        $LitrosComprados=$res[0];
    #busca los consumos de combustibles
        $array=array(
            "tabla"=>'repostajes_unidades',
            "Operacion"=>
            array('SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>array('SUM(Total_Despachado)'),
                    "BuscaColumnas"	=>array('TanqueSurtidor'),
                    "BuscaDatos"	=>array($tanquemodificado),
                )
            )
        );

        $Ares_v1->GeneraSql($array);
        #$Ares_v1->viewsql();
        $res=$Ares_v1->getsql();
        $libre_v2->db('combustible',$conexion,$phpv);
        $resultado=$libre_v2->ejecuta($conexion,$res,$phpv);
        $res=mysqli_fetch_row($resultado);
        $LitrosConsumidos=$res[0];

    #actualiza los datos del tanque apartir de la informacion obteneidad 
        /*
            echo$LitrosComprados;
            echo"<br>";
            echo$LitrosConsumidos;
            echo"<br>";
            echo$litros_restantes=$LitrosComprados-$LitrosConsumidos;    
        */
        $litros_restantes=$LitrosComprados-$LitrosConsumidos;   
        $array=array(
            "tabla"=>'Tanques',
            "Operacion"=>
            array('UPDATE'=>array(
                    "Activar"	=>'true',//'false'
                    "LIKE"		=>'false',//'false'
                    "ModifiColumnas"    =>array('NivelActual'),//array()
                    "ModifiDatos"    	=>array( $litros_restantes),//array()
                    "BuscaColumnas"  	=>array('Nombre'),//array()
                    "BuscaDatos"     	=>array($tanquemodificado),//array()
                ), 
            )
        );
        $Ares_v1->GeneraSql($array);
        #$Ares_v1->viewsql();
        $res=$Ares_v1->getsql();
        $libre_v2->ejecuta($conexion,$res,$phpv);
        
    #comprueba si los registro fueron cambiado de una tabla a otra
    if(!empty($datos['Registro_original']['TanqueSurtidor']))$datos_original=$datos['Registro_original']['TanqueSurtidor'];
    if(!empty($datos['Registro_original']['IDTanque']))$datos_original=$datos['Registro_original']['IDTanque'];
    if(!empty($datos['Tanque']['Nombre']) and !empty($datos_original) and $datos['Tanque']['Nombre']!=$datos_original)
    {
        $tanqueOriginal=$datos_original;
        #$tanqueOriginal=$datos['Registro_original']['TanqueSurtidor'];
        #busca las compras de diesel que coincidadn con el tanque 
            $array=array(
                "tabla"=>'repostajes_tanques',
                "Operacion"=>
                array('SELECT'=>array(
                        "Activar"	=>'true',
                        "LIKE"		=>'falses',
                        "getColumnas"	=>array('SUM(Litros_Resividos)'),
                        "BuscaColumnas"	=>array('IDTanque'),
                        "BuscaDatos"	=>array($tanqueOriginal),
                    )
                )
            );

            $Ares_v1->GeneraSql($array);
            #$Ares_v1->viewsql();
            $res=$Ares_v1->getsql();
            $libre_v2->db('combustible',$conexion,$phpv);
            $resultado=$libre_v2->ejecuta($conexion,$res,$phpv);
            $res=mysqli_fetch_row($resultado);
            $LitrosComprados=$res[0];
        #busca los consumos de combustibles
            $array=array(
                "tabla"=>'repostajes_unidades',
                "Operacion"=>
                array('SELECT'=>array(
                        "Activar"	=>'true',
                        "LIKE"		=>'falses',
                        "getColumnas"	=>array('SUM(Total_Despachado)'),
                        "BuscaColumnas"	=>array('TanqueSurtidor'),
                        "BuscaDatos"	=>array($tanqueOriginal),
                    )
                )
            );

            $Ares_v1->GeneraSql($array);
            #$Ares_v1->viewsql();
            $res=$Ares_v1->getsql();
            $libre_v2->db('combustible',$conexion,$phpv);
            $resultado=$libre_v2->ejecuta($conexion,$res,$phpv);
            $res=mysqli_fetch_row($resultado);
            $LitrosConsumidos=$res[0];

        #actualiza los datos del tanque apartir de la informacion obteneidad 
            /*
            echo$LitrosComprados;
            echo"<br>";
            echo$LitrosConsumidos;
            echo"<br>";
            echo$litros_restantes=$LitrosComprados-$LitrosConsumidos;    
            */
            $litros_restantes=$LitrosComprados-$LitrosConsumidos;   
            
            $array=array(
                "tabla"=>'Tanques',
                "Operacion"=>
                array('UPDATE'=>array(
                        "Activar"	=>'true',//'false'
                        "LIKE"		=>'false',//'false'
                        "ModifiColumnas"    =>array('NivelActual'),//array()
                        "ModifiDatos"    	=>array( $litros_restantes),//array()
                        "BuscaColumnas"  	=>array('Nombre'),//array()
                        "BuscaDatos"     	=>array($tanqueOriginal),//array()
                    ), 
                )
            );
            $Ares_v1->GeneraSql($array);
            #$Ares_v1->viewsql();
            $res=$Ares_v1->getsql();
            $libre_v2->ejecuta($conexion,$res,$phpv);
            
    }else{
        /*
        echo $datos['Tanque']['Nombre'];
        echo"<br>";
        echo$datos_original;
        echo"no cambio de tabla";
        */
    }
?>