<?php
require("header.php");
?>
<main>
    <p>Sem conta? <a href="registrar">Registre-se!</a></p>
    <h2 class="mt-3">Login</h2>
    <form action="logar_usuario_post" method="POST">
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