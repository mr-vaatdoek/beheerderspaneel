<?php

require_once "pdo-connectie.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $soort = $_POST['Typemedia'] ?? null;

    if ($soort === 'films') {
        $query = "INSERT INTO media (title , length_in_minutes , released_at , summary , country_of_origin , youtube_trailer_id, soort) VALUES (?, ?, ?, ?, ?, ?, 'movies')";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $_POST['title']);
        $stmt->bindParam(2, $_POST['length_in_minutes']);
        $stmt->bindParam(3, $_POST['released_at']);
        $stmt->bindParam(4, $_POST['summary']);
        $stmt->bindParam(5, $_POST['country_of_origin']);
        $stmt->bindParam(6, $_GET['youtube_trailer_id']);
        
        $stmt->execute();
    
    } else if ($soort == 'series') {
        $query = "INSERT INTO media (title, rating, summary, has_won_awards, seasons, country, spoken_in_language, soort) VALUES (?, ?, ?, ?, ?, ?, ?, 'series')";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $_POST['title']);
        $stmt->bindParam(2, $_POST['rating']);
        $stmt->bindParam(3, $_POST['summary']);
        $stmt->bindParam(4, $_POST['has_won_awards']);
        $stmt->bindParam(5, $_POST['seasons']);
        $stmt->bindParam(6, $_POST['country']);
        $stmt->bindParam(7, $_POST['spoken_in_language']);

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

<h2>Media Toevoegen</h2>
<div class="form">
    <form action="insert.php" method="post">
        <table class="mediatabel">


            <tr>
                <td>
                    <label for="titel">Titel: <label>
                </td>
                <td>
                    <input type="text" name="title" id="titel">
                </td>
            </tr>


            <tr class="series">
                <td>
                    <label for="rating">rating: <label>
                </td>
                <td>
                    <input type="text" name="rating" id="rating">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="omschrijving">Omschrijving:</label>
                </td>
                <td>
                    <textarea id="mschrijving" name="summary" rows="7" cols="20"></textarea>
                </td>
            </tr>

            <tr class="series">
                <td>
                    <label for="awards">Aantal awards:</label>
                </td>
                <td>
                    <input type="text" name="has_won_awards" id="awards">
                </td>
            </tr>
            <tr class="films">
                <td>
                    <label for="lim">Lengte in minuten:</label>

                </td>
                <td>
                    <input type="text" name="length_in_minutes" id="lim">
                </td>
            </tr>
            <tr class="films">
                <td>
                    <label for="dvu" class="dvu">datum-uitkomst (dd/mm/jjjj): <label>
                </td>
                <td>
                    <input type="date" name="released_at" id="dvu">
                </td>
            </tr>

            <tr class="series">
                <td>
                    <label for="seizoen">Seizoenen: </label>
                </td>
                <td>
                    <input type="text" name="seasons" id="seizoen">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="lvu">Land van uitkomst: <label>
                </td>
                <td>
                    <input type="text" name="country" id="lvu">
                </td>
            </tr>
            <tr class="films">
                <td>
                    <label for="yt_trailer">YouTube trailer ID: <label>
                </td>
                <td>
                    <input type="text" name="youtube_trailer_id" id="yt_trailer">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="selector">Type media: <label>
                </td>
                <td>

                    <select class="mediakeuze" name="Typemedia" id="selector" onchange='handleChange()'>
                        <option value="keuze">kies een mediatype</option>
                        <option value="films">Films</option>
                        <option value="series">Series</option>
                    </select>
                </td>
            </tr>



        </table>
        <button class="toevoegen">Toevoegen</button>
    </form>
</div>

<button class="knopT" onclick="document.location='index.php'">
    << terug</button>

        </body>

</html>