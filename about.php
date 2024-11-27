<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php") ?>
<!doctype html>
<html lang="en">

<head>
    <!-- 引入網頁的標頭 -->
    <?php require_once("head.php") ?>
</head>

<body>

    <script type="text/javascript" src="gotop.js"></script>
    <section id="header">
        <!-- navbar -->
        <?php require_once("navbar.php") ?>
    </section>

    <section id="breadcrumb">
        <!-- breadcrumb -->
        <?php require_once("breadcrumb.php") ?>
    </section>

    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="white-wrap">
                    
                </div>
               

            </div>
        </div>
    </section>






    <section id="footer" style="text-align: center; margin-top: 50px;">
        <!-- footer頁尾版權 -->
        <?php require_once("footer.php") ?>
    </section>

    <!-- javascript -->
    <?php require_once("javascript.php") ?>
</body>

</html>