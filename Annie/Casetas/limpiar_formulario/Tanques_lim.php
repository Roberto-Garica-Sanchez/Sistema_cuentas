<?php
    $array['tabla']=$tabla;
    $array['database']=$database;
    //$libre_v4->chanseDatos($array);
    $libre_v4->Columnas($database,$tabla);
    $libre_v4->ColunasInPostClear('');
?>