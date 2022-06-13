<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $count = $_POST["count"]+1;
  $array_count = 0;
  $success = 0;

  for($i=0; $i < $count; $i++){
    if($_POST["play_youtube_title".$i] != null || $_POST["play_youtube_title".$i].length != 0){
      $play_key = $_POST["play_key"];
      $title[$array_count] = addslashes($_POST["play_youtube_title".$i]);
      $link_watch[$array_count] = addslashes($_POST["play_youtube_link".$i]);

      // https://www.youtube.com/watch?v=ObTZlh6asvc
      // https://www.youtube.com/embed/ObTZlh6asvc
      $link[$array_count] = str_replace("watch?v=", "embed/", $link_watch[$array_count]);

      $array_count++;
    }
  }


  for($i=0; $i < $array_count; $i++){
    $play_youtube_add_query = "INSERT INTO play_youtube (title, link, play_key)
              VALUE('$title[$i]', '$link[$i]', '$play_key')";
    $play_youtube_add_result = mysqli_query($conn, $play_youtube_add_query);

    if($play_youtube_add_result){
      $success++;
    }
  }

  echo "<script>
          alert($array_count+'개 중 '+$success+'개 저장 성공');
          window.opener.location.reload();
          window.close();
        </script>";
?>
