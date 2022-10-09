
<?php //inicio de codigo PHP
        include_once($_SERVER["DOCUMENT_ROOT"]."/Librerias/Gestor_librerias.php");        
        #include_once('gestor_de_rutas_local.php');
       echo"<div >";
                //control de menus                     
                define('Menu_Nombre_casetas_prinipal','Menu_casetas_prinipal');
                $elemento_menu=array('Lista Casetas','Pago De casetas');
                $class=array(
                    'Conte_principal'=>'Lateral',
                    'Div_Opcion'=>'',
                    'Boton'=>'Boton_menu1',
                    'img'=>''
                );
                $otros_arrays=array(
                    'img_activa'=> 'false',
                    'img_defaul'=>'/img/defaul.jpg',
                    'img'=>array("","",'',"",""),
                    'memoria'=>array('Activa'=>true,'type'=>'hidden'),
                    'ocultar'=>array(
                    )
                );
                $libre_v5->menu(Menu_Nombre_casetas_prinipal,$elemento_menu,$class,$otros_arrays);
        echo"</div>";
        echo"<div id='contenedor_pri' class='contenedor_pri'>";
            mysqli_select_db ($conexion ,'combustible');
            include_once('Centro_de_procesos.php');            
            //-----------------------Acciones que se yeva acabo se gun la selecion del menu princial 
            switch ($_POST[Menu_Nombre_casetas_prinipal]) {
                case $elemento_menu[0]: 
                    include_once('interface/lista_casetas_formulario.php');
                break;
                case $elemento_menu[1]: 
                break;
                case $elemento_menu[2]:
                break;          
            }            
        echo"</div>";

?>