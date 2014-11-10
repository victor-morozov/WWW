<?php

function One()
{
    echo "qwe";
}
?>

<html>
  <head>
    <title>Calculator</title>	<!-- title for browser page -->
  </head>
 
  <body>
    <form name="form1" method="post" action="">	<!-- form to enter expression -->
      <h1>Calculator</h1>
      <input type="button" name="1" value="1" onclick="One()">


      <p>Enter expression here:</p>
      <input type="text" name="textfield">
      <input type="submit" value="Submit">		<!-- Submit button -->
    </form>
  </body>
</html>

<?php
if (isset($_POST['textfield']))	// if string with expression was posted
{
  // calculation script
  $mainstring=$_POST['textfield'];	// receive string with expression
  echo "Expression: ".$mainstring."<br><br>";	// print the string
  $elements = explode(" ",$mainstring);	// divide the string to separate elements (numbers and operation symbols)
  $elem_num = count($elements);	// get number of array elements
  $cur_elem_num = 1;	// number of current elemets
  $result = $elements[0];	// calculation result will be accumulated here

  while ($cur_elem_num < $elem_num)
    {
      switch ($elements[$cur_elem_num])
        {
          case "+": $result = $result + $elements[$cur_elem_num + 1]; break;
          case "-": $result = $result - $elements[$cur_elem_num + 1]; break;
          case "*": $result = $result * $elements[$cur_elem_num + 1]; break;
          case "/": $result = $result / $elements[$cur_elem_num + 1]; break;
        }
      $cur_elem_num = $cur_elem_num + 2;
    }
  echo "<h2>Result: ".$result."</h2>";


//phpinfo();exit;

$host = "localhost";
$user = "root";
$password = "";


// Производим попытку подключения к серверу MySQL:
$link = mysql_connect($host, $user, $password);
if (!$link) {
    die('Can not connect to : ' . mysql_error());
}

    $db = "proba";
    $table = "calcdata";

//    $db_selected = mysql_select_db($db, $link);
//    if (!$db_selected) {
//        die ('Can not connect to base'.' '.$db. mysql_error());
//    }

    // Выбираем базу данных:
    mysql_select_db($db);
    //echo "ERROR ".mysql_errno()." ".mysql_error()."\n";


    // SQL-запрос:
    //echo gettype ( $mainstring);
    //$mainstring=strval($mainstring);
    //$q = mysql_query ("INSERT INTO $table (expression,result) VALUES(strval($mainstring),strval($result))");

    //var_dump("INSERT INTO $table VALUES($mainstring,$result)");

    $q = mysql_query ("INSERT INTO $table VALUES('$mainstring','$result')");
    //echo "ERROR ".mysql_errno()." ".mysql_error()."\n";

    echo("<h1> Calculation history</h1>");

    $q = mysql_query ("SELECT * FROM $table");
    //echo "ERROR ".mysql_errno()." ".mysql_error()."\n";

    $rows = mysql_num_rows($q);
    //$fields = mysql_num_fields($q);

    echo "<pre>";
    for ($c=0; $c<$rows; $c++) {
        echo mysql_result($q, $c, 0)." = ".mysql_result($q, $c, 1);
        echo "\n";
    }
    echo "</pre>";


    // Выводим таблицу:
    //for ($c=0; $c<mysql_num_rows($q); $c++)
  //  {
//        echo "<tr>";

    //$f = mysql_fetch_array($q);
    //echo "<td>$f[email]</td><td>$f[name]</td><td>$f[month]</td>";
    //echo "<td>$f[day]</td><td>$[s]</td>";

    //echo "</tr>";
    //}
//echo "</table>";
    exit();

//}
}
?>

