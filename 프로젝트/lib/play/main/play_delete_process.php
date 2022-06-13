<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $play_key = $_GET['play_key'];

  $play_delete_query = "DELETE from play WHERE play_key='$play_key';";
  $play_delete_result = mysqli_query($conn, $play_delete_query);

  if($play_delete_result){
    echo "<script>
            confirm(\"글 삭제 성공\");
            location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/play.php');
          </script>";
  } else{
    echo "<script>
            confirm(\"글 삭제 실패\");
            window.history.back();
          </script>";
  }
?>
