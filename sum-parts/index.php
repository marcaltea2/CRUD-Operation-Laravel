<?php

function part_sums($ls) {
    // Initialize an array to store the sums of parts.
    $sums = array();
    
    // Initialize a variable to keep track of the current sum.
    $currentSum = 0;

    // Iterate through the input array in reverse order.
    foreach (array_reverse($ls) as $value) {
        // Add the current value to the current sum.
        $currentSum += $value;
        
        // Store the current sum in the array of sums.
        $sums[] = $currentSum;
    }

    // Reverse the sums array to match the desired order.
    $sums = array_reverse($sums);
    
    // Add 0 to the end of the sums array to represent the sum of an empty list.
    $sums[] = 0;

    // Return the array of sums of parts.
    return $sums;
}

// Given Example
$ls = [1, 2, 3, 4, 5, 6];
$result = part_sums($ls);
print_r($result); // [21, 20, 18, 15, 11, 6, 0]

$ls = [744125, 935, 407, 454, 430, 90, 144, 6710213, 889, 810, 2579358];
$result = part_sums($ls);
print_r($result);
// [10037855, 9293730, 9292795, 9292388, 9291934, 9291504, 9291414, 9291270, 2581057, 2580168, 2579358, 0]

?>
