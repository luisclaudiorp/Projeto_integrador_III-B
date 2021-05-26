<?php

//Criação da classe
class Horista extends Empregado
{

    //Atributos
    public $preco_hora;
    public $horas_trabalhadas;

    //Declaração da função 1
    public function vencimento() 
    {   
        $salario = ($this->preco_hora * $this->horas_trabalhadas);
        return $salario;
    }

}
?>