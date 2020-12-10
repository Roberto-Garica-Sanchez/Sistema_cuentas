<?php
	$id1_1='idI';
	$id1_2='idI';
	$id1_3='idI';
	$id1_4='idI';
	$id1_5='idI';
	$id1_6='idI';
	$id1_7='idI';
	$id1_8='idI';
	$id1_9='idI';
	$id1_10='idI';
	$id1_11='idI';
	$id1_12='idI';
	$id1_13='idI';

	if($_POST[menu2]==$sm1){$id1_1="id_I";}
	if($_POST[menu2]==$sm2){$id1_2="id_I";}
	if($_POST[menu2]==$sm3){$id1_3="id_I";}
	if($_POST[menu2]==$sm4){$id1_4="id_I";}
	if($_POST[menu2]==$sm5){$id1_5="id_I";}
	if($_POST[menu2]==$sm6){$id1_6="id_I";}
	if($_POST[menu2]==$sm7){$id1_7="id_I";}
	if($_POST[menu2]==$sm8){$id1_8="id_I";}
	if($_POST[menu2]==$sm9){$id1_9="id_I";}
	if($_POST[menu2]==$sm10){$id1_10="id_I";}
	if($_POST[menu2]==$sm11){$id1_11="id_I";}
	if($_POST[menu2]==$sm12){$id1_12="id_I";}
	if($_POST[menu2]==$sm13){$id1_13="id_I";}
	if($_POST[menu2]<>""){$_POST[sub_menu]=$_POST[menu2];}
	echo"	<div id='conte-isqu'>
			<div id='sub_menu'>
                                <input type='hidden' class='Medio' name='sub_menu' value='".$_POST[sub_menu]."'>
				<ul id='smenu-botones'>
					<li><input type='submit' name='menu2' id='".$id1_1."' value='".$sm1."'></li>
					<li><input type='submit' name='menu2' id='".$id1_2."' value='".$sm2."'></li>
					<li><input type='submit' name='menu2' id='".$id1_3."' value='".$sm3."'></li>
					<li><input type='submit' name='menu2' id='".$id1_4."' value='".$sm4."'></li>
					<li><input type='submit' name='menu2' id='".$id1_5."' value='".$sm5."'></li>
					<li><input type='submit' name='menu2' id='".$id1_6."' value='".$sm6."'></li>
					<li><input type='submit' name='menu2' id='".$id1_7."' value='".$sm7."'></li>
					<li><input type='submit' name='menu2' id='".$id1_8."' value='".$sm8."'></li>
					<li><input type='submit' name='menu2' id='".$id1_9."' value='".$sm9."'></li>
					<li><input type='submit' name='menu2' id='".$id1_10."' value='".$sm10."'></li>
					<li><input type='submit' name='menu2' id='".$id1_11."' value='".$sm11."'></li>
					<li><input type='submit' name='menu2' id='".$id1_12."' value='".$sm12."'></li>
					<li><input type='submit' name='menu2' id='".$id1_13."' value='".$sm13."'></li>
				</ul>
                              <!--  <input type='text' class='Medio' name='sub_menu' value='".$_POST[sub_menu]."'>-->
			</div>
		</div>";
?>
