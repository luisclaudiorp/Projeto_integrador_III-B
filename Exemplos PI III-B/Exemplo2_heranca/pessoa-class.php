<?php

//Criação da classe
class Pessoa
{
    //Declaração dos atributos
    public $nome;
    public $cpf;
    public $data_nasc;
    public $endereco;

    public $altura;
    public $peso;
    public $cor_pele;
    public $cor_olhos;

    //Declaração de método
    public function calculo_imc() 
    {
        $imc = $this->peso / ($this->altura * $this->altura);
        return $imc;
    }

}
?>