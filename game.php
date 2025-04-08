<?php
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div style="position: absolute; top: 0; right: 0;">
        <a href="" id="reload_button" onclick="location.reload()"><img src="images\logo_retour.png" alt="Restart" style="float: left;"></a>
    </div style="position: absolute; top: 0; left: 0;">
    <a href="scores.php" style="text-align: left;">Scores table</a>
    <div>
        <button id="red_button" style="background-color: red;" onclick="jouer_son(0)" class="button"></button>
        <button id="blue_button" style="background-color: blue;" onclick="jouer_son(1)" class="button"></button>
        <button id="yellow_button" style="background-color: yellow;" onclick="jouer_son(2)" class="button"></button>
        <button id="green_button" style="background-color: green;" onclick="jouer_son(3)" class="button"></button>

        <form id="scoreForm" method="POST">
            <label for="pseudo">Enter your pseudo:</label>
            <input type="text" id="pseudo" name="pseudo" required>
            <input type="hidden" id="score" name="score">
            <button type="submit">Submit</button>
        </form>

    </body>
     <script src="updated_index.js"></script>
    </html>';
    ?>
    <?php
    $mySqlclient = new PDO('mysql:host=localhost:3307;dbname=simongame;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['score']) && isset($_POST['pseudo'])) {
        $score = intval($_POST['score']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $date = date('Y-m-d H:i:s');
        $stmt = $mySqlclient->prepare('INSERT INTO players (player_name, player_score, date_session) VALUES (:pseudo, :score, :date_session)');
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);
        $stmt->bindParam(':date_session', $date, PDO::PARAM_STR);
        $stmt->execute();
        echo 'Score and pseudo saved successfully.';
    }
    ?>
   
    
  