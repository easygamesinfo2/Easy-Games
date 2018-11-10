<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:29
 */
require 'Produto.php';
require 'DBConnection.php';
class ProdutosCrud
{
    private $conexao;

    public function getCategorias()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from produto';

        $resultado = $this->conexao->query($sql);
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];

        foreach ($categorias as $categoria) {
            $listaCategorias[] = new Produto($categoria['id_produto'], $categoria['nome_produto'], $categoria['descricao_produto'],$categoria['foto_produto'],$categoria['preco_produto'],$categoria['id_categoria']);
        }


        return $listaCategorias;

    }

    public function getCategoria($id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from produto WHERE id_produto = $id";

        $resultado = $this->conexao->query($sql);
        $categorias = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaCategorias = new Produto($categorias['id_produto'], $categorias['nome_produto'], $categorias['descricao_produto'],$categorias['foto_produto'],$categorias['preco_produto'],$categorias['id_categoria']);


        return $listaCategorias;
    }
}

$crud = new ProdutosCrud();
$cats = $crud->getCategorias();


$cat1 = $crud->getCategoria(1);


var_dump($cat1);