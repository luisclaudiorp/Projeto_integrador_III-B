<?php

namespace App\Session;

class Login{

    /**
     * Metodo responsavel por iniciar a sessao
     */
    private static function init(){
        //VERIFICA STATUS DA SESSAO
        if(session_status() !== PHP_SESSION_ACTIVE){
            //INICIA A SESSAO
            session_start();
        }
    }

    public static function getUsuarioLogado(){
        //INICIA A SESSAO
        self::init();

        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    /**
     * Metodo responsavel por logar o usuario
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario){
        //INICIA A SESSAO
        self::init();

        //SESSAO DE USUARIO
        $_SESSION['usuario'] = [
            'id'    => $obUsuario->id,
            'nome'  => $obUsuario->nome,
            'email' => $obUsuario->email
        ];

        //REDIRECIONA USUARIO PARA INDEX
        header('location: index.php');
        exit;
    }

    /**
     * Metodo responsavel por deslogar o usuario
     */
    public static function logout(){
        //INICIA A SESSAO
        self::init();

        //REMOVE A SESSAO DE USUARIO
        unset($_SESSION['usuario']);

        //REDIRECIONA USUARIO PARA LOGIN
        header('location: login.php');
        exit;
    }

    /**
     * Metodo responsavewl por verificar se o usuario esta logado
     * @return boolean
     */
    public static function isLogged(){
        //INICIA A SESSAO
        self::init();
        
        //VALIDACAO DA SESSAO
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Metodo responsavel por obrigar o usuario a estar logado para acessar
     */
    public static function requireLogin(){
        if(!self::isLogged()){
            header('location: login.php');
            exit;
        }
    }

     /**
     * Metodo responsavel por obrigar o usuario a estar deslogado para acessar
     */
    public static function requireLogout(){
        if(self::isLogged()){
            header('location: index.php');
            exit;
        }
    }
}