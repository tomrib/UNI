const searchInput = document.getElementById("searchInput");
const searchResultsContainer = document.getElementById(
  "search-results-container"
); // Ajoutez un conteneur pour les résultats

searchInput.addEventListener("input", function () {
  const searchTerm = searchInput.value;

  // Effectuez une requête AJAX vers votre fichier PHP de recherche
  fetch(`/recherche.php?term=${searchTerm}`)
    .then((response) => response.json())
    .then((results) => {
      // Mettez à jour l'interface utilisateur avec les résultats de la recherche
      // Vous pouvez créer des éléments HTML pour afficher les résultats
      updateSearchResults(results);
    })
    .catch((error) => {
      console.error("Erreur lors de la recherche : ", error);
    });
});

function updateSearchResults(results) {
  // Effacez les résultats précédents
  searchResultsContainer.innerHTML = "";

  // Si des résultats sont disponibles, ajustez la taille de la barre de recherche
  if (results.length > 0) {
    searchResultsContainer.style.height = results.length * 40 + "px"; // Ajustez la hauteur en fonction de la taille de chaque résultat
  } else {
    searchResultsContainer.style.height = "0"; // Réinitialisez la hauteur si aucun résultat n'est disponible
  }

  // Créez des éléments HTML pour afficher les résultats
  results.forEach((result) => {
    const resultItem = document.createElement("div");
    resultItem.textContent = result.nom; // Personnalisez ceci pour afficher le résultat souhaité
    searchResultsContainer.appendChild(resultItem);
  });
}
