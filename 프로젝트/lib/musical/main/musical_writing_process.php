<?php

$conn = mysqli_connect('localhost','root','nagyeong01','musical');

$musical_key = $_POST['musical_key'];

$title = addslashes($_POST['title']);
$synopsis = addslashes($_POST['synopsis']);

if($musical_key == null){
  $type = $_POST['type'];
  if($type == "C"){
    $img_url = 'images/musical/musical_C/'.$_FILES['img']['name'];

  }
  else if ($type == "L"){
    $img_url = 'images/musical/musical_L/'.$_FILES['img']['name'];
  }
  $img_upload = move_uploaded_file($_FILES['img']['tmp_name'], '../../../'.$img_url);
  $musical_writing = mysqli_query($conn, "INSERT INTO musical (img, title, synopsis, type)
            VALUE('$img_url', '$title', '$synopsis', '$type')");

  if($img_upload){
    //이미지 업로드 성공
  } else{
    echo "<script>
            confirm(\"이미지 업로드 실패\");
            window.history.back();
          </script>";
  }
  if($musical_writing){
    echo "<script>
            confirm(\"뮤지컬 추가 완료\");
            window.opener.location.reload();
            window.close();
          </script>";
  } else{
    echo "<script>
            confirm(\"뮤지컬 추가 실패\");
            window.history.back();
          </script>";
  }

} else{
  $musical_update = mysqli_query($conn,
    "UPDATE musical SET title='$title', synopsis='$synopsis' WHERE musical_key=$musical_key;"
  );

  if($musical_update){
    echo "<script>
            confirm(\"뮤지컬 수정 완료\");
            history.pushState(null, null, 'http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/main/musical_key_main_update.php');
            location.replace('http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/musical_key.php?musical_key=$musical_key');
          </script>";
  } else{
    echo "<script>
            confirm(\"뮤지컬 수정 실패\");
            window.history.back();
          </script>";
  }
}



?>
