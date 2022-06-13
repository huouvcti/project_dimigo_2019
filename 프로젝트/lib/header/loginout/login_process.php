<meta charset="utf-8">
<?php
$conn = mysqli_connect('localhost','root','nagyeong01','musical');
@session_start();


$id = $_POST['id'];
$password = $_POST['pw'];

$id_check = "SELECT * FROM account WHERE id='$id';";
$id_check_result = mysqli_query($conn, $id_check);
$array = mysqli_fetch_array($id_check_result);
$password_hash = $array['pw'];

$url = $_POST["url"];

// echo mysqli_error($conn);
// print_r($array);

if(mysqli_num_rows($id_check_result) == 0){
  echo "<script>
          confirm(\"아이디를 확인해주세요\");
          window.history.back();
        </script>";
} else{
  if (password_verify($password, $password_hash)) {
      $_SESSION['userId'] = $id;
      echo "<script>
              window.location.href = '$url';
            </script>";
  } else {
    echo "<script>
            confirm(\"비밀번호 불일치\");
            window.history.back();
          </script>";
  }
}

?>
