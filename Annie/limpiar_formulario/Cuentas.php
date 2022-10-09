<?php
    $array['tabla']=$tabla;
    $array['database']=$database;
    //$libre_v4->chanseDatos($array);
    $libre_v4->Columnas($database,$tabla);
    #$libre_v4->ColunasInPostClear('');
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')   { 
        #### [MANUAL] 
        $_POST['crome_i']='';
        $_POST['crome_f']='';
        $_POST['ID_Combustible']='';

        #### [AUTO] limpia mediante base de datos 
        for ($i=0; $i <count($TO_SAVE); $i++) {
            $ColunasInPostClear=array();
            if(isset($Sustituto[$TO_SAVE[$i]])){
                $ColunasInPostClear['Columnas a transferir']=$Sustituto[$TO_SAVE[$i]];
            }
            $libre_v4->Columnas($database,$TO_SAVE[$i]);
            $libre_v4->ColunasInPostClear($ColunasInPostClear);
        }
    }
?>