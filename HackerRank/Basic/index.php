<?php
// 'idx' stands for 'index'



// 1) Plus Minus    // https://www.hackerrank.com/challenges/one-month-preparation-kit-plus-minus/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one
// Time Complexity: O(N)
function plusMinus($arr) {
    $n = count($arr);

    $positiveNumbersCount = 0;
    $negativeNumbersCount = 0;
    $zerosCount           = 0;

    for ($i = 0; $i < $n; $i++) { // is the same as:    foreach ($arr as $i) {    // $i is the array index number
        if ($arr[$i] > 0) { // is the same as:    if ($i > 0) {
            // echo 'Positive Number: ' .  $arr[$i] . '<br>';
            $positiveNumbersCount++;
        } elseif ($arr[$i] < 0) { // is the same as:    } elseif ($i < 0) {
            // echo 'Negative Number: ' .  $arr[$i] . '<br>';
            $negativeNumbersCount++;
        } elseif ($arr[$i] == 0) { // is the same as:    } elseif ($i == 0) {
            // echo 'Zeros: ' .  $arr[$i] . '<br>';
            $zerosCount++;
        }        
    }

    $positiveNumbersRatio = $positiveNumbersCount/$n;
    $negativeNumbersRatio = $negativeNumbersCount/$n;
    $zerosRatio           = $zerosCount/$n;


    // Note: You must use newline character "\n" instead of the <br> HTML tag in case you're dealing with STDIN/STDOUT (just like 'console'/'terminal')

    
    // echo number_format($positiveNumbersRatio, 6) . "\n"; //    "\n"    is the same as:    "\r\n"    is the same as    PHP_EOL
    // echo number_format($negativeNumbersRatio, 6) . "\n"; //    "\n"    is the same as:    "\r\n"    is the same as    PHP_EOL
    // echo number_format($zerosRatio, 6)           . "\n"; //    "\n"    is the same as:    "\r\n"    is the same as    PHP_EOL

    echo round($positiveNumbersRatio, 6) . "\n"; //    "\n"    is the same as:    "\r\n"    is the same    PHP_EOL
    echo round($negativeNumbersRatio, 6) . "\n"; //    "\n"    is the same as:    "\r\n"    is the same    PHP_EOL
    echo round($zerosRatio, 6)           . "\n"; //    "\n"     is the same as:   "\r\n"    is the same    PHP_EOL
}

// Test Case
// plusMinus([-4, 3, -9, 0, 4, 1]);

/*********************************************************************************************************************************************/
// 2) Mini-Max Sum    // https://www.hackerrank.com/challenges/one-month-preparation-kit-mini-max-sum/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen
// Time Complexity: O(1)
function miniMaxSum($arr) {
    // Pseudocode: You can solve this problem with or without (recommended) ascendingly sorting the array

    /*
    // First Solution/Approach: depends on ascendingly sorting
    sort($arr); // sort array numbers ascendingly
    // echo '<pre>', var_dump($arr), '</pre>';

    /* // A solution with TWO loops
    $minSum = 0;
    for ($i = 0; $i < 4; $i++) {
        $minSum = $minSum + $arr[$i]; // 1 + 2 + 3 + 4 = 10
    }
    // echo $minSum . '<br>';;

    $maxSum = 0;
    for ($i = 1; $i < 5; $i++) { // Starting from the second element (1st index/key)    // for ($i = 1; $i < count($arr); $i++) {
        $maxSum = $maxSum + $arr[$i]; // 2 + 3 + 4 + 5 = 14
    }
    // echo $maxSum . '<br>';


    echo $minSum . ' ' . $maxSum;
    */



    /*
    // Second Solution/Approach: depends on ascendingly sorting
    // A better PERFORMANCE / more efficient / optimized solution with ONLY ONE loop
    sort($arr); // sort array numbers ascendingly
    $arr_length = count($arr);
    $totalSum = 0; // the sum of all the array elements
    for ($i = 0; $i < $arr_length; $i++) {
        $totalSum += $arr[$i];
    }
    // echo $totalSum . '<br>';

    $minSum = $totalSum - $arr[$arr_length - 1]; // $minSum = $totalSum - the last  (and greatest) number of the array    // General Rule: array key/index = array length/size - 1
    $maxSum = $totalSum - $arr[0];               // $maxSum = $totalSum - the first (and smallest) number of the array    // General Rule: array key/index = array length/size - 1
    // echo $minSum . '<br>'; // 1 + 2 + 3 + 4 + 5 - 5 = 10
    // echo $maxSum . '<br>'; // 1 + 2 + 3 + 4 + 5 - 1 = 14

    echo $minSum . ' ' . $maxSum;
    */


    // Third Solution/Approach: WITHOUT sorting (HackerRank Solution/Approach (Editorial))
    $arr_length = count($arr);
    // Since it is stated in the problem's Constraints that 1 <= arr[i] <= 10^9, so we can assume that in the worst-case scenario that the smallest possible minimum element (possible smallest number) is the greatest number in the problem's Constraints which is 10^9, and the greatest possible maximum element (possible greatest number) is the smallest number in the problem's Constraints which is 0 (or should be 1!)
    $current_minimum_number = 1000000000; // 10^9    // !Note!: min is the greatest (not smallest) possible number in the constraints which is 10^9 not 0!! (worst-case scenario)         // It is stated in the problem's Constraints that 1 <= arr[i] <= 10^9
    $current_maximum_number = 0;          // 10^9    // !Note!: max is the smallest (not greatest) possible number in the constraints which is  0    not 10^9!! (worst-case scenario)     // It is stated in the problem's Constraints that 1 <= arr[i] <= 10^9

    $sum = 0;

    // We'll constantly update the $current_minimum_number and $current_maximum_number while iterating the for loop
    for ($i = 0; $i < $arr_length; $i++) {
        $sum += $arr[$i];

        if ($arr[$i] < $current_minimum_number) { // if the element $arr[$i] is less than $current_minimum_number, set that element as the new $current_minimum_number (Constantly updating while iterating the loop)
            $current_minimum_number = $arr[$i];
        }

        if ($arr[$i] > $current_maximum_number) { // if the element $arr[$i] is less than $current_maximum_number, set that element as the new $current_maximum_number (Constantly updating while iterating the loop)
            $current_maximum_number = $arr[$i];
        }
    }
    
    // echo $current_minimum_number . '<br>';
    // echo $current_maximum_number . '<br>';

    $minSum = $sum - $current_maximum_number;
    $maxSum = $sum - $current_minimum_number;


    echo $minSum . ' ' . $maxSum;
}

// Test Case
// miniMaxSum([4, 1, 5, 3, 2]);

/*********************************************************************************************************************************************/

// 3) Time Conversion    // https://www.hackerrank.com/challenges/one-month-preparation-kit-time-conversion/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
// Time Complexity: O(1)
function timeConversion($s) {
    /*
    // First Solution/Approach (using ready-made PHP function):
    $twelveHourObject = date_create($s);
    // echo '<pre>', var_dump(date_create($s)), '</pre>';
    // echo '<pre>', var_dump($twelveHourObject), '</pre>';


    // echo (date_format(date_create($s), 'H:i:s')) . '<br>';
    // echo date_format($twelveHourObject, 'H:i:s') . '<br>';
    return date_format($twelveHourObject, 'H:i:s');
    */


    // Second Solution/Approach (HackerRank solution (more detailed one)):
    // Note: We only need to manipulate the hours, no need to handle the minutes or seconds.
    // There are 3 cases: 12:00AM is equivalent to 00:00 (military time 24-Hour). From 1:00AM to 12:00PM is nothing different than the military time (24-Hour). From 01:00PM to 11:59PM is eqivalent to military time (24-Hour) + 12
    // Consider the 12-Hour time format as follows: $hours:$minutes:$secondsPM (e.g. 02:15:27PM)
    $hours   = (string) $s[0] . $s[1]; // e.g. 02
    $minutes = (string) $s[3] . $s[4]; // e.g. 15
    $seconds = (string) $s[6] . $s[7]; // e.g. 27
    $AmOrPm  = (string) $s[8]; // 'P' or 'A'
    // echo $hours   . '<br>';
    // echo $minutes . '<br>';
    // echo $seconds . '<br>';
    // echo $AmOrPm  . '<br>';

    if ($hours == '12' && $AmOrPm == 'A') { // 12:00AM is equivalent to 00:00 (military time 24-Hour)
        $hours = '00';
    }

    // Note: From 1:00AM to 12:00PM is nothing different than the military time (24-Hour)

    if ($hours < '12' && $AmOrPm == 'P') { // from 01:00PM to 11:59PM is eqivalent to military time (24-Hour) + 12
        $hours += 12;
    }

    // echo sprintf('%s:%s:%s', $hours, $minutes, $seconds) . '<br>';


    // The military time (24-Hour) format (e.g. 23:54:32)
    return sprintf('%s:%s:%s', $hours, $minutes, $seconds);
}

// Test Case
// $result = timeConversion('07:05:45PM');
// echo $result . '<br>';

/*********************************************************************************************************************************************/

// 4) Sparse Arrays (occurences)    // https://www.hackerrank.com/challenges/one-month-preparation-kit-sparse-arrays/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
// Time Complexity: O(N*Q*20)
function matchingStrings($strings, $queries) {
    // First Solution/Approach:
    // $n = count($strings); // the size (length) of $string  array
    // $q = count($queries); // the size (length) of $queries array

    /*
    $count = 0;
    $resultArray = [];

    foreach ($queries as $query) {
        foreach ($strings as $string) {
            if ($query == $string) {
                $count++;
            }
        }

        $resultArray[] = $count; // Add the $count of the $query to the $resultArray
        $count = 0; // Reset the $count to zero 0 again (after the end of each iteration of the PARENT loop)
    }

    // echo $count . '<br>';
    // echo '<pre>', var_dump($resultArray), '</pre>';


    return $resultArray;
    */



    // Second Solution/Approach: HackerRank Solution
    
    // Create a $strings array frequency array $strings_frequency_array using a for loop or foreach loop (Check the other ways to create frequency arrays in other problems)
    $strings_length = count($strings);
    $strings_frequency_array = []; // $strings frequency array

    for ($i = 0; $i < $strings_length; $i++) {
        if (array_key_exists($strings[$i], $strings_frequency_array)) { // if the $strings array key/index already exists in $strings_frequency_array, increment its value by 1
            $strings_frequency_array[$strings[$i]]++;
        } else { // if the $strings key/index doesn't exists in $strings_frequency_array, add its key and give it a default value of 1 one i.e.    key => 1
            // echo $strings[$i] . '<br>';
            $strings_frequency_array[$strings[$i]] = 1;
        }
    }

    // echo '<pre>', var_dump($strings_frequency_array), '</pre>';


    $queries_length = count($queries);
    $resultArray = [];

    for ($i = 0; $i < $queries_length; $i++) {
        if (array_key_exists($queries[$i], $strings_frequency_array)) { // if the $queries element exists in the $strings_frequency_array, add its value in the $resultArray
            $resultArray[] = $strings_frequency_array[$queries[$i]];
        } else {
            $resultArray[] = 0;
        }
    }

    // echo '<pre>', var_dump($resultArray), '</pre>';


    return $resultArray;
}

// Test Case
// $res = matchingStrings(['ab', 'ab', 'abc'], ['ab', 'abc', 'bc']);
// echo '<pre>', var_dump($res), '</pre>';

/*********************************************************************************************************************************************/

// 5) Lonely Integer    // https://www.hackerrank.com/challenges/one-month-preparation-kit-lonely-integer/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
function lonelyinteger($a) {
    // First Solution/Approach: Pseudocode: remove the duplicate elements from the original array $a, then place them in anoter empty array $duplicateElementsArray, then get the difference using array_diff()

    // $duplicateElementsArray = [];

    // foreach ($a as $number) {
    //     if (!in_array($number, $duplicateElementsArray)) { //    !in_array()    is used to prevent repetition in the $duplicateElementsArray
    //         $duplicateElementsArray[] = $number; // add the duplicate element in the $duplicateElementsArray

    //         // Remove the duplicate element from the original array $a
    //         $toBeRemovedElementKey = array_search($number, $a); // get the duplicate element 'key' (to be able to remove it i.e. unset() it from the original array $a)
    //         unset($a[$toBeRemovedElementKey]); // remove the duplicate element from the original array $a
    //     }
    // }

    // $duplicateElementsArray = array_unique($a);
    // echo '<pre>', var_dump($duplicateElementsArray), '</pre>';



    // echo '<pre>', var_dump($duplicateElementsArray), '</pre>';
    // echo '<pre>', var_dump($a), '</pre>';



    // echo '<pre>', var_dump(array_diff($duplicateElementsArray, $a)), '</pre>'; // compare $duplicateElementsArray to $a (What's present / What exists in $duplicateElementsArray and doesn't in $a)
    // echo '<pre>', var_dump(array_diff($duplicateElementsArray, $a)[0]), '</pre>'; // the first array key/index is not always 0!! Which leads to an 'Undefined array key 0' error!

    // Note: There're are TWO ways to get the first element of the array WHILE NOT KNOWING THE FIRST KEY/INDEX of the array: using current() or array_key_first()
    
    // $uniqueElementArray = array_diff($duplicateElementsArray, $a);
    // echo '<pre>', var_dump($uniqueElementArray), '</pre>';
    // echo '<pre>', var_dump(array_key_first($uniqueElementArray)), '</pre>'; // get the first key/index of the $uniqueElementArray
    // echo '<pre>', var_dump($uniqueElementArray[array_key_first($uniqueElementArray)]), '</pre>'; // get the first key/index of the $uniqueElementArray

    // return current(array_diff($duplicateElementsArray, $a)); // used current() instead of array_diff($duplicateElementsArray, $a)[0] because the first keyn/index is not always 0
    // return array_diff($duplicateElementsArray, $a)[array_key_first(array_diff($duplicateElementsArray, $a))]; // used    [array_key_first(array_diff($duplicateElementsArray, $a))]    instead of    array_diff($duplicateElementsArray, $a)[0]    to get the first element of the array resulting from the array_diff() array, because the first index is not always 0



    // Second Solution/Approach: Pseudocode: Create another empaty array $uniqueElementArray, copy every element (number) in $a to $uniqueElementArray but WITH ARRAY KEYS/INDEXES IDENTICAL TO THE NUMBERS THEMSELVES, but check first if the same array key exists (array_key_exists()), then we remove the repeated element from the $uniqueElementArray in case the array key/index already exists    // https://github.com/vikram0207/hackerrank/blob/master/lonely%20integer/lonely-integer.php
    /*
    $uniqueElementArray = [];

    foreach ($a as $number) {
        if (array_key_exists($number, $uniqueElementArray)) { // if the array key/index already exists, remove the element from $uniqueElementArray
            unset($uniqueElementArray[$number]); // remove the element from $uniqueElementArray
        } else { // copy the numbers from $a to $uniqueElementArray while giving them array keys/indexes identical to the numbers themselves
            $uniqueElementArray[$number] = $number; // adding the number with an array key/index identical to the number. That way, repeated numbers (having similar array keys/indexes) will be removed by the unset() method
        }
    }

    echo '<pre>', var_dump($uniqueElementArray), '</pre>';
    return $uniqueElementArray;
    */



    // Third Solution/Approach (HackerRank's solution): Pseudocode: use the Bitwise ^ XOR operator (exclusive OR) to XOR all the elements of the $a array (starting with zero 0), utilizing its properties:    0 ^ x = x    and    x ^ x = 0    (XOR is is commutative, associative, self-inverse and the identity element)
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-lonely-integer/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two
    // https://www.geeksforgeeks.org/find-element-appears-array-every-element-appears-twice/
    // https://www.educative.io/answers/what-is-the-xor-bitwise-operator
    // echo 1 ^ 2 ^ 3 ^ 4 ^ 3 ^ 2 ^ 1;
    // echo '<br>';
    // echo 0 ^ 1 ^ 2 ^ 3 ^ 4 ^ 3 ^ 2 ^ 1;
    // echo '<br>';

    $uniqueElement = 0; // We start with zero 0 because: XOR of a number with zero 0 is the number itself i.e.    0 ^ x = x    (because at the first loop iteration, there haven't been any XOR-ing operations yet, so we just need the first number value ONLY)

    foreach ($a as $number) { // foreach ($a as $key => $number) {
        // We XOR all of the array elements [1, 2, 3, 4, 3, 2, 1] starting with zero 0 like this:    0 ^ 1 ^ 2 ^ 3 ^ 4 ^ 3 ^ 2 ^ 1    . As XOR is associative, this expression can be rewritten as:    0 ^ (1 ^ 1) ^ (2 ^ 2) ^ (3 ^ 3) ^ 4    , and as XOR is self-inverse, then this can be reduced to:    0 ^ 0 ^ 0 ^ 0 ^ 4    , and in turn, this is:    0 ^ 4 = 4

        /*
        // If you don't want to declare the    $uniqueElement = 0;    variable above the loop, you can use the following:
        if ($key == 0) { // the first loop iteration
            $uniqueElement = $number; // because at the first loop iteration, there haven't been any XOR-ing operations yet, so we just need the first number value ONLY
            // echo $number . '<br>';
            // echo $uniqueElement . '<br>';
        } else {
            $uniqueElement ^= $number; // is the same as:    $uniqueElement = $uniqueElement ^ $number;
        }
        */

        // $uniqueElement = $uniqueElement ^ $number; // We start with zero 0 because: XOR of the first number with zero 0 is the number itself i.e.    0 ^ x = x    (because at the first loop iteration, there haven't been any XOR-ing operations yet, so we just need the first number value ONLY)

        // Note:    $uniqueElement = $uniqueElement ^ $number;    is the same as    $uniqueElement ^= $number;
        $uniqueElement ^= $number; // We start with zero 0 because: XOR of the first number with zero 0 is the number itself i.e.    0 ^ x = x
    }

    // echo '<pre>', var_dump($uniqueElement), '</pre>';


    return $uniqueElement;
}

// Test Case
// $result = lonelyinteger([1, 2, 3, 4, 3, 2, 1]); // 4 is the UNIQUE element
// echo $result . '<br>';

/*********************************************************************************************************************************************/

// 6) Flipping bits    // https://www.hackerrank.com/challenges/one-month-preparation-kit-flipping-bits/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
// Time Complexity: O(1) per query
function flippingBits($n) {
    // First Solution/Approach: Pseudocode: Convert the number to binary using decbin() function, then we add all the leading zeros because it's a 32-bit integers using the sprinf() function, then loop through resultant string and flip every 0 to 1 and 1 to, then convert it from binary to decimal again
    // https://stackoverflow.com/questions/27979854/flipping-bits-in-php
    /*
    // echo decbin($n) . '<br>';
    // echo sprintf("%'.032s", decbin($n)) . '<br>'; // 32 digits (I added the leading zeros using '%032d' (specifying padding characer))    // Specifying padding character: https://www.php.net/manual/en/function.sprintf.php#:~:text=Example%20%232%20Specifying%20padding%20character
    // echo ($n ^ 0xFFFFFFFF) .'<br>';    // echo $n ^ 4294967295 . '<br>';

    $bin32Number = sprintf("%'.032s", decbin($n)); // 32 digits (I added the leading zeros using '%032d' (specifying padding characer))    // Specifying padding character: https://www.php.net/manual/en/function.sprintf.php#:~:text=Example%20%232%20Specifying%20padding%20character
    // echo $bin32Number . '<br>';

    $convertedBinNumberArray = '';

    // loop through the string (to convert every 0 to 1 and 1 to 0)
    for ($i = 0; $i < strlen($bin32Number); $i++) {
        // echo $bin32Number[$i] . '<br>';
        // echo '<pre>', var_dump($bin32Number[$i]), '</pre>';
        
        if ($bin32Number[$i] == '0') {
            $convertedBinNumberArray .= '1';
            // echo $convertedBinNumberArray . '<br>';
        } elseif ($bin32Number[$i] == '1') {
            $convertedBinNumberArray .= '0';
        }
    }

    // echo $convertedBinNumberArray . '<br>';


    // echo bindec($convertedBinNumberArray) . '<br>';
    // return bindec($convertedBinNumberArray);
    */




    // Second Solution/Approach: use the Bitwise ^ XOR operator (exclusive OR) to XOR all the elements of the $a array (starting with zero 0), utilizing its properties:    0 ^ x = x (e.g. 0 ^ 1 = 1)    and    x ^ x = 0 (e.g. 1 ^ 1 = 0)    (XOR is is commutative, associative, self-inverse and the identity element)
    // https://stackoverflow.com/questions/41784609/bitwise-negate-and-bitwise-xor-1-not-equivalent
    // https://thephp.website/en/issue/bitwise-php/#normalizing-integers:~:text=low%20level%20stuff!-,Normalizing%20integers,-There%27s%20this%20very
    // https://www.google.com/search?q=what+is+0xffffffff%3F&sxsrf=ALiCzsZZ6YdIl4D0agEw4GknY8TKeUv6Ew%3A1669936050907&ei=sjOJY5-HN4bpkgWPqoigCg&ved=0ahUKEwifqPLIxNn7AhWGtKQKHQ8VAqQQ4dUDCBA&uact=5&oq=what+is+0xffffffff%3F&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzoKCAAQRxDWBBCwA0oECEEYAEoECEYYAFC2BVi2BWDMCWgBcAB4AIABkgGIAZIBkgEDMC4xmAEAoAEByAEIwAEB&sclient=gws-wiz-serp
    // https://www.php.net/manual/en/language.types.integer.php#:~:text=PHP%20does%20not%20support%20unsigned%20ints.
    // https://stackoverflow.com/questions/27979854/flipping-bits-in-php
    // https://www.geeksforgeeks.org/find-element-appears-array-every-element-appears-twice/
    // https://www.educative.io/answers/what-is-the-xor-bitwise-operator
    // Explanantion: 0xFFFFFFFF is 32 of binary ones i.e.    11111111111111111111111111111111    , that's why we can XOR this number with any other 32-bit binary (which contains zeros 0s and ones 1s only) number like:    10100100100011011011000001111101
    // Continued: So    11111111111111111111111111111111 ^ 10100100100011011011000001111101
    // That's how NOW any zero 0 can be FLIPPED to one 1 and any one 1 can be flipped to zero 0 beacase    1 ^ 0 = 1    and    1 ^ 1 = 0
    // echo '<pre>', var_dump($n ^ 0xFFFFFFFF), '</pre>'; // Hexadecimal number    // Note: Using the prefix 0x to denote that it's a Hexadecimal number for PHP (Check https://www.php.net/manual/en/language.types.integer.php)
    // echo '<pre>', var_dump($n ^ 4294967296), '</pre>'; // Decimal number
    // echo '<pre>', var_dump($n ^ pow(2, 32)), '</pre>'; // Decimal number
    // echo '<pre>', var_dump($n ^ 0b11111111111111111111111111111111), '</pre>'; // Binary number    // Note: Using the prefix 0b to denote that it's a Binary number for PHP (Check https://www.php.net/manual/en/language.types.integer.php)


    return $n ^ 0xFFFFFFFF; // 0xFFFFFFFF is the binary of 32-bit (2^32 = 4294967296, and converting this number to binary equals 11111111111111111111111111111111)    11111111111111111111111111111111
    // return $n ^ 0b11111111111111111111111111111111; // Using the prefix 0b to denote that it's a Binary number for PHP (Check https://www.php.net/manual/en/language.types.integer.php). 0xFFFFFFFF is the binary of 32-bit (2^32 = 4294967296, and converting this number to binary equals 11111111111111111111111111111111)    11111111111111111111111111111111


    /*
    // Third Solution/Approach (HackerRank's Solution) DONSN'T WORK IN PHP! (Because the Bitwise Not operator ~ behavior works differently in PHP, JavaScript and Python than C, C++, ... (gives the Two's Complement instead of the One's Complement (One's Complement is inverting every 0 to 1 and every 1 to 0))): using the Bitwise ~ Not operator (It inverts everything even the +ve sign to -ve sign and the -ve sign to the +ve sign)
    // https://stackoverflow.com/questions/8785054/bit-not-operation-in-phpor-any-other-language-probably
    // https://stackoverflow.com/questions/31377474/why-does-bitwise-not-1-equal-2
    // https://stackoverflow.com/questions/791328/how-does-the-bitwise-complement-operator-tilde-work
    // https://stackoverflow.com/questions/4295578/explanation-of-bitwise-not-operator
    // https://thephp.website/en/issue/bitwise-php/#normalizing-integers:~:text=low%20level%20stuff!-,Normalizing%20integers,-There%27s%20this%20very
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-flipping-bits/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two
    // https://www.youtube.com/watch?v=lyga8BUD4gs
    // https://www.youtube.com/watch?v=HDTUKza1bmc
    // https://www.youtube.com/watch?v=4qH4unVtJkE
    // https://www.tutorialspoint.com/1-s-complement-vs-2-s-c
    // https://www.geeksforgeeks.org/representation-of-negative-binary-numbers/
    // https://www.geeksforgeeks.org/difference-between-1s-complement-representation-and-2s-complement-representation-technique/
    // https://stackoverflow.com/questions/41784609/bitwise-negate-and-bitwise-xor-1-not-equivalent
    // https://stackoverflow.com/questions/68123179/is-bitwise-not-operator-different-for-c-and-python

    // echo sprintf('%032b', decbin($n));
    // echo ~7 . '<br>';

    // echo '<pre>', var_dump(~ $n), '</pre>';


    // return ~ $n;
    */
}

// Test Case
// $result = flippingBits(2147483647);
// $result = flippingBits(1);
// echo $result . '<br>';

/*********************************************************************************************************************************************/

// 7) Diagonal Difference: https://www.hackerrank.com/challenges/one-month-preparation-kit-diagonal-difference/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
// Time Complexity: O(N)
function diagonalDifference($arr) {

    // echo '<pre>', var_dump($arr), '</pre>';

    // First Solution/Approach:
    /*
    foreach ($arr as $key => $array) {
        // echo '<pre>', var_dump($array), '</pre>';
        // echo $key . '<br>';
        if ($key == 0) { // the first loop iteration
            $upLeft  = $array[0];
            $upRight = $array[2];
        }

        if ($key == 1) { // the second loop iteration
            $middleMiddle = $array[1];
            // echo $middleMiddle . '<br>';
        }

        if ($key == 2) { // the third loop iteration
            $downRight = $array[2];
            $downLeft  = $array[0];
        }
    }

    // echo $upLeft       . '<br>';
    // echo $upRight      . '<br>';
    // echo $middleMiddle . '<br>';
    // echo $downRight    . '<br>';
    // echo $downLeft     . '<br>';

    // echo   abs(($upLeft + $middleMiddle + $downRight) - ($upRight + $middleMiddle + $downLeft)) . '<br>';
    return abs(($upLeft + $middleMiddle + $downRight) - ($upRight + $middleMiddle + $downLeft));
    */



    // Second Solution/Approach: This is a N * N (N by N) square matrix array (a matrix having the same number of rows as columns)
    // https://www.google.com/search?q=diagonal+difference+hackerrank+solution&sxsrf=ALiCzsaSDErSWGt0_dcevhOo9VE0ipplHw:1669956641556&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjb4aOjkdr7AhVmU6QEHVohAbgQ_AUoAnoECAEQBA&biw=1366&bih=695&dpr=1#imgrc=GIS_WvjssxjtKM
    // https://stackoverflow.com/questions/36978131/how-to-calculate-diagonal-difference-in-php
    // https://www.geeksforgeeks.org/find-difference-between-sums-of-two-diagonals/?tab=article
    // https://stackoverflow.com/questions/37079777/n-by-n-integer-array
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-diagonal-difference/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two

    // $arr_size = count($arr);
    $last_arr_index = count($arr) - 1; // array index = array length - 1
    $left_to_right_diagonal_sum = 0;
    $right_to_left_diagonal_sum = 0;


    // The N * N square matrix array (a matrix having the same number of rows as columns)
    foreach ($arr as $key => $array) {
        // echo '<pre>', var_dump($array), '</pre>';
        // echo $key . '<br>';
        // echo $array[$key] . '<br>';
        $left_to_right_diagonal_sum += $array[$key]; // the left to right diagonal sum = $array[0] + $array[1] + $array[2]
        $right_to_left_diagonal_sum += $array[$last_arr_index - $key]; // the right to left diagonal sum = $array[2] + $array[1] + $array[0]
    }

    // echo $left_to_right_diagonal_sum . '<br>';
    // echo $right_to_left_diagonal_sum . '<br>';


    return abs($left_to_right_diagonal_sum - $right_to_left_diagonal_sum); // abs() returns the absolute value (modulus) (without -ve i.e.    |$x - $y|    )
}

// Test Case
// $result = diagonalDifference([ // 2D array
//     [1, 2, 3],
//     [4, 5, 6],
//     [9, 8, 9]
//     // [11, 2, 4  ],
//     // [4 , 5, 6  ],
//     // [10, 8, -12]
//     // [-11, 2  , 9],
//     // [4  , -15, 6],
//     // [-7 , 8  , -12]
// ]);
// echo $result . '<br>';

/*********************************************************************************************************************************************/

// 8) Counting Sort 1    // https://www.hackerrank.com/challenges/one-month-preparation-kit-countingsort1/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen
function countingSort($arr) {
    // echo '<pre>', var_dump($arr), '</pre>';
    // $arr_size = count($arr);


    // Create a $frequencyArray (Creating a frequency array EITHER by using array_fill() function Or array_count_values() function (Note: There's a third way to create a frequence array, check 'Sparse Arrays' HackerRank problem.))
    $frequencyArray = array_fill(0, 100, 0); // This line of code can be replaced by the next for loop    // Note that array_fill() function by nature takes the first argument ($ar_minimum) and the second argument ($ar_maximum) to form its keys/indexes
    // echo '<pre>', print_r($frequencyArray), '</pre>';
    // Here, $frequencyArray indexes/keys match the $arr values (to be able to later loop through $arr values and increase the values of $frequencyArray depending on its indexes/keys which match the $arr values)
    /*
        $arr = [1, 1, 3, 2, 1, ...];

        $frequencyArray = [
            0   => 0,
            1   => 0,
            2   => 0,
            3   => 0,
            .........,
            100 => 0
        ];
    */


    // Another way to create a frequency Array is to use array_count_values() function
    // $frequencyArray = array_count_values($arr);
    // echo '<pre>', var_dump($frequencyArray), '</pre>';


    /*
    $frequencyArray = [];

    // Note: The next for loop can be replaced by    $frequencyArray = array_fill(0, 100, 0);
    for ($i = 0; $i < 100; $i++) { // 100 times
        $frequencyArray[$i] = 0;
    }
    */


    // echo '<pre>', var_dump($frequencyArray), '</pre>';
    
    foreach ($arr as $number) { // Loop through $arr, and whenever you find a value of $arr matches an index/key in $frequencyArray, increase its value by one 1
        $frequencyArray[$number]++; // increase the value of $frequencyArray when its index/key matches the value of $arr
    }

    // echo '<pre>', var_dump($frequencyArray), '</pre>';
 

    return $frequencyArray;
}

// Test Case
// $result = countingSort([1, 1, 3, 2, 1]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 9) Pangrams    // https://www.hackerrank.com/challenges/one-month-preparation-kit-pangrams/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
// Time Complexity: O(N)
function pangrams($s) { // Check the similar 'Caesar Cipher' HackerRank problem!
    /*
    // First Solution/Approach (using the English alphabet array):
    $s_lowerCase = strtolower($s); // convert all letters to lower case to avoid possible errors resulting from upper case letters
    // echo '<pre>', var_dump($s_lowerCase), '</pre>';

    $no_spaces_string = str_replace(' ', '', $s_lowerCase); // remove spaces (replace spaces ' ' with no spaces '')    // Another way to remove spaces is using a foreach loop (implemented below, commented out)
    // echo '<pre>', var_dump($no_spaces_string), '</pre>';
    // exit;

    $no_spaces_array = str_split($no_spaces_string); // convert the string to an array
    // echo '<pre>', var_dump($no_spaces_array), '</pre>';
    // exit;
    */


    /*
    // Another way using a foreach loop to remove spaces from the array
    $no_spaces_array = [];

    foreach ($s_array as $key => $letter) {
        // Remove spaces from $_array
        if ($s_array[$key] != ' ') {
            $no_spaces_array[$letter] = $letter;
        }
    }
    */

    /*
    $englishAlphabetArray = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $isPangram = true;
    */

    /*
    foreach ($englishAlphabetArray as $EnglishAlphabetLetter) {
    */
        /*
        // First way: Using in_array() function
        if (in_array($EnglishAlphabetLetter, $no_spaces_array) == false) { // this is the same as:    if (!in_array($EnglishAlphabetLetter, $no_spaces_array)) {
            // echo $EnglishAlphabetLetter . '<br>';
            $isPangram = false;
        }
        */
        
        /*
        // Second way: Using array_search() function
        // if (array_search($EnglishAlphabetLetter, $no_spaces_array) == false) { // Very Important note: Using the Identical '===' operator is a MUST (you can't use the Equal '==' operator), because always the FIRST found letter in the $no_spaces_array (using the array_search() function) would be returned as zero 0, and zero 0 evaluates (is equivalent to) to 'false', and this would cause inaccurate results, so you must use the identical === operator instead of the equal == operator
        if (array_search($EnglishAlphabetLetter, $no_spaces_array) === false) { // Very Important note: Using the Identical '===' operator is a MUST (you can't use the Equal '==' operator), because always the FIRST found letter in the $no_spaces_array (using the array_search() function) would be returned as zero 0, and zero 0 evaluates (is equivalent to) to 'false', and this would cause inaccurate results, so you must use the identical === operator instead of the equal == operator
            // echo $EnglishAlphabetLetter . '<br>';
            // echo '<pre>', var_dump(array_search($EnglishAlphabetLetter, $no_spaces_array)), '</pre>';

            $isPangram = false;
            // echo '<pre>', var_dump($isPangram), '</pre>';


            break; // For the best Performance: break the loop i.e. get out of the loop i.e. break out of the loop once it doesn't find a letter in the $no_spaces_array
        }
    }


    return $isPangram == true ? 'pangram' : 'not pangram';
    */



    /*
    // Second Solution/Approach:
    $s_lowerCase         = strtolower($s); // convert all letters to lower case to avoid possible errors resulting from upper case letters
    $no_spaces_string    = str_replace(' ', '', $s_lowerCase); // remove spaces (replace spaces ' ' with no spaces '')    // Another way to remove spaces is using a foreach loop (implemented below, commented out)
    $no_spaces_array     = str_split($no_spaces_string); // convert the string to an array
    $no_duplicates_array = array_unique($no_spaces_array); // remove any duplicate values from the letters array


    return count($no_duplicates_array) == 26 ? 'pangram' : 'not pangram'; // if the $no_duplicates_array contains 26 letters (the count of the English alphabet letters)
    */


    /*
    // Third Solution/Approach (using English alphabet letters ASCII codes representation): https://www.hackerrank.com/challenges/pangrams/forum/comments/70007 and https://github.com/ashraf789/Hackerrank-problem-solving/blob/master/Pangrams.php
    // https://www.w3schools.com/charsets/ref_html_ascii.asp    // https://www.youtube.com/watch?v=zB85kTs-sEw    // https://www.youtube.com/watch?v=5aJKKgSEUnY
    // https://www.geeksforgeeks.org/character-arithmetic-c-c/


    // ord() function is used to convert from string to ASCII, while chr() function is the opposite, it converts from ASCII to string
    // The ASCII codes of the English alphabet 'uppercase' letters is a range from 65 to 90, and the 'lowercase' letters from 97 to 122
    // Note: The difference between the ASCII values of (subtraction of ) a small letter minus - the same capital letter is constant (32)
    // echo 'A' - 'a' . '<br>'; // Doesn't work in PHP but works in C & C++!
    // echo ord('a') - ord('A') . '<br>'; // The difference is constant '32'
    // echo ord('b') - ord('B') . '<br>'; // The difference is constant '32'
    // echo ord('c') - ord('C') . '<br>'; // The difference is constant '32'
    */

    /*
    echo '<pre>', var_dump(ord('a')), '</pre>';
    echo '<pre>', var_dump(ord('A')), '</pre>';
    echo '<pre>', var_dump(ord('b')), '</pre>';
    echo '<pre>', var_dump(ord('B')), '</pre>';
    echo '<pre>', var_dump(ord('c')), '</pre>';
    echo '<pre>', var_dump(ord('C')), '</pre>';
    */
    
    /*
    // Create a frequency array with array keys/indexes corresponding to the ASCII representation of the English alphabet 'small' letters (from 97 to 122)
    // echo '<pre>', var_dump(array_fill(97,26,0)), '</pre>'; // 122 - 97 = 25, then add +1
    $frequency_array = array_fill(97,26,0); // 122 - 97 = 25, then add +1

    $s_lowerCase      = strtolower($s); // convert all letters to lower case to avoid possible errors resulting from upper case letters
    $no_spaces_string = str_replace(' ', '', $s_lowerCase); // remove spaces (replace spaces ' ' with no spaces '')    // Another way to remove spaces is using a foreach loop (implemented below, commented out)
    $no_spaces_array  = str_split($no_spaces_string); // convert the string to an array
    $no_spaces_array_length = count($no_spaces_array);

    for ($i = 0; $i < $no_spaces_array_length; $i++) {
        $frequency_array[ord($no_spaces_array[$i])]++;
    }

    // echo '<pre>', var_dump($frequency_array), '</pre>';


    return !in_array(0, $frequency_array) ? 'pangram' : 'not pangram'; // if the frequency array doesn't contain zero 0 (meaning, all the English letters exist (there is no letter with 0 zero frequency))
    */



    // Fourth Solution/Approach (using Character Arithmetic):
    // https://www.geeksforgeeks.org/pangram-checking/
    $s_lowerCase      = strtolower($s); // convert all letters to lower case to avoid possible errors resulting from upper case letters
    $no_spaces_string = str_replace(' ', '', $s_lowerCase); // remove spaces (replace spaces ' ' with no spaces '')    // Another way to remove spaces is using a foreach loop (implemented below, commented out)
    $no_spaces_array  = str_split($no_spaces_string); // convert the string to an array
    $no_spaces_array_length = count($no_spaces_array);

    // Create an array with keys/indexes matching the English alphabet letters positions (1, 2, 3, ..., 26) and all having 'false' values
    $english_alphabet_positions_array = array_fill(1, 26, false);
    // echo '<pre>', var_dump($english_alphabet_positions_array), '</pre>';


    for ($i = 0; $i < $no_spaces_array_length; $i++) {
        // if (ord($no_spaces_array[$i]) >= ord('A') && ord($no_spaces_array[$i]) <= ord('Z')) { // Check if the letter is a 'capital' letter (meaning, if the letter ASCII >= 65 and letter ASCII <= 90)     // This is the same as:    if (ord($no_spaces_array[$i]) >= 65 && ord($no_spaces_array[$i]) <= 90) {
        if (ord($no_spaces_array[$i]) >= ord('a') && ord($no_spaces_array[$i]) <= ord('z')) {    // Check if the letter is a 'small'   letter (meaning, if the letter ASCII >= 97 and letter ASCII <= 122)    // This is the same as:    if (ord($no_spaces_array[$i]) >= 97 && ord($no_spaces_array[$i]) <= 122) {
            // echo ord($no_spaces_array[$i]) - ord('a') . '<br>'; // ord($no_spaces_array[$i]) - ord('a')    is the position of the letter in the English alphabet (example: 22 is the 22nd letter, or 15 is the 15th letter in the English alphabet, ...etc)
            $letter_position_in_English_alphabet = ord($no_spaces_array[$i]) - ord('a') + 1; // ord($no_spaces_array[$i]) - ord('a')    is the position of the letter in the English alphabet (example: 22 is the 22nd letter, or 15 is the 15th letter in the English alphabet, ...etc)    // General Rule: array key/index = array length/size - 1
            $english_alphabet_positions_array[$letter_position_in_English_alphabet] = true; // convert the letter position in the English alphabet (its key/index in the English alphabet array) from 'false' to 'true'    // ord($no_spaces_array[$i]) - ord('a')    is the position of the letter in the English alphabet (example: 22 is the 22nd letter, or 15 is the 15th letter in the English alphabet, ...etc)    // General Rule: array key/index = array length/size - 1
        }
    }

    // echo '<pre>', var_dump($english_alphabet_positions_array), '</pre>';


    return !in_array(false, $english_alphabet_positions_array) ? 'pangram' : 'not pangram'; // if the array contains one 'false', it's not a pangram, otherwise, it is.
}

// Test Case
// $result = pangrams('The quick brown fox jumps over the lazy dog');
// $result = pangrams('We promptly judged antique ivory buckles for the next prize');
// $result = pangrams('We promptly judged antique ivory buckles for the prize');
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 10) Permuting Two Arrays    // https://www.hackerrank.com/challenges/one-month-preparation-kit-two-arrays/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen
// Time Complexity: O(n log n)
function twoArrays($k, $A, $B) {
    // Pseudocode: Sort one of the two arrays ascendingly and the other descendingly, and check if the sum of the smallest number of one array and the greatest number of the other array is less than $k, then this 'NO', other than that, it's 'YES'    // Check    $A[$i] + $B[$i]    which means check the sum of the zeroth 0th number of one array and the zeroth 0th of the other array, and check the first 1st number of one array with the first 1st number of the other array, and check the second 2nd number of one array with the second 2nd number of the other array, ... and so on ...    // The sum of the greatest number and the smallest number must be more than > $k
    sort($A); // sorting $A array ascendingly
    rsort($B); // sorting $B array descendingly

    // echo '<pre>', var_dump($A_sorted_ascendingly), '</pre>';
    // echo '<pre>', var_dump($A), '</pre>';

    // echo '<pre>', var_dump($B_sorted_descendingly), '</pre>';
    // echo '<pre>', var_dump($B), '</pre>';

    $A_size = count($A); // Or:    $B_size = count($B);
    $answer = true;

    // echo '<pre>', var_dump($A), '</pre>';
    // echo '<pre>', var_dump($B), '</pre>';

    /*
    // This for loop is the same as the next foreach looop
    for ($i = 0; $i < $A_size; $i++) {
        // echo $i . '<br>';
        // echo $A[$i] . '<br>';
        // echo $B[$i] . '<br>';
        // echo $A[$i] . ' + ' . $B[$i] . ' = ' . $A[$i] + $B[$i] . '<br>';
        if ($A[$i] + $B[$i] < $k) { // $A and $B after having been sorted ($A ascendingly, $B descendingly)
            // echo $A[$i] . ' + ' . $B[$i] . ' = ' . $A[$i] + $B[$i] . '<br>';
            $answer = false;


            break; // For Better Performance, break out of the loop (get out of the loop)
        }
    }
    */

    // This foreach loop is the same as the previous for loop
    foreach ($A as $key => $A_number) {
        // echo $key . '<br>';
        // echo $A[$key] . ' + ' . $B[$key] . ' = ' . $A[$key] + $B[$key] . '<br>';
        if ($A[$key] + $B[$key] < $k) { // $A and $B after having been sorted ($A ascendingly, $B descendingly)
            // echo $A[$key] . ' + ' . $B[$key] . ' = ' . $A[$key] + $B[$key] . '<br>';
            $answer = false;


            break; // For Better Performance, break out of the loop (get out of the loop) once the condition fails / is not met/fulfilled
        }
    }


    return $answer == true ? 'YES' : 'NO';
}

// Test Case
// $result = twoArrays(1, [0, 1], [0, 2]);
// $result = twoArrays(10, [2, 1, 3], [7, 8, 9]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 11) Subarray Division 1    // https://www.hackerrank.com/challenges/one-month-preparation-kit-the-birthday-bar/problem?h_l=interview&h_r=next-challenge&h_v=zen&isFullScreen=true&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen
function birthday($s, $d, $m) {
    // The key word here is "contiguous segment", that's why we can compare every number with the preceding one and the succeeding one (depending on $m)
    // https://www.youtube.com/watch?v=0vvv4q1OSwY

    // First Solution/Approach:
    /*
    $array = [];
    $count = 0;

    foreach ($s as $number) {
        array_push($array, $number); // add $number to the end of the $array array    // the same as: $array[] = $number

        if (count($array) == $m) { // if the lenthg of the $array is equal to the desired length $m
            // echo '<pre>', var_dump($array), '</pre>';
            
            if (array_sum($array) == $d) { // if the sum of the $array numbers is equal to the desired number $d
                $count++;
            }


            array_shift($array); // Remove the first number from the beginning of the $array array
        }
    }

    echo $count . '<br>';
    */



    // The key word here is "contiguous segment", that's why we can compare every number with the preceding one and the succeeding one (depending on $m)
    // https://gist.github.com/vipinbaghel/f9fdbd7d02985b62e7b53df777a1b0f8
    // https://www.youtube.com/watch?v=0vvv4q1OSwY
    // Second Solution/Approach:
    $count = 0;
    $s_size = count($s);
    $last_index = ($s_size - 1) > 0 ? ($s_size - 1) : 1; // check till the second-to-last index, becasue the last number won't have some number next to it to be added to (to be summed with)    // I used this Ternary Operator to avoid the case where the array is composed of only ONE segement e.g. [2], and then the length would be 1 - 1 = 0 zero!!
    // echo $last_index . '<br>';

    for ($i = 0; $i < $last_index; $i++) { // keep checking till the SECOND-TO-LAST element, becasue the last number won't have some number next to it to be added to (to be summed with)
        // echo $i . '<br>';

        $sum = 0;
        for ($j = $i; $j < $i + $m; $j++) {
            // echo $j . '<br>';
            if ($j == $s_size) { // to prevent "array index out of bounds" error! resulting from the case where    ($i + $m ) > ($S array's last index)    // If $j == $s_length, this means we arrived at the last array index, and we don't (can't) compare the last element to NOTHING!
                break; // break out of the loop (get out of the loop)
            }

            $sum += $s[$j]; // is the same as:    $sum = $sum + $s[$j];
            // echo $sum . '<br>';
        }

        if ($sum == $d) {
            $count++;
        }
    }



    return $count;
}

// Test Case
// $result = birthday([2, 2, 1, 3, 2], 4, 2);
// $result = birthday([4], 4, 2);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 12) // XOR Strings 2 (Debugging problem)    // https://www.hackerrank.com/challenges/one-month-preparation-kit-strings-xor/problem?h_l=interview&h_r=next-challenge&h_v=zen&isFullScreen=true&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-one&h_r=next-challenge&h_v=zen&h_r=next-challenge&h_v=zen
function strings_xor(string $s, string $t) {
    // Note: x ^ x = 0, 0 ^ 1 = 1
    $s_length = strlen($s);
    $result = '';

    for ($i = 0; $i < $s_length; $i++) {
        if ($s[$i] == $t[$i]) { // x ^ x = 0, 0 ^ 1 = 1
            $result .= '0'; // is the same as:    $result = $result . 0
        } else { // x ^ x = 0, 0 ^ 1 = 1
            $result .= '1'; // is the same as:    $result = $result . 1
        }
    }

    // echo $result . '<br>';

    
    return $result;    
}

// Test Case
// echo '<pre>', var_dump(strings_xor('10101', '00101')), '</pre>';

/*********************************************************************************************************************************************/

// 13) FizzBuzz (Mock Test)    // https://www.hackerrank.com/test/143hd7jsid6/questions/521e954e6ff11
function fizzBuzz($n) {
    // echo 10 % 2 . '<br>'; // modulus operator (modulo operation)
    // echo 11 % 2 . '<br>'; // modulus operator (modulo operation)

    for ($i = 1; $i <= 15; $i++) {
        // echo $i . '<br>';
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

// Test Case
// fizzBuzz(15);

/*********************************************************************************************************************************************/

// 14) Find the Median (Mock Test)    // https://www.hackerrank.com/test/flgjjnhfm7i/questions/a8taf02a12a
function findMedian($arr) {
    // Pseudocode: Sort the $arr array ascendingly, then since the given $arr array length/size is always ODD (from the problem itself), we get the median by dividing the $arr array size / 2, then get the next integer (using the ceil() function), then convert this array length/size to an array index/key by deducting - 1 (General Rule:    array index/key = array length/size - 1    )

    /*
    // First Solution/Approach:
    sort($arr); // Sort the $arr array ascendingly
    // echo '<pre>', var_dump($arr), '</pre>';
    
    $arr_size           = count($arr);
    $median_array_index = ceil($arr_size / 2) - 1; // Since the given $arr array length/size is always ODD, we get the median by dividing the $arr array size / 2, then get the next integer (using the ceil() function), then convert this array length/size to an array index/key by deducting - 1 (General Rule:    array index/key = array length/size - 1    )


    // echo '<pre>', var_dump($arr[$median_array_index]), '</pre>';
    

    return $arr[$median_array_index];
    */



    // Second Solution/Approach (more concise and elegant). Note: This solution only works for an ODD number of $arr length!
    // https://www.youtube.com/watch?v=slNxJK85weY
    sort($arr); // Sort the $arr array ascendingly

    $arr_size = count($arr);

    // echo $arr[floor($arr_size / 2)] . '<br>';


    // Since the $arr length is always ODD (from the problem itself)
    return $arr[floor($arr_size / 2)];
}

// Test Case
// $result = findMedian([5, 3, 1, 2, 4]);
// $result = findMedian([0, 1, 2, 4, 6, 5, 3]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 15) Sales by Match    // https://www.hackerrank.com/challenges/one-month-preparation-kit-sock-merchant/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=one-month-preparation-kit&playlist_slugs%5B%5D=one-month-week-two
function sockMerchant($n, $ar) {
    // Pseudocode:
    // https://github.com/akaufman3/hackerrank/blob/main/interview-preparation-kit/sales-by-match.php
    // $ar_size = count($ar); // is the same as:    $n

    /*
    // First Solution/Approach: Finding matches
    // Compare every number in the $ar array to all the other numbers of the array, and check if there are similars of it, and if so, increase the counter $count by + 1 
    $count = 0;

    for ($i = 0; $i < $n; $i++) { // $n is the $ar array size    // For every element in the original $ar array
        // echo $i . '<br>';

        if ($ar[$i] != 0) { // We'll convert every PAIRED number to zero inside the next for loop, to not take it into consideration again (to prevent repetition)
            for ($match = $i + 1; $match < $n; $match++) { // Check the numbers after the current number ($ar[$i]) (starting from the next/following number till the end of the $ar array)     // $match = $i + 1    means check the right next numbers (after the current number)
                // if ($match == 8) {
                //     echo $match . '<br>';
                // }

                // echo $match . '<br>';

                if ($ar[$i] == $ar[$match]) { // if the current number ($ar[$i]) under discussion finds a match ($ar[$match]), convert that match $match to 0 zero (to exclude it, and to not look at it again! (check the last if condition)), and get out of the loop to go to the next iteration because once the current number $ar[$i] has found its match, we don't want to inspect it again to prevent repetition, and we need to go to check the next iteration (or the next number ($ar[$i])) (tip: use a pen and paper to test this loop!)
                    // echo $ar[$i] . ' and ' . $ar[$match] . '<br>';
                    $count++;
                    $ar[$match] = 0; // convert every paired number to zero (Note that we check if $ar[$i] doesn't equal 0 zero outside the loop), to prevent repetition    // if the current number is paired (found a match!), convert the matched number to zero 0 to not check it again, and break of out the current iteration of the loop to prevent repetition


                    break; // if the current number is paired (found a match!), get out of loop/break out of the loop immediately! (to prevent repetition)
                }
            }
        }

    }

    // echo $count . '<br>';


    return $count;
    */



    // Second Solution/Approach: Creating a frequency array for the $ar array (Creating a frequency array EITHER by using array_fill() function Or array_count_values() function. Note: There's a third way to create a frequence array, check 'Sparse Arrays' HackerRank problem.)
    // Another way to create a frequency Array is to use array_count_values() function
    /*
    // echo '<pre>', var_dump($ar), '</pre>';
    // echo '<pre>', var_dump(min($ar)), '</pre>';
    // echo '<pre>', var_dump(max($ar)), '</pre>';
    $ar_minimum = min($ar);
    $ar_maximum = max($ar);


    // Create a frequency array using array_fill() function
    // $frequencyArray = array_fill($ar_minimum, $ar_maximum, 0); // Or    $frequencyArray = array_fill(0, 101, 0); // As the constraints of the problem is    1 < n <= 100    // Note that array_fill() function by nature takes the first argument ($ar_minimum) and the second argument ($ar_maximum) to form its keys/indexes
    
    // Or instead of using $ar_minimum and $ar_maximum, we can use the original problem constraints, where 1 <= $ar[$i] <= 100 and 0 <= n < 100, we do it as follows:
    $frequencyArray = array_fill(0, 100, 0);
    // echo '<pre>', var_dump($frequencyArray), '</pre>';



    // Fill in the $frequencyArray (We loop through the original array $ar)
    for ($i = 0; $i < $n; $i++) { // $n is the given $ar array length in the problem
        // echo $ar[$i] . '<br>';
        $frequencyArray[$ar[$i]]++; // if the 'Value' of the $ar array is equal to the 'Key/Index' of the $frequencyArray, increase $frequencyArray value by + 1
    }
    // echo '<pre>', var_dump($frequencyArray), '</pre>';


    $count = 0;
    // Loop through the $frequencyArray
    for ($i = $ar_minimum; $i < $ar_minimum + $ar_maximum; $i++) { // Note that array_fill() function by nature takes the first argument ($ar_minimum) and the second argument ($ar_maximum) to form its keys/indexes
        // echo $i . '<br>';

        if ($frequencyArray[$i] != 0 && !$frequencyArray[$i] / 2 < 1) { // Exclude zeros values and check if the number when divided by 2 is not less than one 1 (to avoid fractions, for example if the number is 1, then 1 / 2 = 0.5)
            // echo $frequencyArray[$i] . '<br>';
            $count += floor($frequencyArray[$i] / 2); // Divide by 2 to get the number of pairs    // We use floor() for the cases where the number is odd (example: if the number is 3, then 3 / 2 = 1.5, then we get the floor() which is 1)
        }
    }
    // echo $count . '<br>';


    return $count;
    */



    // Third Solution/Approach: using array_count_values() function
    // Create a frequency array using array_count_values() function
    $frequencyArray = array_count_values($ar);
    // echo '<pre>', var_dump($frequencyArray), '</pre>';


    $pairs_count = 0;
    // Note: It's recommended here to use a foreach loop, not for loop, because we use the $ar array keys/indexes are haphazard/random and not organized ranges
    foreach ($frequencyArray as $number) {
        // echo $number . '<br>';
        if (!$number / 2 < 1) { // This could also WORK if we remove this if condition altogether because the floor of any fraction would be equal to zero (example: 1 / 2 = 0.5, and the floor of "0.5" is "0" zero)    // Check if the number when divided by 2 is not less than one 1 (to avoid fractions, for example if the number is 1, then 1 / 2 = 0.5)
            // echo $number / 2 . '<br>';
            $pairs_count += floor($number / 2); // is the same as (integer division):    $pairs_count += intdiv($number, 2);    // https://www.google.com/search?q=what+is+integer+division%3F&sxsrf=ALiCzsahvV5IbjdlZOaXVLMQhl9OxoMXIg%3A1669691385724&ei=-XeFY5XiK4ebkdUPoc-RuA4&ved=0ahUKEwjVwriPtdL7AhWHTaQEHaFnBOcQ4dUDCBA&uact=5&oq=what+is+integer+division%3F&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIECCMQJzIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBggAEBYQHjIGCAAQFhAeOgcIIxCwAxAnOgoIABBHENYEELADOgcIABCwAxBDSgQIQRgASgQIRhgAUMEIWMEIYNEKaAFwAXgAgAGXAYgBlwGSAQMwLjGYAQCgAQHIAQrAAQE&sclient=gws-wiz-serp
        }
    }
    // echo $pairs_count . '<br>';


    return $pairs_count;
}

// Test Case
// $result = sockMerchant(7, [1, 2, 1, 2, 1, 3, 2]);
// $result = sockMerchant(9, [10, 20, 20, 10, 10, 30, 50, 10, 20]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 16) Breaking the Records    // https://www.hackerrank.com/challenges/three-month-preparation-kit-breaking-best-and-worst-records/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-one
// Time Complexity: $\mathcal{O(n)}
function breakingRecords($scores) {
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-breaking-best-and-worst-records/editorial
    // https://www.youtube.com/watch?v=fxP31n68YoM
    $scores_array_length = count($scores);

    // Note: As stated in th problem, the first match is our BASELINE, so we consider BOTH the current lowest and highest scores are the first match score (which is $scores[0])
    $currentHighestScore = $scores[0]; // As stated in th problem, the first match is our BASELINE
    $currentLowestScore  = $scores[0]; // As stated in th problem, the first match is our BASELINE

    $breakingHighestRecordCount = 0;
    $breakingLowestRecordCount  = 0;

    for ($i = 1; $i < $scores_array_length; $i++) { // $i = 1; (Not $i = 0;)    Because, the first match scores are the BASELINE (as stated in the problem), and we start comparing from the following/subsequent match
        if ($scores[$i] < $currentLowestScore) {
            $breakingLowestRecordCount++; // increase the number of times the lowest score is broken
            $currentLowestScore = $scores[$i]; // change the old current lowest score to the new current lowest score

        } elseif ($scores[$i] > $currentHighestScore) {
            $breakingHighestRecordCount++; // increase the number of times the highest score is broken
            $currentHighestScore = $scores[$i]; // change the old current highest score to the new current highest score
        }
    }
    // echo '<pre>', var_dump([$breakingHighestRecordCount, $breakingLowestRecordCount]), '</pre>';


    return [
        $breakingHighestRecordCount, $breakingLowestRecordCount
    ];
}

// Test Case
// $result = breakingRecords([12, 24, 10, 24]);
// $result = breakingRecords([10, 5, 20, 20, 4, 5, 2, 25, 1]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 17) Camel Case 4    // https://www.hackerrank.com/challenges/three-month-preparation-kit-camel-case/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-one
// Check the code that I submitted to HackerRank at the end (inside the multi-line comments /* */)!! And Check the 'test.txt' file and 'Camel Case 4.php' file inside this folder!!
// Tip: It's recommended to check 'View Page Source' instead of the regular HTML web page because we're printing out to the console (STDOUT)! ('View Page Source' is like 'console'!)
// Note: You must use newline character "\n" here in this problem instead of the <br> HTML tag, because you're dealing with STDOUT (console), not an HTML page (<br> is an HTML tag, is not equal to the "\n" newline character of the server (console))
// https://www.google.com/search?q=add+spaces+in+strings+when+uppercase+php&sxsrf=ALiCzsb358itGlNW7yC_qO4SicZUuKPEFQ%3A1669481507850&ei=I0SCY_HEM5irxc8Pto2QmA4&ved=0ahUKEwix4u-hp8z7AhWYVfEDHbYGBOMQ4dUDCA8&uact=5&oq=add+spaces+in+strings+when+uppercase+php&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQogQyBwgAEB4QogQ6CggAEEcQ1gQQsAM6BAghEApKBAhBGABKBAhGGABQrhBYqS5gnTFoAnABeACAAckBiAHkEJIBBjAuMTMuMZgBAKABAcgBCMABAQ&sclient=gws-wiz-serp
// https://www.google.com/search?q=how+to+remove+spaces+from+string+in+php&oq=how+to+remove+spaces+from+string+in+php&aqs=chrome..69i57j0i22i30l3.9488j0j7&sourceid=chrome&ie=UTF-8
// use trim(), substr(), str_replace() functions
// https://www.youtube.com/watch?v=ylrf__E4RiU&list=PLDoPjvoNmBAy41u35AqJUrI-H83DObUDq&index=88
// https://www.youtube.com/watch?v=c9HbsUSWilw
// https://www.youtube.com/watch?v=Z66TeSTcP-Q

// $_fp = fopen("php://stdin", "r");

// $handle = fopen('test.txt', 'r');
// // echo fread($handle, filesize('test.txt'));
// // echo '<pre>', var_dump($handle), '</pre>';
// // echo '<pre>', var_dump(fread($handle, filesize('test.txt'))), '</pre>'; // Reads the whole file into a string
// // echo '<pre>', var_dump(file_get_contents('test.txt')), '</pre>'; // Reads the whole file into a string
// // echo '<pre>', var_dump(file('test.txt')), '</pre>'; // Reads the whole file into an array

// // echo '<pre>', var_dump(count(file('test.txt'))), '</pre>'; // the number of lines in the file

// // for ($i = 0; $i < count(file('test.txt')); $i++) { // count(file('test.txt')    is the number of lines in the 'test.txt' file    // This is the same as:    while (!feof($handle)) { // As long as (while) we didn't reach the end of file
// while (!feof($handle)) { // count(file('test.txt')    is the number of lines in the 'test.txt' file    // This is the same as:    while (!feof($handle)) { // As long as (while) we didn't reach the end of file
//     // echo fgets($handle) . '<br>';  // Reads one line only in the file
//     // echo '<pre>', var_dump(fgets($handle)), '</pre>';

//     // echo file('test.txt') . '<br>'; // Reads the whole file into an array



//     $line = fgets($handle);
//     // echo $line . '<br>'; // Note: The extra space and newline \n after preg_replace() come from the extra space and the newline character \n in the original file 'test.txt'
//     // echo '<pre>', var_dump($line), '</pre>'; // Note: The extra space and newline \n after preg_replace() come from the extra space and the newline character \n in the original file 'test.txt'


//     // 'Lines starting with "S"'
//     if ($line[0] == 'S') { // 'Split'
//         // echo 'Line starts with a capital S' . '<br>';
//         if ($line[2] == 'M') { // 'Method'
//             // echo 'Third letter is a capital M' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>';

//             // echo '<pre>', var_dump(preg_match('/(?:[S];[M];)([a-z])([A-Z][a-z]+)(?:\(\))/', $line, $matches)), '</pre>'; // (?: ) is a non-capturing group
//             // echo '<pre>', var_dump(preg_match('/(?:[S];[M];)([a-z]+)([A-Z])([a-z]+)(?:\(\))/', $line, $matches)), '</pre>'; // to be used with preg_replace_callback() function
//             // echo '<pre>', var_dump($matches), '</pre>';
//             // echo '<pre>', var_dump($matches[1]), '</pre>';

//             // Note: The extra space and newline \n after preg_replace() come from the extra space and the newline character \n in the original file 'test.txt'. You can confirm that by checking:    echo '<pre>', var_dump($line), '</pre>';

//             // echo '<pre>', var_dump(preg_replace('/(?:[S];[M];)([a-z]+)([A-Z][a-z]+)(?:\(\))/', '$1 $2', $line)), '</pre>';

//             // echo '<pre>', var_dump(preg_replace_callback(
//             //     '/(?:[S];[M];)([a-z]+)([A-Z])([a-z]+)(?:\(\))/', // (?: ) is a non-capturing group
//             //     function ($matches) {
//             //         // echo strlen($matches[1]) . ' ' . strlen($matches[2]) . ' ' . strlen($matches[3]) . '<br>';
//             //         // echo '<pre>', var_dump($matches[1], $matches[2], $matches[3]), '</pre>';
//             //         return strtolower($matches[1] . ' ' . $matches[2] . $matches[3]);
//             //     },
//             //     trim($line) // trim() function is used here because of the extra spaces and newline \n characters that are coming from the original file 'test.txt'
//             // )), '</pre>';

//             // echo preg_replace_callback(
//             //     '/(?:[S];[M];)([a-z]+)([A-Z])([a-z]+)(?:\(\))/', // (?: ) is a non-capturing group
//             //     function ($matches) {
//             //         // echo strlen($matches[1]) . ' ' . strlen($matches[2]) . ' ' . strlen($matches[3]) . '<br>';
//             //         // echo '<pre>', var_dump($matches[1], $matches[2], $matches[3]), '</pre>';
//             //         return strtolower($matches[1] . ' ' . $matches[2] . $matches[3]);
//             //     },
//             //     trim($line) // trim() function is used here because of the extra spaces and newline \n characters that are coming from the original file 'test.txt'
//             // ) . "\n";

//             // Another way:
//             // echo strtolower(preg_replace('/(?:[S];[M];)([a-z]+)([A-Z][a-z]+)(?:\(\))/', '$1 $2', trim($line))); // trim() function is used here because of the extra spaces and newline characters \n that are coming from the original file 'test.txt'


//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             // echo $processed_line . '<br>';

//             /* 
//                 Note: Instead of the next for loop here, we could use Positive Lookbehind Assertions to find a capital letter preceded by a space:
//                 https://www.google.com/search?q=add+spaces+in+strings+when+uppercase+php&oq=add&aqs=chrome.0.69i59j69i57j69i59j46i131i433i512j0i512j69i60l3.6633j0j7&sourceid=chrome&ie=UTF-8
//                 https://www.codexworld.com/how-to/insert-space-before-capital-letters-in-string-using-php/
//             */
//             // Lowercase the capital letter and add a space
//             for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//                 // echo $processed_line[$letter] . '<br>';
//                 if (ctype_upper($processed_line[$letter]) == true) {
//                     // echo $processed_line[$letter] . '<br>';
//                     // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//                     $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//                 }
//             }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)

//         } elseif ($line[2] == 'C') { // 'Class'
//             // echo 'Third letter is a capital C' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>';

//             // echo '<pre>', var_dump(preg_match('/(?:[S];[C];)([A-Z])([a-z]+)([A-Z])([a-z]+)([A-Z])([a-z]+)/', $line, $matches)), '</pre>';
//             // echo '<pre>', var_dump($matches), '</pre>';

//             // echo preg_replace_callback(
//             //     '/(?:[S];[C];)([A-Z])([a-z]+)([A-Z])([a-z]+)([A-Z])([a-z]+)/',
//             //     function ($matches) {
//             //         // echo strlen($matches[1]) . ' ' . strlen($matches[2]) . ' ' . strlen($matches[3]) . '<br>';
//             //         // echo '<pre>', var_dump($matches[1], $matches[2], $matches[3]), '</pre>';
//             //         return strtolower($matches[1] . $matches[2] . ' ' . $matches[3] . $matches[4] . ' ' . $matches[5] . $matches[6]);
//             //     },
//             //     trim($line) // trim() function is used here because of the extra spaces and newline \n characters that are coming from the original file 'test.txt'
//             // ) . "\n";

//             // Another way:
//             // echo strtolower(preg_replace('/(?:[S];[M];)([a-z]+)([A-Z][a-z]+)(?:\(\))/', '$1 $2', trim($line))); // trim() function is used here because of the extra spaces and newline characters \n that are coming from the original file 'test.txt'


//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             // $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             $processed_line = lcfirst($processed_line); // Lowercase the first character in $processed_line
//             // echo $processed_line . '<br>';

//             /* 
//                 Note: Instead of the next for loop here, we could use Positive Lookbehind Assertions to find a capital letter preceded by a space:
//                 https://www.google.com/search?q=add+spaces+in+strings+when+uppercase+php&oq=add&aqs=chrome.0.69i59j69i57j69i59j46i131i433i512j0i512j69i60l3.6633j0j7&sourceid=chrome&ie=UTF-8
//                 https://www.codexworld.com/how-to/insert-space-before-capital-letters-in-string-using-php/
//             */
//             // Lowercase the capital letter and add a space
//             for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//                 // echo $processed_line[$letter] . '<br>';
//                 if (ctype_upper($processed_line[$letter]) == true) {
//                     // echo $processed_line[$letter] . '<br>';
//                     // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//                     $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//                 }
//             }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)

//         } elseif ($line[2] == 'V') { // 'Variable'
//             // echo 'Third letter is a capital V' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>';

//             // echo '<pre>', var_dump(preg_match('/(?:[S];[V];)([a-z]+)([A-Z])([a-z]+)/', $line, $matches)), '</pre>';
//             // echo '<pre>', var_dump($matches), '</pre>';

//             // echo preg_replace_callback(
//             //     '/(?:[S];[V];)([a-z]+)([A-Z])([a-z]+)/',
//             //     function ($matches) {
//             //         // echo strlen($matches[1]) . ' ' . strlen($matches[2]) . ' ' . strlen($matches[3]) . '<br>';
//             //         // echo '<pre>', var_dump($matches[1], $matches[2], $matches[3]), '</pre>';
//             //         return strtolower($matches[1] . ' ' . $matches[2] . $matches[3]);
//             //     },
//             //     trim($line) // trim() function is used here because of the extra spaces and newline \n characters that are coming from the original file 'test.txt'
//             // ) . "\n";

//             // Another way:
//             // echo strtolower(preg_replace('/(?:[S];[M];)([a-z]+)([A-Z][a-z]+)(?:\(\))/', '$1 $2', trim($line))); // trim() function is used here because of the extra spaces and newline characters \n that are coming from the original file 'test.txt'


//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             // $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             // echo $processed_line . '<br>';

//             /* 
//                 Note: Instead of the next for loop here, we could use Positive Lookbehind Assertions to find a capital letter preceded by a space:
//                 https://www.google.com/search?q=add+spaces+in+strings+when+uppercase+php&oq=add&aqs=chrome.0.69i59j69i57j69i59j46i131i433i512j0i512j69i60l3.6633j0j7&sourceid=chrome&ie=UTF-8
//                 https://www.codexworld.com/how-to/insert-space-before-capital-letters-in-string-using-php/
//             */
//             // Lowercase the capital letter and add a space
//             for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//                 // echo $processed_line[$letter] . '<br>';
//                 if (ctype_upper($processed_line[$letter]) == true) {
//                     // echo $processed_line[$letter] . '<br>';
//                     // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//                     $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//                 }
//             }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)
//         }
//     }



//     // 'Lines starting with "C"'
//     if ($line[0] == 'C') { // 'Combine'
//         // echo 'Line starts with a capital C' . '<br>';

//         if ($line[2] == 'M') { // 'Method'
//             // echo 'Third letter is a capital M' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>';

//             // echo '<pre>', var_dump(preg_match('/(?:[S];[C];)([A-Z])([a-z]+)([A-Z])([a-z]+)([A-Z])([a-z]+)/', $line, $matches)), '</pre>';
//             // echo '<pre>', var_dump($matches), '</pre>';

//             // echo preg_replace_callback(
//             //     '/(?:[S];[V];)([a-z]+)([A-Z])([a-z]+)/',
//             //     function ($matches) {
//             //         // echo strlen($matches[1]) . ' ' . strlen($matches[2]) . ' ' . strlen($matches[3]) . '<br>';
//             //         // echo '<pre>', var_dump($matches[1], $matches[2], $matches[3]), '</pre>';
//             //         return strtolower($matches[1] . ' ' . $matches[2] . $matches[3]);
//             //     },
//             //     trim($line) // trim() function is used here because of the extra spaces and newline \n characters that are coming from the original file 'test.txt'
//             // ) . "\n";

//             // Another way:
//             // echo strtolower(preg_replace('/(?:[S];[M];)([a-z]+)([A-Z][a-z]+)(?:\(\))/', '$1 $2', trim($line))); // trim() function is used here because of the extra spaces and newline characters \n that are coming from the original file 'test.txt'


//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             // $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             // $processed_line = strtolower($processed_line);
//             $processed_line = ucwords($processed_line); // Uppercase the first character of each word in $processed_line
//             $processed_line = lcfirst($processed_line); // Lowercase the first character in $processed_line
//             $processed_line = str_replace(' ', '', $processed_line); // remove spaces from $processed_line
//             // echo $processed_line . '()' . '<br>'; // add the parentheses required in the problem

//             // for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//             //     // echo $processed_line[$letter] . '<br>';
//             //     if (ctype_upper($processed_line[$letter]) == true) {
//             //         // echo $processed_line[$letter] . '<br>';
//             //         // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//             //         $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//             //     }
//             // }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . '()' . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)

//         } elseif ($line[2] == 'C') { // 'Class'
//             // echo 'Third letter is a capital C' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>';

//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             // $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             // $processed_line = strtolower($processed_line);
//             $processed_line = ucwords($processed_line); // Uppercase the first character of each word in $processed_line
//             // $processed_line = lcfirst($processed_line); // Lowercase the first character in $processed_line
//             $processed_line = str_replace(' ', '', $processed_line); // remove spaces from $processed_line
//             // echo $processed_line . '<br>'; // add the parentheses required in the problem

//             // for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//             //     // echo $processed_line[$letter] . '<br>';
//             //     if (ctype_upper($processed_line[$letter]) == true) {
//             //         // echo $processed_line[$letter] . '<br>';
//             //         // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//             //         $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//             //     }
//             // }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)

//         } elseif ($line[2] == 'V') { // 'Variable'
//             // echo 'Third letter is a capital V' . '<br>';
//             // echo '<pre>', var_dump($line), '</pre>'; 

//             // Solution/Approach using functions mainly instead of Regular Expression
//             $processed_line = substr(trim($line), 4); // trim() function is used to strip the extra spaces and newline characters \n coming from the original file 'test.txt'    // substr() function is used to remove the first 4 characters (example: 'S;C;')
//             // $processed_line = str_replace(['(', ')'], ['', ''], $processed_line); // remove the '(' and ')' of the parentheses
//             // $processed_line = strtolower($processed_line);
//             $processed_line = ucwords($processed_line); // Uppercase the first character of each word in $processed_line
//             $processed_line = lcfirst($processed_line); // Lowercase the first character in $processed_line
//             $processed_line = str_replace(' ', '', $processed_line); // remove spaces from $processed_line
//             // echo $processed_line . '<br>'; // add the parentheses required in the problem

//             // for ($letter = 0; $letter < strlen($processed_line); $letter++) { // Important Note: Avoid using the same variable name '$i' that you have used for the big outer loop to avoid great problems! (instead use something meaningful like '$letter')
//             //     // echo $processed_line[$letter] . '<br>';
//             //     if (ctype_upper($processed_line[$letter]) == true) {
//             //         // echo $processed_line[$letter] . '<br>';
//             //         // $processed_line[$letter] = ' ' . strtolower($processed_line[$letter]);
//             //         $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
//             //     }
//             // }
//             // echo $processed_line . '<br>';
//             // echo '<pre>', var_dump($processed_line), '</pre>';
//             echo $processed_line . "\n"; // used the newline character "\n" because we're dealing with STDOUT (console)
//         }       
//     }

//     // foreach (str_split($line) as $letter) {
//     //     echo $letter;
//     // }
// }


// // echo '<pre>', var_dump(fscanf($handle, "%s%s")), '</pre>';

// fclose($handle);



// The code that I submitted to HackerRank! (must be submitted this way due to differences (STDIN, STDOUT, $handle, ...etc))!!
/*
// $handle = fopen('test.txt', 'r');
while (!feof($_fp)) {
    $line = fgets($_fp);
    if ($line[0] == 'S') {
        if ($line[2] == 'M') {
            $processed_line = substr(trim($line), 4);
            $processed_line = str_replace(['(', ')'], ['', ''], $processed_line);
            for ($letter = 0; $letter < strlen($processed_line); $letter++) {
                if (ctype_upper($processed_line[$letter]) == true) {
                    $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
                }
            }
            echo $processed_line . "\n";
        } elseif ($line[2] == 'C') {
            $processed_line = substr(trim($line), 4);
            $processed_line = lcfirst($processed_line);
            for ($letter = 0; $letter < strlen($processed_line); $letter++) {
                if (ctype_upper($processed_line[$letter]) == true) {
                    $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
                }
            }
            echo $processed_line . "\n";
        } elseif ($line[2] == 'V') {
            $processed_line = substr(trim($line), 4);
            for ($letter = 0; $letter < strlen($processed_line); $letter++) {
                if (ctype_upper($processed_line[$letter]) == true) {

                    $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
                }
            }
            echo $processed_line . "\n";
        }
    }
    if ($line[0] == 'C') {
        if ($line[2] == 'M') {
            $processed_line = substr(trim($line), 4);
            $processed_line = ucwords($processed_line);
            $processed_line = lcfirst($processed_line);
            $processed_line = str_replace(' ', '', $processed_line);
            echo $processed_line . '()' . "\n";
        } elseif ($line[2] == 'C') {
            $processed_line = substr(trim($line), 4);
            $processed_line = ucwords($processed_line);
            $processed_line = str_replace(' ', '', $processed_line);
            echo $processed_line . "\n";
        } elseif ($line[2] == 'V') {
            $processed_line = substr(trim($line), 4);
            $processed_line = ucwords($processed_line);
            $processed_line = lcfirst($processed_line);
            $processed_line = str_replace(' ', '', $processed_line);

            echo $processed_line . "\n";
        }       
    }
}
fclose($_fp);
*/

/*********************************************************************************************************************************************/

// 18) Divisible Sum Pairs    // https://www.hackerrank.com/challenges/three-month-preparation-kit-divisible-sum-pairs/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-one
// Time Complexity: O(n^2)
// Refer back to HackerRank 'Sales by Match' and 'Subarray Division 1' problems
function divisibleSumPairs($n, $k, $ar) {
    $count = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) { // Check the numbers after the current number ($ar[$i]) (starting from the next/following number till the end of the $ar array)     // $j = $i + 1    means check the right next numbers (after the current number)
            if (($ar[$i] + $ar[$j]) % $k == 0) { // modulus (modulo operation)
                $count++;
            }
        }
    }

    // echo $count . '<br>';


    return $count;
}

// Test Case
// $result = divisibleSumPairs(6, 5, [1, 2, 3, 4, 5, 6]);
// $result = divisibleSumPairs(6, 3, [1, 3, 2, 6, 1, 2]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 19) Grading Students    // https://www.hackerrank.com/challenges/three-month-preparation-kit-grading/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two
// Time Complexity: O(n)
function gradingStudents($grades) {
    // Pseudocode: Observation: The difference between the student's grade and the next multiple of 5 will be < 3 if the grade itself % (mod) 5 is less than three < 3 (i.e. if the (grade % 5) is < 3)
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-grading/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two

    /*
    // First Solution/Approach (HackerRank's solution):
    $grades_length = count($grades);

    // $resultArray = [];
    for ($i = 0; $i < $grades_length; $i++) {
        if ($grades[$i] >= 38 && $grades[$i] % 5 >= 3) { // % is modulus sign (modulo operation). A 16 % 5 = 1 operation can be pronounced like: 16 mod (or modulus or modulo) 5 equals 1
            while ($grades[$i] % 5 != 0) { // increment the number by 1 (+ 1) until its mod 5 %5 equals zero 0
                $grades[$i]++;
            }
        }
    }

    // echo '<pre>', var_dump($grades), '</pre>';


    return $grades;
    */


    // Second Solution/Approach (HackerRank's solution too (more optimized)):
    // Pseudocode: Observation: Take an example, a range from 80 to 85, 83 and 84 ONLY will have mod 5 equalling >= 3, 83 % 5 = 3 and 84 % 5 = 4, so that's a 3 and 4
    $grades_length = count($grades);

    // Note: We'll change/modify the original array (won't create a new one)
    for ($i = 0; $i < $grades_length; $i++) {
        // if ($grades[$i] >= 38 && $grades[$i] % 5 >= 3) { // % is modulus sign (modulo operation). A 16 % 5 = 1 operation can be pronounced like: 16 mod (or modulus or modulo) 5 equals 1
            // To be more efficient (optimized) and calculate $grades[$i] % 5 once ever ONLY (instead of twice)
            if ($grades[$i] >= 38) { // % is modulus sign (modulo operation). A 16 % 5 = 1 operation can be pronounced like: 16 mod (or modulus or modulo) 5 equals 1
            $gradeModFive = $grades[$i] % 5;

            if ($gradeModFive >= 3) {
                $grades[$i] = $grades[$i] - $gradeModFive + 5; // Example: For 84, 84 - (84 % 5 = 4) + 5 = 85    // Take an example, a range from 80 to 85, 83 and 84 ONLY will have mod 5 equalling >= 3, 83 % 5 = 3 and 84 % 5 = 4, so that's a 3 and 4
            }
            // $grades[$i] += 5 - ($grades[$i] % 5); // Example: For 84, 84 + 5 - (84 % 5 = 4) = 85    // Take an example, a range from 80 to 85, 83 and 84 ONLY will have mod 5 equalling >= 3, 83 % 5 = 3 and 84 % 5 = 4, so that's a 3 and 4
            // $grades[$i] = $grades[$i] - ($grades[$i] % 5) + 5; // Example: For 84, 84 - (84 % 5 = 4) + 5 = 85    // Take an example, a range from 80 to 85, 83 and 84 ONLY will have mod 5 equalling >= 3, 83 % 5 = 3 and 84 % 5 = 4, so that's a 3 and 4
        }
    }

    // echo '<pre>', var_dump($grades), '</pre>';


    return $grades;
}

// Test Case
// $result = gradingStudents([84, 29, 57]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 20) Counting Valleys    // https://www.hackerrank.com/challenges/three-month-preparation-kit-counting-valleys/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two
// Time Complexity: O(n)
function countingValleys($steps, $path) {
    // Psedocode: The number of valleys can be counted as the number of steps taken 'U' (Upward) to the sea leve zero 0 (from 'U'(+1) to 0). Every 'U' is +1 and every 'D' is -1
    $current_level = 0; // Hiking starts from level 0 (the sea level)
    $from_minusone_to_zero_level_count = 0; // count of valleys  walked through

    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') { // if the last step (    $path[$i] is 'U'    ) is 'U' upwards
            $current_level++; // is the same as:    $current_level += 1;

            if ($current_level == 0) { // if the last step (    $path[$i] is 'U'    ) is 'U' upwards AND its direction is to the sea level zero 0 (meaning, $current_level is 0)
                $from_minusone_to_zero_level_count++;
            }

        } elseif ($path[$i] == 'D') { // if the last step (    $path[$i] is 'D'    ) is 'D' downwards
            $current_level--; // is the same as:    $current_level -= 1;
        }

        /*
        if ($path[$i] == 'U' && $current_level == 0) { // if the last step (    $path[$i] is 'U'    ) is 'U' upwards AND its direction is to the sea level zero 0 (meaning, $current_level is 0)
            $from_minusone_to_zero_level_count++;
        }
        */
    }

    // echo $current_level . '<br>'; // Must be always zero 0
    // echo $from_minusone_to_zero_level_count++;


    return $from_minusone_to_zero_level_count;
}

// Test Case
// $result = countingValleys(8, 'UDDDUDUU');

/*********************************************************************************************************************************************/

// 21) Mars Exploration    // https://www.hackerrank.com/challenges/three-month-preparation-kit-mars-exploration/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-two
// Time Complexity: O(n)
function marsExploration($s) {

    // First Solution/Approach (optimized solution and more professional):
    // Pseudocode: Observation: The Natural Numbers (0, 1, 2, 3, 4, 5, 6, 7, ...) modulo % number three 3 has results of that pattern (0, 1, 2, 0, 1, 2, 0, 1, 2, ...)
    // echo 0 % 3 . '<br>'; // Answer is 0
    // echo 1 % 3 . '<br>'; // Answer is 1
    // echo 2 % 3 . '<br>'; // Answer is 2
    // echo 3 % 3 . '<br>'; // Answer is 0
    // echo 4 % 3 . '<br>'; // Answer is 1
    // echo 5 % 3 . '<br>'; // Answer is 2


    $s_length = strlen($s);
    $sos = 'SOS';
    $changes_count = 0;


    for ($i = 0; $i < $s_length; $i++) {
        // echo $i     . '<br>';
        // echo $i % 3 . '<br>';

        if ($s[$i] != $sos[$i % 3]) {
            $changes_count++;
        }
    }


    return $changes_count;



    /*
    // Second Solution/Approach (less professional):
    // https://www.geeksforgeeks.org/how-to-repeat-a-string-to-a-specific-number-of-times-in-php/
    $s_length = strlen($s);
    $changes_count = 0;

    $expected_sos_string = str_repeat('SOS', $s_length / 3); // 3 is the number of letters in 'SOS'    // for example, if $s_length / 3 = 2, then the expected SOS string is 'SOSSOS'
    // echo '<pre>', var_dump($expected_sos_string), '</pre>';


    for ($i = 0; $i < $s_length; $i++) {
        // echo $i     . '<br>';
        // echo $i % 3 . '<br>';

        if ($s[$i] != $expected_sos_string[$i]) {
            $changes_count++;
        }
    }

    // echo $changes_count . '<br>';


    return $changes_count;
    */
}

// Test Case
// $result = marsExploration('SOSSPSSQSSOR');
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 22) Subarray Division 2    // https://www.hackerrank.com/challenges/three-month-preparation-kit-the-birthday-bar/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-three
// Time Complexity: \mathcal{O}(n \cdot m)
function birthday_2($s, $d, $m) { // Note: I changed the original function name from 'birthday()' to 'birthday2' because there is already a function with that same name in this file
    // Note: Check Subarray Division 1 problem!
    // The key word here is "contiguous segment". That's why we can compare each element to its contiguous elements
    $s_length = count($s);
    // $s_second_to_last_index = $s_length - 2; // General Rule: array key/index = array length/size - 1
    $count = 0;

    // for ($i = 0; $i < $s_second_to_last_index; $i++) { // loop through each chocolate segment
    for ($i = 0; $i < $s_length; $i++) { // loop through each chocolate segment
        // echo $i . '<br>';

        /*
        for ($j = $i; $j < $i + $m; $j++) { // loop throug contiguous chocolate segements
            if ($j == $s_length) { // if $j == $s_length, this means we arrived at the last array index, and we don't (can't) compare the last element to NOTHING!    // to prevent "array index out of bounds" error! resulting from the case where    ($i + $m ) > ($S array's last index)
                break;
            }

            $sum += $s[$j];
        }
        */

        // if ($i + $m <= $s_length) { // $j = $i + $m    // this is the same as:    if ($i + $m - 1 < $s_length) { // $i + $m - 1    is the last array index (N.B. General Rule: array key/index = array length/size - 1)
        if ($i + $m - 1 < $s_length) { // $j = $i + $m    // $i + $m - 1    is the last array index    // this is the same as:    if ($i + $m - 1 < $s_length) { // $i + $m - 1    is the last array index (N.B. General Rule: array key/index = array length/size - 1)
            $sum = 0;

            // for ($j = $i; $j < $i + $m; $j++) { // loop throug the contiguous chocolate segements $m
            for ($j = $i; $j <= $i + $m - 1; $j++) { // loop throug the contiguous chocolate segements $m    // $i + $m - 1    is the last array index
                $sum += $s[$j];
            }

            if ($sum == $d) {
                $count++;
            }
        }

        /*
        if ($sum == $d) {
            $count++;
        }
        */
    }


    return $count;
}

// Test Case
// $result = birthday_2([1, 2, 1, 3, 2], 3, 2);
// $result = birthday_2([4], 4, 1);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 23) Migratory Birds    // https://www.hackerrank.com/challenges/three-month-preparation-kit-migratory-birds/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-three
// Time Complexity: O(n)
function migratoryBirds($arr) {
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-migratory-birds/editorial

    // Get the frequency array of $arr array
    /*
    // Note: Using array_count_values() function here doesn't work in this particular problem because we need the frequency array to always be sorted ascendingly (or another way to go, we can sort this frequency array ascendingly using sort() function)
    $arr_frequency_array = array_count_values($arr);
    sort($arr_frequency_array); // sort the frequency array ascendingly (This is a must if we're using array_count_values() function!)
    */

    $arr_frequency_array = array_fill(1, 5, 0); // As the Problem Constraints says: It is guaranteed that each type is 1, 2, 3, 4, or 5.
    // echo '<pre>', var_dump($arr_frequency_array), '</pre>';

    $arr_length = count($arr);

    // Fill in the frequency array
    for ($i = 0; $i < $arr_length; $i++) { // loop through the original array $arr, and change the values of the frequency array depending on the matching/corresponding keys/indexes between the two arrays
        // echo $i . '<br>';
        // echo $arr[$i] . '<br>';
        $arr_frequency_array[$arr[$i]]++;

        /*
        // Or more detailed:
        $index = $arr[$i];
        $arr_frequency_array[$index]++;
        */
    }

    // echo '<pre>', var_dump($arr_frequency_array), '</pre>';


    $most_common_frequency_bird_index = 1; // 1 because we're starting with the smallest array key/index in the frequency array
    $arr_frequency_array_length = count($arr_frequency_array);

    for ($i = 1; $i <= $arr_frequency_array_length; $i++) { // starting from $i = 1
        // echo $i . '<br>';

        if ($arr_frequency_array[$i] > $arr_frequency_array[$most_common_frequency_bird_index]) {
            $most_common_frequency_bird_index = $i;
        }
    }

    /*
    // Or this is the same using foreach loop
    foreach ($arr_frequency_array as $key => $value) { // loop through the frequency array
        // echo $key . '<br>';

        if ($arr_frequency_array[$key] > $arr_frequency_array[$most_common_frequency_bird_index]) {
            $most_common_frequency_bird_index = $key;
        }
    }
    */


    return $most_common_frequency_bird_index;
}

// Test Case
// $result = migratoryBirds([1, 4, 4, 4, 5, 3]);
// $result = migratoryBirds([1, 4, 4, 4, 5, 3, 1, 2, 4, 3, 1, 2, 4, 3, 5, 1, 4, 3]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 24) Maximum Perimeter Triangle    // https://www.hackerrank.com/challenges/three-month-preparation-kit-maximum-perimeter-triangle/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-three
// Time Complexity: O(n log n)
function maximumPerimeterTriangle($sticks) {
    // https://www.geeksforgeeks.org/possible-form-triangle-array-values/
    // https://www.geeksforgeeks.org/maximum-perimeter-triangle-from-array/
    // https://www.youtube.com/watch?v=D6zSrGfZybU
    // General Rule: The sum of the length of any two sides of a triangle is greater than the length of the third side i.e. a + b > c, b + c > a and c + a > b
    // Degenerate triangle: In cases like a + b <= c, b + c <= a or c + a <= b

    rsort($sticks); // Sort $stick array descendingly
    // echo '<pre>', var_dump($sticks), '</pre>';


    $sticks_length = count($sticks);
    $third_to_last_index = $sticks_length - 2; // check till the third-to-last index (because we're checking 2 sticks after the current stick)
    // $longest_stick = $sticks[0]; // since the array is descendingly sorted

    for ($i = 0; $i < $third_to_last_index; $i++) { // check till the third-to-last index (because we're checking 2 sticks after the current stick)
        if ($sticks[$i] < $sticks[$i + 1] + $sticks[$i + 2]) { // A valid non-degenerate triangle
            // echo $sticks[$i] . ' ' . $sticks[$i + 1] . ' ' . $sticks[$i + 2] . '<br>';
            return [$sticks[$i + 2], $sticks[$i + 1], $sticks[$i]]; // Return an array of lengths in non-decreasing (ascending) order (as requested by the problem)
        }
    }


    // If there is nothing return-ed in the previous lines of codes, this means no non-degenerate triangle exists, then return [-1]
    return [-1];
}

// Test Case
// $result = maximumPerimeterTriangle([1, 1, 1, 2, 3, 5]);
// $result = maximumPerimeterTriangle([1, 1, 1, 3, 3]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 25) Zig Zag Sequence    // https://www.hackerrank.com/challenges/three-month-preparation-kit-zig-zag-sequence/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-three
function findZigZagSequence($a, $n) {
    // https://en.wiktionary.org/wiki/lexicographic#:~:text=The%20phrase%20lexicographic%20order%20means,symbol%201%20comes%20before%202.
    // https://stackoverflow.com/questions/45950646/what-is-lexicographical-order
    // https://www.google.com/search?q=how+to+swap+two+array+elements+in+PHP&sxsrf=ALiCzsbZKr0LkD6RDD5NgliyECyfxEw6RA%3A1670548919489&ei=t42SY-G2Hcfga4f9uagD&ved=0ahUKEwih7rPXr-v7AhVH8BoKHYd-DjUQ4dUDCBA&oq=how+to+swap+two+array+elements+in+PHP&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQDDIFCAAQogQyBQgAEKIEMgUIABCiBDoKCAAQRxDWBBCwA0oECEEYAEoECEYYAFC6E1i6E2DrJ2gCcAF4AIABmwGIAZsBkgEDMC4xmAEAoAEByAEIwAEB&sclient=gws-wiz-serp
    // https://www.google.com/search?q=how+to+swap+two+variables+in+PHP&sxsrf=ALiCzsbLDCkPjnP878zFOws3ATTc8eNj0g%3A1670556469519&ei=NauSY_ygH5H4a4HGhaAG&ved=0ahUKEwi8j8Xny-v7AhUR_BoKHQFjAWQQ4dUDCBA&uact=5&oq=how+to+swap+two+variables+in+PHP&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQgAQyBggAEAgQHjIGCAAQCBAeMgUIABCGAzIFCAAQhgM6CggAEEcQ1gQQsAM6BggAEAcQHjoICAAQCBAHEB5KBAhBGABKBAhGGABQwwRY0wpggxloAXABeACAAasBiAG-BJIBAzAuNJgBAKABAcgBCMABAQ&sclient=gws-wiz-serp

    sort($a); // sort $a array ascendingly
    // [1, 2, 3, 4, 5, 6, 7, 8, 9]    The ascendingly sorted array
    // echo '<pre>', var_dump($a), '</pre>';

    $a_length = count($a);
    $a_mid_index  = (($a_length + 1) / 2) - 1; // $a length is always ODD from the problem Constraints    // mid array index/key    // General Rule: array key/index = array length/size - 1
    $a_last_index = $a_length - 1;

    // Swap the middle number with the last (greatest) number (using multiple ways):

    // 1) Swap two array elements using Symmetric array destructuring with list() construct: https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring
    // list($a[$a_mid_index], $a[$a_last_index]) = [$a[$a_last_index], $a[$a_mid_index]];
    // echo '<pre>', var_dump($a), '</pre>';

    // 2) Swap two array elements using Symmetric array destructuring with the [] syntax:    // https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring
    [$a[$a_mid_index], $a[$a_last_index]] = [$a[$a_last_index], $a[$a_mid_index]];
    // [1, 2, 3, 4, 9, 6, 7, 8, 5]    The ascendingly sorted array after swapping the middle index with the last index (We need to rearrange (swap) and sort the numbers between the Middle Index and the Last Index descendingly (i.e. 6, 7 and 8 in this Test Case))
    // echo '<pre>', var_dump($a), '</pre>';



    // 3) Swap two array elements using a temporary third variable:    // https://www.w3resource.com/php-exercises/php-basic-exercise-31.php
    // $temporary_variable = &$a[$a_mid_index]; // Assigning By Reference
    // $temporary_variable = $a[$a_mid_index]; // Assigning the array middle index (    $a[$a_mid_index]    ) By Value to a $temporary_variable
    // echo $temporary_variable . '<br>';

    // $a[$a_mid_index] = $a[$a_last_index]; // the array middle index (    $a[$a_mid_index]    ) has become equal to the last index (    $a[$a_last_index]    ), but the $temporary_variable still has (retains) the old value of the middle index (because variables (    $a[$a_mid_index]    ) are assigned By Value (NOT By Reference))
    // echo $temporary_variable . '<br>';
    // echo $a[$a_mid_index]    . '<br>';

    // $a[$a_last_index] = $temporary_variable; // the array last index has become equal to the $temporary_variable which holds the (old) middle index value
    // echo $temporary_variable . '<br>';
    // echo $a[$a_mid_index]    . '<br>';
    // echo $a[$a_last_index]   . '<br>';

    // echo '<pre>', var_dump($a), '</pre>';



    $st = $a_mid_index + 1; // Move (swap) the numbers right after  the middle index towards the numbers before the last   index
    $ed = $a_length - 2;    // Move (swap) the numbers right before the last   index towards the numbers after  the middle index
    // echo $st . '<br>';
    // echo $ed . '<br>';

    // Using a while loop, (Move (swap) the numbers right after the middle index towards the numbers before the last index) AND (Move (swap) the numbers right before the last index towards the numbers after the middle index)
    // [1, 2, 3, 4, 5, 6, 7, 8, 9]    The ascendingly sorted array
    // [1, 2, 3, 4, 9, 6, 7, 8, 5]    The ascendingly sorted array after swapping the middle index with the last index (We need to rearrange (swap) and sort the numbers between the Middle Index and the Last Index descendingly (i.e. 6, 7 and 8 in this Test Case))
    // [1, 2, 3, 4, 9, 8, 7, 6, 5]    This shoud be the result
    while ($st <= $ed) { // Important! To avoid confusion!!: $st and $ed are the array indexes/keys, NOT the array values!
        [$a[$st], $a[$ed]] = [$a[$ed], $a[$st]];
        // echo $a[$st] . '<br>';
        // echo $a[$ed] . '<br>';

        $st++; // Move (swap) the numbers right after  the middle index towards the numbers before the last   index
        $ed--; // Move (swap) the numbers right before the last   index towards the numbers after  the middle index

        // echo $st     . '<br>'; // the array index/key
        // echo $a[$st] . '<br>'; // the array value

        // echo $ed     . '<br>'; // the array index/key
        // echo $a[$ed] . '<br>'; // the array value
    }


    return $a;
}

// Test Case
// $result = findZigZagSequence([2, 3, 5, 1, 4, 6, 7], 7);
// $result = findZigZagSequence([2, 3, 5, 1, 4, 6, 7, 9, 8], 9);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 26) Drawing Book    // https://www.hackerrank.com/challenges/three-month-preparation-kit-drawing-book/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-three
function pageCount($n, $p) {
    // Pseudocode: The solution is the min() function result of two ways (i.e. the smallest number): starting flipping pages from the beginning of the book, or starting from the end of it
    $number_of_flipped_pages_from_beginning = floor($p / 2);
    $n = $n % 2 == 0 ? ++$n : $n; // Important Note: You must use here the PRE-increment operator ++$n (post-increment operator $n++ doesn't work here!)    // if the total number of pages is even, add 1, if it's odd, leave it as is    // https://www.geeksforgeeks.org/pre-increment-and-post-increment-in-c/
    // The following if statement is equivalent to the last Ternary Operator
    /*
    if ($n % 2 == 0) {
        $n++;
    }
    */
    // echo $n . '<br>';
    $number_of_flipped_pages_from_end = floor(($n - $p) / 2);
    // echo $number_of_flipped_pages_from_end . '<br>';

    return min($number_of_flipped_pages_from_beginning, $number_of_flipped_pages_from_end);
}

// Test Case
// $result = pageCount(6, 2);
// $result = pageCount(6, 5);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 27) // Between Two Sets (Mock Test)    // https://www.hackerrank.com/challenges/between-two-sets/problem?isFullScreen=true    // https://www.hackerrank.com/test/3g7so2i3ha1/questions/38ja2jois2r
// Time Complexity: O(√C)
// Time Complexity: O(n log n)    // Space Complexity: O(log n)
function getTotalX($a, $b) {
    // Example: 3 * 5 = 15 (3 and 5 are factors of 15, and 15 is a multiple of 3 and 5)
    // https://studyalgorithms.com/array/hackerrank-between-two-sets/    // https://www.youtube.com/watch?v=-c_V4fQ2mKU
    // https://www.hackerrank.com/challenges/between-two-sets/editorial

    // Pseudocode: We need to determine the LCM (Least Common Multiple) and the GCD (Greatest Common Divisor) (to narrow down the possibilities)

    function getGCD(int $a, int $b) { // GCD (Greatest Common Divisor)
        while ($a > 0 && $b > 0) {

            if ($a >= $b) {
                $a = $a % $b;
            } else {
                $b = $b % $a;
            }

        }


        return $a + $b;
    }

    // echo getGCD(16, 32) . '<br>'; // 16


    function getLCM(int $a, int $b) { // LCM (Least Common Multiple)
        $GCD = getGCD($a, $b);
        // echo $GCD . '<br>'; // 2


        return ($a / $GCD) * $b;
    }

    // echo getLCM(2, 4) . '<br>'; // 4



    // Get the GCD of the $b array:
    // echo getGCD(0, 16) . '<br>';
    $multiple = 0; // $multiple is the GCD of $b array
    foreach ($b as $number) {
        $multiple = getGCD($multiple, $number);
    }
    // echo $multiple . '<br>'; // 16


    // Get the LCM of the $a array:
    $factor = 1; // $factor is the LCM of $a array
    foreach ($a as $number) {
        $factor = getLCM($factor, $number);


        if ($factor > $multiple) { // if the LCM > GCD
            return 0;
        }
    }


    if ($multiple % $factor != 0) { // if GCD % LCM is not equal to 0
        return 0;
    }

    // $value = $multiple / $factor;
    // $max = max($factor, $value);



    // Count how many times LCM can divide the GCD
    $totalX = 1;
    for ($i = $factor; $i < $multiple; $i++) { // $i is LCM,    $i < GCD
        if ($multiple % $i == 0 && $i % $factor == 0) { // if GCD % LCM is equal to 0, and $i % LCM is equal to 0
            $totalX++;
        }
    }


    return $totalX;
}

// Test Case
// $total = getTotalX([2, 6], [24, 36]);
// $total = getTotalX([2, 4], [16, 32, 96]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 28) Picking Numbers    // https://www.hackerrank.com/challenges/three-month-preparation-kit-picking-numbers/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
// Time Complexity: O(n)    // Space Complexity: O(N)
function pickingNumbers($a) {
    /*
    // Wrong/Incorrect approach:
    $a_length = count($a);
    $current_longest_array_length = 0;

    for ($i = 0; $i < $a_length; $i++) {
        for ($j = $i + 1; $j < $a_length; $j++) { // starting from the second index (check the NEXT index)

            if (abs($a[$j] - $a[$i]) > 1) {
                break; // Get out of the inner loop
            }

            if (($j - $i) + 1 > $current_longest_array_length) { // General Rule: array key/index = array length/size - 1
                $current_longest_array_length = ($j - $i) + 1; // General Rule: array key/index = array length/size - 1
            }
        }
    }

    // echo $current_longest_array_length . '<br>';


    return $current_longest_array_length;
    */



    // First Solution/Approach: Using array_count_values() function (relatively more difficult):
    // sort($a); // [1, 3, 3, 4, 5, 6]
    // echo '<pre>', var_dump($a), '</pre>';

    $a_frequency_array = array_count_values($a);
    // echo '<pre>', var_dump($a_frequency_array), '</pre>';

    ksort($a_frequency_array); // sort by Keys (not values (sort() function sorts by values!))
    // echo '<pre>', var_dump($a_frequency_array), '</pre>';
    /*
        [
            1 => 1,
            3 => 2,
            4 => 1,
            5 => 1,
            6 => 1,
        ]
    */


    $a_frequency_array_keys = array_keys($a_frequency_array); // Because the array keys are random (have random numbers)
    // echo '<pre>', var_dump($a_frequency_array_keys), '</pre>';

    $a_frequency_array_keys_length = count($a_frequency_array_keys);
    // echo $a_frequency_array_keys_length . '<br>';
    $a_frequency_array_keys_last_index = count($a_frequency_array_keys) - 1;
    // echo $a_frequency_array_keys_last_index . '<br>';



    if ($a_frequency_array_keys_length == 1) { // i.e.    $a = [66, 66, 66, 66, 66, 66]
        return count($a);
    }



    $max_frequency_sum = 0;
    for ($i = 0; $i < $a_frequency_array_keys_last_index; $i++) { // loop through till the second-to-last index
        // echo $a_frequency_array_keys[$i + 1] . '<br>';

        if (abs($a_frequency_array_keys[$i + 1] - $a_frequency_array_keys[$i]) <= 1) {
            // echo 'Yes<br>';

            // echo $a_frequency_array_keys[$i + 1] . '<br>';
            // echo $a_frequency_array_keys[$i]     . '<br>';

            // echo $a_frequency_array[$a_frequency_array_keys[$i + 1]] . '<br>';
            // echo $a_frequency_array[$a_frequency_array_keys[$i]]     . '<br>';

            // echo max($max_frequency_sum, $a_frequency_array[$a_frequency_array_keys[$i + 1]] + $a_frequency_array[$a_frequency_array_keys[$i]], max($a_frequency_array)) . '<br>';
            $max_frequency_sum = max($max_frequency_sum, $a_frequency_array[$a_frequency_array_keys[$i + 1]] + $a_frequency_array[$a_frequency_array_keys[$i]], max($a_frequency_array));
        }
    }

    // echo $max_frequency_sum;


    return $max_frequency_sum;




    // Second Solution/Approach: Using array_fill() function (relatively easier solution):
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-picking-numbers/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
    // https://www.youtube.com/watch?v=PtFAJTCKNn8
    // https://stackoverflow.com/questions/7454904/next-key-in-array

    /*
    $a_frequency_array = array_fill(1, 99, 0); // Depending on the Problem Constraints: 0 < a[i] < 100
    // echo '<pre>', var_dump($a_frequency_array), '</pre>';

    // Fill in the frequency array
    $a_length = count($a);
    for ($i = 0; $i < $a_length; $i++) {
        $a_frequency_array[$a[$i]]++;
    }

    // echo '<pre>', var_dump($a_frequency_array), '</pre>';



    $max_frequency_sum = 0;
    $a_frequency_array_length = count($a_frequency_array);

    for ($i = 1; $i < $a_frequency_array_length; $i++) {
        // echo max($max_frequency_sum, $a_frequency_array[$i] + $a_frequency_array[$i + 1]) . " $i<br>";
        $max_frequency_sum = max($max_frequency_sum, $a_frequency_array[$i] + $a_frequency_array[$i + 1]);
        // $max_frequency_sum = max($max_frequency_sum, $a_frequency_array[$i] + $a_frequency_array[$i + 2]);
        // $max_frequency_sum = max($max_frequency_sum, $a_frequency_array[$i] + $a_frequency_array[$i + 3]);
    }

    // echo $max_frequency_sum . '<br>';


    return $max_frequency_sum;
    */



    // Another remarkable solution to the problem: https://programmercave0.github.io/blog/2020/03/28/Picking-Numbers-HackerRank-Challenge-Cpp-Implementation
}

// Test Case
// $result = pickingNumbers([1, 1, 2, 2, 4, 4, 5, 5, 5]);
// $result = pickingNumbers([4, 6, 5, 3, 3, 1]);
// $result = pickingNumbers([66, 66, 66, 66, 66, 66]);
// $result = pickingNumbers([4, 97, 5, 97, 97, 4, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 96]);
// $result = pickingNumbers([1, 2, 2, 3, 1, 2]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 29) Left Rotation    // https://www.hackerrank.com/challenges/three-month-preparation-kit-array-left-rotation/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
// Time Complexity:
function rotateLeft($d, $arr) {
    // Pseudocode:
    /*
        If $d = 2, we want to convert
                            [1, 2, 3, 4, 5]
        to
                            [2, 3, 4, 5, 1]
        then to
                            [3, 4, 5, 1, 2]
        So, basically what we're doing is, we shift the first element off the beginning of the array (remove the first element of the array), and push (add) it to the end of the array. And we do that $d number of times
    */

    /*
    for ($i = 1; $i <= $d; $i++) {
        $shifted_element = array_shift($arr); // the element that is removed off the beginning of the array
        $arr[] = $shifted_element; // Add the shifted element to the end of the array    // this is EQIVALENT to    array_push($arr, $shifted_element);
        // Note: For the sake of better performance, it's better to use $arr[] over array_push() function, because, this way, there's no overhead of calling a function: https://www.php.net/manual/en/function.array-push.php#:~:text=Note%3A%20If%20you%20use%20array_push()%20to%20add%20one%20element%20to%20the%20array%2C%20it%27s%20better%20to%20use%20%24array%5B%5D%20%3D%20because%20in%20that%20way%20there%20is%20no%20overhead%20of%20calling%20a%20function.
        // array_push($arr, $shifted_element);
    }

    // echo '<pre>', var_dump($shifted_element), '</pre>';
    // echo '<pre>', var_dump($arr), '</pre>';


    return $arr;
    */


    // HackerRank Solution (more difficult solution):    // https://www.hackerrank.com/challenges/three-month-preparation-kit-array-left-rotation/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
    $arr_length = count($arr);

    $temporary_arr = array_slice($arr, 0, $d);
    // echo '<pre>', var_dump($temporary_arr), '</pre>';


    for($i = $d; $i < $arr_length; $i++) {
        $arr[$i - $d] = $arr[$i];
    }

    // echo '<pre>', var_dump($arr), '</pre>';

    for($i = $arr_length - $d; $i < $arr_length; $i++) {
        $arr[$i] = $temporary_arr[$i + $d - $arr_length];
    }


    return $arr;
}

// Test Case
// $result = rotateLeft(2, [1, 2, 3, 4, 5]);
// $result = rotateLeft(4, [1, 2, 3, 4, 5]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 30) Number Line Jumps    // https://www.hackerrank.com/challenges/three-month-preparation-kit-kangaroo/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
// Time Complexity: O(1)    // Space Complexity: O(1)
function kangaroo($x1, $v1, $x2, $v2) {
    // First Solution/Approach (optimized/good performance):
    // Optimized approach: x = tv. t can be substituted with j (no. of jumps), hence, x = jv. We need to ckeck if x1 + jv == x2 + jv. This can be reduced to j = x2 - x1 / v1 - v2, where j must be a whole numer (integer), it can't be a fraction (float)
    // Bad Performance approach (using a loop): x = tv. t can be substituted with j (no. of jumps), hence, x = jv, and from the problem, j = 1. Using a loop and for a 10000 times (from the problem Constraints), we need to check if x1 == x2 in x1 + jv = x1 (the new x1), and x2 + jv = x2 (the new x2)
    // https://www.youtube.com/watch?v=52R2pLDjUBw
    // https://www.youtube.com/watch?v=htNoxROxYrk
    // Observation: Basic Math: velocity/speed (v) = distance (x) / time (t), then vt = x.  By applying the rule on our problem, and it's a given in the problem that we have to get the two kangaroos in the same position at the SAME TIME (time is constant) which means the same no. of jumps (which is 1), then we need to check if x1 + tv1 == x2 + tv2 (this can be reduced to x2 - x1 = tv1 - tv2, then t = x2 - x1 / v1 - v2). So, t (time) (which can be considered as the no. of jumps (j)) MUST be an integer (not float (fraction)) in order for the two kangaroos to arrive at the same spot at the same time.
    // x1 + tv1 = x2 + tv2 . We can consider t (time) as the number of jumps (j) which is 1 jump in this problem, hence, x1 + 1 * v1 = x2 + 1 * v2, hence, x1 + v1 = x2 + v2
    // Note: It's given the Problem Constraints that it's always that x1 < x2, this means it's a must that v1 > v2, or else, they won't ever meet.

    /*
    if ($v1 > $v2 && ($x2 - $x1) % ($v1 - $v2) == 0) {
        return 'YES';
    } else {
        return 'NO';
    }
    */

    return $v1 > $v2 && ($x2 - $x1) % ($v1 - $v2) == 0 ? 'YES' : 'NO';



    /*
    // Second Solution/Approach using 'Brute Force' (Bad Performance):
    if ($v1 > $v2) { // it's a MUST
        for ($i = 0; $i <= 10000; $i++) { // Check the Problem Constraints
            $x1 = $x1 + 1 * $v1; // 1 is the number of jumps (as x = t * v, and $x1 = $x1 + t (or j) * v1)
            $x2 = $x2 + 1 * $v2; // 1 is the number of jumps (as x = t * v, and $x2 = $x2 + t (or j) * v2)

            if ($x1 == $x2) {
                return 'YES';
            }
        }
    }

    return 'NO';
    */
}

// Test Case
// $result = kangaroo(2, 1, 1, 2);
// $result = kangaroo(0, 3, 4, 2);
// $result = kangaroo(0, 2, 5, 3);
// $result = kangaroo(43, 2, 70, 2);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 31) Separate the Numbers    // https://www.hackerrank.com/challenges/three-month-preparation-kit-separate-the-numbers/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
function separateNumbers($s) {
    // Solution using 'Brute Force': https://www.hackerrank.com/challenges/three-month-preparation-kit-separate-the-numbers/editorial
    // https://www.youtube.com/watch?v=q9d7MZpuWSE

    // Testing:
    /*
    $s_subString = substr($s, 0, 1);
    echo $s_subString . '<br>';
    echo ++$s_subString . '<br>'; // Pre-increment Operator
    echo ++$s_subString . '<br>'; // Pre-increment Operator
    */

    // $s_number = (int) $s; // Convert $s from string to number data type using Type Casting: https://www.php.net/manual/en/language.types.type-juggling.php#language.types.typecasting
    // echo '<pre>', var_dump($s_number), '</pre>';

    if ($s[0] == 0 || strlen($s) == 1) { // From the problem requirement, there must be no leading zeros, and in cases where $s length is 1, we can't apply the required rule a[i] - a[i - 1] = 1
        echo 'NO' . "\n";
        return; // Get out of the WHOLE function
    }



    $s_length      = strlen($s);
    $half_s_length = strlen($s) / 2;
    // $isBeautifulString = false;

    for ($i = 1; $i <= $half_s_length; $i++) { // check till the half $s length ONLY, because our generated string length can't exceed the $s string length
        $s_subString = substr($s, 0, $i);
        $s_subString_copy = $s_subString; // Or the same using Type Casting:    $s_subString_copy = (int) $s_subString;    // Very Important Note: It's a requirement in the problem that we print out the original $s_subString (Ex: 'YES 4'), that means we can't alter/change (increment) the original $s_subString value in the while loop below, so the solution is to take a copy of the $s_subString by storing it in another variable ($s_subString_copy)
        $generated_test_string = $s_subString;


        while (strlen($generated_test_string) < $s_length) { // We make sure that our testing generated string length doesn't exceed the original $s string length
            // echo $s_subString . '<br>';
            // echo ++$s_subString . '<br>';
            // echo $s_subString_copy . '<br>';
            // echo ++$s_subString_copy . '<br>';

            // $generated_test_string .= ++$s_subString; // Very Important Note: This would give a WRONG result when printing out the echo statement below, as the original $s_subString value would have been changed (incremented), so, the solution is to use another variable as copy ($s_subString_copy) (and change (increment) it) for the original $s_subString. Check the next line of code
            $generated_test_string .= ++$s_subString_copy; // Very Important Note: It's a requirement in the problem that we print out the original $s_subString (Ex: 'YES 4'), that means we can't alter/change (increment) the original $s_subString value in the while loop below ($generated_test_string .= ++$s_subString; // WRONG!), so the solution is to take a copy of the $s_subString by storing it in another variable ($s_subString_copy)

            // echo $generated_test_string . '<br>';
        }


        if ($generated_test_string == $s) {
            // $isBeautifulString = true;
            echo 'YES ' . $s_subString . "\n";
            return; // Get out of the WHOLE function

            // break; // get out of the loop for better performance
        }
    }


    echo 'NO' . "\n";
}

// Test Case
// separateNumbers('10203');
// separateNumbers('1234');
// separateNumbers('91011');
// separateNumbers('99100');
// separateNumbers('101103');
// separateNumbers('010203');
// separateNumbers('13');
// separateNumbers('1');
// separateNumbers('99910001001');
// separateNumbers('99910001001');
// separateNumbers('7891011');
// separateNumbers('9899100');
// separateNumbers('999100010001');

/*********************************************************************************************************************************************/

// 32) Closest Numbers    // https://www.hackerrank.com/challenges/three-month-preparation-kit-closest-numbers/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
// Time Complexity: O(n log n)    // Memory Space Complexity: O(n)
function closestNumbers($arr) {
    /*
    // First Solution/Approach: This is a Naive solution using TWO loops with a Time Complexity of O(n^2)
    sort($arr); // sort $arr array ascendingly
    // echo '<pre>', var_dump($arr), '</pre>';

    $arr_length = count($arr);
    $current_minimum_difference = PHP_INT_MAX; // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible in PHP in 64-bit system (the Worst-Case Scenario)    // https://www.php.net/manual/en/reserved.constants.php#:~:text=for%20this%20platform.-,PHP_INT_MAX%20(int),-The%20largest%20integer
    // echo $current_minimum_difference . '<br>';
    $answer_arr = [];


    for ($i = 1; $i < $arr_length; $i++) { // We start looping from the second element
        $two_adjacent_elements_difference = abs($arr[$i] - $arr[$i - 1]);

        if ($two_adjacent_elements_difference < $current_minimum_difference) {
            $current_minimum_difference = $two_adjacent_elements_difference;
        }
    }

    // echo $current_minimum_difference . '<br>';
    // echo '<pre>', var_dump($answer_arr), '</pre>';


    for ($i = 1; $i < $arr_length; $i++) {
        $two_adjacent_elements_difference = abs($arr[$i] - $arr[$i - 1]);
        if ($two_adjacent_elements_difference <= $current_minimum_difference) {
            // $answer_arr[] = $arr[$i - 1]; // Note: Appending to an array using the Square Brackets (is more efficient because it doesn't have the overhead of calling a function (like array_push() for example)) doesn't work here, because it can't add more than one element at a time, so we need to use array_push() function instead    // https://flexiple.com/php/php-add-to-array/#:~:text=Add%20to%20array%20using%20square%20brackets%3A
            array_push($answer_arr, $arr[$i - 1], $arr[$i]); // append elements to the end of the $arr array
        }
    }


    return $answer_arr;
    */



    // Second Solution/Approach: This solution has a better performance with only ONE loop and Time Complexity of O(n log n)
    sort($arr); // sort $arr array ascendingly
    // echo '<pre>', var_dump($arr), '</pre>';

    $arr_length = count($arr);
    $current_minimum_difference = PHP_INT_MAX; // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible in PHP in 64-bit system (the Worst-Case Scenario)    // https://www.php.net/manual/en/reserved.constants.php#:~:text=for%20this%20platform.-,PHP_INT_MAX%20(int),-The%20largest%20integer
    // echo $current_minimum_difference . '<br>';
    $answer_arr = [];


    for ($i = 1; $i < $arr_length; $i++) { // We start looping from the second element
        $two_adjacent_elements_difference = abs($arr[$i] - $arr[$i - 1]);
        /*
        if ($two_adjacent_elements_difference < $current_minimum_difference) {
            $current_minimum_difference = $two_adjacent_elements_difference;

            $answer_arr = [
                $arr[$i - 1], $arr[$i]
            ];
            
        } elseif ($two_adjacent_elements_difference == $current_minimum_difference) {
            // $answer_arr[] = $arr[$i - 1]; // Note: Appending to an array using the Square Brackets (is more efficient because it doesn't have the overhead of calling a function (like array_push() for example)) doesn't work here, because it can't add more than one element at a time, so we need to use array_push() function instead    // https://flexiple.com/php/php-add-to-array/#:~:text=Add%20to%20array%20using%20square%20brackets%3A
            array_push($answer_arr, $arr[$i - 1], $arr[$i]); // Append the numbers pair to the already existing array
        }
        */

        // Another way to go:
        if ($two_adjacent_elements_difference <= $current_minimum_difference) {

            // if the difference is less than the current difference, we empty the $answer_arr array
            if ($two_adjacent_elements_difference < $current_minimum_difference) {
                $current_minimum_difference = $two_adjacent_elements_difference;

                $answer_arr = []; // We empty the $answer_arr
            }


            // $answer_arr[] = $arr[$i - 1]; // Note: Appending to an array using the Square Brackets (is more efficient because it doesn't have the overhead of calling a function (like array_push() for example)) doesn't work here, because it can't add more than one element at a time, so we need to use array_push() function instead    // https://www.php.net/manual/en/function.array-push.php#:~:text=Note%3A%20If%20you%20use%20array_push()%20to%20add%20one%20element%20to%20the%20array%2C%20it%27s%20better%20to%20use%20%24array%5B%5D%20%3D%20because%20in%20that%20way%20there%20is%20no%20overhead%20of%20calling%20a%20function.    // https://flexiple.com/php/php-add-to-array/#:~:text=Add%20to%20array%20using%20square%20brackets%3A
            
            /*
                // We can do this to use the Square Brackets [] instead of array_push() function to append TWO elements to the array (for Faster Performance):    https://www.php.net/manual/en/function.array-push.php#:~:text=Note%3A%20If%20you%20use%20array_push()%20to%20add%20one%20element%20to%20the%20array%2C%20it%27s%20better%20to%20use%20%24array%5B%5D%20%3D%20because%20in%20that%20way%20there%20is%20no%20overhead%20of%20calling%20a%20function.
                $answer_arr[] = $arr[$i - 1];
                $answer_arr[] = $arr[$i];
            */
            array_push($answer_arr, $arr[$i - 1], $arr[$i]); // Append the numbers pair to the already existing array    // https://www.php.net/manual/en/function.array-push.php#:~:text=Note%3A%20If%20you%20use%20array_push()%20to%20add%20one%20element%20to%20the%20array%2C%20it%27s%20better%20to%20use%20%24array%5B%5D%20%3D%20because%20in%20that%20way%20there%20is%20no%20overhead%20of%20calling%20a%20function.
        }
    }

    // echo $current_minimum_difference . '<br>';
    // echo '<pre>', var_dump($answer_arr), '</pre>';


    return $answer_arr;
}

// Test Case
// $result = closestNumbers([5, 2, 3, 4, 1]);
// $result = closestNumbers([5, 4, 3, 2]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/
// 33) Tower Breakers
// Time Complexity: O(1)
function towerBreakers($n, $m) {
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-tower-breakers-1/editorial

    if ($m == 1 || $n % 2 == 0) { // if there's an EVEN number of towers, player 1 always loses and player 2 always wins    // if $m == 1, there's no divisor of 1 which is smaller than 1 (as requested by the problem: 1 <= y < x), and since Player 1 moves first, they'll alwyas lose, and Player 2 always wins
        return 2; // get out of the WHOLE function
    } else { // if there's an ODD number of towers, player 1 always wins and player 2 always loses
        return 1; // get out of the WHOLE function
    }

}

// Test Case
// $result = towerBreakers(2, 6);
// $result = towerBreakers(2, 2);
// $result = towerBreakers(1, 4);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 34) Minimum Absolute Difference in an Array    // https://www.hackerrank.com/challenges/three-month-preparation-kit-minimum-absolute-difference-in-an-array/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four

function minimumAbsoluteDifference($arr) {
    /*
    // First Solution/Approach: Bad Performance Naive solution using TWO loops
    $arr_length            = count($arr);
    $arr_length_last_index = count($arr) - 1;
    $current_minimum_absolute_difference = PHP_INT_MAX; // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible in PHP in 64-bit system (the Worst-Case Scenario)    // https://www.php.net/manual/en/reserved.constants.php#:~:text=for%20this%20platform.-,PHP_INT_MAX%20(int),-The%20largest%20integer

    for ($i = 0; $i < $arr_length_last_index; $i++) {
        // echo $i . '<br>';

        for ($j = $i + 1; $j < $arr_length; $j++) {
            // echo $j . '<br>';
            $absolute_difference = abs($arr[$j] - $arr[$i]);

            if ($absolute_difference < $current_minimum_absolute_difference) {
                $current_minimum_absolute_difference = $absolute_difference;
            }
        }

    }


    return $current_minimum_absolute_difference;
    */


    // Second Solution/Approach: Better Performance with ONE loop ONLY and WITHOUT the abs() function (using sort() function)
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-minimum-absolute-difference-in-an-array/editorial
    sort($arr); // sort $arr array ascendingly

    $arr_length = count($arr);

    // $current_minimum_absolute_difference = PHP_INT_MAX; // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible in PHP in 64-bit system (the Worst-Case Scenario)    // https://www.php.net/manual/en/reserved.constants.php#:~:text=for%20this%20platform.-,PHP_INT_MAX%20(int),-The%20largest%20integer
    // echo 10 ** 9    . '<br>'; // this is the same as:    echo pow(10, 9) . '<br>';
    // echo pow(10, 9) . '<br>'; // this is the same as:    echo 10 ** 9    . '<br>';
    $current_minimum_absolute_difference = 10 ** 9; // from the Problem Constraints    // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible depending on the Problem Constraints
    // $current_minimum_absolute_difference = $arr[$arr_length - 1] - $arr[0]; // from the Problem Constraints    // We suppose that the minimum difference between two adjacent numbers in the $arr array is the largest integer possible by finding the difference between the largest $arr element (the last one) and the smallest $arr element (the first one)



    for ($i = 1; $i < $arr_length; $i++) {
        // Note: We can alleviate the need to take the absolute value of the difference between $arr[$i] and $arr[$i - 1] by calculating the difference as a[i+1] - a[i] (the original problem $arr array); this is because sorting ensures that a[i] is always <= a[i+1], so the result of this calculation will always be positive.
        // $absolute_difference = abs($arr[$i] - $arr[$i - 1]); // WITH abs()
        $absolute_difference = $arr[$i] - $arr[$i - 1]; // WITHOUT abs()
    /*
    // Another way to go:
    for ($i = 0; $i < $arr_length - 1; $i++) {
        $absolute_difference = abs($arr[$i] - $arr[$i + 1]);
    */
        if ($absolute_difference < $current_minimum_absolute_difference) {
            $current_minimum_absolute_difference = $absolute_difference;
        }
    }


    return $current_minimum_absolute_difference;
}

// Test Case
// $result = minimumAbsoluteDifference([-2, 2, 4]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 35) Caesar Cipher    // https://www.hackerrank.com/challenges/three-month-preparation-kit-caesar-cipher-1/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-four
// Time Complexity: O(N)
function caesarCipher($s, $k) {  // Check the similar 'Pangrams' HackerRank problem!
    /*
    // This solution by manipulating letters is very difficult, tedious and problematic because of the Letter Case (uppercase or lowercase) and special characters (like hyphen -, underscore _, ...etc)! Better use ASCII values and ord() and chr() functions!
    $english_alphabet = 'abcdefghijklmnopqrstuvwxyz'; // 26 letters
    echo $english_alphabet . '<br>';

    $english_alphabet_length = strlen($english_alphabet);

    // $caesar_cipher = '';
    // for ($i = 0; $i < $english_alphabet_length; $i++) {
    //     // echo $english_alphabet[$i + $k] . '<br>';
    //     $rotate_by = $i + $k;

    //     if ($rotate_by > 25) { // 25th position is the last letter position as the English alphabet length is 26
    //         $rotate_by = $i + $k - 26; // We deduct -26 to start over from the beginning of the English alphabet
    //     }

    //     $caesar_cipher .= $english_alphabet[$rotate_by];
    // }

    // echo $caesar_cipher . '<br>';
    echo $s . '<br>';


    $s_length = strlen($s);
    // $encrypted_string = '';
    // echo strpos($caesar_cipher, $s[0]) . '<br>';

    // $s_letter_index_in_english_alphabet = strpos($english_alphabet, $s[0]);
    $s_letter_index_in_english_alphabet = strpos($english_alphabet, 'O'); // Capital letters result in 'false'. This is very problematic!
    // echo '<pre>', var_dump($s_letter_index_in_english_alphabet), '</pre>';

    // $ceaser_cipher_s_letter_position_after_rotation = strpos($english_alphabet, $s[0]) + 3;
    // echo $ceaser_cipher_s_letter_position_after_rotation . '<br>';

    for ($i = 0; $i < $s_length; $i++) {
        // echo $s[$i] . '<br>';

        // $rotate_by = $k;

        // if ($rotate_by > 25) { // 25th position is the last letter position as the English alphabet length is 26
        //     $rotate_by = $k - 26; // We deduct -26 to start over from the beginning of the English alphabet
        // }

        $ceaser_cipher_s_letter_position_after_rotation = strpos($english_alphabet, $s[$i]) + $k;
        if ($ceaser_cipher_s_letter_position_after_rotation > 26) {
            $ceaser_cipher_s_letter_position_after_rotation = $ceaser_cipher_s_letter_position_after_rotation - 26;
        }
        // echo $ceaser_cipher_s_letter_position_after_rotation . '<br>';
        echo $english_alphabet[$ceaser_cipher_s_letter_position_after_rotation] . '<br>';

        // $s[$i] = $english_alphabet[$ceaser_cipher_s_letter_position_after_rotation];
        // exit;

        // $s[$i] = $english_alphabet[$ceaser_cipher_s_letter_position_after_rotation];
        // $encrypted_string .= $s[$i];
    }


    return $s;
    */


    // Solution/Approach using ASCII values and ord() and chr() functions (way easier)
    // The ASCII codes of the English alphabet 'uppercase' letters is a range from 65 to 90, and the 'lowercase' letters from 97 to 122
    // Note: The difference between the ASCII values of (subtraction of ) a small letter minus - the same capital letter is constant (32)
    // echo ord('A') . '<br>'; // convert letter to ASCII code
    // echo chr(65)  . '<br>'; // convert ASCII code to letter
    // echo chr(65 + $k) . '<br>'; // echo chr(65 + 3) . '<br>';

    // echo chr(65 +  27 % 26)      . '<br>'; // This gives letter 'B' although it should be letter 'A', so we need to deduct -1
    // echo chr(65 + (27 % 26) - 1) . '<br>'; // This gives letter 'B' although it should be letter 'A', so we need to deduct -1


    $s_length = strlen($s);
    // $k %= 26; // is the same as:    $k = $k % 26;    // Math Note: Modulo of x % y, where x < y, always equals x. Example: 2 % 3 = 2, because 3 * 0 = 0, then 2 - 0 = 2. Another example, 11 % 26 = 11, because 26 * 0 = 0, then 11 - 0 = 11
    $english_alphabet_k = $k % 26; // $k %= 26;    is the same as:    $k = $k % 26;    // Math Note: Modulo of x % y, where x < y, always equals x. Example: 2 % 3 = 2, because 3 * 0 = 0, then 2 - 0 = 2. Another example, 11 % 26 = 11, because 26 * 0 = 0, then 11 - 0 = 11
    // echo $k . '<br>';


    // echo ord('z') . '<br>';
    // echo ord('z') + 2 . '<br>';
    // echo ord('z') + 2 - 26 . '<br>';
    // echo chr(ord('z') + 2 - 26) . '<br>';

    // echo chr(90) . '<br>'; // letter 'Z'
    // echo chr(65 + ((90 - 65 + $k) % 26)) . '<br>';

    for ($i = 0; $i < $s_length; $i++) {
        $letter_ASCII_value = ord($s[$i]);
        /* $new_letter_position_on_ASCII = $letter_ASCII_value + $k; */ // if the $new_letter_position_on_ASCII doesn't exceed the range of the ASCII values of the 'uppercase' or 'lowercase' characters
        $new_letter_position_on_ASCII = $letter_ASCII_value + $english_alphabet_k; // if the $new_letter_position_on_ASCII doesn't exceed the range of the ASCII values of the 'uppercase' or 'lowercase' characters

        if ($letter_ASCII_value >= 65 && $letter_ASCII_value <= 90) { // Check if the letter is a 'capital' letter (meaning, if the letter ASCII value >= 65 and letter ASCII value <= 90)     // This is the same as:    if (ord($s[$i] >= ord('A') && ord($s[$i]) <= ord('Z')) {
            /*
            if ($new_letter_position_on_ASCII > 90) { // if the $new_letter_position_on_ASCII exceeds the ASCII range of the 'uppercase' characters
                $new_letter_position_on_ASCII_k = $new_letter_position_on_ASCII % 90;
                $new_letter_position_on_ASCII   = 65 - 1 + $new_letter_position_on_ASCII_k; // We must deduct -1 because of the General Rule: array key/index = array length/size - 1    // This is the same as:    $new_letter_position_on_ASCII = $new_letter_position_on_ASCII - 26;  // Reset the position
                // $new_letter_position_on_ASCII = $new_letter_position_on_ASCII - 26; // Reset the position    // Also Correct!
                // $new_letter_position_on_ASCII -= 26;                                // Reset the position    // Also Correct!
            }

            $s[$i] = chr($new_letter_position_on_ASCII); // Uncomment the $new_letter_position_on_ASCII variable above!
            */


            // Another way to go (WITHOUT the previous if statement):
            /*
                The current letter position on the English alphabet is equivalent to    letter's ASCII - 65 (for 'uppercase' letters).
                Example: For letter 'C',    67 - 65 = 2    , where 2 is the letter 'C' index position on the English Alphabet

                The current letter position on the English alphabet AFTER ROTATION BY $k TIMES is equivalent to    letter's index position on the English Alphabet + $k (for 'uppercase' letters).
                Example: For letter 'C', and if $k = 3,    2 + 3 = 5    , where 2 is the letter 'C' index position on the English Alphabet, 3 is $k, 5 is the new position of the letter after rotation by $k times

                And in case the new position exceeds the ASCII range of the 'uppercase' characters, we use a modulo operation
                Example:    5 % 26 = 5    (or another example,    31 % 26 = 5). You notice that both 5 and 31 have the same position (which is equal to 5)
            */
            
            $letter_position_on_english_alphabet       = $letter_ASCII_value - 65;
            $new_letter_position_on_english_alphabet_k = ($letter_position_on_english_alphabet + $english_alphabet_k) % 26;
            $new_letter_position_on_ASCII              = 65 + $new_letter_position_on_english_alphabet_k;

            $s[$i] = chr($new_letter_position_on_ASCII);
            

        } elseif ($letter_ASCII_value >= 97 && $letter_ASCII_value <= 122) { // Check if the letter is a 'small'   letter (meaning, if the letter ASCII value >= 97 and letter ASCII value <= 122)    // This is the same as:    if (ord($s[$i]) >= ord('a') && ord($s[$i]) <= ord('z')) {
            /*
            if ($new_letter_position_on_ASCII > 122) { // if the $new_letter_position_on_ASCII exceeds the ASCII range of the 'lowercase' characters
                $new_letter_position_on_ASCII_k = $new_letter_position_on_ASCII % 122;
                $new_letter_position_on_ASCII = 97 - 1 + $new_letter_position_on_ASCII_k; // We must deduct -1 because of the General Rule: array key/index = array length/size - 1    // This is the same as:    $new_letter_position_on_ASCII = $new_letter_position_on_ASCII - 26; // Reset the position
                // $new_letter_position_on_ASCII = $new_letter_position_on_ASCII - 26; // Reset the position    // Also Correct!
                // $new_letter_position_on_ASCII -= 26;                                // Reset the position    // Also Correct!
            }

            $s[$i] = chr($new_letter_position_on_ASCII); // Uncomment the $new_letter_position_on_ASCII variable above!
            */


            // Another way to go (WITHOUT the previous if statement):
            /*
                The current letter position on the English alphabet is equivalent to    letter's ASCII - 97 (for 'lowercase' letters).
                Example: For letter 'c',    99 - 97 = 2    , where 2 is the letter 'c' index position on the English Alphabet

                The current letter position on the English alphabet AFTER ROTATION BY $k TIMES is equivalent to    letter's index position on the English Alphabet + $k (for 'uppercase' letters).
                Example: For letter 'c', and if $k = 3,    2 + 3 = 5    , where 2 is the letter 'c' index position on the English Alphabet, 3 is $k, 5 is the new position of the letter after rotation by $k times

                And in case the new position exceeds the ASCII range of the 'lowercase' characters, we use a modulo operation
                Example:    5 % 26 = 5    (or another example,    31 % 26 = 5). You notice that both 5 and 31 have the same position (which is equal to 5)
            */
            
            $letter_position_on_english_alphabet       = $letter_ASCII_value - 97;
            $new_letter_position_on_english_alphabet_k = ($letter_position_on_english_alphabet + $english_alphabet_k) % 26;
            $new_letter_position_on_ASCII              = 97 + $new_letter_position_on_english_alphabet_k;

            $s[$i] = chr($new_letter_position_on_ASCII);
            
        }
    }


    return $s;
}

// Test Case
// $result = caesarCipher('middle-Outz', 11);
// $result = caesarCipher('middle-Outz', 2);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 36) Anagram (Mock Test)    // https://www.hackerrank.com/challenges/anagram/problem?h_r=internal-search&isFullScreen=true    // https://www.hackerrank.com/test/fhtsrrpa5ha/questions/bae9p3effgk
// Time Complexity: O(n) for each test
function anagram($s) {
    // https://www.hackerrank.com/challenges/anagram/editorial


    $s_length      = strlen($s);
    $s_half_length = $s_length / 2;

    if ($s_length % 2 != 0) { // if the $s string length is ODD, there can't be an anagram
        return -1;

    } else { // if the $s string length is EVEN, there can be an anagram
        $s_string_array = str_split($s);
        // echo '<pre>', var_dump($s_string_array), '</pre>';

        $s_string_array_frequency_array = array_count_values($s_string_array);
        // echo '<pre>', var_dump($s_string_array_frequency_array), '</pre>';
    

        $first_half_array  = array_slice($s_string_array, 0, $s_half_length);
        // echo '<pre>', var_dump($first_half_array), '</pre>';
        $second_half_array = array_slice($s_string_array, $s_half_length, $s_length);
        // echo '<pre>', var_dump($second_half_array), '</pre>';

        $first_half_frequency_array  = array_count_values($first_half_array);
        // echo '<pre>', var_dump($first_half_frequency_array), '</pre>';
        $second_half_frequency_array = array_count_values($second_half_array);
        // echo '<pre>', var_dump($second_half_frequency_array), '</pre>';



        $number_of_occurences_differences = 0;

        foreach ($s_string_array_frequency_array as $key => $value) {
            // echo $key . ' => ' . $value . '<br>';

            /*
            if (!isset($first_half_frequency_array[$key])) {
                $first_half_frequency_array[$key] = 0;
            } elseif (!isset($second_half_frequency_array[$key])) {
                $second_half_frequency_array[$key] = 0;
            }
            */

            // $number_of_occurences_differences += abs($first_half_frequency_array[$key] - $second_half_frequency_array[$key]); // Uncomment the last if statement!
            $number_of_occurences_differences += abs(($first_half_frequency_array[$key] ?? 0) - ($second_half_frequency_array[$key] ?? 0)); // WITHOUT the last if statement!
        }
    }

    // echo $number_of_occurences_differences . '<br>';


    return $number_of_occurences_differences / 2;


    /*
    // Another Solution/Approach using letters ASCII values and ord() and chr() functions
    // https://github.com/rrylee/HackerRank-Solution/blob/master/Algorithm/String/7-anagram.php    // https://www.hackerrank.com/challenges/anagram/editorial
    $s_length      = strlen($s);
    $s_half_length = $s_length / 2;

    if ($s_length % 2 != 0) { // if the $s string length is ODD, there can't be an anagram
        return -1;

    } else { // if the $s string length is EVEN, there can be an anagram
        $english_alphabet_frequency_array = array_fill(1, 26, 0); // English Alphabet frequency array
        // echo '<pre>', var_dump($english_alphabet_frequency_array), '</pre>';

        // Fill in the $s frequency array with the FIRST half of the array
        for ($i = 0; $i < $s_half_length; $i++) {
            $letter_ASCII_value = ord($s[$i]);

            // echo $letter_ASCII_value . '<br>';
            // echo ord('a') . '<br>';
            // echo $letter_ASCII_value - ord('a') . '<br>';
            // echo $letter_ASCII_value - ord('a') + 1 . '<br>';

            $english_alphabet_frequency_array[$letter_ASCII_value - ord('a') + 1]++; // From the Problem Constraints, all letters are lowercase    // is the same as:    $english_alphabet_frequency_array[$letter_ASCII_value - 97]++;    // General Rule: array key/index = array length/size - 1
        }

        // echo '<pre>', var_dump($english_alphabet_frequency_array), '</pre>';


        // DEDUCT the frequencies of the SECOND half of the array minus the frequencies of the FIRST half of the array
        for ($i = $s_half_length; $i < $s_length; $i++) {
            $letter_ASCII_value = ord($s[$i]);

            // echo $letter_ASCII_value . '<br>';
            // echo ord('a') . '<br>';
            // echo $letter_ASCII_value - ord('a') . '<br>';
            // echo $letter_ASCII_value - ord('a') + 1 . '<br>';

            $english_alphabet_frequency_array[$letter_ASCII_value - ord('a') + 1]--; // From the Problem Constraints, all letters are lowercase    // is the same as:    $english_alphabet_frequency_array[$letter_ASCII_value - 97]++;    // General Rule: array key/index = array length/size - 1
        }

        // echo '<pre>', var_dump($english_alphabet_frequency_array), '</pre>';


        $sum_of_differences = 0;
        // Get the absolute difference of number of occurences of each element
        foreach ($english_alphabet_frequency_array as $key => $value) {
            $sum_of_differences += abs($english_alphabet_frequency_array[$key]);
        }


        return $sum_of_differences / 2;
    }
    */
}

// Test Case
// $result = anagram('abccde');
// $result = anagram('aaabbb');
// $result = anagram('xaxbbbxx');
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 37) Max Min    // https://www.hackerrank.com/challenges/three-month-preparation-kit-angry-children/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(N log N)
function maxMin($k, $arr) {
    /*
    // Low Performance solution/Approach using TWO loops. HackerRank said "Terminated due to timeout :(" and "Time limit exceeded"
    sort($arr); // sort $arr array ascendingly
    // echo '<pre>', var_dump($arr), '</pre>'; // [1, 2, 4, 7]

    $arr_length = count($arr);
    $arr_last_index = count($arr) - 1;

    // We declare a RUNNING (TEMPORARY minimum difference):
    $current_minimum_difference = 10**9; // From the Problem Constraints: 0 <= arr[i] <= 10^9, we suppose the difference between two numbers is the largest number possible (the difference between the largest number possible (10^9) and the smallest number possible (0))    // Another way to go, we can suppose the largest (Worst-Case Scenario) number possible is the largest number in PHP as follows:    $current_minimum_difference = PHP_INT_MAX;
    // $current_minimum_difference = PHP_INT_MAX; // Another way to go

    for ($i = 0; $i < $arr_last_index; $i++) { // Loop through till the next-to-last element
        $temporary_array = [];

        for ($j = $i; $j < $i + $k; $j++) {
            if ($i + $k >= $arr_length) {
                break;
            }

            $temporary_array[] = $arr[$j];
            // echo '<pre>', var_dump($temporary_array), '</pre>';
            // exit;
        }

        // echo '<pre>', var_dump($temporary_array), '</pre>';
        // echo max($temporary_array) - min($temporary_array);
        // exit;

        if (!empty($temporary_array)) {
            $temporary_difference = max($temporary_array) - min($temporary_array);

            if ($temporary_difference < $current_minimum_difference) {
                $current_minimum_difference = $temporary_difference;
            }
        }


        // echo $current_minimum_difference . '<br>';
    }
    
    // echo $current_minimum_difference . '<br>';


    return $current_minimum_difference;
    */


    // More efficient solution with ONE loop ONLY:
    sort($arr); // sort $arr array ascendingly
    // echo '<pre>', var_dump($arr), '</pre>'; // [1, 2, 4, 7]

    $check_till_length_minus_k = count($arr) - $k;
    // $arr_length = count($arr);

    // We declare a RUNNING (TEMPORARY minimum difference):
    $current_minimum_difference = 10**9; // From the Problem Constraints: 0 <= arr[i] <= 10^9, we suppose the difference between two numbers is the largest number possible (the difference between the largest number possible (10^9) and the smallest number possible (0))    // Another way to go, we can suppose the largest (Worst-Case Scenario) number possible is the largest number in PHP as follows:    $current_minimum_difference = PHP_INT_MAX;
    // $current_minimum_difference = PHP_INT_MAX; // Another way to go

    for ($i = 0; $i <= $check_till_length_minus_k; $i++) {
        $temporary_difference = $arr[$i + $k - 1] - $arr[$i]; // $temporary_difference is a RUNNING (TEMPORARY) minimum difference    // General Rule: array key/index = array length/size - 1
    /*
    // Another way to go: (A similar loop for the previous loop)
    for ($i = $k - 1; $i < $arr_length; $i++) { // Uncomment $arr_length variable above!
        // echo $arr[$i - 1]  . '<br>';
        // echo $arr[$i - $k] . '<br>';
        $temporary_difference = $arr[$i] - $arr[$i - $k + 1]; // General Rule: array key/index = array length/size - 1
    */
        // echo $temporary_difference . '<br>';

        if ($temporary_difference < $current_minimum_difference) {
            $current_minimum_difference = $temporary_difference;
            // echo $current_minimum_difference;
        }
    }


    return $current_minimum_difference;
}

// Test Case
// $result = maxMin(2, [1, 4, 7, 2]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 38) Strong Password    // https://www.hackerrank.com/challenges/three-month-preparation-kit-strong-password/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(N)
function minimumNumber($n, $password) {
    // Note: This problem can be solved using Regular Expression too. Check https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-strong-password/hackers/createallbymyse1/download_solution
    // Idea: The answer is always max(6 - stringLength, 4 - different types of characters in the password): https://www.hackerrank.com/challenges/three-month-preparation-kit-strong-password/editorial

    // Given from the Problem:
    // $numbers            = '0123456789';
    // $lower_case         = 'abcdefghijklmnopqrstuvwxyz';
    // $upper_case         = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $special_characters = '!@#$%^&*()-+';



    $types_of_characters_array = []; // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)

    // Since, we have 4 different types of characters
    // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)
    for ($i = 0; $i < $n; $i++) {
        if (ctype_digit($password[$i])) { // check if the character is a digit
            // echo $password[$i] . '<br>';

            // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)
            // $types_of_characters_array['digit'] = 0; // This is the same as:    $types_of_characters_array['digit'] = 'digit character';
            $types_of_characters_array['digit'] = 'digit character'; // This is the same as:    $types_of_characters_array['digit'] = 0;
        } elseif (ctype_lower($password[$i])) { // check if the character is a lowercase letter
            // echo $password[$i] . '<br>';

            // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)
            // $types_of_characters_array['lower'] = 1; // This is the same as:    $types_of_characters_array['digit'] = 'digit character';
            $types_of_characters_array['lower'] = 'lowercase character'; // This is the same as:    $types_of_characters_array['lower'] = 1;
        } elseif (ctype_upper($password[$i])) { // check if the character is an uppercase letter
            // echo $password[$i] . '<br>';

            // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)
            // $types_of_characters_array['upper'] = 2; // This is the same as:    $types_of_characters_array['upper'] = 'uppercase character';
            $types_of_characters_array['upper'] = 'uppercase character'; // This is the same as:    $types_of_characters_array['upper'] = 2;
        } elseif (strpos($special_characters, $password[$i]) !== false) {
            // echo $password[$i] . '<br>';

            // Note: Utilizing the fact that array keys cannot be duplicated (like a Set data structure)
            // $types_of_characters_array['special_character'] = 3; // This is the same as:    $types_of_characters_array['special_character'] = 'special character';
            $types_of_characters_array['special_character'] = 'special character'; // This is the same as:    $types_of_characters_array['special_character'] = 3;
        }
    }

    // echo '<pre>', var_dump($types_of_characters_array), '</pre>';


    return max(6 - $n, 4 - count($types_of_characters_array)); // Choose which is greater!    // Note: 6 is the required length by the problem. 4 is the 4 types of characters required by the problem.


    // Note: Bitwise Left Shifting by 1 is equivalent to multiplying by * 2 and Bitwise Right Shifting by 1 is equivalent to division by / 2    // https://www.youtube.com/watch?v=8aFik6lPPaA and https://www.youtube.com/watch?v=GhhJP6vpEA8
    // Bitwsise Left Shift <<
    // echo 1 << 1 . '<br>'; // 1 * 2 = 2
    // echo 2 << 1 . '<br>'; // 2 * 2 = 4
    // echo 3 << 1 . '<br>'; // 3 * 2 = 6
    // echo 4 << 1 . '<br>'; // 4 * 2 = 8
    // echo 5 << 1 . '<br>'; // 5 * 2 = 10

    // Bitwsise Right Shift >>
    // echo 1 >> 1 . '<br>'; // 1 / 2 = 0  (1 is an ODD number) Right Shifting by 1 is equivalent to Integer Division by 2, like intdiv(1, 2) and floor(1, 2)
    // echo 2 >> 1 . '<br>'; // 2 / 2 = 1
    // echo 3 >> 1 . '<br>'; // 3 / 2 = 1  (3 is an ODD number) Right Shifting by 1 is equivalent to Integer Division by 2, like intdiv(3, 2) and floor(3, 2)
    // echo 4 >> 1 . '<br>'; // 4 / 2 = 2
    // echo 5 >> 1 . '<br>'; // 5 / 2 = 2  (5 is an ODD number) Right Shifting by 1 is equivalent to Integer Division by 2, like intdiv(5, 2) and floor(5, 2)
}

// Test Case
// $answer = minimumNumber(5, '2bbbb');
// echo '<pre>', var_dump($answer), '</pre>';

/*********************************************************************************************************************************************/

// 39) Dynamic Array    // https://www.hackerrank.com/challenges/three-month-preparation-kit-dynamic-array/problem
// Time Complexity: O(Q)
function dynamicArray($n, $queries) {
    // This an N * N Matrix (N by N Matrix or Square Matrix)
    $lastAnswer = 0;
    $answersArray = [];

    // 2-Dimensional Array (2D array)
    $arr = [];

    // Note: You can remove this for loop and the code would still work!
    // Fill in/Append the $arr with $n number of arrays
    for ($i = 0; $i < $n; $i++) {
        $arr[] = [];
    }

    // echo '<pre>', var_dump($arr), '</pre>';


    $queries_length = count($queries);

    for ($i = 0; $i < $queries_length; $i++) {
        // echo '<pre>', var_dump($queries[$i]), '</pre>';
        // echo '<pre>', var_dump($queries[$i][0]), '</pre>'; // 1 or 2 (the zeroth 0th index)
        // echo '<pre>', var_dump($queries[$i][1]), '</pre>'; // $x
        // echo '<pre>', var_dump($queries[$i][2]), '</pre>'; // $y
        $x = $queries[$i][1];
        $y = $queries[$i][2];

        $idx = ($x ^ $lastAnswer) % $n;

        if ($queries[$i][0] == 1) { // if the the zeroth 0th element is 1
            $arr[$idx][] = $y; // Important Note!: Note the EXTRA SQUARE BRACKET [] (to append $y as an array) because of the fact that $arr is a two-dimensional 2D array, and this means that $arr[$idx] ITSELF is an array too, so when you append to it, you must use an extra [] Square Bracket 
            // echo '<pre>', var_dump($arr), '</pre>';
            // exit;

        } else { // if the the zeroth 0th element is 2 (    if $queries[$i][0][0] == 2    )
            $lastAnswer = $arr[$idx][$y % count($arr[$idx])];
            $answersArray[] = $lastAnswer;
        }
    }

    // echo '<pre>', var_dump($arr), '</pre>';
    // echo '<pre>', var_dump($lastAnswer), '</pre>';


    return $answersArray;
}

// Test Case
// $result = dynamicArray(2, [ // 2D Array
//     // MY WRONG INPUT! (NOT STRINGS!)
//     // ['105'],
//     // ['117'],
//     // ['103'],
//     // ['210'],
//     // ['211']

//     // THE RIGHT INPUT (ARRYS)
//     [1, 0, 5],
//     [1, 1, 7],
//     [1, 0, 3],
//     [2, 1, 0],
//     [2, 1, 1]
// ]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 40) Smart Number 2 (Debugging problem)    // https://www.hackerrank.com/challenges/three-month-preparation-kit-smart-number/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
function is_smart_number($num) {
    // Math note: A number has an ODD number of factors if it has an INTEGER (WHOLE number) square root (like 1, 4, 9, ...)
    $val = (int) sqrt($num); // Important Note: We take the INTEGER value only of the square root (using Type Casting), not the Float number (if any) (Ex: Square Root of 2 = 1.414, we take only 1)    // sqrt() (square root)    // Get the square root of $num
    // echo '<pre>', var_dump($val), '</pre>';

    // if ($num / $val == $val) {  //    num / square root, e.g. 4 / 2 == 2
    if ($val * $val == $num) {  //    num / square root, e.g. 4 / 2 == 2
    // if (pow($val, 2) == $num) { //    num / square root, e.g. 4 / 2 == 2
    // if (intdiv($num, $val) == $val) { //    num / square root, e.g. 4 / 2 == 2
        return true;
    }


    return false;
}

// $ans = is_smart_number(1); // 'YES'
// $ans = is_smart_number(2); // 'NO'
// $ans = is_smart_number(4); // 'YES'
// $ans = is_smart_number(7); // 'NO'
// $ans = is_smart_number(9); // 'YES'
// $ans = is_smart_number(17); // !!

// if ($ans) {
//     echo "YES\n";
// } else {
//     echo "NO\n";
// }

/*********************************************************************************************************************************************/

// 41) Missing Numbers    // https://www.hackerrank.com/challenges/three-month-preparation-kit-missing-numbers/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(n)
function missingNumbers($arr, $brr) {
    /*
    // This solution using array_diff() function doesn't work because it removes the duplicated values!
    echo '<pre>', var_dump(array_diff($brr, $arr)), '</pre>';
    $difference_array = array_diff($brr, $arr);
    sort($difference_array);
    return $difference_array;
    */


    /*
    $answerArray = [];

    $arr_frequency_array = array_count_values($arr); // The array with the MISSING numbers
    $brr_frequency_array = array_count_values($brr); // The ORGINIAL array
    echo '<pre>', var_dump($arr_frequency_array), '</pre>';
    echo '<pre>', var_dump($brr_frequency_array), '</pre>';


    // Note: We use a 'foreach' loop (not for loop) because we don't exactly the array keys of the $brr_frequency_array
    foreach ($brr_frequency_array as $brr_number => $brr_number_frequency) {
        if (isset($arr_frequency_array[$brr_number])) { // if the number of $brr_frequency_array exists in $arr_frequency_array
            if ($brr_number_frequency - $arr_frequency_array[$brr_number] > 0) {
                $answerArray[] = $brr_number; // Note: The $brr_number won't be duplicated because the frequency array already has UNIQUE values (because array_count_values() function already produces UNIQUE values)
            }

        } else { // if the number of $brr_frequency_array doesn't exist in $arr_frequency_array
            $answerArray[] = $brr_number; // Note: The $brr_number won't be duplicated because the frequency array already has UNIQUE values (because array_count_values() function already produces UNIQUE values)
        }
    }


    sort($answerArray); // sort $answerArray ascendingly as requested by the problem


    return $answerArray;
    */



    // Check also the C++ HackerRank solution/approach (in the Editorial) which is equivalent to creating frequency arrays using array_fill() function, and then there's no need for sorting, and there's no need to use the if statements I used in my previous solution, as all the keys will be present in BOTH frequency arrays    // https://www.hackerrank.com/challenges/three-month-preparation-kit-missing-numbers/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five



    // HackerRank's Solution/Approach in the Editorial using Frequency Sort Algorithm:
    // Taking advantage of the Problem Constraint:    max(brr) - min(brr) <= 100
    $frequency_array = array_fill(0, 101, 0); // Problem Constraints: max(brr) - min(brr) <= 100
    // echo '<pre>', var_dump($frequency_array), '</pre>';

    $b_array_minimum_value = min($brr);
    // echo $b_array_minimum_value . '<br>';

    foreach ($brr as $brr_number) {
        $frequency_array[$brr_number - $b_array_minimum_value]++; // Increase by +1
    }

    // echo '<pre>', var_dump($frequency_array), '</pre>';


    foreach ($arr as $arr_number) {
        $frequency_array[$arr_number - $b_array_minimum_value]--; // Decrease by -1
    }

    // echo '<pre>', var_dump($frequency_array), '</pre>';
    

    $answerArray = [];

    foreach ($frequency_array as $number_minus_b_array_minimum_value => $frequency) {
        if ($frequency > 0) {
            $answerArray[] = $number_minus_b_array_minimum_value + $b_array_minimum_value;
        }
    }


    return $answerArray;
}


// $result = missingNumbers([7, 2, 5, 3, 5, 3], [7, 2, 5, 4, 6, 3, 5, 3]);
// $result = missingNumbers([203, 204, 205, 206, 207, 208, 203, 204, 205, 206], [203, 204, 204, 205, 206, 207, 205, 208, 203, 206, 205, 206, 204]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 42) The Full Counting Sort    // https://www.hackerrank.com/challenges/three-month-preparation-kit-countingsort4/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(N)
function countSort($arr) {
    // This is the HackerRank's solution/approach (Editorial): https://www.hackerrank.com/challenges/three-month-preparation-kit-countingsort4/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
    // NOTE: WEIRD thing happended with this problem! The solution doesn't pass the testcase 5 (Runtime Error)! And all other PHP solutions run into the same error too!
    $arr_length            = count($arr);
    $floor_half_arr_length = floor($arr_length / 2);  // Problem Constraints: n is EVEN    // Floor Division: round DONW to the nearest whole number


    $words = [];

    // for ($i = 0; $i < $floor_half_arr_length; $i++) {
    //     $words[] = [];
    // }
    // echo '<pre>', var_dump($words), '</pre>';



    for ($i = 0; $i < $floor_half_arr_length; $i++) { // loop through/over till the half length of the array
        $words[$arr[$i][0]][] = '-';
    }
    // echo '<pre>', var_dump($words), '</pre>';

    for ($i = $floor_half_arr_length; $i < $arr_length; $i++) { // loop through/over from the half length of the array till its end
        $words[$arr[$i][0]][] = $arr[$i][1];
    }


    // echo '<pre>', var_dump($words), '</pre>';



    $answer = '';
    $words_length = count($words);

    for ($i = 0; $i < $words_length; $i++) {
        $answer .= ' ' . implode(' ', $words[$i]);
    }
    // echo '<pre>', var_dump($answer), '</pre>';

    // foreach ($words as $word) {
    //     foreach ($word as $value) {
    //         echo $value . ' ';
    //     }
    // }


    echo trim($answer);
}

// Test Case
// countSort([
//     [0, 'a'],
//     [1, 'b'],
//     [0, 'c'],
//     [1, 'd']
// ]);

/*********************************************************************************************************************************************/

// 43) Grid Challenge    // https://www.hackerrank.com/challenges/three-month-preparation-kit-grid-challenge/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(T*N*N*log N)
function gridChallenge($grid) {
    // Character Arithmetic in PHP: https://www.php.net/manual/en/language.operators.increment.php#:~:text=when%20dealing%20with-,arithmetic%20operations%20on%20character%20variables,-and%20not%20C%27s

    // echo '<pre>', var_dump('a' < 'c'), '</pre>'; // Works!
    // echo '<pre>', var_dump('a' > 'c'), '</pre>'; // Works!

    // echo 'a' + 'c' . '<br>'; // Doesn't work!

    // $letter1 = 'a';
    // $letter2 = 'b';
    // echo $letter1 + $letter2; // Doesn't work!

    // $letter = 'a';
    // echo ++$letter . '<br>'; // Works!
    // echo ++$letter . '<br>'; // Works!



    // The Idea: https://www.hackerrank.com/challenges/three-month-preparation-kit-grid-challenge/editorial?filter=php&filter_on=language&h_l=interview&isFullScreen=true&page=1&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
    $grid_length = count($grid);
    // $grid_last_index = $grid_length - 1;
    $one_grid_string_length = strlen($grid[0]);
    // $one_grid_string_last_index = $one_grid_string_length - 1;
    $sorted_grid = [];
    $good = true;

    for ($i = 0; $i < $grid_length; $i++) {
        // We SORT the strings ASCENDINGLY!
        // echo $grid[$i] . '<br>';
        // echo '<pre>', var_dump(str_split($grid[$i])), '</pre>';
        $split_grid = str_split($grid[$i]);
        // echo '<pre>', var_dump($split_grid), '</pre>';
        sort($split_grid); // sort ascendingly
        // echo '<pre>', var_dump($split_grid), '</pre>';
        $sorted_grid[] = implode($split_grid); // is the same as:    $sorted_grid[] = implode('', $split_grid);

        // echo '<pre>', var_dump($sorted_grid), '</pre>';
        // exit;


        if ($i > 0) {
            // echo '<pre>', var_dump($sorted_grid), '</pre>';
            // exit;

            for ($j = 0; $j < $one_grid_string_length; $j++) { // Check the order of COLUMNS
                // echo $j . '<br>';
                // echo $i . '<br>';
                // echo $sorted_grid[$i][$j]     . '<br>';
                // echo $sorted_grid[$i - 1][$j] . '<br>';

                if ($sorted_grid[$i][$j] < $sorted_grid[$i - 1][$j]) {
                    $good = false;
                    // echo '<pre>', var_dump($good), '</pre>';
                    // return 'NO'; // Another way to go

                    break; // get out of the loop (for better performance)
                }

            }
        }
    }


    // echo $good == true ? 'YES' . "\n" : 'NO' . "\n";
    return $good == true ? 'YES' : 'NO';
    // return 'YES';
}

// Test Case
// $result = gridChallenge([
//     'abc',
//     'ade',
//     'efg'
// ]);

// $result = gridChallenge([
//     'mpxz',
//     'abcd',
//     'wlmf',
// ]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 44) Sansa and XOR    // https://www.hackerrank.com/challenges/three-month-preparation-kit-sansa-and-xor/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-five
// Time Complexity: O(n) per test case

function sansaXor($arr) {
    // It's required to find the value obtained by XOR-ing the CONTIGUOUS SUBARRAYS, followed by XOR-ing the values obtained
    // Idea: Exclusive Or or XOR Properties: x ^ x = 0, x ^ 0 = x
    /*
        Example 1: Array length is an ODD number: [1, 2, 3]
        Answer: (1 ^ 2 ^ 3) ^ (1 ^ 2) ^ (2 ^ 3) ^ (1 ^ 2 ^ 3) = 0 ^ 1 ^ 3 = 1 ^ 3 = 2 (Important Note: You can notice that it takes EVERY OTHER NUMBER (here, 1 then 3))

        Example 2: Array length is an EVEN number: [1, 2, 3, 4] (Will always be ZERO 0)
        Answer: (1 ^ 2 ^ 3 ^ 4) ^ (1 ^ 2) ^ (2 ^ 3) ^ (3 ^ 4) ^ (1 ^ 2 ^ 3) ^ (2 ^ 3 ^ 4) ^ (1 ^ 2 ^ 3 ^ 4) = 0 ^ 0 ^ 0 ^ 0 ^ 0 = 0

        Example 1: Array length is an ODD number: [1, 2, 3, 4, 5]
        Answer: (1 ^ 2 ^ 3 ^ 4 ^ 5) ^ (1 ^ 2) ^ (2 ^ 3) ^ (3 ^ 4) ^ (4 ^ 5) ^ (1 ^ 2 ^ 3) ^ (2 ^ 3 ^ 4) ^ (3 ^ 4 ^ 5) ^ (1 ^ 2 ^ 3 ^ 4 ^ 5) = 1 ^ 3 ^ 5 (Important Note: You can notice that it takes EVERY OTHER NUMBER (here, 1 then 3, then 5))

    */



    $arr_length = count($arr);

    if ($arr_length % 2 == 0) { // if the array length is an EVEN number, the value will always be ZERO
        return 0;

    } else { // if the array length is an ODD number, take EVERY OTHER number
        $val = 0;


        /*
        // for ($i = 0; $i < $arr_length; $i++) {
        //     // echo $arr[$i] . '<br>';
    
        //     if ($i % 2 == 0) { // considering the array INDEXES/INDICES    // taking EVERY OTHER NUMBER starting from the zeroth index 0th index, 2, 4, 6, 8, ... ($val is zero 0, because    0 ^ x = x    )
        //         $val ^= $arr[$i];
        //     }
        // }
        */


        // Another way to go:
        for ($i = 0; $i < $arr_length; $i += 2) { // considering the array INDEXES/INDICES    // taking EVERY OTHER NUMBER starting from the 2nd index 2, 4, 6, 8, ... ($val is already the zeroth index 0th index)
            // echo $arr[$i] . '<br>';

            $val ^= $arr[$i];
        }


        return $val;
    }
}

// $result = sansaXor([3, 4, 5]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 45) Fibonacci Modified (Mock Test)    // https://www.hackerrank.com/challenges/fibonacci-modified/problem?isFullScreen=true
// Time Complexity: 
function fibonacciModified($t1, $t2, $n) {
    // https://www.hackerrank.com/challenges/fibonacci-modified/editorial
    // https://www.geeksforgeeks.org/find-the-nth-element-of-the-modified-fibonacci-series/
    // https://www.google.com/search?q=what+is+arbitrary+precision&sxsrf=ALiCzsZHcCEgT5YrYdcpZodNPvX6G4uuJg%3A1672366667457&ei=S0quY9_EG-qWxc8P2tmtoA4&ved=0ahUKEwiflpepo6D8AhVqS_EDHdpsC-QQ4dUDCA8&uact=5&oq=what+is+arbitrary+precision&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIHCAAQgAQQDTIHCAAQgAQQDTIECAAQHjIGCAAQHhAPMgYIABAeEA8yBQgAEIYDMgUIABCGAzIFCAAQhgM6CggAEEcQ1gQQsAM6BwgjELACECc6BggAEAcQHjoICAAQBxAeEA86CAgAEAgQHhANOgoIABAIEB4QDxANOggIIRDDBBCgAToECCMQJ0oECEEYAEoECEYYAFC0Glj9OWCUO2gHcAB4AIABoAGIAa4OkgEEMC4xM5gBAKABAcgBCMABAQ&sclient=gws-wiz-serp
    // 'Precision' in Math: https://www.youtube.com/watch?v=lGb3DmxASmM
    // https://stackoverflow.com/questions/7524838/fixed-point-vs-floating-point-number

    /*
        0, 1, 1, 2, 5, 27, ...
    */



    /*
        Note: This solution is CORRECT but doesn't work (Try for example    $n = 13 or 20    !!) due to this note stated in the Problem: Note: The value of t[n] may far exceed the range of a 64-bit integer. Many submission languages have libraries that can handle such large results but, for those that don't (e.g., C++), you will need to compensate for the size of the result.
        That's why we need to use the PHP library BCMath (Arbitrary Precision Mathematics): https://www.php.net/manual/en/book.bc.php
        https://www.culttt.com/2014/05/14/avoid-arbitrary-precision-errors-php-bc-math
        https://en.wikipedia.org/wiki/Arbitrary-precision_arithmetic
        // https://www.wolframalpha.com/examples/mathematics/numbers/arbitrary-precision
    */
    /*
    for ($i = 3; $i <= $n; $i++) {
        // echo 'Hi<br>';
        $t3 = $t1 + $t2 ** 2;

        $t1 = $t2;
        $t2 = $t3;
    }


    return $t3;
    */


    // Using PHP BCMath library: https://www.culttt.com/2014/05/14/avoid-arbitrary-precision-errors-php-bc-math
    for ($i = 3; $i <= $n; $i++) {
        // echo 'Hi<br>';
        // $t3 = $t1 + $t2 ** 2;
        $t3 = bcadd($t1, bcpow($t2, 2));

        $t1 = $t2;
        $t2 = $t3;
    }


    return $t3;
}

// Test Case
// $result = fibonacciModified(0, 1, 5);
// $result = fibonacciModified(0, 1, 6);
// $result = fibonacciModified(0, 1, 13); // Compare results using regular PHP functions and BCMath library functions!
// $result = fibonacciModified(0, 1, 20); // Compare results using regular PHP functions and BCMath library functions!
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 46) Prime Dates (Debugging problem)    // https://www.hackerrank.com/challenges/three-month-preparation-kit-prime-date/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// https://www.youtube.com/watch?v=ulepm7W8EXI
// https://www.google.com/search?q=leap+year+program+PHP&sxsrf=ALiCzsbe5HduAxN4LxXOXqGl-KE62-9-CA%3A1672511179609&ei=y36wY9fmJKaRkdUPnPy7gAI&ved=0ahUKEwiX-PjVvaT8AhWmSKQEHRz-DiAQ4dUDCBA&uact=5&oq=leap+year+program+PHP&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQgAQyBggAEBYQHjIGCAAQFhAeMgUIABCGAzoKCAAQRxDWBBCwAzoHCAAQsAMQQzoNCAAQ5AIQ1gQQsAMYAToPCC4Q1AIQyAMQsAMQQxgCOgQIIxAnOgUIABCRAjoECAAQQzoKCAAQgAQQhwIQFDoLCAAQFhAeEPEEEApKBAhBGABKBAhGGAFQsBZY_CVgnChoA3ABeACAAZYBiAGMDJIBBDAuMTGYAQCgAQHIAQ7AAQHaAQYIARABGAnaAQYIAhABGAg&sclient=gws-wiz-serp


// Check if the year is a leap year (not common year) 
function updateLeapYear($year) {
    $month = [];

    $month[1]  = 31; // January
    $month[2]  = 28; // February    // This'll be changed to 28 or 29 depending on the updateLeapYear() function
    $month[3]  = 31; // March
    $month[4]  = 30; // April
    $month[5]  = 31; // May
    $month[6]  = 30; // June
    $month[7]  = 31; // July
    $month[8]  = 31; // August
    $month[9]  = 30; // September
    $month[10] = 31; // October
    $month[11] = 30; // November
    $month[12] = 31; // December


    if ($year % 400 == 0) { // if the year is divisible by 400, it's a leap year i.e. February is 29 days (not 28 days)
        $month[2] = 29; // First Correction!    // February is 29 days (not 28 days)
        // echo 'Leap year (Case 1)<br>';
    } elseif ($year % 100 == 0) { // it's a common year
        $month[2] = 28; // Second Correction!    // February is 28 days i.e. common year
        // echo 'Common year (Case 2)<br>';
    } elseif ($year % 4 == 0) {
        $month[2] = 29;
        // echo 'Leap year (Case 3)<br>';
    } else {
        $month[2] = 28;
        // echo 'Common year (Case 4)<br>';
    }


    return $month;
}
// echo '<pre>', var_dump(updateLeapYear(1900)), '</pre>'; // Common year
// echo '<pre>', var_dump(updateLeapYear(1900)[2]), '</pre>'; // Common year
// echo '<pre>', var_dump(updateLeapYear(1900)[1]), '</pre>'; // Common year
// echo '<pre>', var_dump(updateLeapYear(2024)), '</pre>'; // Leap year

// function storeMonth() {
//     $month = [];

//     $month[1]  = 31; // January
//     $month[2]  = 28; // February    // This'll be changed to 28 or 29 depending on the updateLeapYear() function
//     $month[3]  = 31; // March
//     $month[4]  = 30; // April
//     $month[5]  = 31; // May
//     $month[6]  = 30; // June
//     $month[7]  = 31; // July
//     $month[8]  = 31; // August
//     $month[9]  = 30; // September
//     $month[10] = 31; // October
//     $month[11] = 30; // November
//     $month[12] = 31; // December

//     return $month;
// }


function findLuckyDates(int $d1, int $m1, int $y1, int $d2, int $m2, int $y2) {
    // $month = [];

    // $month[1]  = 31; // January
    // $month[2]  = 28; // February    // This'll be changed to 28 or 29 depending on the updateLeapYear() function
    // $month[3]  = 31; // March
    // $month[4]  = 30; // April
    // $month[5]  = 31; // May
    // $month[6]  = 30; // June
    // $month[7]  = 31; // July
    // $month[8]  = 31; // August
    // $month[9]  = 30; // September
    // $month[10] = 31; // October
    // $month[11] = 30; // November
    // $month[12] = 31; // December

    // return $month;


    $result = 0; // the count of the lucky dates

    while (true) {
        // Now, we form the the whole date $x by forming the day-month, then the day-month-year
        $x = $d1;
        // echo $x . '<br>';
        // exit;
        $x = $x * 100   + $m1; // For example, 13-01-2022, we form the day-month as follows: 13 * 100 = 1300 + 01 = 1301
        // echo $x . '<br>';
        // exit;
        $x = $x * 10000 + $y1; // Third Correction!    // To continue the last example, we form the year as follows: 1301 * 10000 = 13010000 + 1990 = 13011990
        // echo $x . '<br>';
        // exit;

        /*
            For the above example, Uncomment    echo $x . '<br>';    above (Under    $x = $x * 10000 + $y1;    )! You notice days are incremented by +1, and if days exceed > 30 or 31 (depending on the number of days of the current month), they get reset to 1, also, if months exceed > 12, they get reset to 1
            28091900    // 28-09-1900
            29091900    // 29-09-1900
            30091900    // 30-09-1900
            1101900     // 01-10-1900
            2101900     // 02-10-1900
            3101900     // 03-10-1900
        */

        if ($x % 4 == 0 || $x % 7 == 0) { // Fourth Correction! 
            $result = $result + 1; // To find the count of the lucky dates
        }

        if ($d1 == $d2 && $m1 == $m2 && $y1 == $y2) { // if the first date is the same as the second date, this means this is the end, get out of the loop and return the $result
            break;
        }


        // updateLeapYear($y1);


        $d1 = $d1 + 1; // Increment days by +1


        // echo '<pre>', var_dump(storeMonth()), '</pre>';
        // echo '<pre>', var_dump($month), '</pre>';


        // if ($d1 > $month[$m1]) {
        // if ($d1 > storeMonth()[$m1]) {
        if ($d1 > updateLeapYear($y1)[$m1]) { // if $da > 31 or 30 (depending on the number of the days of the month), increment the $m1 by +1, and reset the days $d1 to 1
            $m1 = $m1 + 1; // Increment the months by +1
            $d1 = 1; // Reset the days to 1

            if ($m1 > 12) { // if $m1 exceeds > 12 months, we reset the months to 1, and increment the years by +1
                $y1 = $y1 + 1;
                $m1 = 1; // Fifth Correction! 
            }
        }
    }


    return $result;
}

// Test Case
// $result = findLuckyDates('28', '09', '1900', '03', '10', '1900'); // From 28-09-1990 to 03-10-1900
/*
    For the above example, Uncomment    echo $x . '<br>';    above (Under    $x = $x * 10000 + $y1;    )! You notice days are incremented by +1, and if days exceed > 30 or 31 (depending on the number of days of the current month), they get reset to 1, also, if months exceed > 12, they get reset to 1
    28091900    // 28-09-1900
    29091900    // 29-09-1900
    30091900    // 30-09-1900
    1101900     // 01-10-1900
    2101900     // 02-10-1900
    3101900     // 03-10-1900
*/
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 47) Sherlock and Array    // https://www.hackerrank.com/challenges/three-month-preparation-kit-sherlock-and-array/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity: O(N)
function balancedSums($arr) {
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-sherlock-and-array/editorial

    
    // First Solution/Approach: https://www.hackerrank.com/challenges/three-month-preparation-kit-sherlock-and-array/editorial#:~:text=.%0A%0ASolution%3A-,Approach%201,-%3A%0AWe%20first
    $arr_sum = array_sum($arr);
    // echo '<pre>', var_dump($arr_sum), '</pre>';

    $arr_length = count($arr);
    $arr_last_index = $arr_length - 1;
    $current_sum = 0; // we declare a running/temporary sum


    if ($arr_length == 1 || $arr_sum - $arr[0] == 0) { // Added the condition:    $arr_length == 1 for a case like:    [5]    , where the left of 5 is 0 and the right of it is 0    // Added the condition:    $arr_sum - $arr[0] == 0    , for a case like:    [2, 0, 0, 0]    , where the left of 2 is 0 and the right of it is 0
        return 'YES'; // 'return' keyword stops function execution
    }


    for ($i = 0; $i < $arr_last_index; $i++) {
        // echo '<b>' . $i . '</b><br>';
        // echo $current_sum . '<br>';
        
        $current_sum += $arr[$i];
        // echo $current_sum . '<br>';

        if ($current_sum == $arr_sum - $current_sum - $arr[$i + 1]) {
            // echo $arr[$i] . '<br>';
            return 'YES'; // 'return' keyword stops function execution
        }

    }


    return 'NO'; // 'return' keyword stops function execution



    /*
    // Second Solution/Approach: https://www.hackerrank.com/challenges/three-month-preparation-kit-sherlock-and-array/editorial#:~:text=updating%20and%20checking.-,Approach%202,-%3A%0AWe%20keep
    $pre_array = []; // An array contains the sums of $arr[$i] ($arr elements) till index $i
    $arr_length = count($arr);

    $pre_array[0] = 0;
    for ($i = 1; $i <= $arr_length; $i++) {
        $pre_array[$i] = $pre_array[$i - 1] + $arr[$i - 1];
    }
    // echo '<pre>', var_dump($pre_array), '</pre>';
    /*
        [
            0 => 0,     // 0
            1 => 5,     // 0 + 5   = 5
            2 => 11,    // 5 + 6   = 11
            3 => 19,    // 11 + 8  = 19
            4 => 30,    // 11 + 19 = 30
        ]
    */


    // Another way to go (for the for loop):
    /*
    for ($i = 0; $i <= $arr_length; $i++) {
        if ($i == 0) {
            $pre_array[0] = 0;

            continue; // skip this loop iteration (skip    $i = 0    )
        }

        // echo $i . '<br>';

        $pre_array[$i] = $pre_array[$i - 1] + $arr[$i - 1];
    }
    // echo '<pre>', var_dump($pre_array), '</pre>';
    */


    /*
    for ($i = 1; $i <= $arr_length; $i++) {
        if ($pre_array[$i - 1] == $pre_array[$arr_length] - $pre_array[$i]) {
            return 'YES'; // 'return' keyword stops function execution
        }
    }
    */

    /*
    // Another way to go (for the for loop):
    for ($i = 0; $i < $arr_length; $i++) { // $i < $arr_length    or    $i < count($pre_array) - 1;
        if ($pre_array[$i] == $pre_array[$arr_length] - $pre_array[$i + 1]) { // if the current sum    is equal to    the total sum of the $arr (i.e. $pre_array last element) - the $arr current element under question
            return 'YES'; // 'return' keyword stops function execution
        }
    }


    return 'NO'; // 'return' keyword stops function execution
    */
}


// Test Case
// $result = balancedSums([5, 6, 8, 11]);
// $result = balancedSums([2, 0, 0, 0]); // 'YES' !!
// $result = balancedSums([0, 0, 0, 2]); // 'YES' !!
// $result = balancedSums([5]); // 'YES' !!
// $result = balancedSums([0, 0]); // 'YES' !!
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 48) Misère Nim    // https://www.hackerrank.com/challenges/three-month-preparation-kit-misere-nim-1/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity: O(n)
function misereNim($s) {
    // https://www.hackerrank.com/challenges/three-month-preparation-kit-misere-nim-1/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
    // https://www.youtube.com/watch?v=Wze2eZDF0KQ
    // https://www.youtube.com/results?search_query=nim+game+explained
    // https://stackoverflow.com/questions/10560658/check-if-all-values-in-array-are-the-same


    // A special case, if the size of every pile is 1, then we need to treat it as a special case where we count the number of piles. If the count is even, then the first player will win; if the count is odd, then the first player will lose
    $remove_duplicates = array_unique($s);
    // echo '<pre>', var_dump($remove_duplicates), '</pre>';
    $s_length = count($s);

    /*
    if (count($remove_duplicates) === 1 && $remove_duplicates[0] === 1) { // if all the array elements are the same/identical (if the length of the unique elements array is 1)    &&    they are all number 1
        // echo 'Yes<br>';
        if (count($s) % 2 === 0) { // if the $s length is even, Player 1 wins
            return 'First';
        } else { // if the $s length is odd, Player 2 wins
            return 'Second';
        }
    */

    // Another way (more concise) to go for the if statement:
    if ($s_length == array_sum($s)) { // This is how to check if all the array values/elements are the same/identical    &&    they all are number 1    // We check if the array length/size is equal to the sum of all the array elements i.e. all the array elements are identical and are number 1 ONLY
        if ($s_length % 2 === 0) { // if the $s length is even, Player 1 wins
            return 'First';
        } else { // if the $s length is odd, Player 2 wins
            return 'Second';
        }
    } else { // if the $s array elements are not the same
        $xor_sum = $s[0]; // the first $s array element (the zeroth element i.e. the 0th element)

        for ($i = 1; $i < $s_length; $i++) { // Looping through starting from the SECOND (1st index) $s array element as the $xor_sum initial value is the first (0th index (zeroth index)) $s array element
            $xor_sum ^= $s[$i];
        }

        // echo $xor_sum . '<br>';
        if ($xor_sum === 0) { // if the XOR sum is zero, the first Player 1 picks the last stone from the last pile (loses), Player 2 wins
            return 'Second';
        } else { // if the XOR sum is anything other than zero, Player 2 picks the last stone from the last pile (loses), Player 1 wins
            return 'First';
        }
    }
}

// Test Case
// $result = misereNim([1, 1, 1]); // The special case where all elements are the same (identical) and area number 1
// $result = misereNim([2, 1, 3]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 49) Gaming Array 1    // https://www.hackerrank.com/challenges/three-month-preparation-kit-an-interesting-game-1/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity: O(n)
function gamingArray($arr) {
    // Editorial: https://www.hackerrank.com/challenges/three-month-preparation-kit-an-interesting-game-1/editorial?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
    // 'Brute Force'


    // $arr_length = count($arr);
    $current_running_max = 0;
    $count = 0; // the count of (number of) moves needed to finish the game.

    // for ($i = 0; $i < $arr_length; $i++) {
    //     if ($current_running_max < $arr[$i]) {
    //         $current_running_max = $arr[$i];
    //         $count++;
    //     }
    // }

    // The same for loop but using a foreach loop
    foreach ($arr as $number) {
        if ($current_running_max < $number) {
            $current_running_max = $number;
            $count++;
        }
    }

    // echo $count . '<br>';

    if ($count % 2 === 0) { // if the $count is 'even', 'ANDY' wins (2nd Player)
        return 'ANDY';
    } else { // if the $count is 'odd', 'BOB' wins (1st Player)
        return 'BOB';
    }
}

// Test Case
// $result = gamingArray([2, 3, 5, 4, 1]);
// $result = gamingArray([5, 2, 6, 3, 4]);
// $result = gamingArray([3, 1]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 50) Forming a Magic Square    // https://www.hackerrank.com/challenges/three-month-preparation-kit-magic-square-forming/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity: 9!, or O(1) if precomputing squares.
function formingMagicSquare($s) {
    // N * N square matrix
    // Editorial says there are TWO solutions/approaches:

    // Editorial First Solution/Approach:
    // https://www.youtube.com/watch?v=FMxA_g9oQnA
    // Since we got different DISTINCT numbers from 0 to 9, then their sum is 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 = 45, then every row sum = every column sum = every diagonal sum = 45 / 3 = 15
    // Difficult! Couldn't find a clear PHP or C++ using this approach!!



    
    // Editorial Second Solution/Approach (Brute Force): Find all possible magic squares somewhere (e.g., via a web search) and hard-code them into your solution. We compute the cost of turning the input square into a particular magic square by summing the cost of changing all its cells into the corresponding cells of the magic square.
    // https://www.google.com/search?q=amount+of+3+by+3+magic+squares&oq=amount+of+3+by+3+magic+squares&aqs=chrome..69i57j33i160j33i22i29i30l4j33i15i22i29i30i625j33i22i29i30i625l3.7040j0j7&sourceid=chrome&ie=UTF-8
    // https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-magic-square-forming/hackers/s_patompong/download_solution
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
                    continue; // skip this loop iteration/cycle
                }

                $sum_of_the_absolute_differences += abs($magic_square_3x3[$i][$j] - $s[$i][$j]);
            }
        }

        $minimum_changes[] = $sum_of_the_absolute_differences;
    }

    // echo '<pre>', var_dump($minimum_changes), '</pre>';
    // echo '<pre>', var_dump(min($minimum_changes)), '</pre>';


    return min($minimum_changes);
    
}

// Test Case
// $result = formingMagicSquare([
//     // [5, 3, 4],                                                                       //  [8, 3, 4],
//     // [1, 5, 8], // We need to correct that square to one of the above Magic Squares:  //  [1, 5, 9],
//     // [6, 4, 2]                                                                        //  [6, 7, 2]

//     [4, 9, 2],                                                                         // [4, 9, 2],
//     [3, 5, 7], // We need to correct that square to one of the above Magic Squares:    // [3, 5, 7],
//     [8, 1, 5]                                                                          // [8, 1, 6]
// ]);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 51) Recursive Digit Sum    // https://www.hackerrank.com/challenges/three-month-preparation-kit-recursive-digit-sum/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity:
function superDigit($n, $k) {
    // Concept: Recursion
    // https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-recursive-digit-sum/hackers/amhasan13/download_solution
    /*
        Note: For example, if $n = 9875 and $k = 4
            Using 'Concatenation $k times (4 times in this example) like, 9875987598759875 = 9 + 8 + 7 + 5 + 9 + 8 + 7 + 5 + 9 + 8 + 7 + 5 + 9 + 8 + 7 + 5 = 116
            is EQUIVALENT to
            using multiplication by $k
            like, 9875 = 9 + 8 + 7 + 5 = 29, 29 * 4 = 116
    */


    /*
    // This solution/approach (using 'concatenation') is correct but show a 'Runtime Error' in HackerRank!

    // echo $n . '<br>';
    // echo strlen($n) . '<br>';

    // Base case / Stopping case / Terminating case (the if condition)
    if (strlen($n) === 1) { // Or this is the same as:    while ($n * $k < 10) {    Or    while (strlen($n) < 10)
        // echo 'Hi<br>';
        return intval($n); // Using intval() function to convert 'string' data type 'number' data type
    }


    $concatenated_number = '';

    for ($i = 0; $i < $k; $i++) {
        $concatenated_number .= $n;
    }

    // echo $concatenated_number . '<br>';

    // echo '<pre>', var_dump(array_sum(str_split($concatenated_number))), '</pre>';

    $result = strval(array_sum(str_split($concatenated_number))); // Using strval() function to convert 'number' data type 'string' data type
    // echo '<pre>', var_dump($result), '</pre>';


    return superDigit($result, 1); // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)
    */


    
    // Another way to go to avoid the 'Runtime Error' in HackerRank!
    /*
    // echo $n . '<br>';
    // echo strlen($n) . '<br>';

    // Base case / Stopping case / Terminating case (the if condition)
    if (strlen($n) === 1) { // Or this is the same as:    while ($n * $k < 10) {    Or    while (strlen($n) < 10)
        // echo 'Hi<br>';
        return intval($n); // Using intval() function to convert 'string' data type 'number' data type    // 'return' keyword stops function execution
    }

    $result = strval(array_sum(str_split($n)) * $k); // Using strval() function to convert 'number' data type 'string' data type
    // $result = array_sum(str_split($n)) * $k; // This would work too because of the 'implicit conversion' (interpreter would implicitly convert 'number' to 'string' (and vice versa))!
    // echo '<pre>', var_dump($result), '</pre>';
    // exit;


    // return superDigit($result, 4);  // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because only the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)    // 'return' keyword stops function execution
    // return superDigit($result, $k); // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because only the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)    // 'return' keyword stops function execution
    return superDigit($result, 1);     // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because ONLY the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)    // 'return' keyword stops function execution
    */



    // Note: Check other solutions using ASCII values of NUMBERS (from 48 to 57) on Youtube and HackerRank!: https://www.rapidtables.com/code/text/ascii-table.html



    // HackerRank's Solution/Approach: https://www.hackerrank.com/challenges/three-month-preparation-kit-recursive-digit-sum/editorial
    // https://www.youtube.com/watch?v=4nKTF6isfUY
    // Idea: If, for example, we have $n = 9875 and $k = 4, using a while loop, we take the modulo of 9875 % 10 = 5 (to always get the last digit (5, then 7, then 8, then 9), and then sum them up to get their sum)
    // Note: This solution fails three test cases in HackerRank which have very long long integers (I tried to use the PHP BCMath library but didn't pass all the test cases)
    /*
        9875 % 10 = 5 ($remainder = 5, and the intval = 987)
        987  % 10 = 7 ($remainder = 7, and the intval = 98)
        98   % 10 = 8 ($remainder = 8, and the intval = 9)
        9    % 10 = 9 ($remainder = 9, and the intval = 0)

        the we sum them up as follows: 5 + 7 + 8 + 9 = 29
    */

    /*
    $sum = 0;
    // $n = array_sum(str_split($n)) * $k;

    while ($n > 0) {
        // Suppose/Let $n = 9875

        // $remainder = $n % 10; // 5, then 7, then 8, then 9
        $remainder = bcmod($n, 10);
        // echo $remainder . '<br>';

        // $sum = $sum + $remainder; // 5, then 12, then 20, then 29
        $sum = bcadd($sum, $remainder);
        // echo $sum . '<br>';

        // $n = intval($n / 10); // 987, then 98, then 9, then 0
        $n = intval(bcdiv($n, 10)); // $n = (int) ($n / 10);
        // $n = (int) bcdiv($n, 10); // $n = (int) ($n / 10);
        // echo $n . '<br>';
    }

    // $n = $sum * $k;
    $n = bcmul($sum , $k);
    // echo $n . '<br>';
    $k = 1; // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because ONLY the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)

    // echo $sum . '<br>';
    if ($sum < 10 && $n < 10) {
        return intval($sum);
    }


    return superDigit($n, $k);
    */


    // A third solution/approach using a Math trick:
    // Note: The recursive digit sum of a number is equal to that number modulo 9: https://www.reddit.com/r/explainlikeimfive/comments/umixwo/eli5_why_is_modulo_9_the_digital_root_of_all/
    // https://en.wikipedia.org/wiki/Digital_root
    // Example: For 9875, 9 + 8 + 7 + 5 = 29, then 2 + 9 = 11, the 1 + 1 = 2. Using modulo 9, also, 9875 % 9 = 2
    // Note: This solution fails three test cases in HackerRank which have very long long integers (I tried to use the PHP BCMath library but didn't pass all the test cases)
    // https://www.youtube.com/watch?v=4nKTF6isfUY


    /*
    // $digit_sum = $n % 9 !== 0 ? $n % 9 : 9;
    if ($n % 9 === 0) { // Because of the Special Case when $number % 9 = 0 (like 18 % 9 = 0, this means that the recursive digit sum is 9), the remainder is zero 0 (which would cause errors in our results), this means the recursive digit sum is 9
        $digit_sum = 9;
    } else { // if $n % 9 !== 0
        $digit_sum = $n % 9;
    }

    // echo $digit_sum . '<br>';


    $n = $digit_sum * $k;
    // echo $n. '<br>';
    $k = 1; // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because ONLY the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)

    // echo $n . '<br>';
    // echo $digit_sum . '<br>';

    if ($digit_sum < 10 && $n < 10) {
        // echo $n . '<br>';
        return $n;
    }

    return superDigit($n, $k);
    */



    // Fourth Solution/Approach using decimal numbers ASCII values:
    // Note: Check other solutions using ASCII values of NUMBERS (from 48 to 57) on Youtube and HackerRank!: https://www.rapidtables.com/code/text/ascii-table.html
    // https://www.youtube.com/watch?v=qrkEkz-qujM


    // echo ord(0) . '<br>';

    $n_length = strlen($n);
    $digit_ascii_values_sum = 0;

    for ($i = 0; $i < $n_length; $i++) {
        // echo ord($n[$i]) . '<br>';
        $digit_ascii_values_sum += ord($n[$i]) - ord(0); // ord (0) is 48 (the ASCII value of zero 0 is 48)
    }

    // echo $digit_ascii_values_sum . '<br>';

    $n = $digit_ascii_values_sum * $k;
    $k = 1; // Note: From the Problem itself, it says: The number p is created by concatenating the string n k times so the initial p = 9875987598759875, so we pass in 1 instead of 4 (or just pass in $k) as the value of $k! (Because ONLY the INITIAL/ORIGINAL/FIRST number is formed this way! (Using $k times)), and after that, operation goes on normally (using 1 time ($k = 1))!    // 'Recursion': the function calls itself again and again till reaching the Base case / Stopping case / Terminating case (the if condition)

    if ($digit_ascii_values_sum < 10 && $n < 10) {
        return $n;
    }


    return superDigit(strval($n), $k);


    // A fifth solution/approach which I don't get!
    // return ((intval($n) * $k) - 1) % 9 + 1;
}

// Test Case
// $result = superDigit('9875', 4); // 8
// $result = superDigit('935', 2); // 7
// $result = superDigit('123', 3); // 9
// $result = superDigit('3546630947312051453014172159647935984478824945973141333062252613718025688716704470547449723886626736', 10000);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 52) Counter game    // https://www.hackerrank.com/challenges/three-month-preparation-kit-counter-game/problem
// Time Complexity: O(N) where N is the length of the input in binary form
function counterGame($n) {
    // Editorial: https://www.hackerrank.com/challenges/three-month-preparation-kit-counter-game/editorial
    // Determine/Check/Find if a number is a power of two using Bitwise AND (Bitwise &) : https://www.geeksforgeeks.org/php-program-to-find-whether-a-no-is-power-of-two/
    // Count set bits in an integer: https://www.geeksforgeeks.org/count-set-bits-in-an-integer/
    // https://www.geeksforgeeks.org/subtract-1-without-arithmetic-operators/
    // Find the highest power of 2 which is less than or equal to the given number: https://www.geeksforgeeks.org/highest-power-2-less-equal-given-number/
    // Note: Bitwise Left Shifting by 1 is equivalent to multiplying by * 2 (Ex:     echo 4 << 1 . '<br>';     is eqivalent to     4 * 2 = 8). Also, Bitwise Right Shifting by 1 is equivalent to division by / 2 (Ex:     echo 4 << 1 . '<br>';     is eqivalent to     4 / 2 = 2). Note: With ODD numbers, Bitwise Right shifting by 1 is equivalent to Integer Division by 2 (Ex:     ech 5 >> 1 . '<br>';     which is equal to     2).
    // The idea of using the Bitwise AND (Bitwise &) to determine/check/find if a number is a power of two:  All power of two numbers have only one bit set (set bit). If we subtract a power of two number by 1, then all the unset bits (0s i.e. zeros) after the only set bit (1 i.e. one) become set; and the set bit (1s i.e. ones) becomes unset (0s i.e. zeros). By subtracting -1, everything is flipped, 0s become 1s, and 1s become 0s.
    /*
        Example 1: The binary representation of the decimal number 8 is 1000 and for the decimal number 7 (which 8 - 1 = 7) is 0111, so 1000 & 0111 = 0000 = zero 0
        Example 2: The binary representation of the decimal number 4 is 100  and for the decimal number 3 (which 4 - 1 = 3) is 011 , so 100  & 011  = 000  = zero 0
    */



    // Note: Subtracting -1 from a decimal number flips all the bits after the rightmost set bit (LSB) (which is 1) including the rightmost set bit itself (converts the LSB one to 0). Example: Decimal 10 is binary 1010. By subtracting -1, decimal 9 is binary 1001 . Check https://www.geeksforgeeks.org/count-set-bits-in-an-integer/#:~:text=2.-,Brian%20Kernighan%E2%80%99s,-Algorithm%3A%C2%A0



    // Finding powers of two numbers using the Left Shift << operator: (by left shifting the one number (1) by the value of a power which is equal to 2 ** power i.e.    echo 1 << 5 . '<br>'    is equal to    echo 2 ** 5 . '<br>';    ): https://www.geeksforgeeks.org/left-shift-right-shift-operators-c-cpp/
    // Left Shifting the one number (1) by the value of another number is equal to two 2 raised to the power of that number (power) i.e. raising two 2 to some power is equal to left shifting One by that power). Example:     echo (1 << 5) . '<br>';    is equivalent to     echo 2 ** 5 . '<br>'; // 32
    // echo (1 << 0) . '<br>'; // 1        = 2 ** 0
    // echo (1 << 1) . '<br>'; // 2        = 2 ** 1
    // echo (1 << 2) . '<br>'; // 4        = 2 ** 2
    // echo (1 << 3) . '<br>'; // 8        = 2 ** 3
    // echo (1 << 4) . '<br>'; // 16       = 2 ** 4
    // echo (1 << 5) . '<br>'; // 32       = 2 ** 5
    // echo (1 << 6) . '<br>'; // 64       = 2 ** 6
    // echo (1 << 7) . '<br>'; // 128      = 2 ** 7
    // echo (1 << 8) . '<br>'; // 256      = 2 ** 8
    // echo (1 << 9) . '<br>'; // 512      = 2 ** 9
    // echo (1 << 10) . '<br>'; // 1024    = 2 ** 10



    // echo decbin(8) . '<br>'; 1000
    // echo decbin(7) . '<br>'; 0111

    // Testing
    // $x = 8; // 8 is a power of two
    // echo '<pre>', var_dump($x & $x - 1), '</pre>'; // Works! But doesn't work like this inside the if condition!!!
    // echo '<pre>', var_dump($x & ($x - 1)), '</pre>'; // Works! But doesn't work like this inside the if condition!!!

    // echo '<pre>', var_dump($x & $x - 1 === 0), '</pre>'; // Doesn't work!!!    // This expression MUST returns a Boolean (true or false), but it doesn't!
    // echo '<pre>', var_dump(($x & $x - 1) === 0), '</pre>'; // Works!!!    // This expression returns a Boolean (true or false)
    
    // if ($x & $x - 1 === 0) { // Doesn't Work like this inside the if condition! You have to enclose the expression in curly braces!
    // if ($x & ($x - 1) === 0) { // Doesn't Work like this inside the if condition! You have to enclose the expression in curly braces!
    // if (($x & $x - 1) === 0) {      // Only works this way inside the if condition!    Or like this:    if (($x & ($x - 1)) === 0) {    //  You have to enclose the expression in curly braces!
    // if (($x & ($x - 1)) === 0) { // Only works this way inside the if condition!    Or like this:    if (($x & $x - 1) === 0) {      //  You have to enclose the expression in curly braces!
    //     echo 'The number is a Power of Two<br>';
    // } else {
    //     echo 'The number is NOT a Power of Two<br>';
    // }



    // Create a power of two numbers array in TWO ways (from power 0 to power 64 i.e. from 2**0 till 2**64):    // Problem Constraints: 1 <= n <= 2^64 - 1
    // First way of creating a power of two numbers array:
    $power_of_two_numbers = [];
    for ($i = 0; $i <= 64; $i++) { // $i denotes the powers themselves from 0 to 64    // Problem Constraints: 1 <= n <= 2^64 - 1
        // echo $i . '<br>';
        // echo $i ** 2 . '<br>';
        $power_of_two_numbers[] = 2 ** $i;
    }

    // Second way of creating a power of two numbers array:
    /*
    $power_of_two_numbers = [2]; // the zeroth 0th element is 2

    for($i = 1; $i <= 64; $i++) {
        $power_of_two_numbers[] = $power_of_two_numbers[$i - 1] * 2;
    }
    */

    // echo '<pre>', var_dump($power_of_two_numbers), '</pre>';


    $switching_who_is_winner_first_or_second_player = 'second player'; // switch/alternate the winner player INSIDE the while loop    // Note: We start with initializing the variable with 'second player', so that in the first while loop iteration/cycle the winning player will be reversed from the 'second player' to the 'first player' (i.e. in the first while loop iteration/cycle, the 'first player' is the winning player)


    if ($n === 1) { // if 1 (the terminating condition of the problem) is already reached from the beginning, the 2nd Player wins! (because 1 is not a power of two, so the 1st Player can't do anything about it, and then passes it to the 2nd Player)
        return 'Richard';

    } else { // if the number is anything other than 1

        // We reduce $n to 1 while keeping switching/alternating the winning player at the last line of code with every iteration/cycle of the while loop
        while ($n > 1) { // Or it's the same as:    while ($n !== 1) {    // while the number is anything other than 1 (Problem Constraints: 1 <= n <= 2^64 - 1), right shift it by 1 (or divide it by 2) till it reduces to 1
            if (($n & $n - 1) === 0) { // if the number is a power of two (if the number, from the beginning of playing, is a power of two), reduce it to 1 (keep reducing it till it reaches 1) by keeping dividing it by 2 or Right Shifting it by 1
                // $n /= 2; // is the same as:    $n >>= 1;    Or    $n = $n >> 1;    // Note: Bitwise Right Shifting by 1 is equivalent to division by / 2
                $n >>= 1; // is the same as:    $n = $n >> 1;    // Note: Bitwise Right Shifting by 1 is equivalent to division by / 2
                // $n = $n >> 1; // is the same as:    $n >>= 1;    // Note: Bitwise Right Shifting by 1 is equivalent to division by / 2
                // echo $n . '<br>';
            } else { // if the number is NOT a power of two, we subtract a value from it till it reaches the previous lower power of two number, then the previous condition ( if (($n & $n - 1) === 0) { ), in turn, continues to keep reducing it to 1. And while doing that, we, in the next line of code, keep switching/alternating the winning player
                // Find the highest power of 2 which is less than or equal to the given number: https://www.geeksforgeeks.org/highest-power-2-less-equal-given-number/
                for ($i = 0; $i <= 64; $i++) { // Problem Constraints: 1 <= n <= 2^64 - 1
                    if ($n > $power_of_two_numbers[$i] && $n < $power_of_two_numbers[$i + 1]) { // Example: If $n = 132, then $n is > 128 (which is 2**7) and $n is < 256 (which is 2**8)
                        $lower_power_of_two_number = $power_of_two_numbers[$i];
                        $n -= $lower_power_of_two_number; // $n = $n - $lower_power_of_two_number;
                    }
                }
            }

            // echo $n . '<br>';

            // Note: We're still INSIDE the while loop!!
            // We keep switching/alternating the winning player with every while loop iteration:
            // Note: Note that $switching_who_is_winner_first_or_second_player variable has an initial value of 'second player' (which, at the first loop iteration, will be reversed to be the 'first player' to win at the first loop iteraion)
            $switching_who_is_winner_first_or_second_player = $switching_who_is_winner_first_or_second_player === 'second player' ? 'first player' : 'second player'; // Reverse the winning player with every loop iteration/cycle
            // echo $switching_who_is_winner_first_or_second_player . '<br>';

            // This way using $winner variable DOESN'T WORK! (because this way, every loop iteration/cycle, we check if the winner player is 'second player', and actually it will be like this for good! (forever!), because this way, we never change the value of $switching_who_is_winner_first_or_second_player variable):
            // $winner = $switching_who_is_winner_first_or_second_player === 'second player' ? 'first player' : 'second player'; // Reverse the winning player with every loop iteration/cycle
            // // echo $winner . '<br>';
        }

    }


    return $switching_who_is_winner_first_or_second_player === 'first player' ? 'Louise' : 'Richard';
    // return $winner === 'first player' ? 'Louise' : 'Richard'; // Doesn't work!



    /*
    // Second Solution/Approach (The Alternate Solution of HackerRank's Editorial): https://www.hackerrank.com/challenges/three-month-preparation-kit-counter-game/editorial#:~:text=%25%202%5D-,Alternate%20Solution,-In%20the%20Discussions
    // https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-counter-game/hackers/createallbymyse1/download_solution
    // Subtract 1 without arithmetic operators: https://www.geeksforgeeks.org/subtract-1-without-arithmetic-operators/#:~:text=6%0AOutput%3A%205-,Method%201,-To%20subtract%201
    $convert_n_number_minus_one_to_binary = decbin($n - 1); // 1111010
    // echo '<pre>', var_dump($convert_n_number_minus_one_to_binary), '</pre>';

    $number_of_ones_in_the_binary_n_number_minus_one = substr_count($convert_n_number_minus_one_to_binary, '1'); // 5    // Get the number of 1s in $convert_n_number_minus_one_to_binary
    // echo '<pre>', var_dump($number_of_ones_in_the_binary_n_number_minus_one), '</pre>';

    if ($number_of_ones_in_the_binary_n_number_minus_one % 2 === 0) { // if the number of 1s in $n - 1 is 'even', the 2nd Player reaches 1 first and wins
        return 'Richard';
    } else { // if the number of 1s in $n - 1 is 'odd', the 1st Player reaches 1 second and wins
        return 'Louise';
    }
    */
}

// Test Case
// $result = counterGame(123); // 123 is not a power of two
// $result = counterGame(128); // 128 is NOT a power of two
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 53) Sum vs XOR    // https://www.hackerrank.com/challenges/three-month-preparation-kit-sum-vs-xor/problem?isFullScreen=true&h_l=interview&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
// Time Complexity: O(nlogn)
function sumXor($n) {
    // Note: The XOR operation (Exclusive Or / Bitwise ^ XOR operator) is equivalent to adding two bits, ignoring the carry. XOR behaves exactly like addition except in one case when A = 1 and B = 1. Check https://www.hackerrank.com/challenges/three-month-preparation-kit-sum-vs-xor/editorial?filter=php&filter_on=language&h_l=interview&isFullScreen=true&page=1&playlist_slugs%5B%5D=preparation-kits&playlist_slugs%5B%5D=three-month-preparation-kit&playlist_slugs%5B%5D=three-month-week-six
    // Note:  x + y = x ^ y + (x & y) * 2    i.e.    (n+i)=(n^i)+(n&i)*2    . Note: Remember that multiplying by 2 is bitwise Left Shifting by 1 (    echo 5 * 2 . '<br>';    is equivalent to    echo 5 << 1 . '<br>';    )
    // https://www.geeksforgeeks.org/equal-sum-xor/    // https://www.geeksforgeeks.org/find-two-numbers-sum-xor/    // https://www.youtube.com/watch?v=zhu605v9KOI    // https://www.geeksforgeeks.org/find-two-numbers-from-their-sum-and-xor-set-2/    // https://stackoverflow.com/questions/36477623/given-an-xor-and-sum-of-two-numbers-how-to-find-the-number-of-pairs-that-satisf
    // Note (Left and Right Shift Operators):     x << y = x * (2 ** y)     ,     x >> y = x / (2 ** y)     , that's why,     1 << y = (2 ** y)     and     1 >> y = 1 / (2 ** y)    // https://www.geeksforgeeks.org/left-shift-right-shift-operators-c-cpp/


    /*
    // First Solution/Approach (Doesn't pass all test cases due to Bad Performance): https://www.geeksforgeeks.org/equal-sum-xor/#:~:text=Submission%20count%3A%205.5K-,Method%201%20(Simple)%20%3A,-One%20simple%20solution
    $count = 0;

    for ($x = 0; $x < $n; $x++) {
        if (($n + $x) == ($n ^ $x)) {
            $count++;
        }
    }


    return $count;
    */



    // Second Solution/Approach: https://www.youtube.com/watch?v=zhu605v9KOI    // https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-sum-vs-xor/hackers/createallbymyse1/download_solution
    /* Explanation: Since    x + y = x ^ y + (x & y) * 2    i.e.    (n+i)=(n^i)+2*(n&i)    . Note: Remember that multiplying by 2 is bitwise Left Shifting by 1 (    echo 5 * 2 . '<br>';    is equivalent to    echo 5 << 1 . '<br>';    )
        We need to get the cases wheere (x & y) = 0, so the whole expression     (x & y) * 2 = 0, then    x + y = x & y
        And in order for (x & y) to be equal to zero 0, if ith bit in $n is 1 (the Set bit), the ith bit in in x must be 0 (because 1 & 0 = 0, but 1 & 1 = 1 (not 0)). And if the ith bit in $n is 0 (the Unset bit), the ith bit in $x can be either 0 or 1 (two probabilities) (because 0 & 0 = 0 and 0 & 1 = 0).
        So the solution is to count the number of the Unset bits (the zeros 0s) in the binary $n, and calculate the number of probabilities statistically as follows: the count of combinations = number of probabilites (zero and one i.e because there are TWO probabilites) ** number of Unset bits (zeros 0) in $n i.e. number of probabilites raised to the power of number of the Unset bits (zeros 0s) in binary $n

        Example:
        Suppose $n = 4 (decimal 4 is binary 100)
        All possible combinations (4 combinations) available where $n & $x = 0 are: (Remember from the Problem Constraints: 0 <= $x <= $n, so supposing $n = 4, we AND $n with 4, 3, 2, 1 and 0)
        Note: the leftmost bit in binary $x MUST be 0, it can never be 1! (because 1 & 1 = 1)
        100 & 000 = 000 = 0     // 4 & 0 = 0
        100 & 001 = 000 = 0     // 4 & 1 = 0
        100 & 010 = 000 = 0     // 4 & 2 = 0
        100 & 011 = 000 = 0     // 4 & 3 = 0
        100 & 100 = 100 = 4     // 4 & 3 = 1 (!Wrong combination! Not a possible combination! Because the leftmost bit in binary $x MUST be 0, it can never be 1! (because the rightmost bit in binary $x is 1, and 1 & 1 = 1 (not 0)))
        
        So, we got 4 combinations where $n & $x = 0

        Summing everything up, to get all the possible combinations where $n & $x = 0, note that if the ith bit in binary $n is 1, the ith bit in binary $x MUST be 0, but if the ith bit in binary $n is 0, we have two probabilites for the value of the ith bit in binary $x, 0 or 1, so the solution is: number of cases where    $n & $x = 0    = number of probabilities (the ith bit in $x can be 0 or 1. That's TWO probabilities) ** (raised to the power of) count of the unset bits in binary $n
    */

    $unset_bits_count = 0;

    // echo $n >> 1 . '<br>'; // Decimal 4 is binary 100
    // echo $n >> 2 . '<br>'; // Decimal 4 is binary 100
    // echo $n >> 3 . '<br>'; // Decimal 4 is binary 100
    // echo $n >> 4 . '<br>'; // Decimal 4 is binary 100
    // echo decbin(0.5) . '<br>'; // Decimal 4 is binary 100


    // Count the Set bits (ones 1s) in a number: https://www.geeksforgeeks.org/count-set-bits-in-an-integer/
    // Count the Unset bits in a range: https://www.geeksforgeeks.org/count-unset-bits-range/


    // Count the Unset Bits (zeros 0s) in a number ($n): https://www.geeksforgeeks.org/count-unset-bits-number/
    /*
        Example:
                We keep checking the rightmost bit of $n by AND-ing it with one (& 1) ($n & 001), and Right Shift it by 1 every loop iteration/cycle to get rid of the already checked bit:
                Supposing $n = 4 (decimal). It's 100 in binary
                1st loop iteration/cylce: 100 & 001 = 000 = 0
                Right Shift $n by 1 to check another $n rightmost bit with 001 (Right Shifting of 100 is 010)
                2nd loop iteration/cylce: 010 & 001 = 000 = 0
                Right Shift $n by 1 to check another $n rightmost bit with 001 (Right Shifting of 010 is 001)
                3rd loop iteration/cylce: 001 & 001 = 001 = 1 (Doesn't satisfy our if condition down there!)
                Right Shift $n by 1 to check another $n rightmost bit with 001 (Right Shifting of 001 is 000), but then we reach the terminating case of the while loop i.e. $n > 0, then the loop stops/ends
    */
    // while ($n) { // the same as:    while ($n > 0) {    // Problem Constraints: 0 <= x <= n
    //     // We check every rightmost bit in the binary $n and compare it with & 001, and we keep shifting (Right Shifting >>) the bits to the right (to get rid of the checked bit) with every loop iteration/cycle to check all the rightmost bits (with every loop cycle/iteration):

    //     // echo $n . '<br>';
    //     echo '<pre>', var_dump($n & 1), '</pre>'; // Decimal 4 is binary 100

    //     if (($n & 1) == 0) { // 100 & 001 = 000 = 0, then 010 & 001 = 000 = 0, then 001 & 001 = 001 = 1, then 000 & 001 = 000 = 0
    //         $unset_bits_count++;
    //         // echo $unset_bits_count . '<br>';
    //     }

    //     // We shift the binary number 1 time to right till we reach 0:
    //     $n >>= 1; // the same as: $n = $n >> 1;    // Bitwise Right Shifting by 1 is equivalent to division by 2    // 100 (decimal 4), then 010 (decimal 2), then 001 (decimal 1), then 000 (decimal 0)

    //     // echo $n . '<br>';
    // }


    // Another way to go: The same thing (Count the Unset bits (zeros 0s) in a number) using a for loop:
    /*
        We keep checking every rightmost bit of $n by AND-ing it with one (& 1) ($n & 001), and then we right shift $n by 1 every loop iteration/cycle to check the new $n rightmost bit and get rid of the already checked rightmost bit, ...:
        Decimal 4 is Binary 100.
        1st loop iteration: 100 & 001 = 000 = 0
        Right Shifting of 100 is 010
        2nd loop iteration: 010 & 001 = 000 = 0
        Right Shifting of 010 is 001
        3rd loop iteration: 001 & 001 = 001 = 1 (Doesn't satisfy the if condition!)
        Right Shifting of 001 is 000, but 000 is decimal 0, and since we have the loop condition: $x > 0, the loop ends/stops!
        Therfore, we have two zeros (two unset bits in binary $n)
    */
    // for ($x = $n; $x > 0; $x >>= 1) { // $x >>= 1    is the same as    $x = $x >> 1    is the same as    $x /= 2;    is the same as    $x = $x / 2;    // Right Shifting by 1 with every loop iteration/cycle (Note: Right Shifting by 1 is equivalent to division by 2)    // $x holds one set digit (one one 1) at a time, starting from LSB (rightmost bit whether 0 or 1) to MSB (leftmost bit whether 0 or 1) of $n
    //     // echo $x . '<br>';

    //     if (($x & 1) == 0) {
    //         $unset_bits_count++;
    //         // echo $unset_bits_count . '<br>';
    //     }
    // }


    // Another way to go for the for loop:
    /*
        We keep checking every bit from the rightmost bit to the leftmost bit of $n by starting with AND-ing it with one (& 1) ($n & 001), and then we left shift the one 001 (to 010, then 100, ...) to check every bit of $n with every loop iteration/cycle, ...:
        Decimal 4 is Binary 100
        1st loop iteration: 100 & 001 = 000 = 0
        Left Shifting of the one 001 is 010
        2nd loop iteration: 100 & 010 = 000 = 0
        Left Shifting of the two (that previously was one) 010 is 100
        100 is the same as $n (100), and since we have the loop condition: $x < $n, the loop ends (Anyway, $n & $n = $n    $x = $n in this loop iteration)
        We have two zeros
    */
    // for ($x = 1; $x < $n; $x <<= 1) { // $x <<= 1    is the same as    $x = $x << 1    // Left Shifting by 1 with every loop iteration/cycle (Note: Left Shifting by 1 is equivalent to multiplying by * 2)    // $x holds one set digit (one one 1) at a time, starting from LSB (rightmost bit whether 0 or 1) to MSB (leftmost bit whether 0 or 1) of $n
    //     echo $x . '<br>';

    //     if (($n & $x) == 0) {
    //         $unset_bits_count++;
    //         echo $unset_bits_count . '<br>';
    //     }
    // }



    // Another way to count the Unset Bits in a number using modulo operation (modulus operator %): https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-sum-vs-xor/hackers/s_patompong/download_solution
    /* Note: For 'even' numbers, the rightmost bit in their binary representation must be 0, whereas for 'odd' numbers, the rightmost bit in their binary representation must be 1    // https://www.google.com/search?q=odd+and+even+numbers+in+binary&oq=odd+and+even+numbers+in+binary&aqs=chrome..69i57j0i390l2.3703j1j7&sourceid=chrome&ie=UTF-8
        Examples:
                    Decimal 1 (odd)  = Binary 001 ('odd'  number, so rightmost bit must 1)
                    Decimal 2 (even) = Binary 010 ('even' number, so rightmost bit must 0)
                    Decimal 3 (odd)  = Binary 011 ('odd'  number, so rightmost bit must 1)
                    Decimal 4 (even) = Binary 100 ('even' number, so rightmost bit must 0)
    */

    // Note: We keep checking the rightmost bit (if it's a 0) and keep Right Shifting by 1 to get rid of (with every loop iteration/cycle) the already checked rightmost bit, using a while loop
    // if the number is 'even', this means the rightmost bit is 0
    // We keep checking if the number is 'even' i.e. we keep checking if the rightmost bit is 0. And then, we get rid of the already checked rightmost bit by Right Shifting by 1, and check the new rightmost bit, ...
    /*
        Example:
                Supposing $n = 4
                4 % 2 = 0, then Right Shift 4 by 1 i.e. 4 >> 1 = 2 (2 is binary 010)
                2 % 2 = 0
                then Right Shift 2 by 1 i.e. 2 >> 1 = 1 (1 is binary 001), we reach the terminating case, since the while loop has the condition $n > 1
                We got two zeros 0s (two unset bits in 4)
    */
    while ($n > 1) {
        if ($n % 2 == 0) { // if $n is 'even', the rightmost bit is 0
            $unset_bits_count ++;
            // echo $unset_bits_count . '<br>';
        }

        // We keep Right Shifting $n with every loop iteration/cycle:
        $n >>= 1; // is thea same as:    $n = $n >> 1;    is the same as:    $n /= 2;    is the same as:    $n = $n / 2;    // Note: Right Shifting by 1 is equivalent to division by 2
        // $n /= 2;  // is thea same as:    $n = $n >> 1;    is the same as:    $n /= 2;    is the same as:    $n = $n / 2;    // Note: Right Shifting by 1 is equivalent to division by 2
    }


    /*
    // Another way to count the unset bits in a number by converting $n to a binary string: https://www.hackerrank.com/rest/contests/master/challenges/three-month-preparation-kit-sum-vs-xor/hackers/i_o_sotnikov/download_solution
    if ($n == 0) {
        return 1;
    }

    $binary_n_string = decbin($n);
    $binary_n_string_length = strlen($binary_n_string);
    
    for ($i = 0; $i < $binary_n_string_length; $i++) {
        if ($binary_n_string[$i] === '0') {
            $unset_bits_count++;
            // echo $unset_bits_count . '<br>';
        }
    }
    */


    return 1 << $unset_bits_count;       // is the same as:    return 2 ** $unset_bits_count;    is the same as:    return pow(2, $unset_bits_count);    // Left Shifting the one number (1) by the value of another number is equal to two 2 raised to the power of that number (power) i.e. raising two 2 to some power is equal to left shifting One by that power). Example:     echo (1 << 5) . '<br>';    is equivalent to     echo 2 ** 5 . '<br>'; // 32
    // return 2 ** $unset_bits_count;    // is the same as:    return 1 << $unset_bits_count;    is the same as:    return pow(2, $unset_bits_count);    // Left Shifting the one number (1) by the value of another number is equal to two 2 raised to the power of that number (power) i.e. raising two 2 to some power is equal to left shifting One by that power). Example:     echo (1 << 5) . '<br>';    is equivalent to     echo 2 ** 5 . '<br>'; // 32
    // return pow(2, $unset_bits_count); // is the same as:    return 1 << $unset_bits_count;    is the same as:    return pow(2, $unset_bits_count);    // Left Shifting the one number (1) by the value of another number is equal to two 2 raised to the power of that number (power) i.e. raising two 2 to some power is equal to left shifting One by that power). Example:     echo (1 << 5) . '<br>';    is equivalent to     echo 2 ** 5 . '<br>'; // 32
}

// Test Case
// $result = sumXor(4); // the decimal 4 is 100 in Binary
// $result = sumXor(0);
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

// 54) Palindrome Index (Mock Test)    // https://www.hackerrank.com/challenges/palindrome-index/problem
// Time Complexity: O(N)
function palindromeIndex($s) {
    // https://www.youtube.com/watch?v=U_5l038GR5I
    // https://www.hackerrank.com/rest/contests/master/challenges/palindrome-index/hackers/belushkin/download_solution
    $palindrome_index = -1; // We start with supposing that $s is already a palindrome ($palindrome_index = -1;), so we return -1. We check inside the for loop using an if condition if $s is not a palindrome, if so, we change the $palindrome_index value to the correct index
    $s_length            = strlen($s);
    $s_last_index        = $s_length - 1;
    $s_half_length_index = $s_length / 2;

    for ($i = 0; $i < $s_half_length_index; $i++) {
        if ($s[$i] != $s[$s_last_index - $i]) { // compare the beginning of the string with its end with every loop iteration/cycle (if the two letters are not similar)
            // echo 'Yes<br>';
            // echo $i . '<br>';


            /*
                Example: $s = 'bcbc' (We have TWO solution: (Problem said we can return 1 solution only!), we remove the first 'b' in order for the string to become 'cbc', or we remove the last 'c' in order for the string to become 'bcb')
                The first 'b' is not like the last 'c'
                So we have TWO ways to check: check the 'b' against the letter before the last 'c' (which is the 'b' before the 'c') and check the next letter after the 'b' against the letter before the 'b' (i.e. c), and if they aren't the same, then the other way is (the else if condition), we check the letter after the firt 'b' (which is the 'c' after the first 'b') against the last letter 'b' and check the letter after the 'c' against the letter before the 'b' (i.e. the 'b')

            */
            if ($s[$i] == $s[$s_last_index - $i - 1] && $s[$i + 1] == $s[$s_last_index - $i - 2]) { // check the current letter against the next-to-last letter, and check the letter after the current letter against the letter before the next-to-last letter
                // echo 'Inside the first if condition<br>';
                $palindrome_index = $s_last_index - $i;
                break; // Get out of the loop
            } else if ($s[$i + 1] == $s[$s_last_index - $i] && $s[$i + 2] == $s[$s_last_index - $i - 1]) { // check the letter after the current letter against the last letter, and check the letter after the letter which is after the current letter against the letter before the last letter
                // echo 'Inside the second if condition (the else if)<br>';
                $palindrome_index = $i;
                break; // Get out of the loop
            }

        }
    }


    return $palindrome_index;
}

// Test Case
// $result = palindromeIndex('bcbc');
// $result = palindromeIndex('quyjjdcgsvvsgcdjjyq');
// echo '<pre>', var_dump($result), '</pre>';

/*********************************************************************************************************************************************/

/*********************************************************************************************************************************************/


//  DON'T FORGET THE MOCK TESTS!!