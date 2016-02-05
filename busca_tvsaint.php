<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta description="Admin de mapas" />
        <title>Busqueda</title>
        <style type="text/css">
        html body * {
        	display: inline-block;
        	height: auto;
        	margin: 0;
        	padding: 0;
        	width: 100%;
        }
        section {
        	height: auto;
        	width: 100%;
        }
        article {
        	height: auto;
        	width: 100%;
        }
        ul {
        	height: auto;
        	width: 100%;
        }
        ul li {
        	border: solid 1px transparent; 
        	height: auto;
        	list-style: none;
        	margin: 1px 0px;
        	padding: 2px;
        	width: 100%;
        }
        ul li:first-child {
        	text-align: center;
        }
        ul li.errores {
        	border: solid 1px red; 
        }
        ul li b {
        	display: inline;
        	height: auto;
        	width: auto;
        }
        ul li label {
        	color: red;
        	display: inline;
        	height: auto;
        	width: auto;
        }
        ul li input {
        	display: inline;
        	height: auto;
        	width: 300px;
        }
        form ul li,form ul li:first-child {
        	text-align: left;
        }
        </style> 
    </head>
	<body>
		<section>
			<article>
				<form action="./busca_tvsaint.php" method="POST" id="logsusu" name="logsusu" enctype="multipart/form-data"> 
				<ul>
					<li>
						<input type="text" id="buscar" name="buscar" placeholder="Buscar ..." />
					</li>
					<li>
						<input type="submit" value="Buscar" />
					</li>
				</ul>
				</form>
			</article>
			<article>
				<ul>
				<?php
				if($_POST && strlen($_POST['buscar'])>0) {
					$cadena = $_POST['buscar'];
					echo "<li>Buscando: <b>" . $cadena . "</b></li>";
				/*$axoini=2010;
				$axofin=2013;
				if($_POST && strlen($_POST['buscar'])>0) {
					$cadena = $_POST['buscar'];
					echo "<li>Buscando: <b>" . $cadena . "</b></li>";
					for ($b=$axoini; $b <= $axofin; $b++) { 
						for($a=1;$a<=12;$a++){
							if (strlen($a)==1) { $c="0".$a; } else { $c=$a; }
							$url = "/nfscluster/televisainternacional/logs/access_" . $b . $c .".log";
							if(file_exists($url)){
								$fichero_url = fopen ($url, "r");
								$texto = "";
								$trozo="";
								$trozoc=0;
								$mensg = "";
								while ($trozo = fgets($fichero_url, 1024)){
									$pos1 = stripos($trozo, $cadena);
									if ($pos1 !== false) {
										$leng = strlen($trozo);
										$time = substr($trozo,0,25);
										$times = str_ireplace("T", "  ", $time);
										$msg = substr($trozo,26,$leng);
										$msgg = explode(" ",$msg);
										if ($msgg[0]=="ERR") {
											$mtit = "<label>".$msgg[0]."</label>";
											$clases = "errores";
										} else {
											$mtit = $msgg[0];
											$clases = "";
										}
										for ($i=1; $i < count($msgg); $i++) { 
											$mtit = $mtit . " " . $msgg[$i];
										}
										$mensg .= "<li class='".$clases."'>" . $times . " " . $mtit . "</li>";
										$trozoc++;
									}
								}
								if($trozoc>0){
								echo "<li>Archivo: " . $b . "-" . $c . "</li>";
								echo $mensg;
								echo "<li>Total: " . $trozoc . "</li>";
								echo "<li>&nbsp;</li>";
								}
							} else {
								echo "<li>No existe el archivo: " . $url . "</li>";
							}
							if($b==date('Y') && $a==date('m')){$a=12;}
						}
					}
				}*/
				$dir = "/jorge/htdocs/televisainternacional/application/controllers/";
				foreach (scandir($dir) as $item) {
					if ($item <> '.' and $item <> '..' and $item <> 'Thumbs.db'){
						$url = $dir . $item;
						$fichero_url = fopen ($url, "r");
						$texto = "";
						$trozo="";
						$trozoc=0;
						$mensg = "";
						while ($trozo = fgets($fichero_url, 1024)){
							$pos1 = stripos($trozo, $cadena);
							if ($pos1 !== false) {
								$mensg .= "<li>" . $trozo . "</li>";
								$trozoc++;
							}
						}
						if($trozoc>0){
						echo "<li>Archivo: " . $item . "</li>";
						echo $mensg;
						echo "<li>Total: " . $trozoc . "</li>";
						echo "<li>&nbsp;</li>";
						}
					}
				}
			}
				?>
				</ul>
			</article>
		</section>
	</body>
</html>