<!-- css -->
<head>
  <style media="screen">
    #loginoutbtn{
      position: absolute;
      z-index: 100;
    }

    .login, .join{
      position: fixed;
      background: rgba(0, 0, 0, 0.5);
      top:0;
      right: 0;
      width: 100%;
      height: 100%;
      z-index: 100;
      display: none;
    }

    .login .login-container{
      position: relative;
      background-color: #Fff;
      width: 40vh;
      height: 50vh;
      margin: 5% auto auto auto;
      padding: 20px;
    }
    .join .join-container{
      position: relative;
      background-color: #Fff;
      width: 40vh;
      height: 60vh;
      margin: 5% auto auto auto;
      padding: 20px;
    }
    .join .join-input{
      height: 35vh;
      overflow: scroll;
    }

    .login #login-close, .join #join-close{
      position: absolute;
      top: 0;
      right: 15px;
      display: block;
      font-size: 3em;
      z-index: 102;
      cursor: pointer;
    }
    .login #login-close:hover, .join #join-close:hover{
      color: #f00;
    }
    .login h1, .join h1{
      position: relative;
      text-align: center;
      z-index: 101;
      font-size: 3.5em;
    }

    .login label, .join label{
      display: block;
      margin-bottom: 20px;
    }

    .login input[type=text], .login input[type=password],
    .join input[type=text], .join input[type=password],
    .join input[type=email] {
      display: block;
      width: 100%;
      padding: 15px 20px;
      margin: 8px 0px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .login input[type=submit], .join input[type=submit]{
      width: 100%;
      padding: 20px 20px;
      margin-top: 30px;
      background: #000;
      border: 0;
      color: #fff;
      font-size: 1.2em;
      font-weight: bold;
      cursor: pointer;
    }

    .login input[type=submit]:hover, .login button:hover,
    .join input[type=submit]:hover, .join button:hover {
      opacity: 0.5;
    }

     .login button, join button{
      position: absolute;
      right: 2vh;
      bottom: 1.7vh;
      background: 0;
      border: 0;
      font-family: sans-serif;
      font-size: 1em;
      font-weight: bold;
      color: #000;
      cursor: pointer;
    }

  </style>
</head>

<!-- ????????? -->
<div class="login">
  <div class="login-container">
    <div class="login-header">
      <span id="login-close">&times;</span>
      <h1>?????????</h1>
    </div>
    <form action="http://127.0.0.1:81/??????????????????/????????????/lib/header/loginout/login_process.php" method="post">
      <label for="id"><b>?????????</b></label>
      <input type="text" placeholder="????????? ??????" name="id" required>
      <br>
      <label for="pw"><b>????????????</b></label>
      <input type="password" placeholder="???????????? ??????" name="pw" required>
      <input type="submit" value="?????????">
      <?php echo "<input type=\"hidden\" name=\"url\" value=\"$url\">"; ?>
    </form>
    <button type="button" id="login-joinBtn">????????????</button>


  </div>
</div>

<!-- ???????????? -->
<div class="join">
  <div class="join-container">
    <div class="join-header">
      <span id="join-close">&times;</span>
      <h1>????????????</h1>
    </div>
    <form action="http://127.0.0.1:81/??????????????????/????????????/lib/header/loginout/join_process.php" method="post">
      <div class="join-input">
        <label for="id"><b>?????????</b></label>
        <input type="text" placeholder="????????? ??????" name="id" max="16" required>
        <br>
        <label for="pw"><b>????????????</b></label>
        <input type="password" placeholder="???????????? ??????" name="pw" max="100" required>
        <br>
        <label for="pwc"><b>???????????? ??????</b></label>
        <input type="password" placeholder="???????????? ??????" name="pwc" required>
        <br><br>
        <label for="name"><b>?????? ?????? ??????</b></label>
        <input type="text" placeholder="?????? ?????? ?????? ??????" name="name" max="10" required>
        <br>
        <label for="email"><b>?????????</b></label>
        <input type="email" placeholder="????????? ??????" name="email" max="30" required>
      </div>

      <input type="submit" value="????????????">
    </form>
  </div>
</div>

<script>
  window.addEventListener("DOMContentLoaded", event => {
    var login = document.getElementsByClassName("login")[0];
    var login_close = document.getElementById("login-close");
    var login_joinBtn = document.getElementById("login-joinBtn");
    var join = document.getElementsByClassName("join")[0];
    var join_close = document.getElementById("join-close");

    document.addEventListener("click", event => {
      if (event.target == login || event.target == login_close || event.target == login_joinBtn) {
          login.style.display = "none";
          if(event.target == login_joinBtn){
            join.style.display = "block";
          }
      }
      if (event.target == join || event.target == join_close) {
          join.style.display = "none";
      }
    })
  })
</script>



<!-- ????????? ?????? -->
<?php
  @session_start();
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  $id = $_SESSION["userId"];
  $id_check = "SELECT * FROM account WHERE id='$id';";
  $id_check_result = mysqli_query($conn, $id_check);
  $array = mysqli_fetch_array($id_check_result);
  $name = $array['name'];

  if($id != null) {
    echo "<script>
            var loginBtn = document.getElementById('loginBtn');
            loginBtn.innerText = '????????????';
            document.getElementById('userName').innerText = '$name';
            document.getElementsByClassName('menu_login')[0].getElementsByTagName('button')[0].type = 'submit';

            loginBtn.addEventListener('click', event => {
              document.getElementsByClassName('login')[0].style.display = 'none';
            });
          </script>";
  }
