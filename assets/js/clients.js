document.addEventListener("DOMContentLoaded", function () {
  var infoClient = document.querySelectorAll(".infoClient");
  var deleteClientButtons = document.querySelectorAll(".deleteClient");
  var displayModal = document.getElementById("displayModal");
  var confirmDeleteModal = document.getElementById("confirmDeleteModal");
  var closeModalButton = document.getElementById("closeModalButton");
  var confirmDeleteModalButton = document.getElementById(
    "confirmDeleteModalButton"
  );
  var cancelDeleteModalButton = document.getElementById(
    "cancelDeleteModalButton"
  );
  var selectedClientId = null;

  infoClient.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      var editLink = this.parentElement.getAttribute("href");
      displayModal.style.display = "block";
    });
  });

  closeModalButton.addEventListener("click", function () {
    displayModal.style.display = "none";
  });

  deleteClientButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      selectedClientId = this.getAttribute("data-id");
      confirmDeleteModal.style.display = "block";
    });
  });

  $("#confirmDeleteModalButton").click(function () {
    $.ajax({
      type: "POST",
      url: "./Liste-Client",
      success: function () {
        location.reload();
      },
      error: function () {
        alert("Une erreur s'est produite lors de la suppression.");
      },
    });
  });

  $(".infoClient").click(function () {
    var id = $(this).data("id");
    console.log("ID récupéré : " + id);
    $.ajax({
      type: "GET",
      url: "./Info-Client",
      data: { id: id },
      success: function (response) {
        console.log("Réponse du serveur : " + response);
      },
      error: function () {
        alert("Une erreur s'est produite lors de la récupération des données.");
      },
    });
  });
});
