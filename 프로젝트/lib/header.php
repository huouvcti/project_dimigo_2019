<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MUSICAL</title>
    <style media="screen">
    body{
       min-height: 100%;
    }
    .section{
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      width: 100%;
      height: auto;
    }
    </style>
  </head>
  <body>
    <?php
      //현재 페이지 url
      $php_self=$_SERVER["PHP_SELF"];
      $url = "http://127.0.0.1:81".$php_self;
      $_SESSION["url"] = $url;
    ?>

    <?php
      require_once('header/menu.php');
      require_once('header/top.php');
    ?>

    <div class="section">
      <?php
        if($url == "http://127.0.0.1:81/웹프로그래밍/프로젝트/index.php"){
          echo "<script>
                  document.getElementsByClassName('section')[0].style.marginTop = '';
                </script>";
        } else{
          echo "<script>
                  document.getElementsByClassName('section')[0].style.marginTop = '100px';
                </script>";
        }
      ?>
