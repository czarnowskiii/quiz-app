<?php include 'db.php' ?>
<?php 
 if(isset($_POST['submit'])){
    $question_number=$_POST['question_number'];
    $question_text=$_POST['question_text'];

    $choices = array();
    $choices[1]=$_POST['choice1'];
    $choices[2]=$_POST['choice2'];
    $choices[3]=$_POST['choice3'];
    $choices[4]=$_POST['choice4'];
    $choices[5]=$_POST['choice5'];

    $correct_choice=$_POST['correct_choice'];

    $query = "INSERT INTO `pytania` (numer_pytania ,tekst) VALUES('$question_number','$question_text')";
    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

    if($insert_row){
        foreach($choices as $choice => $value) {
            if($value != '' ){
                    if($correct_choice == $choice){
                        $is_correct=1;
                    }else{
                        $is_correct=0;
                    }
                    $query5 = "INSERT INTO `odpowiedzi` (numer_pytania, prawda, tresc) VALUES('$question_number', '$is_correct', '$value')";

                    $insert_row=$mysqli->query($query5) or die($mysqli->error.__LINE__);

                    if($insert_row){
                        continue;
                    }else{
                        die('Error:' ($mysqli->errno.__LINE__));
                    }
            }
        }
    }$msg='Pytanie zostalo dodane';
 }
 $query = "SELECT * FROM `pytania`";
 $pytania = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $pytania->num_rows;
 $next=$total+1;

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
        <h2>Dodaj swoje pytanie</h2>
        <?php if(isset ($msg)){ echo $msg ;} ?>
        <form method="POST" action="add.php">
            <p>
                <label>Numer pytania</label>
                <input type="number" value="<?php echo $next ?>" name="question_number" />
            </p>
            <p>
                <label>Treść pytania</label>
                <input type="text"  name="question_text" />
            </p>
            <p>
                <label>Odpowiedz 1</label>
                <input type="text"  name="choice1" />
            </p>
            <p>
                <label>Odpowiedz 2</label>
                <input type="text"  name="choice2" />
            </p>
            <p>
                <label>Odpowiedz 3</label>
                <input type="text"  name="choice3" />
            </p>
            <p>
                <label>Odpowiedz 4</label>
                <input type="text"  name="choice4" />
            </p>
            <p>
                <label>Odpowiedz 5</label>
                <input type="text"  name="choice5" />
            </p>
            <p>
                <label>Prawidlowa odpowiedz</label>
                <input type="number"  name="correct_choice" />
            </p>
            <p>
                
                <input type="submit"  name="submit" value="Submit" />
            </p>
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