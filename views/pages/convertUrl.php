    <?php require '../header.php';?>
    <title>URL SHORTER</title>
    <link rel="stylesheet" href="../../public/css/converturl.css">
</head>
<body>
    <?php require '../navbar.php';?>

    <?php if(!isset($_SESSION['username'])){
        header('location: home.php');
    }?>
    
    <h1>Shorter your URL here</h1>

<?php require '../footer.php';?>
