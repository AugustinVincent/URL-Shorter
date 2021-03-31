<?php include '../header.php';?>
    <link rel="stylesheet" href="../../public/css/contact.css">
    <title>Contact</title>
    <?php unset($_SESSION['singup-error']);?>
    <?php unset($_SESSION['login-error']);?>
    <?php unset($_SESSION['returnUrl']);?>
</head>
<body>
    <?php include '../navbar.php';?>


    <h1>Welcome to the contact page</h1>
    <div class="contact-title">
        <h2> Contact</h2>
        <h3> We will always take care of you !</h3>
    </div>

    <div class="contact-form">
        <form id="contact-from" method = "post" action = "../../src/component/ContactForm.php">
            <input name = "name type="text class = "form-control" placeholder = "Your Name" required>
            <br>
                <input name = "email" type="email" class = "form-control" placeholder = "Your Email" required><br>

                <textarea name="message" class = "form-control" placeholder = "Message" row = "4" required></textarea><br>

                <input type="submit" class = "form-control submit" value = "SEND MESSAGE">
        </form>

    </div>

    </div>

<?php include '../footer.php';?>
