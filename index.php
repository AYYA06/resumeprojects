<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- 引入網頁的標頭 -->
    <?php require_once("head.php") ?>
</head>

<body>
    <div class="loading-wrapper">
    <div style="color: #a0cadb" class="la-timer la-2x loading">
    <div></div>
</div>
</div>
</div>
    <script type="text/javascript" src="gotop.js"></script>
    <section id="header">
        <!-- navbar -->
        <?php require_once("navbar.php") ?>
    <div>
      <img src="product_img/header.jpg" class="flex img-fluid" alt="...">
    </div>

    </section>

    
    <section id="content">
        <!-- card_shadow -->
        <?php require_once("card_shadow.php") ?>
    </section>

    <section id="hscontent">
        <!-- cards商品列 -->
        <!-- <?php require_once("cards.php") ?> -->
    </section>

    <section id="fscontent">
        <!-- carousel輪播 -->
        <?php require_once("carousel1.php") ?>
    </section>

    <section id="footer" class="col-md-12" style="text-align: center; margin-top: 50px;">
        <!-- footer頁尾版權 -->
        <?php require_once("footer.php") ?>
    </section>

        <!-- javascript -->
    <?php require_once("javascript.php") ?>
    <script>
    $(document).ready(function(){
    setTimeout(() => {
    $(".loading-wrapper").fadeOut(500);
    }, 1500);
    });
    </script>
</body>

</html>