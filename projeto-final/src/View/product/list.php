<h1>Listar Produtos</h1>

<div class="mb-3 text-end">
    <a class="btn btn-sm btn-outline-info" href="/produtos/novo">Novo Produto</a>
    <a class="btn btn-sm btn-outline-dark" href="/produtos/relatorio">Gerar PDF</a>
</div>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Data Cadastro</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($product = $data->fetch(\PDO::FETCH_ASSOC))
            {

                extract($product);
                echo"<tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$description}</td>
                    <td><img width='100px' src='{$photo}'></td>
                    <td>R$ {$price}</td>
                    <td>{$quantity}</td>
                    <td>{$created_at}</td>
                    <td>
                        <a class='btn btn-sm btn-outline-warning' href='/produtos/editar?id={$id}'>✏️</a>
                        <a class='btn btn-sm btn-outline-danger' href='/produtos/excluir?id={$id}'>🗑️</a>
                    </td>
                </tr>";
            }
        
        
        ?>
    </tbody>
</table>