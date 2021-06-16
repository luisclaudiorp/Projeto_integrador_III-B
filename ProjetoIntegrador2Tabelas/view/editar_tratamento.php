<?php
require("header.php");
?>
<main>
    <a href="../tratamentos">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3">Editar Tratamento</h2>
    <form action="../editar_tratamento_post" method="POST">
        <input name="id_tratamento" type="hidden" value="<?php echo $tratamento['id_tratamento'] ?>">
        <div class="form-group">
            <label for="">Equipamento</label>
            <input class="form-control" name="equipamento" type="text" value="<?php echo $tratamento['equipamento'] ?>">
        </div>
        <div class="form-group">
            <label for="">Parâmetros</label>
            <input class="form-control" name="parametros" type="text" value="<?php echo $tratamento['parametros'] ?>">
        </div>
        <div class="form-group">
            <label for="">Intervalo</label>
            <input class="form-control" name="intervalo" type="text" value="<?php echo $tratamento['intervalo'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>  
    </form>
</main>
<?php
require("footer.php");
?>