<?php
  require_once('../header.php');
?>
<head>
  <style>
    section{
      width: 70%;
      margin: 5% 10%;
      padding: 0 5%;
      box-shadow: 5px 5px 20px #ccc;
    }
    form{
      width: 90%;
      padding: 5% 5%;
    }
    form input[type="text"]{
      width: 100%;
      border:0;

      font-size: 1.5em;
    }
    form hr{
      margin: 30px 0;
    }
    #content{
      width: 100%;
      min-height: 500px;
      font-size: 1em;
      font-family: "맑은 고딕";
      border: 0;
      margin-bottom: 30px;
    }

    form .holder_wrap{
      margin-bottom: 30px;
    }
    form .holder_wrap p{
      color: gray;
    }
    form .holder_wrap .holder{
      display: inline-block;
      width: 200px;
      height: 200px;
      margin-right: 30px;
      margin-bottom: 15px;
      overflow: hidden;
      border: 1px solid gray;
    }
    form .holder img{
      width: 100%;
      transition: 0.5s;
    }

    form input[type="file"]{
      display: block;
      margin-bottom: 15px;
    }

    form input[type="submit"]{
      background-color: #000;
      border: 0;
      padding: 30px;
      color: #fff;
      font-size: 1.3em;
      width: 100%;
      margin-top: 50px;
      cursor: pointer;
    }

  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  @session_start();

  $id = $_SESSION["userId"];

  if($id == null || strlen($id) == 0){
    echo "<script>
            alert('로그인이 필요합니다');
            window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/community.php';
          </script>";
  }
?>

<?php
  $community_key = $_GET['community_key'];

  if($community_key != null){

    $community_key_query = "SELECT title,content,img1,img2,img3,community.id,pw FROM community LEFT JOIN account ON community.id = account.id WHERE community_key=$community_key;";
    $community_key_result = mysqli_query($conn, $community_key_query);
    $community_key_array = mysqli_fetch_array($community_key_result);

    $title = $community_key_array['title'];
    $content = $community_key_array['content'];

    $img_count = 0;
    for($i=1; $i<=3; $i++){
      if($community_key_array['img'.$i] != null){
        $img[] = $community_key_array['img'.$i];
        $img_count++;
      }
    }

    $writer_id = $community_key_array['id'];
    $password_hash = $community_key_array['pw'];

  }

  else{
    $title = "";
    $contents = "";
    for($i=1; $i<=3; $i++){
      $img[$i] = "";
    }
  }
?>

<?php
  if($community_key != null){
    if($id != $writer_id){
      echo "<script>
              alert('잘못된 접근');
              window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/community.php';
            </script>";
    }
  }

?>

<section>
  <form action="community_writing_process.php" method="post" enctype="multipart/form-data">
    <?php
      echo "<input type='text' name='title' placeholder='제목' max='100' required value='$title'>
            <hr>
            <textarea name='content' id='content' placeholder='내용' required max='10000'>$content</textarea>";

      if($community_key != null){
        echo "<div class='holder_wrap'>
                <p>(이미지는 수정할 수 없습니다)</p>";
                for($i=0; $i<$img_count; $i++){
                  echo "<div class='holder'>
                          <img src='../../$img[$i]'>
                        </div>";
                }
                for($i=0; $i<3-$img_count; $i++){
                  echo "<div class='holder'>
                        </div>";
                }
        echo "</div>
              <input type='hidden' name='community_key' value='$community_key'>
              <input type='submit' value='수정하기'>";
      } else{
        echo "<div class='holder_wrap'>
                <p>(이미지는 글 하단에 순서대로 입력됩니다)</p>";
                for($i=0; $i<3; $i++){
                  echo "<div class='holder'></div>";
                }
                for($i=0; $i<3; $i++){
                  echo "<input type='file' accept='image/*' name='img$i' class='img_input'>";
                }
        echo "</div>
              <input type='hidden' name='community_key' value=''>
              <input type='submit' value='저장하기'>";
      }

    ?>


  </form>
</section>


<script> //이미지 미리보기
    var upload0 = document.getElementsByClassName('img_input')[0],
        holder0 = document.getElementsByClassName('holder')[0];
    upload0.onchange = function (e) {
      e.preventDefault();
      var file0 = upload0.files[0],
          reader0 = new FileReader();
      reader0.onload = function (event) {
        var img0 = new Image();
        img0.src = event.target.result;

        holder0.innerHTML = '';
        holder0.appendChild(img0);
      };
      reader0.readAsDataURL(file0);
      return false;

    };
</script>
<script> //이미지 미리보기
    var upload1 = document.getElementsByClassName('img_input')[1],
        holder1 = document.getElementsByClassName('holder')[1];
    upload1.onchange = function (e) {
      e.preventDefault();
      var file1 = upload1.files[0],
          reader1 = new FileReader();
      reader1.onload = function (event) {
        var img1 = new Image();
        img1.src = event.target.result;

        holder1.innerHTML = '';
        holder1.appendChild(img1);
      };
      reader1.readAsDataURL(file1);
      return false;
    };
</script>
<script> //이미지 미리보기
    var upload2 = document.getElementsByClassName('img_input')[2],
        holder2 = document.getElementsByClassName('holder')[2];
    upload2.onchange = function (e) {
      e.preventDefault();
      var file2 = upload2.files[0],
          reader2 = new FileReader();
      reader2.onload = function (event) {
        var img2 = new Image();
        img2.src = event.target.result;

        holder2.innerHTML = '';
        holder2.appendChild(img2);
      };
      reader2.readAsDataURL(file2);
      return false;
    };
</script>

<?php
  require_once('../footer.php');
?>
