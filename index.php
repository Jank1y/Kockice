<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['stevilo_igralcev'] = $_POST['stevilo_igralcev'];
    $_SESSION['stevilo_rund'] = $_POST['stevilo_rund'];
} elseif (!isset($_SESSION['stevilo_igralcev'])) {
    header("Location: setup.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vnos uporabnikov</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('Images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 40px;
        }

        h1 {
            color: #f8f8f8;
            Font-family: CuteNotes;
            text-align: center;
            text-shadow: 2px 2px 5px #000;
            margin-bottom: 30px;
        }

        form {
            background: rgba(0, 0, 0, 0.75);
            color: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.4);
            max-width: 650px;
            margin: auto;
        }

        fieldset {
            border: 1px solid rgba(255, 0, 0, 0.6);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            color: #ff4444;
            text-shadow: 1px 1px 3px black;
        }

        input[type="text"] {
            width: 100%;
            max-width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f0f0f0;
            color: #000;
            box-sizing: border-box;
        }


        input[type="submit"] {
            background-color: #c0392b;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(192, 57, 43, 0.6);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #a93226;
            box-shadow: 0 0 20px rgba(255, 80, 80, 0.8);
            transform: scale(1.05);
        }

        @font-face {
            font-family: 'CuteNotes';
            src: url('Fonts/Cute Notes.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body>
    <h1>Vnesite podatke za igralce</h1>
    <form action="game.php" method="post">
        <?php for ($i = 1; $i <= $_SESSION['stevilo_igralcev']; $i++): ?>
            <fieldset>
                <legend>Igralec <?= $i ?></legend>
                Ime: <input type="text" name="ime[]" required><br>
                Priimek: <input type="text" name="priimek[]" required><br>
                Naslov: <input type="text" name="naslov[]" required><br>
            </fieldset>
        <?php endfor; ?>
        <input type="submit" value="Začni igro">
    </form>
</body>
</html>
