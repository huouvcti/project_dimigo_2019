<?php
  require_once('lib/header.php');
?>
<head>
  <style>
    body{
      background-color: #fff;
      color: #000;
    }
    #headerImg{
      width: 100%;
    }

    section{
      width: 80%;
      margin: 50px 10% 50px 10%;
    }
    .etc_h1{
      font-size: 2em;
      text-align: center;
    }
    .location{
      text-align: right;
    }
    hr{
      border: 0.5px solid #000;
    }

    #contents_wrap{
      width: 70%;
      margin: 5% 15%;
    }
    .content{
      position: relative;
      display: inline-block;
      width: 460px;
      height: 460px;
      margin: 30px;
      box-shadow: 5px 5px 10px #ccc;
      border-radius: 30px;
      transition: 0.3s;
      cursor: pointer;

    }
    .content p{
      width: 100%;
      height: 70px;
      font-size: 3em;
      text-align: center;
      margin: 195px 0;
    }
    .content:hover{
      background-color: #eee;
    }
  </style>
</head>


<section>
  <h1 class="etc_h1">기타</h1>
  <p class="location">MUSICAL > <b>기타</b></p>
  <hr>

  <div id="contents_wrap">
    <div class="content">
      <p>관리자 권한</p>
    </div>
    <div class="content">
      <p>&nbsp;</p>
    </div>
    <div class="content">
      <p></p>
    </div>
    <div class="content">
      <p></p>
    </div>

  </div>

</section>


<?php
  require_once('lib/footer.php');
?>
