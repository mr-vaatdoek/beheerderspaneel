<?php

require_once "pdo-connectie.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $query = "INSERT INTO series (title, rating, summary, has_won_awards, seasons, country, spoken_in_language) VALUES (?, ?, ?, ?, ?, ?, ?)";

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
    <h2>Nieuwe Serie</h2>



    <div class="formE">
        <form action="add_serie.php"  method="post">
                    <button type="button" class="knopT" onclick="document.location='index.php'"><< terug</button>

                    <label>
                    <span>Titel</span>
                        <input type="text" name="title">
                    </label>

                    <label>
                    <span>rating</span>
                        <input type="text" name="rating">
                    </label>
                    <label>
                    <span>summary</span>
                        <textarea id="omschrijving" name="summary" rows="7" cols="20"></textarea>
                    </label>
                    <label>
                    <span>Awards</span>
                        <input type="text" name="has_won_awards" >
                    </label>
                    <label>
                    <span>seasons</span>
                        <input type="text" name="seasons" >
                    </label>
                    <label>
                    <span>country</span>
                        <input type="text" name="country">
                    </label>
                    <label>
                    <span>spoken_in_language</span>
                        <input type="text" name="spoken_in_language">
                    </label><br>
                    <button type="submit" class="Opslaanedit">Toevoegen</button>
                </form>
            </div>




</body>

</html>