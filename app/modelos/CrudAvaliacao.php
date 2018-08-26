<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:01
 */

require 'Avaliacao.php';
require 'DBConnection.php';
class CrudAvaliacao
{
    private $conexao;

    public function getAvaliacoes()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from avaliacao';

        $resultado = $this->conexao->query($sql);
        $avaliacoes = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaAvaliacoes = [];

        foreach ($avaliacoes as $avaliacao) {
            $listaAvaliacoes[] = new Avaliacao($avaliacao['nome_avaliacao'], $avaliacao['descricao_avaliacao'],$avaliacao['cod_avaliacao']);
        }


        return $listaAvaliacoes;

    }

    public function getAvaliacao( int $id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from avaliacao WHERE cod_avaliacao = $id";

        $resultado = $this->conexao->query($sql);
        $avaliacao = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaAvaliacoes = new Avaliacao($avaliacao['nome_avaliacao'], $avaliacao['descricao_avaliacao'],$avaliacao['cod_avaliacao']);


        return $listaAvaliacoes;
    }
    public function insertAvaliacao(Avaliacao $ava){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $ava->getNome();
        $dados[] = $ava->getDescricao();
        $dados[] = $ava->getId();
        $this->conexao->exec("insert into avaliacao(nome_avaliacao,descricao_avaliacao) VALUES('$dados[0]','$dados[1]')");

    }
    public function atualizaAvaliacao(Avaliacao  $ava,int $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $ava->getNome();
        $dados[] = $ava->getDescricao();
        $sql = "UPDATE avaliacao SET nome_avaliacao = '$dados[0]',descricao_avaliacao = '$dados[1]'WHERE cod_avaliacao = $id";
        $this->conexao->exec($sql);
    }
    public function excluirAvaliacao( int $ava){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from avaliacao WHERE cod_avaliacao = $ava";
        $this->conexao->exec($sql);

    }



}





