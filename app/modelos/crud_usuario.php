<?php 
    require "usuario.php";
    require "DBconnection.php";
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
            $dados[] = $use->getId();
            $dados[] = $use->getNome();
            $dados[] = $use->getEmail();
            $dados[] = $use->getSenha();
            $this->conexao->exec("insert into usuarios(nome_usuario,email_usuario,senha_usuario, tipo_usuario) values('$dados[0]', '$dados[1]','$dados[2]', 1)");
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
    }
 ?>