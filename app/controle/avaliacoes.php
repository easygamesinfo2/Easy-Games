<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:34
 */
require_once '../modelos/CrudAvaliacao.php';

if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = "index";
}

switch ($acao){
    case 'index':
        $crud = new CrudAvaliacao();
        $avaliacoes = $crud->getAvaliacoes();
        include "../view/templates/cabecalho.php";
        include "../view/avaliacoes/index.php";
        include "../view/templates/rodape.php";
        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new CrudAvaliacao();
        $avaliacao = $crud->getAvaliacao($id);
        include '../view/templates/cabecalho.php';
        include '../view/avaliacoes/exibir.php';
        include '../view/templates/rodape.php';
        break;
    case 'inserir':
        if (!isset($_POST['inserir'])) {
            include '../view/templates/cabecalho.php';
            include '../view/avaliacoes/inserir.php';
            include '../view/templates/rodape.php';
        }else{
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaAva = new Avaliacao($nome,$descricao);
            $crud = new CrudAvaliacao();
            $crud->insertAvaliacao($novaAva);
            header('Location: avaliacoes.php');
        }
        break;
    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudAvaliacao();
            $avaliacao = $crud->getAvaliacao($id);
            include '../view/templates/cabecalho.php';
            include '../view/avaliacoes/alterar.php';
            include '../view/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaAva = new Avaliacao($nome,$descricao);
            $crud = new CrudAvaliacao();
            $crud->atualizaAvaliacao($novaAva,$id);
            header('Location: avaliacoes.php');
        }
        break;
    case 'excluir':
        $id = $_GET['id'];
        $crud = new CrudAvaliacao();
        $crud->excluirAvaliacao($id);
        header('Location: avaliacoes.php');
        break;
}