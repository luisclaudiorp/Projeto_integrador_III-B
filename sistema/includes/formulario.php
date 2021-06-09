<main class="bg-dark text-light">

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>

    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form action="" method="post">
    
        <div class="form-group">
            <label for="">Disfunção</label>
            <input type="text" class="form-control" name="disfuncao" value="<?=$obEletroterapeutico->disfuncao?>">
        </div>

        <div class="form-group">
            <label for="">Equipamento</label>
            <input type="text" class="form-control" name="equipamento" value="<?=$obEletroterapeutico->equipamento?>">
        </div>

        <div class="form-group">
            <label for="">Parametros</label>
            <input type="text" class="form-control" name="parametros" value="<?=$obEletroterapeutico->parametros?>">
        </div>

        <div class="form-group">
            <label for="">Intervalo</label>
            <input type="text" class="form-control" name="intervalo" value="<?=$obEletroterapeutico->intervalo?>">
        </div>

        <div class="form-group">
            <label for="">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="ativo" value="s" checked > Ativo
                        </label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="ativo" value="n" <?=$obEletroterapeutico->ativo == 'n' ? 'checked' : ''?>> Inativo
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>  
    </form>


</main>