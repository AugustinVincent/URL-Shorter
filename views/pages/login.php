        <?php require '../header.php';?>
        <title>Connexion</title>
        <link rel="stylesheet" href="../../public/css/login.css">
        <?php unset($_SESSION['singup-error']);?>
    </head>
    <?php require '../navbar.php';?>
    
    

    <!-- We check if the user is already connected to be sure that he can't come back on the login page  -->
    <?php if(isset($_SESSION['username'])){
        header('location: home.php');
    }?>

    <section class="landing-section">
        <div class="container">
            <h1>Sign in</h1>        <!-- The form that the user has to fill to connect to his account -->
            <form action="../../src/component/Login.php" method='post' class="form-connection">

                <label for="username">Username</label>
                <input id='username' type="text" name='username' class="username-field form-connection-field">

                <label for="password">Password</label>
                <input id='password' type="password" name='userpassword' class="userpassword-field form-connection-field">

                <input type="submit" class="userpassword-submit form-connection-field" value="Se connecter">
            </form>
            <?php if(isset($_SESSION['login-error'])):?>
                <p><?=$_SESSION['login-error'];?></p>
            <?php endif?>
        </div>
        

</section>

<?php require '../footer.php';?>
