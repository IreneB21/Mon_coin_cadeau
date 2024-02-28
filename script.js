/*window.scroll({
    top: 100,
    behavior: "smooth",
  });*/

const btn = document.getElementById("controlMenu");

btn.addEventListener('change', function(event) {
  console.log('itadakimasu');
  if (event.target.checked) {
    document.getElementById("main-nav").style.left = '-220px';
    document.getElementById("openMenu").style.opacity = '1';
    document.getElementById("closeMenu").style.opacity = '0';
  } else {
    document.getElementById("main-nav").style.left = '0px';
    document.getElementById("openMenu").style.opacity = '0';
    document.getElementById("closeMenu").style.opacity = '1';
  }
});

const bulle = document.getElementById("bulle-trente-sept");

bulle.addEventListener('mouseover', function(event) {
  document.getElementById('sat-un').setAttribute('style','left:164px;top:32px');
  document.getElementById('sat-deux').setAttribute('style','left:240px;top:100px');
  document.getElementById('sat-trois').setAttribute('style','left:300px;top:332px');
  document.getElementById('sat-quatre').setAttribute('style','left:56px;top:732px');
  document.getElementById('sat-cinq').setAttribute('style','left:148px;top:540px');
});

bulle.addEventListener('mouseout', (event) =>{
  //document.getElementsByClassName('bulle.trente-sept-satellites').setAttribute('style','left:48px;top:132px');
  document.getElementById('sat-un').setAttribute('style','left:48px;top:132px');
  document.getElementById('sat-deux').setAttribute('style','left:48px;top:132px');
  document.getElementById('sat-trois').setAttribute('style','left:48px;top:132px');
  document.getElementById('sat-quatre').setAttribute('style','left:48px;top:132px');
  document.getElementById('sat-cinq').setAttribute('style','left:48px;top:132px');
});