<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php
$number = (int) $_GET['n'];
$query = "SELECT * FROM `pytania` WHERE numer_pytania = $number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();

$query2 = "SELECT * FROM `odpowiedzi` WHERE numer_pytania = $number";
$choices = $mysqli->query($query2) or die($mysqli->error.__LINE__);

$query3= "SELECT * FROM `pytania`";
$results=$mysqli->query($query3) or die ($mysqli->error.__LINE__);
$totals=$results->num_rows;
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
       <div class="current">Pytanie <?php echo $number ?> z <?php echo $totals ?>  </div>
       <p class="question">
            <?php echo $question['tekst'];?>
       </p>
       <form method="POST" action="process.php">
        <ul class="choices">
            <?php while($row = $choices->fetch_assoc()): ?>
            <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"/><?php echo $row['tresc']; ?></li>
            <?php endwhile ?>
           
        </ul>
        <input type="submit" value="Submit" />
        <input type="hidden" name="number" value="<?php echo $number; ?>" />
       </form>
       </div>
       </main>
       <footer>
        <div class="container">
            Copyright &copy; 2022, Konrad Czarnowski
        </div>
       </footer>

    </body>
</html>