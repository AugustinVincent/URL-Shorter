    <?php require_once '../header.php';?>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../public/css/signup.css">
</head>
<body>
    <?php require_once '../navbar.php';?>

<!-- We check if the user is already connected to be sure that he can't come back on the sign up page  -->
    <?php if(isset($_SESSION['username'])){
        header('location: home.php');
    }?>
    <!-- The form that the user has to fill to create an account -->
    <h1>INSCRIPTION</h1>
    <form action="../../src/component/SignUp.php" method='post'>

        <label for="username">Username</label>
        <input id='username' type="text" name='username'>

        <label for="password">Password</label>
        <input id='password' type="text" name='userpassword'>

        <input type="submit">
    </form>

<?php require_once '../footer.php';?>
