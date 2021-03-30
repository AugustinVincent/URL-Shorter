<nav class="navbar">
    <img src="../../public/img/logo.png" alt="" class="urlight-logo">
    <ul class="links-container">
        <li><a class="link-animation" href="home.php">Home</a></li>
        <?php if(isset($_SESSION['username'])) :?><li><a class="link-animation" href="converturl.php">URL Manager</a></li><?php endif ?>
        <li><a class="link-animation" href="contact.php">Contact</a></li>

        <!-- Display is the user isn't connect and if he's not we also display login and sign up links -->
        <?php if(empty($_SESSION['username'])) :?>
        <div class="account-info-container">
            <li class="signup-btn"><a href="signup.php">Sign up</a></li>
            <li class="signin-btn"><a  href="login.php">Sign in</a></li>
        </div>
        <?php endif ?>

        <!-- If the user is connect we just wish him welcome and display a log out button  -->
        
        <?php if(isset($_SESSION['username'])) :?>
        <div class="account-info-container">
            <li class="account-username-display">Welcome <?=$_SESSION['username']?></li>
            <li class="logout-btn"><a  href="../../src/component/Logout.php">Logout</a></li>
        </div>
        <?php endif ?>
    </ul>
    <div class="burger-menu">
        <div class="burger-menu-bar"></div>
        <div class="burger-menu-bar"></div>
        <div class="burger-menu-bar"></div>
    </div>
    
    
        
</nav>