<h1>Listar Categoria</h1>
<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($category = $data->fetch(\PDO::FETCH_ASSOC))
            {
                $id = $category['id'];
                $name = $category['name'];
                $description = $category['description'];

                echo"<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$description</td>
                    <td>
                        <a class='btn btn-sm btn-outline-warning' href='/categorias/editar?id=$id'>Editar</a>
                        <a class='btn btn-sm btn-outline-danger' href='/categorias/excluir?id=$id'>Exluir</a>
                    </td>
                </tr>";
            }
        
        
        ?>
    </tbody>
</table>