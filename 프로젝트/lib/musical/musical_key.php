<?php
  require_once('../header.php');
?>
<head>
  <style>
    section{
      position: relative;
      width: 70%;
      margin: 5% 10%;
      padding: 0 5%;
      border-radius: 30px;
      overflow: hidden;

      box-shadow: 5px 5px 20px #ccc;
    }

    /* 수정 삭제 */
    #edit{
      position: absolute;
      z-index: 10;
      top: 30px;
      right: 50px;
    }
    #edit a{
      color: gray;
      text-decoration: none;
      margin-left: 15px;
    }
    #edit a:hover{
      color: #ccc;
      cursor: pointer;
    }

    #main_content{
      position: relative;
      width: 90%;
      padding: 5% 5%;
    }

    #main_content img{
      width: 25%;
      float: left;
    }
    #main_content .right{
      margin-left: 35%;
      width: 70%;
      overflow: hidden;
    }
    #main_content .right h1{
      font-size: 2.5em;
      paddin: 0;
      margin: 0px;
      margin-bottom: 50px;
    }
    #main_content .right pre{
      display: block;
      width: 100%;
      min-height: 300px;
      overflow: hidden;
      white-space: pre-line;
      font-size: 1em;
      font-family: "맑은 고딕";
    }

    #ex_contents{
      width: 100%;
      padding: 0 10% 5% 10%;
      position: relative;
      left: -10%;
      background-color: lightgray;
      display: block;
    }
    #ex_btn_wrap{
      background-color: #fff;
      width: 100%;
      position: relative;
      left: -10%;
      padding: 0 10%;
    }
    #ex_btn{
      list-style: none;
      padding: 0;
      margin: 0;
    }
    #ex_btn li{
      display: inline-block;
      padding: 20px 50px;
      background-color: #fff;
      border-radius: 15px 15px 0 0;
      color: #000;
      font-size: 1em
      transition: 0.3s;
      cursor: pointer;
    }
    #ex_btn li:hover{
      background-color: #bbb;
    }
    #ex_btn #ex_btn_youtube:hover{
      background-color: #f00;
    }

    .more{
      display: none;
    }

    #writing_btn{
      text-decoration: none;
      color: #fff;
    }

    /* youtube */
    #youtube_wrap{
      width: 100%;
    }
    .youtube_content_wrap{
      width: 50%;
      margin: 0 auto;
    }
    .youtube_content_wrap p{

      color: #fff;
      font-size: 1.3em;
      font-weight: bold;
    }
    .youtube_iframe{
      width: 100%;
      height: 20vw;
    }


    /* number */
    #number{
      border: 1px solid #ccc;
      border-radius: 15px;
      background-color: #fff;
    }
    #number div p{
      display: inline-block;
      padding: 0 2%;
      margin: 2% 0;
    }
    #number div .number_no{
      width: 5%;
      text-align: center;
    }
    #number div .number_title{
      width: 50%;
      padding-left: 12%;
      border-left: 1px solid gray;
      border-right: 1px solid gray;
    }
    #number div .number_role{
      float: right;
      width: 20%;
    }

    #number div #number_no_h,
    #number div #number_title_h,
    #number div #number_role_h{
      text-align: center;
    }
    #number div #number_title_h{
      padding: 0 7%;
    }



  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $musical_key = $_GET["musical_key"];

  if($musical_key == null || strlen($musical_key) == 0){
    echo "<script>
            window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php';
          </script>";
  }

  $musical_key_query = "SELECT img,title,synopsis FROM musical WHERE musical_key='$musical_key';";;
  $musical_key_result = mysqli_query($conn, $musical_key_query);
  $musical_key_array = mysqli_fetch_array($musical_key_result);

  $img = $musical_key_array['img'];
  $title = $musical_key_array['title'];
  $synopsis = $musical_key_array['synopsis'];
?>

<?php
  @session_start();
  $id = $_SESSION["userId"];

  $id_check = "SELECT * FROM account WHERE id='$id';";
  $id_check_result = mysqli_query($conn, $id_check);
  $id_check_array = mysqli_fetch_array($id_check_result);
  $admin = $id_check_array['admin'];
?>
<script>
  function youtube_add_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      <?php
        echo "window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/more/musical_youtube_add_popup.php?musical_key=$musical_key','musical_youtube_add_popup.php', 'width=900px, height=320px, top=250px, left= 500px');";
      ?>
    }
  }

  function number_add_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      <?php
      echo "window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/more/musical_number_add_popup.php?musical_key=$musical_key','musical_number_add_popup.php', 'width=900px, height=550px, top=150px, left= 500px');";
      ?>
    }
  }
</script>

<?php
  $musical_youtube_query = "SELECT title,link FROM musical_youtube WHERE musical_key='$musical_key'";
  $musical_youtube_result = mysqli_query($conn, $musical_youtube_query);
  $musical_youtube_num = mysqli_num_rows($musical_youtube_result);
?>

<?php
  $number_query = "SELECT SUBSTRING_INDEX(number_key, '-', -2), title, role FROM number WHERE musical_key='$musical_key' ORDER BY SUBSTRING_INDEX(number_key, '-', -2)*1, SUBSTRING_INDEX(number_key, '-', -1)*1;";
  $number_result = mysqli_query($conn, $number_query);
  $number_num = mysqli_num_rows($number_result);
?>

<script>
  function delete_onclick(musical_key){
    if(confirm("정말 삭제하시겠습니까?")){
      location.href = "http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/main/musical_delete_process.php?musical_key="+musical_key;
    }
  }
</script>



<section>
  <div id="wrap">
    <div id="edit">
      <?php
        if($admin == 1){
          echo "<a href='main/musical_key_main_update.php?musical_key=$musical_key'>수정</a>
                <a onclick='delete_onclick($musical_key);'>삭제</a>";
        }
      ?>
    </div>

    <div id="main_content">
      <?php
        echo "<img src='http://127.0.0.1:81/웹프로그래밍/프로젝트/$img'>
              <div class='right'>
                <h1>$title</h1>
                <pre>$synopsis</pre>
              </div>";
      ?>
    </div>

    <div id="ex_contents">
      <div id="ex_btn_wrap">
        <ul id="ex_btn">
          <li id="ex_btn_youtube">YouTube</li>
          <li>넘버</li>
          <li>스케줄 / 장소</li>
          <li>기획사 / 피디</li>
          <li>예매</li>
        </ul>
      </div>


      <div id="more">
        <!-- youtube -->
        <div id="youtube_wrap" class="more">
          <?php
            echo "<p><a href='javascript:void(0);' id='youtube_add_btn' onclick='youtube_add_onclick($admin);'>유튜브 영상 추가하기</a></p>";
          ?>
          <!-- <div class="youtube_content_wrap">
            <p>지킬앤하이드 하이라이트1</p>
            <iframe class="youtube_iframe" width="100%" height="100%" src="https://www.youtube.com/embed/ObTZlh6asvc" frameborder="0" allowfullscreen></iframe>
          </div> -->

          <?php
            for($i=0; $i < $musical_youtube_num; $i++){
              $musical_youtube_array[$i] = mysqli_fetch_array($musical_youtube_result);
              $musical_youtube_title = $musical_youtube_array[$i]["title"];
              $musical_youtube_link = $musical_youtube_array[$i]['link'];

              echo "<div class='youtube_content_wrap'>
                      <p>$musical_youtube_title</p>
                      <iframe class='youtube_iframe' width='100%' height='100%' src='$musical_youtube_link' frameborder='0' allowfullscreen></iframe>
                    </div>";
              if($i != $musical_youtube_num-1){
                echo "<br><br><br>";
              }
            }
          ?>


        </div>

        <!-- number -->
        <div id="number_wrap" class="more">
          <?php
            echo "<p><a href='javascript:void(0);' id='number_add_btn' onclick='number_add_onclick($admin);'>넘버 추가하기</a></p>";
          ?>
          <div id="number">
            <div><b>
              <p class='number_no' id="number_no_h">NO</p>
              <p class='number_title' id="number_title_h">제목</p>
              <p class='number_role' id="number_role_h">배역</p>
            </b></div>
            <hr>
            <?php
              for($i=0; $i < $number_num; $i++){
                $number_array[$i] = mysqli_fetch_array($number_result);
                $number_act = $number_array[$i]["SUBSTRING_INDEX(number_key, '-', -2)"];
                $number_title = $number_array[$i]['title'];
                $number_role = $number_array[$i]['role'];

                echo "<div>
                        <p class='number_no'>$number_act</p>
                        <p class='number_title'>$number_title</p>
                        <p class='number_role'>$number_role</p>
                      </div>";
              }
            ?>
          </div>
        </div>

        <div class="more">
          스케줄 / 장소
        </div>
        <div class="more">
          기획사 / PD
        </div>
        <div class="more">
          예매
        </div>

      </div>
    </div>

  </div>

  <script>
    var ex_btn = document.getElementById("ex_btn").getElementsByTagName("li");
    var more = document.getElementsByClassName("more");
    var more_id = document.getElementById("ex_contents");
    var ex_btn_click_background_color = "lightgray";

    //click
    ex_btn[0].addEventListener("click", event => {
      for(var i=0; i < ex_btn.length; i++){
        ex_btn[i].style.backgroundColor = "";
        ex_btn[i].style.fontSize = "1em";
        ex_btn[i].style.color = "#000";
        more[i].style.display = "none";
      }
      ex_btn[0].style.backgroundColor = "#f00";
      ex_btn[0].style.fontSize = "1.3em";
      ex_btn[0].style.color = "#fff";
      more[0].style.display = "block";
      more_id.style.backgroundColor = "#272727";
    });

    ex_btn[1].addEventListener("click", event => {
      for(var i=0; i < ex_btn.length; i++){
        ex_btn[i].style.backgroundColor = "";
        ex_btn[i].style.fontSize = "1em";
        ex_btn[i].style.color = "#000";
        more[i].style.display = "none";
      }
      ex_btn[1].style.backgroundColor = ex_btn_click_background_color;
      ex_btn[1].style.fontSize = "1.3em";
      ex_btn[1].style.color = "#fff";
      more[1].style.display = "block";
      more_id.style.backgroundColor = ex_btn_click_background_color;
    });

    ex_btn[2].addEventListener("click", event => {
      for(var i=0; i < ex_btn.length; i++){
        ex_btn[i].style.backgroundColor = "";
        ex_btn[i].style.fontSize = "1em";
        ex_btn[i].style.color = "#000";
        more[i].style.display = "none";
      }
      ex_btn[2].style.backgroundColor = ex_btn_click_background_color;
      ex_btn[2].style.fontSize = "1.3em";
      ex_btn[2].style.color = "#fff";
      more[2].style.display = "block";
      more_id.style.backgroundColor = ex_btn_click_background_color;
    });

    ex_btn[3].addEventListener("click", event => {
      for(var i=0; i < ex_btn.length; i++){
        ex_btn[i].style.backgroundColor = "";
        ex_btn[i].style.fontSize = "1em";
        ex_btn[i].style.color = "#000";
        more[i].style.display = "none";
      }
      ex_btn[3].style.backgroundColor = ex_btn_click_background_color;
      ex_btn[3].style.fontSize = "1.3em";
      ex_btn[3].style.color = "#fff";
      more[3].style.display = "block";
    });

    ex_btn[4].addEventListener("click", event => {
      for(var i=0; i < ex_btn.length; i++){
        ex_btn[i].style.backgroundColor = "";
        ex_btn[i].style.fontSize = "1em";
        ex_btn[i].style.color = "#000";
        more[i].style.display = "none";
        more_id.style.backgroundColor = ex_btn_click_background_color;
      }
      ex_btn[4].style.backgroundColor = ex_btn_click_background_color;
      ex_btn[4].style.fontSize = "1.3em";
      ex_btn[4].style.color = "#fff";
      more[4].style.display = "block";
      more_id.style.backgroundColor = ex_btn_click_background_color;
    });
  </script>

</section>



<?php
  require_once('../footer.php');
?>
