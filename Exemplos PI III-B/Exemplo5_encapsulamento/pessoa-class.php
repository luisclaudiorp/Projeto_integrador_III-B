<?php

//Criação da classe
class Pessoa
{
    //Declaração dos atributos
    private $nome;
    private $cpf;
    private $data_nasc;
    private $endereco;

    public $altura;
    public $peso;
    public $cor_pele;
    public $cor_olhos;

    //Set e Get do nome
    public function get_nome() 
    {
        return $this->nome;
    }

    public function set_nome($name) 
    {
        $this->nome= $name;
    }

    //Set e Get do CPF
    public function get_cpf() 
    {
        return $this->cpf;
    }

    public function set_cpf($cpf) 
    {
        $this->cpf = $cpf;
    }

    //Set e Get da data de nascimento
    public function get_data_nasc() 
    {
        return $this->data_nasc;
    }

    public function set_data_nasc($dn) 
    {
        $this->data_nasc = $dn;
    }
    
    //Set e Get do endereço
    public function get_endereco() 
    {
        return $this->endereco;
    }

    public function set_endereco($end) 
    {
        $this->endereco = $end;
    }

    //Função de cálculo do IMC
    public function calculo_imc() 
    {
        $imc = $this->peso / ($this->altura * $this->altura);
        return $imc;
    }

}
?>