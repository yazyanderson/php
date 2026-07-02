<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Results</title>
</head>

<body style="
  margin: 0;
  padding: 40px;
  font-family: Arial, sans-serif;
  background: #f4f6f8;
  color: #333;
  display: flex;
  justify-content: center;
">

<div style="
  width: 100%;
  max-width: 700px;
  background: #ffffff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  animation: fadeIn 0.5s ease;
">

  <h1 style="margin-top: 0; font-size: 1.6rem; border-bottom: 1px solid #eee; padding-bottom: 10px;">
    Raw Form Data
  </h1>

  <pre style="
    background: #f9fafb;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
  "><?php print_r($_POST); ?></pre>

  <h1 style="font-size: 1.4rem; margin-top: 25px;">
    Form input values
  </h1>

  <p><strong>Your Name:</strong> <?= htmlspecialchars($_POST['name'] ?? '') ?></p>
  <p><strong>Section:</strong> <?= htmlspecialchars($_POST['section'] ?? '') ?></p>
  <p><strong>Card Number:</strong> <?= htmlspecialchars($_POST['cardnumber'] ?? '') ?></p>
  <p><strong>Card Type:</strong> <?= htmlspecialchars($_POST['cardtype'] ?? '') ?></p>

<?php
$required = ['name', 'section', 'cardnumber', 'cardtype'];

foreach ($required as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        echo '<div style="
                margin-top: 20px;
                padding: 15px;
                background: #fff3f3;
                border: 1px solid #ffcccc;
                border-radius: 8px;
              ">';
        echo '<h2 style="margin-top:0; color:#c0392b;">Sorry</h2>';
        echo '<p>You did not fill out the form completely. ';
        echo '<a href="index.html" style="color:#4f8cff;">Try again?</a></p>';
        echo '</div>';
        exit;
    }
}

$name = trim($_POST['name'] ?? '');
$section = trim($_POST['section'] ?? '');
$cardnumber = trim($_POST['cardnumber'] ?? '');
$cardtype = trim($_POST['cardtype'] ?? '');

$line = $name . ';' . $section . ';' . $cardnumber . ';' . $cardtype . PHP_EOL;
file_put_contents('suckers.html', $line, FILE_APPEND);

$all = file_get_contents('suckers.html');
?>

  <h2 style="margin-top: 25px; font-size: 1.2rem;">
    The current database contains:
  </h2>

  <pre style="
    background: #f9fafb;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
    max-height: 300px;
  "><?= htmlspecialchars($all) ?></pre>

</div>

<!-- Fade animation -->
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

</body>
</html>