<?php

require_once "pdo-connectie.php";

$query = $pdo->prepare("SELECT * FROM media WHERE id = ?");
$query->bindParam(1, $_GET['id']);
$query->execute();

$media = $query->fetch();

if (!$media) {
    die('geen media gevonden met dit id');
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $soort = $media['soort'];

    if ($soort === 'movies') {
        $query = "UPDATE media SET title = ? , length_in_minutes = ? , released_at = ? , summary =? , country_of_origin= ?, youtube_trailer_id =? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $_POST['title']);
        $stmt->bindParam(2, $_POST['length_in_minutes']);
        $stmt->bindParam(3, $_POST['released_at']);
        $stmt->bindParam(4, $_POST['summary']);
        $stmt->bindParam(5, $_POST['country_of_origin']);
        $stmt->bindParam(6, $_POST['youtube_trailer_id']);
        $stmt->bindParam(7, $_GET['id']);

        $stmt->execute();
    } else if ($soort == 'series') {
        $query = "UPDATE media SET title = ?, rating = ?, summary = ?, has_won_awards = ?, seasons = ?, country = ?, spoken_in_language = ?, WHERE id = ?";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $_POST['title']);
        $stmt->bindParam(2, $_POST['rating']);
        $stmt->bindParam(3, $_POST['summary']);
        $stmt->bindParam(4, $_POST['has_won_awards']);
        $stmt->bindParam(5, $_POST['seasons']);
        $stmt->bindParam(6, $_POST['country_of_origin']);
        $stmt->bindParam(7, $_POST['spoken_in_language']);
        $stmt->bindParam(8, $_POST['id']);

        $stmt->execute();
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Document</title>
</head>

<h2> <?= $media['title'] ?></h2>
<div class="form">
    <form action="edit.php?id=<?= $media['id'] ?>" method="post">
        <table class="mediatabel">


            <tr>
                <td>
                    <label for="titel">Titel: <label>
                </td>
                <td>
                    <input type="text" name="title" id="titel" value="<?= $media['title'] ?>">
                </td>
            </tr>

            <?php if ($media['soort'] == 'series') : ?>
                <tr class="series">
                    <td>
                        <label for="rating">rating: <label>
                    </td>
                    <td>
                        <input type="text" name="rating" id="rating" value="<?= $media['rating'] ?>">
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <label for="omschrijving">Omschrijving:</label>
                </td>
                <td>
                    <textarea id="mschrijving" name="summary" rows="7" cols="20"><?= $media['summary'] ?></textarea>
                </td>
            </tr>
            <?php if ($media['soort'] == 'series') : ?>
                <tr class="series">
                    <td>
                        <label for="awards">Aantal awards:</label>
                    </td>
                    <td>
                        <input type="text" name="has_won_awards" id="awards" value="<?= $media['has_won_awards'] ?>">
                    </td>
                </tr>
            <?php endif; ?>

            <?php if ($media['soort'] == 'movies') : ?>
                <tr class="films">
                    <td>
                        <label for="lim">Lengte in minuten:</label>

                    </td>
                    <td>
                        <input type="text" name="length_in_minutes" id="lim" value="<?= $media['length_in_minutes'] ?>">
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($media['soort'] == 'movies') : ?>
                <tr>
                    <td>
                        <label for="dvu" class="dvu">datum-uitkomst: <label>
                    </td>
                    <td>
                        <input type="text" name="released_at" id="dvu" value="<?= $media['released_at'] ?>">
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($media['soort'] == 'series') : ?>
                <tr class="series">
                    <td>
                        <label for="seizoen">Seizoenen: </label>
                    </td>
                    <td>
                        <input type="text" name="seasons" id="seizoen" value="<?= $media['seasons'] ?>">
                    </td>
                </tr>
            <?php endif; ?>

            <?php if ($media['soort'] == 'movies') : ?>
                <tr>
                    <td>
                        <label for="lvu">Land van uitkomst: <label>
                    </td>
                    <td>
                        <input type="text" name="country_of_origin" id="lvu" value="<?= $media['country_of_origin']; ?>">
                    </td>
                </tr>
            <?php endif; ?>

            <?php if ($media['soort'] == 'movies') : ?>
                <tr class="films">
                    <td>
                        <label for="yt_trailer">YouTube trailer ID: <label>
                    </td>
                    <td>
                        <input type="text" name="youtube_trailer_id" id="yt_trailer" value="<?= $media['youtube_trailer_id']; ?>">
                    </td>
                </tr>
            <?php endif; ?>






        </table>
        <button class="toevoegen">Opslaan</button>
    </form>
</div>

<button class="knopT" onclick="document.location='index.php'">
    << terug</button>

        </body>

</html>