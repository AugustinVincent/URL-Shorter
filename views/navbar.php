
<nav>
    <div class="container">
        <a href="home.php">Home</a>
        <a href="converturl.php">Convert Url</a>


        <!-- Display is the user isn't connect and if he's not we also display login and sign up links -->
        <?php if(empty($_SESSION['username'])) :?>
            <p>You are'nt connected</p>
            <a href="signup.php">Inscription</a>
            <a href="login.php">Connexion</a>
        <?php endif ?>


        <!-- If the user is connect we just wiish him welcome and display a log out button  -->
        <?php if(isset($_SESSION['username'])) :?>
            <p>Welcome <?=$_SESSION['username']?></p>
            <a href="../../src/component/Logout.php">Logout</a> 
        <?php endif ?>
    </div>
</nav>