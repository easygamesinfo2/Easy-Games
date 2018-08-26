<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:34
 */
require_once '../modelos/crud_noticia.php';

if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = "index";
}

switch ($acao){
    case 'index':
        $crud = new crud_noticia;
        $noticias = $crud->get_noticias();
        include "../view/templates/cabecalho.php";
        include "../view/noticias/index.php";
        include "../view/templates/rodape.php";
        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new crud_noticia();
        $noticia = $crud->get_noticia($id);
        include '../view/templates/cabecalho.php';
        include '../view/noticias/exibir.php';
        include '../view/templates/rodape.php';
        break;
    case 'inserir':
        if (!isset($_POST['inserir'])) {
            include '../view/templates/cabecalho.php';
            include '../view/noticias/inserir.php';
            include '../view/templates/rodape.php';
        }else{
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $nova_noticia = new noticia($titulo,$descricao);
            $crud = new crud_noticia();
            $crud->insert_noticia($nova_noticia);
            header('Location: noticias.php');
        }
        break;
    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new crud_noticia();
            $noticia = $crud->get_noticia($id);
            include '../view/templates/cabecalho.php';
            include '../view/noticias/alterar.php';
            include '../view/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $nova_noticia = new noticia($titulo,$descricao);
            $crud = new crud_noticia();
            $crud->atualiza_noticia($nova_noticia,$id);
            header('Location: noticias.php');
        }
        break;
    case 'excluir':
        $id = $_GET['id'];
        $crud = new crud_noticia();
        $crud->excluir_noticia($id);
        header('Location: noticias.php');
        break;
}