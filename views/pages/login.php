    <?php require '../header.php';?>
    <title>Connexion</title>
    <link rel="stylesheet" href="../../public/css/connexion.css">
    </head>
    <?php require '../navbar.php';?>
    
    <h1>CONNEXION</h1>

    <!-- We check if the user is already connected to be sure that he can't come back on the login page  -->
    <?php if(isset($_SESSION['username'])){
        header('location: home.php');
    }?>

    <!-- The form that the user has to fill to connect to his account -->
    <form action="../../src/component/Login.php" method='post'>

        <label for="username">Username</label>
        <input id='username' type="text" name='username'>

        <label for="password">Password</label>
        <input id='password' type="text" name='userpassword'>

        <input type="submit">
    </form>

<?php require '../footer.php';?>
