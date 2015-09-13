<html>

<body>
	<?php


	$quizId = $_POST["quizId"];

    echo "Edit success.";

   $data = simplexml_load_file("Quiz.xml")or die("Error: Cannot create object");

   
   $openF = fopen("Quiz.xml", "w+");
   $str = "<?xml version='1.0' encoding='utf-8'?>\n";
   $str .="<Quiz>\n";


   $t = 0;
   $quantity = $_POST["quantity"];

   foreach ($data as $keys) {
      

      
      if($keys["id"] == $quizId){
         $t++;
         if ($t == $_POST["selected"]){
            $str .= '<Q id="'.$quizId.'">'."\n";
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
            
            $str .= '</Q>'."\n";

         }else{  
            $str .= '<Q id="'.$keys["id"].'">'."\n";
            foreach ($keys as $ele => $value) {
               $str .= '<'.$ele.'>'.$value.'</'.$ele.'>'."\n";
            }
            $str .= '</Q>'."\n";
         }
      }else{

         $str .= '<Q id="'.$keys["id"].'">'."\n";
         foreach ($keys as $ele => $value) {
            $str .= '<'.$ele.'>'.$value.'</'.$ele.'>'."\n";
         }
         $str .= '</Q>'."\n";
      }
     

      if ($flag == 1) {
         
      }

     
   }
   
   $str .= "</Quiz>";
   if(fwrite($openF, $str)){}
                else{
                        echo "write xml error";
                    }
	?>
</body>

</html>