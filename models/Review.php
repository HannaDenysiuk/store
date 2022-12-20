<?php 
class Review{
    public static function addReviews( $subject, $message,$userid){
        $db = Db::getConnection();
        $query = "INSERT INTO reviews(subject, review , userid) VALUES (:subject, :review , :userid)";
        $result = $db->prepare($query);
        $result->bindParam(':subject', $subject, PDO::PARAM_STR);
        $result->bindParam(':review', $message, PDO::PARAM_STR);
        $result->bindParam(':userid', $userid, PDO::PARAM_INT);
        return $result->execute();
    }
}