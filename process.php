<?php include 'db.php'; ?>

<?php session_start(); ?>

<?php
    if(!isset($_SESSION['wynik'])){
        $_SESSION['wynik'] = 0;
    }

    if ($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

        $next=$number+1;

        $query= "SELECT * FROM `pytania`";
        $results=$mysqli->query($query) or die ($mysqli->error.__LINE__);
        $total=$results->num_rows;

        $query="SELECT * FROM `odpowiedzi` WHERE numer_pytania = $number AND prawda=1";

        $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
        

        $row = $result->fetch_assoc();

        $correct_choice = $row['id'];

        if($correct_choice == $selected_choice){
            $_SESSION['wynik']++;
        }

        if($number == $total) {
            header("Location: final.php");
            exit();

        }else{
            header("Location: pytania.php?n=".$next);
        }

    }

?>