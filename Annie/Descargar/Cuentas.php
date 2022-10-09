<?php
if(isset($_POST['Descarga_Cuenta'])){
     for ($i=0; $i <count($TO_SAVE); $i++) {
          #echo '############ Descargar de  '.$TO_SAVE[$i];
          #echo"<br>";
          $array_DataToPost=array(
               "getColumnas"=>array('*'),
               "BuscaColumnas"=>'ID_G',
               "BuscaDatos"=>$_POST['Descarga_Cuenta'],
          );
          if(isset($Sustituto[$TO_SAVE[$i]])){
               $array_DataToPost['Columnas a transferir']=$Sustituto[$TO_SAVE[$i]];
          }
          
          $libre_v4->Columnas($database,$TO_SAVE[$i]);
          $libre_v4->DataToPost($array_DataToPost);
          #echo"<br>";
     }
     
    #### Datos Vinculados OBTENIENDO TODAS LAS TABLAS VINCULADAS 
    $tabla_vinculaciones_by_id='vinculaciones_by_id';
     $getColumnas=array('*');
     $BuscaColumnas=array('ID_G');
     $BuscaDatos=array($_POST['Descarga_Cuenta']);
    
     $array=array(
          "tabla"=>$tabla_vinculaciones_by_id,
          "Operacion"=>array(       
               'SELECT'=>array(
                    "Activar"	=>'true',
                    "LIKE"		=>'falses',
                    "getColumnas"	=>$getColumnas,
                    "BuscaColumnas"=>$BuscaColumnas,
                    "BuscaDatos"	=>$BuscaDatos,
                    "ByOrder"		=>array(
                         "Columna"	=>'ID_G',
                         "ASC-DESC"=>'DESC'
                    ),
               ),    
          )
     );


     $Ares_v1->GeneraSql($array);                    //genera el codigo MySql 
     #$Ares_v1->viewSql();                            //visualisa el codigo generado
     $sql=$Ares_v1->getSql();                        //recupera el codigo generado
     

     #$datos=	$this->libre_v2->mysql_fe_ar($res,$this->phpv,'');
     #$resultados_consulta=$this->libre_v2->mysql_nu_ro($res,$this->phpv);
     $libre_v2->db($database,$conexion,$phpv);
     if ($res=mysqli_query($conexion, $sql)) {           
          $libre_v4->Columnas($database,$tabla_vinculaciones_by_id);
          $Columnas=$libre_v4->GetColumnas();
          
          while($datos=$libre_v2->mysql_fe_ar($res,$phpv,'')){
               #echo('<pre>');
               #print_r($datos);
               #echo('</pre>'); 
               
               #for ($i=0; $i <count($Columnas) ; $i++) { 
                    #echo $datos[$Columnas[$i]];
               #}	
               #echo"<br>";

               if($datos['Tabla']=='repostaje_unidades'){
                    $_POST['Descarga_combustible']=$datos['ValorColuman'];
                    include('Combustible.php');
               }


          }
     

     }else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
     }
     
     


}
?>