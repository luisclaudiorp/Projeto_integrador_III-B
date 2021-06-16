<?php
require("header.php");
?>
<main>
    <h2 class="mt-3">Excluir Tratamento</h2>
    <form action="../apagar-tratamento" method="post">
        <input type="hidden" name="id_tratamento" value="<?php echo $tratamento['id_tratamento'] ?>">
        <div class="form-group">
            <p>Você deseja realmente excluir o Tratamento <strong><?php echo $tratamento['equipamento'] ?></strong></p>
        </div>
        <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        <a href="../tratamentos">
            <button type="button" class="btn btn-success">Cancelar</button>
        </a>
    </form>
</main>
<?php
require("footer.php");
?>
