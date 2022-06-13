//main_visual_slide
function main_visual (i){

  var main_visual_btnL = document.getElementsByClassName("main_visual_btn")[0].getElementsByTagName("label");
  var main_visual_img = document.getElementsByClassName("main_visual_img")[0].getElementsByTagName("img");

  //contents
  var main_visual_contents_h1 = document.getElementsByClassName("main_visual_contents")[0].getElementsByTagName("h1")[0];
  var main_visual_contents_h2 = document.getElementsByClassName("main_visual_contents")[0].getElementsByTagName("h2")[0];
  var main_visual_contents_a = document.getElementsByClassName("main_visual_contents")[0].getElementsByTagName("a");
  var more_link;
  switch (i) {
    case 0:
        h1 = "지킬 앤 하이드";
        h2 = "지금 이 순간\n다시 시작되는 신화";
        more_link = "http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/musical_key.php?musical_key=1";
        break;
    case 1:
        h1 = "라이온 킹";
        h2 = "상상조차 할 수 없는 무대가\n눈 앞에 펼쳐진다!";
        more_link = "http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/musical_key.php?musical_key=3";
        break;
    case 2:
        h1 = "안나 카레니나";
        h2 = "신이여,\n모든 것을 용서하소서!";
        more_link = "http://127.0.0.1:81/웹프로그래밍/프로젝트/lib/musical/musical_key.php?musical_key=11";
        break;
  }


  main_visual_btnL[0].style.backgroundColor = "";
  main_visual_btnL[1].style.backgroundColor = "";
  main_visual_btnL[2].style.backgroundColor = "";
  main_visual_btnL[0].style.borderRadius = "50%";
  main_visual_btnL[1].style.borderRadius = "50%";
  main_visual_btnL[2].style.borderRadius = "50%";
  main_visual_btnL[0].style.transform = "rotate(0deg)"
  main_visual_btnL[1].style.transform = "rotate(0deg)"
  main_visual_btnL[2].style.transform = "rotate(0deg)"
  main_visual_img[0].style.opacity = "0";
  main_visual_img[1].style.opacity = "0";
  main_visual_img[2].style.opacity = "0";

  main_visual_btnL[i].style.backgroundColor = "#fff";
  main_visual_btnL[i].style.borderRadius = "0%";
  main_visual_btnL[i].style.transform = "rotate(45deg)"
  main_visual_img[i].style.opacity = "1";
  main_visual_contents_h1.innerText = h1;
  main_visual_contents_h2.innerText = h2;

  //animation restart
  main_visual_contents_h1.style.animation = 'none';
  main_visual_contents_h1.offsetHeight; /* trigger reflow */
  main_visual_contents_h1.style.animation = null;
  main_visual_contents_h2.style.animation = 'none';
  main_visual_contents_h2.offsetHeight; /* trigger reflow */
  main_visual_contents_h2.style.animation = null;
  main_visual_contents_a[0].style.animation = 'none';
  main_visual_contents_a[0].offsetHeight; /* trigger reflow */
  main_visual_contents_a[0].style.animation = null;
  main_visual_contents_a[1].style.animation = 'none';
  main_visual_contents_a[1].offsetHeight; /* trigger reflow */
  main_visual_contents_a[1].style.animation = null;

  main_visual_contents_a[0].href = more_link;

}

//main_visual_slide_auto
var slideIndex = 0;
carousel();

function carousel() {
  var main_visual_img = document.getElementsByClassName("main_visual_img")[0].getElementsByTagName("img");
  for (i=0; i < main_visual_img.length; i++) {
    main_visual_img[i].style.opacity = "0";
  }
  slideIndex++;
  if (slideIndex > main_visual_img.length) {slideIndex = 1}
  main_visual_img[slideIndex-1].style.opacity = "1";
  document.getElementsByName("main_visual_btnR")[slideIndex-1].checked = true;
  main_visual(slideIndex-1);
  setTimeout(carousel, 8000);  //10s
}





//event change
main_visual(0); //기본값
document.getElementsByName("main_visual_btnR")[0].addEventListener("change", event => {
  if(document.getElementsByName("main_visual_btnR")[0].checked){
    main_visual(0);
  }
});
document.getElementsByName("main_visual_btnR")[1].addEventListener("change", event => {
  if(document.getElementsByName("main_visual_btnR")[1].checked){
    main_visual(1);
  }
});
document.getElementsByName("main_visual_btnR")[2].addEventListener("change", event => {
  if(document.getElementsByName("main_visual_btnR")[2].checked){
    main_visual(2);
  }
});
