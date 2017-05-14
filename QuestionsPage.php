<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<body bgcolor="#E6E6FA">
<div style="width:800px;height:800px; margin:0 auto;">
<script>
function myButton()
{
window.location="http://127.0.0.1/test.php";
}
function myButton1()
{
window.location="http://127.0.0.1/test2.php";
}
</script>
<?php
session_start();
echo "<br>";echo "</br>";
echo "<font size = 4><b><u>Solution</u></b></font>";
$x = $_SESSION['count'];
echo $_SESSION['views'];
$color1 = array();
$color2 = array();
echo "<br />";echo "<br />";echo "<br />";echo "<br />";
echo"&nbsp;";echo "<table border=1 class=inlineTable style=width:40%;float:left;>";
echo "<th>Correct Answers<th>";
 echo "<tr>";
 $l = 65;
 $i = 0;
 foreach($_SESSION['cal'] as $key=>$value)
    { 
            $str = chr($l);
            $l = $l+1;
            $color1[$i++] = $value;
            echo "<td>";echo "$str)&nbsp;&nbsp;&nbsp;$value</div>";echo"</td>";
            echo "</tr>";
    }
    echo "</table>";
    echo "<table border=1 class=inlineTable style=width:40%;float:left;>";
    echo "<th>Submitted Answers</th>";
    echo "<tr>";
    $j=0;
  foreach($_SESSION['val'] as $key=>$value)
    {
        if($color1[$j] == $value )
        {  
           $score = $score+4;
           echo "<td>";echo "<div style ='color:#1FC306'>&nbsp;&nbsp;&nbsp;$value</div>";echo "</td>";
           echo "</tr>";
           if (!isset($_SESSION['correct'])) 
           { 
            $_SESSION['correct'] = 0;
           }
           else
          {
           $_SESSION['correct'] = $_SESSION['correct']+1;
          }
          $j++;
        }
        else if($value == 1)
        {
            $score = $score;
            echo "<td>";echo "<div style ='color:#F41F1F'>&nbsp;&nbsp;&nbsp;Not Attempted</div>";echo "</td>";
            echo "</tr>";
            if (!isset($_SESSION['nattempt']))
            { 
             $_SESSION['nattempt'] = 0;
            }
            else
            {
             $_SESSION['nattempt'] = $_SESSION['nattempt']+1;
            }
            $j++;
        }
        else
        {   
            $score = $score-1;
            echo "<td>";echo "<div style ='color:#F41F1F'>&nbsp;&nbsp;&nbsp;$value</div>";echo "</td>";
            echo "</tr>";
            if (!isset($_SESSION['wrong'])) 
            { 
             $_SESSION['wrong'] = 0;
            }
            else
            {
             $_SESSION['wrong'] = $_SESSION['wrong']+1;
            }
            $j++;
        }
    }
    echo "</table>";
    echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";
 $total = $total + $score;
 echo "<p style='font-size:150%'><b><font color='black'>Your score is $score/20</font></b></p>";
if($_SESSION['views'] == 1)
{
    echo "You have finished your Quiz.Please Click on overall stats to get an overview of your result.";
    echo "<br>";echo "</br>";
     ?>
    <script>
    $(document).ready(function()
    {
    $('#h5').hide();
    });
    </script>
    <?php 
}
?>
<br></br>
<button id = 'h5' onclick="myButton()">Next Question</button>
<button onclick="myButton1()">Overall Stats</button>
</div>
</body>
</html>