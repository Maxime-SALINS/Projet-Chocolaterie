<?php
namespace App\manager;

use \PDO;
use Utils\Database\Database;

class ProductManager {

    public function findAll():array
    {

        $sql = "SELECT * FROM product p INNER JOIN category c ON p.category_id = c.idCategory";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne(int $product_id):array
    {
        $sql = "SELECT * FROM product p INNER JOIN category c ON p.category_id = c.idCategory WHERE idProduct = :idProduct";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->bindValue(':idProduct', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByCategory(string $category_name):array
    {
        $sql = "SELECT * FROM product p INNER JOIN category c ON p.category_id = c.idCategory WHERE category_name = :category_name";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->bindValue(':category_name', $category_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create(string $product_name, string $product_image, string $description, int $category_id)
    {
        $sql = "INSERT INTO product (product_name, image_product, description, category_id) VALUES (:product_name, :image_product, :description, :category_id)";

        $stmt = Database::getPDO()->prepare($sql);

        $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindValue(':image_product', $product_image, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function update(int $product_id, string $product_name, string $product_image, string $description)
    {
        $sql = "UPDATE product 
        SET product_name = :product_name, image_product = :image_product, description = :description 
        WHERE idProduct = :idProduct";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->bindValue(':idProduct', $product_id, PDO::PARAM_INT);
        $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindValue(':image_product', $product_image, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function delete(int $product_id) 
    {
        $sql = "DELETE FROM product WHERE idProduct = :idProduct";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->bindValue(':idProduct', $product_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function findCategory():array 
    {
        $sql = "SELECT * FROM category";

        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}