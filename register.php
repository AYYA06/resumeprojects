<!--這是將資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php') ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php") ?>
<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 引入網頁的標頭 -->
    <?php require_once("head.php") ?>
    <style type=text/css>
     .input-group>.form-control {
            width: 100%;
        }
        span.error-tips,
        span.error-tips::before {
            font-family: "Font Awesome 5 Free";
            color: red;
            font-weight: 900;
            content: "\f00d";
        }

        span.valid-tips,
        span.valid-tips::before {
            font-family: "Font Awesome 5 Free";
            color: greenyellow;
            font-weight: 900;
            content: "\f00c";
        }  
    </style>
    <script type="text/javascript" src="commlib.js"></script>
</head>

<body>

    <script type="text/javascript" src="gotop.js"></script>
    <section id="header">
        <!-- navbar -->
        <?php require_once("navbar.php") ?>
    </section>
    
    <?php
    if (isset($_POST['formctl']) && $_POST['formctl'] == 'reg') {
        $email = $_POST['email'];
        $pw1 = md5($_POST['pw1']);
        $cname = $_POST['cname'];
        $tssn = $_POST['tssn'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $myzip = $_POST['myZip'] == '' ? NULL : $_POST['myZip'];
        $address = $_POST['address'] == '' ? NULL : $_POST['address'];
        $imgname = $_POST['uploadname'] == '' ? NULL : $_POST['uplaodname'];
        $insertsql = "INSERT INTO member (email,pw1,cname,tssn,birthday,imgname) VALUES ('" . $email . "' ,'" . $pw1 . "','" . $cname . "','" . $tssn . "','" . $birthday . "', '" . $imgname . "')";
        $Result = $link->query($insertsql);
        if ($Result) {
            // 讀剛新增會員編號
            $sqlstring = sprintf("SELECT emailid FROM member WHERE email='%s'", $email);
            $Result = $link->query($sqlstring);
            $data = $Result->fetch();
            // 將會員的姓名、電話、地址寫入addbook
            $insertsql = "INSERT INTO addbook (emailid,setdefault,cname,mobile,myzip,address) VALUES('" . $data['emailid'] . "','1','" . $cname . "','" . $mobile . "','" . $myzip . "','" . $address . "')";
            $Result = $link->query($insertsql);
            // 設定會員註冊完直接登入
            $_SESSION['login'] = true;
            $_SESSION['emailid'] = $data['emailid'];
            $_SESSION['email'] = $email;
            $_SESSION['cname'] = $cname;
            echo "<script language='javascript'>alert('謝謝您，會員資料已完成註冊');location.href='index.php';</script>";
        }
    }
    ?>

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
                    <!-- 會員註冊 -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>會員註冊頁面</h1>
                            <p>請輸入相關資料，*為必須輸入欄位</p>
                        </div>
                    </div>
                    <div class="row justify-content-center offset-2">
                        <div class="col-lg-6 col-10 text-left">
                            <form id="reg" name="reg" action="register.php" method="post">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="*請輸入email帳號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="pw1" name="pw1" placeholder="*請輸入密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="pw2" name="pw2" placeholder="*請再次確認密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="cname" name="cname" placeholder="*請輸入姓名">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tssn" name="tssn" placeholder="*請輸入身份證字號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="birthday" name="birthday" onfocus="(this.type='date')" placeholder="*請選擇生日">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="*請輸入手機號碼">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="myCity" id="myCity" class="form-control">
                                        <option value="">請選擇市區</option>
                                        <?php $city = "SELECT*FROM`city` WHERE State=0";
                                        $city_rs = $link->query($city);
                                        while ($city_rows = $city_rs->fetch()) { ?>
                                            <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                                        <?php } ?>
                                    </select><br>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="myTown" id="myTown" class="form-control">
                                        <option value="">請選擇地區</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label id="zipcode" name="zipcode" class="form-label" for="address">郵遞區號:地址</label>
                                    <input type="hidden" id="myZip" name="myZip" value="" />
                                    <input type="text" class="form-control" id="address" name="address" placeholder="請輸入後續地址">
                                </div>
                                <label for="fileToUpload" class="form-label">上傳相片:</label>
                                <div class="input-group mb-3">

                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" title="請上傳相片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                                    <p><button type="button" class="btn btn-danger" id="uploadForm" name="uploadForm" style="margin-top:5px;">開始上傳</button></p>
                                    <div id="progress-div01" class="progress" style="width:100%; display:none;">
                                        <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" style="width:0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    <input type="hidden" id="uploadname" name="uploadname" value="" />
                                    <img id="showimg" name="showimg" src="" class="img-fluid" alt="photo" style="display:none;">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" id="captcha" name="captcha" value=''>
                                    <a href="javascript:void(0);" title="按我更新認證碼" onclick="getCaptcha();">
                                        <canvas id="can"></canvas>
                                    </a>
                                    <input type="text" class="form-control" id="recaptcha" name="recaptcha" placeholder="*請輸入認證碼">
                                </div>
                                <input type="hidden" id="formctl" name="formctl" value="reg">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success btn-lg">送出</button>
                                </div>

                            </form>
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
    <script type="text/javascript" src="./jquery.validate.js"></script>
    <script type="text/javascript">
        $(function() {
            getCaptcha();
            //取得縣代碼後查鄉鎮市的名稱
            $("#myCity").change(function() {
                var CNo = $('#myCity').val();
                if (CNo == "") {
                    return false;
                }
                $.ajax({ //將鄉鎮市的名稱從後台資料庫取回
                    url: 'Town_ajax.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        CNo: CNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myTown').html(data.m);
                            $('#myZip').val("");
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
            //取得鄉鎮市代碼，查詢郵遞區號放入#myZip,#zipcode
            $('#myTown').change(function() {
                var AutoNo = $('#myTown').val();
                if (AutoNo == "") {
                    return false;
                }
                $.ajax({
                    url: 'Zip_ajax.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        AutoNo: AutoNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myZip').val(data.Post);
                            $('#zipcode').html(data.Post + data.Cityname + data.Name);
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到資料庫");
                    }
                });
            });

            
        });
//設定認證碼產生函數
function getCaptcha() {
                var inputTxt = document.getElementById("captcha");
                //can為canvas的ID名稱
                //150=影像寬，50=影像高，blue=影像被景色
                //white=文字顏色，28px=文字大小，5=認證碼長度
                inputTxt.value = captchaCode("can", 150, 50, "blue", "white", "28px", 5);
            };
        $(function() {
            //自訂身分證格式驗證
            jQuery.validator.addMethod("tssn", function(value, element, param) {
                var tssn = /^[a-zA-Z]{1}[1-2]{1}[0-9]{8}$/;
                return this.optional(element) || (tssn.test(value));
            });
            //自訂手機格式驗證
            jQuery.validator.addMethod("checkphone", function(value, element, param) {
                var checkphone = /^[0]{1}[9]{1}[0-9]{8}$/;
                return this.optional(element) || (checkphone.test(value));
            });
            //自訂郵遞區號驗證
            jQuery.validator.addMethod("checkMyTown", function(value, element, param) {
                return (value !== "");
            });

            //驗證form #reg表單
            $('#reg').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: 'checkemail.php'
                    },
                    pw1: {
                        required: true,
                        maxlength: 20,
                        minlength: 4,

                    },
                    pw2: {
                        required: true,
                        equalTo: '#pw1'
                    },
                    cname: {
                        required: true,
                    },
                    tssn: {
                        required: true,
                        tssn: true,
                    },
                    birthday: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        checkphone: true,
                    },
                    address: {
                        required: true,
                    },
                    myTown: {
                        required: true,
                    },
                    recaptcha: {
                        required: true,
                        equalTo: '#captcha',
                    },
                },
                messages: {
                    email: {
                        required: 'email信箱不得為空白',
                        email: 'email信箱格式有誤',
                        remote: 'email信箱已註冊',
                    },
                    pw1: {
                        required: '密碼不得為空白',
                        maxlength: '密碼最大長度為20位(4-20位英文字母與數字的組合)',
                        minlength: '密碼最小長度為4位(4-20位英文字母與數字的組合)',

                    },
                    pw2: {
                        required: '確認密碼不得為空白',
                        equalTo: '兩次輸入的密碼必須一致！'
                    },
                    cname: {
                        required: '使用者名稱不得為空白',
                    },
                    tssn: {
                        required: '身份證ID不得為空白',
                        tssn: '身份證ID格式有誤',
                    },
                    birthday: {
                        required: '生日不得為空白',
                    },
                    mobile: {
                        required: '手機號碼不得為空白',
                        checkphone: '手機號碼格式有誤',
                    },
                    address: {
                        required: '地址不得為空白',
                    },
                    myTown: {
                        required: '需選擇郵遞區號',
                    },
                    recaptcha: {
                        required: '驗證碼不得為空白',
                        equalTo: '驗證碼需相同',
                    },
                },
            });
        })
    </script>

    <script>
        $(function() {
            //上傳JQUERY程式
            $('#uploadForm').click(function(e) {
                var fileName = $('#fileToUpload').val();
                var idxDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                    $("#progress-div01").css("display", "flex");
                    var file1 = getId("fileToUpload").files[0];
                    var formdata = new FormData();
                    formdata.append("file1", file1);
                    var ajax = new XMLHttpRequest();
                    ajax.upload.addEventListener("progress", progressHandler, false);
                    ajax.addEventListener("load", completeHandler, false);
                    ajax.addEventListener("error", errorHandler, false);
                    ajax.addEventListener("abort", abortHandler, false);
                    ajax.open("POST", "file_upload_parser.php");
                    ajax.send(formdata);
                    return false;
                } else {
                    alert("目前只支援jpg,jpeg,png,gif檔案格式上傳!");
                }
            });
            //取得元件Id
            function getId(el) {
                return document.getElementById(el);
            }
            //上傳過程顯示百分比
            function progressHandler(event) {
                var percent = Math.round((event.loaded / event.total) * 100);
                $("#progress-bar01").css("width", percent + "%");
                $("#progress-bar01").html(percent + "%");
            }
            //上傳完成處理顯示圖片
            function completeHandler(event) {
                var data = JSON.parse(event.target.responseText);
                if (data.success == 'true') {
                    $('#uploadname').val(data.filename);
                    $('#showimg').attr({
                        'src': 'uploads/' + data.filename,
                        'style': 'display:block;'
                    });
                    $('button.btn.btn-danger').attr({
                        'style': 'display:none;'
                    });
                } else {
                    alert(data.error);
                }
            }
            //Upload Failed:上傳發生錯誤處理
            function errorHandler(event) {
                alert("Upload Failed:上傳發生錯誤");
            }
            //Upload Aborted:上傳作業取消處理
            function abortHandler(event) {
                alert("Upload Aborted:上傳作業取消");
            }
        });
    </script>
</body>

</html>