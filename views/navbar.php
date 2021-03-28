
<nav class="navbar">
    <div class="texte">
        <li><a href="home.php">Home</a><li>
        <?php if(isset($_SESSION['username'])) :?>
            <li><a href="converturl.php">Convert Url</a><li>
        <?php endif ?>
        <li><a href="contact.php">Contact</a><li>
        <li><a href="pricing.php">Pricing</a><li>

    
    
        <!-- Display is the user isn't connect and if he's not we also display login and sign up links -->
        <?php if(empty($_SESSION['username'])) :?>
            
            <a href="signup.php"><button>Inscription</button></a>
            <a href="login.php"><button>Connexion</button></a>
        <?php endif ?>
    <div>

    
    <!-- If the user is connect we just wish him welcome and display a log out button  -->
    <?php if(isset($_SESSION['username'])) :?>
        <p>Welcome <?=$_SESSION['username']?></p>
        <a href="../../src/component/Logout.php"><button>Logout</button></a> 
    <?php endif ?>
        
</nav>