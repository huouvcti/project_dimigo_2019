<?php
  require_once('../header.php');
?>
<head>
  <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script&display=swap" rel="stylesheet">

  <style>
    section{
      width: 70%;
      margin: 5% 10%;
      padding: 0 5%;
      box-shadow: 5px 5px 20px #ccc;
    }
    #contents{
      width: 90%;
      padding: 5% 5%;
    }
    #contents h1{
      width: 100%;
      font-size: 2em;
    }
    #contents hr{
      margin: 30px 0;
    }
    #contents #content{
      width: 100%;
      font-size: 1.5em;
      font-family: "맑은 고딕";
      margin-bottom: 30px;
    }
    #contents img{
      display: block;
      margin-bottom: 15px;
      max-width: 100%;
    }

    #contents p{
      font-size: 1em;
    }
    #contents a{
      text-decoration: none;
      color: #000;
    }
    #contents a:hover{
      color: #ccc;
    }

    #contents #btn_wrap{
      width: 25%;
      height: 60px;
      margin-left: 75%;
    }

    #contents button{
      font-size: 1em;
      background-color: #000;
      color: #fff;
      border:0;
      margin:0;
      margin-left: 1%;
      width: 47%;
      height: 100%;
      padding: 15px 0;
      transition: 0.3s;
      cursor: pointer;
    }
    #contents button:hover{
      background-color: #ccc;
    }
    #contents button:focus{
      outline: none;
    }

    #pw_input{
      width: 100%;
      margin: 10px;
      padding: 10px;
    }

  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  @session_start();

  $id = $_SESSION["userId"];

  $community_key = $_GET["community_key"];


  if($community_key == null || strlen($community_key) == 0){
    echo "<script>
            window.location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/community_.php');
          </script>";
  }

  $community_key_query = "SELECT title,content,img1,img2,img3,name,community.id,first_time,update_time
    FROM community LEFT JOIN account ON community.id = account.id
    WHERE community_key = '$community_key';";
  $community_key_result = mysqli_query($conn, $community_key_query);
  $community_key_array = mysqli_fetch_array($community_key_result);

  $title = $community_key_array['title'];
  $content = $community_key_array['content'];

  $img_count = 0;
  for($i=1; $i<=3; $i++){
    if($community_key_array['img'.$i] != null){
      $img[] = $community_key_array['img'.$i];
      $img_count++;
    }
  }

  $name = $community_key_array['name'];
  $writer_id = substr($community_key_array['id'], 0, 3)."*****";
  $time[0] = $community_key_array['first_time'];
  $time[1] = $community_key_array['update_time'];

  $today = date("Y-m-d");
  for($i=0; $i<2; $i++){
    $time_format[$i] = date("Y-m-d", strtotime($time[$i]));

    if($time_format[$i] >= $today){
      $time[$i] = date("H:i", strtotime($time[$i]));
    } else{
      $time[$i] = date("Y-m-d", strtotime($time[$i]));
    }
  }

?>


<script>
  function delete_onclick(community_key){
    if(confirm("정말 삭제하시겠습니까?")){
      location.href = "http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/community/community_delete_process.php?community_key="+community_key;;
    }
  }
</script>


<section>
  <div id="contents">

    <?php
      echo "<h1>$title</h1>
            <hr>
            <pre id='content'>$content</pre>";

      for($i=0; $i<$img_count; $i++){
        echo "<img src='../../$img[$i]'>";
      }

      echo "<p style='margin-top: 100px;'>작성자 <b><a href='http://127.0.0.1:81/웹프로그래밍/프로젝트/community.php'>$name($writer_id)</a></b></p>
            <p>작성 <b>$time[0]</b></p>";

      if($time[0] != $time[1]){
        echo "<p>수정 <b>$time[1]</b></p>";
      }

      if($id == $community_key_array['id']){
        echo "<div id='btn_wrap'>
                <button type='button' onclick='window.location.href = \"http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/community/community_writing.php?community_key=$community_key\";'>
                  수정하기
                </button>
                <button type='button' onclick='delete_onclick($community_key);'>
                  삭제하기
                </button>
              </div>";

      }
    ?>








  </div>
</section>



<?php
  require_once('../footer.php');
?>
