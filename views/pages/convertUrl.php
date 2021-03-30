    <?php require '../header.php';?>
    <title>URL SHORTER</title>
    <link rel="stylesheet" href="../../public/css/converturl.css">
    <?php unset($_SESSION['singup-error']);?>
    <?php unset($_SESSION['login-error']);?>
</head>
<body>
    <?php require '../navbar.php';?>

    <?php if(!isset($_SESSION['username'])){
        header('location: home.php');
        }
        require_once '../../src/http/Database.php';

        $urls = $db->query('SELECT * FROM `keyGenerator`') ;

        if(isset($urls))
        {
            $urls =  $urls->fetchAll();
        }
        ?>
    
    <div class="global-container">
        <div class="converter-container">
            <h1 class="convert-url-title">Convert your URLS the best way</h1>
            <div class="url-shorter-field-container">
                <form action="../../src/component/UrlShorter.php?page=converturl"  method="post">
                    <input type="text" class="field" value="<?php if(isset($_SESSION['returnUrl'])) echo $_SESSION['returnUrl'];?>" placeholder="Enter your link ..." name="urlToConvert">
                    <input type="submit"class="url-shorter-submit" value='GO'>
                </form>
            </div>
        </div>
        <form action="../../src/component/UpdateUrlData.php" class='url-container-form'>
        <div class="url-container">
            <input type="submit" formaction="../../src/component/UpdateUrlData.php" class="save-btn" value="Save Changes" formmethod='post'>
            <div class="raw columm-names">
                <div class="column name-column">Name</div>
                <div class="column base-url-column">Base URL</div>
                <div class="column short-url-column">New URL</div>
                <div class="column stats-column">Stats</div>
                <div class="column status-column">On/Off</div>
                <div class="column delete-btn-column">Delete</div>
            </div>
            <?php  foreach ($urls as $index => $url) :
                if($url['username'] == $_SESSION['username']) :
            ?>
            <div class="raw url-content">
                <input type='hidden' value="<?=$url['id']?>"  name='urlId[]'>
                <input type='text' value="<?=$url['urlName']?>"  class="column name-column" name='urlName[]'>
                <div class="column base-url-column"><?=$url['url']?></div>
                <div class="column short-url-column"><?= 'localhost:8888/v.php?/=' . $url['urlKey']?></div>
                <div class="column stats-column"><?=$url['stats']?></div>
                <div class="column status-column">
                    <label class="switch">
                        <input type="hidden" class="bool-value" name="urlStatus[]" value=<?=$url['urlStatus']?>>
                        <input class="delete-checkbox"  type="checkbox" <?php if($url['urlStatus'] == 0){ echo 'checked=""';}?>  value=<?=$url['urlStatus']?>>
                    <span class="slider round"></span>
                    </label>
                </div>  
                <div class="column delete-btn-column">

                    <input class="column delete-btn" type="submit" formaction=<?='../../src/component/DeleteUrl.php?getUrlId=' .$url['id']?> class="delete-btn" value="-" formmethod='post'>
                </div>
            </div>
            <?php endif ; endforeach?>

        </div>
        </form>
    </div>
<?php require '../footer.php';?>

