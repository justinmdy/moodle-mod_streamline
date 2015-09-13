<html>
<body>

<?php

$quizId = $_POST["quizId"];

echo "Delete success.";

   $data = simplexml_load_file("Quiz.xml")or die("Error: Cannot create object");

   
   $openF = fopen("Quiz.xml", "w+");
   $str = "<?xml version='1.0' encoding='utf-8'?>\n";
   $str .="<Quiz>\n";


   $t = 0;
   $flag = 1;

   foreach ($data as $keys) {
      

      
      if($keys["id"] == $quizId){
         $t++;
         if ($t == $_POST["selected"]){
            $flag == 0;
            
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