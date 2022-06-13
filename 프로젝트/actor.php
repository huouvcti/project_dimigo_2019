<?php
  require_once('lib/header.php');
?>
<head>
  <style>
    body{
      background-color: #222;
      color: #fff;
    }
    #headerImg{
      width: 100%;
    }

    section{
      width: 80%;
      margin: 50px 10% 50px 10%;
    }
    .actor_h1{
      font-size: 2em;
      text-align: center;
    }
    .location{
      text-align: right;
    }
    hr{
      border: 0.5px solid #fff;
    }

    #contetn_wrap{
      width: 100%;
      margin: 0 auto;
    }
    #content{
      width: 100%;
    }
    .content{
      position: relative;
      width: 22.9%;
      margin: 1%;
      display: inline-block;
      overflow: hidden;
    }
    #actor_img{
      display: block;
      width: 100%;
      filter: brightness(0.7);
      transform: scale(1);
      cursor: pointer;
      transition: 0.7s;
    }

    #actor_img:hover{
      filter: brightness(1);
      transform: scale(1.05);
    }
    .content p{
      width: 100%;
      text-align: center;
      position: absolute;
      bottom:0;
      z-index: 10;
      background-color: rgba(100, 100, 100, 0.3);
      color: #fff;
      font-size: 1.3em;
      margin: 0;
      padding: 40px 0;
      opacity: 0;
      transition: 0.7s;
    }
    #actor_img:hover~p{
      opacity: 1;
    }
  </style>
</head>

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
      window.open('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/actor/actor_writing_popup.php', 'actor_writing_popup.php', 'width=950px, height=800px, top=100px, left= 500px');
    }
  }
</script>

<?php
  $actor = "SELECT actor_key,actor,img FROM actor;";
  $actor_result = mysqli_query($conn, $actor);
  $actor_num = mysqli_num_rows($actor_result);
?>

<!-- <img src="images/actor_headerImg.jpg" id="headerImg"> -->

<section>
  <h1 class="actor_h1">배우</h1>
  <p class="location">MUSICAL > <b>배우</b></p>
  <hr>

  <?php
    echo "<a href='javascript:void(0);' id='writing_btn' onclick='writing_onclick($admin);'>배우 추가하기</a>";
  ?>

  <div id="contetn_wrap">
    <div id="contents">
      <?php
        for($i=0; $i < $actor_num; $i++){
          $actor_array[$i] = mysqli_fetch_array($actor_result);
          $actor_key = $actor_array[$i]['actor_key'];
          $actor = $actor_array[$i]['actor'];
          $img = $actor_array[$i]['img'];

          echo "<div class='content'>
                  <img id='actor_img' src='$img'
                    onClick='window.location.href = \"lib/actor/actor_key.php?actor_key=$actor_key\";'>
                  <p>$actor</p>
                </div>";
        }
      ?>



  </div>


  </div>

</section>
<?php
  require_once('lib/footer.php');
?>
