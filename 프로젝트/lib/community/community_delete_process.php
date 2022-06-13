<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $community_key = $_GET['community_key'];

  $community_delete_query = "DELETE from community WHERE community_key='$community_key';";
  $community_delete_result = mysqli_query($conn, $community_delete_query);

  if($community_delete_result){
    echo "<script>
            confirm(\"글 삭제 성공\");
            location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/community.php');
          </script>";
  } else{
    echo "<script>
            confirm(\"글 삭제 실패\");
            window.history.back();
          </script>";
  }
?>
