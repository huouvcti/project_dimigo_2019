<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $count = $_POST["count"]+1;
  $array_count = 0;
  $success = 0;

  for($i=0; $i < $count; $i++){
    if($_POST["musical_youtube_title".$i] != null || $_POST["musical_youtube_title".$i].length != 0){
      $musical_key = $_POST["musical_key"];
      $title[$array_count] = addslashes($_POST["musical_youtube_title".$i]);
      $link_watch[$array_count] = addslashes($_POST["musical_youtube_link".$i]);

      // https://www.youtube.com/watch?v=ObTZlh6asvc
      // https://www.youtube.com/embed/ObTZlh6asvc
      $link[$array_count] = str_replace("watch?v=", "embed/", $link_watch[$array_count]);

      $array_count++;
    }
  }


  for($i=0; $i < $array_count; $i++){
    $musical_youtube_add_query = "INSERT INTO musical_youtube (title, link, musical_key)
              VALUE('$title[$i]', '$link[$i]', '$musical_key')";
    $musical_youtube_add_result = mysqli_query($conn, $musical_youtube_add_query);

    if($musical_youtube_add_result){
      $success++;
    }
  }

  echo "<script>
          alert($array_count+'개 중 '+$success+'개 저장 성공');
          window.opener.location.reload();
          window.close();
        </script>";
?>
