<?php include 'db.php'; ?>
<?php

$query = "SELECT * FROM `pytania`";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quiz PHP and SQL</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        
    </head>
    <body>
       <header>
        <div class="container">
            <h1>PHP SQL Quiz</h1>

        </div>
       </header>
        <main>
       <div class="container">
        <h2>Sprawdz swoja wiedze</h2>
        <p><strong>To jest quiz wielokrotnego wyboru ze znajomości samochodów</strong></p>
        <ul>
            <li><strong> Ilość pytań: </strong><?php echo $total ?></li>
            <li><strong> Typ: </strong>wielokrotny</li>
            <li><strong> Ilość czasu: </strong><?php echo $total* 0.5;?> min</li>

        </ul>
        <a href="pytania.php?n=1" class="start">START Quiz</a>
       </div>
       </main>
       <footer>
        <div class="container">
            Copyright &copy; 2022, Konrad Czarnowski
        </div>
       </footer>

    </body>
</html>