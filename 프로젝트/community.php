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
      margin: 50px 5% 50px 5%;
      padding: 50px 5%;
      background-color: #f5f5f5;
    }
    .community_h1{
      font-size: 2em;
      text-align: center;
    }
    .location{
      text-align: right;
    }
    hr{
      border: 0.5px solid #000;
    }


    #list{
      width: 100%;
      text-align: center;
      border-collapse: collapse;
      border: 1px solid #fff;
    }

    #list th{
      background-color: #222;
      color: #fff;
      padding: 30px;

    }
    #list td{
      padding: 30px;
      background-color: #fff;
      border: 0;
      border-bottom: 2px solid #eee;
    }
    #list .list_no,#list .list_writer,
    #list .list_time,#list .list_like,
    #list .list_comment{
      width: 10%;
    }
    #list .list_title{
      width: 50%;
    }
    #list td a{
      text-decoration: none;
      color: #000;
    }

    #page{
      width: 100%;
      text-align: center;
    }
    #page a{
      display: inline-block;
      text-decoration: none;
      color: #000;
      background-color: #fff;
      font-size: 1.5em;
      padding: 10px 18px;
      text-align: center;
      transition: 0.3s;
    }
    #page a:hover{
      background-color: #ccc;
    }
    #search{
      width: 70%;
      height: 50px;
      margin: 30px 15% 0 15%;
    }
    #search select{
      width: 15%;
      height: 100%;
      font-size: 1em;
    }
    #search input[type="text"]{
      position: relative;
      width: 70%;
      height: 100%;
      padding: 0;
      border: 0;
      border-bottom: 1px solid gray;
      background-color: transparent;
      text-align: center;
      font-size: 1.2em;
      transition: 0.3s;
    }
    #search input[type="submit"]{
      width: 10%;
      height: 100%;
      font-size: 1em;
      padding: 1px;
      border:0;
      background-color: #222;
      color: #fff;
      transition: 0.3s;
      cursor: pointer;
    }

    #search select:focus,
    #search input[type="text"]:focus,
    #search input[type="submit"]:focus{
      outline: none;
    }
    #search input[type="text"]:focus{
      background-color: #fff;
    }
    #search input[type="submit"]:hover{
      background-color: #ccc;
    }

  </style>
</head>

<?php
  $conn = mysqli_connect('localhost','root','nagyeong01','musical');
  @session_start();
  $id = $_SESSION["userId"];
?>

<script>
  function writing_onclick(id){
    if(id == null || id.length == 0){
      alert("로그인이 필요합니다");
    } else{
      window.location.href = 'http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/community/community_writing.php';
    }
  }
</script>

<section>
  <h1 class="community_h1">커뮤니티</h1>
  <p class="location">MUSICAL > <b>커뮤니티</b></p>
  <hr>

  <?php
    echo "<a href='javascript:void(0);' onclick='writing_onclick(\"$id\");'>글 작성하기</a>";
  ?>

  <table id="list" border="1">
    <tr>
      <th class="list_no">NO</th>
      <th class="list_title">제목</th>
      <th class="list_name">작성자</th>
      <th class="list_time">작성 시간</th>
      <th class="list_like">♥</th>
      <th class="list_comment">댓글</th>
    </tr>


    <?php
      $cont = 15; //한페이지에 보여질 개수

      $page = $_GET['page'];

      if($page == null){
        $page = 1;
      }

      $conn = mysqli_connect('localhost','root','nagyeong01','musical');

      $community = "SELECT community_key,title,name,update_time FROM community LEFT JOIN account ON community.id = account.id ";

      $select = $_POST['search_select'];
      $search_text = $_POST['search_text'];

      switch ($select) {
        case 'titleContent' : $add = "WHERE title LIKE '%$search_text%' OR content LIKE '%$search_text%' ORDER BY update_time DESC";
        break;
        case 'title' : $add = "WHERE title LIKE '%$search_text%' ORDER BY update_time DESC";
        break;
        case 'contents' : $add = "WHERE content LIKE '%$search_text%' ORDER BY update_time DESC";
        break;
        case 'writer': $add = "WHERE name LIKE '%$search_text%' ORDER BY update_time DESC";
        break;
        default : $add = "ORDER BY update_time DESC";
        break;
      }

      $limit = " LIMIT ".(($page*$cont)-$cont).",$cont;";
      $community_result_page = mysqli_query($conn, $community.$add.$limit);

      $community_result = mysqli_query($conn, $community.$add);
      $num = mysqli_num_rows($community_result);
      $page_num = floor($num/$cont)+1;


      if($page<1 || $page > $page_num){
        echo "<script>
                alert('존재하지 않는 페이지입니다.');
                history.back();
              </script>";

      }

      if($page == $page_num){
        $f = $num%$cont;
      }else{
        $f = $cont;
      }

      for($i=0; $i<$f; $i++){
        $community_array[$i] = mysqli_fetch_array($community_result_page);
      }
      for($i=0; $i<$f; $i++){
        $community_key[$i] = $community_array[$i]['community_key'];
        $title[$i] = $community_array[$i]['title'];
        $writer[$i] = $community_array[$i]['name'];

        // $activity_board_like = "SELECT * from activity_board_like WHERE `key`=$key[$i]";
        // $activity_board_like_result = mysqli_query($conn, $activity_board_like);
        // $like_count = mysqli_num_rows($activity_board_like_result);

        $today = date("Y-m-d");
        $timeformat[$i] = date("Y-m-d", strtotime($community_array[$i]['update_time']));
        if($timeformat[$i] >= $today){
          $time[] = date("H:i", strtotime($community_array[$i]['update_time']));
        } else{
          $time[] = date("Y-m-d", strtotime($community_array[$i]['update_time']));
        }

        echo "<tr>
                <td class='list_no'>$community_key[$i]</td>
                <td class='list_title'><a href='lib/community/community_key.php?community_key=$community_key[$i]'>".stripslashes($title[$i])."</a></td>
                <td class='list_writer'><a href='#'>$writer[$i]</a></td>
                <td class='list_time'>$time[$i]</td>
                <td class='list_like'></td>
                <td class='list_comment'></td>
              </tr>";
      }

      // <td class='list_like'>$like_count</td>
      // <td class='list_comment'>$comment_count</td>


    ?>
  </table>

  <br>
  <?php
    echo "<div id='page'>
            <a href='?page=1' id='first'><<</a>
            <a href='?page=".($page-5)."' id='left'><</a>
            <a href='?page=".($page-2)."' id='A'>".($page-2)."</a>
            <a href='?page=".($page-1)."' id='B'>".($page-1)."</a>
            <a href='?page=$page' id='C' style='background-color:#222; color:#fff; font-weight:bold;'>$page</a>
            <a href='?page=".($page+1)."' id='D'>".($page+1)."</a>
            <a href='?page=".($page+2)."' id='E'>".($page+2)."</a>
            <a href='?page=".($page+5)."' id='right'>></a>
            <a href='?page=$page_num' id='last'>>></a>
          </div>";
  ?>



  <?php    //페이지 view 조건
    if($page-2 < $page_num){
      "<script>document.getElementById('A').style.display = 'none';</script>";
    }
    if($page-1 < $page_num){
      "<script>document.getElementById('B').style.display = 'none';</script>";
    }
    if($page+1 < $page_num){
      "<script>document.getElementById('D').style.display = 'none';</script>";
    }
    if($page+2 < $page_num){
      "<script>document.getElementById('E').style.display = 'none';</script>";
    }

    if($page < 4 ){
      echo "<script>
              document.getElementById('left').style.display = 'none';;
              document.getElementById('first').style.display = 'none';;
            </script>";
      if($page == 1){
        echo "<script>

                document.getElementById('A').style.display = 'none';
                document.getElementById('B').style.display = 'none';
              </script>";
      } else if($page == 2){
        echo "<script>
                document.getElementById('left').style.display = 'none';
                document.getElementById('A').style.display = 'none';
              </script>";
      }
    }
    if($page > $page_num-3){
      echo "<script>
              document.getElementById('right').style.display = 'none';
              document.getElementById('last').style.display = 'none';
            </script>";
      if($page == $page_num){
        echo "<script>
                document.getElementById('D').style.display = 'none';
                document.getElementById('E').style.display = 'none';
              </script>";
      } else if($page == $page_num-1){
        echo "<script>
                document.getElementById('right').style.display = 'none';
                document.getElementById('E').style.display = 'none';
              </script>";
      }
    }
    if($page-5 < 1){
      echo "<script>document.getElementById('left').style.display = 'none';</script>";
    }
    if($page+5 < $page_num){
      echo "<script>document.getElementById('left').style.display = 'none';</script>";
    }

  ?>



  <br>

  <form action="?page=1" method="post" id="search">
    <select name='search_select'>
      <option value='titleContent'>제목 + 내용</option>
      <option value='title'>제목</option>
      <option value='contents'>내용</option>
      <option value='writer'>작성자</option>
    </select>
    <?php
      echo "<input type='text' name='search_text' value='$search_text'>";
    ?>
    <input type="submit" value="검색하기">
  </form>

  <?php
    switch ($select) {
      case 'titleContent' :
        echo "<script>
                document.getElementsByName('search_select')[0].getElementsByTagName('option')[0].selected = 'true';
              </script>";
      break;
      case 'title' :
        echo "<script>
                document.getElementsByName('search_select')[0].getElementsByTagName('option')[1].selected = 'true';
              </script>";
      break;
      case 'contents' :
        echo "<script>
                document.getElementsByName('search_select')[0].getElementsByTagName('option')[2].selected = 'true';
              </script>";
      break;
      case 'writer':
        echo "<script>
                document.getElementsByName('search_select')[0].getElementsByTagName('option')[1].selected = 'true';
              </script>";
      break;
      default :
        echo "<script>
                document.getElementsByName('search_select')[0].getElementsByTagName('option')[0].selected = 'true';
              </script>";
      break;
    }
  ?>

</section>


<?php
  require_once('lib/footer.php');
?>
