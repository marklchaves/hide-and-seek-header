/**
 * Hide and Seek Header JavaScript
 *
 * Script that watches for scroll events.
 * By default this script hides the header
 * when scrolling down.
 */

// Define the globals.
var lastScrollTop = 0;
var landingMode = php_vars.landing_mode;
var sensiSetting = php_vars.sensi_setting; // 15;
var sensiValue = 0; // Default is no sensitivity.

// Define the constants.
const HEADERELT = "header";
const HEADERCLASS = ".fusion-header";
const TOGGLECLASS = "hideandseek-hide-down";
const LANDINGCLASS = TOGGLECLASS + '__landing';
const DEFAULT_SENSITIVITY = 15; // Sweet spot for now.

function checkIfAtTop() {
  if (window.pageYOffset === 0) {
    document.querySelector(HEADERCLASS).classList.add(TOGGLECLASS);
    document.querySelector(HEADERELT).classList.add(LANDINGCLASS);
  }
}

if (landingMode == 1) {
  checkIfAtTop();
}

if (sensiSetting == 1) {
  sensiValue = DEFAULT_SENSITIVITY;
}

// Detect the scroll.
window.addEventListener(
  "scroll",
  function() {
    let st = window.pageYOffset || document.documentElement.scrollTop;
    // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
    if (st > lastScrollTop) {
      document.querySelector(HEADERCLASS).classList.add(TOGGLECLASS);
      document.querySelector(HEADERELT).classList.remove(LANDINGCLASS);
    } else {
      /**
       * Let's try to have a scroll offset to reduce 
       * the sensitivity of the header reappearing. 
       * 
       * But, always show the menu when scrolled to top
       * of the page.
       */
      if (((lastScrollTop - st) > sensiValue) || (st == 0)) {
        document.querySelector(HEADERCLASS).classList.remove(TOGGLECLASS);
      }
    }

    if (landingMode == 1) {
      checkIfAtTop();
    }

    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  },
  false
);
