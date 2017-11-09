<?php
$credenciales_bd;
/**Comprueba si el archivo db.php.ini existe*/
if (file_exists("../config/db.php.ini")) {
	try{
		/*Lee el archivo db.php.ini*/
		$credenciales_bd= parse_ini_file('../config/db.php.ini');
		/*Obtiene valores del archivo db.php.ini*/
		$host= $credenciales_bd['host'];
		$usuario=$credenciales_bd['usuario_bd'];
		$contrasena=$credenciales_bd['contrasena_bd'];
		$bd=$credenciales_bd['bd'];
		/*Crea la conexion MySQL*/
		$conn= new mysqli($host,$usuario,$contrasena,$bd);

	}catch(Exception $e){
		echo '<script>$e</script>';
	}
}else{
	
}
?>