<?php include ROOT . '/views/layouts/header.php';
//якщо є користувач - записуємо його в сесію - id ; 
// в контролері перенаравляємо  до кабінету 
?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul class="error-info">
                        <?php foreach ($errors as $error) : ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" value="<?php  ?>" />
                        <input type="password" name="password" placeholder="Пароль" value="<?php ?>" />
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div>
                <!--/sign up form-->


                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>