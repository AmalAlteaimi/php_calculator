<!DOCTYPE html>
<html>
  <head>
<!--   <?php
// require_once 'calculator.php';
        // require_once 'runner.php';
  ?>
 -->
  <title>Calculator</title>
  <link rel="stylesheet" type="text/css" href="calculator.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Exo:400,600' rel='stylesheet' type='text/css'>
  <script src="jquery-1.11.3.min.js"></script>
  <script src="calculator.js"></script>
  </head>
    <body>

    <div class="container">
      <h1> My Calculator </h1>
      <form action="calculator.php" method = "GET">
        <input class="u_input"type="text" name="user_input">
        <button class="enter" name="Calculate" type="submit" value="">Calculate</button>
      </form>

      <div class="keys">
        <button id="one" class="button-key" type="submit" value=1>1</button>
        <button id="two" class="button-key" type="submit" value=2>2</button>
        <button id="three" class="button-key" type="submit" value=3>3</button>
        <button id="plus" class="button-key" type="submit" value="+">+</button>


        <br>
        <button id="four" class="button-key" type="submit" value=4>4</button>
        <button id="five" class="button-key" type="submit" value=5>5</button>
        <button id="six" class="button-key" type="submit" value=6>6</button>
        <button id="minus" class="button-key" type="submit" value="-">-</button>
        <br>


        <button id="seven" class="button-key" type="submit" value=7>7</button>
        <button id="eight" class="button-key" type="submit" value=8>8</button>
        <button id="nine" class="button-key" type="submit" value=9>9</button>
        <button id="multiply" class="button-key" type="submit" value="*">*</button>
        <br>


        <button id="carrot" class="button-key" type="submit" value="^">^</button>
        <button id="negative" class="button-key" type="submit" value="-">(-)</button>
        <button id="decimal" class="button-key" type="submit" value=".">.</button>
        <button id="divide" class="button-key" type="submit" value="/">/</button>
      </div>

    </div>

    <div class="result">
        <h2>Result</h2>
        <p class="calc_output">hi</p>
    </div>

    </body>
</html>
