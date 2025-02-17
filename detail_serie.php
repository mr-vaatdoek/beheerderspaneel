<?php

require_once "pdo-connectie.php";

$series = "SELECT * FROM series WHERE id = $_GET[id]";
$query = $pdo->query($series);
$series = $query->fetchAll();

$leegS = "";

foreach ($series as $serie) {
    $leegS .= '<tr>';
    $leegS .= '<td>' . $serie['has_won_awards'] . "</td>";
    $leegS .= "<td>" . $serie['seasons'] . "</td>";
    $leegS .= "<td>" . $serie['country'] . "</td>";
    $leegS .= "<td>" . $serie['spoken_in_language'] . "</td>";
    $leegS .= "<td>" . $serie['rating'] . "</td>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $serie['title']; ?></title>
</head>

<body>
    <table class="informatie">
        <h2><?= $serie['title']; ?></h2>
        <td class="terug">
            <button type="button" class="knopT" onclick="document.location='index.php'">
                << terug</button>
        </td>
        <tr>
            <td>informatie</td>
            <td>informatie</td>
        </tr>
        <tr>
            <td class="informatieT"> Awards </td>
            <td class="informatieT"><?= $serie['has_won_awards']; ?></td>
        </tr>
        <tr>
            <td class="informatieT"> Seasons </td>
            <td class="informatieT"> <?= $serie['seasons']; ?></td>
        </tr>
        <td class="informatieT"> Country </td>
        <td class="informatieT"><?= $serie['country']; ?></td>
        </tr>
        </tr>
        <td class="informatieT"> Language </td>
        <td class="informatieT"><?= $serie['spoken_in_language']; ?></td>
        </tr>
        </tr>
        <td class="informatieT"> Rating </td>
        <td class="informatieT"><?= $serie['rating']; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="button" class="edit" onclick="document.location='edit_serie.php?id=<?= $serie['id']; ?>'"> >> aanpassen</button>
            </td>
        </tr>

    </table>

    <h2>omschijving</h2>
    <p class="borderD">
        <td class="omschrijvingT"><?= $serie['summary']; ?></td>
    </p>
</body>

</html>