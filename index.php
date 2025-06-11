<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
</head>
<body>
    <h2>Enter URL to shorten</h2>
    <form action="shorten.php" method="POST">
        <input type="url" name="long_url" required>
        <button type="submit">Shorten</button>
    </form>
</body>
</html>
