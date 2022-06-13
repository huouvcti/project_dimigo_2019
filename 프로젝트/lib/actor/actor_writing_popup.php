<head>
  <style>
    h1{
      margin: 3%;
    }
    .left{
      width: 50%;
      float: left;
      overflow: hidden;
      margin-left: 3%;
    }
    .actor_writing #holder{
      display: inline-block;
      width: 400px;
      height: 500px;
      margin: 0 auto;
      border: 1px solid #000;

    }
    .actor_writing #img_input{
      width: 230px;
    }
    p{
      display: inline-block;
      width: 43%;
      height: 50px;
      font-size: 20px;
    }
    .actor_writing input[type="text"],
    .actor_writing input[type="date"],
    #debut_date{
      display: inline-block;
      width: 60%;
      height: 100%;
      float: right;
      margin-bottom: 30px;
      font-family: "맑은 고딕";
      font-size: 1em;
    }
    .actor_writing select{
      font-family: "맑은 고딕";
      font-size: 1em;
      overflow: hidden;
    }

    .actor_writing input[type="submit"]{
      position: relative;
      border: 0;
      background-color: #000;
      color: #fff;
      font-family: "맑은 고딕";
      width: 94%;
      font-size: 1.2em;
      padding: 20px 40px;
      left: 3%;
    }

  </style>
</head>


<div class="actor_writing">
  <h1>배우 추가하기</h1>
  <form action="actor_writing_process.php" method="post" enctype="multipart/form-data">
    <div class="left">
      <div id='holder'></div><br>
      <p id="img_input"><input type='file' name='img' accept='image/*' id="inputImg" required></p>
    </div>
    <p>이름 <input type="text" name="name" max="50" required></p>
    <p>출생 <input type="date" name="birth" max="9999-12-31" required></p>
    <p>데뷔
      <span id="debut_date" style="margin-bottom: 0px;">
        <select name="debut_year" style="width: 30%;">
          <option value="0000" checked style="color:gray; font-size:0.8em">X</option>
          <?php
            for($i=2019; $i>=1950; $i--){
              echo "<option value='$i'>$i</option>";
            }
          ?>
        </select>년
        <select name="debut_month" style="width:18%;">
          <option value="00" checked style="color:gray; font-size:0.8em">X</option>
          <?php
            for($i=1; $i<=12; $i++){
              echo "<option value='$i'>$i</option>";
            }
          ?>
        </select>월
        <select name="debut_day" style="width:18%;">
          <option value="00" checked style="color:gray; font-size:0.8em">X</option>
          <?php
            for($i=1; $i<=31; $i++){
              echo "<option value='$i'>$i</option>";
            }
          ?>
        </select>일
      </span>
            <input type="text" name="debut" max="200" placeholder="데뷔 작품">
    </p>
    <input type="submit" value="저장">
  </form>
</div>


<script> //이미지 미리보기
    var upload = document.getElementById('inputImg'),
        holder = document.getElementById('holder');
    upload.onchange = function (e) {
      e.preventDefault();

      var file = upload.files[0],
          reader = new FileReader();
      reader.onload = function (event) {
        var img = new Image();
        img.src = event.target.result;

        holder.innerHTML = '';
        holder.appendChild(img);
      };
      reader.readAsDataURL(file);
      return false;
    };
</script>
