<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $musical_key = $_GET['musical_key'];

  $musical_delete_query = "DELETE from musical WHERE musical_key='$musical_key';";
  $musical_delete_result = mysqli_query($conn, $musical_delete_query);

  if($musical_delete_result){
    echo "<script>
            confirm(\"글 삭제 성공\");
            location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/musical.php');
          </script>";
  } else{
    echo "<script>
            confirm(\"글 삭제 실패\");
            window.history.back();
          </script>";
  }
?>
