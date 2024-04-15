<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="icon" href="img/logo.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php //include "header.php";?>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="main_view.php" class="brand"><img src="img/logo.svg" alt="brand" /></a>
            <nav class="nav"></nav>
        </div>
    </header>
    <div class="news">
        <?php include "model.php"; print_new(); ?>
    </div>
    <div class="footer">
        © 2023 — 2412 «Галактический вестник»
    </div>
</body>
</html>