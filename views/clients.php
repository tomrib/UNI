
    <link rel="stylesheet" href="../assets/css/clients.css">
    <!-- Conteneur principal -->
    <div class="container">
        <!-- En-tête de la page -->
        <h1>Liste des client(e)s</h1>

        <!-- Champ de recherche -->
        <input type="text" id="searchInput" placeholder="Rechercher un client...">

        <!-- Tableau pour afficher la liste des clients -->
        <table id="clients-table">
            <thead>
                <tr>
                    <!-- Entêtes du tableau -->
                    <th>Entreprise</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>N° SIRET</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les données des clients seront insérées ici via JavaScript -->
            </tbody>
        </table>

        <!-- Bouton pour créer un nouveau profil -->
        <button onclick="openModal()" class="create-profile-button">Créer un nouveau profil</button>

        <!-- Modèle de formulaire pour créer et éditer un profil -->
        <div class="modal" id="modal">
            <div class="modal-content">
                <!-- Titre de la modal -->
                <h2>Créer un Nouveau Profil</h2>
                <form id="profileForm" method="POST">
                    <!-- Champs pour saisir les informations du client -->
                    <label for="entreprise">Entreprise:</label>
                    <input type="text" id="entreprise" placeholder="Nom de l'entreprise...">
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" placeholder="Nom du contact...">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Email de contact...">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" placeholder="Adresse de l'entreprise...">
                    <label for="telephone">Téléphone:</label>
                    <input type="tel" id="telephone" placeholder="numéro de contact">
                    <label for="siret">N° SIRET:</label>
                    <input type="tel" id="siret" placeholder="numéro SIRET de l'entreprise...">
                    <button id="validationClients" type="submit">Créer</button>

                    <!-- Boutons pour supprimer et modifier un profil, masqués par défaut -->
                    <button id="deleteProfileButton" style="display: none;">Supprimer</button>
                    <button id="editProfileButton" style="display: none;">Modifier</button>
                </form>
                <!-- Bouton pour fermer la modal -->
                <button id="closeModalButton" onclick="closeModal()">Fermer</button>
            </div>
        </div>
    </div>

    <!-- Script JavaScript pour gérer les fonctionnalités -->
    <script src="../assets/js/clients.js" defer></script>
</body>

</html>