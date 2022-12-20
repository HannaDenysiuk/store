<?php
class Category
{
    public static function getCategoriesList()
    {
        $db = Db::GetConnection();
        $query = "SELECT id, name FROM Category ORDER BY sort_order ASC";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function getCategoryNameById($idCategory)
    {
        $db = Db::getConnection();
        $query = "SELECT name FROM  category WHERE id = $idCategory";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['name'];
    }
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();
        $query = "SELECT id,name, sort_order, status FROM  category ORDER BY sort_order ASC";
        $result = $db->query($query);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображаеться';
                break;

            case '0':
                return 'Скрыта';
                break;
        }
    }
    public static function deleteCategoryById($id)
    {
        $db = Db::GetConnection();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function createCategory($name, $sortOrder, $status)
    {
        $db = Db::GetConnection();
        $sql = 'INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $query = "SELECT * FROM  category WHERE id = $id";
        $result = $db->query($query);
        $data = $result->fetch();
        return $data;
    }
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $db = Db::GetConnection();
        $sql = "UPDATE category SET 
        name = :name, sort_order = :sortOrder, status = :status 
        WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sortOrder', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
    
}
