<h1>Editar Produto</h1>
<?php
    extract($data);
?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <label for="name">Nome</label>
            <input value="<?php echo $product['name'];?>" name="name" id="name" type="text" class="form-control mb-3">
        </div>
        <div class="col-md-6">
            <label for="category">Categoria</label>
            <select name="category" id="category" class="form-select mb-3">
                <option value="<?php echo $product['category_id'];?>" selected><?php echo $categoryName['categoryName'];?></option>
                <?php 
                    while ($category = $data['category']->fetch(\PDO::FETCH_ASSOC)) {
                        extract($category);
                        echo "<option value='{$id}'>{$name}</option>";
                    }
                ?>
            </select>
        </div>
    </div>

    <label for="description">Descrição</label>
    <textarea name="description" id="description" class="form-control mb-3"><?php echo $product['description'];?></textarea>

    <label for="price">Preço</label>
    <input value="<?php echo $product['price'];?>" name="price" id="price" type="text" class="form-control mb-3">

    <label for="quantity">Quantidade</label>
    <input value="<?php echo $product['quantity'];?>" name="quantity" id="quantity" type="text" class="form-control mb-3">

    <label for="photo">Foto</label>
    <input value="<?php echo $product['photo'];?>" name="photo" id="photo" type="text" class="form-control mb-3">

    <button class="btn btn-outline-primary mb-3">Atualizar</button>

</form>