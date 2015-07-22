<html>
<body>
    <?php

    $classNo = $_POST["class"];


    $data = simplexml_load_file("Quiz.xml")or die("Error: Cannot create object");

    foreach ($data->children() as $questions) {
        if ($questions["id"] == $classNo){
            echo $questions->Question."<br>";
            $quantity = $questions->quantity;
            for ($i=1; $i <= $quantity; $i++) { 
              $str = "Choice".$i;
              echo $questions->$str."<br>";
            }
            echo "<br>";

        }
        
    }

    echo '<form action="studentQuizP.php" method="post">
        <input type="checkbox" name="class" value="1">A
        <input type="checkbox" name="class" value="2">B
        <input type="submit">
        </form>';

    ?>

</body>
</html>