<?php
  require_once('../header.php');
?>
<head>
  <style>
    body{
      background-color: #222;
    }
    section{
      width: 70%;
      margin: 5% 10%;
      padding: 0 5%;
      border-radius: 30px;
      overflow: hidden;
      background-color: #fff;
    }
    #main_content{
      width: 90%;
      padding: 5% 5%;
    }

    #img_wrap{
      display: inline-block;

      border-radius: 50%;
      width: 400px;
      height: 400px;
      overflow: hidden;

    }

    #main_content #content{
      display: inline-block;
      margin-top: 6%;
      float: right;
      width: 45%;
    }
    #main_content #content h1{
      font-size: 3em;
      margin-bottom: 50px;
    }
    #main_content #content p{
      font-size: 1.2em;
    }

  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $actor_key = $_GET["actor_key"];

  if($actor_key == null || $actor_key.length == 0){
    echo "<script>
            window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/actor.php';
          </script>";
  }

  $actor_key_query = "SELECT actor,img,birth,debut_date,debut FROM actor WHERE actor_key='$actor_key';";
  $actor_key_result = mysqli_query($conn, $actor_key_query);
  $actor_key_array = mysqli_fetch_array($actor_key_result);

  $actor_name = $actor_key_array['actor'];
  $main_img = $actor_key_array['img'];
  $birth_array = explode("-", $actor_key_array['birth']);
  $debut_date_array = explode("-", $actor_key_array['debut_date']);
  $debut = $actor_key_array['debut'];

  $birth = $birth_array[0]."년 ".$birth_array[1]."월 ".$birth_array[2]."일";
  if($debut_date_array[0] != "0000"){
    $debut_date = $debut_date_array[0]."년";
    if($debut_date_array[1] != "00"){
      $debut_date = $debut_date_array[0]."년 ".$debut_date_array[1]."월";
      if($debut_date_array[2] != "00"){
        $debut_date = $debut_date_array[0]."년 ".$debut_date_array[1]."월 ".$debut_date_array[2]."일";
      }
    }
  }
?>


<section>
  <div id="main_content">
    <div id="img_wrap">
      <?php
        echo "<img src='http://127.0.0.1:81/웹프로그래밍/프로젝트/$main_img'>";
      ?>

    </div>
    <div id="content">
      <?php
        echo "<h1>$actor_name</h1>
              <p>출생 : $birth</p>
              <p>데뷔 : $debut_date $debut</p>";
      ?>

    </div>
  </div>


</section>


<?php
  require_once('../footer.php');
?>
