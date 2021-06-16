<?php
require("header.php");
?>
<main>
    <a href="../disfuncoes">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3">Editar Disfunção</h2>
    <form action="../editar_disfuncao_post" method="POST">
    <input name="id_disfuncao" type="hidden" value="<?php echo $disfuncao['id_disfuncao'] ?>">
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $disfuncao['nome'] ?>">
        </div>
        <h2 class="mt-3">Tratamentos</h2>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>NOME DO TRATAMENTO</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $arrayOfIDs = [];
            foreach($todosTratamentos as $cadaTratamento) {
                array_push($arrayOfIDs, $cadaTratamento['id_tratamento']);
            ?>
            <tr>
                <td>
                    <input 
                        <?php
                            foreach($tratamentosDisfuncao as $tratamentoDisfuncao) {
                                if ($tratamentoDisfuncao['id_tratamento'] == $cadaTratamento['id_tratamento']) {
                                    echo "checked";
                                }
                            }
                        ?> name="<?php echo $cadaTratamento['id_tratamento'] ?>"type="checkbox" value="<?php echo $cadaTratamento['equipamento'] ?>">
                </td>
                <td><?php echo $cadaTratamento['id_tratamento'] ?></td>
                <td><?php echo $cadaTratamento['equipamento'] ?></td>
                <?php
                    }
                ?>
            </tr>
            </tbody>
        </table>
        <input name="arrayOfIDs" type="hidden" value="<?php echo implode(",", $arrayOfIDs); ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>  
    </form>
</main>
<?php
require("footer.php");
?>