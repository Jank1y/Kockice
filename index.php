<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vnos uporabnikov</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        legend {
            font-weight: bold;
        }

        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Vnesite podatke za 3 uporabnike</h2>
    <form action="game.php" method="post">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <fieldset>
                <legend>Uporabnik <?= $i ?></legend>
                Ime: <input type="text" name="ime[]" required><br>
                Priimek: <input type="text" name="priimek[]" required><br>
                Naslov: <input type="text" name="naslov[]" required><br>
            </fieldset>
        <?php endfor; ?>
        <input type="submit" value="Začni igro">
    </form>
</body>
</html>