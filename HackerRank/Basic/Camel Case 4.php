<?php
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

        } else if ($line[2] == 'C') {
            $processed_line = substr(trim($line), 4);
            $processed_line = lcfirst($processed_line);
            for ($letter = 0; $letter < strlen($processed_line); $letter++) {

                if (ctype_upper($processed_line[$letter]) == true) {

                    $processed_line = str_replace($processed_line[$letter], ' ' . strtolower($processed_line[$letter]), $processed_line);
                }
            }

            echo $processed_line . "\n";

        } else if ($line[2] == 'V') {
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

        } else if ($line[2] == 'C') {
            $processed_line = substr(trim($line), 4);
            $processed_line = ucwords($processed_line);
            $processed_line = str_replace(' ', '', $processed_line);
            echo $processed_line . "\n";

        } else if ($line[2] == 'V') {
            $processed_line = substr(trim($line), 4);
            $processed_line = ucwords($processed_line);
            $processed_line = lcfirst($processed_line);
            $processed_line = str_replace(' ', '', $processed_line);

            echo $processed_line . "\n";
        }
    }

}

fclose($_fp);