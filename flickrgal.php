<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Buscador imagenes Flickr</title>
		<script src="librarys/modernizr.js"></script>
		<style type="text/css">
			section {
				margin:0;
				padding:0;
			}
			section article {
				margin:10px;
				padding:0;
			}
			audio, video {
				margin:0;
				padding:0;
				display:inline;
			}
			section article ul {
				margin:0;
				padding:0;
				position:relative;
				width:auto;
				height:auto;
			}
			section article ul li {
				margin:0px 0;
				padding:0;
				list-style:none;
				display:inline;
				float:left;
				position:relative;
				width:100px;
				height:100px;
				text-align:center;
			}
			section article ul li a {
				margin:auto auto !important;
			}
		</style>
    </head>
	<body>
		<?php
				require_once("../phpFlickr-3.1/phpFlickr.php");
				$f = new phpFlickr("30a76f0599151dad78cec3e6c2ee380e","422a6372d3fc5dfc");
				$recent = $f->photos_search(
							array(
								"tags"=>"race,queen,asian", 
								"tag_mode"=>"all",
								"per_page" => "20", 
								"page" => "1"
								));
				$page = $recent['page']; 
				$pages = $recent['pages']; 
				$perpage = $recent['perpage']; 
				$total = $recent['total']; 
		?>
		<header>
			<h1>Resultados de la b&uacute;squeda: Total [<?php echo $total;?>] pagina: <?php echo $page;?></h1>
		</header>
		<section>
			<article id="galeria">
				<ul>
				<?php
				foreach ($recent['photo'] as $photo) {
					$tamanos = $f->photos_getSizes ($photo['id']);
					$folder = $photo['server'];
					$label = "";
					$fuente = "";
					$fuentethw = "150px";
					$fuentethh = "150px";
					$num = count($tamanos);
					foreach ($tamanos as $tmns) {
						$label = $tmns['label'];
						$fuente = $tmns['source'];
						if($label=='Thumbnail'){
							$fuenteth = $tmns['source'];
							$fuentethw = $tmns['width'];
							$fuentethh = $tmns['height'];
						}
					}
					$arch = $photo['id'].'_'.$label;
					echo "<li>
						<a href='" . $fuente . "'>
						<img src='".$fuenteth ."' border='0' width='".$fuentethw ."' height='".$fuentethh ."' />
						</a>
						</li>
						";
				}
			?>
				</ul>
			</article>
		</section>
		<footer>
			Con @jorgea3004
		</footer>
	</body>
</html>
