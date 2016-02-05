<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta description="Admin de mapas" />
        <title>Colores</title>
        <style type="text/css">
        html,body, section,div, label { display: inline;float: left;position: relative;margin: 0;padding: 0; height: 100%;width: 100%;}
        div { color: #fff; height: auto; width: 96%; margin: 5px 2%; }
        label { text-align: center; margin: 10px 0;}
        </style> 
    </head>
	<body>
		<section>
<?php
$color = 'fff';
$colores[] = array('color' => '004072');
$colores[] = array('color' => '1166a5');
$colores[] = array('color' => '336699');
for ($i=0; $i < count($colores); $i++) { 
    $j=$i+1;
    echo "<div style='color:#".$color.";background-color:#" . $colores[$i]['color'] . ";'><label>" . $colores[$i]['color'] 
    . "</label></div>";
}
?>
            
        </section>
    </body>
</html>