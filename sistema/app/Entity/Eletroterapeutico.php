<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Eletroterapeutico {

    /**
     * Identificador Unico do procedimento
     * @var integer
     */
    public $id;


    /**
     * Disfunção
     * @var string
     */
    public $disfuncao;

    /**
     * Equipamento utilizado
     * @var string
     */
    public $equipamento;

    /**
     * Parametros do Procedimento
     * @var string
     */
    public $parametros;

    /**
     * Intervalo das seçoes
     * @var string
     */
    public $intervalo;

    /**
     * Status do procedimento se esta ativo ou nao
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Metodo responsavel por cadastrar novo procedimento
     * @return boolean
     */
    public function cadastrar(){
        //INSERIR O PROCEDIMENTO NO BANCO
        $obDatabase = new Database('eletroterapeuticos');
        $this->id = $obDatabase->insert([
                                            'disfuncao' => $this->disfuncao,
                                            'equipamento' => $this->equipamento,
                                            'parametros' => $this->parametros,
                                            'ativo' => $this->ativo,
                                            'intervalo' => $this->intervalo
                                        ]);

        //RETORNAR SUCESSO
        return true;
    }

    /**
     * Metodo responsavel por atualizar o procedimento no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('eletroterapeuticos'))->update('id = '.$this->id,[
                                                    'disfuncao' => $this->disfuncao,
                                                    'equipamento' => $this->equipamento,
                                                    'parametros' => $this->parametros,
                                                    'ativo' => $this->ativo,
                                                    'intervalo' => $this->intervalo
                                                ]);
    }

    /**
     * Metodo responsavel para excluir o procedimento do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('eletroterapeuticos'))->delete('id = '.$this->id);
    }

    /**
     * Metodo responsavel por obter os procedimentos do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getEletroterapeuticos($where = null, $order = null, $limit = null){
        return (new Database('eletroterapeuticos'))->select($where, $order, $limit)
                                         ->fetchALL(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Metodo responsavel por obter a quantidade de procedimentos do banco
     * @param string $where
     * @return integer
     */
    public static function getQuantidadeEletroterapeuticos($where = null){
        return (new Database('eletroterapeuticos'))->select($where,null,null, 'COUNT(*) as qtd')
                                         ->fetchObject()
                                         ->qtd;
    }

    /**
     * Metodo responsavel por buscar uma procedimento com base em seu ID
     * @param integer $id
     * @return eletroterapeutico
     */
    public static function getEletroterapeutico($id){
        return (new Database('eletroterapeuticos'))->select('id = '.$id)
                                         ->fetchObject(self::class);
    }
}