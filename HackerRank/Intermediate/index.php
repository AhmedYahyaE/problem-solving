<?php

function flippingMatrix($matrix) {
    $array_length      = count($matrix);    
    $half_array_length = $array_length / 2; 
    $last_array_index  = $array_length - 1; 
    $sum = 0;

    for ($row = 0; $row < $half_array_length; $row++) { 
        
        for ($column = 0; $column < $half_array_length; $column++) {
            $sum += max(
                $matrix[$row][$column],                                        
                $matrix[$row][$last_array_index - $column],                    
                $matrix[$last_array_index - $row][$column],                    
                $matrix[$last_array_index - $row][$last_array_index - $column] 
            );
        }
    }


    return $sum;
}



$result = flippingMatrix([
    [112, 42 , 83 , 119],
    [56 , 125, 56 , 49 ],
    [15 , 78 , 101, 43 ],
    [62 , 98 , 114, 108]
]);


/**********************************************************************************************************************************************/


