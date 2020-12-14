<?php
/*mysql*/
function login($host,$user,$pass)
{
        $conexion=mysql_connect($host,$user,$pass);
	//or die("Problema Para Iniciar Secion");
        return $conexion;
}
/*mysql*/
function input2($type2,$name,$title,$value,$style,$id,$libre)
{
        $d='<input type="'.$type2.'" style="'.$style.'" id="'.$id.'" class="Medio" name="'.$name.'" value="'.$value.'" title="'.$title.'" '.$libre.' >';
        return $d;
}
function grava($tabla){
	if($tabla==servers){$grava="INSERT INTO ".$tabla." 	(url,puerto,n_server,n_a_server)
	VALUE ($_POST[url],$_POST[puerto],$_POST[N_server],$_POST[n_a_server])";}
	return $grava;
}
?>
