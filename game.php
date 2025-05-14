<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['users'] = [];

    for ($i = 0; $i < count($_POST['ime']); $i++) {
        $_SESSION['users'][] = [
            'ime' => $_POST['ime'][$i],
            'priimek' => $_POST['priimek'][$i],
            'naslov' => $_POST['naslov'][$i]
        ];
    }
}

function izrisi_kocko($vrednost) {
    return "<img class='dice shake' src='Images/dice$vrednost.gif' alt='Kocka $vrednost'>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rezultat igre</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('Images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 40px;
            color: #fff;
        }

        h1 {
            text-align: center;
            font-family: CuteNotes;
            color: #fff;
            text-shadow: 2px 2px 6px #000;
        }

        .user {
            background: rgba(0, 0, 0, 0.75);
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(255, 0, 0, 0.3);
            padding: 20px;
            margin: 20px auto;
            max-width: 700px;
        }

        .runda {
            margin-top: 15px;
            border-top: 1px dashed #777;
            padding-top: 10px;
        }

        .dice {
            width: 60px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .shake {
            animation: shake 0.6s ease-in-out;
        }

        @keyframes shake {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(10deg); }
            50% { transform: rotate(-10deg); }
            75% { transform: rotate(6deg); }
            100% { transform: rotate(0deg); }
        }

        .winner {
            text-align: center;
            font-size: 1.3em;
            background-color: rgba(40, 167, 69, 0.9);
            border-radius: 10px;
            color: #fff;
            padding: 12px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px #28a745;
        }

        .timer {
            text-align: center;
            color: #ddd;
            font-style: italic;
            margin-top: 30px;
        }

        strong {
            color: #ffcc00;
        }

        small {
            color: #ccc;
        }
        @font-face {
            font-family: 'CuteNotes';
            src: url('Fonts/Cute Notes.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

    </style>
    <script>
        setTimeout(function () {
            window.location.href = "setup.php";
        }, 10000);
    </script>
</head>
<body>
    <h1>Rezultati igre s kockami</h1>

    <?php
    $rezultati = [];

    foreach ($_SESSION['users'] as $index => $user) {
        $vsota = 0;
        echo "<div class='user'>";
        echo "<strong>{$user['ime']} {$user['priimek']}</strong><br>";
        echo "<small>{$user['naslov']}</small>";

        // Rundni prikaz
        for ($runda = 1; $runda <= $_SESSION['stevilo_rund']; $runda++) {
            echo "<div class='runda'>";
            echo "<p><strong>Runda $runda:</strong> ";
            $kocke = [rand(1, 6), rand(1, 6), rand(1, 6)];
            foreach ($kocke as $k) {
                echo izrisi_kocko($k);
            }
            $runda_vsota = array_sum($kocke);
            echo " = <strong>$runda_vsota</strong></p>";
            $vsota += $runda_vsota;
            echo "</div>";
        }

        echo "<p>Skupna vsota: <strong>$vsota</strong></p>";
        echo "</div>";

        $rezultati[$index] = $vsota;
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

    <p class="timer">Preusmeritev nazaj na začetek čez 10 sekund...</p>
</body>
</html>