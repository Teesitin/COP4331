<?php
function generateUniqueID($filename = "ids.txt") {
    // Initialize an empty array to store existing IDs
    $existing_ids = [];

    // Read the file to get existing IDs
    if (file_exists($filename)) {
        $file_content = file_get_contents($filename);
        $existing_ids = explode("\n", trim($file_content));
    }

    // Generate a new unique ID
    do {
        $new_id = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    } while (in_array($new_id, $existing_ids));

    // Append the new ID to the existing IDs and write back to the file
    $existing_ids[] = $new_id;
    file_put_contents($filename, implode("\n", $existing_ids) . "\n");

    return $new_id;
}

// Example usage
$new_id = generateUniqueID();
echo "Generated ID: " . $new_id;
?>
