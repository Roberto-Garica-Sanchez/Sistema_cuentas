<?php
$menu='menu-list';
$listn1='';
$listn2=Consulta;
$listn3='';
$listn4='';
$listn5='';
$listn6='';
$listn7='';
$listn8='';
$listn9='';
$listn10='';
//$listn11=Abonos;
$size=0;
$type=hidden;
$type2=text;
$style="top: 250px;";
include("lista.php");
include("libre_Est.php");
if($_POST[Bus]=='')$_POST[Bus]=Espe;
$d1=input2(hidden,Bus,'',$_POST[Bus]);
if($_POST[Bus]==Espe){
    $i1=Datos;$d1=$d1.Especifico;$tc1=redblue;
    $i2=Chofer;  $d2=despliegre_mysql(Chofer,Chofer,$consu1_2,Nombre_Ch);
    //$i3=Dia;     $d3=despieges(D,'','Dia Espesifico',1,31);
    $i3=Dia;     $d3=input2(hidden,D,'',$_POST[D]).$_POST[D];
    $i4=Mes;     $d4=despieges(M,'','Mes Espesifico',1,12);
    $i5=Año;     $d5=despieges(A,'','Año Espesifico',2015,2030);
                 $d6=input2(submit,'','Calcula Con Los Nuevos Parametros',Ver);
   $tc7=blue;
   $d8=input2(submit,Bus,'Calculo Con Fechas De Inicio Y Fin Distintas',Ampliada);
}
if($_POST[Bus]==Ampliada){
   $i1=Datos;$d1=$d1.Ampliados;$tc1=redblue;
   $i2=Chofer;$d2=despliegre_mysql(Chofer,Chofer,$consu1_2,Nombre_Ch);
   $tc3=blue;
   if($_POST[funcion1]==Borrar){$_POST[A]='';$_POST[M]='';$_POST[D]='';}
   $i4=Año;$d4=despieges(A,'Año','Año De Salida','2015','2030');
   if(($_POST[A]<>'Año')&&($_POST[A]<>''))   {$i5=Mes;$d5=despieges(M,'Mes','Mes De Salida','1','12');}
   if(($_POST[M]<>'Mes')&&($_POST[M]<>''))   {$i6=Dia;$d6=despieges(D,'Dia','Dia De Salida','0','31');}
   if($_POST[M]=='Mes')$_POST[D]=Dia;
    
   $d7=input2(submit,funcion1,'Calcula Con Los Nuevos Parametros',Ver);
   $i7=input2(submit,funcion1,'Calcula Con Los Nuevos Parametros',Borrar);
   $tc8=blue;
   $d9=input2(submit,Bus,'Calculo Con Fechas De Inicio Y Fin Distintas',Espe);
   if($_POST[car]<>'')$se1=checked;
   if($_POST[cho]<>'')$se2=checked;
   if($_POST[fec]<>'')$se3=checked;

   $i10=Carta;	$d10=input2(checkbox,car,'',selesc1,'','',$se1);
   $i11=Chofer;	$d11=input2(checkbox,cho,'',selesc2,'','',$se2);
   $i12=Fecha;	$d12=input2(checkbox,fec,'',selesc3,'','',$se3);
}
tablero
(
        $size,'width: 220px; color: white; top: 0px; left: 0px; width: 220px;','Reportes'
        ,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$i13,$i14,$i15,$i16,$i17,$i18//texto derecho
        ,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18//color fondo dual
        ,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16,$tc17,$tc18//col$
        ,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16,$ic17,$ic18//col$
        ,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16,$dc17,$dc18//col$
        ,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16,$if17,$if18//col$
        ,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16,$df17,$df18//col$
);
print "<div id='scrolcenter'>";
 //mysql_data_seek($consu5,0);
$descarga=ID_G;
$name=Chofer;

if($_POST[M]==1){$mes=$enero=31;         $title_mes='Enero';}
if($_POST[M]==2){$mes=$febrero=28;       $title_mes='Febrero';}
if($_POST[M]==21){$mes=$febrero4=29;     $title_mes='Febrero';}
if($_POST[M]==3){$mes=$marzo=31;         $title_mes='Marzo';}
if($_POST[M]==4){$mes=$abril=30;         $title_mes='Abril';}
if($_POST[M]==5){$mes=$mayo=31;          $title_mes='Marzo';}
if($_POST[M]==6){$mes=$junio=30;         $title_mes='Junio';}
if($_POST[M]==7){$mes=$julio=31;         $title_mes='Julio';}
if($_POST[M]==8){$mes=$agosto=31;        $title_mes='Agosto';}
if($_POST[M]==9){$mes=$septimbre=30;     $title_mes='Septimbre';}
if($_POST[M]==10){$mes=$octubre=31;      $title_mes='Octubre';}
if($_POST[M]==11){$mes=$noviembre=30;    $title_mes='Noviembre';}
if($_POST[M]==12){$mes=$diciembre=31;    $title_mes='Diciembre';}

$y=0;
mysql_data_seek($consu4,0);
while($dato4=mysql_fetch_array($consu4)){
    if($dato4[A]==$_POST[A]){
        if($dato4[M]==$_POST[M]){
            mysql_data_seek($consu5,0);
            $escribe=0;
            while($dato5=mysql_fetch_array($consu5)){
                if($dato4[ID_G]==$dato5[ID_G]){
                    if(($_POST[Chofer]==Chofer)or($_POST[D]=='Dia'))                    {$escribe=1;}
                    if((($_POST[D]==Dia)or($_POST[D]==''))and($_POST[Chofer]==chofer))  {$escribe=1;}                   if(($dato4[D]==$_POST[D])and($_POST[Chofer]==chofer))               {$escribe=1;}
                    if((($_POST[Chofer]==$dato5[CHOFER])and($dato4[D]==$_POST[D]))
                    or(($_POST[Chofer]==$dato5[CHOFER])and($dato4[ID_G]==$dato5[ID_G]))){$escribe=1;}
                 
                    if($escribe==1){
                        $id=input2(submit,ID_G,'Imprimir',$dato5[ID_G]);
                        print "
                         <table border='0' id='imprime' style='width: 350px; position: absolute; top: ".$y."px; background: rgba(255,255,255,0.54);'>
                         <tr><td width='60px;'>Factura</td><td>$id</td></tr>
                         <tr><td>Chofer </td><td>$dato5[CHOFER]</td></tr>
                         <tr><td>Saldo  </td><td>$dato5[Difer_1]</td></tr>
                         </table>
                      ";
                      $y=$y+75;
                    }
                }
            }
        }
    }
}
print "</div>";
$inicio=1;
$sem_ini=1;
$dia_mes=1;
echo "<table border='0' id='conte-dere' style='color: white; border-color:blue; left: -12px;' >
<tr>
    <td colspan='7' ><center>$title_mes  $_POST[A]</center></td >

</tr><tr>";
//print "lu,ma,mi,ju,vi,sa,do<br>";
for ($x=1; $x<=$sem_ini-1; $x++){//td en blanco 
    $d=input2(button,d,'','','width: 30px;');
    print '<td>'.$d.'</td>';
}

for ($x=$inicio; $x<=$mes; $x++){//dias del año 
    //type2,$name,$title,$value,$style,$id,$libre
    $z=0;
    mysql_data_seek($consu4,0);//indica las cuentas que se guardaron en el dia 
    while($dato4=mysql_fetch_array($consu4)){
        $fecha=$dato4[D].'-'.$dato4[M].'-'.$dato4[A].'<br>';
        if($dato4[A]==$_POST[A]){
            if($dato4[M]==$_POST[M]){
                if($dato4[D]==$x){
                    $z=$z+1;
                }
            }
        }
    }
    $d=input2(submit,D,$z.' Cuentas en el Dia ',$x,'width: 30px;');
    print '<td>'.$d.'</td>';
    if($x==$mes)break;
    if ($sem_ini==7){echo"</tr><tr>";$sem_ini=0;}
    $sem_ini=$sem_ini+1;
}
for (; ;){//td en blanco 
    if ($sem_ini==7){break;}
    $d=input2(button,d,'','','width: 30px;');
    print '<td>'.$d.'</td>';
    $sem_ini=$sem_ini+1;
    if ($sem_ini==7){break;}
}
echo"<table>";

?>
