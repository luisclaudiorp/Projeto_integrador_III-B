<?php

//Rota para o index.
Route::set('index.php', function() {
	header('Location: disfuncoes');
});

Route::set('index', function() {
	header('Location: disfuncoes');
});

Route::set('disfuncoes', function() {
	AppController::DisfuncoesView();
});

Route::set('erro', function() {
	AppController::errorView();
});


///////////////////////////////////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////

Route::set('disfuncao', function() {
	AppController::DisfuncaoView();
});

Route::set('adicionar_disfuncao', function() {
	AppController::adicionarDisfuncaoView();
});

Route::set('adicionar_disfuncao_post', function() {
	AppController::adicionarDisfuncao();
});

Route::set('editar_disfuncao', function() {
	AppController::editarDisfuncaoView();
});

Route::set('editar_disfuncao_post', function() {
	AppController::editarDisfuncao();
});

Route::set('apagar-disfuncao-confirmacao', function() {
	AppController::apagarDisfuncaoView();
});

Route::set('apagar-disfuncao', function() {
	AppController::apagarDisfuncao();
});


///////////////////////////////////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////

//Rota para todos os tratamentos.
Route::set('tratamentos', function() {
	AppController::TratamentosView();
});

Route::set('adicionar_tratamento', function() {
	AppController::adicionarTratamentoView();
});

Route::set('adicionar_tratamento_post', function() {
	AppController::adicionarTratamento();
});

Route::set('editar_tratamento', function() {
	AppController::editarTratamentoView();
});

Route::set('editar_tratamento_post', function() {
	AppController::editarTratamento();
});

Route::set('apagar-tratamento-confirmacao', function() {
	AppController::apagarTratamentoView();
});

Route::set('apagar-tratamento', function() {
	AppController::apagarTratamento();
});

?>