/**
 * Hide and Seek Header JavaScript
 * 
 * Script that watches for scroll events. 
 * By default this script hides the header 
 * when scrolling down.
 */

// Define the globals.
var lastScrollTop = 0;

// Define the constants.
const HEADERCLASS = '.fusion-header';
const TOGGLECLASS = 'hideandseek-hide-down';

// Detect the scroll.
window.addEventListener(
  "scroll",
  function() {
    let st = window.pageYOffset || document.documentElement.scrollTop; 
    // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
    if (st > lastScrollTop) {
      document.querySelector(HEADERCLASS).classList.add(TOGGLECLASS);
    } else {
      document.querySelector(HEADERCLASS).classList.remove(TOGGLECLASS);
    }
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  },
  false
);
