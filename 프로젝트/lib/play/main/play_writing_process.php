<?php

$conn = mysqli_connect('localhost','root','nagyeong01','musical');

$play_key = $_POST['play_key'];
$title = addslashes($_POST['title']);
$synopsis = addslashes($_POST['synopsis']);

if($play_key == null){
  $type = $_POST['type'];

  if($type == "L"){
    $img_url = 'images/play/play_L/'.$_FILES['img']['name'];

  }
  else if ($type == "S"){
    $img_url = 'images/play/play_S/'.$_FILES['img']['name'];
  }
  $img_upload = move_uploaded_file($_FILES['img']['tmp_name'], '../../../'.$img_url);
  $play_writing = mysqli_query($conn, "INSERT INTO play (img, title, synopsis, type)
            VALUE('$img_url', '$title', '$synopsis', '$type')");

  if($img_upload){
    //이미지 업로드 성공
  } else{
    echo "<script>
            confirm(\"이미지 업로드 실패\");
            window.history.back();
          </script>";
  }

  if($play_writing){
    echo "<script>
            confirm(\"연극 추가하기 완료\");
            window.opener.location.reload();
            window.close();
          </script>";
  } else{
    echo "<script>
            confirm(\"연극 추가하기 실패\");
            window.history.back();
          </script>";
  }
} else{
  $play_update = mysqli_query($conn,
    "UPDATE play SET title='$title', synopsis='$synopsis' WHERE play_key=$play_key;"
  );

  if($play_update){
    echo "<script>
            confirm(\"연극 수정 완료\");
            history.pushState(null, null, 'http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/play/main/play_key_main_update.php');
            location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/play/play_key.php?play_key=$play_key');
          </script>";
  } else{
    echo "<script>
            confirm(\"연극 수정 실패\");
            window.history.back();
          </script>";
  }
}

?>
