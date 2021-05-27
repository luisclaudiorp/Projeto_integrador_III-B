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
    
}

?>