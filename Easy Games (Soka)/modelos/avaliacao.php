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
    private $imagem;
    private $curtidas;
    private $descurtidas;

    public function __construct($nome = null,$descricao = null, $imagem = null,$id = null,$curtidas = null, $descurtidas = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->curtidas = $curtidas;
        $this->descurtidas = $descurtidas;
        


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
    public function getImagem()
    {
        return $this->imagem;
    }
    public function getCurtidas(){
        return $this->curtidas;
    }
    public function setCurtidas($curtidas){
        return $this->curtidas = $curtidas;
    }
    public function getDescurtidas(){
        return $this->descurtidas;
    }
    public function setDescurtidas($descurtidas){
        return $this->descurtidas = $descurtidas;
    }

    


}