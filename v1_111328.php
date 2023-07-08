<?php
function generatePassword() {
  $password = '';
  for ($i = 0; $i < 5; $i++) {
    $password .= rand(0, 9);
  }
  for ($i = 0; $i < 5; $i++) {
    $password .= chr(rand(97, 122));
  }
  return $password;
}

$passwords = array();

for ($i = 0; $i < 10; $i++) {
  do {
    $password = generatePassword();
  } while (in_array($password, $passwords) || ($i > 0 && $password[0] == $passwords[$i - 1][0]));

  if (strpos($password, 'ww') === false) {
    $password = substr_replace($password, 'ww', rand(0, 8), 2);
  }

  $digitsSum = array_sum(str_split($password, 1));
  if ($digitsSum <= 20) {
    $password = substr_replace($password, rand(0, 9), strpos($password, strval(rand(0, 9))), 1);
  }

  $passwords[] = $password;
}

foreach ($passwords as $password) {
  echo $password . ' ';
}

?>
