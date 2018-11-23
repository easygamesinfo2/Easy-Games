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
    private $curtidas;

    public function __construct($nome = null,$descricao = null,$id = null,$curtidas = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->curtidas = $curtidas;


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
    public function getCurtidas(){
        return $this->curtidas;
    }
    public function setCurtidas($curtidas){
        return $this->curtidas = $curtidas;
    }


}