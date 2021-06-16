<?php

class Route {
    
	//A base para o funcionamento dessa classe é o redirecionamento feito no arquivo .htaccess que redireciona todas as urls para o index.php
    
    //Parâmetro que guarda as rotas válidas.
    public static $validRoutes = array();

    //Método que salva a rota no parâmetro de rotas válidas.
    public static function set($route, $function) 
    {
        self::$validRoutes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

    public static function getCurrentURL()
    {
    	//CHECA SE É HTTP OU HTTPS
    	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://";   
        } else {
            $url = "http://"; 
        }		  
 
 		//INSERÇÃO DO HOST
		$url.= $_SERVER['HTTP_HOST'];   

		//INSERÇÃO DA URI
		$url.= $_SERVER['REQUEST_URI'];    
		
		//RETORNO DO LINK COMPLETO
		return $url;
    }

    public static function getBaseName()
    {
        return basename(self::getCurrentURL());
    }
    
}

?>