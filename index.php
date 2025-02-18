<?php

require_once "pdo-connectie.php";
$link1 = '';
$link2 = '';
if (isset($_GET['orderby'])) {
    $series = "SELECT * FROM series ORDER BY rating DESC";
    $link1 = '&orderby=rating';
} else {
    $series = 'SELECT title, rating, id FROM series';
}
$query2 = $pdo->query($series);
$series = $query2->fetchAll();

if (isset($_GET['order1by'])) {
    $films = "SELECT * FROM movies ORDER BY length_in_minutes DESC";
    $link2 = '&order1by=films';
} else {
    $films = 'SELECT title, length_in_minutes, id FROM movies';
}
$query = $pdo->query($films);
$films = $query->fetchAll();
$leegS = "";
$leegF = "";

foreach ($series as $serie) {
    $leegS .= '<tr>';
    $leegS .= '<td>' . $serie['title'] . "</td>";
    $leegS .= '<td>' . $serie['rating'] . "</td>";
    $leegS .= "<td><a href='detail_serie.php?id=$serie[id]'> bekijk details</a></td>";
}
foreach ($films as $film) {
    $leegF .= '<tr>';
    $leegF .= '<td>' . $film['title'] . "</td>";
    $leegF .= "<td>$film[length_in_minutes]</td>";
    $leegF .= "<td class='detailF'><a href='detail_film.php?id=$film[id]'> bekijk details</a></td>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style.css">

    <title>Netland!</title>
    <h1> Welkom op het netland beheerders paneel</h1>
</head>

<body>
    <h2> Series </h2>
    <table >
        <td> titel</td>
        <td> <a href="?orderby=rating<?= $link2 ?>"> &darr;rating</a> </td>
        <td> omschijving</td>
        <tr >
            <?php
            echo $leegS;
            ?>
        </tr>
    </table>
<button class="serieT"><a href='add_serie.php?id=$film[id]'> Serie Toevoegen</a></button>
    
    <h2> Films </h2>
    <table>
        <td> titel </td>
        <td><a href="?order1by=films<?= $link1 ?>"> &darr; duur </a> </td>
        <td> omschijving</td>
        <tr class="textF">
            <?php
            echo $leegF;
            ?>
        </tr>
    </table>
    <button type="submit" class="filmT"><a href='add_film.php?id=$film[id]'> Film Toevoegen</a></button>
    
</body>

</html>