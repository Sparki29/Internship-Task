<?php

// -----------------------------------------------------------------------------------------------------------
// Bootstrap the terminal itself.
//
// DO NOT DELETE THIS LINE.
// -----------------------------------------------------------------------------------------------------------
require_once __DIR__ . '/src/bootstrap.php';


// -----------------------------------------------------------------------------------------------------------
// Place your code below
// -----------------------------------------------------------------------------------------------------------
$possibleCodes = getAllPossible();

function findMatchingChars(int $codeCheck, int $nextCheck): int 
 {
   $matched = 0;
   $pass1Arr = str_split($codeCheck);
   foreach (str_split($nextCheck) as $key => $digit) 
   {
      if ($digit === $pass1Arr[$key]) 
      {
          $matched++;
      }
   }
   return $matched;
}

for ($attempt = 0;$attempt < 5; $attempt++)
{

$randomCode= rand(0,count($possibleCodes)-1);  
$codeCheck = $possibleCodes[$randomCode];
$similarity = attempt($codeCheck);

  if ($similarity != 0)
  {
    for ($cases = 0; $cases <count($possibleCodes); $cases++)
    {
        if (findMatchingChars($codeCheck, $possibleCodes[$cases]) < $similarity) 
        {
            $possibleCodes = array_diff($possibleCodes, array($possibleCodes[$cases], $codeCheck));
            $possibleCodes = array_values($possibleCodes);
        }
    }
  }
}
print_r("\n\r> No attempts remaining. \n\r");