<?php
$pdo = new PDO("mysql:dbname=test;host:127.0.0.1","root","");
if( !isset($_POST['accion']) || strlen($_POST['accion'])<=0 ){
	$accion = 0;
} else {
	$accion = $_POST['accion'];
}
switch ($accion) {
	case 1:
		$statement = $pdo->prepare("INSERT INTO tareas(id,titulo,estatus) values (null,:titulo,1)");
		$statement->execute(array("titulo"=> $_POST['titulo']) );
		break;
	
	case 2:
		$statement = $pdo->prepare("DELETE FROM tareas WHERE id=:id");
		$statement->execute(array("id"=> $_POST['id']) );
		break;
	
	case 3:
		$statement = $pdo->prepare("UPDATE tareas SET estatus=:estatus WHERE id=:id");
		$statement->execute(array("estatus"=> $_POST['estatus'],"id"=> $_POST['id']) );
		break;

	default :
		header('Content-Type: application/json');
		$statement = $pdo->prepare("SELECT * FROM tareas");
		$statement->execute();
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($results);
		echo $json;
		break;
}
?>