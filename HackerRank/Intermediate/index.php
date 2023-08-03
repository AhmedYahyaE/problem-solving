<?php
// 1) Flipping the Matrix (Mock Test)    // https://www.hackerrank.com/test/flgjjnhfm7i/questions/di1dm3kpigj
// Time Complexity: O(n^2) - Greedy - Constructive Algorithm
function flippingMatrix($matrix) {
    // This is an N * N (N by N) square matrix array (a matrix having the same number of rows as columns). The key word here is 'flipping', this is, 'reversing' or 'mirroring' rows and columns as follows:
    // CHECK MY SCREENSHOT IMAGE IN THIS FOLDER EXPLAINING THE PROBLEM!!
    /*
    // Example for a  4 * 4 matrix
        columns:       [0][1][2][3]

        rows:   [0]    [A, B, B, A],
                [1]    [C, D, D, C],
                [2]    [C, D, D, C],
                [3]    [A, B, B, A]
    */

    // https://www.youtube.com/watch?v=4rin1enhuQQ
    // https://www.hackerrank.com/challenges/flipping-the-matrix/editorial
    // https://medium.com/@mlgerardvla/hackerrank-flipping-the-matrix-javascript-7f945220ca1b
    // https://github.com/sonmez-hakan/HackerRank/blob/master/Algorithms/Constructive%20Algorithms/flipping-the-matrix.php
    // Pseudocode: 


    // echo '<pre>', var_dump($matrix), '</pre>';

    /*
    $each_array_size   = count($matrix[0]); // is the same as:    $each_array_sizes = count($matrix[1]);
    $matrix_array_size = count($matrix);
    // echo $each_array_size   . '<br>';
    // echo $matrix_array_size . '<br>';

    
    // This foreach loop is the same as the next for loop
    // foreach ($matrix as $key => $array) {
    //     rsort($matrix[$key]);
    // }
    // echo '<pre>', var_dump($matrix), '</pre>';
    
    

    // This for loop is similar to the previous foreach loop
    for ($i = 0; $i < $each_array_size; $i++) {
        rsort($matrix[$i]);
    }
    // echo '<pre>', var_dump($matrix), '</pre>';


    $quadrantSize = (($each_array_size * $matrix_array_size) / 4) / (0.5 * (($each_array_size * $matrix_array_size) / 4));
    // echo $quadrantSize . '<br>';
    $sum = 0;

    for ($i = 0; $i < $quadrantSize; $i++) {
        // echo $i . '<br>';
        for ($j = 0; $j < $quadrantSize; $j++) {
            // echo $j . '<br>';
            echo $matrix[$i][$j] . '<br>';
            $sum += $matrix[$i][$j]; // is the same as:    $sum = $sum + $matrix[0][$i];
        }
    }

    // echo $sum . '<br>';
    */


    $array_length      = count($matrix);    // is the same as:    $array_length = count($matrix[0]);    or    $array_length = count($matrix[1]);    or     $array_length = count($matrix[02]);    , ...
    $half_array_length = $array_length / 2; // is the same as:    $array_length = count($matrix[0]) / 2;    or    $array_length = count($matrix[1]) / 2;    or     $array_length = count($matrix[2]) / 2;    , ...
    $last_array_index  = $array_length - 1; // General Rule: array index/key = array length/size - 1
    $sum = 0;

    for ($row = 0; $row < $half_array_length; $row++) { // for every row in the matrix, check columns
        // echo $row . '<br>';
        for ($column = 0; $column < $half_array_length; $column++) {
            $sum += max(
                $matrix[$row][$column],                                        // Example (for a  4 * 4 matrix, $row = 0, $column = 0): $matrix[0][0]
                $matrix[$row][$last_array_index - $column],                    // Example (for a  4 * 4 matrix, $row = 0, $column = 0): $matrix[0][3]
                $matrix[$last_array_index - $row][$column],                    // Example (for a  4 * 4 matrix, $row = 0, $column = 0): $matrix[3][0]
                $matrix[$last_array_index - $row][$last_array_index - $column] // Example (for a  4 * 4 matrix, $row = 0, $column = 0): $matrix[3][3]
            );
        }
    }

    // echo $sum . '<br>';


    return $sum;
}

// Test Case
// $result = flippingMatrix([
//     [1, 2],
//     [3, 4]
// ]);
$result = flippingMatrix([
    [112, 42 , 83 , 119],
    [56 , 125, 56 , 49 ],
    [15 , 78 , 101, 43 ],
    [62 , 98 , 114, 108]
]);
// echo '<pre>', var_dump($result), '</pre>';

/**********************************************************************************************************************************************/

// 2)


// Test Case

/**********************************************************************************************************************************************/
