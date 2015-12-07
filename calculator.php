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

    $this->result = floatval($first_num) + floatval($second_num);

  }

  public function subtraction($array){
    $first_num = reset($array);
    $second_num = end($array);

    $this->result = floatval($first_num) - floatval($second_num );

  }

  public function multiplication($array){
    $first_num = reset($array);
    $second_num = end($array);

    $this->result = floatval($first_num) * floatval($second_num );

  }

  public function division($array){
    $first_num = reset($array);
    $second_num = end($array);

    $this->result = floatval($first_num) / floatval($second_num );

  }

  public function exponents($array){
    $first_num = reset($array);
    $second_num = end($array);

    $this->result = pow(floatval($first_num), floatval($second_num));

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

  // public function calculateEquation($array){
  //   $length = count($array);
  //   for ($i = 0; $i <= $length; $i++ ){
  //     if ($i < $length){
  //       $this->selectOperator($array[$i]);
  //       $array[$i + 1][0] = $this->result;
  //       unset($array[$i]);

  //     } else {
  //       $this->selectOperator($array[$i]);
  //     }
  //   }
  //   return $this->result;
  // }

  //input array that hasnt taken into account the order of operations


  // public function orderOperations($array){
  //   //first check, the array
  //   findExponent($array);

  // }

  public function findExponent($array){
    $updated_array = array();
    for($i = 0; $i <= count($array); $i++ ){
      if ($array[$i][1] == "^"){
          $this->selectOperator($array[$i]);
          $array[$i] = array($this->result);

          var_dump($array);
          $updated_array = $array;
          var_dump($updated_array);
          $updated_array = $this->replaceNeighbors($updated_array, $i, $this->result);
          // var_dump($updated_array);
          unset($updated_array[$i]);
          // var_dump($updated_array);
          $this->findExponent($updated_array);
        } else {
          $this->findMultiDivi($updated_array);
        }
      }
    }

  public function findMultiDivi($array){
    $updated_array = array();
    for($i = 0; $i <= count($array); $i++ ){
        if ($array[$i][1] == "*" || $array[$i][1] == "/"){
          $this->selectOperator($array[$i]);
          $array[$i] = array($this->result);
          $updated_array = $array;

          $updated_array = $this->replaceNeighbors($updated_array, $i, $this->result);

          unset($updated_array[$i]);
          $this->findMultiDivi($updated_array);
        } else {
          $this->findAddSub($updated_array);
        }
      }
    }

    public function findAddSub($array){
      for($i = 0; $i <= count($array); $i++ ){
      if ($array[$i][1] == "+" || $array[$i][1] == "-"){
        $this->selectOperator($array[$i]);
        $array[$i] = array($this->result);
        $updated_array = $array;

        $updated_array = $this->replaceNeighbors($updated_array, $i, $this->result);

        unset($updated_array[$i]);
        $this->findAddSub($updated_array);
      } else {
        return $this->result;
        }
      }
    }

  public function hasNeighbors($array, $index){
    if (($array[$index + 1] == true) || ($array[$index - 1] ==true)) {
      return true;
    } else {
      return false;
    }
  }

  public function replaceNeighbors($array, $index, $value){

    if ($this->hasNeighbors($array, $index) == true){
      if($array[$index + 1] == true && $array[$index - 1] == true){

        $array[$index + 1][0] = $value;
        $array[$index -1][-1] = $value;

      }elseif($array[$index + 1] == true){

        $array[$index + 1][0] = $value;

      }elseif($array[$index - 1] == true){
        $array[$index -1][-1] = $value;

      } else {
        //should never actually get here
        return $array;
      }
    } else {
      return $array;
    }
  }



}


// 1 + 4 / 2 = 3
//input of reorder function
// [1 + 4], [4 / 2]
//output of reorder function
//[4 / 2], [1 + 4]
//evaluate
//[2], [1 + 4]
//replace
//[1 + 2]


?>