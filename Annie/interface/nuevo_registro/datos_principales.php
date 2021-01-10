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
echo"<div id='general_info' class='general_info colores_paleta1a' >";
#### Informacion primaria
    echo"<div id='datos_info' class='datos_info'>";
        #input($type,$name,$value,$id,$class,$title,$libre,$style)
        
        echo $libre_v5->input('button','','Informacion General','','botone_n','','disabled','width: 100%;');
        echo $libre_v5->input('text','','Estado','','botone_n','','disabled','width: 40%;');
        #echo $libre_v5->input('text','',$estado,'','botones_submenu','','readonly="readonly"','width: 60%;');
        echo $libre_v5->despieges($estado_Despiege);

        echo $libre_v5->input('text','','Operador','','botone_n','','disabled  ','width: 40%;');
        echo $libre_v2->despliegre_mysql	('CHOFER','Operador',$consu_choferes,'Nombre',$phpv,"style='width: 60%;' id='CHOFER' onchange='carga_arrastrados();'",'botones_submenu','Nombre','');

        echo $libre_v5->input('text','','Unidad','','botone_n','','disabled','width: 40%;');
        echo $libre_v2->despliegre_mysql	('PLACAS','Unidad',$consu_placas,'Placas',$phpv,"style='width: 60%;' id='placas'",'botones_submenu','Placas','');

        echo $libre_v5->input('text','','Cliente','','botone_n','','disabled','width: 40%;');
        echo $libre_v2->despliegre_mysql	('CLIENTE','Cliente',$consu_clientes,'Nombre',$phpv,"style='width: 60%; ' id='cliente'",'botones_submenu','Nombre','');

        echo $libre_v5->input('hidden','Carta','',$_POST['Carta'],'botones_submenu','','maxlength ="4"onkeypress="return valida_n(event,Carta2)"','width: 60%;');

        echo $libre_v5->input('button','','Cartas Portes','','botone_n','','disabled','width: 100%;');
        echo $libre_v5->input('button','','Principal','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Carta1','','Carta1','botones_submenu','','maxlength ="4"onkeypress="return valida_n(event,Carta2)"','width: 60%;');
        echo $libre_v5->input('button','','Secundaria 1','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Carta2','','Carta2','botones_submenu','','maxlength ="4"onkeypress="return valida_n(event,Carta3)"','width: 60%;');
        echo $libre_v5->input('button','','Secundaria 2','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Carta3','','Carta3','botones_submenu','','maxlength ="4"onkeypress="return valida_n(event,Carta4)"','width: 60%;');
        echo $libre_v5->input('button','','Secundaria 3','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Carta4','','Carta4','botones_submenu','','maxlength ="4" onkeypress="return valida_n(event,Fecha_Inicio)"','width: 60%;');

        echo $libre_v5->input('button','','Fechas de Viaje','','botone_n','','disabled','width: 100%;');
        echo $libre_v5->input('button','','Inicio','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('date','Fecha_Inicio','','Fecha_Inicio','botones_submenu','','onkeypress="return valida_n(event,Fecha_Final)"','width: 60%;');
        echo $libre_v5->input('button','','Final','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('date','Fecha_Final','','Fecha_Final','botones_submenu','','onkeypress="return valida_n(event,Kilometraje_Inicio)"','width: 60%;');
        
        echo $libre_v5->input('button','','Kilometrajes','','botone_n','','disabled','width: 100%;');
        echo $libre_v5->input('button','','Inicio','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Kilometraje_Inicio','','Kilometraje_Inicio','botones_submenu','','onkeypress="return valida_n(event,Kilometraje_Final)"','width: 60%;');
        echo $libre_v5->input('button','','Final','','botone_n','','disabled','width: 40%;');
        echo $libre_v5->input('text','Kilometraje_Final','','Kilometraje_Final','botones_submenu','','onkeypress="return valida_n(event,)"','width: 60%;');
        
        echo $libre_v5->input('button','','Comentarios','','botone_n','','disabled','width: 100%;');
        echo $libre_v2->input2('tarea','Descripcion','',''	,"width: 100%;height: 60px;",'come'		,' placeholder="" maxlength ="250"','botones_submenu');
       echo"</div>";
    /* 
    echo"<div style='position: relative;'>";
        echo $libre_v2->input2('submit','operador','',"Limpiar"			,'									bottom: 5px;		right: 110px;width: 110px;'					,'limpia_cuenta'		,'','botones_submenu');
        echo $libre_v2->input2('submit','operador','',"Guardar"			,'					width: 110px;	bottom: 5px;		right: 0px;'	,'guarda_cuenta'		,'','botones_submenu');
        echo $libre_v2->input2('submit','operador','',"Guardar Cambios"	,'display: none;	width: 110px;	bottom: 5px;		right: 0px;'	,'cambio_cuenta'		,'','botones_submenu');
        echo $libre_v2->input2('submit','operador','',"Confirmar"		,'display: none;	width: 110px;	bottom: 40px;	right: 0px;background: yellow;color: black;','confirma_cuenta','','botones_submenu');
    echo"</div>";
    */
    
    include("../Librerias/General/Consola_de_operaciones.php");
echo"</div>";	

?>