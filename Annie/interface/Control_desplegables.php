<?php 

$interfas=array(
    "database"=>'',
    "tabla"=>'',
    "phpv"=>$phpv,
    "conexion"=>$conexion,
);

$interfas =new interfas($interfas);	
#### Datos Generales
    $array=array(
        "name"=>'general_datos',
        "value"=>'Datos Generales'
    );
    $interfas->control_ventana($array);
#### Desplegable_cuentas
    $array=array(
        "name"=>'Desplegable_cuentas',
        "value"=>'Lista de Cuentas'
    );
    $interfas->control_ventana($array);
#### gene_actua
    $array=array(
        "name"=>'gene_actua',
        "value"=>'Calculos Cuentas Actual',
        "memoria"=>array(
            'type'=>'text'
        )
    );
    $interfas->control_ventana($array);



?>