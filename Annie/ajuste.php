<?php
$menu='menu-list';
$listn1=Choferes;
$listn2=Placas;
$listn3=Clientes;
$listn4='';
$listn5='';
$listn6='';
$listn7='';
$listn8='';
$listn9='';
$listn10='';
$listn11='';
$style='top: 250px;';
include('lista.php');
include('libre_aju.php');
if ($_POST['menu-list']==$listn1)
{
	if ($_POST[opcion1]==Nuevo)$_POST[opciones1]='';
	if ($_POST[opciones1]==''){
	 $title='Nuevo Registro';
         $i1=Nombre;
         $i2=Edad;
         $i3=Direccion;
         $d1=input2(text,Nombre,'',strtoupper($_POST[Nombre]));
         $d2=input2(text,edad,'',strtoupper($_POST[edad]));
         $d3=input2(text,direcciones,'',strtoupper($_POST[direcciones]));
         $d4=input2(submit,agregar,'',Agregar);
	 $com1=compro($_POST[Nombre],choferes,Nombre_Ch,$conexion);
	 if ($com1=='0'){$title='Ya Existe Este Registro';$dc1=red;}
	 if (($_POST[Nombre]<>'')and($_POST[agregar]==Agregar)and($com1<>'0')){Escribe($conexion,choferes);Escribe($conexion,choferes_on);$consu1=consulta('choferes',$conexion);}
	}else{
	 $i1=Selecionado;
	 $d1=$_POST[opciones1].input2(hidden,opciones1,'',$_POST[opciones1]);
	 $d2=input2(submit,Eliminar,'Eliminar de forma permanente Este Cliente',Eliminar);
	 $d3=input2(submit,opcion1,'',Nuevo);
	 if (($_POST[Eliminar]==Eliminar)and($_POST[opciones1]<>'')){
		 $i2=Eliminar;$dc1=orange;$tc2=red;
		 $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
		}
	if ($_POST[Eliminar]==Confirmar){delete(choferes_on); $consu1=consulta('choferes',$conexion); $title='Registro Eliminado';$i1=$d1=$d2=$d4='';}
	}
}
if ($_POST['menu-list']==$listn2)
{
        if ($_POST[opcion2]==Nuevo)$_POST[opciones2]='';
        if ($_POST[opciones2]==''){
         $title='Nuevo Registro';
         $i1=Placas;
         $i2=Marca;
         $i3=Modelo;
	 $i4=N°E;
	 $i5=Color;
         $d1=input2(text,placas,'',strtoupper($_POST[placas]),'','',6);
         $d2=input2(text,marca,'',strtoupper($_POST[marca]));
         $d3=input2(text,modelo,'',strtoupper($_POST[modelo]));
         $d4=input2(text,n_e,'',strtoupper($_POST[n_e]));
         $d5=input2(text,color,'',strtoupper($_POST[color]));
         $d6=input2(submit,agregar,'',Agregar);
         $com1=compro($_POST[placas],placas,Placas,$conexion);
         if ($com1=='0'){$title='Ya Existe Este Registro';$dc1=red;}
         if (($_POST[placas]<>'')and($_POST[agregar]==Agregar)and($com1<>'0')){Escribe($conexion,placas);$consu2=consulta('placas',$conexion); $d6='';$title='Registro Gravado';}
        }else{
         $i1=Selecionado;
         $d1=$_POST[opciones2].input2(hidden,opciones2,'',$_POST[opciones2]);
         $d2=input2(submit,Eliminar,'Eliminar de forma permanente Estas placas',Eliminar);
         $d3=input2(submit,opcion2,'',Nuevo);
         if (($_POST[Eliminar]==Eliminar)and($_POST[opciones2]<>'')){
                 $i2=Eliminar;$dc1=orange;$tc2=red;
                 $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
                }
        if ($_POST[Eliminar]==Confirmar){delete(placas); $consu2=consulta('placas',$conexion); $title='Registro Eliminado';$i1=$d1=$d2=$d3=$d4='';}
        }
}
if ($_POST['menu-list']==$listn3)
{
	if ($_POST[opcion3]==Nuevo)$_POST[opciones3]='';
	if ($_POST[opciones3]==''){
	 $title='Nuevo Registro';
         $i1=Nombre;
         $i2='Fecha Origen';
         $i3=Destino;
         $d1=input2(text,Nombre,'',strtoupper($_POST[Nombre]));
         $d2=input2(text,Registro,'',strtoupper($_POST[Registro]));
         $d3=input2(text,Destino,'',strtoupper($_POST[Destino]));
         $d4=input2(submit,agregar,'',Agregar);
	 $com1=compro($_POST[Nombre],clientes,Nombre_Cl,$conexion);
	 if ($com1=='0'){$title='Ya Existe Este Registro';$dc1=red;}
	 if (($_POST[Nombre]<>'')and($_POST[agregar]==Agregar)and($com1<>'0')){Escribe($conexion,clientes);$consu3=consulta('clientes',$conexion);}
	}else{
	 $i1=Selecionado;
	 $d1=$_POST[opciones3].input2(hidden,opciones3,'',$_POST[opciones3]);
	 $d2=input2(submit,Eliminar,'Eliminar de forma permanente Este Cliente',Eliminar);
	 $d3=input2(submit,opcion3,'',Nuevo);
	 if (($_POST[Eliminar]==Eliminar)and($_POST[opciones3]<>'')){
		 $i2=Eliminar;$dc1=orange;$tc2=red;
		 $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
		}
	if ($_POST[Eliminar]==Confirmar){delete(clientes); $consu3=consulta('clientes',$conexion); $title='Registro Eliminado';$i1=$d1=$d2=$d3=$d4='';}
	}
}
tablero(
        '0','background: #343434; width: 220px; left: -1px; color: white;',$title
        ,$i1,$i2,$i3,$i4,$i5,$i6,$i7,'','','','','','','','',''//texto derecho
        ,$d1,$d2,$d3,$d4,$d5,$d6,$d7,'','','','','','','','',''//color fondo dual
        ,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16//color fondo dual
        ,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16//color simple fondo isquierdo
        ,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16//color simple fondo derecha
        ,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16//color letras isquierda
        ,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16//color letras derecha
);
if($_POST['menu-list']==$listn1)
{
	echo'<div style="overflow: scroll; overflow-x:hidden; position: absolute; left: 105px; height: 632px; width: 664px;">
		<table border="0">';
	echo'
	<tr bgcolor="#343434">
		<td >Nombre	</td >
		<td >Edad	</td >
		<td >Direccion	</td >
	</tr >';
		mysql_data_seek  ($consu1,0);
	while($dato=mysql_fetch_array($consu1))
	{
                echo'<tr bgcolor="#676767">';
                echo'<td >'.$d=input2(submit,opciones1,'Ver Mas Opciones '.$dato[Nombre_Ch],$dato[Nombre_Ch],'width: 250px; text-align: left;').'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Edad]).'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Direccion]).'</td >';
                echo'</tr >';
	}
	echo'</table >';
	echo"</div>";
}
if($_POST['menu-list']==$listn2)
{
        echo'<div style="overflow: scroll; overflow-x:hidden; position: absolute; left: 105px; height: 632px; width: 664px;">
                <table border="0">';
        echo'
        <tr bgcolor="#343434">
		<td >Placas     </td >
		<td >Marca	</td >
		<td >Modelo	</td >
		<td >N° E.	</td >
		<td >Color	</td >
	</tr >';
                mysql_data_seek  ($consu2,0);
        while($dato=mysql_fetch_array($consu2))
        {
                echo'<tr bgcolor="#676767">';
		echo'<td >'.$d=input2(submit,opciones2,'Ver Mas Opciones '.$dato[Placas],$dato[Placas],''),'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Marca],' width: 150px; text-align: left;').'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Modelo]).'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[N_eco]).'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Color]).'</td >';
		echo'</tr >';
        }
        echo'</table >';
        echo"</div>";
}
if($_POST['menu-list']==$listn3)
{
        echo'<div style="overflow: scroll; overflow-x:hidden; position: absolute; left: 105px; height: 632px; width: 664px;">
                <table border="0">';
        echo'
        <tr bgcolor="#343434">
		<td >Nombre      	</td >
		<td >Fecha Origen	</td >
		<td >Destino		</td >
	</tr >';
                mysql_data_seek  ($consu3,0);
        while($dato=mysql_fetch_array($consu3))
        {
                echo'<tr bgcolor="#676767">';
		echo'<td >'.$d=input2(submit,opciones3,'Ver Mas Opciones '.$dato[Nombre_Cl],$dato[Nombre_Cl],'width: 250px; text-align: left;').'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Fecha_re]).'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Destino]).'</td >';
                echo'</tr >';
        }
        echo'</table >';
        echo'</div >';
}
?>
