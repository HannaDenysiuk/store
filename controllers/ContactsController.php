<?php

class ContactsController
{
  public function actionIndex()
  {
    $categories = Category::getCategoriesList();
    $products = Product::getProductsList();
    $is_session_set = User::isSessionSet();
    $result = false;
    if (isset($_POST['submit'])) {

      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $errors = false;
      if ($email == "")
        $errors[] = "заполните поле с email";
      if (!User::checkEmailExists($email))
        $errors[] = "пользователь не зарегестрирован";
      if ($message == "")
        $errors[] = "заполните поле уведомления";
      if ($subject == "")
        $errors[] = "заполните поле тема оброщения";


      if ($errors == false) {
        $uId = $_SESSION['user'];
        $result =  Review::addReviews($subject, $message, $uId);
        header("location: /contacts");
      }
    }

    require_once(ROOT . "/views/site/contacts.php");
    return true;
  }
}
