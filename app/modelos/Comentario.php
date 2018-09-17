<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 17/09/2018
 * Time: 13:48
 */

class Comentario
{
    private $id;
    private $descricao;

    public function __construct($descricao = null,$id = null)
    {
        $this->id = $id;
        $this->descricao = $descricao;


    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


}