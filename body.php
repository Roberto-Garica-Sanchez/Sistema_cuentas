<?php

echo"<div class='Banda_superior'>";
    ###contenedor login 
    ###
    echo"<div class='Menu_icon'>";
        echo"<i class='fas fa-bars ' style='margin: 20% 20% 20% 20%;font-size: 5vh; '></i>";
    echo"</div>";
    echo"<div class='list_software'>";
        echo"<select name='Soft_version' id='Soft_version' style='font-size: 17px;height: 100%; margin: 0px;' class='botones_submenu' onChange='cambia_menu(this);'>";# onChange='envia_formulario();'
            echo"<OPTION value='' >Seleciones Un Cliente</OPTION>";
            //if($_POST[Soft_version]=="Legado")	{='selected';}else{="";}	echo"<OPTION value='Legado' >Legado</OPTION>";
                echo"<OPTION value='ares' >     Ares</OPTION>";
                echo"<OPTION value='annie' >    Annie</OPTION>";
            	echo"<OPTION value='carmesi' >  Carmesi</OPTION>";
            	echo"<OPTION value='celeste' >  Celeste</OPTION>";
        echo"</select >";
    echo"</div>";
    echo"<div class='list_software'>";
        echo"<select name='Programa' id='Programa' style='font-size: 17px;height: 100%; margin: 0px;' class='botones_submenu'>";            
            echo"<OPTION value='' >                     Todos</OPTION>";        
            echo"<OPTION value='Casetas' >              Casetas</OPTION>";        
            echo"<OPTION value='Combustible' >          Combustible</OPTION>";        
            echo"<OPTION value='Facturas' >             Facturas</OPTION>";    
            echo"<OPTION value='Fletes' >               Fletes</OPTION>";    
            echo"<OPTION value='Guias' >                Guias</OPTION>";    
            echo"<OPTION value='Maniobras' >            Maniobras</OPTION>";    
            echo"<OPTION value='Refaciones' >           Refaciones</OPTION>";    
            echo"<OPTION value='Relacion de Viajes' >   Relacion de Viajes</OPTION>";    
            echo"<OPTION value='Reparaciones' >         Reparaciones</OPTION>";    
            echo"<OPTION value='Viaticos' >             Viaticos</OPTION>";    
        echo"</select >";
    echo"</div>";
echo"</div>";

echo"<div id='menu_principal' class='menu_movil'>";
echo"</div>";
echo"<div class='Contenedor_Principal_movil'>";
echo"</div>";
?>