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
    <style type="text/css">
        .card-header a {
            text-decoration: none;
        }

        .table {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="gotop.js"></script>
    <section id="header">
        <!-- navbar -->
        <?php require_once("navbar.php"); ?>
    </section>

    <section id="breadcrumb">
        <!-- breadcrumb -->
        <?php require_once("breadcrumb.php"); ?>
    </section>

    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="aa">
                        <!-- sidebar -->
                        <?php require_once("sidebar.php"); ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- order_content -->
                    <?php require_once("order_content.php"); ?>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php
    //取得目前頁數
    if (isset($_GET{
      'totalRows_rs'})) {
      $totalRows_rs = $_GET['totalRows_rs'];
    } else {
      $all_rs = $link->query($queryFirst);
      $totalRows_rs = $all_rs->rowCount();
    }
    $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
    //呼叫分頁功能函數
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "order_rs");
    ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>
    </section>






    <section id="footer" style="text-align: center; margin-top: 50px;">
        <!-- footer頁尾版權 -->
        <?php require_once("footer.php") ?>
    </section>

    <!-- javascript -->
    <?php require_once("javascript.php") ?>
</body>

</html>