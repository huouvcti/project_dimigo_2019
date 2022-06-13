<head>

  <style>
    .scroll{
      position: fixed;
      z-index: 1000;
      bottom: 0;
      right: 0;
      margin: 50px;
      background-color: #555555;
      border-radius: 50%;
      padding: 10px;
      opacity: 0;
      transition: 0.5s;
    }
    .scroll img{
      position: relative;
      color: #fff;
      font-size: 500px;
      width: 50px;
      height: 50px;

    }
  </style>
</head>


<div class="scroll">
  <a href="#"><img src="http://127.0.0.1:81/웹프로그래밍/프로젝트/images/top.png"></a>
</div>


<!-- 스크롤 부드럽게 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $(function(){
      $('.scroll').click(function(){
        $('body,html').animate({
          scrollTop: 0
        }, 500);
        return false;
      });
    });
  });
</script>

<!-- 상단에서 없애기 -->
<script>
window.addEventListener('scroll', event =>  {
  if(window.scrollY > 100){
    document.getElementsByClassName("scroll")[0].style.opacity= "1";
  } else{
    document.getElementsByClassName("scroll")[0].style.opacity = "0";
  }
});

</script>
