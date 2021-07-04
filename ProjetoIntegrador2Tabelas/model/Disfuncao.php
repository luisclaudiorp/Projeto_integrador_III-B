<?php

class Disfuncao extends Model {

    //Método que associa o tratamento a disfunção.
    public function addTratamento($id_tratamento) 
    {
        
        $sql = new Sql();

        $data = $sql->select("
            SELECT id_tratamento
            FROM disfuncao_tratamento
            WHERE id_disfuncao = :id_disfuncao AND id_tratamento = :id_tratamento;
        ", array(
            ':id_disfuncao' => $this->getid_disfuncao(),
            'id_tratamento' => $id_tratamento
        ));

        if (empty($data)) {
            $results = $sql->query("INSERT INTO disfuncao_tratamento (id_disfuncao, id_tratamento) VALUES (:id_disfuncao, :id_tratamento)", array(
                ':id_disfuncao' => $this->getid_disfuncao(),
                ':id_tratamento' => $id_tratamento
            ));
        }
        
    }

    //Método que disassocia o tratamento da disfunção.
    public function deleteTratamento($id_tratamento) {
        
        $sql = new Sql();

        $results = $sql->query(
        "
        DELETE FROM disfuncao_tratamento
        WHERE id_disfuncao = :id_disfuncao AND id_tratamento = :id_tratamento
        ",
        array (
            ':id_disfuncao' => $this->getid_disfuncao(),
            ':id_tratamento' => $id_tratamento
        )
        );
    }

    //Método que retorna o numero total de paginas a serem exibidas com base no limite por página.
    public static function getNumberOfPages($limit) {
        $sql = new Sql();

        $results = $sql->select("SELECT COUNT(*) FROM disfuncao ;");

        $total_rows = $results[0]['COUNT(*)'];

        $total_pages = ceil($total_rows / $limit);

        return $total_pages;
    }

    //Método que retorna um array com as disfunções paginadas
    public static function listPaginate($offset, $lim) {

        $offset = intval($offset);

        $sql = new Sql();

        $data = $sql->select("SELECT * FROM disfuncao LIMIT $offset , $lim ;");

        return $data;
    }

	//Método que retorna um array com todos as disfunções do banco de dados.
    public static function listAll()
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM disfuncao");

        return $data;
    }

    //Método que retorna um array com disfunções com nomes próximos ao pesquisado.
    public static function searchByNome($nome)
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM disfuncao WHERE nome LIKE CONCAT('%', :nome, '%') ;", array(
            ':nome' => $nome,
        ));

        return $data;
        
    }

	//Método que recupera uma disfunção do banco de dados.
    public function getDisfuncao($id_disfuncao)
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM disfuncao WHERE id_disfuncao = :id_disfuncao", array(
            ':id_disfuncao' => $id_disfuncao
        ));

        if (isset($data[0])) {
            $this->setData($data[0]);
        }
        
    }

    //Método que salvará as informações dessa disfunção em um novo registro no banco de dados.
    public function save()
    {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO disfuncao (nome) VALUES (:nome)", array(
            ':nome' => $this->getnome(),
        ));

        $results = $sql->select("SELECT * FROM disfuncao WHERE id_disfuncao = LAST_INSERT_ID()");

        $this->setData($results[0]);
    }

    //Método que atualizará a disfuncao no banco de dados com os valores atuais dos parâmetros.
    public function update()
    {
        $sql = new Sql();

        $results = $sql->query(
        "UPDATE disfuncao
        SET
        nome = :nome
        WHERE id_disfuncao = :id_disfuncao",
        array(
            ':nome' => $this->getnome(),
            ':id_disfuncao' => $this->getid_disfuncao()
        ));

        $results = $sql->select("SELECT * FROM disfuncao WHERE id_disfuncao = :id_disfuncao", array(':id_disfuncao' => $this->getid_disfuncao()));

        $this->setData($results[0]);
    }

    //Método que deleta uma disfuncao do banco de dados.
    public function delete()
    {
        $sql = new Sql();

        $results = $sql->query(
        "
        DELETE FROM disfuncao
        WHERE id_disfuncao = :id_disfuncao
        ",
        array (
            ':id_disfuncao' => $this->getid_disfuncao()
        )
        );
    }

}

?>