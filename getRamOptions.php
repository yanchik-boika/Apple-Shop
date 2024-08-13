<?php
header('Content-Type: application/json');

// This is an example. Replace with actual logic to fetch options based on chip.
if (isset($_POST['chip'])) {
    $chip = $_POST['chip'];
    // Example logic: Return different RAM options based on the chip type
    $options = ($chip === 'Apple M3 Max') ? ['16 GB', '32 GB'] : ['8 GB', '16 GB'];
    echo json_encode($options);
} else {
    echo json_encode([]); // Return empty array if no chip is provided
}
?>

