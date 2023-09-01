
<!-- Conteneur principal -->
<div class="parentContainer">
    <div class="container">
        <!-- En-tête de la page -->
        <h1>Liste des Employé(e)s</h1>

        <!-- Champ de recherche -->
        <input type="text" id="searchInput" placeholder="Rechercher un employé(e)...">
        <div id="search-results">


        </div>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $list) { ?>
                    <tr>
                        <td><?= $list->lastname ?></td>
                        <td><?= $list->firstname ?></td>
                        <td><?= $list->email ?></td>
                        <td><?= $list->address ?></td>
                        <td>0<?= $list->phone ?></td>
                        <td><?= $list->contra ?></td>
                        <td><?= $list->socialInsuranceNumber ?></td>
                        <td><?= $list->id_usersTypes ?></td>
                        <td>
                            <!-- il faut ajouter le chiffrement de l'id -->
                            <a href="/Modifier-Employer-<?= $list->id ?>"><button>Modifier</button></a>
                        </td>
                        <td>
                            <!-- il faut ajouter le chiffrement de l'id -->
                            <form action="/Liste-Employer" method="POST">
                                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                                <input type="submit" name="delete" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Bouton pour créer un nouveau profil -->
        <button onclick="openModal()" class="create-profile-button"> <a href="/Ajout-Employer">Créer un nouveau profil</a></button>
<script src="../../assets/js/search.js"></script>

    </div>
</div>