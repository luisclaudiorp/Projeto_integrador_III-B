<?php
require("header.php");
?>
<main>
    <a href="../disfuncoes">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3"><?php echo $disfuncao['nome'] ?></h2>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>Tratamento</th>
                <th>Parâmetros</th>
                <th>Intervalo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($tratamentos as $tratamento) {
            ?>
                <tr>
                    <td><?php echo $tratamento['equipamento'] ?></td>
                    <td><?php echo $tratamento['parametros'] ?></td>
                    <td><?php echo $tratamento['intervalo'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
        if (empty($tratamentos)) {
            echo "DISFUNÇÃO SEM TRATAMENTO";
        }
    ?>
</main>
<?php
require("footer.php");
?>