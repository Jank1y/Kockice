<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['users'] = [];

    for ($i = 0; $i < 3; $i++) {
        $_SESSION['users'][] = [
            'ime' => $_POST['ime'][$i],
            'priimek' => $_POST['priimek'][$i],
            'naslov' => $_POST['naslov'][$i]
        ];
    }
}

function izrisi_kocko($vrednost) {
    return "<img src='Images/dice$vrednost.gif' alt='Kocka $vrednost' width='60'>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rezultat igre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef1f5;
            padding: 30px;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        .user {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }

        .dice-row {
            margin-top: 10px;
        }

        img {
            margin-right: 10px;
            vertical-align: middle;
        }

        .winner {
            text-align: center;
            font-size: 1.2em;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 8px;
            color: #155724;
            margin: 20px auto;
            max-width: 600px;
        }

        .timer {
            text-align: center;
            color: #888;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 10000);
    </script>
</head>
<body>
    <h2>Rezultati igre s kockami</h2>

    <?php
    $rezultati = [];

    foreach ($_SESSION['users'] as $index => $user) {
        $kocke = [rand(1, 6), rand(1, 6), rand(1, 6)];
        $vsota = array_sum($kocke);
        $rezultati[$index] = $vsota;

        echo "<div class='user'>";
        echo "<strong>{$user['ime']} {$user['priimek']}</strong><br>";
        echo "<small>{$user['naslov']}</small><br>";
        echo "<div class='dice-row'>";
        foreach ($kocke as $vrednost) {
            echo izrisi_kocko($vrednost);
        }
        echo "</div>";
        echo "<p>Skupna vsota: <strong>$vsota</strong></p>";
        echo "</div>";
    }

    $najvisja_vsota = max($rezultati);
    $zmagovalci = [];

    foreach ($rezultati as $i => $vsota) {
        if ($vsota === $najvisja_vsota) {
            $zmagovalci[] = $_SESSION['users'][$i]['ime'] . " " . $_SESSION['users'][$i]['priimek'];
        }
    }

    echo "<div class='winner'><strong>Zmagovalec/i:</strong> " . implode(', ', $zmagovalci) . "</div>";
    ?>

    <p class="timer"><em>Preusmeritev nazaj na obrazec čez 10 sekund...</em></p>
</body>
</html>