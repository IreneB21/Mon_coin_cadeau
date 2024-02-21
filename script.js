/*window.scroll({
    top: 100,
    behavior: "smooth",
  });*/

const btn = document.getElementById("controlMenu");

btn.addEventListener('change', function(event) {
  if (event.target.checked) {
    document.getElementById("main-nav").style.left = '-220px';
  } else {
    document.getElementById("main-nav").style.left = '0px';
  }
});