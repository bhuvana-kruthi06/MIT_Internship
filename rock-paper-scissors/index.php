<?php
$options = ["rock", "paper", "scissors"];
$result = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userChoice = $_POST["choice"];
    $computerChoice = $options[rand(0, 2)];

    if ($userChoice === $computerChoice) {
        $result = "It's a Draw!";
    } elseif (
        ($userChoice === "rock" && $computerChoice === "scissors") ||
        ($userChoice === "scissors" && $computerChoice === "paper") ||
        ($userChoice === "paper" && $computerChoice === "rock")
    ) {
        $result = "You Win! $userChoice beats $computerChoice.";
    } else {
        $result = "You Lose! $computerChoice beats $userChoice.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Rock Paper Scissors</h1>
    <form method="POST">
        <button type="submit" name="choice" value="rock">🪨 Rock</button>
        <button type="submit" name="choice" value="paper">📄 Paper</button>
        <button type="submit" name="choice" value="scissors">✂️ Scissors</button>
    </form>

    <?php if (!empty($result)): ?>
        <h2>Result:</h2>
        <p><strong><?= $result ?></strong></p>
    <?php endif; ?>
</body>
</html>
