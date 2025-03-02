document.addEventListener("DOMContentLoaded", function () {
  const chatButton = document.querySelector(".chatButton");
  const chatContent = document.querySelector(".chatContent");

  chatButton.addEventListener("click", function (e) {
    e.preventDefault();
    chatContent.classList.toggle("show");
  });
});
