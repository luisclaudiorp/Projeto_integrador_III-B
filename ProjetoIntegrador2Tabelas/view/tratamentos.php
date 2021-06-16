<?php
require("header.php");
?>
<main>
    <a href="index.php">
        <button class="btn btn-info">Tabela de Disfunções</button>
    </a>
    <a href="adicionar_tratamento">
        <button class="btn btn-success">Criar Tratamento</button>
    </a>
    <h2 class="mt-3">Tratamentos</h2>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Parâmetros</th>
                <th>Intervalo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($tratamentos as $tratamento) 
        {
        ?>
            <tr>
            <td><?php echo $tratamento['id_tratamento'] ?></td>
            <td><?php echo $tratamento['equipamento'] ?></td>
            <td><?php echo $tratamento['parametros'] ?></td>
            <td><?php echo $tratamento['intervalo'] ?></td>
            <td>
                <a href="editar_tratamento/<?php echo $tratamento['id_tratamento'] ?>">
                    <button type="button" class="btn btn-primary">EDITAR</button>
                </a>
                <a href="apagar-tratamento-confirmacao/<?php echo $tratamento['id_tratamento'] ?>">
                    <button type="button" class="btn btn-danger">APAGAR</button>
                </a>
            </td>
            </tr>
        <?php
        }
        ?>   
        </tbody>
    </table>
    <?php
        if (empty($tratamentos)) {
            echo "NÃO HÁ TRATAMENTOS NO BANCO DE DADOS";
        }
    ?>
</main>
<?php
require("footer.php");
?>