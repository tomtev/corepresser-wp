;(function(document, window, index) {
  'use strict';

  var elSelector = '.header',
  element = document.querySelector(elSelector);
  var wrapper = document.getElementById("wrapper");

  if (!element) return true;

  var elHeight = 0,
    elTop = 0,
    dHeight = 0,
    wHeight = 0,
    wScrollCurrent = 0,
    wScrollBefore = 0,
    wScrollDiff = 0;

  window.addEventListener('scroll', function() {
    elHeight = element.offsetHeight;
    dHeight = document.body.offsetHeight;
    wHeight = window.innerHeight;
    wScrollCurrent = window.pageYOffset;
    wScrollDiff = wScrollBefore - wScrollCurrent;

    if (wScrollCurrent <= 0) {
      element.classList.remove("stuck");
      wrapper.setAttribute("style", "margin-top: 0px");      
    } else if (wScrollCurrent <= elHeight) {
      element.classList.remove("stuck--move-up");
      element.classList.remove("stuck--move-down");
    }
    else if (wScrollDiff > 0 && !element.classList.contains('stuck--move-down')) {
      element.classList.add("stuck");
      if(!element.classList.contains('is-transparent')) {
        wrapper.setAttribute("style", "margin-top: " + elHeight + 'px');      
      }
      element.classList.remove("stuck--move-up");
      element.classList.add("stuck--move-down");
    }

    else if (wScrollDiff < 0 && !element.classList.contains('stuck--move-up')) {
      if(!element.classList.contains('toggled')) {
        element.classList.remove("stuck--move-down");
        element.classList.add("stuck--move-up");
      }
    }

    wScrollBefore = wScrollCurrent;
  });

}(document, window, 0));
