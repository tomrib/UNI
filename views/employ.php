<link rel="stylesheet" href="../assets/css/employees.css">
<!-- Conteneur principal -->
<div class="parentContainer">
    <div class="container">
        <!-- En-tête de la page -->
        <h1>Liste des Employé(e)s</h1>

        <!-- Champ de recherche -->
        <input type="text" id="searchInput" placeholder="Rechercher un employé(e)...">

        <!-- Tableau pour afficher la liste des employés -->
        <table id="employees-table" class="responsiveTable">
            <thead>
                <tr>
                    <!-- Entêtes du tableau -->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Type contrat</th>
                    <th>N° Sécu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $list) { ?>
                    <tr>
                        <td><?= $list->lastname ?></td>
                        <td><?= $list->firstname ?></td>
                        <td><?= $list->email ?></td>
                        <td><?= $list->address ?></td>
                        <td><?= $list->phone ?></td>
                        <td><?= $list->contra ?></td>
                        <td><?= $list->cq ?></td>
                        <td><?= $list->id_Who ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Bouton pour créer un nouveau profil -->
        <button onclick="openModal()" class="create-profile-button">Créer un nouveau profil</button>

        <!-- Modèle de formulaire pour créer et éditer un profil -->
    </div>
</div>


