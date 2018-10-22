<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:34
 */
require_once '../modelos/CrudComentario.php.php';

if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = "index";
}

switch ($acao){
    case 'index':
        $crud = new CrudComentario();
        $comentario = $crud->getComentario();
        include "../view/templates/cabecalho.php";
        include "../view/comentario/index.php";
        include "../view/templates/rodape.php";
        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new CrudComentario();
        $comentario = $crud->getComentario($id);
        include '../view/templates/cabecalho.php';
        include '../view/comentario/exibir.php';
        include '../view/templates/rodape.php';
        break;
    case 'inserir':
        if (!isset($_POST['inserir'])) {
            include '../view/templates/cabecalho.php';
            include '../view/comentario/inserir.php';
            include '../view/templates/rodape.php';
        }else{
            $descricao = $_POST['descricao'];
            $novaCom = new Comentario($descricao);
            $crud = new CrudComentario();
            $crud->insertComentario($novaCom);
            header('Location: comentarios.php');
        }
        break;
    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudComentario();
            $comentario = $crud->getComentario($id);
            include '../view/templates/cabecalho.php';
            include '../view/comentario/alterar.php';
            include '../view/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $descricao = $_POST['descricao'];
            $novaCom = new Comentario($descricao);
            $crud = new CrudComentario();
            $crud->atualizaComentario($novaCom,$id);
            header('Location: comentarios.php');
        }
        break;
    case 'excluir':
        $id = $_GET['id'];
        $crud = new CrudComentario();
        $crud->excluirComentario($id);
        header('Location: comentarios.php');
        break;
}