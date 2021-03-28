    <?php include '../header.php';?>
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Home page</title>
    <style>
        .landing-section .webgl{
    position: absolute;
    top: 0;
    left: 0;
    z-index : -1;
}
    </style>
</head>
<body>
    <?php include '../navbar.php';?>


    <section class="landing-section">
    <canvas class="webgl"></canvas>
        <div class="container">
            <h1 class="main-title">The best<br>Url shortener</h1>
            <div class="btn-container">
                <a href="login.php"><button class="login-btn btn">Login</button></a>
                <a href="signup.php"><button class="signup-btn btn">Sign up</button></a>
            </div>
            <div class="url-shorter-field-container">
                <form action="../../src/component/UrlShorter.php" method="post">
                    <input type="text" class="field" value="<?php if(isset($_SESSION['returnUrl'])) echo $_SESSION['returnUrl'];?>" placeholder="Enter your link ..." name="urlToConvert">
                    <input type="submit"class="url-shorter-submit" value='GO'>
                </form>
            </div>
        </div>
    </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.min.js" integrity="sha512-n8IpKWzDnBOcBhRlHirMZOUvEq2bLRMuJGjuVqbzUJwtTsgwOgK5aS0c1JA647XWYfqvXve8k3PtZdzpipFjgg==" crossorigin="anonymous"></script>

    <script src="script.js" ></script>
    

<?php include '../footer.php';?>
