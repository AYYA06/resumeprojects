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
        /* 輸入有錯誤時，顯示紅框 */
        table input:invalid {
            border:solid red 3px;
        }
    </style>
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
                <div class="col-md-2">
                    <div class="aa">
                        <!-- sidebar -->
                        <?php require_once("sidebar.php") ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- 購物車內容模組 -->
                <?php require_once("cart_content.php") ?>


                </div>
                </div>
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
    <script>
    //將變更的數量寫入後台資料庫
    $("input").change(function(){
        var qty = $(this).val();
        const cartid = $(this).attr("cartid");
        if(qty<=0 || qty>=50){
            alert("更改數量需大於0以上,以及小於50以下。");
            return false;
        }
        $.ajax({
            url:'change_qty.php',
            type:'post',
            dataType: 'json',
            data:{
                cartid:cartid,
                qty:qty,
            },
            success: function(data){
                if(data.c==true){
                    //alert(data.m); 更新產品後跳提示
                    window.location.reload();
                }else{
                    alert(data.m);
                }
            },
            error: function(data){
                alert("系統目前無法連接到後台資料庫");
            }
        });
    });
</script>

</body>

</html>