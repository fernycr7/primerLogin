<?php
sleep(5);
session_start();
include("bd/conexionbd.php");
$usuario=$_POST['Usuario'];
$contrasena=$_POST['Password'];

$cmd= $conn->prepare('SELECT usuario, rol_usuario.nombre_Rol FROM usuario inner join rol_usuario on usuario.id_Rol=rol_usuario.id_Rol where Usuario=? AND Contrasena=?');
$cmd->bind_param('ss',$nom_usuario, $usuario_cont);
$nom_usuario=$usuario;
$usuario_cont=md5($contrasena);
$cmd->execute();

/*Vinculamos las variables al resultado*/
$cmd->bind_result($user,$rol);
/*Almacenar el resultado*/
$cmd->store_result();
/*Se comprueba si hay resultados*/
if ($cmd->num_rows>0) {
/*Se obtienen los resultados guardados*/
	$cmd->fetch();
	//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
    header('Content-Type: application/json');
	/*Se llena el aray con los resultados*/
	$datos = array('Usuario' => $user, 'Rol' => $rol);
	/*Se crea el objeto JSON y se agregan los datos del Array*/
	echo json_encode($datos,JSON_FORCE_OBJECT);
	/*Se crea la session*/
	$_SESSION['usuario']=$user;
}else{
	echo 'no hay resultados';
}

?>