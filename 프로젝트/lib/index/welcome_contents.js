function welcome_content_mouseover(i){
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("img")[0].style.transform = "scale(1.15)";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("div")[0].style.opacity = "0";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("h1")[0].style.transform = "translateY(-10px)";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("p")[0].style.transform = "translateY(-10px)";
}
function welcome_content_mouseleave(i){
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("img")[0].style.transform = "scale(1)";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("div")[0].style.opacity = "0.5";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("h1")[0].style.transform = "translateY(0)";
  document.getElementsByClassName("welcome_content")[i].getElementsByTagName("p")[0].style.transform = "translateY(0px)";
}
  document.getElementsByClassName("welcome_content")[0].addEventListener("mouseover", event => {
    welcome_content_mouseover(0)
  });
  document.getElementsByClassName("welcome_content")[0].addEventListener("mouseleave", event => {
    welcome_content_mouseleave(0);
  });
  document.getElementsByClassName("welcome_content")[1].addEventListener("mouseover", event => {
    welcome_content_mouseover(1);
  });
  document.getElementsByClassName("welcome_content")[1].addEventListener("mouseleave", event => {
    welcome_content_mouseleave(1);
  });
  document.getElementsByClassName("welcome_content")[2].addEventListener("mouseover", event => {
    welcome_content_mouseover(2);
  });
  document.getElementsByClassName("welcome_content")[2].addEventListener("mouseleave", event => {
    welcome_content_mouseleave(2);
  });
  document.getElementsByClassName("welcome_content")[3].addEventListener("mouseover", event => {
    welcome_content_mouseover(3);
  });
  document.getElementsByClassName("welcome_content")[3].addEventListener("mouseleave", event => {
    welcome_content_mouseleave(3);
  });
