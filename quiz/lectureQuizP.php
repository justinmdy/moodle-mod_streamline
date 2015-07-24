<html>
    <body>

        <?php
            
            if(!is_file("Quiz.xml")){
                $openF = fopen("Quiz.xml", "a");
                $str = "<?xml version='1.0' encoding='utf-8'?>\n";
                $str .="<Quiz>\n</Quiz>";

                if(fwrite($openF, $str)){}
                else{
                        echo "write xml error";
                    }
            }
            $quantity = $_POST["quantity"];

            $openF = fopen("Quiz.xml", "r+");
            fseek($openF, -7, SEEK_END);
            $str = '<Q id="'.$_POST["class"].'">'."\n";
            $str .='<Question>'.$_POST["Question"]."</Question>\n";
            $str .= "<quantity>".$quantity."</quantity>\n";

            for($x = 1; $x <= $quantity; $x++){
                $str .= "<Choice".$x.">".$_POST["Choice".$x]."</Choice".$x.">\n";
            }


            for($x = 1; $x <= $quantity; $x++){
                if ($_POST["C".$x]==1){
                    $str .= "<Answer".$x.">".$x."</Answer".$x.">\n";
                }
            }

            $str .= "</Q>\n";
            $str .= "</Quiz>";


            fwrite($openF, $str);


            $openFile = fopen("Quiz.txt","a");
            echo $_POST["Question"]; 
 
            fwrite($openFile,$_POST["Question"]."@@");


            $openFile = fopen("Quiz.txt","a");
            for($x = 0; $x <= $quantity; $x++){
                echo $_POST["Choice".$x]."<br>";  
                fwrite($openFile,$_POST["Choice".$x]."##");
            }
            fwrite($openFile, "\n");

        ?><br />
    </body>
</html>