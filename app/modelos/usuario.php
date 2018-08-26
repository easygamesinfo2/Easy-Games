<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:40
 */

/**
* 
*/
/**
   * 
   */
   class usuario
   {
       
       private $id;
       private $nome;
       private $email;
       private $senha;

       function __construct($nome=null,$email=null,$senha=null,$id=null)
       {
        $this->id=$id;
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=$senha;

       }

       public function getId(){
        return $this->id;
       }

       public function getNome(){
        return $this->nome;
       }

       public function getEmail(){
        return $this->email;
       }

       public function getSenha(){
        return $this->senha;
       }
   }   