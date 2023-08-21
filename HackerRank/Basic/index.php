<?php

function plusMinus($arr) {
    $n = count($arr);

    $positiveNumbersCount = 0;
    $negativeNumbersCount = 0;
    $zerosCount           = 0;

    for ($i = 0; $i < $n; $i++) { 
        if ($arr[$i] > 0) { 
            
            $positiveNumbersCount++;
        } elseif ($arr[$i] < 0) { 
            
            $negativeNumbersCount++;
        } elseif ($arr[$i] == 0) { 
            
            $zerosCount++;
        }        
    }

    $positiveNumbersRatio = $positiveNumbersCount/$n;
    $negativeNumbersRatio = $negativeNumbersCount/$n;
    $zerosRatio           = $zerosCount/$n;

    echo round($positiveNumbersRatio, 6) . "\n";
    echo round($negativeNumbersRatio, 6) . "\n";
    echo round($zerosRatio, 6)           . "\n";
}

/*********************************************************************************************************************************************/


function miniMaxSum($arr) {
    $arr_length = count($arr);
    
    $current_minimum_number = 1000000000; 
    $current_maximum_number = 0;          

    $sum = 0;

    
    for ($i = 0; $i < $arr_length; $i++) {
        $sum += $arr[$i];

        if ($arr[$i] < $current_minimum_number) { 
            $current_minimum_number = $arr[$i];
        }

        if ($arr[$i] > $current_maximum_number) { 
            $current_maximum_number = $arr[$i];
        }
    }


    $minSum = $sum - $current_maximum_number;
    $maxSum = $sum - $current_minimum_number;


    echo $minSum . ' ' . $maxSum;
}



/*********************************************************************************************************************************************/



function timeConversion($s) {
    $hours   = (string) $s[0] . $s[1]; 
    $minutes = (string) $s[3] . $s[4]; 
    $seconds = (string) $s[6] . $s[7]; 
    $AmOrPm  = (string) $s[8];

    if ($hours == '12' && $AmOrPm == 'A') { 
        $hours = '00';
    }

    if ($hours < '12' && $AmOrPm == 'P') { 
        $hours += 12;
    }

    
    return sprintf('%s:%s:%s', $hours, $minutes, $seconds);
}



/*********************************************************************************************************************************************/



function matchingStrings($strings, $queries) {
    $strings_length = count($strings);
    $strings_frequency_array = []; 

    for ($i = 0; $i < $strings_length; $i++) {
        if (array_key_exists($strings[$i], $strings_frequency_array)) { 
            $strings_frequency_array[$strings[$i]]++;
        } else { 
            
            $strings_frequency_array[$strings[$i]] = 1;
        }
    }


    $queries_length = count($queries);
    $resultArray = [];

    for ($i = 0; $i < $queries_length; $i++) {
        if (array_key_exists($queries[$i], $strings_frequency_array)) { 
            $resultArray[] = $strings_frequency_array[$queries[$i]];
        } else {
            $resultArray[] = 0;
        }
    }


    return $resultArray;
}



/*********************************************************************************************************************************************/



function lonelyinteger($a) {
    $uniqueElement = 0; 

    foreach ($a as $number) { 
        
        $uniqueElement ^= $number; 
    }


    return $uniqueElement;
}



/*********************************************************************************************************************************************/



function flippingBits($n) {
    return $n ^ 0xFFFFFFFF;
}



/*********************************************************************************************************************************************/



function diagonalDifference($arr) {
    $last_arr_index = count($arr) - 1; 
    $left_to_right_diagonal_sum = 0;
    $right_to_left_diagonal_sum = 0;

    foreach ($arr as $key => $array) {
        $left_to_right_diagonal_sum += $array[$key]; 
        $right_to_left_diagonal_sum += $array[$last_arr_index - $key]; 
    }


    return abs($left_to_right_diagonal_sum - $right_to_left_diagonal_sum); 
}



/*********************************************************************************************************************************************/



function countingSort($arr) {
    
    $frequencyArray = array_fill(0, 100, 0); 
    
    foreach ($arr as $number) { 
        $frequencyArray[$number]++; 
    }
 

    return $frequencyArray;
}



/*********************************************************************************************************************************************/



function pangrams($s) { 
    $s_lowerCase      = strtolower($s); 
    $no_spaces_string = str_replace(' ', '', $s_lowerCase); 
    $no_spaces_array  = str_split($no_spaces_string); 
    $no_spaces_array_length = count($no_spaces_array);

    
    $english_alphabet_positions_array = array_fill(1, 26, false);
    

    for ($i = 0; $i < $no_spaces_array_length; $i++) {
        
        if (ord($no_spaces_array[$i]) >= ord('a') && ord($no_spaces_array[$i]) <= ord('z')) {    
            
            $letter_position_in_English_alphabet = ord($no_spaces_array[$i]) - ord('a') + 1; 
            $english_alphabet_positions_array[$letter_position_in_English_alphabet] = true; 
        }
    }


    return !in_array(false, $english_alphabet_positions_array) ? 'pangram' : 'not pangram'; 
}



/*********************************************************************************************************************************************/



function twoArrays($k, $A, $B) {
    
    sort($A); 
    rsort($B); 

    $A_size = count($A); 
    $answer = true;

    
    foreach ($A as $key => $A_number) {
        
        
        if ($A[$key] + $B[$key] < $k) { 
            
            $answer = false;

            break; 
        }
    }


    return $answer == true ? 'YES' : 'NO';
}



/*********************************************************************************************************************************************/


function birthday($s, $d, $m) {
    $count = 0;
    $s_size = count($s);
    $last_index = ($s_size - 1) > 0 ? ($s_size - 1) : 1; 
    

    for ($i = 0; $i < $last_index; $i++) { 
        

        $sum = 0;
        for ($j = $i; $j < $i + $m; $j++) {
            
            if ($j == $s_size) { 
                break; 
            }

            $sum += $s[$j]; 
            
        }

        if ($sum == $d) {
            $count++;
        }
    }


    return $count;
}



/*********************************************************************************************************************************************/



function strings_xor(string $s, string $t) {
    
    $s_length = strlen($s);
    $result = '';

    for ($i = 0; $i < $s_length; $i++) {
        if ($s[$i] == $t[$i]) { 
            $result .= '0'; 
        } else { 
            $result .= '1'; 
        }
    }

    
    return $result;    
}



/*********************************************************************************************************************************************/



function fizzBuzz($n) {
    for ($i = 1; $i <= 15; $i++) {
        
        if ($i % (3 * 5) == 0) {
            echo 'FizzBuzz' . "\n";
        } elseif ($i % 3 == 0 && $i % 5 != 0) {
            echo 'Fizz' . "\n";
        } elseif ($i % 5 == 0 && $i % 3 != 0) {
            echo 'Buzz' . "\n";
        } elseif ($i % 3 != 0 && $i % 5 != 0) {
            echo $i . "\n";
        }
    }
}



/*********************************************************************************************************************************************/



function findMedian($arr) {
    sort($arr); 
    $arr_size = count($arr);
    
    
    return $arr[floor($arr_size / 2)];
}



/*********************************************************************************************************************************************/



function sockMerchant($n, $ar) {
    $frequencyArray = array_count_values($ar);

    $pairs_count = 0;
    
    foreach ($frequencyArray as $number) {
        
        if (!$number / 2 < 1) { 
            
            $pairs_count += floor($number / 2); 
        }
    }
    

    return $pairs_count;
}



/*********************************************************************************************************************************************/



function breakingRecords($scores) {
    $scores_array_length = count($scores);
    
    $currentHighestScore = $scores[0]; 
    $currentLowestScore  = $scores[0]; 

    $breakingHighestRecordCount = 0;
    $breakingLowestRecordCount  = 0;

    for ($i = 1; $i < $scores_array_length; $i++) { 
        if ($scores[$i] < $currentLowestScore) {
            $breakingLowestRecordCount++; 
            $currentLowestScore = $scores[$i]; 

        } elseif ($scores[$i] > $currentHighestScore) {
            $breakingHighestRecordCount++; 
            $currentHighestScore = $scores[$i]; 
        }
    }


    return [
        $breakingHighestRecordCount, $breakingLowestRecordCount
    ];
}



/*********************************************************************************************************************************************/



function divisibleSumPairs($n, $k, $ar) {
    $count = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) { 
            if (($ar[$i] + $ar[$j]) % $k == 0) { 
                $count++;
            }
        }
    }
    

    return $count;
}



/*********************************************************************************************************************************************/



function gradingStudents($grades) {
    $grades_length = count($grades);

    for ($i = 0; $i < $grades_length; $i++) {
        if ($grades[$i] >= 38) { 
            $gradeModFive = $grades[$i] % 5;
        }

        if ($gradeModFive >= 3) {
            $grades[$i] = $grades[$i] - $gradeModFive + 5; 
        }
    }


    return $grades;
}



/*********************************************************************************************************************************************/



function countingValleys($steps, $path) {
    
    $current_level = 0; 
    $from_minusone_to_zero_level_count = 0; 

    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') { 
            $current_level++; 

            if ($current_level == 0) { 
                $from_minusone_to_zero_level_count++;
            }

        } elseif ($path[$i] == 'D') { 
            $current_level--; 
        }
    }


    return $from_minusone_to_zero_level_count;
}




/*********************************************************************************************************************************************/



function marsExploration($s) {
    $s_length = strlen($s);
    $sos = 'SOS';
    $changes_count = 0;

    for ($i = 0; $i < $s_length; $i++) {
        if ($s[$i] != $sos[$i % 3]) {
            $changes_count++;
        }
    }


    return $changes_count;
}



/*********************************************************************************************************************************************/



function birthday_2($s, $d, $m) {
    $s_length = count($s);
    $count = 0;
    
    for ($i = 0; $i < $s_length; $i++) {
        if ($i + $m - 1 < $s_length) { 
            $sum = 0;
            
            for ($j = $i; $j <= $i + $m - 1; $j++) { 
                $sum += $s[$j];
            }

            if ($sum == $d) {
                $count++;
            }
        }
    }


    return $count;
}



/*********************************************************************************************************************************************/



function migratoryBirds($arr) {
    $arr_frequency_array = array_fill(1, 5, 0); 

    $arr_length = count($arr);

    for ($i = 0; $i < $arr_length; $i++) { 
        
        
        $arr_frequency_array[$arr[$i]]++;
    }

    


    $most_common_frequency_bird_index = 1; 
    $arr_frequency_array_length = count($arr_frequency_array);

    for ($i = 1; $i <= $arr_frequency_array_length; $i++) { 
        

        if ($arr_frequency_array[$i] > $arr_frequency_array[$most_common_frequency_bird_index]) {
            $most_common_frequency_bird_index = $i;
        }
    }


    return $most_common_frequency_bird_index;
}



/*********************************************************************************************************************************************/



function maximumPerimeterTriangle($sticks) {
    rsort($sticks); 

    $sticks_length = count($sticks);
    $third_to_last_index = $sticks_length - 2; 
    

    for ($i = 0; $i < $third_to_last_index; $i++) { 
        if ($sticks[$i] < $sticks[$i + 1] + $sticks[$i + 2]) { 
            
            return [$sticks[$i + 2], $sticks[$i + 1], $sticks[$i]]; 
        }
    }

    
    return [-1];
}



/*********************************************************************************************************************************************/


function findZigZagSequence($a, $n) {
    sort($a); 
    
    $a_length = count($a);
    $a_mid_index  = (($a_length + 1) / 2) - 1; 
    $a_last_index = $a_length - 1;
    [$a[$a_mid_index], $a[$a_last_index]] = [$a[$a_last_index], $a[$a_mid_index]];

    $st = $a_mid_index + 1; 
    $ed = $a_length - 2;    
    
    
    while ($st <= $ed) { 
        [$a[$st], $a[$ed]] = [$a[$ed], $a[$st]];
        $st++; 
        $ed--; 
    }


    return $a;
}



/*********************************************************************************************************************************************/


function pageCount($n, $p) {
    
    $number_of_flipped_pages_from_beginning = floor($p / 2);
    $n = $n % 2 == 0 ? ++$n : $n;
    $number_of_flipped_pages_from_end = floor(($n - $p) / 2);
    

    return min($number_of_flipped_pages_from_beginning, $number_of_flipped_pages_from_end);
}



/*********************************************************************************************************************************************/



function getTotalX($a, $b) {
    function getGCD(int $a, int $b) { 
        while ($a > 0 && $b > 0) {
            if ($a >= $b) {
                $a = $a % $b;
            } else {
                $b = $b % $a;
            }
        }


        return $a + $b;
    }


    function getLCM(int $a, int $b) { 
        $GCD = getGCD($a, $b);
        

        return ($a / $GCD) * $b;
    }


    $multiple = 0; 
    foreach ($b as $number) {
        $multiple = getGCD($multiple, $number);
    }
    
    
    $factor = 1; 
    foreach ($a as $number) {
        $factor = getLCM($factor, $number);

        if ($factor > $multiple) { 
            return 0;
        }
    }


    if ($multiple % $factor != 0) { 
        return 0;
    }

    
    $totalX = 1;
    for ($i = $factor; $i < $multiple; $i++) { 
        if ($multiple % $i == 0 && $i % $factor == 0) { 
            $totalX++;
        }
    }


    return $totalX;
}



/*********************************************************************************************************************************************/



function pickingNumbers($a) {
    $a_frequency_array = array_count_values($a);
    

    ksort($a_frequency_array);
    $a_frequency_array_keys = array_keys($a_frequency_array); 
    $a_frequency_array_keys_length = count($a_frequency_array_keys);
    $a_frequency_array_keys_last_index = count($a_frequency_array_keys) - 1;

    if ($a_frequency_array_keys_length == 1) { 
        return count($a);
    }


    $max_frequency_sum = 0;
    for ($i = 0; $i < $a_frequency_array_keys_last_index; $i++) { 
        if (abs($a_frequency_array_keys[$i + 1] - $a_frequency_array_keys[$i]) <= 1) {
            $max_frequency_sum = max($max_frequency_sum, $a_frequency_array[$a_frequency_array_keys[$i + 1]] + $a_frequency_array[$a_frequency_array_keys[$i]], max($a_frequency_array));
        }
    }

    
    return $max_frequency_sum;
}



/*********************************************************************************************************************************************/



function rotateLeft($d, $arr) {
    $arr_length = count($arr);
    $temporary_arr = array_slice($arr, 0, $d);

    for($i = $d; $i < $arr_length; $i++) {
        $arr[$i - $d] = $arr[$i];
    }

    for($i = $arr_length - $d; $i < $arr_length; $i++) {
        $arr[$i] = $temporary_arr[$i + $d - $arr_length];
    }


    return $arr;
}



/*********************************************************************************************************************************************/



function kangaroo($x1, $v1, $x2, $v2) {
    return $v1 > $v2 && ($x2 - $x1) % ($v1 - $v2) == 0 ? 'YES' : 'NO';
}



/*********************************************************************************************************************************************/



function separateNumbers($s) {
    if ($s[0] == 0 || strlen($s) == 1) { 
        echo 'NO' . "\n";
        return; 
    }


    $s_length      = strlen($s);
    $half_s_length = strlen($s) / 2;

    for ($i = 1; $i <= $half_s_length; $i++) { 
        $s_subString = substr($s, 0, $i);
        $s_subString_copy = $s_subString; 
        $generated_test_string = $s_subString;

        while (strlen($generated_test_string) < $s_length) { 
            $generated_test_string .= ++$s_subString_copy; 
        }


        if ($generated_test_string == $s) {
            
            echo 'YES ' . $s_subString . "\n";
            return; 
        }
    }


    echo 'NO' . "\n";
}



/*********************************************************************************************************************************************/



function closestNumbers($arr) {
    sort($arr); 
    
    $arr_length = count($arr);
    $current_minimum_difference = PHP_INT_MAX; 
    
    $answer_arr = [];


    for ($i = 1; $i < $arr_length; $i++) { 
        $two_adjacent_elements_difference = abs($arr[$i] - $arr[$i - 1]);
        
        if ($two_adjacent_elements_difference <= $current_minimum_difference) {

            
            if ($two_adjacent_elements_difference < $current_minimum_difference) {
                $current_minimum_difference = $two_adjacent_elements_difference;

                $answer_arr = []; 
            }

            array_push($answer_arr, $arr[$i - 1], $arr[$i]); 
        }
    }


    return $answer_arr;
}



/*********************************************************************************************************************************************/


function towerBreakers($n, $m) {
    if ($m == 1 || $n % 2 == 0) { 
        return 2; 
    } else { 
        return 1; 
    }
}



/*********************************************************************************************************************************************/



function minimumAbsoluteDifference($arr) {
    sort($arr); 
    $arr_length = count($arr);

    $current_minimum_absolute_difference = 10 ** 9; 

    for ($i = 1; $i < $arr_length; $i++) {
        
        
        $absolute_difference = $arr[$i] - $arr[$i - 1]; 

        if ($absolute_difference < $current_minimum_absolute_difference) {
            $current_minimum_absolute_difference = $absolute_difference;
        }
    }


    return $current_minimum_absolute_difference;
}



/*********************************************************************************************************************************************/



function caesarCipher($s, $k) {
    $s_length = strlen($s);
    $english_alphabet_k = $k % 26; 
    

    for ($i = 0; $i < $s_length; $i++) {
        $letter_ASCII_value = ord($s[$i]);
        $new_letter_position_on_ASCII = $letter_ASCII_value + $english_alphabet_k; 

        if ($letter_ASCII_value >= 65 && $letter_ASCII_value <= 90) { 
            $letter_position_on_english_alphabet       = $letter_ASCII_value - 65;
            $new_letter_position_on_english_alphabet_k = ($letter_position_on_english_alphabet + $english_alphabet_k) % 26;
            $new_letter_position_on_ASCII              = 65 + $new_letter_position_on_english_alphabet_k;

            $s[$i] = chr($new_letter_position_on_ASCII);
            

        } elseif ($letter_ASCII_value >= 97 && $letter_ASCII_value <= 122) {
            $letter_position_on_english_alphabet       = $letter_ASCII_value - 97;
            $new_letter_position_on_english_alphabet_k = ($letter_position_on_english_alphabet + $english_alphabet_k) % 26;
            $new_letter_position_on_ASCII              = 97 + $new_letter_position_on_english_alphabet_k;

            $s[$i] = chr($new_letter_position_on_ASCII);
            
        }
    }


    return $s;
}



/*********************************************************************************************************************************************/



function anagram($s) {
    $s_length      = strlen($s);
    $s_half_length = $s_length / 2;

    if ($s_length % 2 != 0) { 
        return -1;

    } else { 
        $s_string_array = str_split($s);
        

        $s_string_array_frequency_array = array_count_values($s_string_array);
        
    

        $first_half_array  = array_slice($s_string_array, 0, $s_half_length);
        
        $second_half_array = array_slice($s_string_array, $s_half_length, $s_length);
        

        $first_half_frequency_array  = array_count_values($first_half_array);
        
        $second_half_frequency_array = array_count_values($second_half_array);
        



        $number_of_occurences_differences = 0;

        foreach ($s_string_array_frequency_array as $key => $value) {
            $number_of_occurences_differences += abs(($first_half_frequency_array[$key] ?? 0) - ($second_half_frequency_array[$key] ?? 0)); 
        }
    }

    


    return $number_of_occurences_differences / 2;
}



/*********************************************************************************************************************************************/



function maxMin($k, $arr) {
    sort($arr); 
    $check_till_length_minus_k = count($arr) - $k;
    $current_minimum_difference = 10**9; 

    for ($i = 0; $i <= $check_till_length_minus_k; $i++) {
        $temporary_difference = $arr[$i + $k - 1] - $arr[$i]; 

        

        if ($temporary_difference < $current_minimum_difference) {
            $current_minimum_difference = $temporary_difference;
            
        }
    }


    return $current_minimum_difference;
}





/*********************************************************************************************************************************************/



function minimumNumber($n, $password) {
    
    

    
    
    
    
    $special_characters = '!@#$%^&*()-+';



    $types_of_characters_array = []; 

    
    
    for ($i = 0; $i < $n; $i++) {
        if (ctype_digit($password[$i])) { 
            

            
            
            $types_of_characters_array['digit'] = 'digit character'; 
        } elseif (ctype_lower($password[$i])) { 
            

            
            
            $types_of_characters_array['lower'] = 'lowercase character'; 
        } elseif (ctype_upper($password[$i])) { 
            

            
            
            $types_of_characters_array['upper'] = 'uppercase character'; 
        } elseif (strpos($special_characters, $password[$i]) !== false) {
            

            
            
            $types_of_characters_array['special_character'] = 'special character'; 
        }
    }

    


    return max(6 - $n, 4 - count($types_of_characters_array)); 


    
    
    
    
    
    
    

    
    
    
    
    
    
}





/*********************************************************************************************************************************************/



function dynamicArray($n, $queries) {
    
    $lastAnswer = 0;
    $answersArray = [];

    
    $arr = [];

    
    
    for ($i = 0; $i < $n; $i++) {
        $arr[] = [];
    }

    


    $queries_length = count($queries);

    for ($i = 0; $i < $queries_length; $i++) {
        
        
        
        
        $x = $queries[$i][1];
        $y = $queries[$i][2];

        $idx = ($x ^ $lastAnswer) % $n;

        if ($queries[$i][0] == 1) { 
            $arr[$idx][] = $y; 
            
            

        } else { 
            $lastAnswer = $arr[$idx][$y % count($arr[$idx])];
            $answersArray[] = $lastAnswer;
        }
    }

    
    


    return $answersArray;
}



















/*********************************************************************************************************************************************/


function is_smart_number($num) {
    
    $val = (int) sqrt($num); 
    

    
    if ($val * $val == $num) {  
    
    
        return true;
    }


    return false;
}














/*********************************************************************************************************************************************/



function missingNumbers($arr, $brr) {
    $frequency_array = array_fill(0, 101, 0); 
    

    $b_array_minimum_value = min($brr);
    

    foreach ($brr as $brr_number) {
        $frequency_array[$brr_number - $b_array_minimum_value]++; 
    }

    


    foreach ($arr as $arr_number) {
        $frequency_array[$arr_number - $b_array_minimum_value]--; 
    }

    
    

    $answerArray = [];

    foreach ($frequency_array as $number_minus_b_array_minimum_value => $frequency) {
        if ($frequency > 0) {
            $answerArray[] = $number_minus_b_array_minimum_value + $b_array_minimum_value;
        }
    }


    return $answerArray;
}






/*********************************************************************************************************************************************/



function countSort($arr) {
    
    
    $arr_length            = count($arr);
    $floor_half_arr_length = floor($arr_length / 2);  


    $words = [];


    for ($i = 0; $i < $floor_half_arr_length; $i++) { 
        $words[$arr[$i][0]][] = '-';
    }
    

    for ($i = $floor_half_arr_length; $i < $arr_length; $i++) { 
        $words[$arr[$i][0]][] = $arr[$i][1];
    }


    $answer = '';
    $words_length = count($words);

    for ($i = 0; $i < $words_length; $i++) {
        $answer .= ' ' . implode(' ', $words[$i]);
    }
    
    
    echo trim($answer);
}









/*********************************************************************************************************************************************/



function gridChallenge($grid) {
    $grid_length = count($grid);
    
    $one_grid_string_length = strlen($grid[0]);
    
    $sorted_grid = [];
    $good = true;

    for ($i = 0; $i < $grid_length; $i++) {
        $split_grid = str_split($grid[$i]);
        
        sort($split_grid); 
        
        $sorted_grid[] = implode($split_grid); 

        

        if ($i > 0) {
            
            

            for ($j = 0; $j < $one_grid_string_length; $j++) { 
                
                
                
                

                if ($sorted_grid[$i][$j] < $sorted_grid[$i - 1][$j]) {
                    $good = false;
                    
                    

                    break; 
                }

            }
        }
    }


    
    return $good == true ? 'YES' : 'NO';
    
}



/*********************************************************************************************************************************************/




function sansaXor($arr) {
    $arr_length = count($arr);

    if ($arr_length % 2 == 0) { 
        return 0;

    } else { 
        $val = 0;
        
        for ($i = 0; $i < $arr_length; $i += 2) { 
            

            $val ^= $arr[$i];
        }


        return $val;
    }
}




/*********************************************************************************************************************************************/



function fibonacciModified($t1, $t2, $n) {
    for ($i = 3; $i <= $n; $i++) {
        $t3 = bcadd($t1, bcpow($t2, 2));
        $t1 = $t2;
        $t2 = $t3;
    }


    return $t3;
}



/*********************************************************************************************************************************************/



function updateLeapYear($year) {
    $month = [];

    $month[1]  = 31; 
    $month[2]  = 28; 
    $month[3]  = 31; 
    $month[4]  = 30; 
    $month[5]  = 31; 
    $month[6]  = 30; 
    $month[7]  = 31; 
    $month[8]  = 31; 
    $month[9]  = 30; 
    $month[10] = 31; 
    $month[11] = 30; 
    $month[12] = 31; 


    if ($year % 400 == 0) { 
        $month[2] = 29; 
        
    } elseif ($year % 100 == 0) { 
        $month[2] = 28; 
        
    } elseif ($year % 4 == 0) {
        $month[2] = 29;
        
    } else {
        $month[2] = 28;
        
    }


    return $month;
}



/*********************************************************************************************************************************************/



function findLuckyDates(int $d1, int $m1, int $y1, int $d2, int $m2, int $y2) {
    $result = 0; 

    while (true) {
        
        $x = $d1;
        $x = $x * 100   + $m1; 
        $x = $x * 10000 + $y1; 

        if ($x % 4 == 0 || $x % 7 == 0) { 
            $result = $result + 1; 
        }

        if ($d1 == $d2 && $m1 == $m2 && $y1 == $y2) { 
            break;
        }

        $d1 = $d1 + 1; 
        
        if ($d1 > updateLeapYear($y1)[$m1]) { 
            $m1 = $m1 + 1; 
            $d1 = 1; 

            if ($m1 > 12) { 
                $y1 = $y1 + 1;
                $m1 = 1; 
            }
        }
    }


    return $result;
}



/*********************************************************************************************************************************************/



function balancedSums($arr) {
    $arr_sum = array_sum($arr);

    $arr_length = count($arr);
    $arr_last_index = $arr_length - 1;
    $current_sum = 0; 


    if ($arr_length == 1 || $arr_sum - $arr[0] == 0) { 
        return 'YES'; 
    }


    for ($i = 0; $i < $arr_last_index; $i++) {
        $current_sum += $arr[$i];

        if ($current_sum == $arr_sum - $current_sum - $arr[$i + 1]) {
            
            return 'YES'; 
        }
    }


    return 'NO';
}



/*********************************************************************************************************************************************/



function misereNim($s) {
    $remove_duplicates = array_unique($s);
    
    $s_length = count($s);

    
    if ($s_length == array_sum($s)) { 
        if ($s_length % 2 === 0) { 
            return 'First';
        } else { 
            return 'Second';
        }
    } else { 
        $xor_sum = $s[0]; 

        for ($i = 1; $i < $s_length; $i++) { 
            $xor_sum ^= $s[$i];
        }

        
        if ($xor_sum === 0) { 
            return 'Second';
        } else { 
            return 'First';
        }
    }
}



/*********************************************************************************************************************************************/



function gamingArray($arr) {
    $current_running_max = 0;
    $count = 0; 

    foreach ($arr as $number) {
        if ($current_running_max < $number) {
            $current_running_max = $number;
            $count++;
        }
    }


    if ($count % 2 === 0) { 
        return 'ANDY';
    } else { 
        return 'BOB';
    }
}



/*********************************************************************************************************************************************/



function formingMagicSquare($s) {
    $magic_squares_3x3 = [
        [
            [8, 1, 6],
            [3, 5, 7],
            [4, 9, 2]
        ],
        [
            [6, 1, 8],
            [7, 5, 3],
            [2, 9, 4]
        ],
        [
            [4, 9, 2],
            [3, 5, 7],
            [8, 1, 6]
        ],
        [
            [2, 9, 4],
            [7, 5, 3],
            [6, 1, 8]
        ],
        [
            [8, 3, 4],
            [1, 5, 9],
            [6, 7, 2]
        ],
        [
            [4, 3, 8],
            [9, 5, 1],
            [2, 7, 6]
        ],
        [
            [6, 7, 2],
            [1, 5, 9],
            [8, 3, 4]
        ],
        [
            [2, 7, 6],
            [9, 5, 1],
            [4, 3, 8]
        ]
    ];


    $s_length = count($s);
    $minimum_changes = [];

    foreach ($magic_squares_3x3 as $magic_square_3x3) {
        $sum_of_the_absolute_differences = 0;

        for ($i = 0; $i < $s_length; $i++) {
            for ($j = 0; $j < $s_length; $j++) {
                if ($magic_square_3x3[$i][$j] == $s[$i][$j]) {
                    continue; 
                }

                $sum_of_the_absolute_differences += abs($magic_square_3x3[$i][$j] - $s[$i][$j]);
            }
        }

        $minimum_changes[] = $sum_of_the_absolute_differences;
    }

    
    return min($minimum_changes);
    
}



/*********************************************************************************************************************************************/



function superDigit($n, $k) {
    $n_length = strlen($n);
    $digit_ascii_values_sum = 0;

    for ($i = 0; $i < $n_length; $i++) {
        
        $digit_ascii_values_sum += ord($n[$i]) - ord(0); 
    }

    

    $n = $digit_ascii_values_sum * $k;
    $k = 1; 

    if ($digit_ascii_values_sum < 10 && $n < 10) {
        return $n;
    }


    return superDigit(strval($n), $k);
}



/*********************************************************************************************************************************************/



function counterGame($n) {
    $power_of_two_numbers = [];
    for ($i = 0; $i <= 64; $i++) { 
        $power_of_two_numbers[] = 2 ** $i;
    }

    
    $switching_who_is_winner_first_or_second_player = 'second player'; 


    if ($n === 1) { 
        return 'Richard';

    } else { 

        
        while ($n > 1) { 
            if (($n & $n - 1) === 0) { 
                
                $n >>= 1; 
                
                
            } else { 
                
                for ($i = 0; $i <= 64; $i++) { 
                    if ($n > $power_of_two_numbers[$i] && $n < $power_of_two_numbers[$i + 1]) { 
                        $lower_power_of_two_number = $power_of_two_numbers[$i];
                        $n -= $lower_power_of_two_number; 
                    }
                }
            }

            
            $switching_who_is_winner_first_or_second_player = $switching_who_is_winner_first_or_second_player === 'second player' ? 'first player' : 'second player'; 
        }
    }


    return $switching_who_is_winner_first_or_second_player === 'first player' ? 'Louise' : 'Richard';
}



/*********************************************************************************************************************************************/



function sumXor($n) {
    $unset_bits_count = 0;

    while ($n > 1) {
        if ($n % 2 == 0) { 
            $unset_bits_count ++;
            
        }

        
        $n >>= 1; 
        
    }


    return 1 << $unset_bits_count;       
}



/*********************************************************************************************************************************************/



function palindromeIndex($s) {
    $palindrome_index = -1; 
    $s_length            = strlen($s);
    $s_last_index        = $s_length - 1;
    $s_half_length_index = $s_length / 2;

    for ($i = 0; $i < $s_half_length_index; $i++) {
        if ($s[$i] != $s[$s_last_index - $i]) { 
            if ($s[$i] == $s[$s_last_index - $i - 1] && $s[$i + 1] == $s[$s_last_index - $i - 2]) { 
                
                $palindrome_index = $s_last_index - $i;
                break; 
            } else if ($s[$i + 1] == $s[$s_last_index - $i] && $s[$i + 2] == $s[$s_last_index - $i - 1]) { 
                
                $palindrome_index = $i;
                break; 
            }

        }
    }


    return $palindrome_index;
}



/*********************************************************************************************************************************************/


