<?php

namespace App\Entity;

use \App\DB\Database;
use \PDO;

class Usuario{
    
    /**
     * identificador unico do usuario
     * @var integer
     */
    public $id;


    /**
     * Nome do usuario
     * @var string
     */
    public $nome;

    /**
     * E-mail do usuario
     * @var string
     */
    public $email;


    /**
     * Hash da senha do usuario
     * @var string
     */
    public $senha;


    /**
     * Metodo responsavel por cadastrar novo usuario no banco
     * @return boolean
     */
    public function cadastrar(){
        //DATABASE
        $obDatabase = new Database('usuarios');

        //INSERE UM NOVO USUARIO
        $this ->id = $obDatabase-> insert([
            'nome'  => $this ->nome,
            'email' => $this ->email,
            'senha' => $this ->senha
        ]);

        //SUCESSO
        return true;
    }

    /**
     * metodo responsavel por retornar um isntacia de usuario com base em seu email
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email){
        return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);

    }
}