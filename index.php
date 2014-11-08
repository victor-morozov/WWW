<html>
  <head>
    <title>Calculator</title>	// title for browser page
  </head>
 
  <body>
    <form name="form1" method="post" action="">	// form to enter expression
      <h1>Calculator</h1>
      <p>Enter expression here:</p>
      <input type="text" name="textfield">
      <input type="submit" value="Submit">		// Submit button
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
}
?>

