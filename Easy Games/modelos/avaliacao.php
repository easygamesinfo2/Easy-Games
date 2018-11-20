<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:40
 */

class avaliacao
{
    private $id;
    private $nome;
    private $descricao;

    public function __construct($nome = null,$descricao = null,$id = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;


    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


}