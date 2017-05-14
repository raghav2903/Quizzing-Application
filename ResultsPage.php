<!DOCTYPE html>
<html>
<body bgcolor="#E6E6FA">
<?php
session_start();
$k =1;
echo "<font size = 4><p align = center><b><u>Overview Of the Results</u></b></p></font>";
 echo "<i><p align = center>(Note: Every correct answer shall be awarded 4 marks and a penalty of 1 mark shall be levied for every incorrect answer)</p></i>";
echo "<br>";echo "</br>";
echo "$k)&nbsp;&nbsp;Total number of Questions:&nbsp;"; echo $_SESSION['count'];$k++;echo "<br>";echo"</br>";
$x = $_SESSION['count'] - $_SESSION['nattempt'];
echo "$k)&nbsp;&nbsp;Number of Questions Attempted:&nbsp$x";$k++;echo "<br>";echo"</br>";
echo "$k)&nbsp;&nbsp;Number of Questions not Attempted:&nbsp;"; echo $_SESSION['nattempt'];echo "<br>";echo "</br>";$k++;
echo "$k)&nbsp;&nbsp;Number of Questions answered correctly:&nbsp;"; echo $_SESSION['correct'];echo "<br>";echo "</br>";$k++;
echo "$k)&nbsp;&nbsp;Number of Questions answered incorrectly:&nbsp;"; echo $_SESSION['wrong'];echo "<br>";echo "</br>";$k++;
$max = ($_SESSION['count']*4);
echo "$k)&nbsp;&nbsp;Maximum marks:&nbsp $max";echo "<br>";echo "</br>";$k++;
$obt = (($_SESSION['correct']*4)-($_SESSION['wrong']));
echo "$k)&nbsp;&nbsp;Marks Obtained:&nbsp $obt";echo "<br>";echo "</br>";$k++;
$_SESSION['wrong'] = 0;
$_SESSION['correct'] = 0;
$_SESSION['nattempt'] = 0;
?>
</body>
</html>	