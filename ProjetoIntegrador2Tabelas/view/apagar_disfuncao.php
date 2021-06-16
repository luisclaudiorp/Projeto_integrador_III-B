<?php
require("header.php");
?>
<main>
    <h2 class="mt-3">Excluir Disfunção</h2>
    <form action="../apagar-disfuncao" method="post">
        <input type="hidden" name="id_disfuncao" value="<?php echo $disfuncao['id_disfuncao'] ?>">
        <div class="form-group">
            <p>Você deseja realmente exluir a Disfunção <strong><?php echo $disfuncao['nome'] ?></strong></p>
        </div>
        <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        <a href="../disfuncoes">
            <button type="button" class="btn btn-success">Cancelar</button>
        </a>
    </form>
</main>
<?php
require("footer.php");
?>
