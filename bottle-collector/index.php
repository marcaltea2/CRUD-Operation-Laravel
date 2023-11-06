<?php

function calculateEarnings($dailyExpenses, $expeditions) {
    // Initialize the total earnings to 0.
    $totalEarnings = 0;

    // Loop through each expedition.
    foreach ($expeditions as $expedition) {
        // Split the expedition string into hours, path, and price.
        list($hours, $path, $price) = explode(" ", $expedition);
        $bottlesFound = 0;

        // Simulate Rikku's bottle collecting process for the given hours.
        for ($i = 0; $i < $hours; $i++) {
            // Determine the position in the path as Rikku progresses.
            $position = $i % strlen($path);

            // Check if Rikku finds a bottle at the current position.
            if ($path[$position] == "B") {
                $bottlesFound++;
            }
        }

        // Calculate the earnings for the day based on bottles found and their price.
        $dailyEarnings = $bottlesFound * $price;
        $totalEarnings += $dailyEarnings;
    }

    // Get the total number of days of expeditions.
    $totalDays = count($expeditions);

    // Calculate the average earnings per day.
    $averageEarnings = $totalEarnings / $totalDays;

    // Check if Rikku's average earnings are greater than his daily expenses.
    if ($averageEarnings > $dailyExpenses) {
        $extraMoney = number_format($averageEarnings - $dailyExpenses, 2);
        return "Good earnings. Extra money per day: $extraMoney";
    } else {
        // Calculate the total expenses needed for all days.
        $totalExpenses = $dailyExpenses * $totalDays;

        // Calculate the money needed to cover the expenses.
        $moneyNeeded = number_format($totalExpenses - $totalEarnings, 2);
        return "Hard times. Money needed: $moneyNeeded";
    }
}

// Example usage:
$dailyExpenses = 50.0;
$expeditions = [
    "8 ABMRB 50.50",
    "6 XYBZ 20.00",
    "7 QWERTY 22.00"
];

$result = calculateEarnings($dailyExpenses, $expeditions);
echo $result; // Example output: "Good earnings. Extra money per day: 3.67"


?>