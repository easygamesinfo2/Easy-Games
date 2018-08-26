<?php

class noticia
{
    private $id;
    private $titulo;
    private $descricao;

    public function __construct($titulo = null,$descricao = null,$id = null)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;


    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


}