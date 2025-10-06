document.addEventListener("DOMContentLoaded", function() {
  const text = "Grow At All Cost"; // Your message
  const speed = 100; // Typing speed in ms
  const textElement = document.getElementById("preloader-text");
  let i = 0;

  function typeWriter() {
    if (i < text.length) {
      textElement.innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    } else {
      // After typing complete, wait, then strike-through
      setTimeout(() => {
        textElement.classList.add("strike");
        // Then fade out the preloader
        setTimeout(() => {
          document.getElementById("preloader").classList.add("hide");
        }, 1000);
      }, 800);
    }
  }

  typeWriter();
});
