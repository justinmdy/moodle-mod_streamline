<html>
<style>
</style>
<body>
    <?php

    $quizId = $_POST["class"];


    $data = simplexml_load_file("Quiz.xml")or die("Error: Cannot create object");

    echo '<form action="DelDone.php" method="post">';

    echo '<input type="hidden" name="quizId" value="'.$quizId.'">';

    $t=1;

    foreach ($data->children() as $questions) {
        if ($questions["id"] == $quizId){

            echo '<div id="'.$t.'"> <input type="radio" name="selected" value="'.$t.'">'.$t.". ".$questions->Question.'</div>'."<br>";

            echo "<br>";
            $t++;

        }
        
    }

    echo '
        <input type="submit">
        </form>';
    ?>

</body>
</html>