<?php

//Criação da classe
class Comissionado extends Empregado
{

    //Atributos
    public $total_vendas;
    public $taxa_comissao;

    //Declaração da função 1
    public function vencimento() 
    {
        $salario_base = 900.0;
        $salario = ($salario_base + ($this->total_vendas * $this->taxa_comissao)/100);
        return $salario;
    }

}
?>