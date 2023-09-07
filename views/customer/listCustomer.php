    <link rel="stylesheet" href="../../assets/css/clients.css">
    <!-- Conteneur principal -->
    <div class="container">
        <!-- En-tête de la page -->
        <h1>Liste des client(e)s</h1>

        <!-- Tableau pour afficher la liste des clients -->
        <table id="clients-table">
            <thead>
                <tr>
                    <!-- Entêtes du tableau -->
                    <th>Entreprise</th>
                    <th>Nom du contact</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th class="border" id="modalInfo" title="fiche d'information"><i class="fas fa-eye"></i></th>
                    <th class="border"><i class="fas fa-edit" title="modifier la fiche"></i></th>
                    <th class="border"><i class="fas fa-trash-alt" title="suppression de la fiche"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $list) { ?>
                    <tr>
                        <td><?= $list->name ?></td>
                        <td><?= $list->contactName ?></td>
                        <td><?= $list->address ?></td>
                        <td><?= $list->phone ?></td>
                        <td><?= $list->email ?></td>
                        <td class="border" id="modalInfo" style="width: 100px;">
                            <a href="./Liste-Client-<?= $list->id ?>"><button class="infoEmployee" title="fiche d'information"><i class="fas fa-eye"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <a href="./Modifier-Client-<?= $list->id ?>"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <form action="./Liste-Client" id="deleteForm" method="POST">
                                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                                <button type="submit" id="hoverDanger" name="delete" title="suppression de la fiche"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Bouton pour créer un nouveau profil -->
        <button onclick="openModal()" class="create-profile-button"><a href="./Ajout-Client">Créer un nouveau profil</a></button>