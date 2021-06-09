<main class="bg-dark text-light">

    <h2 class="mt-3">Excluir Procedimento</h2>

    <form action="" method="post">
    
        <div class="form-group">
            <p>Você deseja realmente exluir o Procedimento <strong><?=$obEletroterapeutico->disfuncao?></strong></p>
        </div>
            <a href="index.php">
            <div class="form-group">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            </div>  
    </form>

</main>