<footer id="footer">
    <!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2021</p>
            </div>
        </div>
    </div>
</footer>
<!--/Footer-->

<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function() {
        $(".add-to-cart").click(function() {
            var id = $(this).attr("data-id");
            var count = 1;
            try {
                count = document.getElementById("count").value;
            } catch { count = 1;};
            $.post("/cart/addAjax/" + id + "/" + count, {}, function(data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
    /* $(document).ready(function() {
         $(".increase").change(function() {
             var id = $(this).attr("data-id");
             var id = document.getElementById(id).attr("data-id");
             $.post("/cart/addAjax/" + id, {}, function(data) {
                 $("cart-count").html(data);
             });
             return false;
         });
     });*/
</script>
</body>

</html>