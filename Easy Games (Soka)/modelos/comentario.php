<?php

class comentario
{
    private $data;
    private $texto;
    private $id;

    public function __construct($texto = null,$id = null,$data = null)
    {
        $this->data = $data;
        $this->texto = $texto;
        $this->id = $id;
    }

     public function getData()
    {
        return $this->data;
    }

    public function getTexto()
    {
        return $this->texto;
    }

   public function getId()
    {
        return $this->id;
    }


}