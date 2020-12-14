
<?php
	$id1='id';
	$id2='id';
	$id3='id';
	$id4='id';
	if(empty($m1)) $m1='';
	if(empty($m2)) $m2='';
	if(empty($m3)) $m3='';
	if(empty($m4)) $m4='';
	if (empty($_POST['menu'])) $_POST['menu']='';
	if(!empty($_POST['menu']) and $_POST['menu']==$m1){$id1="id_s";}
	if(!empty($_POST['menu']) and $_POST['menu']==$m2){$id2="id_s";}
	if(!empty($_POST['menu']) and $_POST['menu']==$m3){$id3="id_s";}
	if(!empty($_POST['menu']) and $_POST['menu']==$m4){$id4="id_s";}
	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	echo"
		<div id='conte-fijo' style='display:block;'>
			<div id='menu'>";
				echo input2('hidden','menu','',$_POST['menu'],'','','');
				echo input2('submit','menu','',$m1,'',$id1,'');
				echo input2('submit','menu','',$m2,'',$id2,'');
				echo input2('submit','menu','',$m3,'',$id3,'');
				echo input2('submit','menu','',$m4,'',$id4,'');
	echo"	</div>
		</div>
	";
?>
