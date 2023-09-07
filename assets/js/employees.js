document.addEventListener("DOMContentLoaded", function () {
  var infoEmployee = document.querySelectorAll(".infoEmployee");

  var displayModal = document.getElementById("displayModal");

  var closeModalButton = document.getElementById("closeModalButton");

  infoEmployee.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      var editLink = this.parentElement.getAttribute("href");

      displayModal.style.display = "block";
    });
  });

  closeModalButton.addEventListener("click", function () {
    displayModal.style.display = "none";
  });
});
