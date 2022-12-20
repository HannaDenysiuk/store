<?php
include(ROOT . "/views/layouts/header.php");
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="productinfo">
                    <h2 class="title text-center">Контакты</h2>
                    <div class="col-sm-4">
                        <div class="productinfo text-center">
                            <h2>График роботы</h2>
                            <p>
                                Пн-Пт: <?= Configuration::mn_fr ?>
                                <br />
                                Сб: <?= Configuration::sut ?>
                                <br />
                                Вс: <?= Configuration::sun ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="productinfo text-center">
                            <h2>Звоните:</h2>
                            <p>
                                <?= Configuration::ph1 ?>
                                <br />
                                <?= Configuration::ph2 ?>
                                <br />
                                <?= Configuration::ph3 ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="productinfo text-center">
                            <h2>Пишите:</h2>
                            <a>shop@ESHOPPER.com</a>
                            <br />
                            <a>Telegram</a>
                            <br />
                            <a>Viber</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="map">
                    </div>
                </div>
                <?php if($is_session_set): ?>
                <h2 class="title text-center">Форма обратной связи </h2>
                <div class="col-sm-12">
                    <div class="contact-form">
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
</section>

<?php
include(ROOT . "/views/layouts/footer.php");
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANsMUgTON1gtAx6okd1VWPEhmpZb2-3A0&callback=initMap&v=weekly"></script>

<script src="/template/js/map.js"></script>