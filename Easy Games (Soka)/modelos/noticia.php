<?php

class noticia
{
    private $data;
    private $titulo;
    private $descricao;
    private $imagem;
    private $id;
    private $status;
    private $qtd;

    public function __construct($titulo = null,$descricao = null,$imagem = null,$id = null,$status = null,$qtd = null,$data = null)
    {
        $this->data = $data;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->id = $id;
        $this->status = $status;
        $this->qtd = $qtd;
    }

     public function getData()
    {
        return $this->data;
    }

    

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getImagem()
    {
        return $this->imagem;
    }

   public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getQtd()
    {
        return $this->qtd;
    }


}