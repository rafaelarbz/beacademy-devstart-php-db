<?php

declare (strict_types = 1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;

class ProductController extends AbstractController
{

    public function listAction(): void
    {
        $con = Connection::getConnection();

        $result = $con->prepare('SELECT * FROM tb_product');
        $result->execute();

        parent::render('product/list', $result);
    }
    
    public function addAction(): void
    {
        $con = Connection::getConnection();

        if ($_POST) {

            date_default_timezone_set( 'America/Belem' );
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $photo = $_POST['photo'];
            $quantity = $_POST['quantity'];
            $categoryId = $_POST['category'];
            $createdAt = date('Y-m-d H:i:s');

            $query = 'INSERT INTO tb_product 
            (name, description, price, photo, quantity, category_id, created_at) 
            VALUES 
            ("'.$name.'", "'.$description.'", "'.$price.'", "'.$photo.'", "'.$quantity.'", "'.$categoryId.'", "'.$createdAt.'")';

            $result = $con->prepare($query);
            $result->execute();

            echo "Produto adicionado com sucesso!";
        }

        $result = $con->prepare('SELECT * FROM tb_category');
        $result->execute();

        parent::render('product/add', $result);
    }

    public function removeAction(): void
    {
        $con = Connection::getConnection();

        $id = $_GET['id'];

        $result = $con->prepare("DELETE FROM tb_product WHERE id='{$id}'");
        $result->execute();

        parent::renderMessage("Produto excluído com sucesso!");
        
    }
    
    public function updateAction(): void
    {

        $id = $_GET['id'];

        $con = Connection::getConnection();

        $categories = $con->prepare('SELECT * FROM tb_category');
        $categories->execute();

        if ($_POST) {

            $newName = $_POST['name'];
            $newDescription = $_POST['description'];
            $newPrice = $_POST['price'];
            $newPhoto = $_POST['photo'];
            $newQuantity = $_POST['quantity'];
            $newCategory = $_POST['category'];

            $query = "UPDATE tb_product SET
            name='{$newName}', 
            description='{$newDescription}', 
            price='{$newPrice}', 
            photo='{$newPhoto}', 
            quantity='{$newQuantity}', 
            category_id='{$newCategory}'
            WHERE id='{$id}' ";

            $resultUpdate = $con->prepare($query);
            $resultUpdate->execute();

            echo "Produto atualizado com sucesso!";

        }

        $product = $con->prepare("SELECT * FROM tb_product WHERE id='{$id}'");
        $product->execute();

        $categoryName = $con->prepare("SELECT cat.name as categoryName FROM tb_category cat INNER JOIN tb_product prod ON cat.id = prod.category_id WHERE prod.id='{$id}'");
        $categoryName->execute();

        parent::render('product/edit', [
            'product' => $product->fetch(\PDO::FETCH_ASSOC),
            'category' => $categories,
            'categoryName' => $categoryName->fetch(\PDO::FETCH_ASSOC),
        ]);
    }

    public function reportAction(): void 
    {
        $con = Connection::getConnection();

        $result = $con->prepare("SELECT prod.id, prod.name, prod.quantity, cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id = cat.id");
        $result->execute();

        $content = '';
        while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
            extract($product);

            $content .= "<tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$quantity}</td>
                    <td>{$category}</td>
            </tr>";
        }
        $html = "
            <h1>Relatório de Produtos no Estoque</h1>

            <table border='1px' width='100%'>
                <thead>
                    <tr>
                        <td>#ID</td>
                        <td>Produto</td>
                        <td>Estoque</td>
                        <td>Categoria</td>
                    </tr>
                </thead>
                <tbody>
                    {$content}
                </tbody>
            </table>
        
            ";

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        $pdf->render();

        $pdf->stream();
    }
}