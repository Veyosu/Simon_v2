<?php
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Simon say</title>
</head>
<body>

    <header>
        <h1>Simon Game</h1>
        <p>Bienvenue sur Simon game! Le jeu des couleurs et du rythme !</p>
    </header>
    <main>
        <p>Voici les règles : Une séquence de couleurs, associées chacune à un son va être jouée. Votre but est donc de réussir à reconstituer la séquence en question à l\'aide des boutons colorés ! Bonne chance !</p>
    </main>
        <a href="game.php" style="text-align: left;" onclick="gameloop()">Jouer</a>
    </body>
    </html>';
?>