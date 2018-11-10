<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:40
 */

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $foto;
    private $preco;
    private $idCategoria;

    public function __construct($id,$nome,$descricao,$foto,$preco,$id_categoria)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
        $this->preco = $preco;
        $this->idCategoria = $id_categoria;



    }
}