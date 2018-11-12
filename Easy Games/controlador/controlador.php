<?php 

	if (!isset($_SESSION)) {
		session_start();
	}

	//require_once (realpath(dirname(__FILE__).'../modelos/crud_usuario.php'));
	
	//require_once '../modelos/crud_usuario.php';
	
	//require_once (realpath(dirname(__FILE__).'../modelos/crud_noticia.php'));
	
	//require_once '../modelos/crud_noticia.php';
	
	//require_once (realpath(dirname(__FILE__).'../modelos/CrudAvaliacao.php'));
	
	//require_once '../modelos/CrudAvaliacao.php';
	
	//require_once (realpath(dirname(__FILE__).'../modelos/DBConnection.php'));
	
	//require_once '../modelos/DBconection.php';
	
	//require '../visualizacao/templates/cabecalho.php';

	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	}

	else{
		$acao = 'index';
	}

	switch ($acao) {
		case 'index':
			include '../visualizacao/templates/cabecalho.php';
			include '../visualizacao/index.php';
			include '../visualizacao/templates/rodape.php';
			break;
		case 'cadastrar':
			if (!isset($_POST['cadastrar'])) {
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/usuarios/index.php';
				include '../visualizacao/templates/rodape.php';
			}
			else{
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$nome  = $_POST['nome' ];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$confm = $_POST['confirma'];
				$tipo  = 0;
				switch ($tipo) {
					case 'Comum':
						$tipo_usuario = 0;
						break;
				
					default:
						$tipo_usuario = 0;
						break;
				}
				$novo_usuario = new usuario($nome, $email, $senha, $tipo);
				$crud = new crud_usuario();
				$crud->insert_usuario($novo_usuario);
				echo  "<script>alert('Cadastro efetuado com sucesso');</script>";
				echo  "<script>location.href='controlador.php?acao=login';</script>";
			}
			break;
		case 'login':
			if (!isset($_POST['entrar'])) {
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/usuarios/login.php';
				include '../visualizacao/templates/rodape.php';
			}
			else{
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$crud = new crud_usuario();
				$usuario = $crud->login($email,$senha);
				if ($usuario) {
					$_SESSION['cod_usuario']   = $usuario['cod_usuario'];
					$_SESSION['nome_usuario']  = $usuario['nome_usuario'];
					$_SESSION['tipo_usuario']  = $usuario['tipo_usuario'];
					$_SESSION['email_usuario'] = $usuario['email_usuario'];
					$_SESSION['senha_usuario'] = $usuario['senha_usuario'];
					header('location: controlador.php');
				}
				else{						
					echo  "<script>alert('Dados incorretas');</script>";
					echo  "<script>location.href='controlador.php?acao=login';</script>"; 
					}
			}
			break;
		case 'logout':
			session_destroy();
			header('location: controlador.php');
			break;
	}



 ?>