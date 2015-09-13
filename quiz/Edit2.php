<!DOCTYPE>
<html>

<style>
    .section {
        width:550px;
        height: 70px;
        float:left;      
    }

    .block2{
        width: 550px;
        background-color: #333333;
        height: 50px;
        border-radius: 6px;        
    }

    .block2title{
        padding-left: 40px;
        padding-top:2px;
        font-size: 100%;
        color: #FFF;


    }

    .block2block{
        width: 300x;
        float:left;
 
    }


    .question{
        width: 550px;
        background-color: #444444;
        height: 85px;
        border-radius: 6px;
    }

    #QT{
        padding-left: 0px;
        float: left;
    }

    #Qblock{
        width:125px;
        float: left;
    }

    #Qblock2{
        width:400px;
        height: 75px;
        float: left;
        padding-top: 10px;
    }

    .CB{
        width: 550px;
    }

    .frame {
        width:550px;
    }

    .CB1{
        padding-top: 15px;
        padding-left: 10px;
        width:30px;
        float: left;
    }

    .CB2{
        width:85px;    
        float: left;    
    } 

    .CB3{
        width:320px;
        float:left;
    }     


</style>
    <body>
    <?php

    $data = simplexml_load_file("Quiz.xml")or die("Error: Cannot create object");
    $quizId = $_POST["quizId"];
    $selected = $_POST["selected"];
    $t = 1;
    $ele;

    foreach ($data->children() as $questions) {
        if ($questions["id"] == $quizId){
          if($t == $selected){
            $ele = $questions;
          }
          $t ++;
        }
        
    }


    echo '
        <div class="frame" >
        <form action="EditDone.php" method="post">
        <input type = "hidden" name = "selected" value = "'.$selected.'">;
            
            <div class="frame">
              <div class="block2"> 

              <div class="block2block">
              <p class="block2title">Quiz id:    
              <input type="number" name="quizId" min="1" max="1000" value='.$quizId.'>
              </p>
              </div>
             


              <div class="block2block">
              <p class="block2title">Choice number:    
              <input type="number" name="quantity" min="1" max="6" value='.$ele->quantity.'>
              </p>

              </div>


             </div>
            </div>

            <hr style="border:0;background-color:#AAAAAA;height:1px;">

            <div class="question">

            <div id="Qblock">    

            <p class="block2title">Question: </p>
            </div>

            <div id="Qblock2">
             <textarea id="QT" name="Question" rows="3" cols="47" style="resize:none; font-size:14px" />'.$ele->Question.'</textarea>     
            </div>

            </div>

            <hr style="border:0;background-color:#AAAAAA;height:1px;">

            <div class= "CB">

            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C1" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 1:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice1" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice1.'</textarea>
               </div>

            </div>
            


            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C2" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 2:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice2" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice2.'</textarea>
               </div>

            </div>
            

            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C3" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 3:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice3" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice3.'</textarea>
               </div>

            </div>
            

            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C4" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 4:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice4" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice4.'</textarea>
               </div>

            </div>
            
            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C5" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 5:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice5" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice5.'</textarea>
               </div>

            </div>
            
            <div class="section">

               <div class = "CB1">
                  <input type="checkbox" name="C6" value="1">
               </div> 

               <div class = "CB2">
                  <p>Choice 6:</p>
               </div>

               <div class = "CB3">
                  <textarea name="Choice6" rows="3" cols="46" style="resize:none; font-size:14px"/>'.$ele->Choice6.'</textarea>
               </div>

            </div>

            <div class = "section">
                <input type="submit"/>
            </div>
            


            </div>
        </form>


    </div>
    </div>
    ';
    ?>

    </body>
</html>