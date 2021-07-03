<?php
require("header.php");
?>
<main>
    <a href="login">
        <button class="btn btn-success">Voltar</button>
    </a>
    <h2 class="mt-3">Registrar-se</h2>
    <form action="registrar_usuario_post" method="POST">
        <div class="form-group">
            <label for="">Nome</label>
            <input required type="text" class="form-control" name="nome" placeholder="Nome" value="">
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <input required type="email" class="form-control" name="email" placeholder="E-mail" value="">
        </div>
        <div class="form-group">
            <label for="">Senha</label>
            <input required type="password" class="form-control" name="senha" placeholder="Senha" value="">
        </div>
        <?php
        if(isset($_SESSION['msg']) == true) {
        ?>
            <p><?php echo $_SESSION['msg'] ?></p>
        <?php
        }
        unset ($_SESSION['msg']);
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>  
    </form>
</main>
<?php
require("footer.php");
?>