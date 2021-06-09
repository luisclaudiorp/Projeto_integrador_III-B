<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Erro ao executar a ação!</div>';
            break;
        }
    }


    $resultados = '';
    foreach($eletroterapeuticos as $eletroterapeutico){
        $resultados .= '<tr>
                            <td>'.$eletroterapeutico->id.'</td>
                            <td>'.$eletroterapeutico->disfuncao.'</td>
                            <td>'.$eletroterapeutico->equipamento.'</td>
                            <td>'.$eletroterapeutico->parametros.'</td>
                            <td>'.$eletroterapeutico->intervalo.'</td>
                            <td>'.($eletroterapeutico->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                            <td>
                                <a href="editar.php?id='.$eletroterapeutico->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$eletroterapeutico->id.'">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="6" class="text-center"> 
                                                                Nenhum procedimento encontrado
                                                            </td>
                                                        </tr>';
    //GET
    unset($_GET['status']);
    unset($_GET['pagina']);
    $gets = http_build_query($_GET);
    
    //PAGINAÇÃO
    $paginacao = '';
    $paginas   = $obPagination->getPages();
    foreach($paginas as $key=>$pagina){
        $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
        $paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
                            <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
                        </a>';
    }

?>


<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo Procedimento</button>
        </a>
    </section>

    <section>
    
        <form action="" method="get">
            <div class="row my-4">
            
                <div class="col">
                
                    <label for="">Buscar por Disfunção</label>
                    <input type="text" name="busca" class="form-control" value="<?=$busca?>">
                </div>
                
                <div class="col">
                    <label for="">Status</label>
                    <select name="filtroStatus" id="" class="form-control">
                        <option value="">Ativo/Inativo</option>
                        <option value="s" <?=$filtroStatus == 's' ? 'selected' : ''?>>Ativo</option>
                        <option value="n" <?=$filtroStatus == 'n' ? 'selected' : ''?>>Inativo</option>
                    </select>
                </div>


                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                
                
                </div>
            
            </div>

        
        </form>
    
    </section>

    <section>
        
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Disfunção</th>
                    <th>Equipamento</th>
                    <th>Parâmetros</th>
                    <th>Intervalo</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            
            </tbody>


        </table>
    

    </section>

    <section>
        <?=$paginacao?>
    </section>

</main>