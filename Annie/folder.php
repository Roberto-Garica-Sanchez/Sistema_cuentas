<?php

$database='sistema_cuentas_annie';
$tabla='folio';
$genera_interface_name='ConsultaCuenta';
$columnaByOrder='ID_G';
$DirecionByOrder='ASC';
$libre_v2->db($database,$conexion,$phpv);	
#### #### Sistema de descarga
include('Descargar/Cuentas.php');

#### #### Sistema de validacion 
include('Validaciones/folio.php');
$viewValidacion='false';
include_once('interface/nuevo_registro/datos_principales.php');

	######################## Lista De Cuentas
    $_POST['style_Desplegable_cuentas']='block';# mantiene la ventana avierta simpre 
    include_once('interface/folder/Lista_cuentas.php');	
?>