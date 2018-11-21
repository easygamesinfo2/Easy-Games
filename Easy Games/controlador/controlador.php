<!DOCTYPE html>
<html>
<head>
		<title>Login ...</title>
		<script type="text/javascript">
		</script>

</head>
<body>


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

		case 'cadastrar':
			if (!isset($_POST['cadastrar'])) {
				include '../visualizacao/usuarios/index.php';
			}
			else{
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$nome  = $_POST['nome'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$conf  = $_POST['confirma'];
				$crud = new crud_usuario();
				$usuario = $crud->login($email,$senha);
				if ($usuario) {
					$email = $usuario['email_usuario'];
					?>					
					<script>alert('Email já cadastrado')</script>;
					<script>location.href='controlador.php?acao=cadastrar'</script> ;
					<?php
				}
				elseif ($senha != $conf) {
					?>					
					<script>alert('Senhas diferentes')</script>;
					<script>location.href='controlador.php?acao=cadastrar'</script>; 
					<?php

				}else{
					$novo_usuario = new usuario($nome, $email, $senha, 1);
					$crud = new crud_usuario();
					$crud->insert_usuario($novo_usuario);
                	?>
					<script>alert('cadastrado com sucesso')</script>
					<script>location.href='controlador.php?acao=login'</script>
					<?php
                	
				}
						
						
			}

			break;
		case 'login':
			if (!isset($_POST['entrar'])) {

				include '../visualizacao/usuarios/login.php';

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
					header('location: controlador.php?acao=index');
				}
				else{  ?>
					<script>alert('Dados incorretos')</script>
					<script>location.href='controlador.php?acao=login'</script>
					<?php
					}
			}
			break;
		case 'logout':
			session_destroy();
			header('location: controlador.php');
			break;
		case 'pagina_usuario':
			include '../visualizacao/usuarios/pagina_usuario.php';
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
            		
					if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}

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
      				header('location: controlador.php?acao=index');
        		} 
				break;
		case 'index':
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
					//require_once '../modelos/crud_noticia.php';
					//require_once '../modelos/DBconection.php';
					//$crud = new crud_noticia();
					//$id_noticia = $_GET['id_noticia'];
					//$noticia = $crud->get_noticia($id_noticia);
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
      				
      				header('location: controlador.php?acao=index');
				}
				break;
		case 'excluir_noticia':
					require_once '../modelos/crud_noticia.php';
					require_once '../modelos/DBconection.php';
					$id_noticia = $_GET['id_noticia'];
					$crud = new crud_noticia();
					$crud->excluir_noticia($id_noticia);
					header('location: controlador.php?acao=index');
				break;
		case 'exibir_avaliacoes':
				require_once '../modelos/crud_avaliacao.php';
				require_once '../modelos/DBconection.php';
				$crud = new crud_avaliacao;
				$avaliacoes = $crud->get_avaliacoes();
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/avaliacoes/index.php';
				include '../visualizacao/templates/rodape.php';
				break;
			break;
		case 'exibir_avaliacao':
				require_once '../modelos/crud_avaliacao.php';
				require_once '../modelos/DBconection.php';
				$id_avaliacao = $_GET['id_avaliacao'];
        		$crud = new crud_avaliacao();
        		$avaliacao = $crud->get_avaliacao($id_avaliacao);
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/avaliacoes/exibir.php';
				include '../visualizacao/templates/rodape.php';
			break;
		case 'inserir_avaliacao':
			if (!isset($_POST['inserir_avaliacao'])) { 
            		
            		if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=exibir_avaliacoes');
        			}

            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/avaliacoes/inserir.php';
					include '../visualizacao/templates/rodape.php';
        		}else{
					require_once '../modelos/crud_avaliacao.php';
					require_once '../modelos/DBconection.php';
        			$nome = $_POST['nome'];
        			$descricao = $_POST['descricao'];
      				$nova_avaliacao = new avaliacao($nome,$descricao);
      				$crud = new crud_avaliacao();
      				$crud->insert_avaliacao($nova_avaliacao);
      				header('location: controlador.php?acao=exibir_avaliacoes');
        		} 
			break;

		case 'alterar_avaliacao':
				if (!isset($_POST['gravar_avaliacao'])) { // se ainda nao tiver preenchido o form
            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/avaliacoes/alterar.php';
					include '../visualizacao/templates/rodape.php';
        		}
				else{
					require_once '../modelos/crud_avaliacao.php';
					require_once '../modelos/DBconection.php';
					$id_avaliacao = $_GET['id_avaliacao'];
					$nome = $_POST['nome'];
        			$descricao = $_POST['descricao'];
      				$nova_avaliacao = new avaliacao($nome,$descricao);
      				$crud = new crud_avaliacao();
      				$crud->atualiza_avaliacao($nova_avaliacao,$id_avaliacao);
      				header('location: controlador.php?acao=exibir_avaliacoes');
				}
			break;
		case 'excluir_avaliacao':
				require_once '../modelos/crud_avaliacao.php';
				require_once '../modelos/DBconection.php';
				$id_avaliacao = $_GET['id_avaliacao'];
				$crud = new crud_avaliacao();
				$crud->excluir_avaliacao($id_avaliacao);
				header('location: controlador.php?acao=exibir_avaliacoes');
			break;

	}



 ?>

</body>
</html>