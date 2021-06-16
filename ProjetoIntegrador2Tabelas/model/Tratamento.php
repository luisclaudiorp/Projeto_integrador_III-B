<?php

class Tratamento extends Model {

    public static function listAllFromDisfuncao($id_disfuncao) {
        $sql = new Sql();

        $data = $sql->select("
            SELECT t.id_tratamento, t.equipamento, t.parametros, t.intervalo
            FROM tratamento AS t
            INNER JOIN disfuncao_tratamento dt 
                ON dt.id_tratamento = t.id_tratamento
            INNER JOIN disfuncao d 
                ON d.id_disfuncao = dt.id_disfuncao
            WHERE d.id_disfuncao = :id_disfuncao
        ", array(
            ':id_disfuncao' => $id_disfuncao
        ));

        return $data;
    }

	//Método que retorna um array com todos os tratamentos do banco de dados.
    public static function listAll()
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM tratamento");

        return $data;
    }

	//Método que recupera um tratamento do banco de dados.
    public function getTratamento($id_tratamento)
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM tratamento WHERE id_tratamento = :id_tratamento", array(
            ':id_tratamento' => $id_tratamento
        ));

        if (isset($data[0])) {
            $this->setData($data[0]);
        }

    }

    //Método que salvará as informações desse tratamento em um novo registro no banco de dados.
    public function save()
    {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO tratamento (equipamento, parametros, intervalo) VALUES (:equipamento, :parametros, :intervalo)", array(
            ':equipamento' => $this->getequipamento(),
            ':parametros' => $this->getparametros(),
            ':intervalo' => $this->getintervalo(),
        ));

        $results = $sql->select("SELECT * FROM tratamento WHERE id_tratamento = LAST_INSERT_ID()");

        $this->setData($results[0]);
    }

    //Método que atualizará o tratamento no banco de dados com os valores atuais dos parâmetros.
    public function update()
    {
        $sql = new Sql();

        $results = $sql->query(
        "UPDATE tratamento
        SET
        equipamento = :equipamento,
        parametros = :parametros,
        intervalo = :intervalo
        WHERE id_tratamento = :id_tratamento",
        array(
            ':equipamento' => $this->getequipamento(),
            ':parametros' => $this->getparametros(),
            ':intervalo' => $this->getintervalo(),
            ':id_tratamento' => $this->getid_tratamento()
        ));

        $results = $sql->select("SELECT * FROM tratamento WHERE id_tratamento = :id_tratamento", array(':id_tratamento' => $this->getid_tratamento()));

        $this->setData($results[0]);
    }

    //Método que deleta um tratamento do banco de dados.
    public function delete()
    {
        $sql = new Sql();

        $results = $sql->query(
        "
        DELETE FROM tratamento
        WHERE id_tratamento = :id_tratamento
        ",
        array (
            ':id_tratamento' => $this->getid_tratamento()
        )
        );
    }

}

?>