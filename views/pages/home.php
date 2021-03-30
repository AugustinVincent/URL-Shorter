    <?php include '../header.php';?>
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Home page</title>
    <?php unset($_SESSION['singup-error']);?>
    <?php unset($_SESSION['login-error']);?>
</head>
<body>
    <?php include '../navbar.php';?>


    <section class="landing-section">
    <canvas class="webgl"></canvas>
        <div class="container">
            <h1 class="main-title">The best<br>Url shortener</h1>
            
            <?php if(!isset($_SESSION['username'])) : ?>
                <div class="btn-container">
                    <a href="login.php"><button class="login-btn btn">Login</button></a>
                    <a href="signup.php"><button class="signup-btn btn">Sign up</button></a>
                </div>
            <?php endif?>
            <?php if(isset($_SESSION['username'])) : ?>
                <div class="connected-infos-container">
                    <p class="paragraph">Take advantage of a space to manage all your urls. Activate, deactivate, delete, rename and have access to all the shortened urls that you have converted. With URLights, get acces to the shortest url you could have and manage them as you wish. </p>
                    <div class="url-manager-link" class="link-container"><a  href="converturl.php">Go to your Url manager</a></div>
                </div>
            <?php endif?>
            <div class="url-shorter-field-container">
                <form action="../../src/component/UrlShorter.php?page=home" method="post">
                    <input type="text" class="field" value="" placeholder="Enter your link ..." name="urlToConvert">
                    <input type="submit"class="url-shorter-submit" value='GO'>
                </form>
            </div>
            <p><?php if(isset($_SESSION['returnUrl'])) echo $_SESSION['returnUrl'];?></p>
        </div>
    </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.min.js" integrity="sha512-n8IpKWzDnBOcBhRlHirMZOUvEq2bLRMuJGjuVqbzUJwtTsgwOgK5aS0c1JA647XWYfqvXve8k3PtZdzpipFjgg==" crossorigin="anonymous"></script>

    <script src="script.js" ></script>
    

<?php include '../footer.php';?>
