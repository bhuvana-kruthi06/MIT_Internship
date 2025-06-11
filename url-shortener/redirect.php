<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
require 'db.php';

if (isset($_GET['c'])) {
    $code = $conn->real_escape_string($_GET['c']);
    $result = $conn->query("SELECT long_url FROM urls WHERE short_code = '$code'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Location: " . $row['long_url']);
        exit;
    } else {
        echo "Invalid URL";
    }
} else {
    echo "No short code provided.";
}
?>
</body>
</html>