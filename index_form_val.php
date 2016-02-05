<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta description="Mi sitio" />
        <title>test form validation</title>
		<script src="../librarys/jquery-1.10.2.min.js"></script>
		<?php 
 		function checkFormPss($texto) { 
 			$err =true ;
 				if(strlen($texto) < 8) { 
 					$texte = "Error: el Password debe contener al menos 8 caracteres!"; $err=false; 
 				} 
 				$re = '/(\s)/'; 
 				if(preg_match($re, $texto) && $err) { 
 					$texte = "error: el Password no debe contener espacios!"; $err=false; 
 				} 
 				$re = '/[0-9]/'; 
 				if(!preg_match($re, $texto) && $err) { 
 					$texte = "error: password must contain at least one number (0-9)!"; $err=false; 
 				} 
 				$re = '/[a-z]/'; 
 				if(!preg_match($re, $texto) && $err) { 
 					$texte = "error: password must contain at least one lowercase letter (a-z)!"; $err=false; 
 				} 
 				$re = '/[A-Z]/'; 
 				if(!preg_match($re, $texto) && $err) { 
 					$texte = "error: password must contain at least one uppercase letter (A-Z)!"; $err=false; 
 				} 
 			if(!$err){
 				return $texte;
 			} else {
 				return 'Bien'; 
 			}
 		}
 		?>
    </head>
	<body>
		<header>
			<h1>Header de la pagina</h1>
		</header>
		<section>
			<?php 
			$texto = "pOncho123";
			echo checkFormPss($texto);
			?>
		</section>
	</body>
</html>