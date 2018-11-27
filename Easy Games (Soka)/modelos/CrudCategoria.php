<?php

require 'Categoria.php';
require 'DBConnection.php';

class crud_usuario
{
    private $conexao;

    public function get_usuarios()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from usuario';

        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $lista_usuarios = [];

        foreach ($usuarios as $usuario) {
            $lista_usuarios[] = new usuario($usuario['nome_usuario'], $usuario['email_usuario'],$usuario['senha_usuario'],$usuario['cod_usuario']);
        }


        return $lista_usuarios;

    }

    public function get_usuario( int $id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from usuario WHERE cod_usuario = $id";

        $resultado = $this->conexao->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

        $lista_usuarios = new usuario($usuario['nome_usuario'], $usuario['email_usuario'],$usuario['senha_usuario'],$usuario['cod_usuario']);


        return $lista_usuarios;
    }
    public function insert_usuario(usuario $use){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $use->getNome();
        $dados[] = $use->getEmail();
        $dados[] = $use->getSenha();
        $dados[] = $use->getId();
        $this->conexao->exec("insert into usuario(nome_usuario,email_usuario,senha_usuario) VALUES('$dados[0]','$dados[1]','$dados[1]')");

    }
    public function atualiza_noticia(usuario $use,int $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $use->getId();
        $dados[] = $use->getNome();
        $dados[] = $use->getEmail();
        $dados[] = $use->getSenha();
        $sql = "UPDATE usuario SET nome_usuario = '$dados[0]',email_usuario = '$dados[1]', senha = '$dados[2]'WHERE cod_usuario = $id";
        $this->conexao->exec($sql);
    }
    public function excluir_noticia( int $id){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from usuario WHERE cod_usuario = $id";
        $this->conexao->exec($sql);

    }



}





