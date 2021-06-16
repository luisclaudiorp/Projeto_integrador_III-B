<?php
require("header.php");
?>
<main>
    <a href="tratamentos">
        <button class="btn btn-info">Tabela de Tratamentos</button>
    </a>
    <a href="adicionar_disfuncao">
        <button class="btn btn-success">Criar Disfunção</button>
    </a>
    <h2 class="mt-3">Disfunções</h2>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($disfuncoes as $disfuncao) 
        {
        ?>
            <tr>
            <td><?php echo $disfuncao['id_disfuncao'] ?></td>
            <td><a href="disfuncao/<?php echo $disfuncao['id_disfuncao'] ?>"><?php echo $disfuncao['nome'] ?></a></td>
            <td>
                <a href="editar_disfuncao/<?php echo $disfuncao['id_disfuncao'] ?>">
                        <button type="button" class="btn btn-primary">Editar</button>
                </a>
                <a href="apagar-disfuncao-confirmacao/<?php echo $disfuncao['id_disfuncao'] ?>">
                        <button type="button" class="btn btn-danger">Excluir</button>
                </a>
            </td>
            </tr>
        <?php
        }
        ?>   
        </tbody>
    </table>
    <?php
        if (empty($disfuncoes)) {
            echo "NÃO HÁ DISFUNÇÕES NO BANCO DE DADOS";
        }
    ?>
</main>
<?php
require("footer.php");
?>