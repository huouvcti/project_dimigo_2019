<head>
  <style media="screen">
    .menu{
      position: fixed;
      width: 80%;
      height: 100px;
      padding: 0 10%;
      z-index: 100;
    }
    .menu #title{
      float: left;
      margin-right: 3%;
      position: relative;
    }
    .menu #title a{
      text-decoration: none;
      color: #000;
      font-size: 100%;
    }

    /* mainlist */
    .menu .mainList{
      float: left;
      position: relative;
      z-index: 100;
      padding: 0;
    }
    .menu .mainList_back{
      position: absolute;
      top: -100px;
      left: -500px;
      width: 1000%;
      height: 195px;
      background-color: #fff;
      box-shadow: 0px 5px 10px rgba(0 ,0 ,0, 0.3);
      opacity: 1;
      transition: 0.7s;
    }
    .menu .mainList li{
      list-style-type: none;
      float: left;
      width: 10vw;
      white-space : nowrap;
      padding-top: 17px;
      text-align: center;
    }
    .menu .mainList li a{
      text-decoration: none;
      color: #000;
      font-size: 100%;
    }
    .menu .mainList li a:hover{
      font-weight: bold;
    }


    /* sublist */
    .menu .subList_border{
      position: absolute;
      margin-top: 95px;
      left: -500%;
      width: 1000%;
      height: 0px;  /* 350px */
      background-color: #fff;
      box-shadow: 0px 5px 10px rgba(0 ,0 ,0, 0.2);
      opacity: 0;
      transition: height 0s, opacity 0.7s;
    }
    .menu .subList{
      margin-top: 95px;
      width:100vw;
      height: 0px;  /* 350px */
      z-index: 10;
      opacity: 0;
      transition: height 0s, opacity 0.7s;
    }
    .menu .subList .subL{
      position: absolute;
      left: 5%;
      width: 30%;
      height: 0px;  /* 350px */
      margin: 0 0 0 2%;
      overflow: hidden;
      opacity: 0;
      transition: height 0s, opacity 0.7s;
    }
    .menu .subList .subL h2{
      position: relative;
      float: left;
      margin-top: 50px;
      margin-right: 50px
      width: 22%;
      height: 0; /* 100% */
      overflow: hidden;
      font-size: 1.5em;
      white-space : nowrap;
    }
    .menu .subList .subL h2 a{
      text-decoration: none;
      color: #000;
    }
    .menu .subList .subL .vertical_line{
      position: relative;
      float: left;
      left: 5%;
      margin-top: 50px;
      width: 1px;
      height: 0; /* 65% */
      overflow: hidden;
      border-right: 1px solid gray;
    }
    .menu .subList .subL li{
      position: relative;
      z-index: 1;
      list-style-type: none;
      position: relative;
      margin-top: 55px;
      left: 10%;
      margin-bottom: 50px;
      white-space : nowrap;
      height: 0; /* auto */
      overflow: hidden;
    }
    .menu .subList .subL li a{
      position: relative;
      z-index: 2;
      cursor: pointer;
      text-decoration: none;
      color: #000;
      font-size: 1em;
      height: 0; /* auto */
      overflow: hidden;
    }
    .menu .subList .subL li a:hover{
      font-weight: bold;
    }
    .menu .subList .subimg{
      position: absolute;
      left: 40%;
      width: 70%;
      height: 0; /* 350px */
      background-color: lightgray;
      opacity: 0;
      overflow: hidden;
      transition: height 0s, opacity 0.7s;
      z-index: 5;
    }


    /* ????????? ?????? */
    .menu_login{
      position: absolute;
      top: 1.5vh;
      right: 7vh;
      white-space : nowrap;
    }
    .menu_login #userName{
      font-weight: bold;
      color: #000;
      white-space : nowrap;
    }
    .menu_login form{
      margin: 0;
      padding: 0;
    }
    .menu_login #loginBtn{
      background: 0;
      border: 2px solid #000;
      color: #000;
      margin-left: 15px;
      padding: 15px 20px;
      width: 100%;
      height: 5vh;
      font-family: sans-serif;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>

  <div class="menu">
    <div class="mainList_back"></div>
    <h1 id="title"><a href="http://127.0.0.1:81/??????????????????/????????????/index.php">MUSICAL</a></h1>
    <ul class="mainList">
      <li class="mainL" id="main_information"><a href="http://127.0.0.1:81/??????????????????/????????????/information.php">????????? ??????</a></li>
      <li class="mainL" id="main_musical"><a href="http://127.0.0.1:81/??????????????????/????????????/musical.php">?????????</a></li>
      <li class="mainL" id="main_play"><a href="http://127.0.0.1:81/??????????????????/????????????/play.php">??????</a></li>
      <li class="mainL" id="main_actor"><a href="http://127.0.0.1:81/??????????????????/????????????/actor.php">??????</a></li>
      <li class="mainL" id="main_board"><a href="http://127.0.0.1:81/??????????????????/????????????/community.php">????????????</a></li>
      <li class="mainL" id="main_etc"><a href="http://127.0.0.1:81/??????????????????/????????????/etc.php">??????</a></li>
    </ul>

    <!-- ????????? ?????? -->
    <table class="menu_login">
      <tr>
        <td id="userName"></td>
        <td>
          <form action="http://127.0.0.1:81/??????????????????/????????????/lib/header/loginout/logout.php" method="post">
            <?php echo "<input type=\"hidden\" name=\"url\" value=\"$url\">"; ?>
            <button type="button" id="loginBtn" onclick="document.getElementsByClassName('login')[0].style.display='block';">
              ?????????
            </button>
          </form>
        </td>
      </tr>
    </table>

    <!-- <div class="subList_border"></div>
    <div class="subList">
      <ul id="sub_musical" class="subL">
        <h2><a href="http://127.0.0.1:81/??????????????????/????????????/musical">&nbsp;&nbsp;&nbsp;?????????</a></h2>
        <div class="vertical_line"></div>
        <li><a href="">?????? ?????????</a></li>
        <li><a href="">???????????? / ?????? ?????????</a></li>
      </ul>
      <ul id="sub_play" class="subL">
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;??????</h2>
        <div class="vertical_line"></div>
        <li><a href="#">??????????????? ??????</a></li>
        <li><a href="#">??????????????? ??????</a></li>
      </ul>
      <ul id="sub_board" class="subL">
        <h2>????????????</h2>
        <div class="vertical_line"></div>
        <li><a href="#">?????? ?????? / ??????</a></li>
        <li><a href="#">??????</a></li>
      </ul>
      <ul id="sub_etc" class="subL">
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;??????</h2>
        <div class="vertical_line"></div>
        <li><a href="#">????????? / ?????????</a>
        <li><a href="#">??????</a></li>
      </ul>

      <div class="subimg">
        <img src="" alt="">
      </div>
    </div> -->

  </div>

  <!-- ?????? ?????? -->
  <script type="text/javascript" src="lib/index/main_visual.js"></script>
  <script>
    function mainList_subO (i){
      document.getElementsByClassName("subList")[0].style.opacity = "1";
      document.getElementsByClassName("subList_border")[0].style.opacity = "1";
      document.getElementsByClassName("subimg")[0].style.opacity = "1";
      document.getElementsByClassName("subList")[0].style.height = "350px";
      document.getElementsByClassName("subList_border")[0].style.height = "350px";
      document.getElementsByClassName("subimg")[0].style.height = "350px";

      for(var j = 0; j <= 3; j++){
        document.getElementsByClassName("subL")[j].style.height = "350px";
        document.getElementsByClassName("subL")[j].style.opacity = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("h2")[0].style.height = "100%";
        document.getElementsByClassName("subL")[j].getElementsByClassName("vertical_line")[0].style.height = "65%";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[0].style.height = "auto";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[1].style.height = "auto";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[0].getElementsByTagName("a")[0].style.height = "auto";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[1].getElementsByTagName("a")[0].style.height = "auto";
      }
      document.getElementsByClassName('mainList_back')[0].style.opacity = '1';

      document.getElementById(i).style.opacity = "1";

      document.getElementById("loginBtn").style.color = "#000";
      document.getElementById("loginBtn").style.borderColor = "#000";
      document.getElementById("userName").style.color = "#000";
    }
    function mainList_subX (){
      document.getElementsByClassName("subList")[0].style.opacity = "0";
      document.getElementsByClassName("subList_border")[0].style.opacity = "0";
      document.getElementsByClassName("subimg")[0].style.opacity = "0";
      document.getElementsByClassName("subList")[0].style.height = "0px";
      document.getElementsByClassName("subList_border")[0].style.height = "0px";
      document.getElementsByClassName("subimg")[0].style.height = "0px";

      for(var j = 0; j <= 3; j++){
        document.getElementsByClassName("subL")[j].style.height = "0";
        document.getElementsByClassName("subL")[j].style.opacity = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("h2")[0].style.height = "0";
        document.getElementsByClassName("subL")[j].getElementsByClassName("vertical_line")[0].style.height = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[0].style.height = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[1].style.height = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[0].getElementsByTagName("a")[0].style.height = "0";
        document.getElementsByClassName("subL")[j].getElementsByTagName("li")[1].getElementsByTagName("a")[0].style.height = "0";
      }

      document.getElementsByClassName('mainList_back')[0].style.opacity = '1';
      document.getElementById("loginBtn").style.color = "#000";
      document.getElementById("loginBtn").style.borderColor = "#000";
      document.getElementById("userName").style.color = "#000";
    }

    document.getElementById("main_musical").addEventListener("mouseover", event => {
      i = "sub_musical";
      mainList_subO(i);
    });
    document.getElementById("main_play").addEventListener("mouseover", event => {
      i = "sub_play";
      mainList_subO(i);
    });
    document.getElementById("main_board").addEventListener("mouseover", event => {
      i ="sub_board";
      mainList_subO(i);
    });
    document.getElementById("main_etc").addEventListener("mouseover", event => {
      i ="sub_etc";
      mainList_subO(i);
    });
    document.getElementById("main_information").addEventListener("mouseover", event => {
      mainList_subX();
    });
    document.getElementById("main_actor").addEventListener("mouseover", event => {
      mainList_subX();
    });
    document.getElementsByClassName("subList")[0].addEventListener("mouseleave", event => {
      mainList_subX();
    });

    document.getElementById('loginBtn').addEventListener('mouseover', event => {
      document.getElementById('loginBtn').style.color = "#fff";
      document.getElementById('loginBtn').style.backgroundColor = "#000";
    });
    document.getElementById('loginBtn').addEventListener('mouseleave', event => {
      document.getElementById('loginBtn').style.color = "#000";
      document.getElementById('loginBtn').style.backgroundColor = "#fff";
    });
  </script>


  <!-- index, scroll ?????? ?????? -->
  <script>
    title = document.getElementById('title').getElementsByTagName('a')[0];
    mainL = document.getElementsByClassName('mainL');
    mainList_back = document.getElementsByClassName('mainList_back')[0];
    loginBtn = document.getElementById('loginBtn');
    userName = document.getElementById('userName');


    function menu_index_mouseleave(menu_scrollY){
      if(window.scrollY >= menu_scrollY){
        mainList_back.style.opacity = '1';
        title.style.color = '#000';
        for(var i = 0; i<=5; i++){
          mainL[i].getElementsByTagName('a')[0].style.color = '#000';
        }
        loginBtn.style.color = '#000';
        loginBtn.style.borderColor = '#000';
        userName.style.color = '#000';
      } else{
        mainList_back.style.opacity = '0';
        title.style.color = '#fff';
        for(var i = 0; i<=5; i++){
          mainL[i].getElementsByTagName('a')[0].style.color = '#fff';
        }
        loginBtn.style.color = '#fff';
        loginBtn.style.borderColor = '#fff';
        userName.style.color = '#fff';
      }
    }
    function menu_index_subX_mouseleave(){
      if(window.scrollY >= menu_scrollY){
        mainList_back.style.opacity = '1';
      } else{
        mainList_back.style.opacity = '0';
        title.style.color = '#fff';
        for(var i = 0; i<=5; i++){
          mainL[i].getElementsByTagName('a')[0].style.color = '#fff';
        }
        loginBtn.style.color = '#fff';
        loginBtn.style.borderColor = '#fff';
        userName.style.color = '#fff';
      }
    }

    function menu_index_mouseover(){
      title.style.color = '#000';
      for(var i = 0; i<=5; i++){
        mainL[i].getElementsByTagName('a')[0].style.color = '#000';
      }
      loginBtn.style.color = '#000';
      loginBtn.style.borderColor = '#000';
      userName.style.color = '#000';
    }

    function loginBtn_mouseover(){
      if(window.scrollY >= menu_scrollY){
        loginBtn.style.color = '#fff';
        loginBtn.style.backgroundColor = '#000';
      } else{
        if(mainList_back.style.opacity === "1"){
          loginBtn.style.color = '#fff';
          loginBtn.style.backgroundColor = '#000';
        } else{
          loginBtn.style.color = '#000';
          loginBtn.style.backgroundColor = '#fff';
        }
      }
    }

    function loginBtn_mouseleave(){
      if(window.scrollY >= menu_scrollY){
        loginBtn.style.color = '#000';
        loginBtn.style.backgroundColor = '';
      } else{
        if(mainList_back.style.opacity === "1"){
          loginBtn.style.color = '#000';
          loginBtn.style.backgroundColor = '';
        } else{
          loginBtn.style.color = '#fff';
          loginBtn.style.backgroundColor = '';
        }
      }
    }
  </script>

  <?php
  if($url == "http://127.0.0.1:81/??????????????????/????????????/index.php"){
    //scroll ????????? menu_scrollY = 100;??????
    echo "<script>
            menu_scrollY = 1000000;
            menu_index_mouseleave(menu_scrollY);

            menu_scrollY = 100;
            window.addEventListener('scroll', event =>  {
              menu_index_mouseleave(menu_scrollY);
              document.getElementsByClassName('subList')[0].style.opacity = '0';
              document.getElementsByClassName('subList_border')[0].style.opacity = '0';
            });
            document.getElementsByClassName('subList')[0].addEventListener('mouseleave', event => {
              menu_index_mouseleave(menu_scrollY);
            });

            document.getElementById('main_information').addEventListener('mouseleave', event => {
              menu_index_subX_mouseleave();
            });
            document.getElementById('main_actor').addEventListener('mouseleave', event => {
              menu_index_subX_mouseleave();
            });

            document.getElementById('main_information').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });
            document.getElementById('main_musical').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });
            document.getElementById('main_play').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });
            document.getElementById('main_actor').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });
            document.getElementById('main_board').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });
            document.getElementById('main_etc').addEventListener('mouseover', event => {
              menu_index_mouseover();
            });


            document.getElementById('loginBtn').addEventListener('mouseover', event => {
              loginBtn_mouseover();
            });
            document.getElementById('loginBtn').addEventListener('mouseleave', event => {
              loginBtn_mouseleave();
            });
          </script>";
        }
  ?>

  <?php
    require_once('loginout/login_join_popup.php');
  ?>
