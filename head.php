<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>vitfampage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons-1.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background-image: url(&quot;assets/img/back1.jpg&quot;);background-repeat: no-repeat;background-size: cover;">
    <section>
        <nav class="navbar navbar-light navbar-expand-md sticky-top">
            <div class="container-fluid"><a class="navbar-brand" href="index.php"><img src="assets/img/logogreen.png" style="height:70px"></a>
                                   
<button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation" style="opacity: 1;"></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border-dark" href="login.php"><strong>Login</strong></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border rounded-0 border-secondary" href="signup.php"><strong>Sign Up</strong></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="event.php"><strong>Event</strong></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation"></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"> <?php if($_SESSION['user']!=0){echo("<a class=\"nav-link\" href=\"myaccount.php\"><strong>My Account</strong></a>");} ?></li>
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation"></li>
                    </ul>
                </div>
            </div>
        </nav>