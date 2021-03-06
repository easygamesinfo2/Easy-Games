<?php

require 'noticia.php';
require 'DBconection.php';

class crud_noticia
{

    public function __construct(){
        $this->conexao = DBConnection::getConexao();
    }

    public function get_noticias()
    {

        $sql = 'select * from noticia';

        $resultado = $this->conexao->query($sql);
        $noticias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $lista_noticias = [];

        foreach ($noticias as $noticia) {
            $lista_noticias[] = new noticia($noticia['titulo_noticia'], $noticia['descricao_noticia'],$noticia['imagem_noticia'],$noticia['cod_noticia']);
        }


        return $lista_noticias;

    }

    public function get_noticia( int $id)
    {

        $sql = "select * from noticia WHERE cod_noticia = $id";

        $resultado = $this->conexao->query($sql);
        $noticia = $resultado->fetch(PDO::FETCH_ASSOC);

        $lista_noticias = new noticia($noticia['titulo_noticia'], $noticia['descricao_noticia'],$noticia['imagem_noticia'],$noticia['cod_noticia']);


        return $lista_noticias;
    }
    public function insert_noticia(noticia $not){

        $dados[] = $not->getTitulo();
        $dados[] = $not->getDescricao();
        $dados[] = $not->getImagem();
        $dados[] = $not->getData();
        $dados[] = $not->getStatus();
        $dados[] = $not->getQtd();
        $dados[] = $not->getId();
        $this->conexao->exec("insert into noticia(titulo_noticia,descricao_noticia,imagem_noticia,data_noticia,status,qtd) VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]')");

    }
    public function atualiza_noticia(noticia $not,int $id){

        $dados[] = $not->getTitulo();
        $dados[] = $not->getDescricao();
        $dados[] = $not->getImagem();
        $sql = "UPDATE noticia SET titulo_noticia = '$dados[0]',descricao_noticia = '$dados[1]',imagem_noticia = '$dados[2]' WHERE cod_noticia = $id";
        $this->conexao->exec($sql);
    }
    public function excluir_noticia( int $id){

        $sql ="delete from noticia WHERE cod_noticia = $id";
        $this->conexao->exec($sql);

    }



}





