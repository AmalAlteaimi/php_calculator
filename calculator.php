<?php

class Calculator {

  public $equation;
  public $result = 0;
  public $num_array = [];


  public function __construct($inputString)
  {
    $this->equation = $inputString;
  }

  public function getResult(){
    return $this->result;
  }

  public function getEquation(){
    return $this->equation;
  }

  public function roundNumber($number){
    $this->result = round($number, 5);
  }

  public function resetEquation(){
    return $this->equation = 0;
  }

  public function splitString(){
    $this->num_array = explode(" ", $this->equation);
  }

  public function selectOperator($array){
    if ($array[1] == "+") {
      $this->addition($array);

    } elseif($array[1] == "-") {
      $this->subtraction($array);

    }elseif($array[1] == "*") {
      $this->multiplication($array);

    }elseif($array[1] == "/") {
  $this->division($array);

    }elseif($array[1] == "^") {
      $this->exponents($array);

    }else {
      return " ";
    }
  }

  public function addition($array){
    $first_num = reset($array);
    $second_num = end($array);

    return $this->result = floatval($first_num) + floatval($second_num );

  }

  public function subtraction($array){
    $first_num = reset($array);
    $second_num = end($array);

    return $this->result = floatval($first_num) - floatval($second_num );

  }

  public function multiplication($array){
    $first_num = reset($array);
    $second_num = end($array);

    return $this->result = floatval($first_num) * floatval($second_num );

  }

  public function division($array){
    $first_num = reset($array);
    $second_num = end($array);

    return $this->result = floatval($first_num) / floatval($second_num );

  }

  public function exponents($array){
    $first_num = reset($array);
    $second_num = end($array);

    return $this->result = pow($first_num, $second_num);

  }

  public function breakDownArray($input_array, $length){
    $max_starting_index_point = count($this->num_array)-3;
    $place_holder = array();
    for ($i = 0; $i <= $max_starting_index_point; $i+=2 ){
      $sub_array = array_slice($input_array, $i, $length);
      array_push($place_holder,$sub_array);
    }
    return $place_holder;
  }


//takes in array which holds multiple sub arrays
//outputs result, thats a completely calculated equation

  public function calculateEquation($array){
    $place_holder = 0;
    //look into storing initial data
    //[[1, +, 1], [-, 3], [+, 4]]
    $length = count($array);
    for ($i = 0; $i <= $length; $i++ ){
      if ($i < count($array)){

        $new_num = $this->selectOperator($array[$i]);
        $array[$i + 1][0] = $new_num;
        unset($array[$i]);

      } else {
        return $place_holder = $this->selectOperator($array[$i]);
      }
    }
    return $this->result = $place_holder;
  }

}

?>