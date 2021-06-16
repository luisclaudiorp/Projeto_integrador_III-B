<?php
require("header.php");
?>
<main>
    <a href="tratamentos">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3">Adicionar Tratamento</h2>
    <form action="adicionar_tratamento_post" method="POST">
        <div class="form-group">
            <label for="">Equipamento</label>
            <input type="text" class="form-control" name="equipamento" placeholder="Equipamento" value="">
        </div>
        <div class="form-group">
            <label for="">Parâmetros</label>
            <input type="text" class="form-control" name="parametros" placeholder="Parâmetros" value="">
        </div>
        <div class="form-group">
            <label for="">Intervalo</label>
            <input type="text" class="form-control" name="intervalo" placeholder="Intervalo" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>  
    </form>
</main>
<?php
require("footer.php");
?>