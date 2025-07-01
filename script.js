
document.addEventListener("DOMContentLoaded", function() {
  const quotes = [
    "Connect. Share. Inspire.",
    "Where memories meet the future.",
    "Stay connected with your roots."
  ];
  let index = 0;
  const quoteDisplay = document.getElementById("quote");

  if (quoteDisplay) {
    setInterval(() => {
      quoteDisplay.textContent = quotes[index];
      index = (index + 1) % quotes.length;
    }, 3000);
  }
});
