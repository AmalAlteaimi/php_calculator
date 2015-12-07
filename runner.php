<?php

require_once 'calculator.php';

$variable = $_GET['data_array'];

$calculator = new Calculator($variable);

$calculator->splitString();

$calculator->num_array = $calculator->breakDownArray($calculator->num_array, 3);

$calculator->findExponent($calculator->num_array);

// $calculator->calculateEquation($calculator->num_array);



$calculator->roundNumber($calculator->result);

echo $calculator->getResult();

?>