<?php

$conn = mysqli_connect('localhost','root','nagyeong01','musical');

$name = addslashes($_POST['name']);
$birth = addslashes($_POST['birth']);
$debut_date = $_POST['debut_year']."-".str_pad($_POST['debut_month'], "2", "0", STR_PAD_LEFT)."-".str_pad($_POST['debut_day'], "2", "0", STR_PAD_LEFT);
$debut = addslashes($_POST['debut']);

$img_url = 'images/actor/actor_main/'.$_FILES['img']['name'];
$img_upload = move_uploaded_file($_FILES['img']['tmp_name'], '../../'.$img_url);

$actor_writing = mysqli_query($conn, "INSERT INTO actor (actor, img, birth, debut_date, debut)
          VALUE('$name', '$img_url', '$birth', '$debut_date', '$debut');");

if($img_upload){
  //이미지 업로드 성공
} else{
  echo "<script>
          confirm(\"이미지 업로드 실패\");
          window.history.back();
        </script>";
}

if($actor_writing){
  echo "<script>
          confirm(\"배우 추가하기 완료\");
          window.opener.location.reload();
          window.close();
        </script>";
} else{
  echo "<script>
          confirm(\"배우 추가하기 실패\");
          window.history.back();
        </script>";
}
?>
