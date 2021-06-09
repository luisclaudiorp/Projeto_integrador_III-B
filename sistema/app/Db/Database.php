<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    const HOST = 'localhost'; //Colocar nome do host/computdor
    const NAME = 'dados'; //Colocar nome do banco
    const USER = 'root'; //Colocar usuario do banco
    const PASS = ''; //Colocar senha se tiver

    private $table;
    
    private $connection;

    /**
     * Define a tabela e instacia e conexao
     * @param 
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo responsavel por criar uuma conexao com o banco de dados
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '. $e->getMessage());
        }
    }

    /**
     * Metodo responsavel por executar as queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '. $e->getMessage());
        }
    }


    /**
     * Metodo responsavel por inserir dados no banco
     * @param array $values [ field => value]
     * @return integer ID inserido
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';


        //EXECUTA O INSERT
        $this->execute($query, array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /**
     * Metodo responsavel por executar uma colsulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatment
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        // MONTA QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA QUERY
        return $this->execute($query);
    }

    /**
     * Metodo responsavel por executar e atualizar no banco de dados
     * @param string $where
     * @param array $values [field => value ]
     * @return boolean
     */
    public function update($where, $values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        //RETORNA SUCESO
        return true;
    }

    /**
     * Metodo responsavel por exluir dados do banco
     * @param string $where
     * @return boolean
     */
    public function delete($where){
        //MONTA A QUERT
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

}

//echo "<pre>"; print_r($binds); echo "</pre>"; exit;