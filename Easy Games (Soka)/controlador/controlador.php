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
					$novo_usuario = new usuario($nome, $email, $senha, 2);
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
					if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
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
					if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
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
        			}elseif (!isset($_SESSION['cod_usuario'])) {
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
        			$imagem = $_POST['imagem'];
        			$data = gmdate("Y-m-d");
        			$status = 1;
        			$qtd = 0;
      				$nova_noticia = new noticia($titulo,$descricao,$imagem,$data,$status,$qtd);
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
            		if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
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
        			$imagem = $_POST['imagem'];
        			$data = gmdate("Y-m-d");
        			$status = 1;
        			$qtd = 0;
      				$nova_noticia = new noticia($titulo,$descricao,$imagem,$data,$status,$qtd);
      				$crud = new crud_noticia();
      				$crud->atualiza_noticia($nova_noticia, $id_noticia);
      				
      				header('location: controlador.php?acao=index');
				}
				break;
		case 'excluir_noticia':
					if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
					require_once '../modelos/crud_noticia.php';
					require_once '../modelos/DBconection.php';
					$id_noticia = $_GET['id_noticia'];
					$crud = new crud_noticia();
					$crud->excluir_noticia($id_noticia);
					header('location: controlador.php?acao=index');
				break;
		case 'inserir_comentario':
				if (!isset($_POST['inserir_comentario'])) { // se ainda nao tiver preenchido o form
            		
					if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=exibir_comentarios');
        			}

            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/comentario/inserir.php';
					include '../visualizacao/templates/rodape.php';
        		}else{
					require_once '../modelos/crud_comentario.php';
					require_once '../modelos/DBconection.php';
        			$texto = $_POST['texto'];
        			$data = gmdate("Y-m-d");
      				$novo_comentario = new comentario($texto,$data);
      				$crud = new crud_comentario();
      				$crud->insert_comentario($novo_comentario);
      				header('location: controlador.php?acao=exibir_comentarios');
        		} 
				break;
		case 'exibir_comentarios':
				require_once '../modelos/crud_comentario.php';
				require_once '../modelos/DBconection.php';
				$crud = new crud_comentario;
				$comentarios = $crud->get_comentarios();
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/comentario/index.php';
				include '../visualizacao/templates/rodape.php';
				break;
		case 'exibir_comentario':
				require_once '../modelos/crud_comentario.php';
				require_once '../modelos/DBconection.php';
				$id_comentario = $_GET['id_comentario'];
        		$crud = new crud_comentario();
        		$comentario = $crud->get_comentario($id_comentario);
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/comentario/exibir.php';
				include '../visualizacao/templates/rodape.php';
				break;
		case 'alterar_comentario':
				if (!isset($_POST['gravar_comentario'])) { // se ainda nao tiver preenchido o form
            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/comentario/alterar.php';
					include '../visualizacao/templates/rodape.php';
					//require_once '../modelos/crud_noticia.php';
					//require_once '../modelos/DBconection.php';
					//$crud = new crud_noticia();
					//$id_noticia = $_GET['id_noticia'];
					//$noticia = $crud->get_noticia($id_noticia);
        		}
				else{
					require_once '../modelos/crud_comentario.php';
					require_once '../modelos/DBconection.php';
					$id_comentario = $_GET['id_comentario'];
        			$texto = $_POST['texto'];
        			$data = gmdate("Y-m-d");
      				$novo_comentario = new comentario($texto,$data);
      				$crud = new crud_comentario();
      				$crud->atualiza_comentario($novo_comentario, $id_comentario);
      				
      				header('location: controlador.php?acao=exibir_comentarios');
				}
				break;
		case 'excluir_comentario':
					require_once '../modelos/crud_comentario.php';
					require_once '../modelos/DBconection.php';
					$id_comentario = $_GET['id_comentario'];
					$crud = new crud_comentario();
					$crud->excluir_comentario($id_comentario);
					header('location: controlador.php?acao=exibir_comentarios');
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
        		$num_curtidas = $crud->get_curtidas($id_avaliacao);
        		$num_descurtidas = $crud->get_descurtidas($id_avaliacao);
				$nota_jogo = ($num_curtidas['numero_curtida']/$num_descurtidas['numero_descurtida']);
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/avaliacoes/exibir.php';
				include '../visualizacao/templates/rodape.php';
			break;
		case 'inserir_avaliacao':
			if (!isset($_POST['inserir_avaliacao'])) { 
            		
            		if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}

            		include '../visualizacao/templates/cabecalho.php';
					include '../visualizacao/avaliacoes/inserir.php';
					include '../visualizacao/templates/rodape.php';
        		}else{
					require_once '../modelos/crud_avaliacao.php';
					require_once '../modelos/DBconection.php';
        			$nome = $_POST['nome'];
        			$descricao = $_POST['descricao'];
        			$imagem = $_POST['imagem'];
      				$nova_avaliacao = new avaliacao($nome,$descricao,$imagem);
      				$crud = new crud_avaliacao();
      				$crud->insert_avaliacao($nova_avaliacao);
      				header('location: controlador.php?acao=exibir_avaliacoes');
        		} 
			break;

		case 'alterar_avaliacao':
				if (!isset($_POST['gravar_avaliacao'])) { // se ainda nao tiver preenchido o form
            		if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
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
        			$imagem = $_POST['imagem'];
      				$nova_avaliacao = new avaliacao($nome,$descricao,$imagem);
      				$crud = new crud_avaliacao();
      				$crud->atualiza_avaliacao($nova_avaliacao,$id_avaliacao);
      				header('location: controlador.php?acao=exibir_avaliacoes');
				}
			break;
		case 'excluir_avaliacao':
				if($_SESSION['cod_usuario']==2) {
            			header('location: controlador.php?acao=index');
        			}elseif (!isset($_SESSION['cod_usuario'])) {
        				header('location: controlador.php?acao=index');
        			}
				require_once '../modelos/crud_avaliacao.php';
				require_once '../modelos/DBconection.php';
				$id_avaliacao = $_GET['id_avaliacao'];
				$crud = new crud_avaliacao();
				$crud->excluir_avaliacao($id_avaliacao);
				header('location: controlador.php?acao=exibir_avaliacoes');
			break;
		case 'curtir':
			
			require_once '../modelos/crud_avaliacao.php';
			require_once '../modelos/DBconection.php';
			$id_avaliacao = $_GET['id_avaliacao'];
			$id_usuario = $_SESSION['cod_usuario'];
			$crud = new crud_avaliacao();
			$verificar_curtida = $crud->verificar_curtida($id_avaliacao,$id_usuario);
			$verificar_descurtida = $crud->verificar_descurtida($id_avaliacao,$id_usuario);

			if($verificar_descurtida == 'true'){
                $nova_descurtida = $crud->tirar_descurtida($id_avaliacao, $id_usuario);
            }

			if($verificar_curtida == 'true'){
                $nova_curtida = $crud->descurtir($id_avaliacao, $id_usuario);
            }


            elseif($verificar_curtida == 'false'){
                $nova_curtida = $crud->curtir($id_avaliacao, $id_usuario);
            }



            header('location: controlador.php?acao=exibir_avaliacao&id_avaliacao='.$id_avaliacao);
			break;
		case 'descurtida':
			require_once '../modelos/crud_avaliacao.php';
			require_once '../modelos/DBconection.php';
			$id_avaliacao = $_GET['id_avaliacao'];
			$id_usuario = $_SESSION['cod_usuario'];
			$crud = new crud_avaliacao();
			$verificar_descurtida = $crud->verificar_descurtida($id_avaliacao,$id_usuario);
			$verificar_curtida = $crud->verificar_curtida($id_avaliacao,$id_usuario);

			if($verificar_curtida == 'true'){
                $nova_curtida = $crud->descurtir($id_avaliacao, $id_usuario);
            }

			if($verificar_descurtida == 'true'){
                $nova_descurtida = $crud->tirar_descurtida($id_avaliacao, $id_usuario);
            }


            elseif($verificar_descurtida == 'false'){
                $nova_descurtida = $crud->descurtida($id_avaliacao, $id_usuario);
            }



            header('location: controlador.php?acao=exibir_avaliacao&id_avaliacao='.$id_avaliacao);
			break;
		case 'gerencia':
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$crud = new crud_usuario;
				$usuarios = $crud->get_usuarios();
				include '../visualizacao/templates/cabecalho.php';
				include '../visualizacao/usuarios/gerencia.php';
				include '../visualizacao/templates/rodape.php';
			break;
		case 'excluir_usuario_especifico':
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$cod_usuario = $_GET['cod_usuario'];
				$usuario_logado = $_SESSION['cod_usuario'];
				$crud = new crud_usuario();
				$delete = $crud->excluir_usuario($cod_usuario);
				if($cod_usuario == $usuario_logado){
                	session_destroy();
					header('location: controlador.php');
					unset($cod_usuario);
            	}
				else{
					header('location: controlador.php?acao=gerencia');
				}
			break;
		case 'alterar_tipo':
				require_once '../modelos/crud_usuario.php';
				require_once '../modelos/DBconection.php';
				$tipo_usuario = $_GET['tipo_usuario'];
				$cod_usuario = $_GET['cod_usuario'];
				if($tipo_usuario == 1){
                	$tipo_usuario_ao_contrario = 2;
            	}
            	elseif($tipo_usuario == 2){
                	$tipo_usuario_ao_contrario = 1;
            	}
            	$usuario_logado = $_SESSION['cod_usuario'];
				$crud = new crud_usuario();
				$alterando = $crud->tipo_usuario($cod_usuario,$tipo_usuario_ao_contrario);
				if($cod_usuario == $usuario_logado){
                	session_destroy();
					header('location: controlador.php');
					unset($tipo_usuario);
					unset($cod_usuario);
					unset($tipo_usuario_ao_contrario);
            	}
				else{
					header('location: controlador.php?acao=gerencia');
					unset($tipo_usuario);
					unset($cod_usuario);
					unset($tipo_usuario_ao_contrario);
				}		
			break;
		case 'busca':
			$busca = $_POST['pesquisa'];
			require_once '../modelos/crud_avaliacao.php';
			require_once '../modelos/DBconection.php';
      		$crud = new crud_avaliacao();
      		$avaliacao = $crud->busca($busca);
      		include '../visualizacao/templates/cabecalho.php';
      		include '../visualizacao/avaliacoes/pesquisa_avaliacao.php';
      		include '../visualizacao/templates/rodape.php';
			break;
		case 'busca_usuario':
			$busca = $_POST['pesquisa'];
			require_once '../modelos/crud_usuario.php';
			require_once '../modelos/DBconection.php';
      		$crud = new crud_usuario();
      		$usuario = $crud->busca($busca);
      		include '../visualizacao/templates/cabecalho.php';
      		include '../visualizacao/usuarios/pesquisa_usuario.php';
      		include '../visualizacao/templates/rodape.php';
			break;
	}



 ?>

</body>
</html>