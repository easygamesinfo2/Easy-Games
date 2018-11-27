<?php

require 'comentario.php';
require 'DBconection.php';

class crud_comentario
{

    public function __construct(){
        $this->conexao = DBConnection::getConexao();
    }

    public function get_comentarios()
    {

        $sql = 'select * from comentario';

        $resultado = $this->conexao->query($sql);
        $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $lista_comentarios = [];

        foreach ($comentarios as $comentario) {
            $lista_comentarios[] = new comentario($comentario['texto_comentario'],$comentario['cod_comentario']);
        }


        return $lista_comentarios;

    }

    public function get_comentario( int $id)
    {

        $sql = "select * from comentario WHERE cod_comentario = $id";

        $resultado = $this->conexao->query($sql);
        $comentario = $resultado->fetch(PDO::FETCH_ASSOC);

        $lista_comentarios = new comentario($comentario['texto_comentario'],$comentario['cod_comentario']);


        return $lista_comentarios;
    }
    public function insert_comentario(comentario $com){

        $dados[] = $com->getTexto();
        $dados[] = $com->getData();
        $dados[] = $com->getId();
        $this->conexao->exec("insert into comentario(texto_comentario,data_comentario) VALUES('$dados[0]','$dados[1]')");

    }
    public function atualiza_comentario(comentario $com,int $id){

        $dados[] = $com->getTexto();
        $sql = "UPDATE comentario SET texto_comentario = '$dados[0]' WHERE cod_comentario = $id";
        $this->conexao->exec($sql);
    }
    public function excluir_comentario( int $id){

        $sql ="delete from comentario WHERE cod_comentario = $id";
        $this->conexao->exec($sql);

    }



}





