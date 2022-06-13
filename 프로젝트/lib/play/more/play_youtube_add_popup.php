<head>
  <style>
    .play_youtube_add{
      width: 90%;
      margin: 0 5%;
    }
    p{
      font-size: 2em;
      margin: 20px 5px;
      padding: 0;
    }
    select{
      padding: 10px;
      font-size: 0.5em;
      border: 0;
    }
    select:focus{
      outline: 0;
    }

    .scroll{
      height: 150px;
      overflow: scroll;
    }

    .play_youtube_input_wrap{
      position: relative;
      width: 100%;
    }

    input[type="text"]{
      padding: 10px;
      margin: 5px;
      font-size: 1em;
      margin-bottom: 10px;
      border: 0;
      border-bottom: 1px solid gray;
      transition: 0.3s;
    }
    input[type="text"]:focus{
      outline: none;
      border-bottom: 2px solid #000;
    }
    #delete_btn{
      padding: 10px 0px;
      font-size: 1em;
      margin-left: 10px;
      background-color: gray;
      color: #fff;
      border:0;
      cursor: pointer;
    }
    #delete_btn:hover{
      background-color: #ccc;
    }

    #add_btn{
      padding: 10px 0px;
      display: block;
      width: 10%;
      margin: 20px auto;
      font-size: 1em;
      background-color: #fff;
      border: 1px solid gray;
      color: gray;
      cursor: pointer;
    }

    #add_submit{
      background-color: #000;
      color: #fff;
      border: 0;
      font-size: 1em;
      padding: 10px 0;
      width: 100%;
    }
    #add_submit:hover{
      background-color: gray;
    }
  </style>
</head>

<?php
  $play_key = $_GET["play_key"];

  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  if($play_key != null || $play_key.length != 0){
    $play_key_query = "SELECT play_key, title FROM play WHERE play_key='$play_key';";
  } else{
    $play_key_query = "SELECT play_key, title FROM play;";
  }
  $play_key_result = mysqli_query($conn, $play_key_query);
  $num = mysqli_num_rows($play_key_result);
?>

<script>
  var count = 0;
  function play_youtube_add(){
    count++;
    var div = document.createElement("div");
    div.innerHTML = document.getElementById("play_youtube_input").innerHTML;
    div.getElementsByTagName("input")[0].name = "play_youtube_title"+count;
    div.getElementsByTagName("input")[1].name = "play_youtube_link"+count;
    div.getElementsByTagName("input")[0].required = true;
    div.getElementsByTagName("input")[1].required = true;
    document.getElementsByClassName("play_youtube_input_wrap")[0].appendChild(div);

    document.getElementsByName("count")[0].value = count;
  }
  function play_youtube_delete(obj){
    document.getElementsByClassName("play_youtube_input_wrap")[0].removeChild(obj.parentNode);
  }
</script>

<?php

?>

<form class="play_youtube_add" action="play_youtube_add_process.php" method="POST">
  <p>
    연극
    <select name="play_key" required>
      <option disabled>선택</option>
      <?php
        for($i=0; $i < $num; $i++){
          $play_array[$i] = mysqli_fetch_array($play_key_result);
          $play_key = $play_array[$i]['play_key'];
          $title = $play_array[$i]['title'];
          echo "<option value='$play_key'>$title</option>";
        }
      ?>
    </select>
  </p>

  <br>

  <div class="scroll">
    <div class="play_youtube_input_wrap">
      <div id="play_youtube_input" style="display:none;">
        <input type="text" name="play_youtube_title" maxlength="200" style="width: 40%;" placeholder="제목">
        <input type="text" name="play_youtube_link"placeholder="유튜브 링크" style="width: 45%">
        <button type="button" id="delete_btn" style="width: 8%" onclick="play_youtube_delete(this);">삭제</button>
      </div>
    </div>
    <button type="button" id="add_btn" onclick="play_youtube_add();">추가</button>
  </div>

  <input type="hidden" name="count" value="">

  <input type="submit" value="저장하기" id="add_submit">

  <script>
    for(var i=0; i < 1; i++){
      play_youtube_add();
    }
  </script>
</form>
