<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:40
 */

class Avaliacao
{
    private $id;
    private $nome;
    private $descricao;

    public function __construct($nome = null,$dexcricao = null,$id = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $dexcricao;


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