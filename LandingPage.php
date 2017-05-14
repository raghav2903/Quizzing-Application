<!DOCTYPE html>
<html>
<body bgcolor="#E6E6FA">
<div style="width:800px;height:800px; margin:0 auto;">
    
<?php
$score =0;
session_start();
$col1 = array();
$col2 = array();
$elements = array();
$_SESSION['count'] = 10;
if (!isset($_SESSION['views'])) 
{ 
    $_SESSION['views'] = 1;
}
if($_SESSION['views']>= $_SESSION['count'])
{
    $_SESSION['views'] = 1;
}
//$l = $_SESSION['views'];
//echo $l;
echo $_SESSION['views'];

$n=1;
$n1=1;
$n2=rand(3,10);


while($n2==$n1)
{
    $n2=rand(2,10);
}

$atsel[0]="X$n1";
$atsel[1]="X$n2";   

$X1=$atsel[0];
$X2=$atsel[1];

echo "<br>";


$link = mysqli_connect("localhost","root","","mtf");

if (mysqli_connect_errno())

  {

  	echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

$selected=mysql_select_db("mtf",$link) or die ('could not Select database');


$q4 = mysqli_query($link,"UPDATE table_$n SET $X2 = NULL WHERE $X2 = '';");
$q = mysqli_query($link,"CREATE VIEW GEN AS SELECT DISTINCT $X1,$X2 FROM table_$n WHERE $X2 IS NOT NULL LIMIT 500 OFFSET 2");
$q1 = mysqli_query($link,"SELECT $X1,$X2 FROM GEN GROUP BY $X2 ORDER BY rand() LIMIT 5 ;");
$q2 = mysqli_query($link,"SELECT $X1,$X2 FROM table_$n ");
$q3 = mysqli_query($link,"SELECT $X1,$X2 FROM table_$n WHERE X0 = 2");

$ln1 = mysqli_fetch_array($q2,MYSQL_ASSOC);
    
    echo "<br/>";
    //echo "<p style='color:grey;'>";
    echo "<br />";
    echo "<b><i>Q:&nbsp;</i></b>";
    foreach ($ln1 as $col_value1)
    { 
         echo "<th><b><u>$col_value1</style></u></b></th>";
    }
    //echo "</p>";
    echo "<br>";echo "</br>";
    echo "<i>(Instructions: Match the description in the first column with its matching option in the Answers column)</i>";
    echo "<br>";echo "</br>";echo "<br>";echo "</br>";

$ln2 = mysqli_fetch_array($q3,MYSQL_ASSOC);
echo "<table border='1' width='700' cell spacing='5'>";
echo "<tr>";

    foreach ($ln2 as $col_value2)
    { 
         echo "<th><font size = 4>$col_value2</font></th>";
    }
    echo "<th><font size = 4>Answers</font></th>";

echo "</tr>";
$i=0;
$j=0;
//echo "<br>";

while($ln=mysqli_fetch_array($q1,MYSQL_ASSOC))
{    
    $col1[$i++] = $ln[$X1];

    $col2[$j++] = $ln[$X2];

}

$col3 = $col2;
$op0 = $col3[0];
$op1 = $col3[1];
$op2 = $col3[2];
$op3 = $col3[3];
$op4 = $col3[4];


shuffle($col2);


?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<form method="post"> 
    <?php
    $elements = $col2;
    echo "<tr>";
    $l = 65;
    for($i=0;$i<5;$i++)
    {
    $str = chr($l);
    $l = $l+1;
    $k=$i+1;
    echo "<td>&nbsp";echo $_SESSION['views'];echo ")&nbsp;&nbsp;&nbsp;$col1[$i]</td>";
    $_SESSION['views'] = $_SESSION['views']+1;
    echo "<td>&nbsp;$str)&nbsp;&nbsp;&nbsp;$elements[$i]</td>";
    echo "<td>";
    echo "<select name='Element$i'>";
    ?>
     <option value="1">None</option>
    <?php
    $m =65; 
    foreach($elements as $option)
    {   
    $str1 = chr($m);
    echo " &nbsp;<option value='{$option}'>$str1)&nbsp;&nbsp;&nbsp;$option</option>";
    $m = $m+1;
    }

    echo "</select>";
    echo "</td>";
    echo "</tr>";

    }

    echo "</table>";   
    echo "<br />";
    echo "<br />";
    echo "<br />";
   ?>
   <input type="submit" name="submit1" value="Submit Answers and Proceed"/>
   <?php
if ( isset($_POST["submit1"])) 
{   
    $_SESSION['views'] = $_SESSION['views']-5;
    for($m=0;$m<5;$m++)
    {

        $val[$m] = $_POST["Element$m"];
        $_SESSION['val'] = $val;
        $cal[$m] = $_POST["Set$m"];
        $_SESSION['cal'] = $cal;
        /*if($val[$m] == $cal[$m])
        {
            $score = $score+4;
        }
        else if($val[$m] == 1)
        {
            $score = $score;
        }
        else
        {
            $score = $score -1;
        }
        echo $score;*/
    ?>
    <script type="text/javascript">
    window.location = "http://127.0.0.1/test1.php";
    </script> 
<?php    
    }
    /*echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    $_SESSION['score'] = $score;
    echo "<b>Your score in the previous question is $score<b>";*/
   
}
?>
<script>
$(document).ready(function(){
$('#h0').hide();
$('#h1').hide();
$('#h2').hide();
$('#h3').hide();
$('#h4').hide();
});
</script>
   <?php 
   
    echo "<select name='Set0' id = 'h0'>";

     echo "<option value='{$op0}'>{$op0}</option>";

    echo "</select>";
    
  echo "<select name='Set1' id = 'h1'>";

     echo"<option value='{$op1}'>{$op1}</option>";

    echo "</select>";
  
  echo "<select name='Set2' id = 'h2'>";

     echo "<option value='{$op2}'>{$op2}</option>";

    echo "</select>";

  echo "<select name='Set3' id = 'h3'>";

     echo "<option value='{$op3}'>{$op3}</option>";

    echo "</select>";
    
  echo "<select name='Set4' id = 'h4'>";

    echo "<option value='{$op4}'>{$op4}</option>";

    echo "</select>";        
    ?>
</form>

</html>
<?php
$q2 = mysql_query("DROP VIEW GEN;");

mysql_close($link);

$max = count($ln) - 1;

?>
</div>
</body>
</html>