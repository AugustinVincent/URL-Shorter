    <?php require_once '../header.php';?>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../public/css/signup.css">
    <?php unset($_SESSION['login-error']);?>
</head>
<body>
    <?php require_once '../navbar.php';?>

<!-- We check if the user is already connected to be sure that he can't come back on the sign up page  -->
    <?php if(isset($_SESSION['username'])){
        header('location: home.php');
    }?>
    <section class="landing-section">
        <div class="container">
    <!-- The form that the user has to fill to create an account -->
            <h1>Sign up</h1>
            <form action="../../src/component/SignUp.php" method='post' class="form-signup">

                <label for="username">Username</label>
                <input id='username' type="text" name='username' class="username-field form-signup-field">

                <label for="password">Password</label>
                <input id='password' type="text" name='userpassword' class="username-field form-signup-field">

                <input type="submit" class="userpassword-submit form-signup-field" value="S'inscrire">
            </form>
            <?php 
            if(isset($_SESSION['singup-error'])):?>
                <p><?=$_SESSION['singup-error'];?></p>
            <?php endif?>
        </div>   
    </section>
<?php require_once '../footer.php';?>
