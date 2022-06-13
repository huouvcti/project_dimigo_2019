<head>
  <style>
    .number_add{
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
      height: 360px;
      overflow: scroll;
    }

    .number_input_wrap{
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
  $musical_key = $_GET["musical_key"];

  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  if($musical_key != null || $musical_key.length != 0){
    $musical_key_query = "SELECT musical_key, title FROM musical WHERE musical_key='$musical_key';";
  } else{
    $musical_key_query = "SELECT musical_key, title FROM musical;";
  }
  $musical_key_result = mysqli_query($conn, $musical_key_query);
  $num = mysqli_num_rows($musical_key_result);
?>

<script>
  var count = 0;
  function number_add(){
    count++;
    var div = document.createElement("div");
    div.innerHTML = document.getElementById("number_input").innerHTML;
    div.getElementsByTagName("input")[0].name = "number_no"+count;
    div.getElementsByTagName("input")[1].name = "number_title"+count;
    div.getElementsByTagName("input")[2].name = "number_role"+count;
    div.getElementsByTagName("input")[0].required = true;
    div.getElementsByTagName("input")[1].required = true;
    div.getElementsByTagName("input")[2].required = true;
    document.getElementsByClassName("number_input_wrap")[0].appendChild(div);

    document.getElementsByName("count")[0].value = count;
  }
  function number_delete(obj){
    document.getElementsByClassName("number_input_wrap")[0].removeChild(obj.parentNode);
  }
</script>

<?php

?>

<form class="number_add" action="musical_number_add_process.php" method="POST">
  <p>
    뮤지컬
    <select name="musical_key" required>
      <option disabled>선택</option>
      <?php
        for($i=0; $i < $num; $i++){
          $musical_array[$i] = mysqli_fetch_array($musical_key_result);
          $musical_key = $musical_array[$i]['musical_key'];
          $title = $musical_array[$i]['title'];
          echo "<option value='$musical_key'>$title</option>";
        }
      ?>
    </select>
  </p>

  <br>

  <div class="scroll">
    <div class="number_input_wrap">
      <div id="number_input" style="display:none;">
        <input type="text" name="number_no" maxlength="5" style="width: 8%; border:0;" placeholder="-막 -">
        <input type="text" name="number_title"placeholder="제목" style="width: 55%">
        <input type="text" name="number_role" placeholder="배역" style="width: 20%">
        <button type="button" id="delete_btn" style="width: 8%" onclick="number_delete(this);">삭제</button>
      </div>
    </div>
    <button type="button" id="add_btn" onclick="number_add();">추가</button>
  </div>

  <input type="hidden" name="count" value="">

  <input type="submit" value="저장하기" id="add_submit">

  <script>
    for(var i=0; i < 5; i++){
      number_add();
    }
  </script>
</form>
