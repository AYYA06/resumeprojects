<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php") ?>

<?php 
  // 取得要返回的php頁面
if(isset($_GET['sPath'])){
  $sPath = $_GET['sPath'] . ".php";
} else{
  // 登入完成預設要進入首頁
  $sPath="index.php";
}
  // 檢查是否完成登入驗證
  if(isset($_SESSION['login'])){
    header(sprintf("location: %s", $sPath));
  }
?>
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
                <div class="col-md-2">
                    <div class="aa">
                        <!-- sidebar -->
                        <?php require_once("sidebar.php") ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- product_list -->
                    <?php //require_once("login_content.php") 
                    ?>
                    <!-- 會員登入html頁面 -->
                    <div class="mycard mycard-container">
                        
                        <p id="profile-name" class="profile-name-card">LOGIN</p>
                        <p class="login-text" style="text-align: center;">會員登入</p>
                        <form action="" method="POST" class="form-signin" id="form1">
                            <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus />
                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required />
                            <button class="btn btn-signin mt-4" type="submit">Sign in</button>
                            <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
                        </form>
                        <div class="other mt-5 text-center">
                            <a href="register">New user</a><a href="#">Forgot the password?</a>
                        </div>
                    </div>

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
    <script type="text/javascript" src="commlib.js"></script>
    <script type="text/javascript">
$(function(){
  $("#form1").submit(function(){
    const inputAccount = $("#inputAccount").val();
    const inputPassword = MD5($("#inputPassword").val());
    $("#loading").show();
    // 利用$ajax函數呼叫後台的auth_user.php驗證帳號密碼
    $.ajax({
      url:'auth_user.php',
      type:'post',
      dataType:'json',
      data:{
        inputAccount:inputAccount,
        inputPassword:inputPassword,
      },
      success:function(data){
        if(data.c==true){
          alert(data.m);
          // window.location.reload();
          window.location.href="<?php echo $sPath; ?>";
        }else{
          alert(data.m);
        }
      },
      error:function(data){
        alert("系統目前無法連接到後台資料庫");
      }
    });
  });
  
});
</script>
    <div id="loading" name="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,.5);z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute;top:50%;left:50%;"></i></div>
</body>

</html>