<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Web</title>
  <?php 
    include_once("includes/header.php");
  ?>
  <script>
    $(document).ready(function(){
      $('#navg').load('includes/navg.php',function(){
          $('#JQueryRef').addClass("active bg-success rounded-2");
      });
      $('#container-left').load('includes/container-left.html');
      $('#footor').load('includes/footor.php',function(){
        let ele = document.getElementById('container-right');
        $('.container-left').css("height",ele.clientHeight);
      });
    })
  </script>

</head>
<body>

<div class="p-5 bg-primary text-white text-center">
  <h3>My Web</h3>
</div>
<div id="navg"></div>
<div class="container-all d-flex flex-row">
  <div id="container-left" class="container-left container-fluid m-0 p-0">
  </div>


  <div id="container-right" class="container-right container-fluid m-0 p-0">

     <!--   網頁本文   --> 
    <div class="text">
      jQuery是一套跨瀏覽器的JavaScript函式庫，用於簡化HTML與JavaScript之間的操作。[3]約翰·雷西格（John Resig）在2006年1月的BarCamp NYC上釋出了第一個版本。目前由Dave Methvin領導的團隊進行開發。全球前10,000個存取最高的網站中，有65%使用了jQuery，是曾經最受歡迎的JavaScript函式庫[4][5]。
      <br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br>
      簡介
      jQuery是開源軟體，使用MIT授權條款授權。[6] jQuery的語法設計使得許多操作變得容易，如操作文件（document）、選擇文件物件模型（DOM）元素、建立動畫效果、處理事件、以及開發Ajax程式。jQuery也提供了給開發人員在其上建立外掛程式的能力。這使開發人員可以對底層互動與動畫、進階效果和進階主題化的組件進行抽象化。模組化的方式使jQuery函式庫能夠建立功能強大的動態網頁以及網路應用程式。

      微軟和諾基亞已宣布在他們的平台上繫結jQuery。[7]微軟最初在Visual Studio中整合了jQuery[8]以便在微軟自己的ASP.NET AJAX框架和ASP.NET MVC Framework中使用，而諾基亞則在他的Web執行時組件開發平台中整合了jQuery[9]。MediaWiki自從1.16版本後也開始使用jQuery[10]。

      jQuery 1.3版以後，引入全新的層疊樣式表（CSS）選擇器引擎Sizzle。[11]同時不再提供Packed版本，因為解壓縮所消耗的時間，遠大於所節省的下載時間，且不利於除錯，且已有Google AJAX Libraries API等公開站台提供jQuery的js的參照服務，故Packed版本原本的優點已蕩然無存。
      <br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br>
      特色
      jQuery有下列特色：

      使用多瀏覽器開源選擇器引擎Sizzle（jQuery專案的衍生產品）進行DOM元素選擇[12]
      基於CSS選擇器的DOM操作，使用元素的名稱和屬性（如id和class）作為選擇DOM中節點的條件
      事件
      特效和動畫
      Ajax
      Deferred和Promise物件來控制非同步處理
      JSON解析
      通過外掛程式擴充
      工具函式，如特徵檢測
      現代瀏覽器中原生的相容性方法，但對於舊版瀏覽器需要後備（fallback）方法，比如inArray()和each()
      多瀏覽器（不要與跨瀏覽器混淆）支援
      瀏覽器支援
      jQuery 3.0及以後版本支援「當前−1版本」 的Firefox、Chrome、Safari、Edge（就是說當前穩定版本以及當前穩定版本之前的一個版本），另外還支援Internet Explorer 9以後的IE版本。在行動端支援iOS 7+和Android 4.0+。[13]
      <br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br>
      用法
      載入jQuery
      jQuery庫是包含所有公共DOM、事件、效果和Ajax函式的一個JavaScript檔案。可以通過連結到本地副本或公共伺服器提供的許多副本之一把jQuery包含在網頁中。jQuery有一個由MaxCDN代管的內容傳遞網路（CDN）。[14] Google和微軟也代管了jQuery。[15][16]

      <br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br>
      使用風格
      jQuery有兩種使用風格：

      通過jQuery物件的工廠方法$函式。這些函式通常稱作命令，使用方法鏈進行呼叫，因為它們都返回jQuery物件。
      通過$.開頭的函式。這些是工具函式，它們不直接作用於jQuery物件。
      在jQuery中存取和操作多個DOM節點通常從用CSS選擇器字串呼叫$函式開始。這會返回一個參照HTML頁面中所有匹配元素的jQuery物件。比如$("div.test")，會返回一個擁有class test的所有div元素的jQuery物件。可以通過呼叫返回的jQuery物件或節點本身的方法來操作這個節點集。
      <br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br><br>1<br>1<br>1<br>
      無衝突模式
      jQuery還有.noConflict()模式，這會釋放對$的控制。如果其他的庫也使用$作為識別碼的話，這個模式會比較有用。在無衝突模式下，開發人員可以使用jQuery替代$而不會缺失任何功能。[17]
    </div>
    
    
    
    <!--   網頁本文   -->

    <div id="footor" class="mt-5 p-4 text-center footer"></div>
  </div>
</div>

</body>
</html>
