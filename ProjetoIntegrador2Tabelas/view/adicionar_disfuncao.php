<?php
require("header.php");
?>
<main>
    <a href="disfuncoes">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3">Adicionar Disfunção</h2>
    <form action="adicionar_disfuncao_post" method="POST">
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>  
    </form>
</main>
<?php
require("footer.php");
?>
