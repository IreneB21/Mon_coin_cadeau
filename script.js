// Affichage sidebar menu

const btn = document.getElementById("controlMenu");

btn.addEventListener('change', function(event) {
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

// Animation bulle espace personnel

const bulle = document.getElementById("bulle-trente-sept");

if (bulle !== null) {
  bulle.addEventListener('mouseover', function(event) {
    document.getElementById('sat-un').setAttribute('style','left:164px;top:32px');
    document.getElementById('sat-deux').setAttribute('style','left:240px;top:100px');
    document.getElementById('sat-trois').setAttribute('style','left:300px;top:332px');
    document.getElementById('sat-quatre').setAttribute('style','left:56px;top:732px');
    document.getElementById('sat-cinq').setAttribute('style','left:148px;top:540px');
  });
  
  bulle.addEventListener('mouseout', (event) => {
    //document.getElementsByClassName('bulle.trente-sept-satellites').setAttribute('style','left:48px;top:132px');
    document.getElementById('sat-un').setAttribute('style','left:48px;top:132px');
    document.getElementById('sat-deux').setAttribute('style','left:48px;top:132px');
    document.getElementById('sat-trois').setAttribute('style','left:48px;top:132px');
    document.getElementById('sat-quatre').setAttribute('style','left:48px;top:132px');
    document.getElementById('sat-cinq').setAttribute('style','left:48px;top:132px');
  });
}

// Affichage box création items (page création liste)

const createItemIcon = document.getElementById('add-new-item');

if (createItemIcon !== null) {
  createItemIcon.addEventListener('click', function() {
    document.getElementById('box-creation-list-elements').setAttribute('style','display:flex;flex-direction:column;align-items:center');
  });
}
 
// Affichage items d'une liste (espace personnel)

//let displayItems = document.getElementById('controlDisplayItems');

/*if (displayItems !== null) {
  displayItems.addEventListener('change', function(event) {
    if (event.target.checked) {
      document.getElementById('display-items').setAttribute('style','display:none');
      document.getElementById('see-more').style.display = 'flex';
      document.getElementById('see-less').style.display = 'none';
    } else {
      document.getElementById('display-items').setAttribute('style','display:grid;grid-template-columns:1fr 1fr 1fr 1fr;grid-gap:10px;margin-top:24px');
      document.getElementById('see-more').style.display = 'none';
      document.getElementById('see-less').style.display = 'flex';
    }
  });
}*/

let displayItems = document.querySelectorAll('#controlDisplayItems');

if (displayItems !== null) {
  displayItems.forEach(function(displayItem) {
    displayItem.addEventListener('change', function(event) {
      if (event.target.checked) {
        document. ('display-items').setAttribute('style','display:none');
        document.getElementById('see-more').style.display = 'flex';
        document.getElementById('see-less').style.display = 'none';
      } else {
        document.getElementById('display-items').setAttribute('style','display:grid;grid-template-columns:1fr 1fr 1fr 1fr;grid-gap:10px;margin-top:24px');
        document.getElementById('see-more').style.display = 'none';
        document.getElementById('see-less').style.display = 'flex';
      }
    });
  });
}

// Scroll vers différente section

const target = document.getElementById('explanations-part');
const button = document.getElementById('scroll-to-explanations');

if (target !== null) {
  button.addEventListener('click', function(){
    target.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'nearest'
    });
  });
}

const target2 = document.getElementById('lists-part');
const button2 = document.getElementById('scroll-to-lists');

if (target2 !== null) {
  button2.addEventListener('click', function(){
    target2.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'nearest'
    });
  });
}
