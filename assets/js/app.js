"use strict"; 



//personFrame.onclick('');


window.addEventListener('DOMContentLoaded', function(vote) {                 ///// TRES IMPORTANTE
  const personFrame = document.getElementsByClassName('personFrame');
  //personFrame.classList.remove("personFrame");
  const myConnexion = document.getElementById("connexion");
  myConnexion.addEventListener('click', function()
      {
          myConnexion.innerHTML = "JE SUIS CONNECTE !";
      }
  )

})




/**
 * Script de MDN Checkbox permet d'additionner les sélections
 */


/****************** SCRIPT DE MDN https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/checkbox 
  var overall = document.querySelector('input[id="EnchTbl"]');
  var ingredients = document.querySelectorAll('ul input');

  overall.addEventListener('click', function(e) {
    e.preventDefault();
  });

  for(var i = 0; i < ingredients.length; i++) {
    ingredients[i].addEventListener('click', updateDisplay);
  }

  function updateDisplay() {
    var checkedCount = 0;
    for(var i = 0; i < ingredients.length; i++) {
      if(ingredients[i].checked) {
        checkedCount++;
      }
    }

    if(checkedCount === 0) {
      overall.checked = false;
      overall.indeterminate = false;
    } else if(checkedCount === ingredients.length) {
      overall.checked = true;
      overall.indeterminate = false;
    } else {
      overall.checked = false;
      overall.indeterminate = true;
    }
  }

****************************************/