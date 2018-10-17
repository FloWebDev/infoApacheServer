<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            text-align: center;
            background-color: #304558;
            font-family: 'Open Sans', sans-serif;
        }

        header {
            display: flex;
            justify-content : center;
            align-items: center;
            flex-flow: row nowrap;
        }

        img {
            display: block;
            width: 7%;
        }

        h1, h2, p {
            margin: 0.5em;
        }

        h1 {
            margin-top: 0;
            color: #D12127;
        }

        h2 {
            font-size: 1em;
        }
        
        #container {
            width: 80%;
            margin: 0 auto;
            background-color: #F2F2FF;
        }

        table {
            text-align: left;
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 0.2em;
        }

        th {
            text-align: center;
            color: #304558;
            font-weight: 700;
        }
        
       .data {
            /* color: #D12127; */
            text-align: right;
            font-weight: 700;
        }

        .green {
            color: green;
            font-weight: 700;
        }
    </style>
    <title>Apache HTTP Server</title>
</head>
<body>

<!-- Début du container -->
<div id="container">  


<?php
// Déclaration des variables associées aux informations Apache
$date = date('d/m/Y à H:i:s');
$version = apache_get_version();
$user = exec('whoami');
$owner = get_current_user();
$versionPHP = phpversion();
$modules = apache_get_modules();
?>
<header>
<img src="https://lh3.googleusercontent.com/-5OHl_-5EGCc/WUjvo37QotI/AAAAAAAAFYo/gZsUpxm2llUbbm-8TRRaUg0dvKcUOxLbwCHMYCw/Apache-HTTP-Server-logo-256x256%255B5%255D?imgmax=800" alt="Apache HTTP Server">
<h1>Apache HTTP Server</h1>
</header>
<h2>Informations sur le serveur Apache (requêtes PHP)</h2>

<table>

    <tr>
        <td>Date & heure</td><td class="data"><?= $date; ?></td>
    </tr>
    <tr>
        <td>Version Apache</td><td class="data"><?= $version; ?></td>
    </tr>
    <tr>
        <td>Utilisateur du processus PHP/HTTP</td><td class="data"><?= $user; ?></td>
    </tr>
    <tr>
        <td>Possesseur du script courant</td><td class="data"><?= $owner; ?></td>
    </tr>
    <tr>
        <td>Version courante PHP</td><td class="data"><?= $versionPHP ?></td>
    </tr>
    <tr>
        <td colspan='2'><?php
        if (!in_array('mod_rewrite', $modules)) { ?>
            <div style="color: #D12127;">Le module rewrite - permettant la réécriture des URLs - n'est pas activé !</div>
        <?php } else { ?>
            <div style="color: green;">Le module rewrite - permettant la réécriture des URLs - est bien activé ! [*]</div>
        <?php } ?></td>
    </tr>
    <tr>
        <th>Index</th>
        <th>Module(s) activé(s)</th>
    </tr>
    <?php
    foreach ($modules as $cle => $valeur) { ?>
    <tr>
        <td><?= 'Module n° ' . $cle; ?></td>
        <?php
        if ($valeur !== 'mod_rewrite') {
            ?><td><?= $valeur; ?></td><?php
        } else {
            ?><td><?= $valeur . ' <span class="green">*</span>'; ?></td>
        <?php } ?>
    </tr>
    <?php } ?>

<!-- Fin du tableau -->
</table>
<p style="font-weight: 700; margin-bottom: 0; color: #D12127;">--- FIN ---</p>
<!-- Fin du container -->
</div>  
</body>
</html>