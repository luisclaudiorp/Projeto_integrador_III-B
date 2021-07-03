<?php

class Usuario extends Model {

    public static function getNomeUsuarioFromEmail($email) {
        $sql = new Sql();

        $data = $sql->select("
            SELECT nome
            FROM usuario
            WHERE email = :email;
        ", array( 
            ':email' => $email,
        ));

        if (!empty($data)) {
            return $data[0]['nome'];
        } else {
            return "";
        }
    }

    public static function isEmailRegistered($email) {
        $sql = new Sql();

        $data = $sql->select("
            SELECT *
            FROM usuario
            WHERE email = :email;
        ", array( 
            ':email' => $email,
        ));

        if (!empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    //Método que verifica o Login;
    public static function getLogin($email, $senha) {

        $sql = new Sql();

        $data = $sql->select("
            SELECT *
            FROM usuario
            WHERE email = :email;
        ", array( 
            ':email' => $email,
        ));

        if (!empty($data)) {
            if (password_verify($senha, $data[0]['senha'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

	//Método que retorna um array com todos os usuários do banco de dados.
    public static function listAll()
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM usuario");

        return $data;
    }

	//Método que recupera um usuário do banco de dados.
    public function getUsuario($id_usuario)
    {
        $sql = new Sql();

        $data = $sql->select("SELECT * FROM usuario WHERE id_usuario = :id_usuario", array(
            ':id_usuario' => $id_usuario
        ));

        if (isset($data[0])) {
            $this->setData($data[0]);
        }
        
    }

    //Método que salvará as informações desse usuário em um novo registro no banco de dados.
    public function save()
    {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)", array(
            ':nome' => $this->getnome(),
            ':email' => $this->getemail(),
            ':senha' => $this->getsenha(),
        ));

        $results = $sql->select("SELECT * FROM usuario WHERE id_usuario = LAST_INSERT_ID()");

        $this->setData($results[0]);
    }

    //Método que atualizará o usuário no banco de dados com os valores atuais dos parâmetros.
    public function update()
    {
        $sql = new Sql();

        $results = $sql->query(
        "UPDATE usuario
        SET
        nome = :nome,
        email = :email,
        senha = :senha
        WHERE id_usuario = :id_usuario",
        array(
            ':nome' => $this->getnome(),
            ':email' => $this->getemail(),
            ':senha' => $this->getsenha(),
            ':id_usuario' => $this->getid_usuario()
        ));

        $results = $sql->select("SELECT * FROM usuario WHERE id_usuario = :id_usuario", array(':id_usuario' => $this->getid_usuario()));

        $this->setData($results[0]);
    }

    //Método que deleta um usuário do banco de dados.
    public function delete()
    {
        $sql = new Sql();

        $results = $sql->query(
        "
        DELETE FROM usuario
        WHERE id_usuario = :id_usuario
        ",
        array (
            ':id_usuario' => $this->getid_usuario()
        )
        );
    }

}

?>