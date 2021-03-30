<nav class="navbar">
    <div class="texte">
        <img src="../../public/img/logo.png" alt="" class="urlight-logo">
        <li><a href="home.php">Home</a></li>
        <?php if(isset($_SESSION['username'])) :?>
            <li><a href="converturl.php">Convert Url</a></li>
        <?php endif ?>
        <li><a href="contact.php">Contact</a></li>

        <!-- Display is the user isn't connect and if he's not we also display login and sign up links -->
        <?php if(empty($_SESSION['username'])) :?>
            <li class="account-container">
                <a class="link-button" href="signup.php">Inscription</a>
                <a class="link-button"  href="login.php">Connexion</a>
            </li>
        <?php endif ?>

        <!-- If the user is connect we just wish him welcome and display a log out button  -->
        

        
        <?php if(isset($_SESSION['username'])) :?>
            <li class="account-container">
                <span class="account-btn">Welcome <?=$_SESSION['username']?></span>
                <a class="link-button"  href="../../src/component/Logout.php">Logout</a> 
            </li>
        <?php endif ?>
    <div>

    
    
        
</nav>