<?php

require_once "pdo-connectie.php";

$link1 = '';
$link2 = '';
if (isset($_GET['orderby'])) {
    $series =  "SELECT *  FROM media where soort = 'series' ORDER BY rating DESC";
    $link1 = '&orderby=rating';
} else {
    $series = 'SELECT title, rating, id FROM media where soort = "series"';
}
$query2 = $pdo->query($series);
$series = $query2->fetchAll();

if (isset($_GET['order1by'])) {
    $films = "SELECT * FROM media where soort = 'movies' ORDER BY length_in_minutes DESC";
    $link2 = '&order1by=films';
} else {
    $films = 'SELECT title, length_in_minutes, id FROM media where soort = "movies"';
}
$query = $pdo->query($films);
$films = $query->fetchAll();
$leegS = "";
$leegF = "";
foreach ($series as $serie) {
    $leegS .= '<tr>';
    $leegS .= '<td class="tabel">' . $serie['title'] . "</td>";
    $leegS .= '<td class="tabel">' . $serie['rating'] . "</td>";
    $leegS .= "<td class='tabel'><a href='detail.php?id=$serie[id]'> bekijk details</a></td>";
}

foreach ($films as $film) {
    $leegF .= '<tr>';
    $leegF .= '<td class="tabel">' . $film['title'] . "</td>";
    $leegF .= "<td class='tabel'>$film[length_in_minutes]</td>";
    $leegF .= "<td  class='tabel'><a href='detail.php?id=$film[id]'> bekijk details</a></td>";
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
    <table class="S_Itabel">
        <td class="tabel"> titel</td>
        <td class="tabel"> <a href="?orderby=rating<?= $link2 ?>"> &darr;rating</a> </td>
        <td class="tabel"> omschijving</td>
        <tr >
            <?php
            echo $leegS;
            ?>
        </tr>
    </table>
    6.
    
    <h2> Films </h2>
    <table class="F_Itabel">
        <td class="tabel"> titel </td>
        <td class="tabel"><a href="?order1by=films<?= $link1 ?>"> &darr; duur </a> </td>
        <td class="tabel"> omschijving</td>
        <tr class="textF">
            <?= $leegF; ?>
        </tr>
    </table>
    
    <button class="media"><a href='insert.php' class="mediaT"> Media</a></button>
</body>

</html>