    <link rel="stylesheet" href="../../assets/css/clients.css">
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

