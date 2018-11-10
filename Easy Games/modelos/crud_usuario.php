<?php 
    require "usuario.php";
    require 'DBconection.php';
    class crud_usuario{
        private $conexao;
        public function get_usuarios(){
            $this->conexao=DBconnection::getConexao();
            $sql = 'select * from usuarios';
            $resultado = $this->conexao->query($sql);
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
            
            return $usuarios;
        }
        public function insert_usuario(usuario $use){
            $this->conexao=DBconnection::getConexao();
            $dados[] = $use->getNome();
            $dados[] = $use->getTipo();
            $dados[] = $use->getEmail();
            $dados[] = $use->getSenha();
            $this->conexao->exec("insert into usuarios(nome_usuario,tipo_usuario,email_usuario,senha_usuario) values('$dados[0]', '$dados[1]','$dados[2]','$dados[3]')");
        }
        public function atualiza_usuario(usuario $use,$id){
            $this->conexao = DBconnection::getConexao();
            $dados[] = $use->getId();
            $dados[] = $use->getNome();
            $dados[] = $use->getEmail();
            $dados[] = $use->getSenha();
            $sql = "update usuarios set nome = '$dados[0]',email = '$dados[1]',senha = '$dados[2]' where cod_usuario = $id";
            $this->conexao->exec($sql);
        }
        public function excluir_usuario(int $id){
            $this->conexao = DBconnection::getConexao();
            $sql = "DELETE FROM usuarios WHERE cod_usuario = $id";
            $this->conexao->exec($sql);
        }
        public function login($email,$senha){
            $this->conexao=DBconnection::getConexao();
            $sql = "SELECT * FROM usuarios WHERE email_usuario = '$email' AND senha_usuario = '$senha' ";
            $resultado = $this->conexao->query($sql);
            if ($resultado->rowCount() > 0) {
                $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
                return $usuario;
            }
            else{
                return false;
            }
        }
    }
 ?>