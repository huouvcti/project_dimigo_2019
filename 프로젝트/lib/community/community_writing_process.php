<h1>페이지 이동중입니다</h1>

<?php

$conn = mysqli_connect('localhost','root','nagyeong01','musical');
@session_start();

$id = $_SESSION["userId"];
$community_key = $_POST['community_key'];

$title = addslashes($_POST['title']);
$content = addslashes($_POST['content']);


//글 작성
if($community_key == null){
  $img_array = 0;
  $img_upload_success = 0;


  for($i=0; $i<3; $i++){
    if($_FILES['img'.$i]['name'] != null || strlen($_FILES['img'.$i]['name']) != 0){
      $img[$img_array] = 'images/community/'.$_FILES['img'.$i]['name'];
      $img_upload[$img_array] = move_uploaded_file($_FILES['img'.$i]['tmp_name'], '../../'.$img[$img_array]);
      if($img_upload[$img_array]){
        $img_upload_success++;
      }
      $img_array++;
    }
  }

  switch ($img_array) {
    case 0:
      $community_writing_query = "INSERT INTO community (id, title, content)
                                    VALUE('$id', '$title', '$content');";
      break;

    case 1:
      $community_writing_query = "INSERT INTO community (id, title, content, img1)
                                    VALUE('$id', '$title', '$content', '$img[0]');";
      break;

    case 2:
      $community_writing_query = "INSERT INTO community (id, title, content, img1, img2)
                                    VALUE('$id', '$title', '$content', '$img[0]', '$img[1]');";
      break;

    case 3:
      $community_writing_query = "INSERT INTO community (id, title, content, img1, img2, img3)
                                    VALUE('$id', '$title', '$content', '$img[0]', '$img[1]', '$img[2]');";
      break;
  }

} else{ //글 수정
  $community_writing_query = "UPDATE community SET title='$title', content='$content', update_time=NOW() WHERE community_key='$community_key';";
}


$community_writing_result = mysqli_query($conn, $community_writing_query);




if($community_writing_result){
  echo "<script>";
  if($community_key == null){
    echo "confirm(\"글 작성 성공\");";
  } else{
    echo "confirm(\"글 수정 성공\");";
  }
  if($community_key == null){
      $community_key = $conn->insert_id;
  }
  echo "history.pushState(null, null, 'http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/community/community_writing.php');
        location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/community/community_key.php?community_key=$community_key';
      </script>";
} else{
  echo "<script>";
  if($community_key == null){
    echo "confirm(\"글 작성 실패\");";
  } else{
    echo "confirm(\"글 수정 실패\");";
  }
  echo "window.history.back();';
      </script>";
}
?>
