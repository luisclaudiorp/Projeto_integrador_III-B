<?php

//Criação da classe
abstract class Empregado
{

    //Atributos
    public $nome;
    public $cpf;
    public $data_nasc;

    //Declaração da função 1
    public function get_nome() 
    {
        return $this->nome;
    }

    //Declaração da função 2
    public function get_cpf() 
    {
        return $this->cpf;
    }

    //Declaração da função 3
    public function get_data_nasc() 
    {
        return $this->data_nasc;
    }

    //Declaração da função 4
    abstract function vencimento();

}
?>