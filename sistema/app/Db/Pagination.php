<?php

namespace App\Db;

class Pagination{
    
    /**
     * Numero maximo de registros por pagina
     * @var integer
     */
    private $limit;

    /**
     * quantidade total de resultados do banco
     * @var integer
     */
    private $results;

    /**
     * Quantidade de paginas
     * @var integer
     */
    private $pages;

    /**
     * Pgina atual
     * @var integer
     */
    private $currentPage;

    /**
     * Construtor da classe
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 10){
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }
    
    /**
     * Metodo responsavel por calcular a paginação
     */
    private function calculate(){
        //CALCULA O TOTAL DE PAGINAS
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //VERIFICA SE A PAGINA ATUAL NAO EXCEDE O NUMERO DE PAGINAS
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Metodo responsavel por retornar a clausula limit da SQL
     * @return string
     */
    public function getLimit(){
        $offset = ($this->limit * ($this->currentPage -1));
        return $offset.','.$this->limit;
    }

    /**
     * Metodo responsavel por retornar as opçoes de pagina disponiveis
     * @return arry
     */
    public function getPages(){
        //NÃO RETORNA PAGINAS
        if($this->pages == 1) return [];

        //PAGINAS
        $paginas = [];
        for($i = 1; $i <= $this->pages; $i++){
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }

        return $paginas;
    }
}