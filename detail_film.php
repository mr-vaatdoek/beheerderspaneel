<?php

require_once "pdo-connectie.php";

$films = "SELECT * FROM movies WHERE id = $_GET[id]";
$query = $pdo->query($films);
$films = $query->fetchAll();

$leegF = "";

foreach ($films as $film) {
    $leegF .= '<tr>';
    $leegF .= '<td>' . $film['released_at'] . "</td>";
    $leegF .= "<td>" . $film['country_of_origin'] . "</td>";
    $leegF .= "<td>" . $film['length_in_minutes'] . "</td>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $film['title']; ?></title>
</head>

<body>
    <table class="informatie">
        <h2><?= $film['title']; ?></h2>
    
            <td class="terug">
                 <button type="button" class="knopT" onclick="document.location='index.php'"> << terug</button>
            </td>
        
        <tr>
            <td>informatie</td>
            <td>informatie</td>
        </tr>
        <tr>
            <td class="informatieT"> datum-uitkost </td>
            <td class="informatieT"><?= $film['released_at']; ?></td>
        </tr>
        <tr>
            <td class="informatieT"> land-uitkost</td>
            <td class="informatieT"> <?= $film['country_of_origin']; ?></td>
        </tr>
        <td class="informatieT"> duur-in-minuten</td>
        <td class="informatieT"><?= $film['length_in_minutes']; ?></td>
    </tr>
    <tr>
    <td colspan="2"> 
            <button type="button" class="edit" onclick="document.location='edit_film.php?id=<?= $film['id']; ?>'">  >> aanpassen</button> 
    </td>
    </tr>

    </table>

        <h2>omschijving</h2>
        <p class="borderD">
             <?= $film['summary']; ?>
        </p>


    <h2>Trailer</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $film['youtube_trailer_id'] ?>"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</body>

</html>