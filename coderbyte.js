"use strict"


function LongestWord(sen) {
  
    sen = sen.trim();
    sen = sen.replace(/[^a-zA-Zsd]/g, '');
    
    var arr = sen.split(' ');
    
    arr.sort(function(a, b) {return b.length - a.length});
    
    return arr.shift();
  
    // code goes here  
    return sen; 
           
  }
     
  // keep this function call here 
  // to see how to enter arguments in JavaScript scroll down
  LongestWord(readline());

/********************************************************************************************* */

function FirstReverse(str) { 

    var arr = str.split('');
    arr.reverse();
    return arr.join('');         
  }
     
  // keep this function call here 
  // to see how to enter arguments in JavaScript scroll down
  FirstReverse(readline());


/********************************************************************************************************** */

function FirstFactorial(num) { 

    let factorial = 1; 
    
    for (let i = 1; i <= num; i++) {
        factorial *= i;  
    } 
 
 
  return factorial; 
         
}
   
// keep this function call here 
FirstFactorial(readline());


/*********************************************************************************************************************** */

Sudoku Quadrant Checker 


/*************************************************************************************************************************/
function LetterChanges(str) {
  
    str = str.trim().toLowerCase();
    var len = str.length;
    var newStr = '';
    
    for (var i = 0; i < len; i++) {
      if (/[a-ce-gi-mo-su-y]/.test(str[i])) {
        newStr += String.fromCharCode(((str[i].charCodeAt(0) - 18) % 26) + 97)    
      }
      else if (/[zdhnt]/.test(str[i])) {
          newStr += String.fromCharCode(((str[i].charCodeAt(0) - 18) % 26) + 65);
      }
      else {
       newStr += str[i]; 
      }
    }
    return newStr; 
           
  }
     
  // keep this function call here 
  // to see how to enter arguments in JavaScript scroll down
  LetterChanges(readline());

  /*************************************************************************************/

/* 1ère lettre en majuscule */





