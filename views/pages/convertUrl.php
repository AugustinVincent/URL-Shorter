    <?php require '../header.php';?>
    <title>URL SHORTER</title>
    <link rel="stylesheet" href="../../public/css/converturl.css">
</head>
<body>
    <?php require '../navbar.php';?>

    <?php if(!isset($_SESSION['username'])){
        header('location: home.php');
    }?>
    
    <div class="global-container">
        <div class="converter-container">
            <h1 class="convert-url-title">Convert your URLS the best way</h1>
            <div class="url-shorter-field-container">
                <form action="../../src/component/UrlShorter.php" method="post">
                    <input type="text" class="field" value="<?php if(isset($_SESSION['returnUrl'])) echo $_SESSION['returnUrl'];?>" placeholder="Enter your link ..." name="urlToConvert">
                    <input type="submit"class="url-shorter-submit" value='GO'>
                </form>
            </div>
        </div>

        <div class="url-container">
            <div class="raw columm-names">
                <div class="column name-column">Name</div>
                <div class="column base-url-column">Base URL</div>
                <div class="column short-url-column">New URL</div>
                <div class="column stats-column">Stas</div>
                <div class="column status-column">On/Off</div>
                <div class="column delete-btn-column">Delete</div>
            </div>

            <div class="raw url-content">
                <div class="column name-column">Name</div>
                <div class="column base-url-column">Base URL</div>
                <div class="column short-url-column">New URL</div>
                <div class="column stats-column">Stas</div>
                <div class="column status-column">
                    <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                    </label>
                </div>
                <div class="column delete-btn-column"><div class="cross"><span></span><span></span></div></div>
            </div>

            <div class="raw url-content">
                <div class="column name-column">Name</div>
                <div class="column base-url-column">Base URL</div>
                <div class="column short-url-column">New URL</div>
                <div class="column stats-column">Stas</div>
                <div class="column status-column">
                    <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                    </label>
                </div>
                <div class="column delete-btn-column"><div class="cross"><span></span><span></span></div></div>
            </div>

            <div class="raw url-content">
                <div class="column name-column">Name</div>
                <div class="column base-url-column">Base URL</div>
                <div class="column short-url-column">New URL</div>
                <div class="column stats-column">Stas</div>
                <div class="column status-column">
                    <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                    </label>
                </div>
                <div class="column delete-btn-column"><div class="cross"><span></span><span></span></div></div>
            </div>
        </div>
    </div>

<?php require '../footer.php';?>
