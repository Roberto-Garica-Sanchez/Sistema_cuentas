<?php
$array=array(
    "columnas"=>'auto',
    "renglones"=>'auto',
    "titulo_tablas"=>$libre_v5->input('button','','Combustible','','botone_n','','','    background: #194d80;color: white;float: left;width: -webkit-fill-available;'),
    "elementos"=>array(      
        "Columnas_name"=>array(
            'A'=>$libre_v5->input('button','','Auto Abasto','','botone_n','','tabindex="-1"','width: 230px; text-align:center;'),
            'B'=>$libre_v5->input('button','','Tansferencias Gasolinera','','botone_n','','tabindex="-1"','width: 168px;text-align:center;'),
            'C'=>$libre_v5->input('button','','Tansferencias Operador','','botone_n','','tabindex="-1"','width: 168px; text-align:center;'),
            
        ),
        "Columnas_Title"=>array(

            'A'=>array(
                $libre_v5->input('button','','Presio X Litro','','botone_n','','tabindex="-1"','width:40%'),
                $libre_v5->input('text','PresioXlitro_Auto_abasto','','PresioXlitro_Auto_abasto','botones_submenu','','','width:60%'),

                $libre_v5->input('button','','Litros','','botone_n','','tabindex="-1"','width: 56px;'),
                $libre_v5->input('button','','Comentario','','botone_n','','tabindex="-1"','width:50%')
            ),
            'B'=>array(
                
                $libre_v5->input('button','','Litros','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;'),
                $libre_v5->input('button','','Precio','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;'),
                $libre_v5->input('button','','Comentario','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;')
            ),
            'C'=>array(
                
                $libre_v5->input('button','','Litros','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;'),
                $libre_v5->input('button','','Precio','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;'),
                $libre_v5->input('button','','Comentario','','botone_n','','tabindex="-1"','padding: 3px 2px;width: 56px;')
            )
            
            
        ),  
        "ELEMENTOS"=>array(
            #'A'=>array('contador','input','input')
            'A'=>array(
                array(# numerador (1->n)
                    'type'=>'input',
                    'name'=>'',
                    'style'=>'padding: 3px 2px;width: 56px;'
                ),
                array(# numerador (1->n)
                    'type'=>'input',
                    'name'=>'comentarios',                        
                    'tabindex'=>'none'
                )
            ),
            'B'=>array(
                array(
                    'type'=>'input',
                    'name'=>'',
                    'style'=>'padding: 3px 2px;width: 56px;'
                ),
                array(
                    'type'=>'input',
                    'name'=>'presioXlito',
                    'style'=>'padding: 3px 2px;width: 56px;'
                ),                
                array(
                    'type'=>'input',
                    'name'=>'comentarios',
                    'tabindex'=>'none',
                    'style'=>'padding: 3px 2px;width: 56px;'
                )
            ),
            'C'=>array(
                array(
                    'type'=>'input',
                    'name'=>'',
                    'style'=>'padding: 3px 2px;width: 56px;'
                ),
                array(
                    'type'=>'input',
                    'name'=>'presioXlito',
                    'style'=>'padding: 3px 2px;width: 56px;'
                ),                
                array(
                    'type'=>'input',
                    'name'=>'comentarios',
                    'tabindex'=>'none',
                    'style'=>'padding: 3px 2px;width: 56px;'
                )
                
            )
        ),            
    ),
    "class"=>array(
        "principal"=>""
    )
);
    echo"<div >";
    #$libre_v5->input('button','','Combustible','','botone_n','','','background: #194d80;color: white;float: left;');
    $libre_v5->tablas_array($array);
echo"</div>";
/*
$TYPE='text';
$libre_all="";
echo "<div id='general_datos' style='display: block;float: right; width: 722px; position: relative;background: #444;padding: 5px;top: 0px; box-shadow: inset 0px 0px 5px black;'>";
  		
    $style_all="margin: 0px; min-width: 70px; width: 70px; text-align: center;float: left;";
    $TYPE='text';
    $style_all=$style_all."background: #343434; color: #0075ff;";
    $titles=array('Fletes','Viaticos','Diesel','Casetas','Facturas','R y R','Guias','Maniobras','Cast. Electroni');    
    $limites=Array(5,5,7,20,5,10,5,6,20);
    echo $libre_v2->input2($TYPE,'','','',$style_all,'','disabled','','','','');
    for ($i=0; $i <count( $titles); $i++) { 
        echo $libre_v2->input2($TYPE,'','',$titles[$i],$style_all,'','disabled','');
        
    }
    if(empty($_POST['focus_gene']))$_POST['focus_gene']='';
    echo $libre_v2->input2('hidden','focus_gene','',$_POST['focus_gene'],$style_all,'','disabled','');	
    $conta=0;
    for($x=1; $x<=20; $x++){
        $text="background: #343434; color: #0075ff; float: left;";
        $conta=$conta+1;
        $id=$conta;
        echo $libre_v2->input2($TYPE,'',$id,$x,$style_all.$text,$id,'disabled','');
        for($y=1; $y<10; $y++){	
            $name=$y."TEXT";
            $name0=$name;
            $name=$y."TEXT".$x;
            $name_next="";
            $title=$y."TEXT_C".$x;
            $name_c=$y."TEXT_C".$x;
            $style1="";	
            $id=$name;
            
            $libre_all="";
            if($x>$limites[$y-1]){$style1="background: #003f47; color: black; float: left;";$libre_all='readonly="readonly"';}else $style1="background: white; color: black;box-shadow: inset 0px 0px 4px #0073ff;     float: left;";
            
            $value='';
            $value_c='';
            if(!empty($_POST[$name]))	$value=$_POST[$name];
            if(!empty($_POST[$name_c])){
                $value_c=$_POST[$name_c];
                $comentario_detec_css="box-shadow: inset 0px 0px 0px 1.5px #ff9e25;";
            }else{
                $comentario_detec_css='';
            }

            echo $libre_v2->input2($TYPE,$name,$title,$value,$style_all.$style1.$comentario_detec_css,$id,
            //.'onKeyUp="mueve_diba_text(event,this); 	calcula_update();" onKeyPress=" mueve_diba_text(event,this); " onfocus="comentariosA(this);"');
            '
            onKeyPress	="return valida_n(event,'."''".','."''".','."'".$name_next."'".');"
            onKeyUp		="mueve_diba_text(event,this);calcula_update();"
            onfocus		="comentarios_a_celdas(this);"

            maxlength	="15"
            ','');
            //comentariosA(this);
            //input2				($type2,$name,$title,$value,$style,$id,$libre,$class)
            echo $libre_v2->input2('hidden',$name_c,'',$value_c,'',$name_c,'','');
        }	
    }
    #TOTALES
    echo $libre_v2->input2($TYPE,'','','TOTALES',$style_all,'','disabled','');
    for($y=1; $y<10; $y++){	 
        $name="TOTAL".$y;
        if(empty($_POST[$name]))$_POST[$name]=0;    
        echo $libre_v2->input2($TYPE,$name,'',$_POST[$name],$style_all.$text,$name,'disabled','');
    }
    #comentario de celda
    
    echo $libre_v5->input('text','','Comentario de Celda','','botone_n','','disabled','float: left;width: 40%;');
    echo $libre_v2->input2('tarea','','','','float: left;width:60%;','comentario_compartido','onkeyup="edita_el_comentario_de_la_celda(this);"','botones_submenu');	
echo "</div>";	
*/
?>