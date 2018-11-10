<?php

require 'noticia.php';
require 'DBconection.php';

class crud_noticia
{
    private $conexao;

    public function get_noticias()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from noticia';

        $resultado = $this->conexao->query($sql);
        $noticias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $lista_noticias = [];

        foreach ($noticias as $noticia) {
            $lista_noticias[] = new noticia($noticia['titulo_noticia'], $noticia['descricao_noticia'],$noticia['cod_noticia']);
        }


        return $lista_noticias;

    }

    public function get_noticia( int $id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from noticia WHERE cod_noticia = $id";

        $resultado = $this->conexao->query($sql);
        $noticia = $resultado->fetch(PDO::FETCH_ASSOC);

        $lista_noticias = new noticia($noticia['titulo_noticia'], $noticia['descricao_noticia'],$noticia['cod_noticia']);


        return $lista_noticias;
    }
    public function insert_noticia(noticia $not){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $not->getTitulo();
        $dados[] = $not->getDescricao();
        $dados[] = $not->getId();
        $this->conexao->exec("insert into noticia(titulo_noticia,descricao_noticia) VALUES('$dados[0]','$dados[1]')");

    }
    public function atualiza_noticia(noticia $not,int $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $not->getTitulo();
        $dados[] = $not->getDescricao();
        $sql = "UPDATE noticia SET titulo_noticia = '$dados[0]',descricao_noticia = '$dados[1]'WHERE cod_noticia = $id";
        $this->conexao->exec($sql);
    }
    public function excluir_noticia( int $id){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from noticia WHERE cod_noticia = $id";
        $this->conexao->exec($sql);

    }



}





