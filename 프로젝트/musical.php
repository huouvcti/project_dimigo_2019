<head>
  <link href="lib/aos/aos.css" rel="stylesheet">

  <style>
    body{
      background-color: #f5f5f5;
    }
    #headerImg{
      width: 100%;
    }
    section{
      width: 80%;
      margin: 50px 10% 50px 10%;
    }
    .musical_h1{
      font-size: 2em;
      text-align: center;
    }
    .location{
      text-align: right;
    }
    hr{
      border: 0.5px solid #000;
    }
    #writing_btn{
      color: #fff;
    }

    .hashtag{
      margin-left: 35px;
    }
    .hashtag a{
      display: inline-block;
      border-radius: 30px;
      text-decoration: none;
      color: #000;
      background-color: #fff;
      box-shadow: 5px 5px 10px #cccccc;
      padding: 15px;
      margin: 0;
      margin-right: 20px;
      font-size: 1.3em;
      cursor: pointer;
      transition: 0.3s;
    }
    .hashtag a:hover{
      background-color: #eee;
    }

    #content{
      width: inherit;
    }
    .content{
      width: 670px;
      height: 350px;
      margin: 40px;
      box-shadow: 5px 5px 10px #cccccc;
      background-color: #fff;
      border-radius: 10px;
      display: inline-block;
      transition: 0.3s;
      cursor: pointer;
    }
    .content:hover{
      background-color: #eee;
      animation-name: content_hover_anim;
      animation-duration: 0.3s;
      animation-iteration-count: infinite;
      animation-direction: alternate-reverse;
      animation-timing-function: linear;
    }
    @keyframes content_hover_anim {
      0%{
        transform: translate(0px, -5px);
      }
      100%{
        transform: translate(0px, 5px);
      }

    }
    .content img{
      width: 230px;
      height: 280px;
      margin: 35px 35px 10px 35px;
      display: inline-block;
      float: left;
    }
    .content p{
      margin: 35px 35px 10px 35px;
      font-size: 2em;
    }
    .content pre{
      font-family: "맑은 고딕";
      font-size: 1em;
      text-overflow: ellipsis;
      white-space:pre-line;
      overflow-x: hidden;
      overflow-y: scroll;
      width:300px;
      height: 220px;
    }

  </style>
</head>
<?php
  require_once('lib/header.php');
?>
<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  @session_start();
  $id = $_SESSION["userId"];

  $type = $_GET["type"];

  $id_check = "SELECT * FROM account WHERE id='$id';";
  $id_check_result = mysqli_query($conn, $id_check);
  $array = mysqli_fetch_array($id_check_result);
  $admin = $array['admin'];
?>

<script>
  function writing_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/main/musical_writing_popup.php', 'musical_writing_popup.php', 'width=950px, height=550px, top=150px, left= 500px');
    }
  }

  function youtube_add_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/more/musical_youtube_add_popup.php','musical_youtube_add_popup.php', 'width=900px, height=320px, top=250px, left= 500px');
    }
  }

  function number_add_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/more/musical_number_add_popup.php', 'musical_add_popup.php', 'width=900px, height=550px, top=150px, left= 500px');
    }
  }
</script>

<img src="images/headerImg/musical_headerImg.jpg" id="headerImg">
<section>
  <h1 class="musical_h1">뮤지컬</h1>
  <p class="location">MUSICAL > <b>뮤지컬</b></p>
  <hr>
  <?php
    echo "<a href='javascript:void(0);' id='writing_btn' onclick='writing_onclick($admin);'>뮤지컬 추가하기</a>
          <a href='javascript:void(0);' id='writing_btn' onclick='youtube_add_onclick($admin);'>유튜브 영상 추가하기</a>
          <a href='javascript:void(0);' id='writing_btn' onclick='number_add_onclick($admin);'>넘버 추가하기</a>";
  ?>
  <div class="hashtag">
    <?php
      if($type != null || $type.length != 0){
        echo "<a href='?type=' id='type_none'>X</a>";
      }
    ?>

    <a href="?type=L" id="typeL"># 라이선스 / 내한</a>
    <a href="?type=C" id="typeC"># 창작</a>
  </div>






  <?php
    echo "<script>
            var hashtag = document.getElementsByClassName('hashtag')[0].getElementsByTagName('a');
          </script>";
    if($type == L){
      echo "<script>
              for(var i=0; i<hashtag.length; i++){
                hashtag[i].style.backgroundColor = '';
              }
              document.getElementById('typeL').style.backgroundColor = '#ffc5c5';
            </script>";
      $where_type = "WHERE type='L'";
    } else if($type == C){
      echo "<script>
              for(var i=0; i<hashtag.length; i++){
                hashtag[i].style.backgroundColor = '';
              }
              document.getElementById('typeC').style.backgroundColor = '#c5c5ff';
            </script>";
      $where_type = "WHERE type='C'";
    } else{
      echo "<script>
              for(var i=0; i<hashtag.length; i++){
                hashtag[i].style.backgroundColor = '';
              }
            </script>";
      $where_type = "";
    }

    $musical = "SELECT musical_key,img,title,synopsis FROM musical $where_type";
    $musical_result = mysqli_query($conn, $musical);
    $num = mysqli_num_rows($musical_result);
  ?>



  <div id="contents">
    <?php
      for($i=0; $i < $num; $i++){
        $musical_array[$i] = mysqli_fetch_array($musical_result);
        $musical_key = $musical_array[$i]['musical_key'];
        $img = $musical_array[$i]['img'];
        $title = $musical_array[$i]['title'];
        $synopsis = $musical_array[$i]['synopsis'];
        echo "<div class='content' data-aos='fade-up' data-aos-duration='700'
              onClick='window.location.href = \"lib/musical/musical_key.php?musical_key=$musical_key\";'>
                <img src='$img'>
                <p>$title</p>
                <pre>$synopsis</pre>
              </div>";
      }
    ?>
  </div>
</section>


<script src="lib/aos/aos.js"></script>
<script>
  AOS.init();
</script>



<?php
  require_once('lib/footer.php');
?>
