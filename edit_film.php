<?php

require_once "pdo-connectie.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $query = "UPDATE  movies SET title = ?, length_in_minutes = ?, released_at = ?, summary = ?, country_of_origin = ? WHERE id = ?";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $_POST['title']);
    $stmt->bindParam(2, $_POST['length_in_minutes']);
    $stmt->bindParam(3, $_POST['released_at']);
    $stmt->bindParam(4, $_POST['summary']);
    $stmt->bindParam(5, $_POST['country_of_origin']);
    $stmt->bindParam(6, $_GET['id']);


    $stmt->execute();

    header('Location: detail_film.php?id=' . $_GET['id']);
    exit;
}

$query = "SELECT * FROM movies WHERE id = ?";

$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $_GET["id"]);
$stmt->execute();

$film = $stmt->fetch();

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
    <h2><?= $film['title']; ?></h2>



    <div class="formE">
        <form action="edit_film.php?id=<?= $film['id']; ?>" method="post">
                    <button type="button" class="knopT" onclick="document.location='index.php'"><< terug</button>

                    <label>
                    <span>Titel</span>
                        <input type="text" name="title" value="<?= $film['title']; ?>">
                    </label>

                    <label>
                    <span>Duur</span>
                        <input type="text" name="length_in_minutes" value="<?= $film['length_in_minutes']; ?>">
                    </label>
                    <label>
                        <span>Datum van uitkomst</span>
                        <input type="text" name="released_at" value="<?= $film['released_at']; ?>">

                    </label>
                    <label>
                    <span>Land van uitkomst</span>
                        <input type="text" name="country_of_origin" value="<?= $film['country_of_origin']; ?>">
                    </label>

                    <label>
                    <span>omschrijving</span>
                        <textarea id="omschrijving" name="summary" rows="10" cols="20"><?= $film['summary']; ?></textarea>
                    </label>
                    <label>
                    <span>YouTube trailer ID</span>
                        <input type="text" name="youtube_trailer_id" value="<?= $film['youtube_trailer_id']; ?>" disabled>
                    </label><br>
                    <button type="submit" class="Opslaanedit"> opslaan</button>
                </form>
            </div>




</body>

</html>