    <?php include '../header.php';?>
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Home page</title>
</head>
<body>
    <?php include '../navbar.php';?>


    <section class="landing-section">
        <div class="container">
            <h1 class="main-title">The best<br>Url shortener</h1>
            <div class="btn-container">
                <a href=""><button class="login-btn btn">Login</button></a>
                <a href=""><button class="signup-btn btn">Sign up</button></a>
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
    

<?php include '../footer.php';?>
