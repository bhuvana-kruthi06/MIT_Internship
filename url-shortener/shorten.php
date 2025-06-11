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

function generateShortCode($length = 6) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if (isset($_POST['long_url'])) {
    $long_url = $conn->real_escape_string($_POST['long_url']);
    $short_code = generateShortCode();

    // Ensure unique short code
    $check = $conn->query("SELECT * FROM urls WHERE short_code = '$short_code'");
    while ($check->num_rows > 0) {
        $short_code = generateShortCode();
        $check = $conn->query("SELECT * FROM urls WHERE short_code = '$short_code'");
    }

    $conn->query("INSERT INTO urls (long_url, short_code) VALUES ('$long_url', '$short_code')");

    $short_url = "http://localhost/url-shortener/redirect.php?c=$short_code";

    echo "Short URL: <a href='$short_url'>$short_url</a>";
}
?>
</body>
</html>