<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Scores</title>
    <link rel="stylesheet" href="index.css">
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="game.php" style="text-align: left;">Back to Game</a>
    <h1>TOP 10 Player Scores</h1>
    <table style="font-size: 50px; border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>';
        
$conn = new mysqli("localhost", "root", "", "simongame", 3307);

$sql = "SELECT * FROM players ORDER BY player_score DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Use htmlspecialchars to prevent XSS attacks
        echo "<td>" . htmlspecialchars($row["player_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["player_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["player_score"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo '<tr><td colspan="3">No players found</td></tr>';
}

$conn->close();

echo '</tbody>
    </table>
</body>
</html>';
