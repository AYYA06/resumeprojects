<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- 引入網頁的標頭 -->
    <?php require_once("head.php") ?>
    <style>
        .aa {
            margin-left: 10px;
            margin-top: 40px;
            line-height: 2.5rem;
            list-style: none;
            position: fixed;
        }

        ul {
            list-style: none;
        }

        .bb {
            font-family: inherit;
        }

        /* sidebar */
        .text-hover {
            text-decoration: none;
            color: #000;
            opacity: 70%;
        }

        .text-hover:hover {
            color: #d1b493;
            transition: 0.2s ease 0.1s;
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
                        <h4>SHOP NOW</h4>
                        <hr>
                        <a href="#" class="text-hover" style="font-size:medium;">
                            <b>Collection</b>
                        </a>
                        <ul>
                            <li>
                            <li><a href="#" class="text-hover">While Traveling</a></li>
                            <li><a href="#" class="text-hover">Flâneurs Rest In City</a></li>
                            <li><a href="#" class="text-hover">Be A Flâneur With VUE</a></li>
                            <li><a href="#" class="text-hover">Own Your Style</a></li>
                            <li><a href="#" class="text-hover">城市漫遊</a></li>
                            </li>
                        </ul>
                        <a href="#" class="text-hover" style="font-size:medium;">
                            <b>Clothes</b>
                        </a>
                        <ul>
                            <li>
                            <li><a href="#" class="text-hover">Outerwear</a></li>
                            <li><a href="#" class="text-hover">T-shirt / Sweater</a></li>
                            <li><a href="#" class="text-hover">Shirt</a></li>
                            <li><a href="#" class="text-hover">Bottoms</a></li>
                            </li>
                        </ul>

                    </div>
                </div>

                <?php
//建立分頁內容的事前準備
//建立product藥妝商RS
$maxRows_rs = 12;
$pageNum_rs = 0;
if (isset($_GET['pageNum_rs'])) {
    $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

//列出產品product資料查詢
$queryFirst = sprintf("SELECT*FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC");
$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
$pList01 = $link->query($query);

$i = 1; //控制每列row產生
?>
<?php while ($pList01_Rows = $pList01->fetch()) { ?>
    <?php if ($i % 4 == 1) { ?><div class="row text-center"> <?php } ?>
        <div class="card col-md-3">
            <img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                <p class="card-text"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></p>
                <p>NT<?php echo number_format($pList01_Rows['p_price']); ?></p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
            </div>
        </div>
        <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
        </div><?php } ?>
<?php $i++;
} ?>
                
                <div class="col-md-10">
                    <div class="bb">
                        <div class="row row-cols-1 row-cols-md-3 gy-5 gx-1">
                            <div class="col">
                                <div class="card text-center">
                                    <img src="product_img/1.jpg" class="card-img-top" alt="繽紛爛漫 三色拼接剪裁混棉襯衫/綠">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>繽紛爛漫 三色拼接剪裁混棉襯衫/綠</b></h5>
                                        <p class="card-text">NT.1,780</p>
                                        <a href="#" class="btn btn-primary">更多資訊</a>
                                        <a href="#" class="btn btn-success">放購物車</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center">
                                    <img src="product_img/2.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a short card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center">
                                    <img src="product_img/3.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center">
                                    <img src="product_img/4.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="scontent">

    </section>



    <section id="footer" style="text-align: center; margin-top: 50px;">
        <!-- footer頁尾版權 -->
        <?php require_once("footer.php") ?>
    </section>

    <!-- javascript -->
    <?php require_once("javascript.php") ?>
</body>

</html>