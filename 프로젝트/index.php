<head>
  <link rel="stylesheet" href="http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/index/main_visual.css">
  <link rel="stylesheet" href="http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/index/welcome.css">
  <style>
    .main_contents{
      position: relative;
      width: 100%;
      height: 45vw;
    }



  </style>
</head>
<?php
  require_once('lib/header.php');
?>

  <div class="main_visual">
    <div class="main_visual_img">
      <img src="images/main_visual_img/1.jpg">
      <img src="images/main_visual_img/2.jpg">
      <img src="images/main_visual_img/3.jpg">
    </div>
    <div class="main_visual_btn">
      <label class="main_visual_btnL"><input type="radio" id="main_visual_btn1" name="main_visual_btnR" value="1"></label>
      <label class="main_visual_btnL"><input type="radio" id="main_visual_btn2" name="main_visual_btnR" value="2"></label>
      <label class="main_visual_btnL"><input type="radio" id="main_visual_btn3" name="main_visual_btnR" value="3"></label>
    </div>
    <div id="main_visual_contents" class="main_visual_contents">
      <h1></h1>
      <h2></h2>
      <a href="" id="left">자세히 보기</a><a href="#" id="right">예매하기</a>
    </div>
  </div>

  <div class="main_contents" id="welcome">
    <h1><b>MUSICAL</b>에 오신 것을 환영합니다</h1>
    <div class="welcome_contents">
      <div id="welcome_contents_musical" class="welcome_content"
          onclick="window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php';">
        <div></div>
        <h1>뮤지컬</h1>
        <p>뮤지컬이당</p>
        <img src="images/welcome_contents/musical.jpg">
      </div>
      <div id="welcome_contents_play" class="welcome_content"
          onclick="window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/play.php';">
        <div></div>
        <h1>연극</h1>
        <p></p>
        <img src="images/welcome_contents/play.jpg">
      </div>
      <div id="welcome_contents_actor" class="welcome_content"
          onclick="window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/actor.php';">
        <div></div>
        <h1>배우</h1>
        <p></p>
        <img src="images/welcome_contents/actor.jpg">
      </div>
      <div id="welcome_contents_board" class="welcome_content"
        onclick="window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/community.php';">
        <div></div>
        <h1>커뮤니티</h1>
        <p></p>
        <img src="images/welcome_contents/community.jpg">
      </div>
    </div>
  </div>

  <div class="main_contents" id="musical">

  </div>
  <div class="main_contents">
  </div>
  <div class="main_contents">
  </div>
  <div class="main_contents">
  </div>


<script src="lib/index/main_visual.js"></script>
<script src="lib/index/welcome_contents.js"></script>

<script>
  document.getElementsByClassName("main_contents")[0].style.backgroundColor = "white";
  document.getElementsByClassName("main_contents")[1].style.backgroundColor = "lightgray";
  document.getElementsByClassName("main_contents")[2].style.backgroundColor = "white";
  document.getElementsByClassName("main_contents")[3].style.backgroundColor = "skyblue";
  document.getElementsByClassName("main_contents")[4].style.backgroundColor = "white";
</script>

<?php
  require_once('lib/footer.php');
?>
