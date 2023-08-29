<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Interface Employés</h1>
        <form id="form" method="POST">
            <label for="arrivee">Heure d'arrivée :</label>
            <input type="text" id="arrivee" name="arrivee" placeholder="HH:MM">
    
            <label for="depart">Heure de départ :</label>
            <input type="text" id="depart" name="depart" placeholder="HH:MM">
    
            <input type="submit" value="Valider" onclick="validerAction()">
        </form>
        <form id="form" method="POST">
            <label for="photo">Uploader une photo :</label>
            <input type="file" id="photo" name="photo">
    
            <label for="commentaire">Commentaire :</label>
            <textarea id="commentaire" name="commentaire" rows="4" cols="50"></textarea>
            <input type="submit" value="Valider" onclick="validerAction()">
        </form>
</body>
</html>