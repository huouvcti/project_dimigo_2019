<head>
  <style>
    h1{
      margin: 3%;
    }
    .left{
      width: 30%;
      float: left;
      overflow: hidden;
      margin-left: 3%;
    }
    .play_writing #holder{
      display: inline-block;
      width: 230px;
      height: 280px;
      margin: 0 auto;
      border: 1px solid #000;
      overflow: hidden;
    }
    .play_writing #holder img{
      width: 100%;
    }
    .play_writing #img_input{
      width: 230px;
    }


    .play_writing input[type="text"], .play_writing textarea{
      display: inline-block;
      width: 64%;
      font-family: "맑은 고딕";
    }
    .play_writing input[type="text"]{
      height: 50px;
      font-size: 1.3em;
    }
    .play_writing textarea{
      font-size: 1em;
      margin-top: 20px;
      overflow-y: scroll;
      resize: none;
    }
    .play_writing select{
      font-size: 1em;
      padding: 5px;
    }
    .play_writing input[type="submit"]{
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


<div class="play_writing">
  <h1>글쓰기</h1>
  <form action="play_writing_process.php" method="post" enctype="multipart/form-data">
    <div class="left">
      <div id='holder'></div><br>
      <p id="img_input"><input type='file' name='img' accept='image/*' id="inputImg" required></p>
    </div>
    <input type="text" name="title" placeholder="제목" max="50" required>
    <textarea name="synopsis" rows="10"placeholder="시놉시스" maxlength="1500"></textarea>
    <p>연극 >
      <select name="type" required>
        <option value="" disabled selected>세부장르 선택</option>
        <option value="L">리미티드런 연극</option>
        <option value="S">스테디셀러 연극</option>
      </select>
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
