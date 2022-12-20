<?php

class Product
{

    public static function getProductsList($count = Configuration::SHOW_BY_DEFAULT)
    {
        $db = Db::GetConnection();
        $query = "SELECT id, name, price, image, is_new, code, image  
        FROM Product WHERE status = 1 
        ORDER BY id DESC LIMIT $count";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $offset = ($page - 1) * Configuration::SHOW_BY_DEFAULT;
        $db = Db::GetConnection();
        $query = "SELECT id, name, price, image, is_new, image  
        FROM Product WHERE status = 1 AND category_id = $categoryId
        ORDER BY id DESC LIMIT " . Configuration::SHOW_BY_DEFAULT . " OFFSET " . $offset;
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function getProductById($id)
    {
        $db = Db::GetConnection();
        $query = "SELECT * FROM Product WHERE id = $id";
        $result = $db->query($query);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function getProductInCategory($categoryId)
    {
        $db = Db::GetConnection();
        $query = "SELECT COUNT(id) AS count FROM product "
            . "WHERE status = 1 AND category_id = $categoryId";
        $result = $db->query($query);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data['count'];
    }
    public static function getProductsIs_recomendet()
    {
        $db = Db::GetConnection();
        $query = "SELECT id, name, price, image, is_new, is_recommended, image 
        FROM Product WHERE is_recommended = 1 AND availability > 0 AND status = 1 
        ORDER BY id DESC";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public static function getProductByIds($idsArray)
    {
        $db = Db::GetConnection();
        $idString = implode(', ', $idsArray);
        $query = "SELECT * FROM Product WHERE status = '1' AND id IN ($idString)";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public static function deleteProductById($id)
    {
        $db = Db::GetConnection();
        $query = "DELETE FROM product WHERE id =:id";
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function createProduct($options)
    {
        $db = Db::GetConnection();
        $query = "INSERT INTO product
        (name, code, price, category_id, brand, availability, description, is_new, is_recommended, status, image) 
        VALUES(:name, :code, :price, :category_id, :brand, :availability, :description, :is_new, :is_recommended, :status, :image )";
        $result = $db->prepare($query);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        if ($result->execute())
            return $db->lastInsertId();
        return 0;
    }
    public static function updateProductById($id, $options)
    {
        $db = Db::GetConnection();

        $query = "UPDATE product SET 
        name = :name, 
        code = :code, 
        price = :price, 
        category_id = :category_id, 
        brand = :brand, 
        availability = :availability, 
        description = :description, 
        is_new = :is_new, 
        is_recommended = :is_recommended, 
        status =  :status, 
        image= :image 
        WHERE id= :id";
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);

        return $result->execute();
    }
}
