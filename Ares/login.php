<div id="contelo">
<?php
        echo'Usuario';
		echo'<br >'.$user=input2('text','user','Usuario de El Servidor local','','left: 20px; position: relative;','','');
        echo'<br >Contraseña';
        echo'<br >'.$pass=input2('password','pass','Contraseña del Servidor local','','left: 20px; position: relative;','','');
        echo'<br >'.$envia=input2('submit','','','Conectar','left: 150px; position: relative;','','');
        if(!empty($_POST['user']))echo'<font color="red"><br >Usuario o Contraseña incorecta</font >';
?>
<div>
<style >
#contelo{
background: rgb(17, 164, 143) none repeat scroll 0% 0%;
width: 300px;
height: 150px;
position: relative;
margin-left: auto;
margin-right: auto;
margin-top: auto;
margin-bottom: auto;
}
</style>
