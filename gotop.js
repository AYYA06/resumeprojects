(function($){
    $("body").append("<img id='goTopButton' style='display:none; z-index: 5; cursor: pointer;top:100px;right:100px;position:fixed;' title='回到頂端'/>");
    var img="gotop.gif",      //宣告變數設定圖檔名稱
    location=0.92,               //按鈕出現在螢幕的高度
    right=10,                   //距離右邊 px值
    opacity=0.6,                //預設透明度
    speed=700,                   //返回TOP捲動速度
    $button = $("#goTopButton"), //定義JQUERY呼叫ID
    $body = $(document),          //定義JQUERY網頁
    $win = $(window);             //定義JQUERY瀏覽器chrome
    $button.attr("src", img);     //將圖設定到goTopButton的SRC

    //建立當網頁捲動時，呼叫自訂函數
    window.goTopMove=function (){
    //從網頁取得與頂端離具的數值，約為75-165px之間  
      var scrollH=$body.scrollTop(),
        winH=$win.height(),         //從瀏覽器取得高度
        css = {"top": winH * location + "px","position":"fixed","right": right,"opacity": opacity};   //將參數設定CSS
        console.log("這是scrolltop數值:"+scrollH);
        //如果捲動超過20PX時，則顯示圖片，否則隱藏圖片。
        if (scrollH > 20) {
          $button.css(css);
          $button.fadeIn("slow");
        }else{
          css = {"transform": "none","transition":"none"};
          $button.css(css);
          $button.fadeOut("slow");

        }
    };
    //設定瀏覽器監聽兩個動作，分別為scroll與resize
      $win.on({
        scroll:function () {console.log("呼叫scroll這個功能");
          goTopMove();
        },
        resize:function(){console.log("呼叫resize這個功能");
          goTopMove();}
      });
      //設定瀏覽器監聽圖片三個動作，分別為1滑鼠滑過去與2滑鼠滑出去與3按下動作
      $button.on({
        mouseover:function(){$button.css("opacity",1);},
        mouseout:function(){$button.css("opacity",opacity);},
        click:function(){css = {"transform": "scale()","transition":"transform 1s ease 0s"};
        $button.css(css);
          $("html,body").animate({scrollTop:0},speed);}
      });
  })(jQuery);