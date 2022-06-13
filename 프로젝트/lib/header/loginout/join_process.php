<?php

$conn = mysqli_connect('localhost','root','nagyeong01','musical');


$id = $_POST['id'];
$password = $_POST['pw'];
$passwordC = $_POST['pwc'];
$name = $_POST['name'];
$email = $_POST['email'];

$id_check = "SELECT * FROM account WHERE id='$id';";
$id_check_result = mysqli_query($conn, $id_check);
if($id_check_result->num_rows==1){
  echo "<script>
          confirm(\"아이디 중복\");
          window.history.back();
        </script>";
}else{
  if($password != $passwordC){
    echo "<script>
            confirm(\"비밀번호 불일치\");
            window.history.back();
          </script>";
  }else{
    $password_hash = password_hash($password , PASSWORD_DEFAULT);

    $join = mysqli_query($conn, "INSERT INTO account (id, pw, name, email)
                VALUE('$id', '$password_hash', '$name', '$email')");
    if($join){
      echo "<script>
              confirm(\"회원가입 완료! 환영합니다~\");
              window.history.back();
            </script>";
    } else{
      echo "<script>
              confirm(\"회원가입 실패\");
              window.history.back();
            </script>";
    }
  }
}

?>
