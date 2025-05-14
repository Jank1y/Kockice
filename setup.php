<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nastavitve igre</title>
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
            Font-family: CuteNotes;
            text-shadow: 2px 2px 6px #000;
            margin-bottom: 30px;
        }

        form {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.4);
            max-width: 500px;
            margin: auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 15px 0 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #000;
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
            margin-top: 20px;
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
    <h1>Nastavitve igre</h1>
    <form action="index.php" method="post">
        <label for="stevilo_igralcev">Število igralcev:</label>
        <select name="stevilo_igralcev" id="stevilo_igralcev" required>
            <?php for ($i = 2; $i <= 6; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> igralcev</option>
            <?php endfor; ?>
        </select>

        <label for="stevilo_rund">Število iger:</label>
        <select name="stevilo_rund" id="stevilo_rund" required>
            <?php for ($r = 1; $r <= 5; $r++): ?>
                <option value="<?= $r ?>"><?= $r ?></option>
            <?php endfor; ?>
        </select>

        <input type="submit" value="Naprej na vnos igralcev">
    </form>
</body>
</html>