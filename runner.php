<?php

require_once 'calculator.php';

$variable = $_GET['data_array'];

$calculator = new Calculator($variable);

$calculator->splitString();

$calculator->num_array = $calculator->breakDownArray($calculator->num_array, 3);

$calculator->calculateEquation($calculator->num_array);

//check first
//if one contains ^ run the exponent run function and replace the last value of the previous array and replace the first index of the next array
//then delete that array that holds one value

//check second
//continue this for / and *
//still delete the evaluated arrays that would only hold one number

//check last
//lastly do + or -
//flatten end result and return as a number

// then if one contains / or *
// run function and store that value in that array

//then if one contains + or -
//run function


//handle how many operators are in the string
//currently only handling one operator


$calculator->roundNumber($calculator->result);

echo $calculator->getResult();

?>