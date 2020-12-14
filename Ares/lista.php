<?php
	$list1='idI';
	$list2='idI';
	$list3='idI';
	$list4='idI';
	$list5='idI';
	$list6='idI';
	$list7='idI';
	$list8='idI';
	$list9='idI';
	$list10='idI';
	$list11='idI';
	if($_POST['menu-list']==$listn1){$list1="id_I";}
	if($_POST['menu-list']==$listn2){$list2="id_I";}
	if($_POST['menu-list']==$listn3){$list3="id_I";}
	if($_POST['menu-list']==$listn4){$list4="id_I";}
	if($_POST['menu-list']==$listn5){$list5="id_I";}
	if($_POST['menu-list']==$listn6){$list6="id_I";}
	if($_POST['menu-list']==$listn7){$list7="id_I";}
	if($_POST['menu-list']==$listn8){$list8="id_I";}
	if($_POST['menu-list']==$listn9){$list9="id_I";}
	if($_POST['menu-list']==$listn10){$list10="id_I";}
	if($_POST['menu-list']==$listn11){$list11="id_I";}
	if($style_menu==$vasio){$style_menu="menu-list";}
echo'
<div id="conte-isqu" style="'.$style.'">
	<input type="hidden" name="menu-list" value="'.$_POST['menu-list'].'">
	<ul id="'.$style_menu.'" >
		<li ><input type="submit" name="'.$menu.'" id="'.$list1.'" value="'.$listn1.'" tabindex="6">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list2.'" value="'.$listn2.'" tabindex="7">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list3.'" value="'.$listn3.'" tabindex="8">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list4.'" value="'.$listn4.'" tabindex="9">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list5.'" value="'.$listn5.'" tabindex="10">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list6.'" value="'.$listn6.'" tabindex="11">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list7.'" value="'.$listn7.'" tabindex="12">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list8.'" value="'.$listn8.'" tabindex="13">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list9.'" value="'.$listn9.'" tabindex="14">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list10.'" value="'.$listn10.'" tabindex="15">	</li >
		<li ><input type="submit" name="'.$menu.'" id="'.$list11.'" value="'.$listn11.'" tabindex="16">	</li >
	</ul >
</div >
';
$menu="";
?>
