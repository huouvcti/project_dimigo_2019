<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');

  $count = $_POST["count"]+1;
  $array_count = 0;
  $success = 0;

  for($i=0; $i < $count; $i++){
    if($_POST["number_no".$i] != null || $_POST["number_no".$i].length != 0){
      $musical_key = $_POST["musical_key"];
      $no[] = addslashes($_POST["number_no".$i]);
      $title[] = addslashes($_POST["number_title".$i]);
      $role[] = addslashes($_POST["number_role".$i]);

      $array_count++;
    }
  }

  for($i=0; $i < $array_count; $i++){
    $number_key = $musical_key."-".$no[$i];
    $number_add_query = "INSERT INTO number (number_key, title, role, musical_key)
              VALUE('$number_key', '$title[$i]', '$role[$i]', '$musical_key')";
    $number_add_result = mysqli_query($conn, $number_add_query);

    if($number_add_result){
      $success++;
    }
  }

  echo "<script>
          alert($array_count+'개 중 '+$success+'개 저장 성공');
          window.opener.location.reload();
          window.close();
        </script>";
?>
