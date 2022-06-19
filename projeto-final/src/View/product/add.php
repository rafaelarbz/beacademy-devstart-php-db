<h1>Cadastrar Produto</h1>
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <label for="name">Nome</label>
            <input name="name" id="name" type="text" class="form-control mb-3">
        </div>
        <div class="col-md-6">
            <label for="category">Categoria</label>
            <select name="category" id="category" class="form-select mb-3">
                <option selected>-- Selecione --</option>
                <?php 
                    while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
                        extract($category);
                        echo "<option value='{$id}'>{$name}</option>";
                    }
                ?>
            </select>
        </div>
    </div>

    <label for="description">Descrição</label>
    <textarea name="description" id="description" class="form-control mb-3"></textarea>

    <label for="price">Preço</label>
    <input name="price" id="price" type="text" class="form-control mb-3">

    <label for="quantity">Quantidade</label>
    <input name="quantity" id="quantity" type="text" class="form-control mb-3">

    <label for="photo">Foto</label>
    <input name="photo" id="photo" type="text" class="form-control mb-3">

    <button class="btn btn-outline-primary mb-3">Adicionar</button>

</form>