document.addEventListener("DOMContentLoaded", function () {
  var infoEmployee = document.querySelectorAll(".infoEmployee");
  var deleteEmployeeButtons = document.querySelectorAll(".deleteEmployee");
  var displayModal = document.getElementById("displayModal");
  var confirmDeleteModal = document.getElementById("confirmDeleteModal");
  var closeModalButton = document.getElementById("closeModalButton");
  var confirmDeleteModalButton = document.getElementById(
    "confirmDeleteModalButton"
  );
  var cancelDeleteModalButton = document.getElementById(
    "cancelDeleteModalButton"
  );
  var selectedEmployeeId = null;

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

  deleteEmployeeButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      selectedEmployeeId = this.getAttribute("data-id");
      confirmDeleteModal.style.display = "block";
    });
  });
});

$(document).ready(function () {
  $("#confirmDeleteModalButton").click(function () {
    $.ajax({
      type: "POST",
      url: "./Liste-Employer",
      success: function () {
        location.reload();
      },
      error: function () {
        alert("Une erreur s'est produite lors de la suppression.");
      },
    });
  });
});
