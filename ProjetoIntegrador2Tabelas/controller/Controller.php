<?php

class Controller {

    public static function CreateView($viewName, $args = []) {
        //Transforma o Array em Variaveis;
        extract($args);
        //Chama a view do createView
        require("view/$viewName.php");
    }

}

?>