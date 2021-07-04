<?php
require("header.php");
?>
<main>
    <a href="tratamentos">
        <button class="btn btn-info">Tabela de Tratamentos</button>
    </a>
    <a href="adicionar_disfuncao">
        <button class="btn btn-success">Criar Disfunção</button>
    </a>
    <br>
    <br>
    <form action="disfuncoes" method="get">
        <div class="form-group">
            <input type="text" class="form-control" name="busca" placeholder="Buscar" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>  
    </form>
    <h2 class="mt-3">Disfunções</h2>
    <table class="table table-responsive bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($disfuncoes as $disfuncao) 
        {
        ?>
            <tr>
            <td><?php echo $disfuncao['id_disfuncao'] ?></td>
            <td><a href="disfuncao/<?php echo $disfuncao['id_disfuncao'] ?>"><?php echo $disfuncao['nome'] ?></a></td>
            <td>
                <a href="editar_disfuncao/<?php echo $disfuncao['id_disfuncao'] ?>">
                        <button type="button" class="btn btn-primary">Editar</button>
                </a>
                <a href="apagar-disfuncao-confirmacao/<?php echo $disfuncao['id_disfuncao'] ?>">
                        <button type="button" class="btn btn-danger">Excluir</button>
                </a>
            </td>
            </tr>
        <?php
        }
        ?>   
        </tbody>
    </table>
    <?php
        if (empty($disfuncoes)) {
            echo "NÃO HÁ DISFUNÇÕES CORRESPONDENTES";
        }
    ?>
    <?php 
    if(isset($page)) {
    ?>
        <ul class="paginacao">
        <li class="<?php if($page <= 1){ echo 'disabled'; } else { echo 'arrow'; } ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><</a>
        </li>
        <li><?php echo $page; ?></li>
        <li class="<?php if($page >= $totalPages){ echo 'disabled'; } else { echo 'arrow'; }?>">
            <a href="<?php if($page >= $totalPages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">></a>
        </li>
        </ul>
    <?php 
    }
    ?>
</main>
<?php
require("footer.php");
?>