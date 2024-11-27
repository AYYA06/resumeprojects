<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>clothing yourself簡約時尚服飾</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="website_s01.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- slick -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />

  <style type="text/css">
    .dropdown:hover>.dropdown-menu,
    .dropend:hover>.dropdown-menu {
      display: block;
      margin-top: 0.125em;
      margin-left: 0.125em;
    }

    .dropdown .dropdown-menu {
      display: none;
    }

    @media screen and (min-width:769px) {
      .dropend:hover>.dropdown-menu {
        position: absolute;
        top: 0;
        left: 100%;
      }

    }
  </style>
</head>

<body>

  <script type="text/javascript" src="gotop.js"></script>
  <section id="header">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="product_img/logo1.png" style="width: 70px;" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        //列出產品類別第一層
        $SQLstring = "SELECT*FROM pyclass WHERE level=1 ORDER BY sort";
        $pyclass01 = $link->query($SQLstring);
        ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ALL Items
              </a>

              <ul class="dropdown-menu">
                <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>

                  <li class="nav-item dropend"><a class="dropdown-item dropdown-toggle" href="#"><i class="fas <?php echo $pyclass01_Rows['fonticon'] ?> fa-fw"></i>&emsp;<?php echo $pyclass01_Rows['cname']; ?>
                    </a>
                    <?php
                    //列出產品列表第二層
                    $SQLstring = sprintf("SELECT*FROM pyclass where level=2 and uplink=%d order by sort", $pyclass01_Rows['classid']);
                    $pyclass02 = $link->query($SQLstring);
                    ?>


                    <ul class="dropdown-menu">
                      <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                        <li><a class="dropdown-item" href="#"><em class="">&emsp;</em><?php echo $pyclass02_Rows['cname']; ?></a></li>
                      <?php } ?>
                    </ul>
                  </li>
                <?php } ?>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">While Traveling</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Spring SALE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Q&A</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

          </ul>
          </li>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-regular fa-user fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-location-dot fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-regular fa-heart fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-regular fa-bell fa-lg"></i></a>
            </li>
          </ul>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <i class="fa-solid fa-magnifying-glass fa-bounce fa-lg" style="margin-top: 20px;" href="#"></i>
          </form>
          <ul>
        </div>
      </div>
    </nav>

    <div>
      <img src="product_img/header.jpg" class="flex img-fluid" alt="...">
    </div>

  </section>

  <section id="content">
    <div class="container">
      <div class="row">
        <div class="row1">
          <div class="bg-white">
            <p class="text-area">
              <span style="font-size: medium;">2023 Spring-While Traveling<br></span>
              短暫告別生活的城市<br>
              開始動手整理行囊，留出儲藏回憶的空間<br>
              我想以最輕便的方式前往<br>
              前進、停留、感受<br>
              遇見了旅行的意義<br>
              進入畫家繪筆下的海濱小鎮<br>
              春季的暖意緩緩而來<br>
              褪去罩衫感受輕柔的風吹，<br>
              用最自在的姿態融入空間<br>
              想像這裡其實是自己的故鄉<br>
              旅行只是回家而已。
            </p>
            <img class="img box-shadow" src="product_img/content.jpg" style="width: 900px;height: 600px; " alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section id="hscontent">
  <div class="container">
      <div class="row2"></div>
      <div class="row text-center d-flex flex-nowrap">

        <div class="card col-md-3" style="padding-top: 30px;">
          <img src="images/hscontent1.jpg" class="card-img-top" alt="輕暖氣息 小格空氣感針織布夾克/綠">
          <div class="card-body">
            <h5 class="card-title ">輕暖氣息 小格空氣感針織布夾克/綠</h5>
            <p class="card-text">
            <div class="old-price"><s>NT.2,580</s></div>
            <div class="new-price">NT.2,064</div>
            </p>
            <a href="#" class="btn btn-primary">更多資訊</a>
            <a href="#" class="btn btn-success">放購物車</a>
          </div>
        </div>

        <div class="card col-md-3" style="padding-top: 30px;">
          <img src="images/hscontent2.jpg" class="card-img-top" alt="雪花飄舞 極簡高領華夫格上衣/白">
          <div class="card-body">
            <h5 class="card-title">雪花飄舞 極簡高領華夫格上衣/白</h5>
            <p class="card-text">
            <div class="old-price"><s>NT.1,480</s></div>
            <div class="new-price">NT.1,184</div>
            </p>
            <a href="#" class="btn btn-primary">更多資訊</a>
            <a href="#" class="btn btn-success">放購物車</a>
          </div>
        </div>
        <div class="card col-md-3" style="padding-top: 30px;">
          <img src="images/hscontent3.jpg" class="card-img-top" alt="潮流態度 雙層膝蓋拼色絨面長褲/綠">
          <div class="card-body">
            <h5 class="card-title">潮流態度 雙層膝蓋拼色絨面長褲/綠</h5>
            <p class="card-text">
            <div class="old-price"><s>NT.1,880 </s></div>
            <div class="new-price">NT.1,504</div>
            </p>
            <a href="#" class="btn btn-primary">更多資訊</a>
            <a href="#" class="btn btn-success">放購物車</a>
          </div>
        </div>
        <div class="card col-md-3" style="padding-top: 30px;">
          <img src="images/hscontent5.jpg" class="card-img-top" alt="暖意秋日 側身開扣輕刷毛連帽斗篷/藍">
          <div class="card-body">
            <h5 class="card-title">暖意秋日 側身開扣輕刷毛連帽斗篷/藍</h5>
            <p class="card-text">
            <div class="old-price"><s>NT.1,880 </s></div>
            <div class="new-price">NT.1,504</div>
            </p>
            <a href="#" class="btn btn-primary">更多資訊</a>
            <a href="#" class="btn btn-success">放購物車</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="fscontent">
    <div class="container-fluid" style="background-color: #BDC0BA;">
      <div class="row3">
        <div class="row">
          <div class="col-md-4 nopadding"><img src="product_img/fcontent1.jpeg" style="width: 500px;height: 490px;" alt="">
          </div>
          <div class="col-md-8 nopadding">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="product_img/fscontent1.jpg" class="d-block w-100" style="height: 490px;" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="product_img/fscontent2.jpg" class="d-block w-100" style="height: 490px;" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="product_img/fscontent3.jpg" class="d-block w-100" style="height: 490px;" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="footer" style="text-align: center; margin-top: 50px;">
    <p>隱私權政策&emsp;&emsp;購物須知&emsp;&emsp;
      <img src="images/logo1.png" style="width: 150px;" alt="">
      &emsp;&emsp;SHARE&emsp;&emsp;<i class="fa-brands fa-square-facebook"></i>&emsp;
      <i class="fa-brands fa-square-instagram"></i>&emsp;<i class="fa-brands fa-line"></i>
    <p>宇璟設計有限公司 &emsp;|&emsp; 統一編號：70436528 &emsp;|&emsp; 地址：台北市松山區民生東路四段54號6樓</p>
    <p>客服信箱：info@vueofficial.com &emsp;|&emsp; 客服電話： 0287705828</p>
    <p>© 2020 VUE All Rights Reserved.網站地圖</p>
    </p>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- silck-js -->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
</body>

</html>