<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="product_img/logo1.png" style="width: 70px;" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    //讀取後台購物車內產品數量
    $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip='" . $_SERVER['REMOTE_ADDR'] . "'";
    $cart_rs = $link->query($SQLstring);
    ?>
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
              <li class="nav-item dropend"><a class="dropdown-item dropdown-toggle" href="#"></i><?php echo $pyclass01_Rows['cname']; ?>
                </a>
                <?php
                //列出產品列表第二層
                $SQLstring = sprintf("SELECT*FROM pyclass where level=2 and uplink=%d order by sort", $pyclass01_Rows['classid']);
                $pyclass02 = $link->query($SQLstring);
                ?>
                <ul class="dropdown-menu">
                  <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                    <li><a class="dropdown-item" href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"><?php echo $pyclass02_Rows['cname']; ?></a></li>
                  <?php } ?>
                </ul>
              </li>

            <?php } ?>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">While Traveling</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Spring SALE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orderlist.php">Check Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

      </ul>
      </li>

      <ul class="navbar-nav">
      <?php if(isset($_SESSION['login'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出?','logout.php')"><i class="fa-regular fa-user fa-lg"><span style="margin-left: 1rem; font-size:small">LOGOUT</span></i></a>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa-regular fa-user fa-lg"><span style="margin-left: 1rem; font-size:small">LOGIN</span></i></a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php"><i class="fa-regular fa-address-card fa-lg"><span style="margin-left: 1rem; font-size:small">REGISTER</span></i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping fa-lg"><span class="text-info"><?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></i></a>
        </li>
      </ul>
      </ul>
      <form name="search" id="search" action="drugstore.php" method="get">
        <div class="input-group">
          <input type="text" name="search_name" id="search_name" class="form-control1" placeholder="Search..." value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
          <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa-solid fa-magnifying-glass fa-bounce"></i></button></span>
        </div>
      </form>
      <ul>
    </div>
  </div>
</nav>