<?php
  require_once('../../header.php');
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
    #main_content{
      position: relative;
      width: 90%;
      padding: 5% 5% 15% 5%;
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
    #main_content .right #title{
      font-size: 2.5em;
      paddin: 0;
      margin: 0px;
      margin-bottom: 50px;
    }
    #main_content .right #synopsis{
      display: block;
      width: 99%;
      min-height: 300px;
      overflow: scroll;
      white-space: pre-line;
      font-size: 1em;
      font-family: "맑은 고딕";
    }
    input[type="submit"]{
      position: absolute;
      font-size: 1.2em;
      border: 0;
      background-color: #000;
      color: #fff;
      width: 100%;
      padding: 25px;
      margin-top: 70px;
      right: 0;
      transition: 0.3s;
    }
    input[type="submit"]:hover{
      background-color: #ccc
    }
  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $musical_key = $_GET["musical_key"];

  // if($musical_key == null || strlen($musical_key) == 0){
  //   echo "<script>
  //           window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php';
  //         </script>";
  // }

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


<?php
  if($admin == null || strlen($admin) == 0 || $admin == 0){
    echo "<script>
            alert('잘못된 접근');
            window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php';
          </script>";
  }
  if($musical_key == null){
    echo "<script>
            alert('잘못된 접근');
            window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php';
          </script>";
  }
?>

<section>
  <div id="wrap">
    <div id="main_content">
      <form action="musical_writing_process.php" method="post">
        <?php
          echo "<img src='http://127.0.0.1:81/웹프로그래밍/프로젝트/$img'>
                <div class='right'>
                  <input type='text' id='title' name='title' value='$title'>
                  <textarea id='synopsis' name='synopsis'>$synopsis</textarea>
                </div>
                <input type='hidden' name='musical_key' value='$musical_key'>";
        ?>
        <input type="submit" value="수정하기">
      </form>

    </div>
  </div>
</section>

<?php
  require_once('../../footer.php');
?>
