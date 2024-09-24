<?php

// 1) Contains Duplicate
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function containsDuplicate($nums): bool {
    $setOrHashSetArray = [];

    foreach ($nums as $number) {
        if (isset($setOrHashSetArray[$number])) { // Making use of the fast O(1) Time Complexity access/lookup operation of the PHP associatve array (by using $number as an associative array index/key)
            return true;
        }

        // We fill in the $setOrHashSetArray by using $number as an "associative array index/key" to make use of the fast O(1) access/lookup operation Time Complexity of PHP associative arrays
        $setOrHashSetArray[$number] = true;
    }

    return false;
}

/*********************************************************************************************************************************************/

// 2) 242. Valid Anagram

/**
 * @param String $s
 * @param String $t
 * @return Boolean
 */
function isAnagram($s, $t): bool {
    // Check if the two strings have the same length
    if (strlen($s) != strlen($t)) {
        return false;
    }

    $englishAlphabetFrequencyArray = array_fill(0, 26, 0);
    $sLength = strlen($s);
    $firstLowercaseLetterOfEnglishAlphabetAscii = ord('a'); // 97

    
    for ($i = 0; $i < $sLength; $i++) {
        $englishAlphabetFrequencyArray[ord($s[$i]) - $firstLowercaseLetterOfEnglishAlphabetAscii]++;
        $englishAlphabetFrequencyArray[ord($t[$i]) - $firstLowercaseLetterOfEnglishAlphabetAscii]--;
    }

    // In case the two strings are anagrams of each other, ALL the frequency array values must be 0 ZEROs, and if they're not, negative -ve values would occur
    foreach ($englishAlphabetFrequencyArray as $letterFrequency) {
        if ($letterFrequency != 0) {
            return false;
        }
    }


    return true;
}

/*********************************************************************************************************************************************/

// 3) 1. Two Sum   // https://leetcode.com/problems/two-sum/

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target) {
    // Create a hash table (associative array) to store each element's value and its index
    $numsArrayIndicesHashTableArray = [];

    // One pass (one loop): check if each element's complement exists in the hash table
    foreach ($nums as $numIndex => $num) {
        $numComplement = $target - $num;

        if (isset($numsArrayIndicesHashTableArray[$numComplement])) { // In the One-pass Hash Table approach, we don't need to check if the complement is not the same element as the current element because we're checking the complement after we've stored the current element in the hash table (i.e., we first check if the complement exists in the hash table before storing the current number. If the complement is found, it means that the complement was stored in a previous iteration.)
            return [$numsArrayIndicesHashTableArray[$numComplement], $numIndex]; // return the indices pair array, STOP looping and Exit the function
        }
    
        $numsArrayIndicesHashTableArray[$num] = $numIndex; // Store each element's value (as 'array key') and its index (as 'array value') in the hash table
    }


    return [];
}

/*********************************************************************************************************************************************/
