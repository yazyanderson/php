<?php
echo '<h1>Form input values</h1>';

echo '<p>Your Name: ' . htmlspecialchars($_POST['visitor_name'] ?? '') . '</p>';

$options = $_POST['options'] ?? [];

if (!is_array($options)) {
    $options = [$options];
}

echo '<p>Options:</p>';

if (count($options) > 0 && $options[0] !== '') {
    for ($i = 0; $i < count($options); $i++) {
        echo htmlspecialchars($options[$i]) . '<br>';
    }
} else {
    echo 'No options selected';
}

echo '<h2>All Form Data</h2>';
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>