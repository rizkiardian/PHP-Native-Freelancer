<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php 
    $cv = $_GET['cv'];
    $ekstensi = explode('.', $cv);
    $ekstensi = strtolower(end($ekstensi));
    $ekstensiGambarValid = ["png","jpg","jpeg"];

        if ($ekstensi == "pdf") {
            echo "<embed src='../../assets/cv/$cv' type='application/pdf' width='100%' height='900px' />";
        }elseif (!in_array($ekstensi, $ekstensiGambarValid))
        {
            echo "<img src='../../assets/cv/$cv' width='100%' height='900px' alt='file cv'/>";
        }
    ?>
</body>
</html>
