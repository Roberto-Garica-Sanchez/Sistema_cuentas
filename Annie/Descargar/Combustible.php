<?php
if(!empty($_POST['Descarga_combustible'])){
     $libre_v4->Columnas('combustible','repostajes_unidades');
     $getColumnas=array('Contador_Inicio','Contador_Final');
     $array_descarga_combustible=array(
          "getColumnas"=>array('*'),
          "BuscaColumnas"=>'ID',
          "BuscaDatos"=>$_POST['Descarga_combustible'],
          "Columnas a transferir"=>array(
               "Contador_Inicio"=>'crome_i',
               "Contador_Final"=>'crome_f',
               "ID"=>'ID_Combustible',
          )
     );
     $libre_v4->DataToPost($array_descarga_combustible);
}
?>