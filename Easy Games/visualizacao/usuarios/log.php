<?php 
	require_once "../../modelos/crud_usuario.php";
	$conexao = new PDO("mysql:host=localhost;dbname=projeto", "root", "");
	
?>
<!DOCTYPE html>
<html>
<head>
		<title>Login ...</title>
		<script type="text/javascript">
		</script>

</head>
<body>

	<?php 
	
	$email  = $_POST['email'];
	$senha  = $_POST['senha'];
	$crud = new crud_usuario;
	$sql    = $crud->get_usuarios();
	$usuario_existe = false; 
	foreach ($sql as $usuarios) {
		if ($email == $usuarios['email'] AND $senha == $usuarios['senha'] ) {
			$usuario_existe = true;
		}	 
	}
	if ($usuario_existe = true AND $usuarios['tipo_usuario'] == 1) {
		//include "indexLogado.html";
		header('Location: ../../controle/noticias.php');
	}
	//elseif ($usuario_existe AND $usuarios['tipo_usuario'] == 2) {
		//include "indexAdmin.html";
		//header('Location: indexAdmin.php');
	//} 
	else {
		include "login.php";?>
		<script>alert('Usuário ou senha incorretos')</script>
	<?php  } ?>


?>

</body>
</html>