<?php
function decimal_to_binary($input_number)
{
    if ($input_number == 0) {
        return '0';
    }

    $negative = false;
    if ($input_number < 0) {
        $negative = true;
    }

    $array = array();

    while (abs($input_number) > 0) {
        $array[] = abs($input_number) % 2;
        $input_number =(int)$input_number/ 2;
     
    }

    if ($negative == true) {
        return "-" . implode("", array_reverse($array));
    } else {
        return implode("", array_reverse($array));
    }
}

  function decimal_to_roman($input_number) {
    $input_number = abs($input_number);
    if ($input_number > 3999999) {
        return "Invalid input";
    }

    $roman_number = '';
    $decimal_values = array(
        1000, 900, 500, 400,
        100, 90, 50, 40,
        10, 9, 5, 4, 1
    );
    $roman_symbols = array(
        'M', 'CM', 'D', 'CD',
        'C', 'XC', 'L', 'XL',
        'X', 'IX', 'V', 'IV',
        'I'
    );

    for ($i = 0; $i < count($decimal_values); $i++) {
        while ($input_number >= $decimal_values[$i]) {
            $roman_number .= $roman_symbols[$i];
            $input_number -= $decimal_values[$i];
        }
    }

    return $roman_number;
}

function roman_to_decimal($input_number) {
    $decimal_number = 0;
    $decimal_values = array(
        1000, 900, 500, 400,
        100, 90, 50, 40,
        10, 9, 5, 4, 1
    );
    $roman_symbols = array(
        'M', 'CM', 'D', 'CD',
        'C', 'XC', 'L', 'XL',
        'X', 'IX', 'V', 'IV',
        'I'
    );

    for ($i = 0; $i < count($decimal_values); $i++) {
        while (strpos($input_number, $roman_symbols[$i]) === 0) {
            $decimal_number += $decimal_values[$i];
            $input_number = substr($input_number, strlen($roman_symbols[$i]));
        }
    }

    return $decimal_number;
}


function binary_to_decimal($binary_number) {
    $decimal_number = 0;
    $length = strlen($binary_number);

    for ($i = 0; $i < $length; $i++) {
        $decimal_number += intval($binary_number[$length - 1 - $i]) * pow(2, $i);
    }

    return $decimal_number;
}

function check_input($input_array){
  $temp = '';
  for($i = 0; $i<count($input_array);$i++){
         
    if(ctype_alpha($input_array[$i])){
      $temp = roman_to_decimal($input_array[$i]);
      echo "This roman date ".$input_array[$i]." converted into decimal is:" .$temp . '<br/>';
      echo "This roman date ".$input_array[$i]." converted into binary is: " . decimal_to_binary($temp) . '<br/>';
       
    }
    else if (preg_match('/^[01]+$/', $input_array[$i])){
      $temp = binary_to_decimal($input_array[$i]);
       echo "This binary number ".$input_array[$i]." converted into decimal is: " . $temp . '<br/>';
       echo "This binary number ".$input_array[$i]." converted into roman date is: " . decimal_to_roman($temp). '<br/>';
    }
    else if(is_numeric($input_array[$i])){
      echo "This decimal number ".$input_array[$i]." converted into binary is: " . decimal_to_binary($input_array[$i]). '<br/>';
      echo "This decimal number ".$input_array[$i]." converted into roman is: " . decimal_to_roman($input_array[$i]) . '<br/>';
    }
    else echo "unknown input " . $input_array[$i] . "<br>";

  }
  
}
$array = ['+10', '10XaA0', '+545', '001', 'IV', 'XV', '12', '-3999999', '+4000000', '01101'];
check_input($array);

