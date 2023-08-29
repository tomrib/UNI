// Données des clients
const clients = [
  {
    entreprise: "LA MANU",
    contact: "PIERRE Marc",
    email: "marc.pierre@lamanu.com",
    adresse: "12 Rue des Fleurs",
    telephone: "01 01 01 01 01",
    siret: "123789487",
  },
  {
    entreprise: "MENTALWORK",
    contact: "MARTIN Tommy",
    email: "tommy.martin@mentalwork.com",
    adresse: "4 avenue des cailloux",
    telephone: "06 06 06 06 06",
    siret: "784987321",
  },
  // Ajoutez d'autres client(e)s ici si nécessaire
];

// Sélection des éléments du DOM
const tableBody = document.querySelector("tbody");
const searchInput = document.getElementById("searchInput");
const modal = document.getElementById("modal");
const profileForm = document.getElementById("profileForm");
const closeModalButton = document.getElementById("closeModalButton");
const editProfileButton = document.getElementById("editProfileButton");
const deleteProfileButton = document.getElementById("deleteProfileButton");

// Indice du client en cours de modification
let currentClientIndex = -1;

// Fonction pour ajouter un client au tableau
function addClientToTable(client) {
  const row = document.createElement("tr");
  row.innerHTML = `
        <td>${client.entreprise}</td>
        <td>${client.contact}</td>
        <td>${client.email}</td>
        <td>${client.adresse}</td>
        <td>${client.telephone}</td>
        <td>${client.siret}</td>
        <td>
            <button onclick="editClient(${clients.indexOf(
              client
            )})">Modifier</button>
            <button onclick="deleteClient(${clients.indexOf(
              client
            )})">Supprimer</button>
        </td>
    `;
  tableBody.appendChild(row);
}

// Fonction pour éditer un client
function editClient(index) {
  currentClientIndex = index;
  const client = clients[index];
  document.getElementById("entreprise").value = client.entreprise;
  document.getElementById("contact").value = client.contact;
  document.getElementById("email").value = client.email;
  document.getElementById("adresse").value = client.adresse;
  document.getElementById("telephone").value = client.telephone;
  document.getElementById("siret").value = client.siret;
  openEditModal();
}

// Fonction pour ouvrir la modal en mode édition
function openEditModal() {
  editProfileButton.style.display = "inline-block";
  deleteProfileButton.style.display = "inline-block";
  openModal();
}

// Fonction pour supprimer un client
function deleteClient(index) {
  if (confirm("Êtes-vous sûr de vouloir supprimer le client ?")) {
    clients.splice(index, 1);
    updateTable();
  }
}

// Fonction pour mettre à jour le tableau des clients
function updateTable() {
  tableBody.innerHTML = "";
  clients.forEach((client) => addClientToTable(client));
}

// Fonction pour filtrer les clients en fonction de la recherche
function filterClients(searchTerm) {
  const filteredClients = clients.filter((client) => {
    return (
      client.entreprise.toLowerCase().includes(searchTerm) ||
      client.contact.toLowerCase().includes(searchTerm) ||
      client.email.toLowerCase().includes(searchTerm) ||
      client.adresse.toLowerCase().includes(searchTerm) ||
      client.siret.toLowerCase().includes(searchTerm) ||
      client.telephone.toLowerCase().includes(searchTerm)
    );
  });

  tableBody.innerHTML = "";
  filteredClients.forEach((client) => addClientToTable(client));
}

// Ajout des clients au tableau au chargement de la page
clients.forEach((client) => addClientToTable(client));

// Écouteur d'événement pour la recherche de client
searchInput.addEventListener("input", () => {
  const searchTerm = searchInput.value.trim().toLowerCase();
  filterClients(searchTerm);
});

// Fonction pour ouvrir la modal
function openModal() {
  modal.classList.add("modal-visible");
}

// Fonction pour fermer la modal
function closeModal() {
  modal.classList.remove("modal-visible");
  profileForm.reset();
}

// Écouteur d'événement pour le bouton de fermeture de la modal
closeModalButton.addEventListener("click", closeModal);

// Écouteur d'événement pour le bouton de modification dans la modal
editProfileButton.addEventListener("click", () => {
  closeModal();
  profileForm.submit();
});

// Écouteur d'événement pour le bouton de suppression dans la modal
deleteProfileButton.addEventListener("click", () => {
  closeModal();
  deleteClient(currentClientIndex);
});

// Écouteur d'événement pour soumettre le formulaire de la modal
profileForm.addEventListener("submit", (event) => {
  event.preventDefault();

  // Récupération des valeurs saisies dans le formulaire
  const entreprise = document.getElementById("entreprise").value;
  const contact = document.getElementById("contact").value;
  const email = document.getElementById("email").value;
  const adresse = document.getElementById("adresse").value;
  const telephone = document.getElementById("telephone").value;
  const siret = document.getElementById("siret").value;

  if (currentClientIndex === -1) {
    // Création d'un nouveau client
    const newClient = {
      entreprise: entreprise,
      contact: contact,
      email: email,
      adresse: adresse,
      telephone: telephone,
      siret: siret,
    };

    clients.push(newClient);
  } else {
    // Modification du client existant
    const editedClient = clients[currentClientIndex];
    editedClient.entreprise = entreprise;
    editedClient.contact = contact;
    editedClient.email = email;
    editedClient.adresse = adresse;
    editedClient.telephone = telephone;
    editedClient.siret = siret;

    currentClientIndex = -1; // Réinitialiser l'indice
  }

  updateTable();
  closeModal();
});

// Écouteur d'événement pour fermer la modal en cliquant à l'extérieur
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    closeModal();
  }
});
