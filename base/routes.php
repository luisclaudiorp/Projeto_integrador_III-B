<?php

//Rota para o index.
Route::set('index.php', function() {
    Controller::CreateView("home");
});

//Rota teste.
Route::set('teste', function() {
	 Controller::CreateView("page2");
});

?>