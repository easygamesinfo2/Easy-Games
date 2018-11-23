<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:01
 */

require 'avaliacao.php';
require 'DBconection.php';
class crud_avaliacao
{
    private $conexao;

    public function get_avaliacoes()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from avaliacao';

        $resultado = $this->conexao->query($sql);
        $avaliacoes = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaAvaliacoes = [];

        foreach ($avaliacoes as $avaliacao) {
            $listaAvaliacoes[] = new avaliacao($avaliacao['nome_avaliacao'], $avaliacao['descricao_avaliacao'],$avaliacao['cod_avaliacao']);
        }


        return $listaAvaliacoes;

    }

    public function get_avaliacao( int $id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from avaliacao WHERE cod_avaliacao = $id";

        $resultado = $this->conexao->query($sql);
        $avaliacao = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaAvaliacoes = new avaliacao($avaliacao['nome_avaliacao'], $avaliacao['descricao_avaliacao'],$avaliacao['cod_avaliacao']);


        return $listaAvaliacoes;
    }
    public function insert_avaliacao(Avaliacao $ava){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $ava->getNome();
        $dados[] = $ava->getDescricao();
        $dados[] = $ava->getId();
        $dados[] = $ava->getCurtidas();
        $this->conexao->exec("insert into avaliacao(nome_avaliacao,descricao_avaliacao,curtidas) VALUES('$dados[0]','$dados[1]','$dados[2]')");

    }
    public function atualiza_avaliacao(Avaliacao  $ava,int $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $ava->getNome();
        $dados[] = $ava->getDescricao();
        $sql = "UPDATE avaliacao SET nome_avaliacao = '$dados[0]',descricao_avaliacao = '$dados[1]'WHERE cod_avaliacao = $id";
        $this->conexao->exec($sql);
    }
    public function excluir_avaliacao( int $ava){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from avaliacao WHERE cod_avaliacao = $ava";
        $this->conexao->exec($sql);

    }
    
    public function curtir($cod_avaliacao, $cod_usuario){
        $this->conexao = DBConnection::getConexao();
        $sql = "update avaliacao set curtidas = curtidas+1 where cod_avaliacao = $cod_avaliacao";
        $atualizar_curtidas = $this->conexao->exec($sql);
        
        if ($atualizar_curtidas) {
                $inserir_curtida = $this->conexao->exec("insert into curtida (cod_usuario, cod_avaliacao) values ($cod_usuario,$cod_avaliacao)");
            
                if ($inserir_curtida) {
                    return true;
                }
                else{
                    return false;
                }
        }
    }
    
    public function descurtir($cod_avaliacao,$cod_usuario){
        $this->conexao = DBConnection::getConexao();
        $sql = "update avaliacao set curtidas = curtidas-1 where cod_avaliacao = $cod_avaliacao";
        $atualizar_curtidas = $this->conexao->exec($sql);

         if ($atualizar_curtidas){
                $inserir_curtida = $this->conexao->exec("DELETE FROM curtida WHERE cod_avaliacao = $cod_avaliacao AND cod_usuario = $cod_usuario");
            if ($inserir_curtida) {
                return true;
            }
            else{
                return false;
            }
        }

    }

    public function get_curtidas($cod_avaliacao){
        $this->conexao = DBConnection::getConexao();
        $sql ="SELECT sum(curtidas) AS numero_curtida FROM avaliacao where cod_avaliacao = $cod_avaliacao";
        $resultado = $this->conexao->query($sql);
        $curtidas = $resultado->fetch(PDO::FETCH_ASSOC);
        return $curtidas;
    }

    public function verificar_curtida($cod_avaliacao, $cod_usuario){
        $this->conexao = DBConnection::getConexao();
        $sql ="SELECT cod_usuario, cod_avaliacao from curtida where cod_usuario= $cod_usuario and cod_avaliacao=$cod_avaliacao";
        $resultado = $this->conexao->query($sql);
        $teste = $resultado->fetch(PDO::FETCH_ASSOC);
        

        if($teste['cod_usuario'] == $cod_usuario AND $teste['cod_avaliacao'] == $cod_avaliacao){
                return 'true';
            }else{
                return 'false';
            }


    }

}





