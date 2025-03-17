<?php
require_once "pdo-connectie.php";


$query = $pdo->prepare("SELECT * FROM media WHERE id = :id");


$query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$query->execute();
$films = $query->fetch();

$soort = $films['soort'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $films['title']; ?></title>
</head>

<body>
    <table class="informatieTabel">
        <tr>
            <h2><?= $films['title']; ?></h2>

            <td>
                <button type="button" class="knopT" onclick="document.location='index.php'">
                    << terug</button>
            </td>

        <tr>
            <td class="informatieData">informatie</td>
            <td class="informatieData">informatie</td>
        </tr>
        <?php if ($soort == 'movies') {
        ?>

            <tr>
                <td class="informatieData"> datum-uitkost </td>
                <td class="informatieData"><?= $films['released_at']; ?></td>
            </tr>
            <tr>
                <td class="informatieData"> land-uitkost</td>
                <td class="informatieData"> <?= $films['country_of_origin']; ?></td>
            </tr>
            <tr>
                <td class="informatieData"> duur-in-minuten</td>
                <td class="informatieData"><?= $films['length_in_minutes']; ?></td>
            </tr>
            <?php } else { ?>
                <tr>
                    <td class="informatieData"> Awards </td>
                    <td class="informatieData"><?= $films['has_won_awards']; ?></td>
                </tr>
                <tr>
                    <td class="informatieData"> Seasons </td>
                    <td class="informatieData"> <?= $films['seasons']; ?></td>
                </tr>
                <tr>
                    <td class="informatieData"> land-uitkost</td>
                    <td class="informatieData"> <?= $films['country_of_origin']; ?></td>
                </tr>
                <tr>
                <td class="informatieData"> Language </td>
                <td class="informatieData"><?= $films['spoken_in_language']; ?></td>
            </tr>
            <tr>
                <td class="informatieData"> Rating </td>
                <td class="informatieData"><?= $films['rating']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>omschijving</h2>
    <p class="borderD">
        <td class="omschrijvingT"><?= $films['summary']; ?></td>
    </p>
    <button>
        <a href="edit.php?id=<?= $films['id'] ?>" class="knopEdit">
            >> edit
        </a>
    </button>
</body>

<?php if ($soort == 'movies') { ?>
    <h2>Trailer</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $films['youtube_trailer_id'] ?>"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </body>
<?php } ?>

</html>