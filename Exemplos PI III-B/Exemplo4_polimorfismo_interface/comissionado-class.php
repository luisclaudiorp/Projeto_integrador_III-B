<?php

//Criação da classe
class Comissionado implements Empregado 
{
    //Atributos
    public $nome;
    public $cpf;
    public $data_nasc;
    public $total_vendas;
    public $taxa_comissao;

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
    public function vencimento() 
    {
        $salario_base = 900.0;
        $salario = ($salario_base + ($this->total_vendas * $this->taxa_comissao)/100);
        return $salario;
    }

    

}
?>