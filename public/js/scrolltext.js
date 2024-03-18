$(document).ready(function() {
    var hiddenText = $('#hiddenText');
    var hiddenText2 = $('#hiddenText2');
    var hiddenText3 = $('#hiddenText3');
    var hiddenText4 = $('#hiddenText4');
    var hiddenText5 = $('#hiddenText5');
    var hiddenText6 = $('#hiddenText6');
    var hiddenText7 = $('#hiddenText7');
    var hiddenText8 = $('#hiddenText8');
    var hiddenText9 = $('#hiddenText9');
    var hiddenText10 = $('#hiddenText10');
    var hiddenText11 = $('#hiddenText11');
    var hiddenText12 = $('#hiddenText12');

    var revealPosition = 100; // Adjust as needed
    var revealPosition2 = 300; // Adjust as needed
    var revealPosition3 = 700; // Adjust as needed
    var revealPosition4 = 900; // Adjust as needed
    var revealPosition5 = 1200; // Adjust as needed
    var revealPosition6 = 1400; // Adjust as needed
    var revealPosition7 = 1900; // Adjust as needed
    var revealPosition8 = 2500; // Adjust as needed
    var revealPosition9 = 2900; // Adjust as needed
    var revealPosition10 = 3500; // Adjust as needed
    var revealPosition11 = 3700; // Adjust as needed
    var revealPosition12 = 3900; // Adjust as needed
    var isRevealed = false;
    var isRevealed2 = false;
    var isRevealed3 = false;
    var isRevealed4 = false;
    var isRevealed5 = false;
    var isRevealed6 = false;
    var isRevealed7 = false;
    var isRevealed8 = false;
    var isRevealed9 = false;
    var isRevealed10 = false;
    var isRevealed11 = false;
    var isRevealed12 = false;
    
  
    $(window).scroll(function() {
      // Check if the scroll position is beyond the reveal position and if the text is not already revealed
      if ($(this).scrollTop() >= revealPosition && !isRevealed) {
        // Animate the opacity to reveal the text
        hiddenText.stop().animate({ opacity: 1 }, 500);
        isRevealed = true;
      } else if ($(this).scrollTop() < revealPosition && isRevealed) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText.stop().animate({ opacity: 0 }, 500);
        isRevealed = false;
      }
      if ($(this).scrollTop() >= revealPosition2 && !isRevealed2) {
        // Animate the opacity to reveal the text
        hiddenText2.stop().animate({ opacity: 1 }, 900);
        isRevealed2 = true;
      } else if ($(this).scrollTop() < revealPosition2 && isRevealed2) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText2.stop().animate({ opacity: 0 }, 500);
        isRevealed2 = false;
      }

      if ($(this).scrollTop() >= revealPosition3 && !isRevealed3) {
        // Animate the opacity to reveal the text
        hiddenText3.stop().animate({ opacity: 1 }, 900);
        isRevealed3 = true;
      } else if ($(this).scrollTop() < revealPosition3 && isRevealed3) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText3.stop().animate({ opacity: 0 }, 500);
        isRevealed3 = false;
      }

      if ($(this).scrollTop() >= revealPosition4 && !isRevealed4) {
        // Animate the opacity to reveal the text
        hiddenText4.stop().animate({ opacity: 1 }, 900);
        isRevealed4 = true;
      } else if ($(this).scrollTop() < revealPosition4 && isRevealed4) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText4.stop().animate({ opacity: 0 }, 500);
        isRevealed4 = false;
      }
      if ($(this).scrollTop() >= revealPosition5 && !isRevealed5) {
        // Animate the opacity to reveal the text
        hiddenText5.stop().animate({ opacity: 1 }, 900);
        isRevealed5 = true;
      } else if ($(this).scrollTop() < revealPosition5 && isRevealed5) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText5.stop().animate({ opacity: 0 }, 500);
        isRevealed5 = false;
      }

      if ($(this).scrollTop() >= revealPosition6 && !isRevealed6) {
        // Animate the opacity to reveal the text
        hiddenText6.stop().animate({ opacity: 1 }, 900);
        isRevealed6 = true;
      } else if ($(this).scrollTop() < revealPosition6 && isRevealed6) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText6.stop().animate({ opacity: 0 }, 500);
        isRevealed6 = false;
      }

      if ($(this).scrollTop() >= revealPosition7 && !isRevealed7) {
        // Animate the opacity to reveal the text
        hiddenText7.stop().animate({ opacity: 1 }, 900);
        isRevealed7 = true;
      } else if ($(this).scrollTop() < revealPosition7 && isRevealed7) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText7.stop().animate({ opacity: 0 }, 500);
        isRevealed7 = false;
      }

      if ($(this).scrollTop() >= revealPosition8 && !isRevealed8) {
        // Animate the opacity to reveal the text
        hiddenText8.stop().animate({ opacity: 1 }, 900);
        isRevealed8 = true;
      } else if ($(this).scrollTop() < revealPosition8 && isRevealed8) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText8.stop().animate({ opacity: 0 }, 500);
        isRevealed8 = false;
      }

      if ($(this).scrollTop() >= revealPosition9 && !isRevealed9) {
        // Animate the opacity to reveal the text
        hiddenText9.stop().animate({ opacity: 1 }, 900);
        isRevealed9 = true;
      } else if ($(this).scrollTop() < revealPosition9 && isRevealed9) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText9.stop().animate({ opacity: 0 }, 500);
        isRevealed9 = false;
      }

      if ($(this).scrollTop() >= revealPosition10 && !isRevealed10 ) {
        // Animate the opacity to reveal the text
        hiddenText10.stop().animate({ opacity: 1 }, 900);
        isRevealed10  = true;
      } else if ($(this).scrollTop() < revealPosition10  && isRevealed10 ) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText10.stop().animate({ opacity: 0 }, 500);
        isRevealed10  = false;
      }

      if ($(this).scrollTop() >= revealPosition11 && !isRevealed11 ) {
        // Animate the opacity to reveal the text
        hiddenText11.stop().animate({ opacity: 1 }, 900);
        isRevealed11  = true;
      } else if ($(this).scrollTop() < revealPosition11  && isRevealed11 ) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText11.stop().animate({ opacity: 0 }, 500);
        isRevealed11 = false;
      }

      if ($(this).scrollTop() >= revealPosition12 && !isRevealed12 ) {
        // Animate the opacity to reveal the text
        hiddenText12.stop().animate({ opacity: 1 }, 900);
        isRevealed12  = true;
      } else if ($(this).scrollTop() < revealPosition12  && isRevealed12 ) {
        // If the scroll position is back above the reveal position, animate the opacity to hide the text
        hiddenText12.stop().animate({ opacity: 0 }, 500);
        isRevealed12 = false;
      }
    });
  });