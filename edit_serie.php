<?php

require_once "pdo-connectie.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $query = "UPDATE  series SET has_won_awards = ?, seasons = ?, country = ?, spoken_in_language = ?, summary = ?, rating = ? WHERE id = ?";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $_POST['has_won_awards']);
    $stmt->bindParam(2, $_POST['seasons']);
    $stmt->bindParam(3, $_POST['country']);
    $stmt->bindParam(4, $_POST['spoken_in_language']);
    $stmt->bindParam(5, $_POST['summary']);
    $stmt->bindParam(6, $_POST['rating']);
    $stmt->bindParam(7, $_GET['id']);


    $stmt->execute();

    header('Location: detail_serie.php?id=' . $_GET['id']);
    exit;
}

$query = "SELECT * FROM series WHERE id = ?";

$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $_GET["id"]);
$stmt->execute();

$serie = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="editP">
    <h2><?= $serie['title']; ?></h2>



    <div class="formE">
        <form action="edit_serie.php?id=<?= $serie['id']; ?>" method="post">
            <button type="button" class="knopT" onclick="document.location='index.php'">
                << terug</button>

                    <label>
                        <span>Titel</span>
                        <input type="text" name="title" value="<?= $serie['title']; ?>">
                    </label>

                    <label>
                        <span>Awards gewonnen</span>
                        <input type="text" name="has_won_awards" value="<?= $serie['has_won_awards']; ?>">
                    </label>
                    <label>
                        <span>Seizoenen</span>
                        <input type="text" name="seasons" value="<?= $serie['seasons']; ?>">

                    </label>
                    <label>
                        <span>Land van uitkomst</span>
                        <input type="text" name="country" value="<?= $serie['country']; ?>">
                    </label>
                    <label>
                        <span>Gesproken taal</span>
                        <input type="text" name="spoken_in_language" value="<?= $serie['spoken_in_language']; ?>">
                    </label>
                    <label>
                        <span>Rating</span>
                        <input type="text" name="rating" value="<?= $serie['rating']; ?>">
                    </label>

                    <label>
                        <span>omschrijving</span>
                        <textarea id="omschrijving" name="summary" rows="10" cols="20"><?= $serie['summary']; ?></textarea>
                    </label>
                    <label><br>
                        <button type="submit" class="Opslaanedit"> opslaan</button>
        </form>
    </div>




</body>

</html>