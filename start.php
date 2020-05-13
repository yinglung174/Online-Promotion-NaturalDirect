<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<center>";
        echo "<h2>Take The AQ Test</h2><br><br>";
        echo "Psychologist Simon Baron-Cohen and his colleagues at Cambridge's Autism Research Centre have created the Autism-Spectrum Quotient, or AQ, as a measure of the extent of autistic traits in adults.<br><br> In the first major trial using the test, the average score in the control group was 16.4. <br><br>Eighty percent of those diagnosed with autism or a related disorder scored 32 or higher.<br><br> The test is not a means for making a diagnosis, however, and many who score above 32 and even meet the diagnostic criteria for mild autism or Asperger's report no difficulty functioning in their everyday lives.";
        echo "<br><br>";
         echo "  <form action=\"test.php\" method=\"post\">";
                 echo   " <input type=\"hidden\" name=\"No\" value=\"$No\"/>";
         echo "<input type=\"hidden\" name=\"login\" value=\"$login\"/>";
         echo "<input type=\"hidden\" name=\"name\" value=\"$name\" />";
         echo "<input type=\"hidden\" name=\"username\" value=\"$user\" />";
         echo "<input type=\"hidden\" name=\"password\" value=\"$pw\" />";
         echo "<input type=\"hidden\" name=\"gender\" value=\"$gender\" />";
         echo "<input type=\"hidden\" name=\"address\" value=\"$address\" />";
         echo "<input type=\"hidden\" name=\"tel\" value=\"$tel\" />";
         echo "<input type=\"hidden\" name=\"email\" value=\"$email\" />";
         echo "<input type=\"hidden\" name=\"icon\" value=\"$icon\" />";
         echo "<center> <input type=\"submit\" name=\"Start\" value=\"Start Now\"></center> </form>";
        echo "</center>";
         echo " <br><br> <form action=\"members.php\" method=\"post\">";
                 echo   " <input type=\"hidden\" name=\"No\" value=\"$No\"/>";
         echo "<input type=\"hidden\" name=\"login\" value=\"$login\"/>";
         echo "<input type=\"hidden\" name=\"name\" value=\"$name\" />";
         echo "<input type=\"hidden\" name=\"username\" value=\"$user\" />";
         echo "<input type=\"hidden\" name=\"password\" value=\"$pw\" />";
         echo "<input type=\"hidden\" name=\"gender\" value=\"$gender\" />";
         echo "<input type=\"hidden\" name=\"address\" value=\"$address\" />";
         echo "<input type=\"hidden\" name=\"tel\" value=\"$tel\" />";
         echo "<input type=\"hidden\" name=\"email\" value=\"$email\" />";
         echo "<input type=\"hidden\" name=\"icon\" value=\"$icon\" />";
         echo "<center> <input type=\"submit\" name=\"Submit\" value=\"Back\"></center> </form>";
        ?>
    </body>
</html>
