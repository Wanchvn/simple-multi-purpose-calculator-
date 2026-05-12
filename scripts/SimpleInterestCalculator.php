<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Interest Calculator Result</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Only handle POST submissions from the simple interest form.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $principal = $_POST['principal'] ?? '';
    $rate = $_POST['rate'] ?? '';
    $time = $_POST['time'] ?? '';

    $error = false;

    // Validate that all fields are completed.
    if ($principal === '' || $rate === '' || $time === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate numeric input values.
    if (!$error && (!is_numeric($principal) || !is_numeric($rate) || !is_numeric($time))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        $principal = floatval($principal);
        $rate = floatval($rate);
        $time = floatval($time);

        // Compute simple interest and the amount after interest.
        $interest = ($principal * $rate * $time) / 100;
        $total = $principal + $interest;

        echo '<h1>Simple Interest</h1>';
        echo '<div class="result-details">';
        echo '<p><strong>Principal:</strong> ' . number_format($principal, 2) . '</p>';
        echo '<p><strong>Rate:</strong> ' . number_format($rate, 2) . '%</p>';
        echo '<p><strong>Time:</strong> ' . number_format($time, 2) . ' years</p>';
        echo '</div>';
        echo '<div class="result-message">Interest: ' . number_format($interest, 2) . '</div>';
        echo '<div class="result-message">Total Amount: ' . number_format($total, 2) . '</div>';
    }
} else {
    echo '<h1>Error</h1>';
    echo '<div class="error-message">Invalid request method.</div>';
}
?>
            <a href="../index.php" class="back-button">← Back to Calculator</a>
        </div>
    </div>
</body>
</html>