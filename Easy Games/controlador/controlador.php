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
				$nome = $_POST['nome'];
				$tipo = $_POST['tipo'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				switch ($tipo) {
					case 'Admin':
						$tipo_usuario = 1;
						break;
					case 'Comum':
						$tipo_usuario = 2;
						break;
					
					default:
						$tipo_usuario = 2;
						break;
				}
				$novo_usuario = new usuario($nome, $email, $senha, $tipo_usuario);
				$crud = new crud_usuario();
				$crud->insert_usuario($novo_usuario);
			}
			header('location: controlador.php');
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
					$_SESSION['cod_usuario'] = $usuario['cod_usuario'];
					$_SESSION['nome_usuario'] = $usuario['nome_usuario'];
					$_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
					$_SESSION['email_usuario'] = $usuario['email_usuario'];
					$_SESSION['senha_usuario'] = $usuario['senha_usuario'];
					header('location: controlador.php?acao=exibir_noticias');
				}
				else{
						echo "dados incorretos";
					}
			}
			header('location: controlador.php');
			break;
		case 'logout':
			session_destroy();
			header('location: controlador.php');
			break;
		case 'pagina_usuario':
			include '../visualizacao/templates/cabecalho.php';
			include '../visualizacao/usuarios/pagina_usuario.php';
			include '../visualizacao/templates/rodape.php';
			require_once '../modelos/crud_usuario.php';
			require_once '../modelos/DBconection.php';
				if (isset($_POST['editar'])) {
					$cod_usuario = $_SESSION['cod_usuario'];
					$nome = $_POST['nome'];
					$email = $_POST['email'];
					$senha = $_POST['senha'];
					$crud = new crud_usuario();
					$novo_usuario = new usuario($nome, $email, $senha);
					$crud->atualiza_usuario($novo_usuario,$cod_usuario);
				}
				if (isset($_POST['excluir'])) {
					$cod_usuario = $_SESSION['cod_usuario'];
					$crud = new crud_usuario();
					$delete = $crud->excluir_usuario($cod_usuario);
					session_destroy();
					header('location: controlador.php');
				}
				break;
		case 'alterar_usuario':
			if (!isset($_POST['editar'])) {
					include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/usuarios/perfil.php';
					include '../visualizacao/templates/rodape.php';
				}
			
				if (isset($_POST['editar'])) {
					require_once '../modelos/crud_usuario.php';
					require_once '../modelos/DBconection.php';
					$cod_usuario = $_SESSION['cod_usuario'];
					$nome = $_POST['nome'];
					$email = $_POST['email'];
					$senha = $_POST['senha'];
					$crud = new crud_usuario();
					$novo_usuario = new usuario($nome, $email, $senha);
					$crud->atualiza_usuario($novo_usuario,$cod_usuario);
					header('location: controlador.php');					
				}
				break;
		case 'excluir_usuario':
					require_once '../modelos/crud_usuario.php';
					require_once '../modelos/DBconection.php';
					$cod_usuario = $_SESSION['cod_usuario'];
					$crud = new crud_usuario();
					$delete = $crud->excluir_usuario($cod_usuario);
					session_destroy();
					header('location: controlador.php');
				break;
		case 'inserir_noticia':
				if (!isset($_POST['inserir'])) { // se ainda nao tiver preenchido o form
            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/noticias/inserir.php';
					include '../visualizacao/templates/rodape.php';
        		}else{
					require_once '../modelos/crud_noticia.php';
					require_once '../modelos/DBconection.php';
        			$titulo = $_POST['titulo'];
        			$descricao = $_POST['descricao'];
        			$data = gmdate("Y-m-d");
        			$status = 1;
        			$qtd = 0;
      				$nova_noticia = new noticia($titulo,$descricao,$data,$status,$qtd);
      				$crud = new crud_noticia();
      				$crud->insert_noticia($nova_noticia);
      				header('location: controlador.php?acao=exibir_noticias');
        		} 
				break;
		case 'exibir_noticias':
				require_once '../modelos/crud_noticia.php';
				require_once '../modelos/DBconection.php';
				$crud = new crud_noticia;
				$noticias = $crud->get_noticias();
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/noticias/index.php';
				include '../visualizacao/templates/rodape.php';
				break;
		case 'exibir_noticia':
				require_once '../modelos/crud_noticia.php';
				require_once '../modelos/DBconection.php';
				$id_noticia = $_GET['id_noticia'];
        		$crud = new crud_noticia();
        		$noticia = $crud->get_noticia($id_noticia);
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/noticias/exibir.php';
				include '../visualizacao/templates/rodape.php';
				break;
		case 'alterar_noticia':
				if (!isset($_POST['gravar_noticia'])) { // se ainda nao tiver preenchido o form
            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/noticias/alterar.php';
					include '../visualizacao/templates/rodape.php';
        		}
				else{
					require_once '../modelos/crud_noticia.php';
					require_once '../modelos/DBconection.php';
					$id_noticia = $_GET['id_noticia'];
					$titulo = $_POST['titulo'];
        			$descricao = $_POST['descricao'];
        			$data = gmdate("Y-m-d");
        			$status = 1;
        			$qtd = 0;
      				$nova_noticia = new noticia($titulo,$descricao,$data,$status,$qtd);
      				$crud = new crud_noticia();
      				$crud->atualiza_noticia($nova_noticia, $id_noticia);
      				header('location: controlador.php?acao=exibir_noticias');
				}
				break;
				

	}



 ?>