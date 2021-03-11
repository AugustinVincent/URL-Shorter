    <?php require_once '../header.php';?>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../public/css/home.css">
</head>
<body>
    <?php require_once '../navbar.php';?>



    <form action="../../src/component/accountCreation.php" method='post'>

        <label for="username">Username</label>
        <input id='username' type="text" name='username'>

        <label for="password">Password</label>
        <input id='password' type="text" name='userpassword'>

        <input type="submit">
    </form>

<?php require_once '../footer.php';?>
