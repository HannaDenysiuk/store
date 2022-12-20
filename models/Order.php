<?php
class Order
{
    public static function save($uname, $uphone, $ucomment, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $query = "INSERT INTO product_order(user_name, user_phone, user_comment, user_id, products) "
            . "VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)";
        $result = $db->prepare($query);
        $result->bindParam(':user_name', $uname, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $uphone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $ucomment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В оброботке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
    public static function getOrdersList()
    {
        $db = Db::GetConnection();
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function deleteOrderById($id)
    {
        $db = Db::GetConnection();
        $sql = 'DELETE FROM  product_order
         WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
    public static function getOrderById($id)
    {
        $db = Db::GetConnection();

        $sql = "SELECT * FROM product_order WHERE id = $id";
        $result = $db->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        $db = Db::GetConnection();
        $sql = "UPDATE product_order SET 
        user_name = :user_name, 
        user_phone = :user_phone, 
        user_comment = :user_comment, 
        date = :date, 
        status = :status 
        WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
}
