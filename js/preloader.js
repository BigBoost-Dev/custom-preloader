document.addEventListener("DOMContentLoaded", function () {
  const initialText = "Grow At All Cost";
  const secondaryText = "Grow better with ";
  const speed = 100; // Typing speed in ms

  const preloader = document.getElementById("preloader");
  const initialElement = document.getElementById("preloader-text-initial");
  const secondaryElement = document.getElementById("preloader-text-secondary");
  const logoElement = document.getElementById("preloader-logo");

  if (!preloader || !initialElement || !secondaryElement) {
    return;
  }

  function typeText(element, text, callback) {
    let index = 0;

    function typeNext() {
      if (index < text.length) {
        element.textContent += text.charAt(index);
        index += 1;
        setTimeout(typeNext, speed);
      } else if (typeof callback === "function") {
        callback();
      }
    }

    typeNext();
  }

  typeText(initialElement, initialText, function () {
    setTimeout(function () {
      initialElement.classList.add("strike");

      setTimeout(function () {
        typeText(secondaryElement, secondaryText, function () {
          if (logoElement) {
            logoElement.classList.add("visible");
          }

          setTimeout(function () {
            preloader.classList.add("hide");
          }, 1000);
        });
      }, 400);
    }, 800);
  });
});
