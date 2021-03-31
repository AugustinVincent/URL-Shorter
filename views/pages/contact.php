<?php include '../header.php';?>
    <link rel="stylesheet" href="../../public/css/contact.css">
    <title>Contact</title>
    <?php unset($_SESSION['singup-error']);?>
    <?php unset($_SESSION['login-error']);?>
    <?php unset($_SESSION['returnUrl']);?>
</head>
<body>
    <?php include '../navbar.php';?>

    <div class="contact-container">
        <div class="contact-title">
            <h2> Contact us</h2>
            <h3> We will always take care of you ! If you have anything to tell us, please let us know !</h3>
        </div>

        <div class="contact-form">
            <form method = "post" action = "../../src/component/ContactForm.php">
                <input name = "name type="text class = "form-control" placeholder = "Your Name" required>
                    <input name = "email" type="email" class = "form-control" placeholder = "Your Email" required>
                    <textarea name="message" class = "form-control" placeholder = "Message" row = "4" required></textarea>
                    <input type="submit" class = "form-control submit" value = "SEND MESSAGE">
            </form>

        </div>
    </div>

<?php include '../footer.php';?>
