<?php

//Criação da classe
class Aluno extends Pessoa
{
    //Declaração dos atributos
    private $matricula;
    public $curso;

    
    //Set e Get do número de matricula
    public function get_matricula() 
    {
        return $this->matricula;
    }

    public function set_matricula($mat) 
    {
        $this->matricula = $mat;
    }

}
?>