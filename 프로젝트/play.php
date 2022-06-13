<head>
  <link href="lib/aos/aos.css" rel="stylesheet">

  <style>
    body{
      background-color: #fee;
    }
    #headerImg{
      width: 100%;
    }
    section{
      width: 80%;
      margin: 50px 10% 50px 10%;
    }
    .play_h1{
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
      box-shadow: 5px 5px 10px #ccc;
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
      box-shadow: 5px 5px 10px #ccc;
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
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/play/main/play_writing_popup.php', 'play_writing_popup.php', 'width=950px, height=550px, top=150px, left= 500px');
    }
  }

  function youtube_add_onclick(admin){
    if(admin == null || admin.length == 0 || admin == 0){
      alert("관리자 권한이 필요합니다");
    } else{
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/play/more/play_youtube_add_popup.php','play_youtube_add_popup.php', 'width=900px, height=320px, top=250px, left= 500px');
    }
  }

</script>

<img src="images/headerImg/play_headerImg.jpg" id="headerImg">
<section>
  <h1 class="play_h1">연극</h1>
  <p class="location">MUSICAL > <b>연극</b></p>
  <hr>
  <?php
    echo "<a href='javascript:void(0);' id='writing_btn' onclick='writing_onclick($admin);'>연극 추가하기</a>
          <a href='javascript:void(0);' id='writing_btn' onclick='youtube_add_onclick($admin);'>유튜브 영상 추가하기</a>";
  ?>

  <div class="hashtag">
    <?php
      if($type != null || $type.length != 0){
        echo "<a href='?type=' id='type_none'>X</a>";
      }
    ?>

    <a href="?type=L" id="typeL"># 리미티드런</a>
    <a href="?type=S" id="typeS"># 스테디셀러</a>
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
    } else if($type == S){
      echo "<script>
              for(var i=0; i<hashtag.length; i++){
                hashtag[i].style.backgroundColor = '';
              }
              document.getElementById('typeS').style.backgroundColor = '#c5c5ff';
            </script>";
      $where_type = "WHERE type='S'";
    } else{
      echo "<script>
              for(var i=0; i<hashtag.length; i++){
                hashtag[i].style.backgroundColor = '';
              }
            </script>";
      $where_type = "";
    }

    $play = "SELECT play_key,img,title,synopsis FROM play $where_type";
    $play_result = mysqli_query($conn, $play);
    $num = mysqli_num_rows($play_result);
  ?>



  <div id="contents">
    <?php
      for($i=0; $i < $num; $i++){
        $play_array[$i] = mysqli_fetch_array($play_result);
        $play_key = $play_array[$i]['play_key'];
        $img = $play_array[$i]['img'];
        $title = $play_array[$i]['title'];
        $synopsis = $play_array[$i]['synopsis'];
        echo "<div class='content' data-aos='fade-up' data-aos-duration='700'
              onClick='window.location.href = \"lib/play/play_key.php?play_key=$play_key\";'>
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
