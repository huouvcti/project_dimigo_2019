<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload">

  <input type="submit" value="submit">
</form>

<?php
   echo "confirm file information <br />";
   //겅로.파일이름
   $uploadfile = '../../images/'.$_FILES['upload']['name'];
   //move_uploaded_file(파일, 파일 옮겨질곳/파일이름)
   if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)){
    echo "파일이 업로드 되었습니다.<br />";
    echo "<img src =$uploadfile> <p>";
    echo "1. file name : $uploadfile<br />";
    echo "2. file type : $uploadfile<br />";
    echo "3. file size : $uploadfile byte <br />";
    echo "4. temporary file name : $uploadfile<br />";
   } else {
    echo "파일 업로드 실패 !! 다시 시도해주세요.<br />";
   }
?>
