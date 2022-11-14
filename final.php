<?php session_start(); ?>



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
        <h2>Gratulacje</h2>
        <p>Zakończyłeś test</p>
        <p>Twój wynik <?php echo $_SESSION['wynik'];?> </p>
        <?php $_SESSION['wynik']=0; ?>
        <a href="pytania.php?n=1" class="start">Jeszcze raz</a>
        </div>
       </main>
       <footer>
        <div class="container">
            Copyright &copy; 2022, Konrad Czarnowski
        </div>
       </footer>

    </body>
</html>